<?php

namespace App\Services;

use DateTime;

class IciciExtractor
{

    use ExtractorConcern;

    public function extractData($text)
    {
        $data = [];

        $this->extractCustomerInfo($text, $data);

        if (empty($data)) {
            if (str_contains($text, 'we have your car covered')) {
                $this->extractPartnerName($text, $data);
                $this->extractPartnerAddress($text, $data);
                $this->extractPolicyNumber($text, $data);
                $this->extractPartnerDates($text, $data);
                $this->extractPartnerVehicle($text, $data);
                $this->extractSumInsured($text, $data);

                $data['insurance_type'] = 'Motor';
                $data = $this->cleanData($data);
                return $data;
            } else if (str_contains($text, 'ICICI Lombard Health Care')) {

                $data['insurance_type'] = 'Health';

                $this->extractPolicyHolderDetails($text, $data);
                $this->extractPolicyDetails($text, $data);
                $this->extractPremiumDetails($text, $data);
                $this->extractNomineeDetails($text, $data);
                $this->extractInsuredDetails($text, $data);
                $this->extractAgentDetails($text, $data);

                $data = $this->cleanData($data);
                return $data;
            }
        }

        $data['insurance_type'] = '2 Wheeler';

        $this->extractCustomerAddress($text, $data);
        $this->extractCustomerMobileAndEmail($text, $data);
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
        $pattern = '/Reference\s+No\.?\s*:?\s*W\d+\s*\n\s*Date:\s*[A-Za-z]{3}\s+\d{1,2},?\s+\d{4}\s*\n\s*([A-Z\s]+?)(?=\s*\n)/i';

        if (preg_match($pattern, $text, $matches)) {
            // Customer Name
            $customerName = trim($matches[1]);
            $data['customer_name'] = $customerName;
            $this->processNameComponents($customerName, $data);
        }
    }

    private function extractPartnerName($text, &$data)
    {
        // Pattern to match "Partner Name" followed by the name
        $pattern = '/Partner\s+Name\s*\n\s*([A-Z\s]+?)\s*\n\s*([A-Z\s]+?)(?=\s*\n)/i';

        if (preg_match($pattern, $text, $matches)) {
            $partnerName = trim($matches[1]);
            $data['partner_name'] = $partnerName;
            $this->processNameComponents($partnerName, $data);

            $data['agent_name'] = trim($matches[2]);
        }
    }

    private function extractCustomerAddress($text, &$data)
    {
        $customerName = $data['customer_name'] ?? '';
        if (empty($customerName)) {
            return;
        }

        // Pattern to extract address after customer name until "Mobile No:"
        // This handles the case where customer name is followed by address lines
        $escapedName = preg_quote($customerName, '/');
        $pattern = '/' . $escapedName . '\s*\n(.*?)\s*Mobile\s+No\s*:/s';

        if (preg_match($pattern, $text, $matches)) {
            $addressText = trim($matches[1]);

            // Clean up the address - remove extra whitespace and normalize
            $addressText = preg_replace('/\s+/', ' ', $addressText);
            $addressText = trim($addressText);

            $this->parseAddressComponents($addressText, $data);
        }
    }

    private function extractPartnerAddress($text, &$data)
    {
        $pattern = '/Partner\s+Code\s*\n\s*((?:\d+[^,]*(?:,\s*[^,\n]+)*))(?=\s*\n\s*[A-Z0-9]{8,}|\s*$)/s';

        if (preg_match($pattern, $text, $matches)) {
            $addressText = trim($matches[1]);

            // Clean up the address - remove extra whitespace and normalize
            $addressText = preg_replace('/\s+/', ' ', $addressText);
            $addressText = trim($addressText);

            // Parse the address into components
            $this->parseAddressComponents($addressText, $data);
        }
    }

