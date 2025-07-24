<?php

namespace App\Services;

class DigitExtractor
{
    public function extractData($text)
    {
        $data = [];
        
        $this->extractCustomerInfo($text, $data);
        $this->extractPolicyNumber($text, $data);
        $this->extractAgentInfo($text, $data);
        $this->extractPolicyDates($text, $data);
        $this->extractVehicleInfo($text, $data);
        $this->extractSumInsured($text, $data);
        $this->extractPremiumInfo($text, $data);
        
        return $data;
    }
    
    private function extractCustomerInfo($text, &$data)
    {
        // Extract customer name from "YOUR DETAILS" section
        if (preg_match('/([A-Z\s\.]+)\s*\n?\s*Email:/i', $text, $matches)) {
            $customerName = trim($matches[1]);
            
            // Remove dots and clean up the name
            $customerName = str_replace('.', '', $customerName);
            $customerName = trim($customerName);
            
            $data['customer_name'] = $customerName;
            
            // Parse name parts
            $nameParts = explode(' ', $customerName);
            $nameParts = array_filter($nameParts, function($part) {
                return !empty(trim($part));
            }); // Remove empty elements
            $nameParts = array_values($nameParts); // Re-index array
            
            $data['first_name'] = $nameParts[0] ?? '';
            
            if (count($nameParts) == 1) {
                $data['middle_name'] = '';
                $data['last_name'] = '';
            } elseif (count($nameParts) == 2) {
                $data['middle_name'] = '';
                $data['last_name'] = $nameParts[1];
            } elseif (count($nameParts) == 3) {
                $data['middle_name'] = $nameParts[1];
                $data['last_name'] = $nameParts[2];
            } elseif (count($nameParts) > 3) {
                $data['middle_name'] = implode(' ', array_slice($nameParts, 1, -1));
                $data['last_name'] = $nameParts[count($nameParts) - 1];
            }
        }

        // Extract address
        if (preg_match('/Address\s+([A-Z0-9\s,\-\.]+?)(?:\s*AddOn\s+Cover|\s*YOUR\s+VEHICLE|\s*RTO\s+Location)/is', $text, $matches)) {
            $address = trim($matches[1]);
            
            // Clean up address and extract components
            $addressParts = explode(',', $address);
            
            // Extract pincode (6 digits) from address
            if (preg_match('/(\d{6})/', $address, $pincodeMatch)) {
                $data['pincode'] = $pincodeMatch[1];
            }
            
            // Extract state and city from address pattern
            if (preg_match('/([A-Z\s]+),\s*([A-Z\s]+)-(\d{6})/', $address, $locationMatch)) {
                $data['city'] = trim($locationMatch[1]);
                $data['state'] = trim($locationMatch[2]);
                $data['pincode'] = $locationMatch[3];
            }
            
            $data['address'] = $address;
        }
    }
    
    private function extractPolicyNumber($text, &$data)
    {
        // Extract policy number from multiple possible patterns
        if (preg_match('/Policy\s+No[:\.]?\s*([A-Z0-9]+)/i', $text, $matches)) {
            $data['policy_number'] = trim($matches[1]);
        } elseif (preg_match('/Policy\s+Number[:\.]?\s*([A-Z0-9\/\s]+)/i', $text, $matches)) {
            $policyNumber = trim($matches[1]);
            // Extract the main policy number (before any slash)
            $policyParts = explode('/', $policyNumber);
            $data['policy_number'] = trim($policyParts[0]);
        }
    }
    
    private function extractAgentInfo($text, &$data)
    {
        // Extract partner/agent name
        if (preg_match('/Partner\s+Name[:\.]?\s*([A-Za-z\s]+(?:Private\s+Limited|Ltd\.?)?)/i', $text, $matches)) {
            $data['agent_name'] = trim($matches[1]);
        }
        
        // Extract partner code
        if (preg_match('/Partner\s+Code[:\.]?\s*(\d+)/i', $text, $matches)) {
            $data['agent_code'] = trim($matches[1]);
        }
    }
    
    private function extractPolicyDates($text, &$data)
    {
        // Extract Own Damage Cover dates
        if (preg_match('/Own\s+Damage\s+Cover.*?From\s+(\d{2}-\w{3}-\d{4}).*?To\s+(\d{2}-\w{3}-\d{4})/is', $text, $matches)) {
            $data['risk_start_date'] = $this->convertDateFormat($matches[1]);
            $data['risk_end_date'] = $this->convertDateFormat($matches[2]);
        }
        
        // Extract Third Party Liability dates
        if (preg_match('/Third\s+Party\s+Liability.*?From\s+(\d{2}-\w{3}-\d{4}).*?To\s+(\d{2}-\w{3}-\d{4})/is', $text, $matches)) {
            $data['tp_start_date'] = $this->convertDateFormat($matches[1]);
            $data['tp_end_date'] = $this->convertDateFormat($matches[2]);
        }
        
        // Extract PA Owner-Driver dates if different
        if (preg_match('/PA\s+Owner-Driver.*?From\s+(\d{2}-\w{3}-\d{4}).*?To\s+(\d{2}-\w{3}-\d{4})/is', $text, $matches)) {
            $data['pa_start_date'] = $this->convertDateFormat($matches[1]);
            $data['pa_end_date'] = $this->convertDateFormat($matches[2]);
        }
    }
    
    private function extractVehicleInfo($text, &$data)
    {
        // Extract registration number
        if (preg_match('/Registration\s+Number[:\.]?\s*([A-Z0-9\s]+)/i', $text, $matches)) {
            $data['registration_number'] = trim($matches[1]);
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
            $data['cubic_capacity'] = trim($matches[1]);
        }
        
        // Extract year of manufacturing/registration
        if (preg_match('/Year\s+of\s+Regn\.?\/\s*Manufacturing\s+(\d{4})\/(\d{4}-\d{2}-\d{2})/i', $text, $matches)) {
            $data['year_of_manufacturing'] = trim($matches[1]);
            $data['manufacturing_date'] = trim($matches[2]);
        } elseif (preg_match('/Year\s+of\s+(?:Regn|Manufacturing)\s+(\d{4})/i', $text, $matches)) {
            $data['year_of_manufacturing'] = trim($matches[1]);
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
            'Jan' => '01', 'Feb' => '02', 'Mar' => '03', 'Apr' => '04',
            'May' => '05', 'Jun' => '06', 'Jul' => '07', 'Aug' => '08',
            'Sep' => '09', 'Oct' => '10', 'Nov' => '11', 'Dec' => '12'
        ];
        
        if (preg_match('/(\d{2})-(\w{3})-(\d{4})/', $dateString, $matches)) {
            $day = $matches[1];
            $month = $months[$matches[2]] ?? $matches[2];
            $year = $matches[3];
            return "$day/$month/$year";
        }
        
        return $dateString; // Return original if format doesn't match
    }
}