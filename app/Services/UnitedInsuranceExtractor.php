<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class UnitedInsuranceExtractor
{
    use ExtractorConcern;

    public function extractData($text)
    {
        $data = [];

        $this->extractCustomerInfo($text, $data);

        $this->extractPolicyNumber($text, $data);

        $this->extractAgentName($text, $data);

        $this->extractPolicyDates($text, $data);

        $this->extractVehicleInfo($text, $data);

        $this->extractSumInsured($text, $data);

        $data = $this->cleanData($data);
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

            $this->processNameComponents($customerName, $data);

            // Address - clean up any extra whitespace
            $addressText = trim(preg_replace('/\s+/', ' ', $matches[2]));

            $this->parseAddressComponents($addressText, $data);
			
			if (preg_match('/^[1-9][0-9]{5}$/', $matches[3])) {
				$data['pincode'] = trim($matches[3]);
			}
			
			if (preg_match('/^[1-9][0-9]{5}$/', $matches[4])) {
				$data['pincode'] = trim($matches[3]);
			}
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
        if (preg_match('/VEHICLE\s+NO\.?\s*[:]*\s*(NEW|[A-Z0-9\s]+)/i', $text, $matches)) {
            // if (preg_match('/VEHICLE\s+NO\.?\s*:\s*([^\n\r]+)/i', $text, $matches)) {
            $vehicleNumber = trim($matches[1]);
            if (strtolower(trim($vehicleNumber)) != 'new') {
                $data['vehicle_number'] = $vehicleNumber;
                $this->processRegistrationNumber($data);
            }
        }

        if (preg_match('/Engine\s*No\.\s*Chassis\s*No\.\s*Make\/\s*Model\s*([\w\d]+)\s+([\w\d]+)\s+([A-Z]+)\s*\/\s*([A-Z0-9 ]+)\s*[\r\n]+([A-Z0-9 ]+)\s*Year of/i', $text, $matches)) {
            $data['engine_number']  = $matches[1];
            $data['chassis_number'] = $matches[2];
            $data['make']      = $matches[3];

            $data['model'] = $matches[4] . (isset($matches[5]) ? ' ' . $matches[5] : '');

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
}