    private function extractCustomerMobileAndEmail($text, &$data)
    {
        // $pattern = '/Mobile\s+No\s*:\s*\n?\s*(\d+)\s*\n?\s*([A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,})?/i';
        $patternWithEmail = '/Mobile\s+No\s*:\s*\n?\s*(\d+)\s*\n?\s*([A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,})/i';

        if (preg_match($patternWithEmail, $text, $matches)) {
            $data['mobile_no'] = trim($matches[1]);

            if (isset($matches[2]) && !empty(trim($matches[2]))) {
                $data['email'] = trim($matches[2]);
            } else {
                $data['email'] = '';
            }
        } else {
            $patternMobileOnly = '/Mobile\s+No\s*:\s*\n?\s*(\d+)/i';
            if (preg_match($patternMobileOnly, $text, $matches)) {
                $data['mobile_no'] = trim($matches[1]);
            }
        }
    }

    private function extractPolicyNumber($text, &$data)
    {
        $pattern = '/Please\s+find\s+enclosed\s+Policy\s+No\.?\s*([A-Z0-9\/]+)/i';

        if (preg_match($pattern, $text, $matches)) {
            $policyNumber = trim($matches[1]);

            // Clean up policy number - remove trailing comma or period if present
            $policyNumber = rtrim($policyNumber, '.,');

            $data['policy_number'] = $policyNumber;
        }
    }

    private function extractAgentName($text, &$data)
    {
        // Pattern to match "Agency Code" followed by colon and agent name
        $pattern = '/Agency\s+Code\s*:\s*([A-Z\s]+?)(?=\s*\n)/i';

        if (preg_match($pattern, $text, $matches)) {
            $data['agent_name'] = trim($matches[1]);
        }
    }

    private function extractPolicyDates($text, &$data)
    {
        $policyNumber = $data['policy_number'];
        if (!$policyNumber) {
            return;
        }

        // Escape special regex characters in policy number
        $escapedPolicyNumber = preg_quote($policyNumber, '/');

        // Pattern to match specific policy number followed by date range
        $pattern = '/' . $escapedPolicyNumber . '\s*\n\s*([A-Za-z]{3}\s+\d{1,2},\s+\d{4})\s+\d{2}:\d{2}\s+to\s*\n\s*Midnight\s+of\s+([A-Za-z]{3}\s+\d{1,2},\s+\d{4})/i';

        if (preg_match($pattern, $text, $matches)) {
            $data['risk_start_date'] = trim($matches[1]);
            $data['risk_end_date'] = trim($matches[2]);
        }
    }

    private function extractPartnerDates($text, &$data)
    {
        // Pattern to match specific policy number followed by date range
        $pattern = '/Period\s+of\s+Insurance\s*\n\s*([A-Za-z]{3}\s+\d{1,2},\s+\d{4})\s+\d{2}:\d{2}\s+to\s+Midnight\s+of\s+([A-Za-z]{3}\s+\d{1,2},\s+\d{4})/i';

        if (preg_match($pattern, $text, $matches)) {
            $data['risk_start_date'] = $this->convertDateFormat(trim($matches[1]));
            $data['risk_end_date'] = $this->convertDateFormat(trim($matches[2]));
        }
    }

