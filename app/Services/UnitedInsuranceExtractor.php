<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UnitedInsuranceExtractor
{

    public function extractData($text)
    {
        $data = [];

        $this->extractCustomerInfo($text, $data);

        $this->extractPolicyNumber($text, $data);

        $this->extractAgentName($text, $data);

        $this->extractPolicyDates($text, $data);

        $this->extractVehicleInfo($text, $data);

        $this->extractSumInsured($text, $data);

        return $data;
    }

    private function extractCustomerInfo($text, &$data)
    {
        // Pattern to match the exact "Insured" section format
        $pattern = '/Insured\s*\n\s*(\s+[A-Z\s]+)\s*\n(.*?)\s+(\d{6})\s+([A-Z]+)\s*\n([A-Z\s]+)\s+CONTACT\s+NUMBER:\s*(\*+\d{4})\s*\(M\)/s';

        if (preg_match($pattern, $text, $matches)) {
            // Customer Name
            $customerName = trim($matches[1]);
            $data['customer_name'] = $customerName;

            // Parse name parts - remove "MR" prefix
            //$nameWithoutPrefix = trim(str_replace('MR ', '', $customerName));

            $nameParts = explode(' ', $data['customer_name']);

            $data['name_prefix'] = $nameParts[0] ?? '';

            if ($data['name_prefix']) {
                $salutationId = DB::table('salutations')->where('name', $data['name_prefix'])->orWhere('name', $data['name_prefix'] . '.')->value('id');
                $data['name_prefix'] = $salutationId;
            }

            $data['first_name'] = $nameParts[1] ?? '';

            if (count($nameParts) == 3) {
                $data['middle_name'] = '';
                $data['last_name'] = $nameParts[2];
            } elseif (count($nameParts) == 4) {
                $data['middle_name'] = $nameParts[2];
                $data['last_name'] = $nameParts[3];
            } elseif (count($nameParts) > 4) {
                $data['middle_name'] = implode(' ', array_slice($nameParts, 1, -1));
                $data['last_name'] = $nameParts[count($nameParts) - 1];
            } else {
                $data['middle_name'] = '';
                $data['last_name'] = '';
            }

            // Address - clean up any extra whitespace
            $data['address'] = trim(preg_replace('/\s+/', ' ', $matches[2]));
			
			if($data['address']){
				$address = $data['address'];
				do {
					$new_address = preg_replace('/\b(\w+)\s+\1\b/i', '$1', $address);
				} while ($new_address !== $address && $address = $new_address);

				$words = preg_split('/\s+/', trim($address));
				$wordCount = count($words);
				
				if ($wordCount >= 3) {
					$part1 = implode(' ', array_slice($words, 0, $wordCount - 2));
					$part2 = $words[$wordCount - 2];
					$part3 = $words[$wordCount - 1];
				} else {
					// If less than 3 words, assign as available
					$part1 = $words[0] ?? '';
					$part2 = $words[1] ?? '';
					$part3 = $words[2] ?? '';
				}
				$data['address_1'] = $part1;
				$data['address_2'] = $part2;
				$data['address_3'] = $part3;
			}

            // Pincode
            $data['pincode'] = trim($matches[3]);

            // City
            $data['city'] = trim($matches[4]);

            if ($data['city']) {
                $cityId = DB::table('cities')->where('name', $data['city'])->value('id');
                $data['city'] = $cityId;
            }

            // State
            $data['state'] = trim($matches[5]);
        }
    }

    private function extractPolicyNumber($text, &$data)
    {
        if (preg_match('/PolicyNo\.:\s*([A-Z0-9]+)/i', $text, $matches)) {
            $data['policy_number'] = trim($matches[1]);
        }
    }

    private function extractAgentName($text, &$data)
    {
        // Extract Agent Name - looking for the specific format "Agency/Broker Code:\nROBINHOOD"
        if (preg_match('/Agency\/Broker\s+Code:\s*\n\s*([A-Z0-9\s]+?)(?:\s*\n|\s*$)/i', $text, $matches)) {
            $data['agent_name'] = trim($matches[1]);
        }
    }

    private function extractPolicyDates($text, &$data)
    {
        // Extract Own Damage dates (risk coverage dates)
        if (preg_match('/Own\s+Damage:\s*From.*?(\d{2}\/\d{2}\/\d{4}).*?To.*?(\d{2}\/\d{2}\/\d{4})/i', $text, $matches)) {

            $data['risk_start_date'] = $matches[1];
            $data['risk_start_date'] = \DateTime::createFromFormat('d/m/Y', $data['risk_start_date'])->format('Y-m-d');

            $data['risk_end_date'] = $matches[2];
            $data['risk_end_date'] = \DateTime::createFromFormat('d/m/Y', $data['risk_end_date'])->format('Y-m-d');
        }

        // Extract Liability dates (third party coverage dates)
        if (preg_match('/Liability:\s*From.*?(\d{2}\/\d{2}\/\d{4}).*?To.*?(\d{2}\/\d{2}\/\d{4})/i', $text, $matches)) {

            $data['tp_start_date'] = $matches[1];
            $data['tp_start_date'] = \DateTime::createFromFormat('d/m/Y', $data['tp_start_date'])->format('Y-m-d');

            $data['tp_end_date'] = $matches[2];
            $data['tp_end_date'] = \DateTime::createFromFormat('d/m/Y', $data['tp_end_date'])->format('Y-m-d');
        }
    }

    private function extractVehicleInfo($text, &$data)
    {
        if (preg_match('/Engine\s*No\.\s*Chassis\s*No\.\s*Make\/\s*Model\s*([\w\d]+)\s+([\w\d]+)\s+([A-Z]+)\s*\/\s*([A-Z0-9 ]+)\s*[\r\n]+([A-Z0-9 ]+)\s*Year of/i', $text, $matches)) {
            $data['engineNo']  = $matches[1];
            $data['chassisNo'] = $matches[2];
            $data['make']      = $matches[3];

            if ($data['make']) {
                $makeId = DB::table('makes')->where('name', $data['make'])->value('id');
                $data['make'] = $makeId;
            }

            $data['model']     = $matches[4] . (isset($matches[5]) ? ' ' . $matches[5] : '');

            if (preg_match('/\b\d+\b/', $data['model'], $matches)) {
                $data['cc'] = $matches[0] ?? '';
            }

            if ($data['model']) {

                $dataModel = $data['model'];

                $pos = strpos($dataModel, ' ');
                if ($pos !== false) {
                    $data['model'] = substr($dataModel, 0, $pos);
                    $data['sub_model'] = substr($dataModel, $pos + 1);
                } else {
                    $data['model'] = $dataModel;
                    $data['sub_model'] = '';
                }
            }

            if (preg_match('/Capacity\/KW\s*\n*\s*(\b(19|20)\d{2}\b)/', $text, $matches)) {
                $data['yom'] = $matches[1];
            }
        }
    }

    private function extractSumInsured($text, &$data)
    {
        // Extract Sum Insured from the specific "Total Value" pattern
        if (preg_match('/Total\s*\n\s*Value\s*\n\s*(\d+)/s', $text, $matches)) {
            $data['sum_insured'] = trim($matches[1]);
        }
    }

    private function extractPremiumInfo($text, &$data)
    {
        // Extract Premium details
        if (preg_match('/Premium:\s*(\d+\.?\d*)/i', $text, $matches)) {
            $data['basic_premium'] = $matches[1];
        }

        if (preg_match('/IGST\(\d+%\):\s*(\d+\.?\d*)/i', $text, $matches)) {
            $data['gst_amount'] = $matches[1];
        }

        if (preg_match('/Total\(Rounded\s+off\):\s*(\d+\.?\d*)/i', $text, $matches)) {
            $data['total_premium'] = $matches[1];
        }

        // Extract Receipt Information
        if (preg_match('/Receipt\s+Number\s*[:]*\s*([A-Z0-9]+)/i', $text, $matches)) {
            $data['receipt_number'] = trim($matches[1]);
        }

        if (preg_match('/Receipt\s+Date:\s*(\d{2}\/\d{2}\/\d{4})/i', $text, $matches)) {
            $data['receipt_date'] = $matches[1];
        }
    }
}
