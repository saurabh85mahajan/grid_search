<?php

namespace App\Services;

use DateTime;
use Illuminate\Support\Facades\DB;

class TataExtractor
{

    public function extractData($text)
    {
        $data = [];

        if (str_contains($text, 'Private Car Package')) {
            $data['insurance_type'] = 'Motor';

            $this->extractCustomerInfo($text, $data);
            $this->extractCustomerAddress($text, $data);
            $this->extractCustomerMobileAndEmail($text, $data);
            $this->extractPolicyNumber($text, $data);
            $this->extractAgentName($text, $data);
            $this->extractPolicyDates($text, $data);
            $this->extractVehicleInfo($text, $data);
            $this->extractSumInsured($text, $data);
        }

        return $data;
    }

    private function extractCustomerInfo($text, &$data)
    {
        $pattern = '/Insured Name\s*:\s*([A-Z\s]+?)(?=\n|\r|$)/i';

        if (preg_match($pattern, $text, $matches)) {
            // Customer Name
            $customerName = trim($matches[1]);
            $data['customer_name'] = $customerName;
            $this->processNameComponents($customerName, $data);
        }
    }

    private function extractCustomerAddress($text, &$data)
    {

       $pattern = '/Address for Communication\s*:\s*(.+)/i';

        if (preg_match($pattern, $text, $matches)) {
            $addressText = trim($matches[1]);

            // Clean up the address - remove extra whitespace and normalize
            $addressText = preg_replace('/\s+/', ' ', $addressText);
            $addressText = trim($addressText);

            $this->parseAddressComponents($addressText, $data);
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
        if (preg_match('/\b(\d{6})\b/', $addressText, $pincodeMatch)) {
            $pincode = $pincodeMatch[1];
            $data['pincode'] = $pincode;

            // Remove pincode from address text
            $addressText = preg_replace('/\s*-?\s*\b' . preg_quote($pincode, '/') . '\b\s*/', '', $addressText);
            $addressText = trim($addressText, ' ,');
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

    private function extractCustomerMobileAndEmail($text, &$data)
    {
        // Single pattern to capture phone, email, and "Valid from"
        $pattern = '/(\+91[\s\d\*]+)\s+([A-Za-z0-9\*]+@[A-Za-z0-9\*]+\.[A-Za-z]+)\s+(Valid\s+from)/i';

        if (preg_match($pattern, $text, $matches)) {
            $data['mobile_no'] = trim($matches[1]);
            $data['email'] = trim($matches[2]);
        }
    }

    private function extractPolicyNumber($text, &$data)
    {
        $pattern = '/Policy\s+No\.\s+(\d+)/i';

        if (preg_match($pattern, $text, $matches)) {
            $policyNumber = trim($matches[1]);

            // Clean up policy number - remove trailing comma or period if present
            $policyNumber = rtrim($policyNumber, '.,');

            $data['policy_number'] = $policyNumber;
        }
    }

    private function extractAgentName($text, &$data)
    {
        $pattern = '/Agent\s+Name\s*:\s*([A-Za-z\s]+)/i';

        if (preg_match($pattern, $text, $matches)) {
            $data['agent_name'] = trim($matches[1]);
        }
    }

    private function extractPolicyDates($text, &$data)
    {
        $odPattern = '/OD\s+cover\s+period\s*:\s*(\d{1,2}\s+\w{3}\s+\'\d{2})\s*\([^)]+\)\s*to\s*(\d{1,2}\s+\w{3}\s+\'\d{2})\s*\([^)]+\)/i';
        
        // Pattern for TP cover period  
        $tpPattern = '/TP\s+cover\s+period\s*:\s*(\d{1,2}\s+\w{3}\s+\'\d{2})\s*\([^)]+\)\s*to\s*(\d{1,2}\s+\w{3}\s+\'\d{2})\s*\([^)]+\)/i';
        
        // Extract OD dates
        if (preg_match($odPattern, $text, $odMatches)) {
            $data['risk_start_date'] = $this->convertDateFormat(trim($odMatches[1]));
            $data['risk_end_date'] = $this->convertDateFormat(trim($odMatches[2]));
        }
        
        // Extract TP dates
        if (preg_match($tpPattern, $text, $tpMatches)) {
            $data['tp_start_date'] = $this->convertDateFormat(trim($tpMatches[1]));
            $data['tp_end_date'] = $this->convertDateFormat(trim($tpMatches[2]));
        }
        
        return $data;
    }

    private function extractVehicleInfo($text, &$data)
    {

        $pattern = '/Registration\s+no\s*:\s*([A-Z]{2}\s+\d{2}\s+[A-Z]{1,2}\s+\d{1,4})/i';
        if (preg_match($pattern, $text, $matches)) {
            $data['vehicle_number'] = trim($matches[1]);
        }

        $pattern = '/Engine\s+Number\/Battery\s+Number\s*:\s*([^\/]+)/i';
        if (preg_match($pattern, $text, $matches)) {
            $data['engine_number'] = trim($matches[1]);
        }

        $pattern = '/Chassis\s+number\s*:\s*([A-Z0-9]+)/i';
        if (preg_match($pattern, $text, $matches)) {
            $data['chassis_number'] = trim($matches[1]);
        }

        $pattern = '/Vehicle\s+Details\s*:\s*([^\/]+)\s*\/\s*([^\/]+)(?:\s*\/\s*([^\/]+))?(?:\s*\/\s*[^\/]+)?/i';
        if (preg_match($pattern, $text, $matches)) {
            $data['make'] = trim($matches[1]);
            $data['model'] = trim($matches[2]);
            $data['sub_model'] = isset($matches[3]) ? trim($matches[3]) : null;
        }
    }

    private function extractSumInsured($text, &$data)
    {
        $pattern = '/Insured\'?s?\s+Declared\s+Value\s*:?\s*₹?\s*([\d,]+(?:\.\d{2})?)/i';

        if (preg_match($pattern, $text, $matches)) {
            $amount = $matches[1];

            // Remove commas and convert to float
            $cleanAmount = str_replace(',', '', $amount);
            $data['sum_insured'] = $cleanAmount;
        }
    }

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

private function convertDateFormat($dateString)
{
    try {
        // Convert "26 Jul '25" to "2025-07-26" format
        $date = DateTime::createFromFormat('j M \'y', $dateString);
        if ($date) {
            return $date->format('Y-m-d');
        }
    } catch (\Exception $e) {
        // Return original if conversion fails
        return $dateString;
    }
    
    return $dateString;
}
}