    private function extractVehicleInfo($text, &$data)
    {
        $customerName = $data['customer_name'] ?? '';
        if (empty($customerName)) {
            return;
        }

        $namePositions = [];
        $offset = 0;
        while (($pos = stripos($text, $customerName, $offset)) !== false) {
            $namePositions[] = $pos;
            $offset = $pos + 1;
        }

        // For each occurrence, check if it's followed by a date range (vehicle section indicator)
        foreach ($namePositions as $position) {
            $textFromPosition = substr($text, $position, 500); // Check next 500 chars

            // Check if this customer name instance is followed by a date range
            if (preg_match('/' . preg_quote($customerName, '/') . '\s*\n\s*([A-Za-z]{3}\s+\d{1,2},?\s+\d{4}\s+to\s+[A-Za-z]{3}\s+\d{1,2},?\s+\d{4})/i', $textFromPosition, $dateMatch)) {

                // This looks like the vehicle section - extract vehicle info
                $lines = explode("\n", $textFromPosition);
                $lines = array_map('trim', $lines);
                $lines = array_filter($lines, function ($line) {
                    return !empty($line);
                });
                $lines = array_values($lines);

                $makeModel = '';
                $vehicleNumber = '';
                $engineNumber = '';
                $chassisNumber = '';

                // Collect all potential alphanumeric lines (ignore make/model, dates, locations)
                $alphanumericLines = [];

                // Process all lines to categorize them
                for ($i = 0; $i < count($lines) && $i < 15; $i++) { // Check up to 15 lines
                    $line = $lines[$i];

                    // Skip customer name line
                    if ($line === $customerName) {
                        continue;
                    }

                    // Look for make/model (contains forward slash)
                    if (empty($makeModel) && strpos($line, '/') !== false && preg_match('/^[A-Z\s\/0-9]+$/', $line)) {
                        $makeModel = $line;
                        continue;
                    }

                    // Skip date range line
                    if (preg_match('/[A-Za-z]{3}\s+\d{1,2},?\s+\d{4}\s+to\s+[A-Za-z]{3}\s+\d{1,2},?\s+\d{4}/', $line)) {
                        continue;
                    }

                    // Skip location line (STATE-CITY format)
                    if (preg_match('/^[A-Z]+-[A-Z\s]+$/', $line)) {
                        continue;
                    }

                    // Skip standalone date lines
                    if (preg_match('/^[A-Za-z]{3}\s+\d{1,2},?\s+\d{4}$/', $line)) {
                        continue;
                    }

                    // Collect pure alphanumeric lines for vehicle info
                    if (preg_match('/^[A-Z0-9]+$/', $line)) {
                        $alphanumericLines[] = $line;
                    }
                }

                // Now categorize the alphanumeric lines based on patterns
                foreach ($alphanumericLines as $line) {
                    if (empty($vehicleNumber)) {
                        // Try multiple Indian vehicle number patterns:
                        // Pattern 1: XX##XX#### (like GJ01XA7218)
                        // Pattern 2: XX##XXX### (like DL5SCV7653)
                        // Pattern 3: More flexible - 2 letters, digits, letters, digits (8-12 total chars)
                        if (
                            preg_match('/^[A-Z]{2}\d{2}[A-Z]{2,3}\d{3,4}$/', $line) ||
                            preg_match('/^[A-Z]{2}\d[A-Z]{3}\d{4}$/', $line) ||
                            preg_match('/^[A-Z]{2}\d{1,2}[A-Z]{2,4}\d{3,4}$/', $line)
                        ) {
                            $vehicleNumber = $line;
                        }
                    }
                    // Engine number: typically 10-15 characters, mix of letters and numbers
                    if (empty($engineNumber) && strlen($line) >= 11 && strlen($line) <= 20 && preg_match('/[A-Z]/', $line) && preg_match('/\d/', $line)) {
                        $engineNumber = $line;
                    }
                    // Chassis number: typically 15+ characters, mix of letters and numbers
                    else if (empty($chassisNumber) && strlen($line) >= 15 && preg_match('/[A-Z]/', $line) && preg_match('/\d/', $line)) {
                        $chassisNumber = $line;
                    }
                }

                // If we found vehicle info, return it
                if (!empty($makeModel) || !empty($vehicleNumber) || !empty($engineNumber) || !empty($chassisNumber)) {
                    $makeModelParts = explode('/', $makeModel, 2);
                    $make = trim($makeModelParts[0] ?? '');
                    $model = trim($makeModelParts[1] ?? '');
					
					$pos = strpos($model, ' ');
					if ($pos !== false) {
						$model = substr($model, 0, $pos);
						$sub_model = substr($model, $pos + 1);
					} else {
						$model = $model;
						$sub_model = '';
					}

                    $r = [
                        'make' => $make,
                        'model' => $model,
                        'sub_model' => $sub_model
                        'vehicle_number' => $vehicleNumber,
                        'engine_number' => $engineNumber,
                        'chassis_number' => $chassisNumber
                    ];

                    $data = array_merge($data, $r);
                }
            }
        }

        $pattern1 = '/CC\/KW\s+Mfg\s+Yr\s+Seating\s+Capacity\s*\n(?:.*?\n)*?(\d+)\s*\n\s*(\d{4})/is';
        if (preg_match($pattern1, $text, $matches)) {
            $cc = trim($matches[1]);
            $yom = trim($matches[2]);
            $data['cc'] = $cc;
            $data['yom'] = $yom;
        } else {
            $ccPattern = '/CC\/KW\s*\n(?:.*?\n)*?(\d+)(?=\s*\n|\s*$)/is';
            $cc = null;
            if (preg_match($ccPattern, $text, $ccMatches)) {
                $cc = trim($ccMatches[1]);
            }

            // Extract YOM from Mfg Yr section
            $yomPattern = '/Mfg\s+Yr\s*\n(?:.*?\n)*?(\d{4})(?=\s*\n|\s*$)/is';
            $yom = null;
            if (preg_match($yomPattern, $text, $yomMatches)) {
                $yom = trim($yomMatches[1]);
            }

            $data['cc'] = $cc;
            $data['yom'] = $yom;
        }

        if ($vehicleNumber) {

            if (preg_match('/^([A-Z]{2})(\d{1,2})([A-Z]{1,2})(\d{4})$/', $vehicleNumber, $matches)) {
                $data['registration_number_1'] = "{$matches[1]}";
                $data['registration_number_2'] = "{$matches[2]}";
                $data['registration_number_3'] = "{$matches[3]}";
                $data['registration_number_4'] = "{$matches[4]}";
            }
        }
    }

