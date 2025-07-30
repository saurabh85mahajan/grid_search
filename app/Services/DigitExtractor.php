<?php

namespace App\Services;

class DigitExtractor
{

    use ExtractorConcern;

    public function extractData($text)
    {
        $data = [];
        $aiResponse = $this->getAiResponse($text);

        if (is_null($aiResponse)) {
            return $data;
        }

        if (str_contains($text, 'Private Car')) {
            $data['insurance_type'] = 'Motor';
        }
        if (str_contains($text, 'Two-Wheeler')) {
            $data['insurance_type'] = '2 Wheeler';
        }

        $this->extractCustomerInfo($aiResponse, $data);
        $this->extractCustomerAddress($aiResponse, $data);
        $this->extractPolicyNumber($aiResponse, $data);
        $this->extractPolicyDates($aiResponse, $data);
        $this->extractVehicleInfo($aiResponse, $data);
        $this->extractSumInsured($aiResponse, $data);

        $data = $this->cleanData($data);
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
            $this->processRegistrationNumber($data);
        }

        if (preg_match('/Make\*{0,2}\s*:\s*([^\n\r]+)/i', $text, $matches)) {
            $data['make'] = trim($matches[1]);
        }

        // Extract the full Model/Variant first
        if (preg_match('/Model\/Variant(?:\s*\([^)]*\))?\*{0,2}\s*:\s*([^\n\r]+)/i', $text, $matches)) {
            $modelVariant = trim($matches[1]);

            // Split by forward slash to get model and sub model
            $parts = explode('/', $modelVariant);

            if (count($parts) >= 1) {
                $data['model'] = trim($parts[0]); // ACCESS
            }

            if (count($parts) >= 2) {
                $data['sub_model'] = trim($parts[1]); // 125 DRUM BSVI
            }
        }

        // Extract engine number
        if (preg_match('/Engine\s+Number\*{0,2}\s*:\s*([^\n\r]+)/i', $text, $matches)) {
            $data['engine_number'] = trim($matches[1]);
        }

        // Extract chassis number
        if (preg_match('/Chassis\s+Number\*{0,2}\s*:\s*([^\n\r]+)/i', $text, $matches)) {
            $data['chassis_number'] = trim($matches[1]);
        }

        // Extract cubic capacity
        if (preg_match('/Cubic\s+Capacity\*{0,2}\s*:\s*([^\n\r]+)/i', $text, $matches)) {
            $data['cc'] = trim($matches[1]);
        }

        // Extract year of manufacturing/registration
        if (preg_match('/Year\s+of\s+Registration\*{0,2}\s*:\s*([^\/\n\r]+)/i', $text, $matches)) {
            $data['yom'] = trim($matches[1]);
        }

        // Extract fuel type
        if (preg_match('/Fuel\s+Type\*{0,2}\s*:\s*([^\n\r]+)/i', $text, $matches)) {
            $data['fuel_type'] = trim($matches[1]);
        }
    }

    private function extractSumInsured($text, &$data)
    {
        // First try to extract Sum Insured directly
        if (preg_match('/Sum\s+I[ns]sured\*{0,2}\s*:\s*([^\n\r]+)/i', $text, $matches)) {
            $data['sum_insured'] = trim($matches[1]);
        }
        // If not found, try to extract from Vehicle IDV
        else if (preg_match('/Vehicle\s+IDV\*{0,2}\s*:\s*([^\n\r]+)/i', $text, $matches)) {
            $data['sum_insured'] = trim($matches[1]);
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

    private function getAiResponse($text)
    {
        $ai = app(Ai::class);

        $searchString = "The above total OD premium is inclusive of all applicable ";
        $position = strpos($text, $searchString);

        if ($position !== false) {
            $filteredText = substr($text, 0, $position);
        } else {
            $filteredText = substr($text, 0, 4000);
        }
        $systemInstruction = <<<PROMPT
You are a data extraction bot. Return ONLY exact values. No explanation. Use this format:

**Policy & Insured Details**
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
