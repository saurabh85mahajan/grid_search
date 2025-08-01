<?php

namespace App\Services;

use DateTime;

class TataExtractor
{

    use ExtractorConcern;

    public function extractData($text)
    {
        $data = [];
		
		$data['insurance_company_id'] = 21;

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
        } else if (str_contains($text, 'Your health is secured with TATA')) {
            $data['insurance_type'] = 'Health';
            $this->extractHealthCustomerInfo($text, $data);
            $this->extractHealthAgentName($text, $data);
            $this->extractHealthSumInsured($text, $data);
            $this->extractHealthPolicyDetails($text, $data);
        }

        $data = $this->cleanData($data);
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
            $this->processRegistrationNumber($data);
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

    private function extractHealthAgentName($text, &$data)
    {

        $texts = preg_replace('/\s+/', ' ', $text);

        if (preg_match('/Intermediary Name\s+Intermediary Code\s+Intermediary Contact No\.\s+([a-zA-Z\s]+)\s+(\d{10})\s+(\d{10})/', $text, $matches)) {
            $data['agent_name'] = trim($matches[1]);
        }
    }

    private function extractHealthPolicyDetails($text, &$data)
    {

        $cleanText = preg_replace('/\s+/', ' ', $text);

        if(preg_match('/From:(\d{2}\/\d{2}\/\d{4})\s+\d{2}:\d{2}\s+To:(\d{2}\/\d{2}\/\d{4})/', $cleanText, $m3)){
			$risk_start_date = $m3[1] ?? '';
			$date = DateTime::createFromFormat('d/m/Y', $risk_start_date);
			if ($date) {
				$data['risk_start_date'] = $date->format('Y-m-d');
			}
			$risk_end_date = $m3[2] ?? '';
			$date = DateTime::createFromFormat('d/m/Y', $risk_end_date);
			if ($date) {
				$data['risk_end_date'] = $date->format('Y-m-d');
			}
		}		
    }

    private function extractHealthSumInsured($text, &$data)
    {
        if (preg_match('/Sum Insured \(₹\)#\s*(.*?)\s*Cumulative/s', $text, $matches)) {
            $sumInsuredRaw = trim($matches[1]);
            $data['sum_insured'] = str_replace(',', '', $sumInsuredRaw);
        }
    }

    private function extractHealthCustomerInfo($text, &$data)
    {
        if (preg_match('/Policy Schedule(.*?)Gross Premium/s', $text, $matches)) {
            
			$customerInfoStr = trim($matches[1]);

            $customerInfoStr = preg_replace('/\s+/', ' ', $customerInfoStr);

            if(preg_match('/Policy No\.\s*(\d{10})/', $customerInfoStr, $m1)){
				$data['policy_number'] = $m1[1] ?? '';
			}
            
			if(preg_match('/Name\s+([A-Za-z]+)/', $customerInfoStr, $m2)){
				
				$data['customer_name'] = $m2[1] ?? '';
				
				if($data['customer_name']){
					$this->processNameComponents($data['customer_name'], $data);
				}
			}
            
			if(preg_match('/Permanent Address\s+(.*?)\s+(\d{6})/', $customerInfoStr, $m3)){
				$address = isset($m3[1], $m3[2]) ? $m3[1] . ' ' . $m3[2] : '';
				$this->parseAddressComponents($address, $data);
			}
			
            if(preg_match_all('/\b\d{10}\b/', $customerInfoStr, $m4)){
				$data['mobile_no'] = end($m4[0]) ?? '';
			}
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