    private function extractPartnerVehicle($text, &$data)
    {
        $pattern = '/Vehicle\s+Registration\s+Date\s*\n\s*([A-Z0-9]+)(?=\s*\n|\s*$)/i';
        if (preg_match($pattern, $text, $matches)) {
            $vehicleNumber = trim($matches[1]);
            $data['vehicle_number'] = $vehicleNumber;
        }

        $makePattern = '/Make\s*\n\s*([A-Z\s]+?)(?=\s*\n.*?Trailer|\s*\n\s*Model|\s*\n\s*$)/is';
        if (preg_match($makePattern, $text, $makeMatches)) {
            $make = trim($makeMatches[1]);
            $data['make'] = $make;
        }

        // Extract Model and Sub_model (Type of Body section)
        $modelPattern = '/Model\s*\n\s*Type\s+of\s+Body\s*\n\s*([A-Z\s\.]+?)\s*\n\s*([A-Z\s]+?)(?=\s*\n|\s*$)/is';
        if (preg_match($modelPattern, $text, $modelMatches)) {
            $model = trim($modelMatches[1]);
            $subModel = trim($modelMatches[2]);

            // Clean up model (remove trailing dot if present)
            $model = rtrim($model, '.');

            $data['model'] = $model;
            $data['sub_model'] = $subModel;
        }

        $enginePattern = '/Engine\s+No\.\s*\n\s*([A-Z0-9]+)(?=\s*\n|\s*$)/i';
        if (preg_match($enginePattern, $text, $engineMatches)) {
            $engineNumber = trim($engineMatches[1]);
            $data['engine_number'] = $engineNumber;
        }

        // Extract Chassis Number
        $chassisPattern = '/Chassis\s+No\.\s*\n\s*([A-Z0-9]+)(?=\s*\n|\s*$)/i';
        if (preg_match($chassisPattern, $text, $chassisMatches)) {
            $chassisNumber = trim($chassisMatches[1]);
            $data['chassis_number'] = $chassisNumber;
        }

        $pattern = '/CC\/KW\s*\n\s*Mfg\s+Yr\s*\n\s*Seating\s+Capacity\s*\n\s*(\d+)\s*\n\s*(\d{4})/i';

        if (preg_match($pattern, $text, $matches)) {
            $cc = trim($matches[1]);
            $yom = trim($matches[2]);

            $data['cc'] = $cc;
            $data['yom'] = $yom;
        }
    }

