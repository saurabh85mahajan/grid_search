<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

trait ExtractorConcern
{
    private function processNameComponents($name, &$data)
    {
        // Parse name parts
        $nameParts = array_filter(explode(' ', $name), function ($part) {
            return trim($part) !== '';
        });

        // Reset array keys after filtering
        $nameParts = array_values($nameParts);

        // Common prefixes
        $prefixes = ['MR', 'MRS', 'MS', 'MISS'];

        $startIndex = 0;

        // Check if first part is a prefix
        if (!empty($nameParts) && in_array(strtoupper($nameParts[0]), $prefixes)) {
            $data['name_prefix'] = strtoupper($nameParts[0]);
            $startIndex = 1;

            // Look up salutation ID in database
            if ($data['name_prefix']) {
                $salutationId = DB::table('salutations')
                    ->where('name', $data['name_prefix'])
                    ->orWhere('name', $data['name_prefix'] . '.')
                    ->value('id');
                $data['name_prefix'] = $salutationId;
            }
        } else {
            $data['name_prefix'] = null;
        }

        // Get remaining name parts after prefix
        $remainingParts = array_slice($nameParts, $startIndex);
        $remainingCount = count($remainingParts);

        // Parse based on number of remaining parts
        if ($remainingCount == 0) {
            $data['first_name'] = '';
            $data['middle_name'] = '';
            $data['last_name'] = '';
        } elseif ($remainingCount == 1) {
            // Only first name
            $data['first_name'] = $remainingParts[0];
            $data['middle_name'] = '';
            $data['last_name'] = '';
        } elseif ($remainingCount == 2) {
            // First name and last name
            $data['first_name'] = $remainingParts[0];
            $data['middle_name'] = '';
            $data['last_name'] = $remainingParts[1];
        } else {
            // First name, middle name(s), and last name
            $data['first_name'] = $remainingParts[0];
            $data['last_name'] = $remainingParts[$remainingCount - 1];

            // Middle names (everything between first and last)
            $middleParts = array_slice($remainingParts, 1, $remainingCount - 2);
            $data['middle_name'] = implode(' ', $middleParts);
        }
    }

    private function parseAddressComponents($addressText, &$data)
    {
        // Initialize address components
        $data['address_1'] = '';
        $data['address_2'] = '';
        $data['address_3'] = '';
        $data['city'] = '';
        $data['pincode'] = '';

        // Extract pincode first (6 digits at the end)
        $pincode = '';

        if (preg_match('/(?:^|[^0-9])(\d{6})(?:[^0-9]|$)/', $addressText, $pincodeMatches)) {
            // Get all 6-digit numbers
            preg_match_all('/(?:^|[^0-9])(\d{6})(?:[^0-9]|$)/', $addressText, $allPincodes);

            // Prefer the one that looks more like a pincode (not part of other numbers)
            foreach ($allPincodes[1] as $potentialPincode) {
                // Check if it's a valid Indian pincode pattern (starts with 1-9)
                if (preg_match('/^[1-9]\d{5}$/', $potentialPincode)) {
                    $pincode = $potentialPincode;
                    break;
                }
            }

            if ($pincode) {
                $data['pincode'] = $pincode;
                // Remove the pincode and any surrounding dashes/spaces
                $addressText = preg_replace('/[-\s]*' . preg_quote($pincode, '/') . '[-\s]*/', '', $addressText);
            }
        }

        $addressText = preg_replace('/,?\s*India\s*$/i', '', $addressText);
        $addressText = trim($addressText, ' ,');

        // // Remove state from the end (but don't store it)
        $statePattern = '/,?\s*(GUJARAT|MAHARASHTRA|DELHI|UTTAR PRADESH|RAJASTHAN|KARNATAKA|TAMIL NADU|WEST BENGAL|ANDHRA PRADESH|TELANGANA|KERALA|MADHYA PRADESH|BIHAR|ODISHA|PUNJAB|HARYANA|JHARKHAND|ASSAM|CHHATTISGARH|UTTARAKHAND|HIMACHAL PRADESH|TRIPURA|MEGHALAYA|MANIPUR|NAGALAND|GOA|ARUNACHAL PRADESH|MIZORAM|SIKKIM|JAMMU AND KASHMIR|LADAKH)\s*$/i';

        if (preg_match($statePattern, $addressText, $stateMatch)) {
            // Remove state from address
            $addressText = preg_replace($statePattern, '', $addressText);
            $addressText = trim($addressText, ' ,');
        }

        // Extract city - look for common Indian city names in the address
        $city = '';

        $addressParts = explode(',', $addressText);
        $addressParts = array_map('trim', $addressParts);
        $addressParts = array_filter($addressParts, function ($part) {
            return !empty($part);
        });

        if (count($addressParts) > 0) {
            // Look at the last part and try to find a city-like word
            $lastPart = $addressParts[count($addressParts) - 1];

            // Split the last part into words
            $words = explode(' ', $lastPart);
            $words = array_map('trim', $words);
            $words = array_reverse($words);

            foreach ($words as $word) {
                if (strlen($word) > 3 && ctype_alpha($word)) {
                    $city = $word;
                    break;
                }
            }
        }

        $data['city'] = $city;

        // Split address into parts (keep everything including city)
        $addressParts = explode(',', $addressText);
        $addressParts = array_map('trim', $addressParts);
        $addressParts = array_filter($addressParts, function ($part) {
            return !empty($part);
        });
        $addressParts = array_values($addressParts);

        // Assign address parts to address_1, address_2, address_3
        if (count($addressParts) > 0) {
            $data['address_1'] = $addressParts[0];
        }
        if (count($addressParts) > 1) {
            $data['address_2'] = $addressParts[1];
        }
        if (count($addressParts) > 2) {
            $data['address_3'] = implode(', ', array_slice($addressParts, 2));
        }

        // Database lookup for city ID
        if (!empty($data['city'])) {
            $cityId = DB::table('cities')->where('name', $data['city'])->value('id');
            if ($cityId) {
                $data['city'] = $cityId;
            }
        }
    }

    private function processRegistrationNumber(&$data)
    {
        if (preg_match('/^([A-Z]{2})(\d{1,2})([A-Z]{1,2})(\d{4})$/', $data['vehicle_number'], $parts)) {
            $data['registration_number_1'] = "{$parts[1]}";
            $data['registration_number_2'] = "{$parts[2]}";
            $data['registration_number_3'] = "{$parts[3]}";
            $data['registration_number_4'] = "{$parts[4]}";
        }
    }

    private function cleanData($data)
    {
        unset($data['customer_name']);
        return array_filter($data, function ($value) {
            return !in_array(strtolower(trim($value)), ['not found', '', null]);
        });
    }
}
