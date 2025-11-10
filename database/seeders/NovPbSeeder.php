<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NovPbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policies = [];

        // BAJAJ - PRIVATE CAR - Comprehensive
        $insurer = 'BAJAJ';
        $segment = 'PRIVATE CAR';
        $location = 'All RTOs';
        $insurerRemarks = 'ODD Upto 80% Allowed';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['remarks_additional' => 'Petrol With & Without NCB & Diesel with NCB - Non High End', 'points' => 27],
                ['remarks_additional' => 'Diesel Without NCB - - Non High End', 'points' => 9],
                ['remarks_additional' => 'High End Vehicles - All Fuel - With NCB', 'points' => 22],
                ['remarks_additional' => 'High End Vehicles - All Fuel - Without NCB', 'points' => 9],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'location' => $location,
                'insurer_remarks' => $insurerRemarks,
                'policy_type' => $policyType,
            ], $policy);
        }

        // SBI - PRIVATE CAR - Comprehensive & SAOD
        $insurer = 'SBI';
        $segment = 'PRIVATE CAR';
        $insurerRemarks = 'Upto 15 Years - All Fuel';
        $location = 'All RTOs';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'With NCB Only (Without NCB Less 5% PO)', 'points' => 27],
                ['policy_type' => 'SAOD', 'remarks_additional' => 'For Audi/BMW/Mercedes Makes PO - 13%', 'points' => 24],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'location' => $location,
                'insurer_remarks' => $insurerRemarks,
            ], $policy);
        }

        // CHOLA - PRIVATE CAR - Comprehensive & SAOD
        $insurer = 'CHOLA';
        $segment = 'PRIVATE CAR';
        $location = 'All RTOs';

        foreach (
            [
                ['insurer_remarks' => 'Petrol, Diesel, CNG/LPG, Electric - Without CPA Less 1.5%', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'Upto 1500 CC', 'points' => 22],
                ['insurer_remarks' => 'Petrol, Diesel, CNG/LPG, Electric - Without CPA Less 1.5%', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 1500 CC', 'points' => 27],
                ['insurer_remarks' => 'Petrol, CNG/LPG, Electric - Without CPA Less 1.5%', 'policy_type' => 'SAOD', 'remarks_additional' => '1000-1500 CC', 'points' => 13],
                ['insurer_remarks' => 'Petrol, CNG/LPG, Electric - Without CPA Less 1.5%', 'policy_type' => 'SAOD', 'remarks_additional' => 'Above 1500 CC', 'points' => 18],
                ['insurer_remarks' => 'Diesel - Without CPA Less 1.5%', 'policy_type' => 'SAOD', 'remarks_additional' => 'Above 1500 CC', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'location' => $location,
            ], $policy);
        }

        // HDFC - PRIVATE CAR - Comprehensive & SAOD
        $insurer = 'HDFC';
        $segment = 'PRIVATE CAR';
        $location = 'All RTOs';

        foreach (
            [
                ['insurer_remarks' => 'Petrol', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'With NCB & Without NCB', 'points' => 20],
                ['insurer_remarks' => 'Diesel, CNG & LPG', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'With NCB', 'points' => 20],
                ['insurer_remarks' => 'Diesel, CNG & LPG', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'Without NCB', 'points' => 11],
                ['insurer_remarks' => 'Petrol & Electric', 'policy_type' => 'SAOD', 'remarks_additional' => 'With & Without NCB', 'points' => 20],
                ['insurer_remarks' => 'Diesel, CNG & LPG', 'policy_type' => 'SAOD', 'remarks_additional' => 'With NCB', 'points' => 13],
                ['insurer_remarks' => 'Diesel, CNG & LPG', 'policy_type' => 'SAOD', 'remarks_additional' => 'Without NCB', 'points' => 9],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'location' => $location,
            ], $policy);
        }


        // SHRIRAM - PRIVATE CAR - Comprehensive
        $insurer = 'SHRIRAM';
        $segment = 'PRIVATE CAR';
        $location = 'All RTOs';
        $policyType = 'Comprehensive';
        $insurerRemarks = 'PETROL/CNG/LPG - Excluding Electric';

        foreach (
            [
                ['remarks_additional' => '1+3. Only HONDA & HYUNDAI & KIA manufacture only', 'points' => 29],
                ['remarks_additional' => 'PO On NET Upto 15 Years - With NCB Only', 'points' => 22],
                ['remarks_additional' => 'PO On NET Upto 15 Years - Without NCB Only Decline Maruti ALTO/SWIFT', 'points' => 18],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'location' => $location,
                'policy_type' => $policyType,
                'insurer_remarks' => $insurerRemarks,
            ], $policy);
        }

        // GO DIGIT - PRIVATE CAR - Comprehensive & SAOD
        $insurer = 'DIGIT';
        $segment = 'PRIVATE CAR';
        $remarks = 'All Fuel';

        foreach (
            [
                ['insurer_remarks' => 'Non High End Vehicles', 'policy_type' => 'Comprehensive', 'location' => 'PB - Jalandhar', 'points' => 25],
                ['insurer_remarks' => 'Non High End Vehicles', 'policy_type' => 'Comprehensive', 'location' => 'PB + CH', 'points' => 22],
                ['insurer_remarks' => 'High End Vehicles', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'points' => 17],
                ['insurer_remarks' => 'Non High End Vehicles', 'policy_type' => 'SAOD', 'location' => 'PB - Jalandhar', 'points' => 23],
                ['insurer_remarks' => 'Non High End Vehicles', 'policy_type' => 'SAOD', 'location' => 'PB + CH', 'points' => 22],
                ['insurer_remarks' => 'High End Vehicles', 'policy_type' => 'SAOD', 'location' => 'All RTOs', 'points' => 17],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'remarks_additional' => $remarks,
            ], $policy);
        }

        // LIBERTY - PRIVATE CAR - Comprehensive & SAOD
        $insurer = 'LIBERTY';
        $segment = 'PRIVATE CAR';
        $insurerRemarks = 'Excluding Electric';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Petrol', 'points' => 26],
                ['policy_type' => 'Comprehensive', 'location' => 'PUNJAB - 1 & 2', 'remarks_additional' => 'Petrol', 'points' => 27],
                ['policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Diesel & CNG - Without NCB', 'points' => 22],
                ['policy_type' => 'Comprehensive', 'location' => 'PUNJAB - 1 & 2', 'remarks_additional' => 'Diesel & CNG - Without NCB', 'points' => 18],
                ['policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Diesel & CNG - With NCB', 'points' => 22],
                ['policy_type' => 'Comprehensive', 'location' => 'PUNJAB - 1 & 2', 'remarks_additional' => 'Diesel & CNG - With NCB', 'points' => 22],
                ['policy_type' => 'SAOD', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'All Fuel - With NCB', 'points' => 22],
                ['policy_type' => 'SAOD', 'location' => 'PUNJAB - 1 & 2', 'remarks_additional' => 'All Fuel - With NCB', 'points' => 20],
                ['policy_type' => 'SAOD', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'All Fuel - Without NCB', 'points' => 16],
                ['policy_type' => 'SAOD', 'location' => 'PUNJAB - 1 & 2', 'remarks_additional' => 'All Fuel - Without NCB', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => $insurerRemarks,
            ], $policy);
        }

        // TATA - PRIVATE CAR - Comprehensive & SAOD
        $insurer = 'TATA';
        $segment = 'PRIVATE CAR';
        $location = 'All RTOs';
        $remarks = 'All Fuel';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 17],
                ['policy_type' => 'SAOD', 'points' => 17],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'location' => $location,
                'remarks_additional' => $remarks,

            ], $policy);
        }

        // MAGMA - PRIVATE CAR - Comprehensive
        $insurer = 'MAGMA';
        $segment = 'PRIVATE CAR';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['insurer_remarks' => 'Petrol - PO On NET', 'location' => 'CH', 'remarks_additional' => '1+3', 'points' => 23],
                ['insurer_remarks' => 'Petrol - PO On NET', 'location' => 'PB2', 'remarks_additional' => '1+3', 'points' => 27],
                ['insurer_remarks' => 'Diesel - PO On NET', 'location' => 'CH & PB1', 'remarks_additional' => '1+3', 'points' => 23],
                ['insurer_remarks' => 'Petrol - PO On NET', 'location' => 'CH & PB1', 'remarks_additional' => '1+1 - With NCB', 'points' => 17],
                ['insurer_remarks' => 'Petrol - PO On NET', 'location' => 'PB2', 'remarks_additional' => '1+1 - With NCB', 'points' => 15],
                ['insurer_remarks' => 'Petrol - PO On NET', 'location' => 'CH', 'remarks_additional' => '1+1 - Without NCB', 'points' => 16],
                ['insurer_remarks' => 'Petrol - PO On NET', 'location' => 'PB1', 'remarks_additional' => '1+1 - Without NCB', 'points' => 17],
                ['insurer_remarks' => 'Petrol - PO On NET', 'location' => 'PB2', 'remarks_additional' => '1+1 - Without NCB', 'points' => 15],
                ['insurer_remarks' => 'Diesel - PO On NET', 'location' => 'CH', 'remarks_additional' => '1+1 - With NCB', 'points' => 16],
                ['insurer_remarks' => 'Diesel - PO On NET', 'location' => 'PB1 & PB2', 'remarks_additional' => '1+1 - With NCB', 'points' => 17],
                ['insurer_remarks' => 'Diesel - PO On NET', 'location' => 'CH', 'remarks_additional' => '1+1 - Without NCB', 'points' => 17],
                ['insurer_remarks' => 'Diesel - PO On NET', 'location' => 'PB1', 'remarks_additional' => '1+1 - Without NCB', 'points' => 17],
                ['insurer_remarks' => 'Diesel - PO On NET', 'location' => 'PB2', 'remarks_additional' => '1+1 - Without NCB', 'points' => 16],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // ZUNO - PRIVATE CAR - Comprehensive & SAOD
        $insurer = 'ZUNO';
        $segment = 'PRIVATE CAR';

        foreach (
            [
                ['insurer_remarks' => 'All Fuel', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh & Mohali', 'remarks_additional' => 'With NCB ODD 85% And Above Points = 1.70 X', 'points' => 22],
                ['insurer_remarks' => 'All Fuel', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh & Mohali', 'remarks_additional' => 'Without NCB', 'points' => 13],
                ['insurer_remarks' => 'All Fuel', 'policy_type' => 'SAOD', 'location' => 'Chandigarh & Mohali', 'remarks_additional' => 'ODD 85% And Above Points = 1.70 X', 'points' => 19],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ICICI - PRIVATE CAR - Comprehensive & SAOD
        $insurer = 'ICICI';
        $segment = 'PRIVATE CAR';
        $location = 'All RTOs';
        $insurerRemarks = 'All Fuel - 1+3 & 1+1 NO POINTS ON NEGATIVE MODELS';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'With NCB', 'points' => 27],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Without NCB', 'points' => 15],
                ['policy_type' => 'SAOD', 'remarks_additional' => 'With NCB', 'points' => 27],
                ['policy_type' => 'SAOD', 'remarks_additional' => 'Without NCB', 'points' => 15],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => $insurerRemarks,
                'location' => $location,
            ], $policy);
        }

        // UNIVERSAL SOMPO - PRIVATE CAR - Comprehensive & SAOD
        $insurer = 'SOMPO';
        $segment = 'PRIVATE CAR';
        $location = 'All RTOs';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'With NCB', 'points' => 26],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Without NCB', 'points' => 21],
                ['policy_type' => 'SAOD', 'remarks_additional' => '', 'points' => 21],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'location' => $location,
            ], $policy);
        }

        // FUTURE - PRIVATE CAR - Comprehensive & SAOD
        $insurer = 'FUTURE';
        $segment = 'PRIVATE CAR';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'System RTO', 'points' => 27],
                ['policy_type' => 'SAOD', 'location' => 'System RTO', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ROYAL - PRIVATE CAR - Comprehensive
        $insurer = 'ROYAL';
        $segment = 'PRIVATE CAR';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Ludhiana', 'remarks_additional' => 'Old', 'points' => 20],
                ['policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => 'Old', 'points' => 20],
                ['policy_type' => 'Comprehensive', 'location' => 'Rest Of Punjab', 'remarks_additional' => 'Old', 'points' => 16],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // RELIANCE - PRIVATE CAR - Comprehensive & SAOD
        $insurer = 'RELIANCE';
        $segment = 'PRIVATE CAR';
        $location = 'All RTOs';

        foreach (
            [
                ['insurer_remarks' => 'Petrol, CNG, Electric', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'With NCB', 'points' => 27],
                ['insurer_remarks' => 'Diesel', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'With NCB', 'points' => 15],
                ['insurer_remarks' => 'Petrol, CNG, Electric', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'Without NCB', 'points' => 22],
                ['insurer_remarks' => 'Diesel', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'Without NCB', 'points' => 13],
                ['insurer_remarks' => 'Petrol, CNG, Electric', 'policy_type' => 'SAOD', 'remarks_additional' => 'With NCB', 'points' => 27],
                ['insurer_remarks' => 'Diesel', 'policy_type' => 'SAOD', 'remarks_additional' => 'With NCB', 'points' => 27],
                ['insurer_remarks' => 'Petrol, CNG, Electric', 'policy_type' => 'SAOD', 'remarks_additional' => 'Without NCB', 'points' => 18],
                ['insurer_remarks' => 'Diesel', 'policy_type' => 'SAOD', 'remarks_additional' => 'Without NCB', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'location' => $location,
            ], $policy);
        }

        // BAJAJ - PRIVATE CAR - Third Party
        $insurer = 'BAJAJ';
        $segment = 'PRIVATE CAR';
        $policyType = 'Third Party';
        $insurerRemarks = 'Decline Sangrur (PB13,PB84,PB86) RTOs';

        foreach (
            [
                ['location' => 'Punjab', 'remarks_additional' => 'Petrol - INNOVA Model Only', 'points' => 42],
                ['location' => 'Punjab', 'remarks_additional' => 'Petrol - ALTO, SPARK Model Only', 'points' => 37],
                ['location' => 'Rest of Punjab, Amritsar, Faridkot', 'remarks_additional' => 'Petrol - Other Makes', 'points' => 50],
                ['location' => 'Moga', 'remarks_additional' => 'Petrol - Other Makes', 'points' => 44],
                ['location' => 'Punjab', 'remarks_additional' => 'Diesel - SWIFT Model Only', 'points' => 27],
                ['location' => 'Punjab', 'remarks_additional' => 'Diesel - ETIOS Model Only', 'points' => 37],
                ['location' => 'Amritsar', 'remarks_additional' => 'Diesel - Other Makes', 'points' => 34],
                ['location' => 'Faridkot & Moga', 'remarks_additional' => 'Diesel - Other Makes', 'points' => 29],
                ['location' => 'Rest of Punjab', 'remarks_additional' => 'Diesel - Other Makes', 'points' => 50],
                ['location' => 'Punjab', 'remarks_additional' => 'CNG - SWIFT Model Only', 'points' => 27],
                ['location' => 'Amritsar & Rest of Punjab', 'remarks_additional' => 'CNG - Other Makes', 'points' => 22],
                ['location' => 'Faridkot & Moga', 'remarks_additional' => 'CNG - Other Makes', 'points' => 26],
                ['location' => 'Chandigarh', 'remarks_additional' => 'Petrol Only', 'points' => 47],
                ['location' => 'Chandigarh', 'remarks_additional' => 'Diesel Only', 'points' => 44],
                ['location' => 'Chandigarh', 'remarks_additional' => 'CNG only', 'points' => 50],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'insurer_remarks' => $insurerRemarks,
            ], $policy);
        }

        // SBI - PRIVATE CAR - Third Party
        $insurer = 'SBI';
        $segment = 'PRIVATE CAR';
        $policyType = 'Third Party';
        $location = 'All RTOs';

        foreach (
            [
                ['insurer_remarks' => 'Petrol - Excluding CNG & LPG', 'remarks_additional' => 'Upto 25 Years - Upto 1000 CC', 'points' => 29],
                ['insurer_remarks' => 'Petrol - Excluding CNG & LPG', 'remarks_additional' => 'Upto 25 Years - Above 100 CC', 'points' => 43],
                ['insurer_remarks' => 'Diesel', 'remarks_additional' => 'Upto 25 Years - Upto 1500 CC', 'points' => 25],
                ['insurer_remarks' => 'Diesel', 'remarks_additional' => 'Upto 25 Years - Above 1500 CC', 'points' => 43],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'location' => $location,
            ], $policy);
        }

        // ZUNO - PRIVATE CAR - Third Party
        $insurer = 'ZUNO';
        $segment = 'PRIVATE CAR';

        foreach (
            [
                ['insurer_remarks' => 'All Fuel', 'policy_type' => 'Third Party', 'location' => 'System RTOs', 'points' => 21],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ICICI - PRIVATE CAR - Third Party
        $insurer = 'ICICI';
        $segment = 'PRIVATE CAR';

        foreach (
            [
                ['policy_type' => 'Third Party', 'location' => 'Chandigarh & Ludhiana', 'remarks_additional' => 'Petrol, CNG, LPG & Diesel', 'points' => 24],
                ['policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => 'Petrol, CNG, LPG & Diesel', 'points' => 21],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ROYAL - PRIVATE CAR - Third Party
        $insurer = 'ROYAL';
        $segment = 'PRIVATE CAR';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Petrol', 'location' => 'Jalandhar', 'remarks_additional' => 'Upto 1000 CC', 'points' => 19],
                ['insurer_remarks' => 'Petrol', 'location' => 'Ludhiana', 'remarks_additional' => 'Upto 1000 CC', 'points' => 19],
                ['insurer_remarks' => 'Petrol', 'location' => 'Chandigarh', 'remarks_additional' => 'Upto 1000 CC', 'points' => 21],
                ['insurer_remarks' => 'Petrol', 'location' => 'Rest of Punjab', 'remarks_additional' => 'Upto 1000 CC', 'points' => 17],
                ['insurer_remarks' => 'Petrol', 'location' => 'Chandigarh', 'remarks_additional' => 'Above 1001 CC', 'points' => 40],
                ['insurer_remarks' => 'Petrol', 'location' => 'Jalandhar', 'remarks_additional' => 'Above 1001 CC', 'points' => 35],
                ['insurer_remarks' => 'Petrol', 'location' => 'Ludhiana', 'remarks_additional' => 'Above 1001 CC', 'points' => 32],
                ['insurer_remarks' => 'Petrol', 'location' => 'Rest of Punjab', 'remarks_additional' => 'Above 1001 CC', 'points' => 29],
                ['insurer_remarks' => 'Diesel', 'location' => 'Jalandhar', 'remarks_additional' => '1001-1500 CC', 'points' => 24],
                ['insurer_remarks' => 'Diesel', 'location' => 'Ludhiana', 'remarks_additional' => '1001-1500 CC', 'points' => 23],
                ['insurer_remarks' => 'Diesel', 'location' => 'Chandigarh', 'remarks_additional' => '1001-1500 CC', 'points' => 26],
                ['insurer_remarks' => 'Diesel', 'location' => 'Jalandhar & Ludhiana', 'remarks_additional' => 'Above 1501 CC', 'points' => 46],
                ['insurer_remarks' => 'Diesel', 'location' => 'Rest of Punjab', 'remarks_additional' => 'Above 1501 CC', 'points' => 39],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // MAGMA - PRIVATE CAR - Third Party
        $insurer = 'MAGMA';
        $segment = 'PRIVATE CAR';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Petrol', 'location' => 'CH', 'remarks_additional' => 'Upto 1000 CC', 'points' => 23],
                ['insurer_remarks' => 'Petrol', 'location' => 'PB1', 'remarks_additional' => 'Upto 1000 CC', 'points' => 18],
                ['insurer_remarks' => 'Petrol', 'location' => 'PB2', 'remarks_additional' => 'Upto 1000 CC', 'points' => 36],
                ['insurer_remarks' => 'Petrol', 'location' => 'CH', 'remarks_additional' => '1001-1500 CC', 'points' => 35],
                ['insurer_remarks' => 'Petrol', 'location' => 'PB1', 'remarks_additional' => '1001-1500 CC', 'points' => 29],
                ['insurer_remarks' => 'Petrol', 'location' => 'PB2', 'remarks_additional' => '1001-1500 CC', 'points' => 43],
                ['insurer_remarks' => 'Petrol', 'location' => 'CH', 'remarks_additional' => 'Above 1501 CC', 'points' => 46],
                ['insurer_remarks' => 'Petrol', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Above 1501 CC', 'points' => 45],
                ['insurer_remarks' => 'Diesel', 'location' => 'CH', 'remarks_additional' => 'Upto 1000 CC', 'points' => 21],
                ['insurer_remarks' => 'Diesel', 'location' => 'PB1', 'remarks_additional' => 'Upto 1000 CC', 'points' => 21],
                ['insurer_remarks' => 'Diesel', 'location' => 'PB2', 'remarks_additional' => 'Upto 1000 CC', 'points' => 36],
                ['insurer_remarks' => 'Diesel', 'location' => 'CH', 'remarks_additional' => '1001-1500 CC', 'points' => 30],
                ['insurer_remarks' => 'Diesel', 'location' => 'PB1', 'remarks_additional' => '1001-1500 CC', 'points' => 21],
                ['insurer_remarks' => 'Diesel', 'location' => 'PB2', 'remarks_additional' => '1001-1500 CC', 'points' => 36],
                ['insurer_remarks' => 'Diesel', 'location' => 'CH', 'remarks_additional' => 'Above 1501 CC', 'points' => 43],
                ['insurer_remarks' => 'Diesel', 'location' => 'PB1', 'remarks_additional' => 'Above 1501 CC', 'points' => 48],
                ['insurer_remarks' => 'Diesel', 'location' => 'PB2', 'remarks_additional' => 'Above 1501 CC', 'points' => 49],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // GO DIGIT - PRIVATE CAR - Third Party
        $insurer = 'DIGIT';
        $segment = 'PRIVATE CAR';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Upto 1000 CC - Petrol', 'location' => 'Chd_Tricity', 'remarks_additional' => 'Upto 1000 CC - Petrol', 'points' => 22],
                ['insurer_remarks' => 'Upto 1000 CC - Petrol', 'location' => 'North_Ref', 'remarks_additional' => 'Upto 1000 CC - Petrol', 'points' => 17],
                ['insurer_remarks' => 'Upto 1000 CC - Petrol', 'location' => 'PB_Bad', 'remarks_additional' => 'Upto 1000 CC - Petrol', 'points' => 48],
                ['insurer_remarks' => 'Upto 1000 CC - Petrol', 'location' => 'PB_Good', 'remarks_additional' => 'Upto 1000 CC - Petrol', 'points' => 51],
                ['insurer_remarks' => 'Above 1000 CC - Petrol', 'location' => 'Chd_Tricity', 'remarks_additional' => 'Above 1000 CC - Petrol', 'points' => 40],
                ['insurer_remarks' => 'Above 1000 CC - Petrol', 'location' => 'North_Ref', 'remarks_additional' => 'Above 1000 CC - Petrol', 'points' => 37],
                ['insurer_remarks' => 'Above 1000 CC - Petrol', 'location' => 'PB_Bad', 'remarks_additional' => 'Above 1000 CC - Petrol', 'points' => 51],
                ['insurer_remarks' => 'Above 1000 CC - Petrol', 'location' => 'PB_Good', 'remarks_additional' => 'Above 1000 CC - Petrol', 'points' => 53],
                ['insurer_remarks' => 'Upto 1000 CC - CNG', 'location' => 'Chd_Tricity', 'remarks_additional' => 'Upto 1000 CC - CNG', 'points' => 26],
                ['insurer_remarks' => 'Upto 1000 CC - CNG', 'location' => 'PB_Good', 'remarks_additional' => 'Upto 1000 CC - CNG', 'points' => 25],
                ['insurer_remarks' => 'Above 1000 CC - CNG', 'location' => 'Chd_Tricity', 'remarks_additional' => 'Above 1000 CC - CNG', 'points' => 37],
                ['insurer_remarks' => 'Above 1000 CC - CNG', 'location' => 'PB_Good', 'remarks_additional' => 'Above 1000 CC - CNG', 'points' => 18],
                ['insurer_remarks' => 'All CC - CNG', 'location' => 'PB_Bad', 'remarks_additional' => 'All CC - CNG', 'points' => 13],
                ['insurer_remarks' => 'Upto 1500 CC - Diesel', 'location' => 'Chd_Tricity', 'remarks_additional' => 'Upto 1500 CC - Diesel', 'points' => 8],
                ['insurer_remarks' => 'Upto 1500 CC - Diesel', 'location' => 'North_Ref', 'remarks_additional' => 'Upto 1500 CC - Diesel', 'points' => 18],
                ['insurer_remarks' => 'Upto 1500 CC - Diesel', 'location' => 'PB_Good', 'remarks_additional' => 'Upto 1500 CC - Diesel', 'points' => 40],
                ['insurer_remarks' => 'Upto 1500 CC - Diesel', 'location' => 'PB_Bad', 'remarks_additional' => 'Upto 1500 CC - Diesel', 'points' => 34],
                ['insurer_remarks' => 'Above 1500 CC - Diesel', 'location' => 'Chd_Tricity & North_Ref', 'remarks_additional' => 'Above 1500 CC - Diesel', 'points' => 27],
                ['insurer_remarks' => 'Above 1500 CC - Diesel', 'location' => 'PB_Bad & PB_Good', 'remarks_additional' => 'Above 1500 CC - Diesel', 'points' => 51],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // LIBERTY - PRIVATE CAR - Third Party
        $insurer = 'LIBERTY';
        $segment = 'PRIVATE CAR';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Upto 1000 CC - Petrol', 'location' => 'PUNJAB - 1', 'remarks_additional' => 'Excluding Electric Decline Punjab - 2', 'points' => 36],
                ['insurer_remarks' => 'Upto 1000 CC - Petrol', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Excluding Electric Decline Punjab - 2', 'points' => 13],
                ['insurer_remarks' => '1000-1500 CC - Petrol', 'location' => 'PUNJAB - 1', 'remarks_additional' => 'Excluding Electric Decline Punjab - 2', 'points' => 48],
                ['insurer_remarks' => '1000-1500 CC - Petrol', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Excluding Electric Decline Punjab - 2', 'points' => 36],
                ['insurer_remarks' => 'Above 1500 CC - Petrol', 'location' => 'PUNJAB - 1', 'remarks_additional' => 'Excluding Electric', 'points' => 50],
                ['insurer_remarks' => 'Above 1500 CC - Petrol', 'location' => 'PUNJAB - 2', 'remarks_additional' => 'Excluding Electric', 'points' => 27],
                ['insurer_remarks' => 'Above 1500 CC - Petrol', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Excluding Electric', 'points' => 49],
                ['insurer_remarks' => 'Above 1500 CC - Diesel', 'location' => 'PUNJAB - 1', 'remarks_additional' => 'Excluding Electric Decline Punjab - 2', 'points' => 38],
                ['insurer_remarks' => 'Above 1500 CC - Diesel', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Excluding Electric Decline Punjab - 2', 'points' => 17],
                ['insurer_remarks' => 'Upto 1000 CC - CNG', 'location' => 'PUNJAB - 1', 'remarks_additional' => 'Excluding Electric Decline Punjab - 2 & Chandigarh', 'points' => 16],
                ['insurer_remarks' => '1001-1500 CC - CNG', 'location' => 'PUNJAB - 1', 'remarks_additional' => 'Excluding Electric Decline Punjab - 2 & Chandigarh', 'points' => 28],
                ['insurer_remarks' => 'Above 1500 CC - CNG', 'location' => 'PUNJAB - 1', 'remarks_additional' => 'Excluding Electric Decline Punjab - 2', 'points' => 45],
                ['insurer_remarks' => 'Above 1500 CC - CNG', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Excluding Electric Decline Punjab - 2', 'points' => 32],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // UNIVERSAL SOMPO - PRIVATE CAR - Third Party
        $insurer = 'SOMPO';
        $segment = 'PRIVATE CAR';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'All RTOs', 'remarks_additional' => 'Diesel, Petrol & Electric', 'points' => 22],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // FUTURE - PRIVATE CAR - Third Party
        $insurer = 'FUTURE';
        $segment = 'PRIVATE CAR';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'All RTO\'s', 'remarks_additional' => 'Petrol', 'points' => 27],
                ['location' => 'All RTO\'s', 'remarks_additional' => 'Diesel', 'points' => 18],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // RELIANCE - PRIVATE CAR - Third Party
        $insurer = 'RELIANCE';
        $segment = 'PRIVATE CAR';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Non Diesel', 'location' => 'Punjab, Amritsar & Ludhiana. Chandigarh Decline', 'remarks_additional' => 'Upto 1000 CC', 'points' => 20],
                ['insurer_remarks' => 'Non Diesel', 'location' => 'Punjab, Amritsar & Ludhiana. Chandigarh Decline', 'remarks_additional' => 'Above 1000 CC', 'points' => 42],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // TATA - PRIVATE CAR - Third Party
        $insurer = 'TATA';
        $segment = 'PRIVATE CAR';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'PB 1', 'remarks_additional' => 'Petrol, CNG & Electric', 'points' => 24],
                ['location' => 'PB 1', 'remarks_additional' => 'Diesel', 'points' => 11],
                ['location' => 'PB 2', 'remarks_additional' => 'Petrol, CNG & Electric', 'points' => 36],
                ['location' => 'PB 2', 'remarks_additional' => 'Diesel', 'points' => 18],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // RELIANCE - 2W - Comprehensive & SAOD
        $insurer = 'RELIANCE';
        $segment = '2W';

        foreach (
            [
                ['insurer_remarks' => 'Scooter - 1+1 - All CC', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => '1+1 YAMAHA & EV Less 5%', 'points' => 38],
                ['insurer_remarks' => 'Bike - 1+1', 'policy_type' => 'SAOD', 'location' => 'All RTOs', 'remarks_additional' => 'YAMAHA & EV Less 5%', 'points' => 33],
                ['insurer_remarks' => 'Scooter', 'policy_type' => 'SAOD', 'location' => 'All RTOs', 'remarks_additional' => 'YAMAHA & EV Less 5%', 'points' => 29],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // BAJAJ - 2W - Comprehensive
        $insurer = 'BAJAJ';
        $segment = '2W';

        foreach (
            [
                ['insurer_remarks' => 'Scooter - 1+1', 'policy_type' => 'Comprehensive', 'location' => 'Punjab (Excluding Chandigarh)', 'remarks_additional' => '5% Less For Bajaj, Vespa, Royal Enfield Makes', 'points' => 36],
                ['insurer_remarks' => 'Bike - 1+1', 'policy_type' => 'Comprehensive', 'location' => 'Punjab (Excluding Chandigarh)', 'remarks_additional' => '5% Less For Bajaj, Vespa, Royal Enfield Makes', 'points' => 31],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // MAGMA - 2W - Comprehensive
        $insurer = 'MAGMA';
        $segment = '2W';

        foreach (
            [
                ['insurer_remarks' => 'Bike - 75- 150 CC', 'policy_type' => 'Comprehensive', 'location' => 'CH', 'remarks_additional' => 'Old With CPA - Less 2%', 'points' => 26],
                ['insurer_remarks' => 'Bike - 151 - 350 CC', 'policy_type' => 'Comprehensive', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Old With CPA - Less 2%', 'points' => 18],
                ['insurer_remarks' => 'Scooter', 'policy_type' => 'Comprehensive', 'location' => 'CH', 'remarks_additional' => 'Old With CPA - Less 2%', 'points' => 28],
                ['insurer_remarks' => 'Scooter', 'policy_type' => 'Comprehensive', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Old With CPA - Less 2%', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ICICI - 2W - Comprehensive & SAOD
        $insurer = 'ICICI';
        $segment = '2W';

        foreach (
            [
                ['insurer_remarks' => 'Scooter- 1+1, 2+2, 3+3', 'policy_type' => 'Comprehensive', 'location' => 'Punjab & Chandigarh', 'remarks_additional' => '1+1, 2+2, 3+3', 'points' => 31],
                ['insurer_remarks' => 'Scooter- 1+1, 2+2, 3+3', 'policy_type' => 'Comprehensive', 'location' => 'Ludhiana', 'remarks_additional' => '1+1, 2+2, 3+3', 'points' => 40],
                ['insurer_remarks' => 'Bike- 1+1, 2+2, 3+3', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => 'Excluding Bajaj, Yamaha, TVS and Suzuki Punjab & Ludhiana Decline', 'points' => 27],
                ['insurer_remarks' => 'Bike - 1+1 - Electric', 'policy_type' => 'Comprehensive', 'location' => 'Ludhiana & Chandigarh', 'remarks_additional' => 'Electric', 'points' => 29],
                ['insurer_remarks' => 'Scooter - 1+1 - Electric', 'policy_type' => 'Comprehensive', 'location' => 'Ludhiana', 'remarks_additional' => 'Electric Unregistered EV (old/New)-only IRDA', 'points' => 25],
                ['insurer_remarks' => 'Scooter - 1+1 - Electric', 'policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Electric Unregistered EV (old/New)-only IRDA', 'points' => 18],
                ['insurer_remarks' => 'Bike', 'policy_type' => 'SAOD', 'location' => 'Chandigarh', 'remarks_additional' => 'Excluding Bajaj, Yamaha, TVS and Suzuki Punjab Decline', 'points' => 27],
                ['insurer_remarks' => 'Bike', 'policy_type' => 'SAOD', 'location' => 'Ludhiana', 'remarks_additional' => 'Excluding Bajaj, Yamaha, TVS and Suzuki Punjab Decline', 'points' => 9],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // UNIVERSAL SOMPO - 2W - Comprehensive & SAOD
        $insurer = 'SOMPO';
        $segment = '2W';

        foreach (
            [
                ['insurer_remarks' => 'Scooter', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Suzuki & Royal Enfield Decline', 'points' => 27],
                ['insurer_remarks' => 'Scooter', 'policy_type' => 'SAOD', 'location' => 'All RTOs', 'remarks_additional' => 'Suzuki & Royal Enfield Decline', 'points' => 19],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // LIBERTY - 2W - Comprehensive
        $insurer = 'LIBERTY';
        $segment = '2W';

        foreach (
            [
                ['insurer_remarks' => 'Bike - Upto 75 CC', 'policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY) Rest of Punjab Decline', 'remarks_additional' => '1+1 Exluding - Electric', 'points' => 32],
                ['insurer_remarks' => 'Bike - 76 - 150 CC', 'policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY) Rest of Punjab Decline', 'remarks_additional' => '1+1 Exluding - Electric', 'points' => 21],
                ['insurer_remarks' => 'Bike -151-350 CC', 'policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY) Rest of Punjab Decline', 'remarks_additional' => '1+1 Exluding - Electric', 'points' => 29],
                ['insurer_remarks' => 'Bike - Above 350 CC', 'policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY) Rest of Punjab Decline', 'remarks_additional' => '1+1 Exluding - Electric', 'points' => 35],
                ['insurer_remarks' => 'Scooter - 1+1 - Upto 150 CC', 'policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY) Rest of Punjab Decline', 'remarks_additional' => '1+1 Exluding - Electric', 'points' => 49],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // DIGIT - 2W - Comprehensive
        $insurer = 'DIGIT';
        $segment = '2W';

        foreach (
            [
                ['insurer_remarks' => 'Bike - 1+1 - Upto 180 CC', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => '1+1 Hero & Honda Makes Only', 'points' => 29],
                ['insurer_remarks' => 'Bike - 1+1 - Upto 180 CC', 'policy_type' => 'Comprehensive', 'location' => 'PB Bad', 'remarks_additional' => '1+1 Hero & Honda Makes Only', 'points' => 29],
                ['insurer_remarks' => 'Bike - 1+1 - Upto 180 CC', 'policy_type' => 'Comprehensive', 'location' => 'PB Good', 'remarks_additional' => '1+1 Hero & Honda Makes Only', 'points' => 44],
                ['insurer_remarks' => 'Bike - 1+1 - Upto 180 CC', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => '1+1 Other Makes', 'points' => 29],
                ['insurer_remarks' => 'Bike - 1+1 - Upto 180 CC', 'policy_type' => 'Comprehensive', 'location' => 'PB Bad', 'remarks_additional' => '1+1 Other Makes', 'points' => 22],
                ['insurer_remarks' => 'Bike - 1+1 - Upto 180 CC', 'policy_type' => 'Comprehensive', 'location' => 'PB Good', 'remarks_additional' => '1+1 Other Makes', 'points' => 44],
                ['insurer_remarks' => 'Bike - 1+1 - 180 to 350 CC', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => '1+1 Honda, Jawa, Avenger Makes Only', 'points' => 13],
                ['insurer_remarks' => 'Bike - 1+1 - 180 to 350 CC', 'policy_type' => 'Comprehensive', 'location' => 'PB Bad', 'remarks_additional' => '1+1 Honda, Jawa, Avenger Makes Only', 'points' => 24],
                ['insurer_remarks' => 'Bike - 1+1 - 180 to 350 CC', 'policy_type' => 'Comprehensive', 'location' => 'PB Good', 'remarks_additional' => '1+1 Honda, Jawa, Avenger Makes Only', 'points' => 28],
                ['insurer_remarks' => 'Bike - 1+1 - 180 to 350 CC', 'policy_type' => 'Comprehensive', 'location' => 'PB Bad & PB Good', 'remarks_additional' => '1+1 Excluding Honda, Jawa, Avenger Makes', 'points' => 27],
                ['insurer_remarks' => 'Bike - 1+1 - 180 to 350 CC - Royal Enfield', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh & PB Bad', 'remarks_additional' => '1+1 Royal Enfield', 'points' => 34],
                ['insurer_remarks' => 'Bike - 1+1 - 180 to 350 CC - Royal Enfield', 'policy_type' => 'Comprehensive', 'location' => 'PB Good', 'remarks_additional' => '1+1 Royal Enfield', 'points' => 32],
                ['insurer_remarks' => 'Bike - 1+1 - Abovce 350 CC', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh & PB Good', 'remarks_additional' => '1+1', 'points' => 25],
                ['insurer_remarks' => 'Bike - 1+1 - Abovce 350 CC', 'policy_type' => 'Comprehensive', 'location' => 'PB Bad', 'remarks_additional' => '1+1', 'points' => 18],
                ['insurer_remarks' => 'Scooter - 1+1- All CC', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => '1+1 Including Electric', 'points' => 50],
                ['insurer_remarks' => 'Scooter - 1+1- All CC', 'policy_type' => 'Comprehensive', 'location' => 'PB Bad', 'remarks_additional' => '1+1 Including Electric', 'points' => 51],
                ['insurer_remarks' => 'Scooter - 1+1- All CC', 'policy_type' => 'Comprehensive', 'location' => 'PB Good', 'remarks_additional' => '1+1 Including Electric', 'points' => 54],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // TATA - 2W - Comprehensive & SAOD
        $insurer = 'TATA';
        $segment = '2W';

        foreach (
            [
                ['insurer_remarks' => 'Scooter - 1+1', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => '1+1', 'points' => 53],
                ['insurer_remarks' => 'Scooter - 1+1', 'policy_type' => 'Comprehensive', 'location' => 'PB1', 'remarks_additional' => '1+1', 'points' => 42],
                ['insurer_remarks' => 'Scooter - 1+1', 'policy_type' => 'Comprehensive', 'location' => 'PB2', 'remarks_additional' => '1+1', 'points' => 55],
                ['insurer_remarks' => 'Bike - 1+1', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => '1+1', 'points' => 24],
                ['insurer_remarks' => 'Bike - 1+1', 'policy_type' => 'Comprehensive', 'location' => 'PB1 & PB2', 'remarks_additional' => '1+1', 'points' => 29],
                ['insurer_remarks' => 'Scooter & Bike', 'policy_type' => 'SAOD', 'location' => 'Chandigarh', 'remarks_additional' => '1+1', 'points' => 27],
                ['insurer_remarks' => 'Scooter', 'policy_type' => 'SAOD', 'location' => 'PB1 & PB2', 'remarks_additional' => '1+1', 'points' => 19],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // RELIANCE - 2W - Third Party
        $insurer = 'RELIANCE';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Scooter', 'location' => 'All RTOs', 'remarks_additional' => 'YAMAHA & EV Less 5%', 'points' => 52],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // BAJAJ - 2W - Third Party
        $insurer = 'BAJAJ';
        $segment = '2W';
        $policyType = 'Third Party';
        $remarks = 'Electric All Models Will be Done As per Bajaj Underwriter Approval Only. All KTM models and YAMAHA Make Bikes - 23% Chandigarh Decline';

        foreach (
            [
                ['insurer_remarks' => 'Scooter', 'location' => 'Punjab', 'points' => 50],
                ['insurer_remarks' => 'Bike', 'location' => 'Rupnagar, Patiala, Gurdaspur', 'points' => 30],
                ['insurer_remarks' => 'Bike', 'location' => 'Rest of Punjab', 'points' => 48],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'remarks_additional' => $remarks,
            ], $policy);
        }

        // LIBERTY - 2W - Third Party
        $insurer = 'LIBERTY';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Scooter - Upto 150 CC', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Exluding - Electric', 'points' => 53],
                ['insurer_remarks' => 'Scooter - Upto 150 CC', 'location' => 'PUNJAB -1 & 2', 'remarks_additional' => 'Exluding - Electric', 'points' => 58],
                ['insurer_remarks' => 'Bike - Upto 75 CC', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Exluding - Electric', 'points' => 40],
                ['insurer_remarks' => 'Bike - Upto 75 CC', 'location' => 'PUNJAB -1 & 2', 'remarks_additional' => 'Exluding - Electric', 'points' => 46],
                ['insurer_remarks' => 'Bike - Upto 76-150 CC', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Exluding - Electric', 'points' => 40],
                ['insurer_remarks' => 'Bike - Upto 76-150 CC', 'location' => 'PUNJAB -1 & 2', 'remarks_additional' => 'Exluding - Electric', 'points' => 50],
                ['insurer_remarks' => 'Bike - 151-350 CC', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Exluding - Electric', 'points' => 40],
                ['insurer_remarks' => 'Bike - 151-350 CC', 'location' => 'PUNJAB -1 & 2', 'remarks_additional' => 'Exluding - Electric', 'points' => 46],
                ['insurer_remarks' => 'Bike - 351 CC', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Exluding - Electric', 'points' => 36],
                ['insurer_remarks' => 'Bike - 351 CC', 'location' => 'PUNJAB -1 & 2', 'remarks_additional' => 'Exluding - Electric', 'points' => 50],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // ICICI - 2W - Third Party
        $insurer = 'ICICI';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Scooter', 'location' => 'Punjab', 'remarks_additional' => '0+1, 0+2, 0+3', 'points' => 46],
                ['insurer_remarks' => 'Scooter', 'location' => 'Chandigarh', 'remarks_additional' => '0+1, 0+2, 0+3', 'points' => 36],
                ['insurer_remarks' => 'Scooter', 'location' => 'Ludhiana', 'remarks_additional' => '0+1, 0+2, 0+3', 'points' => 50],
                ['insurer_remarks' => 'Bike', 'location' => 'Chandigarh', 'remarks_additional' => 'Excluding Bajaj, Yamaha, TVS and Suzuki', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // ROYAL - 2W - Third Party
        $insurer = 'ROYAL';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Bike', 'location' => 'Ludhiana', 'remarks_additional' => 'Rollover', 'points' => 34],
                ['insurer_remarks' => 'Scooter', 'location' => 'Chandigarh', 'remarks_additional' => 'Rollover', 'points' => 35],
                ['insurer_remarks' => 'Scooter', 'location' => 'Rest Of Punjab', 'remarks_additional' => 'Rollover', 'points' => 32],
                ['insurer_remarks' => 'Bike - Upto 150 CC', 'location' => 'Ludhiana', 'remarks_additional' => 'Rollover', 'points' => 9],
                ['insurer_remarks' => 'Bike - Upto 150 CC', 'location' => 'Rest Of Punjab', 'remarks_additional' => 'Rollover', 'points' => 20],
                ['insurer_remarks' => 'Bike - Upto 150 CC', 'location' => 'Chandigarh', 'remarks_additional' => 'Rollover', 'points' => 26],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // DIGIT - 2W - Third Party
        $insurer = 'DIGIT';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Bike - Upto 180 CC', 'location' => 'Chandigarh', 'remarks_additional' => 'Only Hero & Honda Makes', 'points' => 36],
                ['insurer_remarks' => 'Bike - Upto 180 CC', 'location' => 'PB Bad', 'remarks_additional' => 'Only Hero & Honda Makes', 'points' => 19],
                ['insurer_remarks' => 'Bike - Upto 180 CC', 'location' => 'PB Good', 'remarks_additional' => 'Only Hero & Honda Makes', 'points' => 52],
                ['insurer_remarks' => 'Bike - Upto 180 CC', 'location' => 'Chandigarh', 'remarks_additional' => 'Excluding Hero & Honda Makes', 'points' => 38],
                ['insurer_remarks' => 'Bike - Upto 180 CC', 'location' => 'PB Bad', 'remarks_additional' => 'Excluding Hero & Honda Makes', 'points' => 13],
                ['insurer_remarks' => 'Bike - Upto 180 CC', 'location' => 'PB Good', 'remarks_additional' => 'Excluding Hero & Honda Makes', 'points' => 45],
                ['insurer_remarks' => 'Bike - 180 to 350 CC', 'location' => 'PB Bad', 'remarks_additional' => 'Only Honda, Jawa, Avenger Makes', 'points' => 13],
                ['insurer_remarks' => 'Bike - 180 to 350 CC', 'location' => 'PB Good', 'remarks_additional' => 'Only Honda, Jawa, Avenger Makes', 'points' => 36],
                ['insurer_remarks' => 'Bike - 180 to 350 CC', 'location' => 'PB Good', 'remarks_additional' => 'Excluding Honda, Jawa, Avenger Makes', 'points' => 25],
                ['insurer_remarks' => 'Bike - 180 to 350 CC - Royal Enfield', 'location' => 'Chandigarh & PB Bad', 'remarks_additional' => 'Royal Enfield', 'points' => 34],
                ['insurer_remarks' => 'Bike - 180 to 350 CC - Royal Enfield', 'location' => 'PB_Good', 'remarks_additional' => 'Royal Enfield', 'points' => 47],
                ['insurer_remarks' => 'Bike - Above 350 CC', 'location' => 'PB Good', 'points' => 25],
                ['insurer_remarks' => 'Scooter', 'location' => 'Chandigarh', 'remarks_additional' => 'Including Electric', 'points' => 51],
                ['insurer_remarks' => 'Scooter', 'location' => 'PB_Bad', 'remarks_additional' => 'Including Electric', 'points' => 52],
                ['insurer_remarks' => 'Scooter', 'location' => 'PB Good', 'remarks_additional' => 'Including Electric', 'points' => 58],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // ZUNO - 2W - Third Party
        $insurer = 'ZUNO';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'All RTOs', 'points' => 18],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // HDFC - 2W - Third Party
        $insurer = 'HDFC';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Scooter', 'location' => 'All RTOs', 'points' => 41],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // UNIVERSAL SOMPO - 2W - Third Party
        $insurer = 'SOMPO';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Scooter', 'location' => 'All RTOs', 'remarks_additional' => 'Suzuki & Royal Enfield Decline', 'points' => 18],
                ['insurer_remarks' => 'Bike - Upto 250 CC', 'location' => 'All RTOs', 'remarks_additional' => 'Suzuki & Royal Enfield Decline', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // TATA - 2W - Third Party
        $insurer = 'TATA';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Bike', 'location' => 'Chandigarh', 'points' => 35],
                ['insurer_remarks' => 'Bike', 'location' => 'PB 1 & PB 2', 'points' => 50],
                ['insurer_remarks' => 'Scooter', 'location' => 'Chandigarh', 'points' => 57],
                ['insurer_remarks' => 'Scooter', 'location' => 'PB 1 & PB 2', 'points' => 60],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }


        // BAJAJ - 3W GCV - Comprehensive & Third Party
        $insurer = 'BAJAJ';
        $segment = '3W GCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Including Electric', 'points' => 27],
                ['policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => 'Excluding Electric', 'points' => 53],
                ['policy_type' => 'Third Party', 'location' => 'Chandigarh', 'remarks_additional' => 'Excluding Electric', 'points' => 48],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Electric Only', 'points' => 44],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // LIBERTY - 3W GCV - Comprehensive & Third Party
        $insurer = 'LIBERTY';
        $segment = '3W GCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'NEW. PUNJAB -2 DECLINE', 'points' => 21],
                ['policy_type' => 'Comprehensive', 'location' => 'PUNJAB - 1', 'remarks_additional' => 'NEW.PUNJAB -2 DECLINE', 'points' => 33],
                ['policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => '1-5 YEARS. PUNJAB -2 DECLINE', 'points' => 37],
                ['policy_type' => 'Comprehensive', 'location' => 'PUNJAB - 1', 'remarks_additional' => '1-5 YEARS.PUNJAB -2 DECLINE', 'points' => 46],
                ['policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => '5-10 YEARS. PUNJAB -2 DECLINE', 'points' => 43],
                ['policy_type' => 'Comprehensive', 'location' => 'PUNJAB - 1', 'remarks_additional' => '5-10 YEARS.PUNJAB -2 DECLINE', 'points' => 51],
                ['policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'ABOVE 10 YEARS. PUNJAB -2 DECLINE', 'points' => 39],
                ['policy_type' => 'Comprehensive', 'location' => 'PUNJAB - 1', 'remarks_additional' => 'ABOVE 10 YEARS.PUNJAB -2 DECLINE', 'points' => 48],
                ['policy_type' => 'Third Party', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'NEW. PUNJAB -2 DECLINE', 'points' => 21],
                ['policy_type' => 'Third Party', 'location' => 'PB -84 RTO & PUNJAB - 1', 'remarks_additional' => 'NEW.PUNJAB -2 DECLINE', 'points' => 33],
                ['policy_type' => 'Third Party', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => '1-5 YEARS', 'points' => 37],
                ['policy_type' => 'Third Party', 'location' => 'PB -84 RTO & PUNJAB - 1', 'remarks_additional' => '1-5 YEARS', 'points' => 46],
                ['policy_type' => 'Third Party', 'location' => 'PUNJAB - 2', 'remarks_additional' => '1-5 YEARS', 'points' => 18],
                ['policy_type' => 'Third Party', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => '6-10 YEARS', 'points' => 43],
                ['policy_type' => 'Third Party', 'location' => 'PB -84 RTO & PUNJAB - 1', 'remarks_additional' => '6-10 YEARS', 'points' => 51],
                ['policy_type' => 'Third Party', 'location' => 'PUNJAB - 2', 'remarks_additional' => '6-10 YEARS', 'points' => 26],
                ['policy_type' => 'Third Party', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'Above 11 YEARS', 'points' => 39],
                ['policy_type' => 'Third Party', 'location' => 'PB -84 RTO & PUNJAB - 1', 'remarks_additional' => 'Above 11 YEARS', 'points' => 48],
                ['policy_type' => 'Third Party', 'location' => 'PUNJAB - 2', 'remarks_additional' => 'Above 11 YEARS', 'points' => 20],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SBI - 3W GCV - Comprehensive & Third Party
        $insurer = 'SBI';
        $segment = '3W GCV';

        foreach (
            [
                ['insurer_remarks' => 'Except EV', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Only New', 'points' => 41],
                ['insurer_remarks' => 'Except EV', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Comp Age 1- 15 Years & Third Party Age Upto 25 years Only. Except EV', 'points' => 43],
                ['insurer_remarks' => 'Except EV', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Comp Age 1- 15 Years & Third Party Age Upto 25 years Only. Except EV', 'points' => 44],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SHRIRAM - 3W GCV - Comp / TP
        $insurer = 'SHRIRAM';
        $segment = '3W GCV';

        foreach (
            [
                ['insurer_remarks' => 'Upto 15 Years', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Except E- Cart', 'points' => 36],
                ['insurer_remarks' => 'Electric - Upto 15 Years', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'E- Cart only - (Upto 2000 W only)', 'points' => 37],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // TATA - 3W GCV - Comp / TP
        $insurer = 'TATA';
        $segment = '3W GCV';

        foreach (
            [
                ['policy_type' => 'Comp / TP', 'location' => 'Chandigarh', 'remarks_additional' => 'Comp All Ages & TP Above 1 Years', 'points' => 44],
                ['policy_type' => 'Comp / TP', 'location' => 'PB 1 & PB2', 'remarks_additional' => 'Comp All Ages & TP Above 1 Years', 'points' => 37],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ROYAL - 3W GCV - Comprehensive & Third Party
        $insurer = 'ROYAL';
        $segment = '3W GCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Chandigarh Decline', 'points' => 20],
                ['policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => 'Chandigarh Decline', 'points' => 22],
                ['insurer_remarks' => 'ELECTRIC', 'policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Electric', 'points' => 47],
                ['insurer_remarks' => 'ELECTRIC', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => 'Electric', 'points' => 16],
                ['insurer_remarks' => 'ELECTRIC', 'policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => 'Electric', 'points' => 59],
                ['insurer_remarks' => 'ELECTRIC', 'policy_type' => 'Third Party', 'location' => 'Chandigarh', 'remarks_additional' => 'Electric', 'points' => 16],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // GO DIGIT - 3W GCV - Comprehensive & Third Party
        $insurer = 'DIGIT';
        $segment = '3W GCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs. REF RTO Decline', 'points' => 19],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs. REF RTO Decline', 'points' => 24],
                ['insurer_remarks' => 'Electric', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs. REF RTO Decline', 'remarks_additional' => 'E-Loaders', 'points' => 15],
                ['insurer_remarks' => 'Electric', 'policy_type' => 'Third Party', 'location' => 'All RTOs. REF RTO Decline', 'remarks_additional' => 'E-Loaders', 'points' => 19],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ICICI - 3W GCV - Comp / TP & Comprehensive
        $insurer = 'ICICI';
        $segment = '3W GCV';

        foreach (
            [
                ['insurer_remarks' => 'Electric', 'policy_type' => 'Comp / TP', 'location' => 'Chandigarh', 'remarks_additional' => 'Electric. Decline Punjab', 'points' => 27],
                ['insurer_remarks' => 'Electric', 'policy_type' => 'Comp / TP', 'location' => 'Ludhiana', 'remarks_additional' => 'Electric. Decline Punjab', 'points' => 22],
                ['insurer_remarks' => 'Exluding Electric', 'policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'New', 'points' => 18],
                ['insurer_remarks' => 'Exluding Electric', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh & Ludhiana Decline', 'remarks_additional' => 'Old', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // MAGMA - 3W GCV - Comprehensive & Third Party
        $insurer = 'MAGMA';
        $segment = '3W GCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'PB1 & PB2', 'remarks_additional' => 'CH DECLINE', 'points' => 41],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'CH DECLINE', 'points' => 24],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ZUNO - 3W GCV - Comp / TP
        $insurer = 'ZUNO';
        $segment = '3W GCV';

        foreach (
            [
                ['insurer_remarks' => 'Excluding Mahindra Bolero Camper', 'policy_type' => 'Comp / TP', 'location' => 'Punjab', 'remarks_additional' => 'Decline RTOs- PB12 & PB24', 'points' => 31],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // CHOLA - 3W GCV - Comprehensive & Third Party
        $insurer = 'CHOLA';
        $segment = '3W GCV';

        foreach (
            [
                ['insurer_remarks' => 'Without CPA Less 1.5%', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Including Electric', 'points' => 27],
                ['insurer_remarks' => 'Without CPA Less 1.5%', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Including Electric', 'points' => 18],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // TATA - School Bus - Comp / TP
        $insurer = 'TATA';
        $segment = 'School Bus';

        foreach (
            [
                ['policy_type' => 'Comp / TP', 'location' => 'Chandigarh', 'remarks_additional' => 'Upto 12 Seater - Comp All ages & TP Above 1 Years', 'points' => 19],
                ['policy_type' => 'Comp / TP', 'location' => 'Chandigarh', 'remarks_additional' => 'Above 12 Seater', 'points' => 44],
                ['policy_type' => 'Comp / TP', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Above 12 Seater', 'points' => 39],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'segment_remarks' => 'Staff Bus',
            ], $policy);
        }

        // DIGIT - School Bus - Comp / TP
        $insurer = 'DIGIT';
        $segment = 'School Bus';

        foreach (
            [
                ['insurer_remarks' => 'Above 10 Seater', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'On Company Name', 'points' => 48],
                ['insurer_remarks' => 'Above 10 Seater', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'On Transporter Name - On Individual Name Declined', 'points' => 26],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'segment_remarks' => 'Staff Bus',
            ], $policy);
        }

        // CHOLA - School Bus - Comprehensive
        $insurer = 'CHOLA';
        $segment = 'School Bus';

        foreach (
            [
                ['insurer_remarks' => 'Without CPA Less 1.5%', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Above 6 Seater', 'points' => 36],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'segment_remarks' => 'Staff Bus',
            ], $policy);
        }

        // BAJAJ - School Bus - Comprehensive & Third Party
        $insurer = 'BAJAJ';
        $segment = 'School Bus';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab. Chandigarh Decline', 'remarks_additional' => 'Above 10 Seater', 'points' => 22],
                ['policy_type' => 'Third Party', 'location' => 'Punjab. Chandigarh Decline', 'remarks_additional' => 'Above 10 Seater', 'points' => 46],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'segment_remarks' => 'Staff Bus',
            ], $policy);
        }

        // MAGMA - School Bus - Comprehensive & Third Party
        $insurer = 'MAGMA';
        $segment = 'School Bus';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'CH & PB2', 'points' => 39],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'points' => 24],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'segment_remarks' => 'Staff Bus',
            ], $policy);
        }

        // GO DIGIT - School Bus - Comp / TP
        $insurer = 'DIGIT';
        $segment = 'School Bus';

        foreach (
            [
                ['insurer_remarks' => 'Upto 7 Seater', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 7 Saeter', 'points' => 28],
                ['insurer_remarks' => '8 & 8 above Only', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'School Bus with School/College Name', 'points' => 73],
                ['insurer_remarks' => '8 & 8 above Only', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'On Transporter Name - On Individual Name Declined', 'points' => 60],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // TATA - School Bus - Comp / TP
        $insurer = 'TATA';
        $segment = 'School Bus';

        foreach (
            [
                ['policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'School Bus Upto 11 Seater', 'points' => 48],
                ['policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'School Bus - Above 11 Seater', 'points' => 78],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SBI - School Bus - Comprehensive & Third Party
        $insurer = 'SBI';
        $segment = 'School Bus';

        foreach (
            [
                ['insurer_remarks' => 'Upto 15 Years', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => '18 & 18 Above Seater', 'points' => 57],
                ['insurer_remarks' => 'Upto 25 Years', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '18 & 18 Above Seater', 'points' => 58],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ICICI - School Bus - Comprehensive & Third Party
        $insurer = 'ICICI';
        $segment = 'School Bus';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Ludhiana', 'remarks_additional' => 'Upto 18 Seater', 'points' => 73],
                ['policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => 'Upto 18 Seater', 'points' => 52],
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Upto 18 Seater', 'points' => 49],
                ['policy_type' => 'Comprehensive', 'location' => 'Ludhiana', 'remarks_additional' => '18 to 36 Seater', 'points' => 9],
                ['policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => '18 to 36 Seater', 'points' => 33],
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => '18 to 36 Seater', 'points' => 60],
                ['policy_type' => 'Comprehensive', 'location' => 'Ludhiana', 'remarks_additional' => 'Above 36 Saater', 'points' => 36],
                ['policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => 'Above 36 Saater', 'points' => 52],
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Above 36 Saater', 'points' => 49],
                ['policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => 'Upto 18 Seater', 'points' => 43],
                ['policy_type' => 'Third Party', 'location' => 'Chandigarh & Ludhiana', 'remarks_additional' => 'Upto 18 Seater', 'points' => 48],
                ['policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => '18 to 36 Seater', 'points' => 46],
                ['policy_type' => 'Third Party', 'location' => 'Ludhiana', 'remarks_additional' => '18 to 36 Seater', 'points' => 8],
                ['policy_type' => 'Third Party', 'location' => 'Chandigarh', 'remarks_additional' => '18 to 36 Seater', 'points' => 38],
                ['policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => 'Above 36 Saater', 'points' => 58],
                ['policy_type' => 'Third Party', 'location' => 'Chandigarh & Ludhiana', 'remarks_additional' => 'Above 36 Saater', 'points' => 48],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SHRIRAM - School Bus - Comp / TP
        $insurer = 'SHRIRAM';
        $segment = 'School Bus';

        foreach (
            [
                ['insurer_remarks' => 'Upto 15 Years', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 15 Seater', 'points' => 26],
                ['insurer_remarks' => 'Upto 15 Years', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Above 15 Seater', 'points' => 44],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // MAGMA - School Bus - Third Party
        $insurer = 'MAGMA';
        $segment = 'School Bus';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'All RTOs', 'points' => 24],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // RELIANCE - TAXI - Comp / TP
        $insurer = 'RELIANCE';
        $segment = 'TAXI';

        foreach (
            [
                ['insurer_remarks' => 'Upto 6 Seater', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Non Nil Dep Only - Petrol + CNG + Battery Only', 'points' => 28],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // FUTURE - TAXI - Comprehensive & Third Party
        $insurer = 'FUTURE';
        $segment = 'TAXI';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => '', 'points' => 35],
                ['policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => '', 'points' => 18],
                ['policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => '', 'points' => 44],
                ['policy_type' => 'Third Party', 'location' => 'Chandigarh', 'remarks_additional' => '', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // BAJAJ - TAXI - Third Party
        $insurer = 'BAJAJ';
        $segment = 'TAXI';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'Punjab', 'remarks_additional' => 'Chandigarh Declined', 'points' => 25],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // CHOLA - TAXI - Comprehensive
        $insurer = 'CHOLA';
        $segment = 'TAXI';

        foreach (
            [
                ['insurer_remarks' => 'Without CPA Less 1.5%', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 6 Seater Only', 'points' => 19],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SHRIRAM - TAXI - Comprehensive, Third Party & Comp / TP
        $insurer = 'SHRIRAM';
        $segment = 'TAXI';

        foreach (
            [
                ['insurer_remarks' => 'Upto 15 Years', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => '6+1 - Refer Decline Makes & Models List & Excluding Electric', 'points' => 18],
                ['insurer_remarks' => 'Upto 15 Years', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '6+1 - Refer Decline Makes & Models List & Excluding Electric', 'points' => 19],
                ['insurer_remarks' => 'Upto 15 Years', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => '7+10 - Refer Decline Makes & Models List & Excluding Electric', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SBI - TAXI - Comprehensive & Third Party
        $insurer = 'SBI';
        $segment = 'TAXI';
        $insurerRemarks1 = '6 + 1 Seating. Excluding Innova, Innova crysta, Hycross, Scorpio, Bolero of State Capital. With NCB Only (Without NCB Less 3% PO). Excluding Electric';
        $insurerRemarks2 = '6 +1 Seating - Only Innova, Innova crysta, Hycross, Scorpio, Bolero, With NCB Only (Without NCB Less 3% PO) - Excluding Electric';

        foreach (
            [
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Comprehensive', 'location' => 'CH-01 & PB-01', 'remarks_additional' => 'Upto 999 CC - Nil Dep - Upto 15 Years', 'points' => 15],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Comprehensive', 'location' => 'CH-01 & PB-01', 'remarks_additional' => 'Upto 999 CC - Non Nil Dep - Upto 15 Years', 'points' => 19],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Third Party', 'location' => 'CH-01 & PB-01', 'remarks_additional' => 'Upto 999 CC - Upto 25 Years', 'points' => 27],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Comprehensive', 'location' => 'CH-01 & PB-01', 'remarks_additional' => '1000-1499 CC - Nil Dep - Upto 15 Years', 'points' => 17],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Comprehensive', 'location' => 'CH-01 & PB-01', 'remarks_additional' => '1000-1499 CC - Non Nil Dep- Upto 15 Years', 'points' => 22],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Third Party', 'location' => 'CH-01 & PB-01', 'remarks_additional' => '1000-1499 CC - Upto 25 Years', 'points' => 27],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Comprehensive', 'location' => 'CH-01 & PB-01', 'remarks_additional' => 'Above 1500 CC - Nil Dep - Upto 15 Years', 'points' => 19],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Comprehensive', 'location' => 'CH-01 & PB-01', 'remarks_additional' => 'Above 1500 CC - Non Nil Dep- Upto 15 Years', 'points' => 24],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Third Party', 'location' => 'CH-01 & PB-01', 'remarks_additional' => 'Above 1500 CC - Upto 25 Years', 'points' => 28],
                ['insurer_remarks' => $insurerRemarks2, 'policy_type' => 'Comprehensive', 'location' => 'CH-01 & PB-01', 'remarks_additional' => 'Nil Dep - 15 Years', 'points' => 21],
                ['insurer_remarks' => $insurerRemarks2, 'policy_type' => 'Comprehensive', 'location' => 'CH-01 & PB-01', 'remarks_additional' => 'Non Nil Dep - 15 Years', 'points' => 26],
                ['insurer_remarks' => $insurerRemarks2, 'policy_type' => 'Third Party', 'location' => 'CH-01 & PB-01', 'remarks_additional' => 'Upto 25 Years', 'points' => 33],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // DIGIT - TAXI - Comp / TP
        $insurer = 'DIGIT';
        $segment = 'TAXI';

        foreach (
            [
                ['insurer_remarks' => 'Petrol & CNG - Upto 5 Seater', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs REF RTO Decline', 'remarks_additional' => 'Maruti & Hyundai', 'points' => 13],
                ['insurer_remarks' => 'Petrol & CNG - Upto 5 Seater', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs REF RTO Decline', 'remarks_additional' => 'Other than Maruti & Hyundai', 'points' => 8],
                ['insurer_remarks' => 'Electric - Upto 5 Seater', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs REF RTO Decline', 'remarks_additional' => 'Upto 5 Seater', 'points' => 10],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ROYAL - TAXI - Comprehensive & Third Party
        $insurer = 'ROYAL';
        $segment = 'TAXI';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Seating Capacity 04 to 06', 'points' => 11],
                ['policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => 'Seating Capacity 04 to 06', 'points' => 8],
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Seating Capacity 07 to 10', 'points' => 18],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Seating Capacity 04 to 18', 'points' => 18],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }


        // BAJAJ - 3W PCV - Comprehensive & Third Party
        $insurer = 'BAJAJ';
        $segment = '3W PCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab. Excluding Chandigarh', 'remarks_additional' => 'Petrol, Diesel & CNG', 'points' => 27],
                ['policy_type' => 'Third Party', 'location' => 'Punjab. Excluding Chandigarh', 'remarks_additional' => 'Petrol & CNG', 'points' => 53],
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab. Excluding Chandigarh', 'remarks_additional' => 'Electric Only', 'points' => 31],
                ['policy_type' => 'Third Party', 'location' => 'Punjab. Excluding Chandigarh', 'remarks_additional' => 'Electric Only', 'points' => 48],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // LIBERTY - 3W PCV - Comprehensive & Third Party
        $insurer = 'LIBERTY';
        $segment = '3W PCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'New. PUNJAB -1 DECLINE', 'points' => 28],
                ['policy_type' => 'Comprehensive', 'location' => 'PUNJAB - 2', 'remarks_additional' => 'New. PUNJAB -1 DECLINE', 'points' => 36],
                ['policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => '1-5 YEARS. PUNJAB -1 DECLINE', 'points' => 36],
                ['policy_type' => 'Comprehensive', 'location' => 'PUNJAB - 2', 'remarks_additional' => '1-5 YEARS.PUNJAB -1 DECLINE', 'points' => 39],
                ['policy_type' => 'Comprehensive', 'location' => 'CHANDIGARH(TRICITY) & PUNJAB - 2', 'remarks_additional' => 'ABOVE 5 YEARS, PUNJAB -1 DECLINE', 'points' => 50],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Excluding Electric', 'points' => 29],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SHRIRAM - 3W PCV - Comp / TP
        $insurer = 'SHRIRAM';
        $segment = '3W PCV';

        foreach (
            [
                ['insurer_remarks' => 'Upto 15 Years', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Electric - Upto 2000 watt', 'points' => 37],
                ['insurer_remarks' => 'Upto 15 Years', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => '3+1 Only - All fuel', 'points' => 32],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SBI - 3W PCV - Comp / TP
        $insurer = 'SBI';
        $segment = '3W PCV';

        foreach (
            [
                ['insurer_remarks' => 'Comp Upto 15 Yr & TP Upro 25 Yr', 'policy_type' => 'Comp / TP', 'location' => 'Punjab', 'remarks_additional' => 'Non Diesel - 3+1 - Chandigarh Decline', 'points' => 43],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // TATA - 3W PCV - Comp / TP
        $insurer = 'TATA';
        $segment = '3W PCV';

        foreach (
            [
                ['insurer_remarks' => '3+1', 'policy_type' => 'Comp / TP', 'location' => 'Chandigarh', 'remarks_additional' => 'All Fuel', 'points' => 40],
                ['insurer_remarks' => '3+1', 'policy_type' => 'Comp / TP', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Upto 1 Years & Above 6 Years - Petrol & CNG', 'points' => 31],
                ['insurer_remarks' => '3+1', 'policy_type' => 'Comp / TP', 'location' => 'PB1 & PB2', 'remarks_additional' => '1-6 Years, - Petrol & CNG', 'points' => 36],
                ['insurer_remarks' => '3+1', 'policy_type' => 'Comp / TP', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Diesel', 'points' => 18],
                ['insurer_remarks' => '3+1', 'policy_type' => 'Comp / TP', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Electric', 'points' => 41],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // THREE WHEELER PCV (AUTO) segment
        // MAGMA - THREE WHEELER PCV (AUTO) - Third Party
        $insurer = 'MAGMA';
        $segment = '3W PCV';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => '3+1', 'location' => 'CH', 'remarks_additional' => 'Electric', 'points' => 24],
                ['insurer_remarks' => '3+1', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Electric', 'points' => 20],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // ICICI - THREE WHEELER PCV (AUTO) - Comp / TP
        $insurer = 'ICICI';
        $segment = '3W PCV';

        foreach (
            [
                ['insurer_remarks' => 'Electric', 'policy_type' => 'Comp / TP', 'location' => 'Punjab', 'remarks_additional' => 'E Rickshaw - Only Old vehicle', 'points' => 41],
                ['insurer_remarks' => 'Electric', 'policy_type' => 'Comp / TP', 'location' => 'Chandigarh & Ludhiana', 'remarks_additional' => 'E Rickshaw - Only Old vehicle', 'points' => 46],
                ['insurer_remarks' => 'Petrol & CNG - 3+1', 'policy_type' => 'Comp / TP', 'location' => 'Ludhiana', 'remarks_additional' => 'Only Old vehicle - Chandigarh & Punjab RTO Codes Decline', 'points' => 25],

            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ROYAL - THREE WHEELER PCV (AUTO) - Comprehensive, Third Party & Comp / TP
        $insurer = 'ROYAL';
        $segment = '3W PCV';

        foreach (
            [
                ['insurer_remarks' => 'Petrol & CNG - 3+1', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Above 3 Seater', 'points' => 18],
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => '3+1', 'points' => 46],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Electric', 'points' => 54],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // GO DIGIT - THREE WHEELER PCV (AUTO) - Comprehensive & Third Party
        $insurer = 'DIGIT';
        $segment = '3W PCV';

        foreach (
            [
                ['policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Petrol & CNG - 3+1', 'points' => 33],
                ['insurer_remarks' => '3+1', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs REF RTO Decline', 'remarks_additional' => 'Electric Only', 'points' => 46],
                ['insurer_remarks' => '3+1', 'policy_type' => 'Third Party', 'location' => 'All RTOs REF RTO Decline', 'remarks_additional' => 'Electric Only', 'points' => 50],
                ['insurer_remarks' => '3+1', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs REF RTO Decline', 'remarks_additional' => 'Diesel 3+1', 'points' => 27],
                ['insurer_remarks' => '3+1', 'policy_type' => 'Third Party', 'location' => 'All RTOs REF RTO Decline', 'remarks_additional' => 'Diesel 3+1', 'points' => 24],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // FUTURE - THREE WHEELER PCV (AUTO) - Comprehensive & Third Party
        $insurer = 'FUTURE';
        $segment = '3W PCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'points' => 67],
                ['policy_type' => 'Third Party', 'location' => 'Chandigarh', 'points' => 50],
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab', 'points' => 72],
                ['policy_type' => 'Third Party', 'location' => 'Punjab', 'points' => 55],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ZUNO - THREE WHEELER PCV (AUTO) - Comp / TP
        $insurer = 'ZUNO';
        $segment = '3W PCV';

        foreach (
            [
                ['policy_type' => 'Comp / TP', 'location' => 'Punjab', 'remarks_additional' => '( Decline PB12 & PB24 )', 'points' => 31],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // CHOLA - THREE WHEELER PCV (AUTO) - Comprehensive
        $insurer = 'CHOLA';
        $segment = '3W PCV';

        foreach (
            [
                ['insurer_remarks' => 'Without CPA Less 1.5%', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Including Electric - Upto 6 Seater', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // CHOLA - GCW - Comprehensive, Third Party & Comp / TP
        $insurer = 'CHOLA';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => 'Upto 3500 GVW', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'TATA, MARUTI, MAHINDRA. Ace, Super Ace, Yodha, Xenon, Magic, Intra, Super Carry, Mahindra Jeeto, Tractor, Supro', 'points' => 41],
                ['segment_remarks' => 'Upto 3500 GVW', 'policy_type' => 'Third Party', 'remarks_additional' => 'TATA, MARUTI, MAHINDRA. Ace, Super Ace, Yodha, Xenon, Magic, Intra, Super Carry, Mahindra Jeeto, Tractor, Supro', 'points' => 31],
                ['segment_remarks' => 'Upto 3500 GVW', 'policy_type' => 'Comp / TP', 'remarks_additional' => 'All Other Make/Models - Including Electric', 'points' => 22],
                ['segment_remarks' => '3501-7500 GVW', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'Excluding Electric', 'points' => 13],
                ['segment_remarks' => '20001-43000 GVW', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'Excluding Electric', 'points' => 22],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Without CPA Less 1.5%',
                'location' => 'All RTOs',
            ], $policy);
        }

        // ZUNO - GCW - Comp / TP
        $insurer = 'ZUNO';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'Punjab (Decline PB12 & PB24)', 'remarks_additional' => 'Tata, Maruti & Mahindra Only. Mahindra Bolero Camper is declined', 'points' => 29],
                ['segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'Punjab (Decline PB12 & PB24)', 'remarks_additional' => 'Tata, Maruti & Mahindra Only. Mahindra Bolero Camper is declined', 'points' => 31],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SHRIRAM - GCW - Comp / TP
        $insurer = 'SHRIRAM';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => 'Upto 2800 GVW', 'remarks_additional' => 'Upto 15 Years Comp & Upto 25 Years for STP', 'points' => 44],
                ['segment_remarks' => '2801-3500 GVW', 'remarks_additional' => 'Upto 15 Years Comp & Upto 25 Years for STP', 'points' => 38],
                ['segment_remarks' => '7501-12000 GVW', 'remarks_additional' => 'Upto 15 Years', 'points' => 19],
                ['segment_remarks' => '12001 - 42500 GVW', 'remarks_additional' => 'Upto 15 Years Comp & Upto 25 Years for STP', 'points' => 22],
                ['segment_remarks' => '42501-50000 GVW', 'remarks_additional' => 'Upto 15 Years Comp & Upto 25 Years for STP', 'points' => 17],
                ['segment_remarks' => 'Above 50001 GVW', 'remarks_additional' => 'Upto 6 Years', 'points' => 7],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Refer Decline Makes & Models List',
                'policy_type' => 'Comp / TP',
                'location' => 'All RTOs',
            ], $policy);
        }

        // TATA - GCW - Comp / TP, Comprehensive & Third Party
        $insurer = 'TATA';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'Chandigarh', 'remarks_additional' => 'Comp - All Ages & TP - Above 1 Years', 'points' => 44],
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Comp - All Ages & TP - Above 1 Years', 'points' => 43],
                ['segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'Chandigarh', 'remarks_additional' => 'Comp - All Ages & TP - Above 1 Years', 'points' => 37],
                ['segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Comp - All Ages & TP - Above 1 Years', 'points' => 41],
                ['segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => 'Comp - All Ages & TP - Above 1 Years', 'points' => 16],
                ['segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Chandigarh', 'remarks_additional' => 'Comp - All Ages & TP - Above 1 Years', 'points' => 25],
                ['segment_remarks' => '3501-12000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'PB1', 'remarks_additional' => 'All Ages', 'points' => 41],
                ['segment_remarks' => '3501-12000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'PB2', 'remarks_additional' => 'Above 6 Years', 'points' => 15],
                ['segment_remarks' => '3501-12000 GVW', 'policy_type' => 'Third Party', 'location' => 'PB1 & PB2', 'remarks_additional' => '1-6 Years', 'points' => 18],
                ['segment_remarks' => '3501-12000 GVW', 'policy_type' => 'Third Party', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Above 6 Years', 'points' => 16],
                ['segment_remarks' => '12001-45000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'PB1 & PB2 Decline Chandigarh', 'remarks_additional' => 'New', 'points' => 6],
                ['segment_remarks' => '12001-45000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'PB1 & PB2 Decline Chandigarh', 'remarks_additional' => '1 to 6 Years', 'points' => 10],
                ['segment_remarks' => '12001-45000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'PB1 & PB2 Decline Chandigarh', 'remarks_additional' => 'Above 6 Years', 'points' => 21],
                ['segment_remarks' => '12001-45000 GVW', 'policy_type' => 'Third Party', 'location' => 'Chandigarh', 'remarks_additional' => 'Above 1 Years', 'points' => 25],
                ['segment_remarks' => '12001-45000 GVW', 'policy_type' => 'Third Party', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Above 1 Years', 'points' => 27],
                ['segment_remarks' => 'Above 45001 GVW', 'policy_type' => 'Third Party', 'location' => 'Chandigarh', 'remarks_additional' => 'Above 1 Years - Decline PB1 & PB2', 'points' => 25],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // UNIVERSAL SOMPO - GCW - Comp / TP
        $insurer = 'SOMPO';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => 'Upto 3500 GVW', 'location' => 'All RTOs', 'points' => 30],
                ['segment_remarks' => '3501-20000 GVW', 'location' => 'All RTOs', 'points' => 21],
                ['segment_remarks' => '20001-40000 GVW', 'location' => 'Punjab', 'points' => 21],
                ['segment_remarks' => '20001-40000 GVW', 'location' => 'Chandigarh', 'points' => 19],
                ['segment_remarks' => 'Above 40000 GVW', 'location' => 'Punjab', 'points' => 14],
                ['segment_remarks' => 'Above 40000 GVW', 'location' => 'Chandigarh', 'points' => 12],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => 'Comp / TP',
            ], $policy);
        }

        // BAJAJ - GCW - Comprehensive & Third Party
        $insurer = 'BAJAJ';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Exclude Patiala', 'points' => 27],
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Third Party', 'location' => 'Punjab', 'points' => 50],
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Third Party', 'location' => 'Chandigarh', 'points' => 48],
                ['segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Excluding Chandigarh. Max 28% po on net- All BOLERO and MAX PICK UP models', 'points' => 18],
                ['segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => 'Excluding Chandigarh. Max 28% po on net- All BOLERO and MAX PICK UP models', 'points' => 41],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ICICI - GCW - Comprehensive, Comp / TP & Third Party
        $insurer = 'ICICI';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => 'Upto 2450 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'New Vehicle Only. Ludhiana Excluding', 'points' => 8],
                ['segment_remarks' => 'Upto 2450 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => 'New Vehicle Only. Ludhiana Excluding', 'points' => 22],
                ['segment_remarks' => 'Upto 2450 GVW', 'policy_type' => 'Comp / TP', 'location' => 'Punjab', 'remarks_additional' => 'TATA Only - Old Vehicle', 'points' => 46],
                ['segment_remarks' => 'Upto 2450 GVW', 'policy_type' => 'Comp / TP', 'location' => 'Chandigarh', 'remarks_additional' => 'Old', 'points' => 27],
                ['segment_remarks' => 'Upto 2450 GVW', 'policy_type' => 'Comp / TP', 'location' => 'Ludhiana', 'remarks_additional' => 'Old', 'points' => 18],
                ['segment_remarks' => '7500-12000 GVW', 'insurer_remarks' => 'TATA & AL Only', 'policy_type' => 'Third Party', 'location' => 'Ludhiana', 'remarks_additional' => 'Punjab & Chandigarh Decline - Above 5 Years', 'points' => 27],
                ['segment_remarks' => '20001 - 40000 GVW', 'insurer_remarks' => 'Truck, Tanker, Tipper & Trailer', 'policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Chandigarh & Ludhiana Decline', 'points' => 22],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SBI - GCW - Comprehensive, Comp / TP & Third Party
        $insurer = 'SBI';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => 'Upto 2000 GVW', 'insurer_remarks' => 'Except EV', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Only New', 'points' => 51],
                ['segment_remarks' => 'Upto 2000 GVW', 'insurer_remarks' => 'Except EV', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Only Old', 'points' => 58],
                ['segment_remarks' => '2001-2500 GVW', 'insurer_remarks' => 'Except EV', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Tata & Mahindra Supro Makes Only - Only New', 'points' => 48],
                ['segment_remarks' => '2001-2500 GVW', 'insurer_remarks' => 'Except EV', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Tata & Mahindra Supro Makes Only - Only Old', 'points' => 55],
                ['segment_remarks' => '2001-2500 GVW', 'insurer_remarks' => 'Except EV', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Other than Tata makes - Only New', 'points' => 43],
                ['segment_remarks' => '2001-2500 GVW', 'insurer_remarks' => 'Except EV', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Other than Tata makes. Only Old', 'points' => 45],
                ['segment_remarks' => '2001-2500 GVW', 'insurer_remarks' => 'Except EV', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Other than Tata makes.  Only Old', 'points' => 45],
                ['segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Mahindra all variants - Comprehensive Upto 15 Years & TP Upto 25 Years', 'points' => 42],
                ['segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'TATA & Ashok Leyland. Comprehensive Upto 15 Years & TP Upto 25 Years', 'points' => 44],
                ['segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'TATA & Ashok Leyland. Comprehensive Upto 15 Years & TP Upto 25 Years', 'points' => 46],
                ['segment_remarks' => '3501-5000 GVW', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Excluding- Eicher & Mahindra. Comp Upto 15 Years & Third Party Upto 25 Years Only', 'points' => 22],
                ['segment_remarks' => '5000 - 7500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Excluding- Eicher & Mahindra. Comp Upto 15 Years & Third Party Upto 25 Years Only', 'points' => 20],
                ['segment_remarks' => '7501-12000 GVW', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Excluding- Eicher - Comp Upto 15 Years & Third Party Upto 25 Years Only', 'points' => 22],
                ['segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'TATA Only - Only New', 'points' => 21],
                ['segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'TATA Only - 1- 5 Years', 'points' => 23],
                ['segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'TATA Only - 1- 5 Years', 'points' => 25],
                ['segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'TATA Only - Comp 5 to 15 Years & Third Party 5 to 25 Years Only', 'points' => 27],
                ['segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'TATA & Ashok leyland. Only New', 'points' => 18],
                ['segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'TATA & Ashok leyland. Only New', 'points' => 20],
                ['segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'TATA & Ashok leyland. 1- 5 Years', 'points' => 20],
                ['segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'TATA & Ashok leyland. 1- 5 Years', 'points' => 22],
                ['segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'TATA & Ashok leyland - Comp 5 to 15 Years & Third Party 5 to 25 Years Only', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SBI - GCW - Comprehensive & Third Party (continued)
        $insurer = 'SBI';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'Other Makes. Only New', 'points' => 14],
                ['segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Third Party', 'remarks_additional' => 'Other Makes. Only New', 'points' => 17],
                ['segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'Other Makes. 1- 5 Years', 'points' => 16],
                ['segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Third Party', 'remarks_additional' => 'Other Makes. 1- 5 Years', 'points' => 18],
                ['segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Comprehensive', 'remarks_additional' => 'Other Makes. Comp 5 to 15 Years & Third Party 5 to 25 Years Only', 'points' => 18],
                ['segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Third Party', 'remarks_additional' => 'Other Makes. Comp 5 to 15 Years & Third Party 5 to 25 Years Only', 'points' => 21],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'location' => 'All RTOs',
            ], $policy);
        }

        // GO DIGIT - GCW - Comp / TP
        $insurer = 'DIGIT';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => 'Upto 1600 GVW', 'insurer_remarks' => 'Excluding PB REF RTO', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 2 Years', 'points' => 46],
                ['segment_remarks' => 'Upto 1600 GVW', 'insurer_remarks' => 'Excluding PB REF RTO', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Above 2 Years', 'points' => 55],
                ['segment_remarks' => '1600-2500 GVW', 'insurer_remarks' => 'Excluding PB REF RTO', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 2 Years', 'points' => 41],
                ['segment_remarks' => '1600-2500 GVW', 'insurer_remarks' => 'Excluding PB REF RTO', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Above 2 Years', 'points' => 55],
                ['segment_remarks' => 'Upto 1600 GVW', 'policy_type' => 'Comp / TP', 'location' => 'PB REF', 'remarks_additional' => 'All Ages', 'points' => 46],
                ['segment_remarks' => '1600-2500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'PB REF', 'remarks_additional' => 'Upto 2 Years', 'points' => 41],
                ['segment_remarks' => '1600-2500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'PB REF', 'remarks_additional' => 'Above 2 Years', 'points' => 46],
                ['segment_remarks' => '2501-3500 GVW', 'insurer_remarks' => 'PB REF RTO Decline', 'policy_type' => 'Comp/ TP', 'location' => 'All RTOs PB - 03,05,06,07,08,12,13 Decline RTOs', 'remarks_additional' => 'Tata Make', 'points' => 41],
                ['segment_remarks' => '2501-3500 GVW', 'insurer_remarks' => 'PB REF RTO Decline', 'policy_type' => 'Comp/ TP', 'location' => 'All RTOs PB - 03,05,06,07,08,12,13 Decline RTOs', 'remarks_additional' => 'Other Than Tata', 'points' => 18],
                ['segment_remarks' => '3501-7500 GVW', 'insurer_remarks' => 'PB REF RTO Decline', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs PB - 03,05,06,07,08,12,13 Decline RTOs', 'remarks_additional' => 'Upto 1 Years', 'points' => 17],
                ['segment_remarks' => '3501-7500 GVW', 'insurer_remarks' => 'PB REF RTO Decline', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs PB - 03,05,06,07,08,12,13 Decline RTOs', 'remarks_additional' => 'Above 1 Years', 'points' => 22],
                ['segment_remarks' => '3501-7500 GVW', 'insurer_remarks' => 'PB REF RTO Decline', 'policy_type' => 'Third Party', 'location' => 'All RTOs PB - 03,05,06,07,08,12,13 Decline RTOs', 'remarks_additional' => 'Upto 5 Years', 'points' => 13],
                ['segment_remarks' => '3501-7500 GVW', 'insurer_remarks' => 'PB REF RTO Decline', 'policy_type' => 'Third Party', 'location' => 'All RTOs PB - 03,05,06,07,08,12,13 Decline RTOs', 'remarks_additional' => 'Above 5 Years', 'points' => 27],
                ['segment_remarks' => '7501-12000 GVW', 'insurer_remarks' => 'PB REF RTO Decline', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Above 5 Years - Excluding Oil & Gas Tanker', 'points' => 10],
                ['segment_remarks' => '7501-12000 GVW', 'insurer_remarks' => 'PB REF RTO Decline', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Above 5 Years - Excluding Oil & Gas Tanker', 'points' => 13],
                ['segment_remarks' => '12001-20000 GVW', 'insurer_remarks' => 'PB REF RTO Decline', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs PB - 03,05,06,07,08,12,13 Decline RTOs', 'remarks_additional' => 'Above 5 years - PB12 Decline - Excluding Oil & Gas Tanker (All excluding Volvo and Scania)', 'points' => 10],
                ['segment_remarks' => '12001-20000 GVW', 'insurer_remarks' => 'PB REF RTO Decline', 'policy_type' => 'Third Party', 'location' => 'All RTOs PB - 03,05,06,07,08,12,13 Decline RTOs', 'remarks_additional' => 'Above 5 years - PB12 Decline - Excluding Oil & Gas Tanker (All excluding Volvo and Scania)', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // LIBERTY - GCW - Comp/ TP, Comprehensive & Third Party
        $insurer = 'LIBERTY';
        $segment = 'GCW';

        foreach (
            [
                ['policy_type' => 'Comp/ TP', 'location' => 'CHANDIGARH(TRICITY), PUNJAB - 1', 'remarks_additional' => 'NEW', 'points' => 33],
                ['policy_type' => 'Comprehensive', 'location' => 'PUNJAB - 2', 'remarks_additional' => 'NEW', 'points' => 18],
                ['policy_type' => 'Third Party', 'location' => 'PUNJAB - 2', 'remarks_additional' => 'NEW', 'points' => 0],
                ['policy_type' => 'Comp/ TP', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => '1-5 YEARS', 'points' => 46],
                ['policy_type' => 'Third Party', 'location' => 'PB - 84 RTO', 'remarks_additional' => '1-5 YEARS', 'points' => 0],
                ['policy_type' => 'Comprehensive', 'location' => 'PUNJAB - 1', 'remarks_additional' => '1-5 YEARS', 'points' => 56],
                ['policy_type' => 'Third Party', 'location' => 'PUNJAB - 1', 'remarks_additional' => '1-5 YEARS', 'points' => 57],
                ['policy_type' => 'Comp/ TP', 'location' => 'PUNJAB - 2', 'remarks_additional' => '1-5 YEARS', 'points' => 37],
                ['policy_type' => 'Comp/ TP', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => '6-10 YEARS', 'points' => 54],
                ['policy_type' => 'Third Party', 'location' => 'PB - 84 RTO', 'remarks_additional' => '6-10 YEARS', 'points' => 53],
                ['policy_type' => 'Comp/ TP', 'location' => 'PUNJAB - 1', 'remarks_additional' => '6-10 YEARS', 'points' => 57],
                ['policy_type' => 'Comp/ TP', 'location' => 'PUNJAB - 2', 'remarks_additional' => '6-10 YEARS', 'points' => 43],
                ['policy_type' => 'Comp/ TP', 'location' => 'CHANDIGARH(TRICITY)', 'remarks_additional' => 'ABOVE 10 YEARS', 'points' => 54],
                ['policy_type' => 'Third Party', 'location' => 'PB - 84 RTO', 'remarks_additional' => 'ABOVE 10 YEARS', 'points' => 53],
                ['policy_type' => 'Comp/ TP', 'location' => 'PUNJAB - 1', 'remarks_additional' => 'ABOVE 10 YEARS', 'points' => 57],
                ['policy_type' => 'Comp/ TP', 'location' => 'PUNJAB - 2', 'remarks_additional' => 'ABOVE 10 YEARS', 'points' => 38],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'segment_remarks' => 'Upto 2500 GVW',
                'insurer_remarks' => 'Exluding - Electric',
            ], $policy);
        }

        // FUTURE - GCW - Comprehensive & Third Party
        $insurer = 'FUTURE';
        $segment = 'GCW';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => 'Including Bolero', 'points' => 30],
                ['policy_type' => 'Third Party', 'location' => 'Chandigarh', 'remarks_additional' => 'Including Bolero', 'points' => 13],
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 48],
                ['policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 31],
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Mahindra Bolero Only', 'points' => 45],
                ['policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => 'Mahindra Bolero Only', 'points' => 28],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'segment_remarks' => 'Upto 3500 GVW',
            ], $policy);
        }

        // HDFC - GCW - Comprehensive & Third Party
        $insurer = 'HDFC';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Punjab', 'points' => 31],
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Patiala', 'points' => 22],
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'points' => 27],
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'points' => 46],
                ['segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'TATA Makes Only', 'points' => 27],
                ['segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'points' => 18],
                ['segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'points' => 36],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ROYAL - GCW - Comprehensive & Third Party
        $insurer = 'ROYAL';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => 'Upto 2300 GVW', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => '-', 'points' => 49],
                ['segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Decline Chandigarh', 'points' => 33],
                ['segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Decline Chandigarh', 'points' => 30],
                ['segment_remarks' => 'Upto 2300 GVW', 'policy_type' => 'Third Party', 'location' => 'Chandigarh', 'remarks_additional' => '-', 'points' => 51],
                ['segment_remarks' => 'Upto 2300 GVW', 'policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => '-', 'points' => 52],
                ['segment_remarks' => '2301-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Chandigarh', 'remarks_additional' => '-', 'points' => 16],
                ['segment_remarks' => '2301-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => '-', 'points' => 19],
                ['segment_remarks' => '3501-7500 GVW', 'policy_type' => 'Third Party', 'location' => 'Punjab. Chandigarh Decline', 'remarks_additional' => '-', 'points' => 10],
                ['segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Third Party', 'location' => 'Punjab. Chandigarh Decline', 'remarks_additional' => '-', 'points' => 29],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ROYAL - GCW - ELECTRIC - Comprehensive & Third Party
        $insurer = 'ROYAL';
        $segment = 'GCW';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'remarks_additional' => 'Electric', 'points' => 40],
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Electric', 'points' => 41],
                ['policy_type' => 'Third Party', 'location' => 'Chandigarh', 'remarks_additional' => 'Electric', 'points' => 46],
                ['policy_type' => 'Third Party', 'location' => 'Punjab', 'remarks_additional' => 'Electric', 'points' => 47],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'segment_remarks' => 'Upto 3500 GVW',
                'insurer_remarks' => 'ELECTRIC',
            ], $policy);
        }

        // RELIANCE - GCW - Comp / TP & Third Party
        $insurer = 'RELIANCE';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'TATA, MARUTI', 'points' => 58],
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Mahindra - Jeeto, Supro, Maxximo Makes Only', 'points' => 53],
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Other Makes', 'points' => 48],
                ['segment_remarks' => '2501 - 3500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'Punjab, Amritsar & Ludhiana', 'remarks_additional' => 'All Makes - Decline Chandigarh', 'points' => 47],
                ['segment_remarks' => '7501-12000 GVW', 'policy_type' => 'Comp / TP', 'location' => 'Chandigarh', 'remarks_additional' => 'All Makes - Decline Punjab Decline', 'points' => 28],
                ['segment_remarks' => '12001-20000 GVW', 'insurer_remarks' => 'ALL MAKES', 'policy_type' => 'Third Party', 'location' => 'Punjab, Amritsar & Ludhiana', 'remarks_additional' => 'Chandigarh Decline - Upto 5 Yr', 'points' => 31],
                ['segment_remarks' => '12001-20000 GVW', 'insurer_remarks' => 'ALL MAKES', 'policy_type' => 'Third Party', 'location' => 'Punjab, Amritsar & Ludhiana', 'remarks_additional' => 'Chandigarh Decline - Above 5 Yr', 'points' => 33],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // MAGMA - GCW - Comp / TP, Comprehensive & Third Party
        $insurer = 'MAGMA';
        $segment = 'GCW';

        foreach (
            [
                ['segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'All Ages', 'points' => 26],
                ['segment_remarks' => '2501-2800 GVW', 'policy_type' => 'Comprehensive', 'location' => 'CH', 'remarks_additional' => 'All Ages', 'points' => 37],
                ['segment_remarks' => '2501-2800 GVW', 'policy_type' => 'Comprehensive', 'location' => 'CH', 'remarks_additional' => 'All Ages', 'points' => 36],
                ['segment_remarks' => '2501-2800 GVW', 'policy_type' => 'Third Party', 'location' => 'PB1', 'remarks_additional' => 'All Ages', 'points' => 19],
                ['segment_remarks' => '2501-2800 GVW', 'policy_type' => 'Third Party', 'location' => 'PB2', 'remarks_additional' => 'All Ages', 'points' => 22],
                ['segment_remarks' => '2801-3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'CH', 'remarks_additional' => 'All Ages', 'points' => 27],
                ['segment_remarks' => '2801-3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'PB2', 'remarks_additional' => 'All Ages', 'points' => 27],
                ['segment_remarks' => '2801-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'CH', 'remarks_additional' => 'All Ages', 'points' => 18],
                ['segment_remarks' => '2801-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'PB2', 'remarks_additional' => 'All Ages', 'points' => 22],
                ['segment_remarks' => '3501-7500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'CH', 'remarks_additional' => 'All Ages', 'points' => 18],
                ['segment_remarks' => '7501-12000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'CH', 'remarks_additional' => 'All Ages', 'points' => 24],
                ['segment_remarks' => '7501-12000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'PB1 & PB2', 'remarks_additional' => 'All Ages', 'points' => 25],
                ['segment_remarks' => '7501-12000 GVW', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'All Ages', 'points' => 31],
                ['segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Third Party', 'location' => 'CH & PB2', 'remarks_additional' => 'Upto 5 Years', 'points' => 17],
                ['segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Third Party', 'location' => 'PB1', 'remarks_additional' => 'Upto 5 Years', 'points' => 18],
                ['segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Above 5 Years', 'points' => 30],
                ['segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'CH', 'remarks_additional' => 'Above 5 Years', 'points' => 24],
                ['segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Above 5 Years', 'points' => 29],
                ['segment_remarks' => '20000-40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'CH', 'remarks_additional' => 'Above 5 Years - Refer Makes & Models List', 'points' => 28],
                ['segment_remarks' => '20000-40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'PB1', 'remarks_additional' => 'Above 5 Years - Refer Makes & Models List', 'points' => 25],
                ['segment_remarks' => '20000-40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'PB2', 'remarks_additional' => 'Above 5 Years - Refer Makes & Models List', 'points' => 28],
                ['segment_remarks' => '20000-40000 GVW', 'policy_type' => 'Third Party', 'location' => 'CH', 'remarks_additional' => 'Above 5 Years - Refer Makes & Models List', 'points' => 22],
                ['segment_remarks' => '20000-40000 GVW', 'policy_type' => 'Third Party', 'location' => 'PB1', 'remarks_additional' => 'Above 5 Years - Refer Makes & Models List', 'points' => 26],
                ['segment_remarks' => '20000-40000 GVW', 'policy_type' => 'Third Party', 'location' => 'PB2', 'remarks_additional' => 'Above 5 Years - Refer Makes & Models List', 'points' => 23],
                ['segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 5 Years - Refer Makes & Models List', 'points' => 18],
                ['segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'CH', 'remarks_additional' => 'All Ages', 'points' => 17],
                ['segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'PB1', 'remarks_additional' => 'All Ages', 'points' => 18],
                ['segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'PB2', 'remarks_additional' => 'All Ages', 'points' => 19],
                ['segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'All Ages', 'points' => 11],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // GO DIGIT - Tractor - Comprehensive & Third Party
        $insurer = 'DIGIT';
        $segment = 'Tractor';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'PB-1', 'remarks_additional' => 'New Only', 'points' => 46],
                ['policy_type' => 'Comprehensive', 'location' => 'PB-1', 'remarks_additional' => 'Above 1 Years', 'points' => 41],
                ['policy_type' => 'Comprehensive', 'location' => 'PB -2', 'remarks_additional' => 'New Only', 'points' => 24],
                ['policy_type' => 'Comprehensive', 'location' => 'PB -2', 'remarks_additional' => 'Above 1 Years', 'points' => 19],
                ['policy_type' => 'Third Party', 'location' => 'PB-1', 'remarks_additional' => 'New Only', 'points' => 41],
                ['policy_type' => 'Third Party', 'location' => 'PB-1', 'remarks_additional' => 'Above 1 Years', 'points' => 39],
                ['policy_type' => 'Third Party', 'location' => 'PB -2', 'remarks_additional' => 'New Only', 'points' => 17],
                ['policy_type' => 'Third Party', 'location' => 'PB -2', 'remarks_additional' => 'Above 1 Years', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // TATA - Tractor - Comp / TP
        $insurer = 'TATA';
        $segment = 'Tractor';

        foreach (
            [
                ['policy_type' => 'Comp / TP', 'location' => 'Chandigarh', 'remarks_additional' => 'Comp - All Ages & TP - Above 1 Years', 'points' => 35],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // LIBERTY - Tractor - Comprehensive
        $insurer = 'LIBERTY';
        $segment = 'Tractor';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'ALL PUNJAB RTOs', 'remarks_additional' => 'All AGES - CHANDIGARH(TRICITY) DECLINE', 'points' => 24],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // BAJAJ - Tractor - Comprehensive
        $insurer = 'BAJAJ';
        $segment = 'Tractor';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => '', 'points' => 22],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // UNIVERSAL SOMPO - Tractor - Comprehensive & Comp / TP
        $insurer = 'SOMPO';
        $segment = 'Tractor';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'New Only', 'points' => 30],
                ['policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Rollover', 'points' => 22],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // MAGMA - Tractor - Comprehensive & Third Party
        $insurer = 'MAGMA';
        $segment = 'Tractor';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'PB1 & PB2', 'remarks_additional' => 'New', 'points' => 30],
                ['policy_type' => 'Comprehensive', 'location' => 'CH', 'remarks_additional' => 'Old', 'points' => 21],
                ['policy_type' => 'Comprehensive', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Old', 'points' => 26],
                ['policy_type' => 'Third Party', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Old', 'points' => 32],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ICICI - Tractor - Comprehensive
        $insurer = 'ICICI';
        $segment = 'Tractor';

        foreach (
            [
                ['insurer_remarks' => 'New Only', 'policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => '(Above 50 HP) - New Vehicle Only', 'points' => 44],
                ['insurer_remarks' => 'New Only', 'policy_type' => 'Comprehensive', 'location' => 'Ludhiana', 'points' => 35],
                ['insurer_remarks' => 'New Only', 'policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'points' => 44],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SHRIRAM - Tractor - Comprehensive
        $insurer = 'SHRIRAM';
        $segment = 'Tractor';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Only New - Without Trailer', 'points' => 39],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SBI - Tractor - Comprehensive & Comp / TP
        $insurer = 'SBI';
        $segment = 'Tractor';

        foreach (
            [
                ['insurer_remarks' => 'Only New', 'policy_type' => 'Comprehensive', 'location' => 'Punjab', 'remarks_additional' => 'Tractor & Harvester', 'points' => 42],
                ['insurer_remarks' => '1 to 25 Years', 'policy_type' => 'Comp / TP', 'location' => 'Punjab', 'remarks_additional' => 'Excluding Trailer & Chandigarh Declined', 'points' => 44],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ZUNO - Tractor - Comp / TP
        $insurer = 'ZUNO';
        $segment = 'Tractor';

        foreach (
            [
                ['policy_type' => 'Comp / TP', 'location' => 'Punjab', 'remarks_additional' => 'Single Registered Trailer - Decline RTOs - PB12 & PB24', 'points' => 33],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // KOTAK - Tractor - Comprehensive
        $insurer = 'KOTAK';
        $segment = 'Tractor';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Chandigarh', 'points' => 44],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // CHOLA - Tractor - Comprehensive
        $insurer = 'CHOLA';
        $segment = 'Tractor';

        foreach (
            [
                ['insurer_remarks' => 'Without CPA Less 1.5%', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'points' => 37],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // RELIANCE - Tractor - Comprehensive
        $insurer = 'RELIANCE';
        $segment = 'Tractor';

        foreach (
            [
                ['insurer_remarks' => 'Agricultural without Trailer', 'policy_type' => 'Comprehensive', 'location' => 'Punjab, Ludhiana & Amritsar', 'remarks_additional' => 'New. Chandigarh Decline', 'points' => 48],
                ['insurer_remarks' => 'Agricultural without Trailer', 'policy_type' => 'Comprehensive', 'location' => 'Punjab, Ludhiana & Amritsar Chandigarh Decline', 'remarks_additional' => '1- 5 Years', 'points' => 19],
                ['insurer_remarks' => 'Agricultural without Trailer', 'policy_type' => 'Comprehensive', 'location' => 'Punjab, Ludhiana & Amritsar Chandigarh Decline', 'remarks_additional' => 'Above 5 Years', 'points' => 19],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // GO DIGIT - MISD - Comprehensive & Third Party
        $insurer = 'DIGIT';
        $segment = 'MISD';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs REF RTO Decline', 'remarks_additional' => 'Other Than JCB', 'points' => 22],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs REF RTO Decline', 'remarks_additional' => 'Other Than JCB', 'points' => 17],
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs REF RTO Decline', 'remarks_additional' => 'JCB', 'points' => 30],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs REF RTO Decline', 'remarks_additional' => 'JCB', 'points' => 24],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // CHOLA - MISD - Comprehensive
        $insurer = 'CHOLA';
        $segment = 'MISD';

        foreach (
            [
                ['insurer_remarks' => 'Without CPA Less 1.5%', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'EXCAVATOR - Loader, Excavators/Earth Movers, Crane, Bulldozers/Bullgraders, Road Rollers, Fork Lift Trucks', 'points' => 15],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // MAGMA - MISD - Comprehensive & Third Party
        $insurer = 'MAGMA';
        $segment = 'MISD';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'CH & PB1', 'remarks_additional' => 'Garbage Van', 'points' => 24],
                ['policy_type' => 'Third Party', 'location' => 'CH', 'remarks_additional' => 'Garbage Van', 'points' => 23],
                ['policy_type' => 'Third Party', 'location' => 'PB1 & PB2', 'remarks_additional' => 'Garbage Van', 'points' => 19],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SHRIRAM - MISD - Comp / TP
        $insurer = 'SHRIRAM';
        $segment = 'MISD';

        foreach (
            [
                ['insurer_remarks' => 'Upto 15 Years', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Excluding Crane, Tractor and Ambulance and other than Combined harvester and harvester.', 'points' => 22],
                ['insurer_remarks' => 'Upto 15 Years', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'For Combined Harvester and Harvester only', 'points' => 39],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // TATA - MISD - Comp / TP
        $insurer = 'TATA';
        $segment = 'MISD';

        foreach (
            [
                ['policy_type' => 'Comp / TP', 'location' => 'Chandigarh', 'remarks_additional' => 'Comp - All Ages & TP - Above 1 Years', 'points' => 12],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // BAJAJ - MISD - Comprehensive
        $insurer = 'BAJAJ';
        $segment = 'MISD';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Excluding Ambulance Cranes and Transit Mixer', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ICICI - MISD - Comp / TP
        $insurer = 'ICICI';
        $segment = 'MISD';

        foreach (
            [
                ['policy_type' => 'Comp / TP', 'location' => 'Punjab', 'remarks_additional' => 'Only New - Excluding CRANES', 'points' => 26],
                ['policy_type' => 'Comp / TP', 'location' => 'Ludhiana', 'remarks_additional' => 'Excluding CRANES', 'points' => 22],
                ['policy_type' => 'Comp / TP', 'location' => 'Chandigarh', 'remarks_additional' => 'Excluding CRANES', 'points' => 19],
                ['policy_type' => 'Comp / TP', 'location' => 'Chandigarh', 'remarks_additional' => 'Garbage Van Only (Upto 3.5 GVW)- Tata Ace, Intra, Maruti Super Carry, MGM Bolero, Supro, Jeeto, AL', 'points' => 30],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // Insert policies with default null values for unspecified columns
        foreach ($policies as $policy) {
            DB::table('insurance_grid_raws')->insert(array_merge([
                'location' => null,
                'location_remarks' => null,
                'insurer_remarks' => null,
                'segment_remarks' => null,
                'policy_type_remarks' => null,
                'remarks_additional' => null,
                'region' => 6,
                'period' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], $policy));
        }

        $this->command->info('Seeded ' . count($policies) . ' insurance policies from September 2025 grid.');
    }
}