    private function extractPolicyHolderDetails($text, &$data)
    {
        $pattern = '/(?<=Policyholder Details)(.*?)(?=Family member\/Close relatives\/Associated with PEPs)/s';
        preg_match($pattern, $text, $matches);

        if (isset($matches[0])) {

            $text = preg_replace("/\r\n|\r/", "\n", $matches[0]);

            // Match name: assume it's the first non-empty line after "0 Name"
            preg_match('/0 Name\s*\n\s*([^\n]+)/', $text, $matches_name);

            // Match email: standard email pattern
            preg_match('/Email ID Invoice Number\s*\n\s*([^\s]+)/', $text, $matches_email);

            // Match phone number with asterisks
            preg_match('/Mobile Number\s*(\d{2}\*+\d{2})/', $text, $matches_phone);

            // Match address: between "Address" and "GSTIN Number"
            preg_match('/Address\s*(.*?)\s*GSTIN Number/s', $text, $matches_address);

            // Display the results

            $data['customer_name'] = $matches_name[1] ? $matches_name[1] : '';

            $this->processNameComponents(trim($data['customer_name']), $data);

            $data['email'] = $matches_email[1] ? $matches_email[1] : '';

            $data['mobile_no'] = $matches_phone[1] ? $matches_phone[1] : '';

            $addressText = $matches_address[1] ? $matches_address[1] : '';

            $this->parseAddressComponents(trim($addressText), $data);
        }
    }

    private function extractAgentDetails($text, &$data)
    {

        if (preg_match('/Agent Details(.*?)The stamp duty of/s', $text, $matches)) {

            $block = trim($matches[1]);

            // Step 2: Split into non-empty lines
            $lines = array_values(array_filter(array_map('trim', explode("\n", $block))));

            // Step 3: Chunk into key-value pairs
            $pairs = array_chunk($lines, 2);

            // Step 4: Convert to associative array with cleaned keys
            $fields = array_reduce($pairs, function ($carry, $pair) {
                if (count($pair) === 2) {
                    [$fieldName, $value] = $pair;

                    // Clean key: lowercase, remove spaces, slashes, dots, and non-alphabet characters
                    $key = strtolower($fieldName);
                    $key = str_replace([' ', '/', '.', '-'], '', $key);
                    $key = preg_replace('/[^a-z]/', '', $key);

                    $carry[$key] = $value;
                }
                return $carry;
            }, []);

            foreach ($fields as $agentField => $value) {
                $data[$agentField] = $value;
                if ($agentField == 'agentname') {
                    $data['agent_name'] = $data['agentname'];
                }
            }
            unset($data['agentname']);
            unset($data['agentcode']);
            unset($data['mobilenumber']);
            unset($data['gstinregno']);
            unset($data['hsnsaccode']);
        }
    }

    private function extractInsuredDetails($text, &$data)
    {

        if (preg_match('/Insured Details(.*?)\*Your Sum Insured value/s', $text, $matches)) {

            $insuredDetails = trim($matches[1]);

            $insuredDetails = preg_replace('/\s+/', ' ', $insuredDetails);

            // Extract Date of Birth and Age
            if (preg_match('/([A-Z][a-z]+ \d{1,2}, \d{4}) (\d{1,3})/', $insuredDetails, $dobAgeMatch)) {
                $data['insured_dob'] = $dobAgeMatch[1];
                $data['insured_age'] = $dobAgeMatch[2];
            }

            // Extract Sum Insured: look for a large number (6+ digits)
            if (preg_match('/\b(\d{6,})\b/', $insuredDetails, $sumInsuredMatch)) {
                $data['sum_insured'] = $sumInsuredMatch[1];
            }
        }
    }

