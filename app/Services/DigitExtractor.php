<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class DigitExtractor
{
    public function extractData($text)
    {
        
        $aiResponse = $this->getAiResponse($text);

        if (is_null($aiResponse)) {
            $extractFrom = $text;
        } else {
            $extractFrom = $aiResponse;
        }
        $data = [];

        if (str_contains($text, 'Private Car')) {
            $data['insurance_type'] = 'Motor';
        }
        if (str_contains($text, 'Two-Wheeler')) {
            $data['insurance_type'] = '2 Wheeler';
        }

        dump($extractFrom);

        $this->extractCustomerInfo($extractFrom, $data);
        $this->extractCustomerAddress($extractFrom, $data);
        $this->extractPolicyNumber($extractFrom, $data);
        $this->extractPolicyDates($extractFrom, $data);
        $this->extractVehicleInfo($extractFrom, $data);
        dd($data);
        $this->extractSumInsured($extractFrom, $data);

        return $data;
    }

    private function extractCustomerInfo($text, &$data)
    {
        $pattern = '/Insured\s+Name\*{0,2}\s*:\s*([^\n\r]+)/i';
        if (preg_match($pattern, $text, $matches)) {
            $customerName = trim($matches[1]);

            // Remove dots and clean up the name
            $customerName = str_replace('.', '', $customerName);
            $customerName = trim($customerName);

            $data['customer_name'] = $customerName;

            $this->processNameComponents($customerName, $data);
        }
    }


    private function extractCustomerAddress($text, &$data)
    {
        $pattern = '/Insured\s+Full\s+Address\*{0,2}\s*:\s*([^\n\r]+)/i';

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

    private function extractPolicyNumber($text, &$data)
    {
        $pattern = '/Policy\s+Number\*{0,2}\s*:\s*([^\/\n\r]+)/i';

        if (preg_match($pattern, $text, $matches)) {
           $data['policy_number'] = trim($matches[1]);
        }
    }

    private function extractAgentInfo($text, &$data)
    {
        // Extract partner/agent name
        if (preg_match('/Partner\s+Name[:\.]?\s*([A-Za-z\s]+?(?:Private\s+Limited|Ltd\.?)?)(?=\n|\r|$)/i', $text, $matches)) {
            $data['agent_name'] = trim($matches[1]);
        }
    }

    private function extractPolicyDates($text, &$data)
    {
        if (preg_match('/Risk\s+From\s+Date\*{0,2}\s*:\s*(\d{2}-\w{3}-\d{4})/i', $text, $matches)) {
            $data['risk_start_date'] = $this->convertDateFormat($matches[1]);
        }
        
        if (preg_match('/Risk\s+To\s+Date\*{0,2}\s*:\s*(\d{2}-\w{3}-\d{4})/i', $text, $matches)) {
            $data['risk_end_date'] = $this->convertDateFormat($matches[1]);
        }

        // Extract Third Party From Date and Third Party To Date
        if (preg_match('/Third\s+Party\s+From\s+Date\*{0,2}\s*:\s*(\d{2}-\w{3}-\d{4})/i', $text, $matches)) {
            $data['tp_start_date'] = $this->convertDateFormat($matches[1]);
        }
        
        if (preg_match('/Third\s+Party\s+To\s+Date\*{0,2}\s*:\s*(\d{2}-\w{3}-\d{4})/i', $text, $matches)) {
            $data['tp_end_date'] = $this->convertDateFormat($matches[1]);
        }
    }

    private function extractVehicleInfo($text, &$data)
    {
        // Extract registration number
        if (preg_match('/Registration\s+Number\*{0,2}\s*:\s*([A-Z0-9\s]+?)(?=\n|\r|$)/i', $text, $matches)) {
            $data['vehicle_number'] = trim($matches[1]);
        }

        // Extract make and model
        if (preg_match('/Make\s+([A-Z]+).*?Model\/Vehicle\s+Variant.*?\s+([A-Z0-9\/\s\(\)\.]+)/is', $text, $matches)) {
            $data['make'] = trim($matches[1]);
            $data['model'] = trim($matches[2]);
        }

        // Extract engine number
        if (preg_match('/Engine\s+No[\.:]?\s*([A-Z0-9]+)/i', $text, $matches)) {
            $data['engine_number'] = trim($matches[1]);
        }

        // Extract chassis number
        if (preg_match('/Chassis\s+No[\.:]?\s*([A-Z0-9]+)/i', $text, $matches)) {
            $data['chassis_number'] = trim($matches[1]);
        }

        // Extract cubic capacity
        if (preg_match('/Cubic\s+Capacity\s+(\d+)\s*CC/i', $text, $matches)) {
            $data['cc'] = trim($matches[1]);
        }

        // Extract year of manufacturing/registration
        if (preg_match('/Year\s+of\s+Regn\.?\/\s*Manufacturing\s+(\d{4})\/(\d{4}-\d{2}-\d{2})/i', $text, $matches)) {
            $data['yom'] = trim($matches[1]);
        } elseif (preg_match('/Year\s+of\s+(?:Regn|Manufacturing)\s+(\d{4})/i', $text, $matches)) {
            $data['yom'] = trim($matches[1]);
        }

        // Extract fuel type
        if (preg_match('/Fuel\s+Type\s+([A-Za-z]+)/i', $text, $matches)) {
            $data['fuel_type'] = trim($matches[1]);
        }

        // Extract seating capacity
        if (preg_match('/Seating\s+Capacity\s+(\d+)/i', $text, $matches)) {
            $data['seating_capacity'] = trim($matches[1]);
        }
    }

    private function extractSumInsured($text, &$data)
    {
        // Extract IDV (Insured Declared Value) from vehicle details table
        if (preg_match('/Total\s+IDV[^\d]*(\d+)\.?(\d*)/i', $text, $matches)) {
            $idv = $matches[1];
            if (!empty($matches[2])) {
                $idv .= '.' . $matches[2];
            }
            $data['sum_insured'] = $idv;
        }

        // Alternative pattern for IDV in Year 1 row
        if (!isset($data['sum_insured']) && preg_match('/Year\s+1\s+(\d+)\s+--\s+--\s+--\s+--\s+(\d+)\.(\d+)/i', $text, $matches)) {
            $data['sum_insured'] = $matches[2] . '.' . $matches[3];
        }
    }

    private function extractPremiumInfo($text, &$data)
    {
        // Extract Net Premium
        if (preg_match('/Net\s+Premium[^\d]*(\d+\.?\d*)/i', $text, $matches)) {
            $data['net_premium'] = $matches[1];
        }

        // Extract IGST amount
        if (preg_match('/IGST\s*@\s*\d+%[^\d]*(\d+\.?\d*)/i', $text, $matches)) {
            $data['gst_amount'] = $matches[1];
        }

        // Extract Final Premium
        if (preg_match('/Final\s+Premium[^\d]*(\d+\.?\d*)/i', $text, $matches)) {
            $data['total_premium'] = $matches[1];
        }

        // Extract Basic Own Damage Premium
        if (preg_match('/Total\s+Basic\s+Own\s+Damage\s+Premium[^\d]*(\d+\.?\d*)/i', $text, $matches)) {
            $data['basic_od_premium'] = $matches[1];
        }

        // Extract Basic Third Party Premium
        if (preg_match('/Basic\s+Third-Party\s+Liability[^\d]*(\d+\.?\d*)/i', $text, $matches)) {
            $data['basic_tp_premium'] = $matches[1];
        }

        // Extract NCB Discount
        if (preg_match('/NCB\s+Discount\s+Amount[^\d\-]*-?(\d+\.?\d*)/i', $text, $matches)) {
            $data['ncb_discount'] = $matches[1];
        }

        // Extract NCB percentage
        if (preg_match('/NCB\s+%.*?(\d+)%/i', $text, $matches)) {
            $data['ncb_percentage'] = $matches[1];
        }

        // Extract Receipt Number
        if (preg_match('/Receipt\s+Number[:\.]?\s*([A-Z0-9]+)/i', $text, $matches)) {
            $data['receipt_number'] = trim($matches[1]);
        }

        // Extract Receipt Date
        if (preg_match('/Receipt\s+Date[:\.]?\s*(\d{2}-\w{3}-\d{4})/i', $text, $matches)) {
            $data['receipt_date'] = $this->convertDateFormat($matches[1]);
        }

        // Extract Invoice Number
        if (preg_match('/Invoice\s+No[\.:]?\s*([A-Z0-9]+)/i', $text, $matches)) {
            $data['invoice_number'] = trim($matches[1]);
        }

        // Extract Invoice Date
        if (preg_match('/Invoice\s+Date[:\.]?\s*(\d{2}-\w{3}-\d{4})/i', $text, $matches)) {
            $data['invoice_date'] = $this->convertDateFormat($matches[1]);
        }
    }

    private function convertDateFormat($dateString)
    {
        // Convert from "12-Jul-2025" format to "12/07/2025" format
        $months = [
            'Jan' => '01',
            'Feb' => '02',
            'Mar' => '03',
            'Apr' => '04',
            'May' => '05',
            'Jun' => '06',
            'Jul' => '07',
            'Aug' => '08',
            'Sep' => '09',
            'Oct' => '10',
            'Nov' => '11',
            'Dec' => '12'
        ];

        if (preg_match('/(\d{2})-(\w{3})-(\d{4})/', $dateString, $matches)) {
            $day = $matches[1];
            $month = $months[$matches[2]] ?? $matches[2];
            $year = $matches[3];
            return "$day/$month/$year";
        }

        return $dateString; // Return original if format doesn't match
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

    private function getAiResponse($text)
    {
        $ai = app(Ai::class);

        //todo improve
        $filteredText = substr($text, 0, 4000);
    $systemInstruction = <<<PROMPT
You are a data extraction bot. Return ONLY exact values. No explanation. Use this format:

**Policy & Insured Details**
* **Insured Type**: 
* **Insured Name**: 
* **Insured Full Address**: 
* **Insured Mobile**: 
* **Insured Email**: 
* **Policy Number**: 
* **Risk From Date**: 
* **Risk To Date**: 
* **Third Party From Date**: 
* **Third Party To Date**: 
* **Sum Issured**:

**Vehicle Details**
* **Registration Number**: 
* **Make**: 
* **Model/Variant**: 
* **Fuel Type**: 
* **Year of Registration**: 
* **Engine Number**: 
* **Chassis Number**: 
* **Cubic Capacity**: 
* **Vehicle IDV**: 

Use 'Not Found' if value is missing.
PROMPT;

    $userPrompt = "Extract the details from the following:\n\n" . $filteredText;
    
        $result = $ai->ask($systemInstruction, $userPrompt);

        return $result;
    }
}