    private function extractNomineeDetails($text, &$data)
    {

        $pattern = '/Nominee Details(.*?)Insured Details/s';

        preg_match($pattern, $text, $matches);

        if (isset($matches[1])) {

            $nomineeDetails = trim($matches[1]);

            $text = preg_replace("/\r\n|\r/", "\n", $nomineeDetails);

            // Extract Nominee Name
            preg_match('/Nominee Name\s+(.*)/', $text, $match_nominee);

            // Extract Relationship
            preg_match('/Relationship with Policyholder\s+(.*)/', $text, $match_relationship);

            // Extract Date of Birth
            preg_match('/Date of Birth\s+([A-Za-z]+\s+\d{2}\s+\d{4})/', $text, $match_dob);

            // Extract Appointee Name (if any name is present after the label)
            preg_match('/Appointee Name\s*(.*)/', $text, $match_appointee);

            // Output Results
            $data['nominee'] = $match_nominee[1] ?? '';

            $data['nominee_relationship'] = $match_relationship[1] ?? '';

            $data['nominee_dob'] = $match_dob[1] ?? '';

            $data['appointee'] = trim($match_appointee[1]) !== '' ? $match_appointee[1] : '';
        }
    }

    private function extractPremiumDetails($text, &$data)
    {

        $pattern = '/Premium Details\s+Basic Premium(.*?)Nominee Details/s';

        preg_match($pattern, $text, $matches);

        if (isset($matches[1])) {

            $preminumDetails = trim($matches[1]);

            preg_match('/\(\)\s*([\d,]+\.\d{2})/', $preminumDetails, $basic);

            preg_match('/Total Tax Payable\s*\(\)\s*([\d,]+\.\d{2})/', $preminumDetails, $tax);

            preg_match('/Total Premium\s*\(\)\s*([\d,]+\.\d{2})/', $preminumDetails, $total);

            $data['basic_premium'] = str_replace(',', '', $basic[1]) ?? '';
            $data['total_tax_payable'] = str_replace(',', '', $tax[1]) ?? '';
            $data['total_premium'] = str_replace(',', '', $total[1]) ?? '';
        }
    }

    private function extractPolicyDetails($text, &$data)
    {

        $pattern = '/Policy Details\s+Product Name(.*?)Premium Details\s+Basic Premium/s';

        preg_match($pattern, $text, $matches);

        if ($matches[1]) {

            $text = preg_replace("/\r\n|\r/", "\n", $matches[1]);
            $lines = array_values(array_filter(array_map('trim', explode("\n", $text))));

            // Extract the second line (contains policy data)
            $line1 = isset($lines[1]) ? preg_split('/\s+/', $lines[1]) : [];
            $line2 = isset($lines[3]) ? preg_split('/\s+/', $lines[3]) : [];

            // Parse values
            $data['policy_number'] = ($data['policy_number'] = $line1[1] ?? $data['policy_number'] = null);

            $data['risk_start_date'] = implode(' ', array_slice($line1, 2, 5));

            $rsd_date = DateTime::createFromFormat('F j, Y, H:i \h\r\s', $data['risk_start_date']);

            if ($rsd_date) {
                $data['risk_start_date'] = $rsd_date->format('Y-m-d');
            } else {
                $data['risk_start_date'] = '';
            }

            //$data['policyTenure'] = $line1[7] ?? null;

            // Line 2
            $data['risk_end_date'] = implode(' ', array_slice($line2, 0, 5));

            $red_date = DateTime::createFromFormat('F j, Y, H:i \h\r\s', $data['risk_end_date']);

            if ($red_date) {
                $data['risk_end_date'] = $red_date->format('Y-m-d');
            } else {
                $data['risk_end_date'] = '';
            }

            //$data['policyType'] = $line2[5] ?? null;

            //$data['paymentFrequency'] = $line2[6] ?? null;

        }
    }

    private function extractSumInsured($text, &$data)
    {
        $pattern = '/Vehicle\s+IDV\s*(?:\([^)]*\))?\s*:?\s*([\d,]+(?:\.\d{2})?)/i';

        if (preg_match($pattern, $text, $matches)) {
            $amount = $matches[1];

            // Remove commas and convert to float
            $cleanAmount = str_replace(',', '', $amount);
            $data['sum_insured'] = $cleanAmount;
        }
    }

    private function convertDateFormat($dateString)
    {
        try {
            // Convert "Jul 18, 2025" to "2025-07-18" format
            $date = DateTime::createFromFormat('M j, Y', $dateString);
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
