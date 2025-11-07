<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NovNeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policies = [
            // ========================================
            // PRIVATE CAR COMPREHENSIVE & SAOD
            // ========================================
            
            ['insurer' => 'Future', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comp', 'policy_type_remarks' => '-',  'location' => 'All RTOs', 'remarks_additional' => '-', 'points' => 27],
            ['insurer' => 'Future', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => '-',  'location' => 'All RTOs', 'remarks_additional' => '', 'points' => 27],
            
            ['insurer' => 'SBI', 'insurer_remarks' => 'With NCB', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comp', 'policy_type_remarks' => 'All Fuel',  'location' => 'AR,SK', 'remarks_additional' => 'Declined Models - Audi/BMW/Mercedes & for obsolete model', 'points' => 25],
            ['insurer' => 'SBI', 'insurer_remarks' => 'With NCB', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comp', 'policy_type_remarks' => 'All Fuel',  'location' => 'AS,MN,ML,MZ,NL,TR', 'remarks_additional' => 'Declined Models - Audi/BMW/Mercedes & for obsolete model', 'points' => 27],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Without NCB', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comp', 'policy_type_remarks' => 'All Fuel',  'location' => 'AR,SK', 'remarks_additional' => 'Declined Models - Audi/BMW/Mercedes & for obsolete model', 'points' => 20],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Without NCB', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comp', 'policy_type_remarks' => 'All Fuel',  'location' => 'AS,MN,ML,MZ,NL,TR', 'remarks_additional' => 'Declined Models - Audi/BMW/Mercedes & for obsolete model', 'points' => 22],
            ['insurer' => 'SBI', 'insurer_remarks' => 'With NCB', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'All Fuel',  'location' => 'AR,SK', 'remarks_additional' => 'Declined Models - Audi/BMW/Mercedes & for obsolete model', 'points' => 22],
            ['insurer' => 'SBI', 'insurer_remarks' => 'With NCB', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'All Fuel',  'location' => 'AS,MN,ML,MZ,NL,TR', 'remarks_additional' => 'Declined Models - Audi/BMW/Mercedes & for obsolete model', 'points' => 24],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Without NCB', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'All Fuel',  'location' => 'AR,SK', 'remarks_additional' => 'Declined Models - Audi/BMW/Mercedes & for obsolete model', 'points' => 18],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Without NCB', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'All Fuel',  'location' => 'AS,MN,ML,MZ,NL,TR', 'remarks_additional' => 'Declined Models - Audi/BMW/Mercedes & for obsolete model', 'points' => 19],

            ['insurer' => 'CHOLA', 'insurer_remarks' => 'UPTO 1500 CC', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'All Fuel',  'location' => 'AS/ML/TR/AR/NL', 'remarks_additional' => '(WITHOUT CPA 1.5% LESS)', 'points' => 22],
            ['insurer' => 'CHOLA', 'insurer_remarks' => 'Above-1500 CC', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'All Fuel',  'location' => 'AS/ML/TR/AR/NL', 'remarks_additional' => '(WITHOUT CPA 1.5% LESS)', 'points' => 27],
            ['insurer' => 'CHOLA', 'insurer_remarks' => 'UPTO 1500 CC', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'PETROL',  'location' => 'AS/ML/TR/AR/NL', 'remarks_additional' => '(WITHOUT CPA 1.5% LESS)', 'points' => 17],
            ['insurer' => 'CHOLA', 'insurer_remarks' => 'Above-1500 CC', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'PETROL',  'location' => 'AS/ML/TR/AR/NL', 'remarks_additional' => '(WITHOUT CPA 1.5% LESS)', 'points' => 18],
            
            ['insurer' => 'Digit', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'PETROL',  'location' => 'AS_Good', 'remarks_additional' => 'Non HEV OD+Addon', 'points' => 27],
            ['insurer' => 'Digit', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'PETROL',  'location' => 'NE_Good,NE_Ref', 'remarks_additional' => 'Non HEV OD+Addon', 'points' => 10],
            ['insurer' => 'Digit', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Non-Petrol (incl. CNG)',  'location' => 'AS_Good', 'remarks_additional' => 'Non HEV OD+Addon', 'points' => 21],
            ['insurer' => 'Digit', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Non-Petrol (incl. CNG)',  'location' => 'NE_Good,NE_Ref', 'remarks_additional' => 'Non HEV OD+Addon', 'points' => 18],
            ['insurer' => 'Digit', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'All Fuel',  'location' => 'AS_Good,NE_Ref', 'remarks_additional' => 'Non HEV OD+Addon', 'points' => 24],
            ['insurer' => 'Digit', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'All Fuel',  'location' => 'NE_Good', 'remarks_additional' => 'Non HEV OD+Addon', 'points' => 21],
            
            ['insurer' => 'ICICI', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'ALL FUEL',  'location' => 'ALL RTO', 'remarks_additional' => 'NEW', 'points' => 27],
            ['insurer' => 'ICICI', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive +SAOD', 'policy_type_remarks' => 'ALL FUEL',  'location' => 'ALL RTO', 'remarks_additional' => 'With NCB', 'points' => 27],
            ['insurer' => 'ICICI', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive +SAOD', 'policy_type_remarks' => 'ALL FUEL',  'location' => 'ALL RTO', 'remarks_additional' => 'Without NCB', 'points' => 15],
        
            ['insurer' => 'HDFC', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Petrol & Hybtid, Electric',  'location' => 'Rest of all RTOs', 'remarks_additional' => '-', 'points' => 27],
            ['insurer' => 'HDFC', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Diesel & CNG',  'location' => 'Rest of all RTOs', 'remarks_additional' => 'With NCB', 'points' => 27],
            ['insurer' => 'HDFC', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Diesel & CNG',  'location' => 'Rest of all RTOs', 'remarks_additional' => 'Without NCB', 'points' => 13],
            ['insurer' => 'HDFC', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'Petrol & Hybtid, Electric',  'location' => 'Rest of all RTOs', 'remarks_additional' => 'With NCB', 'points' => 27],
            ['insurer' => 'HDFC', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'Diesel & CNG',  'location' => 'Rest of all RTOs', 'remarks_additional' => 'With NCB', 'points' => 22],
            ['insurer' => 'HDFC', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'Petrol & Hybtid, Electric',  'location' => 'Rest of all RTOs', 'remarks_additional' => 'Without NCB', 'points' => 18],
            ['insurer' => 'HDFC', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'Diesel & CNG',  'location' => 'Rest of all RTOs', 'remarks_additional' => 'Without NCB', 'points' => 13],
            
            ['insurer' => 'TATA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'All Fuel',  'location' => 'ALL RTOs', 'remarks_additional' => 'With NCB & Without NCB', 'points' => 17],
            ['insurer' => 'TATA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'All Fuel',  'location' => 'ALL RTOs', 'remarks_additional' => 'With NCB & Without NCB', 'points' => 17],
            
            ['insurer' => 'DIGIT', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'All Fuel',  'location' => 'ALL RTOs', 'remarks_additional' => '', 'points' => 22],
            ['insurer' => 'DIGIT', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'All Fuel',  'location' => 'ALL RTOs', 'remarks_additional' => '', 'points' => 22],
            
            ['insurer' => 'RELIANCE', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'PETROL',  'location' => 'ALL RTOs', 'remarks_additional' => 'WITH NCB', 'points' => 27],
            ['insurer' => 'RELIANCE', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'DIESEL, PETROL',  'location' => 'ALL RTOs', 'remarks_additional' => 'WITH NCB', 'points' => 27],
        
            ['insurer' => 'Liberty', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'PETROL',  'location' => 'AR,AS', 'remarks_additional' => '', 'points' => 19],
            ['insurer' => 'Liberty', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'PETROL',  'location' => 'ML,MZ', 'remarks_additional' => '', 'points' => 21],
            ['insurer' => 'Liberty', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'DIESEL',  'location' => 'AS', 'remarks_additional' => '', 'points' => 17],
            ['insurer' => 'Liberty', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'DIESEL',  'location' => 'AR', 'remarks_additional' => '', 'points' => 19],
            ['insurer' => 'Liberty', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'DIESEL',  'location' => 'ML,MZ', 'remarks_additional' => '', 'points' => 20],
            ['insurer' => 'Liberty', 'segment' => 'PRIVATE CAR', 'policy_type' => 'SAOD', 'policy_type_remarks' => 'All Fuel',  'location' => 'AR,AS,ML,MZ', 'remarks_additional' => '', 'points' => 17],


            // ========================================
            // PRIVATE CAR THIRD PARTY
            // ========================================
            ['insurer' => 'Future', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'location' => 'Assam', 'remarks_additional' => 'Petrol only', 'points' => 27],
            ['insurer' => 'Future', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'location' => 'Assam', 'remarks_additional' => 'Diesel Only', 'points' => 18],

            ['insurer' => 'Chola', 'insurer_remarks' => '1001- 1500 CC', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'All Fuel',  'location' => 'AS/ML/TR/AR/NL', 'remarks_additional' => 'Without CPA Less 1.5%', 'points' => 22],
            ['insurer' => 'Chola', 'insurer_remarks' => 'Above 1500 CC', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'All Fuel',  'location' => 'AS/ML/TR/AR/NL', 'remarks_additional' => 'Without CPA Less 1.5%', 'points' => 18],

            ['insurer' => 'Digit', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'North_East', 'remarks_additional' => 'Upto 1000 CC', 'points' => 24],
            ['insurer' => 'Digit', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'Assam_Good', 'remarks_additional' => 'Above 1001 CC', 'points' => 32],
            ['insurer' => 'Digit', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'North_East', 'remarks_additional' => 'Above 1001 CC', 'points' => 28],
            ['insurer' => 'Digit', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'NE_Ref', 'remarks_additional' => '1001 -1500 CC', 'points' => 24],
            ['insurer' => 'Digit', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'NE_Ref', 'remarks_additional' => 'Above 1501 CC', 'points' => 27],

            ['insurer' => 'Zuno', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'All Fuel', 'location' => 'As per system approved RTOs', 'remarks_additional' => '', 'points' => 21],

            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'Diesel', 'location' => 'NE 6', 'remarks_additional' => 'Upto 1000 CC', 'points' => 18],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'Diesel', 'location' => 'NE1,NE 3 ,NE 4,NE 5,NE 7', 'remarks_additional' => 'Upto 1000 CC', 'points' => 20],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'NE1 ,NE 4,NE 5', 'remarks_additional' => 'Upto 1000 CC', 'points' => 18],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'NE 3,NE 6', 'remarks_additional' => 'Upto 1000 CC', 'points' => 21],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'NE 7', 'remarks_additional' => 'Upto 1000 CC', 'points' => 22],

            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'Diesel', 'location' => 'ALL RTO\'s Except NE 2 ,NE 8', 'remarks_additional' => '1001 - 1500 CC', 'points' => 27],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'NE 8', 'remarks_additional' => '1001 - 1500 CC', 'points' => 24],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'NE 6', 'remarks_additional' => '1001 - 1500 CC', 'points' => 27],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'NE 7', 'remarks_additional' => '1001 - 1500 CC', 'points' => 28],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'NE 3 ,NE 5', 'remarks_additional' => '1001 - 1500 CC', 'points' => 31],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'NE 4', 'remarks_additional' => '1001 - 1500 CC', 'points' => 34],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'NE 1', 'remarks_additional' => '1001 - 1500 CC', 'points' => 36],

            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'Diesel', 'location' => 'NE 6', 'remarks_additional' => 'Above 1500 CC', 'points' => 27],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'Diesel', 'location' => 'NE1, NE3, NE4, NE5, NE7', 'remarks_additional' => 'Above 1500 CC', 'points' => 31],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'Diesel', 'location' => 'NE 8', 'remarks_additional' => 'Above 1500 CC', 'points' => 32],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'NE1, NE3, NE4, NE5, NE6, NE7', 'remarks_additional' => 'Above 1500 CC', 'points' => 27],
            ['insurer' => 'MAGMA', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'PETROL', 'location' => 'NE 8', 'remarks_additional' => 'Above 1500 CC', 'points' => 28],

            ['insurer' => 'Tata', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'Petrol', 'location' => 'ROE', 'remarks_additional' => '', 'points' => 31],
            ['insurer' => 'Tata', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'Diesel Only', 'location' => 'SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08,SK-05', 'remarks_additional' => '', 'points' => 46],
            ['insurer' => 'Tata', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'Non - Diesel', 'location' => 'SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08,SK-05', 'remarks_additional' => '', 'points' => 50],

            ['insurer' => 'Liberty', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'CNG', 'location' => 'AR', 'remarks_additional' => 'Upto 1000 CC', 'points' => 19],
            ['insurer' => 'Liberty', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'CNG', 'location' => 'AR', 'remarks_additional' => '1001 -1500 CC', 'points' => 32],
            ['insurer' => 'Liberty', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'CNG', 'location' => 'AR', 'remarks_additional' => 'Above 1501 CC', 'points' => 48],
            ['insurer' => 'Liberty', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'CNG', 'location' => 'ML', 'remarks_additional' => 'Upto 1000 CC', 'points' => 37],
            ['insurer' => 'Liberty', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'CNG', 'location' => 'ML', 'remarks_additional' => '1001 -1500 CC', 'points' => 46],
            ['insurer' => 'Liberty', 'segment' => 'PRIVATE CAR', 'policy_type' => 'Third party', 'policy_type_remarks' => 'CNG', 'location' => 'ML', 'remarks_additional' => 'Above 1501 CC', 'points' => 50],


            // ========================================
            // TWO WHEELER COMPREHENSIVE & SAOD
            // ========================================

            ['insurer' => 'Bajaj - Scooter - Old', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => '5% Less for Bajaj, vespa & Royal Enfield', 'location' => 'North East', 'remarks_additional' => 'Allowed RTOs : AS 04,05,06,07,09,16,18,21,23,27 @ ML 05 @ MZ 01 @ SK 01 @ TR 03,04', 'points' => 34],

            ['insurer' => 'TATA Bike', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'RONE 1 & RONE 2', 'remarks_additional' => 'ROE 1 & ROE 2 & ROE 3 DECLINED', 'points' => 22],
            ['insurer' => 'TATA Bike', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'ROE 1 & ROE 2 & ROE 3 DECLINED', 'points' => 31],
            ['insurer' => 'TATA Bike', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'RONE 1, RONE 2, ROE 1, ROE 2, ROE 3', 'remarks_additional' => '', 'points' => 27],
            ['insurer' => 'TATA Bike', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => '', 'points' => 18],

            ['insurer' => 'Tata', 'insurer_remarks' => 'Scooter- 1+1', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'RONE 1 & RONE 2', 'remarks_additional' => '', 'points' => 28],
            ['insurer' => 'Tata', 'insurer_remarks' => 'Scooter- 1+1', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => '', 'points' => 39],
            ['insurer' => 'Tata', 'insurer_remarks' => 'Scooter- 1+1', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'ROE 1, ROE 2, ROE 3', 'remarks_additional' => '', 'points' => 21],
            ['insurer' => 'Tata', 'insurer_remarks' => 'Scooter- 1+1', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'RONE 1, RONE 2, ROE 1, ROE 2, ROE 3', 'remarks_additional' => '', 'points' => 26],
            ['insurer' => 'Tata', 'insurer_remarks' => 'Scooter- 1+1', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => '', 'points' => 17],

            ['insurer' => 'Reliance', 'insurer_remarks' => 'Bike', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'All RTO\'s', 'remarks_additional' => 'ALL CC', 'points' => 33],
            ['insurer' => 'Reliance', 'insurer_remarks' => 'Scooter', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'All RTO\'s', 'remarks_additional' => 'Yamaha & EV: Grid -5%', 'points' => 37],

            ['insurer' => 'Magma', 'insurer_remarks' => 'Scooter - 1+1', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'NE8', 'remarks_additional' => '', 'points' => 26],
            ['insurer' => 'Magma', 'insurer_remarks' => 'Scooter - 1+1', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'NE2', 'remarks_additional' => '', 'points' => 27],
            ['insurer' => 'Magma', 'insurer_remarks' => 'Scooter - 1+1', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'NE6', 'remarks_additional' => '', 'points' => 29],

            ['insurer' => 'DIGIT', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'UPTO 150 CC', 'location' => 'NE_OR_Good', 'remarks_additional' => 'UPTO 150 CC ( HERO & HONDA)', 'points' => 36],
            ['insurer' => 'DIGIT', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'UPTO 150 CC', 'location' => 'NE_OR_Good', 'remarks_additional' => 'UPTO 150 CC ( OTHER THAN HERO & HONDA)', 'points' => 33],
            ['insurer' => 'DIGIT', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => '180-350 CC', 'location' => 'NE_Bad', 'remarks_additional' => '180-350_HONDA/JAWA/Avenger', 'points' => 31],
            ['insurer' => 'DIGIT', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => '180-350 CC', 'location' => 'NE_OR_Good', 'remarks_additional' => '180-350_HONDA/JAWA/Avenger', 'points' => 30],
            ['insurer' => 'DIGIT', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => '180-350 CC', 'location' => 'NE_Bad', 'remarks_additional' => '180-350_OTHER THAN HONDA/JAWA/Avenger', 'points' => 18],
            ['insurer' => 'DIGIT', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => '180-350 CC', 'location' => 'NE_OR_Good', 'remarks_additional' => '180-350_OTHER THAN HONDA/JAWA/Avenger', 'points' => 27],
            ['insurer' => 'DIGIT', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => '180-350 CC', 'location' => 'NE_Bad', 'remarks_additional' => '180-350_ROYAL ENFIELD', 'points' => 33],
            ['insurer' => 'DIGIT', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => '180-350 CC', 'location' => 'NE_OR_Good', 'remarks_additional' => '180-350_ROYAL ENFIELD', 'points' => 36],
            ['insurer' => 'DIGIT', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'NE_Bad', 'remarks_additional' => 'SCOOTER & ELECTRIC', 'points' => 40],
            ['insurer' => 'DIGIT', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'NE_OR_Good', 'remarks_additional' => 'SCOOTER & ELECTRIC', 'points' => 41],
            ['insurer' => 'DIGIT', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'NE_Ref', 'remarks_additional' => 'SCOOTER & ELECTRIC', 'points' => 28],

            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter- TW - Electric- 1+1', 'segment' => '2W', 'policy_type' => 'Comp', 'segment_remarks' => 'All CC', 'location' => 'MZ', 'remarks_additional' => '-', 'points' => 24],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter- TW - Electric- 1+1', 'segment' => '2W', 'policy_type' => 'Comp', 'segment_remarks' => 'All CC', 'location' => 'ML', 'remarks_additional' => '', 'points' => 25],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter- TW - Electric- 1+1', 'segment' => '2W', 'policy_type' => 'Comp', 'segment_remarks' => 'All CC', 'location' => 'SK', 'remarks_additional' => '-', 'points' => 26],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter- TW - Electric- 1+1', 'segment' => '2W', 'policy_type' => 'Comp', 'segment_remarks' => 'All CC', 'location' => 'NL', 'remarks_additional' => '', 'points' => 29],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter- TW - Electric- 1+1', 'segment' => '2W', 'policy_type' => 'Comp', 'segment_remarks' => 'All CC', 'location' => 'AR', 'remarks_additional' => '', 'points' => 36],

            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter - Old', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'MN', 'remarks_additional' => '', 'points' => 36],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter - Old', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'SK,NL', 'remarks_additional' => '', 'points' => 49],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter - Old', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'TR,ML,AR,MZ', 'remarks_additional' => '', 'points' => 54],

            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter - Old', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'Guwahati', 'remarks_additional' => '', 'points' => 31],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter - Old', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'AR', 'remarks_additional' => '', 'points' => 22],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter - Old', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'AS', 'remarks_additional' => '', 'points' => 36],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter - Old', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'MZ', 'remarks_additional' => '', 'points' => 37],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter - Old', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'ML', 'remarks_additional' => '', 'points' => 40],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter - Old', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'TR', 'remarks_additional' => '', 'points' => 49],

            ['insurer' => 'ICICI', 'insurer_remarks' => 'Bike - 1+1', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'TR,NL,MN', 'remarks_additional' => '', 'points' => 13],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Bike - 1+1', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'ML,SK', 'remarks_additional' => '', 'points' => 40],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Bike - 1+1', 'segment' => '2W', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'All CC', 'location' => 'AR,MZ', 'remarks_additional' => '', 'points' => 45],

            ['insurer' => 'ICICI', 'insurer_remarks' => 'Bike - Old', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'AS,ML', 'remarks_additional' => '', 'points' => 36],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Bike - Old', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'Guwahati', 'remarks_additional' => '-', 'points' => 40],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Bike - Old', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'TR,SK,MZ', 'remarks_additional' => '', 'points' => 45],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Bike - Old', 'segment' => '2W', 'policy_type' => 'SAOD', 'segment_remarks' => 'All CC', 'location' => 'AR', 'remarks_additional' => '', 'points' => 49],


            // ========================================
            // TWO WHEELER THIRD PARTY
            // ========================================
            ['insurer' => 'DIGIT', 'insurer_remarks' => 'BIKE', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 180 CC', 'location' => 'NE_OR_Good', 'remarks_additional' => 'Hero & Honda', 'points' => 32],
            ['insurer' => 'DIGIT', 'insurer_remarks' => 'BIKE', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 180 CC', 'location' => 'NE_OR_Good', 'remarks_additional' => 'Other Than Hero & Honda', 'points' => 24],
            ['insurer' => 'DIGIT', 'insurer_remarks' => 'BIKE', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => '180 -350 CC', 'location' => 'NE_OR_Good', 'remarks_additional' => 'ROYAL ENFIELD', 'points' => 36],  

            ['insurer' => 'DIGIT', 'insurer_remarks' => 'Scooter & EV', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'ALL CC', 'location' => 'NE_Bad', 'remarks_additional' => '', 'points' => 31],  
            ['insurer' => 'DIGIT', 'insurer_remarks' => 'Scooter & EV', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'ALL CC', 'location' => 'NE_OR_Good', 'remarks_additional' => '', 'points' => 46],  

            ['insurer' => 'ICICI', 'insurer_remarks' => 'Bike', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'ALL CC', 'location' => 'MZ,ML,SK,AR,NL,MN', 'remarks_additional' => '', 'points' => 41],

            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter - Old', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'ALL CC', 'location' => 'MZ,ML,SK,AR,NL,MN', 'remarks_additional' => '', 'points' => 55],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Scooter - Old', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'ALL CC', 'location' => 'TR', 'remarks_additional' => '', 'points' => 60],

            ['insurer' => 'TATA', 'insurer_remarks' => 'Scooter', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'ALL CC', 'location' => 'RONE 1, RONE 2, ROE 1, ROE 2, ROE 3', 'remarks_additional' => 'ALL FUEL', 'points' => 28],
            ['insurer' => 'TATA', 'insurer_remarks' => 'Scooter', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'ALL CC', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'ALL FUEL', 'points' => 60],
            ['insurer' => 'TATA', 'insurer_remarks' => 'BIKE', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'ALL CC', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'ALL FUEL', 'points' => 18],

            ['insurer' => 'Liberty', 'insurer_remarks' => 'Bike', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'ALL CC', 'location' => 'MN,MZ,SK', 'remarks_additional' => '', 'points' => 41],
            ['insurer' => 'Liberty', 'insurer_remarks' => 'Bike', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'UPTO 75 CC', 'location' => 'ML', 'remarks_additional' => '', 'points' => 41],
            ['insurer' => 'Liberty', 'insurer_remarks' => 'Bike', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => '75 CC - 150 CC', 'location' => 'ML', 'remarks_additional' => '', 'points' => 28],
            ['insurer' => 'Liberty', 'insurer_remarks' => 'Bike', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => '150 CC - 350 CC', 'location' => 'ML', 'remarks_additional' => '', 'points' => 34],
            ['insurer' => 'Liberty', 'insurer_remarks' => 'Bike', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'Above 350 CC', 'location' => 'ML', 'remarks_additional' => '', 'points' => 41],
            ['insurer' => 'Liberty', 'insurer_remarks' => 'Scooter', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'UPTO 150 CC', 'location' => 'TR', 'remarks_additional' => '', 'points' => 44],
            ['insurer' => 'Liberty', 'insurer_remarks' => 'Scooter', 'segment' => '2W', 'policy_type' => 'Third party', 'segment_remarks' => 'UPTO 150 CC', 'location' => 'MN,MZ,SK,ML', 'remarks_additional' => '', 'points' => 46],


            // ========================================
            // GOOD COMMERCIAL VEHICLE
            // ========================================
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 3500 GVW ELECTRIC ONLY', 'location' => 'AS', 'remarks_additional' => '-', 'points' => 28],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 3500 GVW ELECTRIC ONLY', 'location' => 'AR', 'remarks_additional' => '-', 'points' => 32],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 3500 GVW ELECTRIC ONLY', 'location' => 'NL', 'remarks_additional' => '-', 'points' => 34],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 3500 GVW ELECTRIC ONLY', 'location' => 'MN,TR', 'remarks_additional' => '-', 'points' => 35],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 3500 GVW ELECTRIC ONLY', 'location' => 'SK', 'remarks_additional' => '-', 'points' => 41],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 3500 GVW ELECTRIC ONLY', 'location' => 'MZ', 'remarks_additional' => '-', 'points' => 42],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 3500 GVW ELECTRIC ONLY', 'location' => 'ML', 'remarks_additional' => '-', 'points' => 46],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => ' Upto 3500 GVW ELECTRIC ONLY', 'location' => 'AS', 'remarks_additional' => '-', 'points' => 39],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => ' Upto 3500 GVW ELECTRIC ONLY', 'location' => 'MN', 'remarks_additional' => '-', 'points' => 41],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => ' Upto 3500 GVW ELECTRIC ONLY', 'location' => 'AR', 'remarks_additional' => '-', 'points' => 44],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => ' Upto 3500 GVW ELECTRIC ONLY', 'location' => 'ML,MZ,NL,SK,TR', 'remarks_additional' => '-', 'points' => 46],

            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'TR', 'remarks_additional' => '-', 'points' => 26],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'AS', 'remarks_additional' => '-', 'points' => 28],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'MN', 'remarks_additional' => '-', 'points' => 34],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'AR', 'remarks_additional' => '-', 'points' => 36],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'NL', 'remarks_additional' => '-', 'points' => 39],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'SK', 'remarks_additional' => '-', 'points' => 42],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'MZ', 'remarks_additional' => '-', 'points' => 43],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'ML', 'remarks_additional' => '-', 'points' => 45],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2301 - 3500 GVW', 'location' => 'SK', 'remarks_additional' => '-', 'points' => 12],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2301 - 3500 GVW', 'location' => 'MZ', 'remarks_additional' => '-', 'points' => 14],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2301 - 3500 GVW', 'location' => 'ML', 'remarks_additional' => '-', 'points' => 16],

            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'AS', 'remarks_additional' => '-', 'points' => 36],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'MN', 'remarks_additional' => '-', 'points' => 37],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'AR', 'remarks_additional' => '-', 'points' => 39],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'TR', 'remarks_additional' => '-', 'points' => 42],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'NL', 'remarks_additional' => '-', 'points' => 43],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'SK', 'remarks_additional' => '-', 'points' => 45],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'MZ', 'remarks_additional' => '-', 'points' => 46],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2300 GVW', 'location' => 'ML', 'remarks_additional' => '-', 'points' => 47],

            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2301 - 3500 GVW', 'location' => 'AS', 'remarks_additional' => '-', 'points' => 17],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2301 - 3500 GVW', 'location' => 'MN', 'remarks_additional' => '-', 'points' => 18],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2301 - 3500 GVW', 'location' => 'AR', 'remarks_additional' => '-', 'points' => 21],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2301 - 3500 GVW', 'location' => 'NL,TR', 'remarks_additional' => '-', 'points' => 25],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2301 - 3500 GVW', 'location' => 'SK', 'remarks_additional' => '-', 'points' => 27],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2301 - 3500 GVW', 'location' => 'MZ', 'remarks_additional' => '-', 'points' => 29],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2301 - 3500 GVW', 'location' => 'ML', 'remarks_additional' => '-', 'points' => 31],

            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '3501 - 7501 GVW', 'location' => 'SK', 'remarks_additional' => '-', 'points' => 17],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '3501 - 7501 GVW', 'location' => 'MZ', 'remarks_additional' => '-', 'points' => 18],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '3501 - 7501 GVW', 'location' => 'ML', 'remarks_additional' => '-', 'points' => 21],

            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '7501 -12000 GVW', 'location' => 'SK', 'remarks_additional' => '-', 'points' => 18],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '7501 -12000 GVW', 'location' => 'MZ', 'remarks_additional' => '-', 'points' => 20],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '7501 -12000 GVW', 'location' => 'ML', 'remarks_additional' => '-', 'points' => 23],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'AS', 'remarks_additional' => '-', 'points' => 17],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'MN', 'remarks_additional' => '-', 'points' => 18],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'AR', 'remarks_additional' => '-', 'points' => 21],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'NL', 'remarks_additional' => '-', 'points' => 28],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'TR', 'remarks_additional' => '-', 'points' => 26],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'SK', 'remarks_additional' => '-', 'points' => 28],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'MZ', 'remarks_additional' => '-', 'points' => 29],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'ML', 'remarks_additional' => '-', 'points' => 32],

            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'AS', 'remarks_additional' => '-', 'points' => 18],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'MN', 'remarks_additional' => '-', 'points' => 19],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'AR', 'remarks_additional' => '-', 'points' => 22],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NL', 'remarks_additional' => '-', 'points' => 27],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'TR', 'remarks_additional' => '-', 'points' => 16],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'SK', 'remarks_additional' => '-', 'points' => 28],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'MZ', 'remarks_additional' => '-', 'points' => 30],
            ['insurer' => 'Royal', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'ML', 'remarks_additional' => '-', 'points' => 31],

            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'ALL RTOS', 'remarks_additional' => '', 'points' => 26],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '7501-12000 GVW', 'location' => 'NE8', 'remarks_additional' => '', 'points' => 23],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'NE8', 'remarks_additional' => 'Above 5 Years', 'points' => 25],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE8', 'remarks_additional' => 'Upto 5 Years', 'points' => 22],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE8', 'remarks_additional' => 'Above 5 Years', 'points' => 27],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE 3', 'remarks_additional' => 'Above 5 Years', 'points' => 22],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE 4 & NE8', 'remarks_additional' => 'Above 5 Years', 'points' => 27],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE 2 & NE 6', 'remarks_additional' => 'Above 5 Years', 'points' => 25],
            
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'NE 2', 'remarks_additional' => '-', 'points' => 25],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'NE1, NE3, NE4, NE5, NE6, NE7, NE8', 'remarks_additional' => '-', 'points' => 26],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '7501 - 12000 GVW', 'location' => 'NE 1,NE 5,NE 7', 'remarks_additional' => '', 'points' => 18],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '7501 - 12000 GVW', 'location' => 'NE 3', 'remarks_additional' => '', 'points' => 19],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '7501 - 12000 GVW', 'location' => 'NE 4,NE 8', 'remarks_additional' => '', 'points' => 21],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'NE 2', 'remarks_additional' => 'ABOVE 5 YEARS', 'points' => 17],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'NE 1,NE 3 ,NE 6', 'remarks_additional' => 'ABOVE 5 YEARS', 'points' => 23],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'NE 7', 'remarks_additional' => 'ABOVE 5 YEARS', 'points' => 24],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'NE 4,NE 8', 'remarks_additional' => 'ABOVE 5 YEARS', 'points' => 25],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'NE 5', 'remarks_additional' => 'ABOVE 5 YEARS', 'points' => 27],

            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE 2', 'remarks_additional' => 'UPTO 5 YEARS', 'points' => 18],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE 1,NE 3 ,NE 4 ,NE 6,NE 8', 'remarks_additional' => 'UPTO 5 YEARS', 'points' => 24],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE 5,NE 7', 'remarks_additional' => 'UPTO 5 YEARS', 'points' => 26],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE 1,NE 3', 'remarks_additional' => 'ABOVE 5 YEARS', 'points' => 24],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE 5,NE 7', 'remarks_additional' => 'ABOVE 5 YEARS', 'points' => 26],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE 4', 'remarks_additional' => 'ABOVE 5 YEARS', 'points' => 29],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE 2', 'remarks_additional' => 'ABOVE 5 YEARS', 'points' => 31],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE6', 'remarks_additional' => 'ABOVE 5 YEARS', 'points' => 37],
            ['insurer' => 'Magma', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 40000 GVW', 'location' => 'NE 8', 'remarks_additional' => 'ABOVE 5 YEARS', 'points' => 41],

            ['insurer' => 'Chola', 'insurer_remarks'  => 'Without CPA Less 1.5%', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 3500 GVW', 'location' => 'AS/ML/TR/ AR/NL', 'remarks_additional' => 'Ace, Super Ace, Yodha, Xenon, Magic, Intra, Super Carry, Mahindra Jeeto,Tractor ,Supro Models Only', 'points' => 41],
            ['insurer' => 'Chola', 'insurer_remarks'  => 'Without CPA Less 1.5%', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 3500 GVW', 'location' => 'AS/ML/TR/ AR/NL', 'remarks_additional' => 'Ace, Super Ace, Yodha, Xenon, Magic, Intra, Super Carry, Mahindra Jeeto,Tractor ,Supro Models Only', 'points' => 33],
            ['insurer' => 'Chola', 'insurer_remarks'  => 'Without CPA Less 1.5%', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '7501-20000 GVW', 'location' => 'AS/ML/TR/ AR/NL', 'remarks_additional' => '', 'points' => 18],
            ['insurer' => 'Chola', 'insurer_remarks'  => 'Without CPA Less 1.5%', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'AS/ML/TR/ AR/NL', 'remarks_additional' => '', 'points' => 27],
            ['insurer' => 'Chola', 'insurer_remarks'  => 'Without CPA Less 1.5%', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '40001 - 43000 GVW', 'location' => 'AS/ML/TR/ AR/NL', 'remarks_additional' => '', 'points' => 22],
            ['insurer' => 'Chola', 'insurer_remarks'  => 'Without CPA Less 1.5%', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '43001 - 47500 GVW', 'location' => 'AS/ML/TR/ AR/NL', 'remarks_additional' => '', 'points' => 19],
            ['insurer' => 'Chola', 'insurer_remarks'  => 'Without CPA Less 1.5%', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001 - 43000 GVW', 'location' => 'AS/ML/TR/ AR/NL', 'remarks_additional' => '', 'points' => 13],

            ['insurer' => 'HDFC', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'AS', 'remarks_additional' => 'All excluding declined RTOs', 'points' => 46],
            ['insurer' => 'HDFC', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2501 - 3500 GVW', 'location' => 'AS', 'remarks_additional' => 'All excluding declined RTOs', 'points' => 41],
            ['insurer' => 'HDFC', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'AS', 'remarks_additional' => 'All excluding declined RTOs', 'points' => 46],
            ['insurer' => 'HDFC', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2501 - 3500 GVW', 'location' => 'AS', 'remarks_additional' => 'All excluding declined RTOs', 'points' => 27],

            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'All RTOs', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 67],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'All RTOs', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 50],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2501- 3500 GVW', 'location' => 'Assam', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 64],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2501- 3500 GVW', 'location' => 'Rest of NE', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 67],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2501- 3500 GVW', 'location' => 'Assam', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 47],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2501- 3500 GVW', 'location' => 'Rest of NE', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 50],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '3501 -7500 GVW', 'location' => 'Assam', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 35],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '3501 -7500 GVW', 'location' => 'Rest of NE', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 44],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '3501 -7500 GVW', 'location' => 'Assam', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 18],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '3501 -7500 GVW', 'location' => 'Rest of NE', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 27],

            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '7501 -12000 GVW', 'location' => 'AR', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 32],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '7501 -12000 GVW', 'location' => 'AS', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 36],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '7501 -12000 GVW', 'location' => 'TR,SK,MZ,MN,ML', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 44],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '7501 -12000 GVW', 'location' => 'AR', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => '15.5'],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '7501 -12000 GVW', 'location' => 'AS', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => '19.5'],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '7501 -12000 GVW', 'location' => 'TR,SK,MZ,MN,ML', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 27],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001 -20000 GVW', 'location' => 'AR', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 32],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001 -20000 GVW', 'location' => 'TR,SK,MZ,MN,ML', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 48],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 -20000 GVW', 'location' => 'AR', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => '15.5'],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 -20000 GVW', 'location' => 'TR,SK,MZ,MN,ML', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 31],

            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001-40000 GVW', 'location' => 'NL', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 32],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001-40000 GVW', 'location' => 'AS', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 39],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001-40000 GVW', 'location' => 'TR,MZ,MN,ML,AR', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 44],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001-40000 GVW', 'location' => 'SK', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 45],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001-40000 GVW', 'location' => 'NL', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => '15.5'],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001-40000 GVW', 'location' => 'AS', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 22],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001-40000 GVW', 'location' => 'TR,MZ,MN,ML,AR', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 27],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001-40000 GVW', 'location' => 'SK', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 28],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Above 40000 GVW', 'location' => 'AS,TR,MN,ML,MZ,SK', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 44],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Above 40000 GVW', 'location' => 'AS,TR,MN,ML,MZ,SK', 'remarks_additional' => 'Excluding Mahindra Bolero', 'points' => 27],
            ['insurer' => 'Future', 'segment' => 'GCW', 'policy_type' => 'Comp/TP', 'segment_remarks' => 'Only Mahindra Bolero', 'location' => 'All RTO\'s ', 'remarks_additional' => 'Only Mahindra Bolero', 'points' => 50],

            ['insurer' => 'Reliance', 'insurer_remarks' => 'All Makes', 'segment' => 'GCW', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'NE', 'remarks_additional' => 'TATA / Maruti', 'points' => 22],
            ['insurer' => 'Reliance', 'insurer_remarks' => 'All Makes', 'segment' => 'GCW', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'NE', 'remarks_additional' => '& Mahindra - Jeeto, Supro & Maxximo', 'points' => 18],
            ['insurer' => 'Reliance', 'insurer_remarks' => 'All Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'NE', 'remarks_additional' => '', 'points' => 38],

            ['insurer' => 'SOMPO', 'segment' => 'GCW', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'Upto 3500 GVW', 'location' => 'Assam', 'remarks_additional' => '-', 'points' => 30],
            ['insurer' => 'SOMPO', 'segment' => 'GCW', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'Above 3501 GVW', 'location' => 'Assam', 'remarks_additional' => '-', 'points' => 20],
            ['insurer' => 'SOMPO', 'segment' => 'GCW', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'ALL GVW', 'location' => 'NE', 'remarks_additional' => '(EXCEPT ASSAM)', 'points' => 20],

            ['insurer' => 'Bajaj', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'Assam', 'remarks_additional' => '-', 'points' => 31],
            ['insurer' => 'Bajaj', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'Assam', 'remarks_additional' => '-', 'points' => 35],

            ['insurer' => 'SHRIRAM', 'segment' => 'GCW', 'notice' => 'DECLINED RTO\'s ABOVE 2501 GVW - AS 02, AS 03, AS 05, AS 07', 'policy_type' => 'Comp/TP', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'ASSAM/TRIPURA/ARUNACHAL/MEGHALAYA/ MIZORAM', 'remarks_additional' => 'UPTO 15 YEARS', 'points' => 36],
            ['insurer' => 'SHRIRAM', 'segment' => 'GCW', 'notice' => 'DECLINED RTO\'s ABOVE 2501 GVW - AS 02, AS 03, AS 05, AS 07', 'policy_type' => 'Comp/TP', 'segment_remarks' => '12001 - 20000 GVW', 'location' => 'ASSAM/TRIPURA/ARUNACHAL/MEGHALAYA/ MIZORAM', 'remarks_additional' => 'UPTO 15 YEARS', 'points' => 19],
            ['insurer' => 'SHRIRAM', 'segment' => 'GCW', 'notice' => 'DECLINED RTO\'s ABOVE 2501 GVW - AS 02, AS 03, AS 05, AS 07', 'policy_type' => 'Comp/TP', 'segment_remarks' => '20001-42500 GVW', 'location' => 'ASSAM/TRIPURA/ARUNACHAL/MEGHALAYA/ MIZORAM', 'remarks_additional' => 'UPTO 3 YEARS', 'points' => 19],
            ['insurer' => 'SHRIRAM', 'segment' => 'GCW', 'notice' => 'DECLINED RTO\'s ABOVE 2501 GVW - AS 02, AS 03, AS 05, AS 07', 'policy_type' => 'Comp/TP', 'segment_remarks' => '20001-42500 GVW', 'location' => 'ASSAM/TRIPURA/ARUNACHAL/MEGHALAYA/ MIZORAM', 'remarks_additional' => '4 to 15 YEARS', 'points' => 22],

            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (ALL MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2000 GVW', 'location' => 'SK', 'remarks_additional' => 'NEW ONLY', 'points' => 32],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (ALL MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2000 GVW', 'location' => 'AR,MN,ML,MZ,NL', 'remarks_additional' => 'NEW ONLY', 'points' => 37],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (ALL MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2000 GVW', 'location' => 'TR', 'remarks_additional' => 'NEW ONLY', 'points' => 45],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (ALL MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2000 GVW', 'location' => 'AS', 'remarks_additional' => 'NEW ONLY', 'points' => 54],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (ALL MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2000 GVW', 'location' => 'SK', 'remarks_additional' => 'OLD ONLY', 'points' => 34],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (ALL MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2000 GVW', 'location' => 'AR,MN,ML,MZ,NL', 'remarks_additional' => 'OLD ONLY', 'points' => 39],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (ALL MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2000 GVW', 'location' => 'TR', 'remarks_additional' => 'OLD ONLY', 'points' => 47],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (ALL MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2000 GVW', 'location' => 'AS', 'remarks_additional' => 'OLD ONLY', 'points' => 56],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (ALL MAKES)', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2000 GVW', 'location' => 'SK', 'remarks_additional' => '', 'points' => 37],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (ALL MAKES)', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2000 GVW', 'location' => 'AR,MN,ML,MZ,NL', 'remarks_additional' => '', 'points' => 40],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (ALL MAKES)', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2000 GVW', 'location' => 'TR', 'remarks_additional' => '', 'points' => 51],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (ALL MAKES)', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2000 GVW', 'location' => 'AS', 'remarks_additional' => '', 'points' => 56],

            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'SK', 'remarks_additional' => 'NEW ONLY', 'points' => 32],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'AR,MN,ML,MZ,NL', 'remarks_additional' => 'NEW ONLY', 'points' => 37],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'TR', 'remarks_additional' => 'NEW ONLY', 'points' => 45],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'AS', 'remarks_additional' => 'NEW ONLY', 'points' => 54],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'SK', 'remarks_additional' => 'OLD ONLY', 'points' => 34],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'AR,MN,ML,MZ,NL', 'remarks_additional' => 'OLD ONLY', 'points' => 39],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'TR', 'remarks_additional' => 'OLD ONLY', 'points' => 47],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'AS', 'remarks_additional' => 'OLD ONLY', 'points' => 56],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2001-2500 GVW', 'location' => 'SK', 'remarks_additional' => '', 'points' => 37],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2001-2500 GVW', 'location' => 'AR,MN,ML,MZ,NL', 'remarks_additional' => '', 'points' => 40],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2001-2500 GVW', 'location' => 'TR', 'remarks_additional' => '', 'points' => 51],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT EV (TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2001-2500 GVW', 'location' => 'AS', 'remarks_additional' => '', 'points' => 56],

            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT BOLERO & EV (Other Than TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'SK', 'remarks_additional' => 'NEW ONLY', 'points' => 27],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT BOLERO & EV (Other Than TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'AR,MN,ML,MZ,NL', 'remarks_additional' => 'NEW ONLY', 'points' => 34],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT BOLERO & EV (Other Than TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'TR', 'remarks_additional' => 'NEW ONLY', 'points' => 41],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT BOLERO & EV (Other Than TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'AS', 'remarks_additional' => 'NEW ONLY', 'points' => 43],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT BOLERO & EV (Other Than TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'SK', 'remarks_additional' => 'OLD ONLY', 'points' => 29],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT BOLERO & EV (Other Than TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'AR,MN,ML,MZ,NL', 'remarks_additional' => 'OLD ONLY', 'points' => 36],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT BOLERO & EV (Other Than TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'TR', 'remarks_additional' => 'OLD ONLY', 'points' => 43],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT BOLERO & EV (Other Than TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2001-2500 GVW', 'location' => 'AS', 'remarks_additional' => 'OLD ONLY', 'points' => 45],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT BOLERO & EV (Other Than TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2001-2500 GVW', 'location' => 'SK', 'remarks_additional' => '', 'points' => 32],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT BOLERO & EV (Other Than TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2001-2500 GVW', 'location' => 'AR,MN,ML,MZ,NL', 'remarks_additional' => '', 'points' => 37],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT BOLERO & EV (Other Than TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2001-2500 GVW', 'location' => 'TR', 'remarks_additional' => '', 'points' => 44],
            ['insurer' => 'SBI', 'insurer_remarks' => 'EXCEPT BOLERO & EV (Other Than TATA MAKES)', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2001-2500 GVW', 'location' => 'AS', 'remarks_additional' => '', 'points' => 46],

            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'MN,ML,TR', 'remarks_additional' => 'NEW', 'points' => 11],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'NL', 'remarks_additional' => 'NEW', 'points' => 12],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'AR,AS,MZ,SK', 'remarks_additional' => 'NEW', 'points' => 13],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'MN,ML,TR', 'remarks_additional' => 'Age 1-5 Years', 'points' => 13],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'NL', 'remarks_additional' => 'Age 1-5 Years', 'points' => 14],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'AR,AS,MZ,SK', 'remarks_additional' => 'Age 1-5 Years', 'points' => 15],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'MN,ML,TR', 'remarks_additional' => 'Age above 5 years', 'points' => 16],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'NL', 'remarks_additional' => 'Age above 5 years', 'points' => 17],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'AR,AS,MZ,SK', 'remarks_additional' => 'Age above 5 years', 'points' => 18],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'MN,ML,TR', 'remarks_additional' => 'Age 1-5 Years', 'points' => 15],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'NL', 'remarks_additional' => 'Age 1-5 Years', 'points' => 16],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'AR,AS,MZ,SK', 'remarks_additional' => 'Age 1-5 Years', 'points' => 17],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'MN,ML,TR', 'remarks_additional' => 'Age above 5 years', 'points' => 18],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'NL', 'remarks_additional' => 'Age above 5 years', 'points' => 18],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'AR,AS,MZ,SK', 'remarks_additional' => 'Age above 5 years', 'points' => 19],

            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'MN,ML,TR', 'remarks_additional' => 'NEW', 'points' => 14],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'MZ,AR', 'remarks_additional' => 'NEW', 'points' => 16],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'NL,SK', 'remarks_additional' => 'NEW', 'points' => 17],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'AS', 'remarks_additional' => 'NEW', 'points' => 18],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'MN,ML,TR', 'remarks_additional' => 'Age 1-5 Years', 'points' => 16],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'MZ,AR', 'remarks_additional' => 'Age 1-5 Years', 'points' => 18],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'NL,SK', 'remarks_additional' => 'Age 1-5 Years', 'points' => 18],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'AS', 'remarks_additional' => 'Age 1-5 Years', 'points' => 19],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'MN,ML,TR', 'remarks_additional' => 'Age above 5 years', 'points' => 19],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'MZ,AR', 'remarks_additional' => 'Age above 5 years', 'points' => 21],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'NL,SK', 'remarks_additional' => 'Age above 5 years', 'points' => 22],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'AS', 'remarks_additional' => 'Age above 5 years', 'points' => 23],

            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'MN,ML,TR', 'remarks_additional' => 'Age 1-5 Years', 'points' => 18],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'AR,MZ', 'remarks_additional' => 'Age 1-5 Years', 'points' => 19],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'NL,SK', 'remarks_additional' => 'Age 1-5 Years', 'points' => 20],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'AS', 'remarks_additional' => 'Age 1-5 Years', 'points' => 21],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'MN,ML,TR', 'remarks_additional' => 'Age above 5 years', 'points' => 20],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'AR,MZ', 'remarks_additional' => 'Age above 5 years', 'points' => 22],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'NL,SK', 'remarks_additional' => 'Age above 5 years', 'points' => 23],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001- 20000 GVW', 'location' => 'AS', 'remarks_additional' => 'Age above 5 years', 'points' => 24],

            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'AS', 'remarks_additional' => 'NEW', 'points' => 14],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'NL', 'remarks_additional' => 'NEW', 'points' => 14],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'AS', 'remarks_additional' => 'Age 1-5 Years', 'points' => 16],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'NL', 'remarks_additional' => 'Age 1-5 Years', 'points' => 16],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'AS', 'remarks_additional' => 'Age above 5 years', 'points' => 18],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'NL', 'remarks_additional' => 'Age above 5 years', 'points' => 18],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'AS', 'remarks_additional' => 'Age 1-5 Years', 'points' => 18],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'NL', 'remarks_additional' => 'Age 1-5 Years', 'points' => 17],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'AS', 'remarks_additional' => 'Age above 5 years', 'points' => 20],
            ['insurer' => 'SBI', 'insurer_remarks' => 'Other Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'NL', 'remarks_additional' => 'Age above 5 years', 'points' => 19],

            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'AS', 'remarks_additional' => 'NEW', 'points' => 13],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'NL', 'remarks_additional' => 'NEW', 'points' => 12],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'AS', 'remarks_additional' => 'Age 1-5 Years', 'points' => 15],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'NL', 'remarks_additional' => 'Age 1-5 Years', 'points' => 14],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'AS', 'remarks_additional' => 'Age above 5 years', 'points' => 24],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'NL', 'remarks_additional' => 'Age above 5 years', 'points' => 19],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'AS', 'remarks_additional' => 'Age 1-5 Years', 'points' => 17],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'NL', 'remarks_additional' => 'Age 1-5 Years', 'points' => 16],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'AS', 'remarks_additional' => 'Age above 5 years', 'points' => 25],
            ['insurer' => 'SBI', 'insurer_remarks' => 'TATA & AL Makes', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '20001- 40000 GVW', 'location' => 'NL', 'remarks_additional' => 'Age above 5 years', 'points' => 18],

            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Comprehensive + Third Party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'AS 1 , AS 2 , RONE', 'remarks_additional' => 'ALL AGES', 'points' => 43],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'Brand New', 'points' => 47],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'Above 1 Year', 'points' => 48],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'Above 1 Year', 'points' => 48],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2501 - 3500 GVW', 'location' => 'AS 1 , AS 2 , RONE', 'remarks_additional' => 'ALL AGES', 'points' => 13],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2501 - 3500 GVW', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'UPTO 6 YEARS', 'points' => 24],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '2501 - 3500 GVW', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'Above 6 YEARS', 'points' => 25],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2501 - 3500 GVW', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'Above 1 - 6 Year', 'points' => 24],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '2501 - 3500 GVW', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'Above 6 Year', 'points' => 25],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Comprehensive + Third Party', 'segment_remarks' => '3501 - 12000 GVW', 'location' => 'AS 1 , AS 2 , RONE', 'remarks_additional' => 'ALL AGES', 'points' => 17],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '3501 - 12000 GVW', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'ALL AGES', 'points' => 25],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '3501 - 12000 GVW', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'Above 1 Year', 'points' => 22],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001 - 45000 GVW', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'Brand New', 'points' => 13],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001 - 45000 GVW', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'Above 1 - 6 Year', 'points' => 19],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => '12001 - 45000 GVW', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'Above 6 Year', 'points' => 33],
            ['insurer' => 'TATA', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => '12001 - 45000 GVW', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'Above 1 Year', 'points' => 46],

            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'SK', 'remarks_additional' => 'NEW', 'points' => 18],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'ML', 'remarks_additional' => 'NEW', 'points' => 28],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'AS U', 'remarks_additional' => 'NEW', 'points' => 30],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'MZ', 'remarks_additional' => 'NEW', 'points' => 31],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'SK', 'remarks_additional' => '1 - 5 YEARS', 'points' => 18],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'ML', 'remarks_additional' => '1 - 5 YEARS', 'points' => 28],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'MZ', 'remarks_additional' => '1 - 5 YEARS', 'points' => 30],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'AS U', 'remarks_additional' => '1 - 5 YEARS', 'points' => 38],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'SK', 'remarks_additional' => 'Above 5 YEARS', 'points' => 30],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'ML', 'remarks_additional' => 'Above 5 YEARS', 'points' => 37],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'AS U,MZ', 'remarks_additional' => 'Above 5 YEARS', 'points' => 44],

            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'SK', 'remarks_additional' => '1 - 5 YEARS', 'points' => 18],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'MN', 'remarks_additional' => '1 - 5 YEARS', 'points' => 21],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'NL', 'remarks_additional' => '1 - 5 YEARS', 'points' => 18],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'ML', 'remarks_additional' => '1 - 5 YEARS', 'points' => 28],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'MZ', 'remarks_additional' => '1 - 5 YEARS', 'points' => 30],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'AS U', 'remarks_additional' => '1 - 5 YEARS', 'points' => 38],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'NL', 'remarks_additional' => 'Above 5 - 10 YEARS', 'points' => 25],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'SK', 'remarks_additional' => 'Above 5 - 10 YEARS', 'points' => 30],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'MN', 'remarks_additional' => 'Above 5 - 10 YEARS', 'points' => 33],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'ML', 'remarks_additional' => 'Above 5 - 10 YEARS', 'points' => 37],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'AS U ,MZ', 'remarks_additional' => 'Above 5 - 10 YEARS', 'points' => 44],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'NL', 'remarks_additional' => 'Above 10 YEARS', 'points' => 19],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'SK', 'remarks_additional' => 'Above 10 YEARS', 'points' => 30],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'MN', 'remarks_additional' => 'Above 10 YEARS', 'points' => 33],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'ML', 'remarks_additional' => 'Above 10 YEARS', 'points' => 37],
            ['insurer' => 'Liberty', 'segment' => 'GCW', 'policy_type' => 'Third party', 'segment_remarks' => 'Upto 2500 GVW', 'location' => 'AS U ,MZ', 'remarks_additional' => 'Above 10 YEARS', 'points' => 44],


            // ========================================
            // THREE WHEELER GCV (D-VAN)
            // ========================================
            ['insurer' => 'Bajaj', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN', 'location' => 'All RTOs', 'remarks_additional' => 'Only Electric', 'points' => 44],
            ['insurer' => 'Bajaj', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN', 'location' => 'All RTOs', 'remarks_additional' => 'Excluding Electric', 'points' => 53],

            ['insurer' => 'Tata', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN', 'location' => 'AS 1 , AS 2, RONE', 'remarks_additional' => 'ALL AGES', 'points' => 36],
            ['insurer' => 'Tata', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN', 'location' => 'AS 1 , AS 2, RONE', 'remarks_additional' => 'ALL AGES', 'points' => 43],
            ['insurer' => 'Tata', 'segment' => '3W GCV', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'D-VAN - ', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'ALL AGES', 'points' => 27],

            ['insurer' => 'SBI', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN', 'location' => 'SK', 'remarks_additional' => 'NEW', 'points' => 24],
            ['insurer' => 'SBI', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN', 'location' => 'AR,MN,ML,NL,MZ', 'remarks_additional' => 'NEW', 'points' => 30],
            ['insurer' => 'SBI', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN', 'location' => 'SK', 'remarks_additional' => '1- 15 YEARS', 'points' => 26],
            ['insurer' => 'SBI', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN', 'location' => 'AR,MN,ML,NL,MZ', 'remarks_additional' => '1- 15 YEARS', 'points' => 32],
            ['insurer' => 'SBI', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN', 'location' => 'SK', 'remarks_additional' => 'UPTO 25 YEARS', 'points' => 28],
            ['insurer' => 'SBI', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN', 'location' => 'AR,MN,ML,MZ,NL', 'remarks_additional' => 'UPTO 25 YEARS', 'points' => 33],

            ['insurer' => 'Shriram', 'insurer_remarks' => 'Electric', 'segment' => '3W GCV', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'D-VAN - Upto 15 Years', 'location' => 'ASSAM/TRIPURA/ARUNACHAL/MEGHALAYA/ MIZORAM', 'remarks_additional' => 'Upto 2000 Watt', 'points' => 44],
            ['insurer' => 'Shriram', 'insurer_remarks' => 'Electric', 'segment' => '3W GCV', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'D-VAN - Upto 15 Years', 'location' => 'ASSAM/TRIPURA/ARUNACHAL/MEGHALAYA/ MIZORAM', 'remarks_additional' => 'ABOVE 2000 Watt', 'points' => 19],

            ['insurer' => 'ICICI', 'insurer_remarks' => 'Petrol, CNG & Diesel', 'segment' => '3W GCV', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'D-VAN - NEW', 'location' => 'NL', 'remarks_additional' => 'Petrol ,CNG, Diesel', 'points' => 27],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Petrol, CNG & Diesel', 'segment' => '3W GCV', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'D-VAN - NEW', 'location' => 'AS,ML,GUWAHATI', 'remarks_additional' => 'Petrol ,CNG, Diesel', 'points' => 41],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Petrol, CNG & Diesel', 'segment' => '3W GCV', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'D-VAN - OLD', 'location' => 'AS,ML,NL,TR,GUWAHATI ', 'remarks_additional' => 'Petrol ,CNG, Diesel', 'points' => 46],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Petrol, CNG & Diesel', 'segment' => '3W GCV', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'D-VAN - OLD', 'location' => 'AR', 'remarks_additional' => 'Petrol ,CNG, Diesel', 'points' => 36],

            ['insurer' => 'ICICI', 'insurer_remarks' => 'Electric', 'segment' => '3W GCV', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'D-VAN', 'location' => 'TR', 'remarks_additional' => '', 'points' => 27],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Electric', 'segment' => '3W GCV', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'D-VAN', 'location' => 'GUWAHATI', 'remarks_additional' => 'NEW', 'points' => 22],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Electric', 'segment' => '3W GCV', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'D-VAN', 'location' => 'GUWAHATI', 'remarks_additional' => 'OLD', 'points' => 18],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Electric', 'segment' => '3W GCV', 'policy_type' => 'Comp / TP', 'segment_remarks' => 'D-VAN', 'location' => 'NL', 'remarks_additional' => '', 'points' => 18],

            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN - NEW', 'location' => 'AS U', 'remarks_additional' => '', 'points' => 30],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN - 1 - 5 YEARS', 'location' => 'ML', 'remarks_additional' => '', 'points' => 28],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN - 1 - 5 YEARS', 'location' => 'MZ', 'remarks_additional' => '', 'points' => 30],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN - 1 - 5 YEARS', 'location' => 'AS U', 'remarks_additional' => '', 'points' => 38],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN - Above 5 -10 YEARS', 'location' => 'ML', 'remarks_additional' => '', 'points' => 37],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN - Above 5 -10 YEARS', 'location' => 'MZ', 'remarks_additional' => '', 'points' => 38],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN - Above 5 -10 YEARS', 'location' => 'AS U', 'remarks_additional' => '', 'points' => 44],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN - Above 10 YEARS', 'location' => 'ML,MZ', 'remarks_additional' => '', 'points' => 34],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'segment_remarks' => 'D-VAN - Above 10 YEARS', 'location' => 'AS U', 'remarks_additional' => '', 'points' => 44],

            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN - 1 - 5 YEARS', 'location' => 'MN', 'remarks_additional' => 'UPTO 2500 GVW', 'points' => 21],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN - 1 - 5 YEARS', 'location' => 'ML', 'remarks_additional' => 'UPTO 2500 GVW', 'points' => 28],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN - 1 - 5 YEARS', 'location' => 'MZ', 'remarks_additional' => 'UPTO 2500 GVW', 'points' => 30],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN - 1 - 5 YEARS', 'location' => 'AS U', 'remarks_additional' => 'UPTO 2500 GVW', 'points' => 38],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN - Above 5 -10 YEARS', 'location' => 'SK', 'remarks_additional' => 'UPTO 2500 GVW', 'points' => 27],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN - Above 5 -10 YEARS', 'location' => 'MN', 'remarks_additional' => 'UPTO 2500 GVW', 'points' => 33],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN - Above 5 -10 YEARS', 'location' => 'ML', 'remarks_additional' => 'UPTO 2500 GVW', 'points' => 37],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN - Above 5 -10 YEARS', 'location' => 'MZ', 'remarks_additional' => 'UPTO 2500 GVW', 'points' => 38],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN - Above 5 -10 YEARS', 'location' => 'AS U', 'remarks_additional' => 'UPTO 2500 GVW', 'points' => 44],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN - Above 10 YEARS', 'location' => 'SK', 'remarks_additional' => 'UPTO 2500 GVW', 'points' => 27],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN - Above 10 YEARS', 'location' => 'MN', 'remarks_additional' => 'UPTO 2500 GVW', 'points' => 33],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN - Above 10 YEARS', 'location' => 'ML,MZ', 'remarks_additional' => 'UPTO 2500 GVW', 'points' => 34],
            ['insurer' => 'Liberty', 'segment' => '3W GCV', 'policy_type' => 'Third party', 'segment_remarks' => 'D-VAN - Above 10 YEARS', 'location' => 'AS U', 'remarks_additional' => 'UPTO 2500 GVW', 'points' => 44],


            // ========================================
            // THREE WHEELER PCV ( AUTO )
            // ========================================

            ['insurer' => 'Bajaj', 'insurer_remarks' => 'Petrol & CNG', 'segment' => '3W PCV', 'policy_type' => 'Comp', 'location' => 'All RTOs', 'remarks_additional' => '(Cachar & South Tripura districts Declined)', 'points' => 41],
            ['insurer' => 'Bajaj', 'insurer_remarks' => 'Petrol & CNG', 'segment' => '3W PCV', 'policy_type' => 'TP', 'location' => 'All RTOs', 'remarks_additional' => '(Cachar districts Declined)', 'points' => 39],
            ['insurer' => 'Bajaj', 'insurer_remarks' => '(Only Electric)', 'segment' => '3W PCV', 'policy_type' => 'TP', 'location' => 'All RTOs', 'remarks_additional' => '', 'points' => 53],

            ['insurer' => 'Tata', 'insurer_remarks' => '3+1', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'AS 1, AS 2, RONE', 'remarks_additional' => 'DIESEL & ELECTRIC', 'points' => 33],
            ['insurer' => 'Tata', 'insurer_remarks' => '3+1', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'AS 1, AS 2, RONE', 'remarks_additional' => 'Other Than DIESEL & CNG', 'points' => 28],
            ['insurer' => 'Tata', 'insurer_remarks' => '3+1', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'ELECTRIC', 'points' => 46],
            ['insurer' => 'Tata', 'insurer_remarks' => '3+1', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'Other Than Electric', 'points' => 44],

            ['insurer' => 'Shriram', 'insurer_remarks' => 'Petrol & CNG- 3+1. Upto 15 years', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'ASSAM/TRIPURA/ARUNACHAL/MEGHALAYA/ MIZORAM', 'remarks_additional' => 'Declined RTO\'s - AS 17, AS 21, AS 24 , AS 28', 'points' => 44],
            ['insurer' => 'Shriram', 'insurer_remarks' => ' Electric - 3+1. Upto 15 years', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'ASSAM/TRIPURA/ARUNACHAL/MEGHALAYA/ MIZORAM', 'remarks_additional' => 'Upto 2000 Watt', 'points' => 44],
            ['insurer' => 'Shriram', 'insurer_remarks' => ' Electric - 3+1. Upto 15 years', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'ASSAM/TRIPURA/ARUNACHAL/MEGHALAYA/ MIZORAM', 'remarks_additional' => 'Above 2000 Watt', 'points' => 40],

            ['insurer' => 'Future', 'segment' => '3W PCV', 'policy_type' => 'Comp', 'insurer_remarks' => '', 'location' => 'Assam', 'remarks_additional' => '', 'points' => 56],
            ['insurer' => 'Future', 'segment' => '3W PCV', 'policy_type' => 'Comp', 'insurer_remarks' => '', 'location' => 'Rest of all RTO\'s', 'remarks_additional' => '', 'points' => 63],
            ['insurer' => 'Future', 'segment' => '3W PCV', 'policy_type' => 'TP', 'insurer_remarks' => '', 'location' => 'Assam', 'remarks_additional' => '', 'points' => 39],
            ['insurer' => 'Future', 'segment' => '3W PCV', 'policy_type' => 'TP', 'insurer_remarks' => '', 'location' => 'Rest of all RTO\'s', 'remarks_additional' => '', 'points' => 46],

            ['insurer' => 'Royal', 'insurer_remarks' => 'Electric', 'segment' => '3W PCV', 'policy_type' => 'Comprehensive', 'location' => 'All RTO\'s', 'remarks_additional' => '', 'points' => 46],
            ['insurer' => 'Royal', 'insurer_remarks' => 'Electric', 'segment' => '3W PCV', 'policy_type' => 'Third party', 'location' => 'All RTO\'s', 'remarks_additional' => '', 'points' => 54],

            ['insurer' => 'ICICI', 'insurer_remarks' => ' Petrol & CNG- 3+1. New', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'AR', 'remarks_additional' => '', 'points' => 46],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Petrol & CNG- 3+1. OLD', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'NL', 'remarks_additional' => '', 'points' => 27],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Petrol & CNG- 3+1. OLD', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'AR,ML', 'remarks_additional' => '', 'points' => 29],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Petrol & CNG- 3+1. OLD', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'TR', 'remarks_additional' => '', 'points' => 31],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Petrol & CNG- 3+1. OLD', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'MN', 'remarks_additional' => '', 'points' => 31],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Petrol & CNG- 3+1. OLD', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'MZ', 'remarks_additional' => '', 'points' => 32],

            ['insurer' => 'ICICI', 'insurer_remarks' => 'Diesel- 3+1', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'ML', 'remarks_additional' => '', 'points' => 27],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Diesel- 3+1', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'TR', 'remarks_additional' => '', 'points' => 28],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Diesel- 3+1', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'MZ', 'remarks_additional' => '', 'points' => 29],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Diesel- 3+1', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'SK', 'remarks_additional' => '', 'points' => 32],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Diesel- 3+1', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'AR', 'remarks_additional' => '', 'points' => 31],

            ['insurer' => 'ICICI', 'insurer_remarks' => 'Electric', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'ML', 'remarks_additional' => '', 'points' => 36],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Electric', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'NL', 'remarks_additional' => '', 'points' => 31],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Electric', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'AR', 'remarks_additional' => '', 'points' => 50],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Electric', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'TR', 'remarks_additional' => '', 'points' => 53],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Electric', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'GUWAHATI', 'remarks_additional' => '', 'points' => 47],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Electric', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'AS', 'remarks_additional' => '(except Darrang, Hojai, Sonitpur, Nalbari, Cachar, Majuli)', 'points' => 44],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Electric', 'segment' => '3W PCV', 'policy_type' => 'Comp / TP', 'location' => 'MN,MZ,SK', 'remarks_additional' => '', 'points' => 46],

            ['insurer' => 'Liberty', 'segment' => '3W PCV', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'NEW', 'location' => 'ML', 'remarks_additional' => '', 'points' => 21],
            ['insurer' => 'Liberty', 'segment' => '3W PCV', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'NEW', 'location' => 'SK', 'remarks_additional' => '', 'points' => 42],
            ['insurer' => 'Liberty', 'segment' => '3W PCV', 'policy_type' => 'Comprehensive', 'insurer_remarks' => '1 -5 YEARS', 'location' => 'TR', 'remarks_additional' => '', 'points' => 15],
            ['insurer' => 'Liberty', 'segment' => '3W PCV', 'policy_type' => 'Comprehensive', 'insurer_remarks' => '1 -5 YEARS', 'location' => 'AR', 'remarks_additional' => '', 'points' => 23],
            ['insurer' => 'Liberty', 'segment' => '3W PCV', 'policy_type' => 'Comprehensive', 'insurer_remarks' => '1 -5 YEARS', 'location' => 'ML', 'remarks_additional' => '', 'points' => 41],
            ['insurer' => 'Liberty', 'segment' => '3W PCV', 'policy_type' => 'Comprehensive', 'insurer_remarks' => '1 -5 YEARS', 'location' => 'SK', 'remarks_additional' => '', 'points' => 46],
            ['insurer' => 'Liberty', 'segment' => '3W PCV', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'ABOVE 5 YEARS', 'location' => 'MZ', 'remarks_additional' => '', 'points' => 21],
            ['insurer' => 'Liberty', 'segment' => '3W PCV', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'ABOVE 5 YEARS', 'location' => 'TR', 'remarks_additional' => '', 'points' => 28],
            ['insurer' => 'Liberty', 'segment' => '3W PCV', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'ABOVE 5 YEARS', 'location' => 'MN', 'remarks_additional' => '', 'points' => 31],
            ['insurer' => 'Liberty', 'segment' => '3W PCV', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'ABOVE 5 YEARS', 'location' => 'AR', 'remarks_additional' => '', 'points' => 33],
            ['insurer' => 'Liberty', 'segment' => '3W PCV', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'ABOVE 5 YEARS', 'location' => 'ML', 'remarks_additional' => '', 'points' => 35],
            ['insurer' => 'Liberty', 'segment' => '3W PCV', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'ABOVE 5 YEARS', 'location' => 'SK', 'remarks_additional' => '', 'points' => 50],


            // ========================================
            // STAFF BUS
            // ========================================
            ['insurer' => 'Chola', 'segment' => 'School Bus', 'segment_remarks' => 'STAFF BUS', 'policy_type' => 'Comp / TP', 'location' => 'All RTOs', 'remarks_additional' => 'Without CPA Less 1.5% (Comp / TP)', 'points' => 36],

            ['insurer' => 'ICICI', 'segment' => 'School Bus', 'segment_remarks' => 'STAFF BUS', 'policy_type' => 'Comp / TP', 'location' => 'ML', 'remarks_additional' => 'Above 18 Seater (Comp / TP)', 'points' => 44],

            ['insurer' => 'Tata', 'segment' => 'School Bus', 'segment_remarks' => 'STAFF BUS', 'policy_type' => 'Comp / TP', 'location' => 'AS 1, AS 2, RONE', 'remarks_additional' => 'ALL FUEL (Upto 11 str)', 'points' => 26],
            ['insurer' => 'Tata', 'segment' => 'School Bus', 'segment_remarks' => 'STAFF BUS', 'policy_type' => 'Comp / TP', 'location' => 'AS 1, AS 2, RONE', 'remarks_additional' => 'ALL FUEL (Above 11 Str)', 'points' => 39],
            ['insurer' => 'Tata', 'segment' => 'School Bus', 'segment_remarks' => 'STAFF BUS', 'policy_type' => 'Comp / TP', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'ALL FUEL (Upto 11 str)', 'points' => 22],
            ['insurer' => 'Tata', 'segment' => 'School Bus', 'segment_remarks' => 'STAFF BUS', 'policy_type' => 'Comp / TP', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'ALL FUEL (Above 11 Str)', 'points' => 39],

            // ========================================
            // SCHOOL BUS
            // ========================================
            ['insurer' => 'Digit', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comp & TP', 'location' => 'All RTOs', 'remarks_additional' => 'In the name of School (Above 8 Seating Capacity)', 'points' => 73],
            ['insurer' => 'Digit', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comp & TP', 'location' => 'All RTOs', 'remarks_additional' => 'On Contract (Transporter) (Above 8 Seating Capacity)', 'points' => 60],
            ['insurer' => 'Digit', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comp & TP', 'location' => 'All RTOs', 'remarks_additional' => 'On Contract (Individual) (Above 8 Seating Capacity)', 'points' => 60],
            ['insurer' => 'Digit', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comp & TP', 'location' => 'All RTOs', 'remarks_additional' => '(Upto 7 Seater)', 'points' => 28],
            
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'MN', 'remarks_additional' => '(Upto 17 Seating capacity)', 'points' => 68],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'NL', 'remarks_additional' => '(Upto 17 Seating capacity)', 'points' => 69],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'TR', 'remarks_additional' => '(Upto 17 Seating capacity)', 'points' => 71],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'ML', 'remarks_additional' => '(Upto 17 Seating capacity)', 'points' => 72],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'AR', 'remarks_additional' => '(Upto 17 Seating capacity)', 'points' => 72],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'AS', 'remarks_additional' => '(Upto 17 Seating capacity)', 'points' => 73],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'GUWAHATI', 'remarks_additional' => '(Upto 17 Seating capacity)', 'points' => 73],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'SK', 'remarks_additional' => '(Upto 17 Seating capacity)', 'points' => 73],

            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'MANIPUR', 'remarks_additional' => '( 18 to 36 Seating capacity)', 'points' => 69],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'MIZORAM', 'remarks_additional' => '( 18 to 36 Seating capacity)', 'points' => 70],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'ARUNACHALPRADESH', 'remarks_additional' => '( 18 to 36 Seating capacity)', 'points' => 70],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'GUWAHATI', 'remarks_additional' => '( 18 to 36 Seating capacity)', 'points' => 71],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'NAGALAND', 'remarks_additional' => '( 18 to 36 Seating capacity)', 'points' => 71],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'ASSAM', 'remarks_additional' => '( 18 to 36 Seating capacity)', 'points' => 71],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'MEGHALAYA', 'remarks_additional' => '( 18 to 36 Seating capacity)', 'points' => 71],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'TRIPURA', 'remarks_additional' => '( 18 to 36 Seating capacity)', 'points' => 72],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'SIKKIM', 'remarks_additional' => '( 18 to 36 Seating capacity)', 'points' => 73],

            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'ARUNACHALPRADESH', 'remarks_additional' => '(ABOVE 36 Seating capacity)', 'points' => 73],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'ASSAM', 'remarks_additional' => '(ABOVE 36 Seating capacity)', 'points' => 73],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'GUWAHATI', 'remarks_additional' => '(ABOVE 36 Seating capacity)', 'points' => 73],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'MANIPUR', 'remarks_additional' => '(ABOVE 36 Seating capacity)', 'points' => 73],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'MEGHALAYA', 'remarks_additional' => '(ABOVE 36 Seating capacity)', 'points' => 73],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'NAGALAND', 'remarks_additional' => '(ABOVE 36 Seating capacity)', 'points' => 73],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'SIKKIM', 'remarks_additional' => '(ABOVE 36 Seating capacity)', 'points' => 73],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'TRIPURA', 'remarks_additional' => '(ABOVE 36 Seating capacity)', 'points' => 73],

            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Third Party', 'location' => 'AR,AS,GUWAHATI,MN', 'remarks_additional' => '(Upto 18 Seating capacity)', 'points' => 48],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '(ABOVE 18 to 36 Seating capacity)', 'points' => 48],
            ['insurer' => 'ICICI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'MZ,NL DECLINED (ABOVE 36 Seating capacity)', 'points' => 48],

            ['insurer' => 'SBI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => '(Above 18 Seater)', 'points' => 57],
            ['insurer' => 'SBI', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '(Above 18 Seater)', 'points' => 58],

            ['insurer' => 'Tata', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comp / TP', 'location' => 'AS 1, AS 2, RONE, SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'Excluding Electric (Upto 11 Str)', 'points' => 48],
            ['insurer' => 'Tata', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comp / TP', 'location' => 'AS 1, AS 2, RONE, SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'In Name Of School (Above 11 Str)', 'points' => 78],
            ['insurer' => 'Tata', 'segment' => 'SCHOOL BUS', 'policy_type' => 'Comp / TP', 'location' => 'AS 1, AS 2, RONE, SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => 'On Individual (Above 11 Str)', 'points' => 78],

            // ========================================
            // TAXI
            // ========================================
            ['insurer' => 'Reliance', 'insurer_remarks' => 'Upto 6 Str', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'NON - DIESEL (NI DEP)', 'points' => 19],
            ['insurer' => 'Reliance', 'insurer_remarks' => 'Upto 6 Str', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'NON - DIESEL (NON NI DEP)', 'points' => 40],
            ['insurer' => 'Reliance', 'insurer_remarks' => 'Upto 6 Str', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'NON DIESEL', 'points' => 38],

            ['insurer' => 'Reliance', 'insurer_remarks' => '7+1 ( Maruti, Toyota, Mahindra, Kia, MG ) all fuel type', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => '(NI DEP)', 'points' => 19],
            ['insurer' => 'Reliance', 'insurer_remarks' => '7+1 ( Maruti, Toyota, Mahindra, Kia, MG ) all fuel type', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => '(NON NI DEP)', 'points' => 33],
            ['insurer' => 'Reliance', 'insurer_remarks' => '7+1 ( Maruti, Toyota, Mahindra, Kia, MG ) all fuel type', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '-', 'points' => 33],

            ['insurer' => 'ICICI', 'insurer_remarks' => 'ELECTRIC', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'SK', 'remarks_additional' => '', 'points' => 27],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'ELECTRIC', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'location' => 'SK', 'remarks_additional' => '', 'points' => 46],

            ['insurer' => 'ICICI', 'insurer_remarks' => 'Upto 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'ML', 'remarks_additional' => '-', 'points' => 27],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Upto 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'TR', 'remarks_additional' => '-', 'points' => 41],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Upto 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'SK', 'remarks_additional' => '-', 'points' => 18],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Upto 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'NL', 'remarks_additional' => '-', 'points' => 22],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Upto 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'MZ', 'remarks_additional' => '-', 'points' => 36],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Upto 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'location' => 'ML,SK,Nl', 'remarks_additional' => '-', 'points' => 27],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Upto 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'location' => 'TR', 'remarks_additional' => '-', 'points' => 41],
            ['insurer' => 'ICICI', 'insurer_remarks' => 'Upto 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'location' => 'MZ', 'remarks_additional' => '-', 'points' => 50],

            ['insurer' => 'ICICI', 'insurer_remarks' => ' Above 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'ML', 'remarks_additional' => '', 'points' => 27],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Above 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'AR,Nl', 'remarks_additional' => '', 'points' => 18],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Above 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'MN,Guwahati', 'remarks_additional' => 'FOR GUWAHATI ABOVE 3 YEARS', 'points' => 22],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Above 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'MZ', 'remarks_additional' => '', 'points' => 36],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Above 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'location' => 'ML', 'remarks_additional' => '', 'points' => 27],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Above 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'location' => 'NL', 'remarks_additional' => '', 'points' => 31],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Above 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'location' => 'Guwahati', 'remarks_additional' => 'ABOVE 3 YEARS', 'points' => 27],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Above 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'location' => 'AR,MN', 'remarks_additional' => '', 'points' => 41],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Above 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'location' => 'TR', 'remarks_additional' => '', 'points' => 44],
            ['insurer' => 'ICICI', 'insurer_remarks' => ' Above 1000 CC', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'location' => 'MZ', 'remarks_additional' => '', 'points' => 50],

            ['insurer' => 'Royal', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'insurer_remarks' => '', 'location' => 'ALL RTOS', 'remarks_additional' => 'ELECTRIC ONLY', 'points' => 43],

            ['insurer' => 'SBI', 'segment' => 'Taxi', 'notice' => 'Non NCB grid is lesser by -3%. <br/> PCV TAXI declined Model-Ashok Leyland Stile,Bajaj Tempo Trax,Bajaj Tempo Limited . Tempo Traveller,Chevrolet Enjoy,Chevrolet Tavera,Datsun GO Plus,Force All Models, ICML Rhino Rx,Mahindra & Mahindra 540,Mahindra & Mahindra 555 DI,Mahindra & Mahindra Armada,Mahindra & Mahindra CDR,Mahindra & Mahindra CL 500,Mahindra & Mahindra Commander,Mahindra & Mahindra DP 550,Mahindra & Mahindra Festara,Mahindra & Mahindra Gio,Mahindra & Mahindra Jeep,Mahindra & Mahindra Marshal,Mahindra & Mahindra Maxx,Mahindra & Mahindra Maxximo,Mahindra & Mahindra Savari,Mahindra & Mahindra Supro,Mahindra & Mahindra Jeeto,Mahindra & Mahindra Voyager,Maruti Suzuki Eeco,Maruti Suzuki Omni,Maruti Suzuki Versa,Mercedes-Benz MB 100 D,Mercedes-Benz MB Class,Tata Motors 207,Tata Motors Ace,Tata Motors Magic,Tata Motors Venture,Tata Motors Winger,Tata Motors Sumo,Toyota Hiace Commuter,Toyota Qualis.', 'policy_type' => 'Comp', 'insurer_remarks' => 'OLD Only', 'location' => '(AR01/AR02/AS12/AS25/ASG4/AS01/AS01A/B,MN01/MN06/ML01/ML05/MZ01/NL01/TR01)', 'remarks_additional' => '( upto 6+1 Innova , Innova crysta, Hycross, Scorpio, Bolero) NIL DEP', 'points' => 21],
            ['insurer' => 'SBI', 'segment' => 'Taxi', 'notice' => 'Non NCB grid is lesser by -3%. <br/> PCV TAXI declined Model-Ashok Leyland Stile,Bajaj Tempo Trax,Bajaj Tempo Limited . Tempo Traveller,Chevrolet Enjoy,Chevrolet Tavera,Datsun GO Plus,Force All Models, ICML Rhino Rx,Mahindra & Mahindra 540,Mahindra & Mahindra 555 DI,Mahindra & Mahindra Armada,Mahindra & Mahindra CDR,Mahindra & Mahindra CL 500,Mahindra & Mahindra Commander,Mahindra & Mahindra DP 550,Mahindra & Mahindra Festara,Mahindra & Mahindra Gio,Mahindra & Mahindra Jeep,Mahindra & Mahindra Marshal,Mahindra & Mahindra Maxx,Mahindra & Mahindra Maxximo,Mahindra & Mahindra Savari,Mahindra & Mahindra Supro,Mahindra & Mahindra Jeeto,Mahindra & Mahindra Voyager,Maruti Suzuki Eeco,Maruti Suzuki Omni,Maruti Suzuki Versa,Mercedes-Benz MB 100 D,Mercedes-Benz MB Class,Tata Motors 207,Tata Motors Ace,Tata Motors Magic,Tata Motors Venture,Tata Motors Winger,Tata Motors Sumo,Toyota Hiace Commuter,Toyota Qualis.', 'policy_type' => 'Comp', 'insurer_remarks' => 'OLD Only', 'location' => '(AR01/AR02/AS12/AS25/ASG4/AS01/AS01A/B,MN01/MN06/ML01/ML05/MZ01/NL01/TR01)', 'remarks_additional' => '( upto 6+1 Innova , Innova crysta, Hycross, Scorpio, Bolero) NON - NIL DEP', 'points' => 32],
            ['insurer' => 'SBI', 'segment' => 'Taxi', 'notice' => 'Non NCB grid is lesser by -3%. <br/> PCV TAXI declined Model-Ashok Leyland Stile,Bajaj Tempo Trax,Bajaj Tempo Limited . Tempo Traveller,Chevrolet Enjoy,Chevrolet Tavera,Datsun GO Plus,Force All Models, ICML Rhino Rx,Mahindra & Mahindra 540,Mahindra & Mahindra 555 DI,Mahindra & Mahindra Armada,Mahindra & Mahindra CDR,Mahindra & Mahindra CL 500,Mahindra & Mahindra Commander,Mahindra & Mahindra DP 550,Mahindra & Mahindra Festara,Mahindra & Mahindra Gio,Mahindra & Mahindra Jeep,Mahindra & Mahindra Marshal,Mahindra & Mahindra Maxx,Mahindra & Mahindra Maxximo,Mahindra & Mahindra Savari,Mahindra & Mahindra Supro,Mahindra & Mahindra Jeeto,Mahindra & Mahindra Voyager,Maruti Suzuki Eeco,Maruti Suzuki Omni,Maruti Suzuki Versa,Mercedes-Benz MB 100 D,Mercedes-Benz MB Class,Tata Motors 207,Tata Motors Ace,Tata Motors Magic,Tata Motors Venture,Tata Motors Winger,Tata Motors Sumo,Toyota Hiace Commuter,Toyota Qualis.', 'policy_type' => 'TP', 'insurer_remarks' => 'OLD Only', 'location' => '(AR01/AR02/AS12/AS25/ASG4/AS01/AS01A/B,MN01/MN06/ML01/ML05/MZ01/NL01/TR01)', 'remarks_additional' => '( upto 6+1 Innova , Innova crysta, Hycross, Scorpio, Bolero)', 'points' => 33],

            ['insurer' => 'SBI', 'segment' => 'Taxi', 'notice' => 'Non NCB grid is lesser by -3%. <br/> PCV TAXI declined Model-Ashok Leyland Stile,Bajaj Tempo Trax,Bajaj Tempo Limited . Tempo Traveller,Chevrolet Enjoy,Chevrolet Tavera,Datsun GO Plus,Force All Models, ICML Rhino Rx,Mahindra & Mahindra 540,Mahindra & Mahindra 555 DI,Mahindra & Mahindra Armada,Mahindra & Mahindra CDR,Mahindra & Mahindra CL 500,Mahindra & Mahindra Commander,Mahindra & Mahindra DP 550,Mahindra & Mahindra Festara,Mahindra & Mahindra Gio,Mahindra & Mahindra Jeep,Mahindra & Mahindra Marshal,Mahindra & Mahindra Maxx,Mahindra & Mahindra Maxximo,Mahindra & Mahindra Savari,Mahindra & Mahindra Supro,Mahindra & Mahindra Jeeto,Mahindra & Mahindra Voyager,Maruti Suzuki Eeco,Maruti Suzuki Omni,Maruti Suzuki Versa,Mercedes-Benz MB 100 D,Mercedes-Benz MB Class,Tata Motors 207,Tata Motors Ace,Tata Motors Magic,Tata Motors Venture,Tata Motors Winger,Tata Motors Sumo,Toyota Hiace Commuter,Toyota Qualis.', 'policy_type' => 'Comp', 'insurer_remarks' => 'OLD Only', 'location' => 'SK04/SK03/SK01/SK05', 'remarks_additional' => '( upto 6+1 Innova , Innova crysta, Hycross, Scorpio, Bolero) NIL DEP', 'points' => 23],
            ['insurer' => 'SBI', 'segment' => 'Taxi', 'notice' => 'Non NCB grid is lesser by -3%. <br/> PCV TAXI declined Model-Ashok Leyland Stile,Bajaj Tempo Trax,Bajaj Tempo Limited . Tempo Traveller,Chevrolet Enjoy,Chevrolet Tavera,Datsun GO Plus,Force All Models, ICML Rhino Rx,Mahindra & Mahindra 540,Mahindra & Mahindra 555 DI,Mahindra & Mahindra Armada,Mahindra & Mahindra CDR,Mahindra & Mahindra CL 500,Mahindra & Mahindra Commander,Mahindra & Mahindra DP 550,Mahindra & Mahindra Festara,Mahindra & Mahindra Gio,Mahindra & Mahindra Jeep,Mahindra & Mahindra Marshal,Mahindra & Mahindra Maxx,Mahindra & Mahindra Maxximo,Mahindra & Mahindra Savari,Mahindra & Mahindra Supro,Mahindra & Mahindra Jeeto,Mahindra & Mahindra Voyager,Maruti Suzuki Eeco,Maruti Suzuki Omni,Maruti Suzuki Versa,Mercedes-Benz MB 100 D,Mercedes-Benz MB Class,Tata Motors 207,Tata Motors Ace,Tata Motors Magic,Tata Motors Venture,Tata Motors Winger,Tata Motors Sumo,Toyota Hiace Commuter,Toyota Qualis.', 'policy_type' => 'Comp', 'insurer_remarks' => 'OLD Only', 'location' => 'SK04/SK03/SK01/SK05', 'remarks_additional' => '( upto 6+1 Innova , Innova crysta, Hycross, Scorpio, Bolero) NON - NIL DEP', 'points' => 32],
            ['insurer' => 'SBI', 'segment' => 'Taxi', 'notice' => 'Non NCB grid is lesser by -3%. <br/> PCV TAXI declined Model-Ashok Leyland Stile,Bajaj Tempo Trax,Bajaj Tempo Limited . Tempo Traveller,Chevrolet Enjoy,Chevrolet Tavera,Datsun GO Plus,Force All Models, ICML Rhino Rx,Mahindra & Mahindra 540,Mahindra & Mahindra 555 DI,Mahindra & Mahindra Armada,Mahindra & Mahindra CDR,Mahindra & Mahindra CL 500,Mahindra & Mahindra Commander,Mahindra & Mahindra DP 550,Mahindra & Mahindra Festara,Mahindra & Mahindra Gio,Mahindra & Mahindra Jeep,Mahindra & Mahindra Marshal,Mahindra & Mahindra Maxx,Mahindra & Mahindra Maxximo,Mahindra & Mahindra Savari,Mahindra & Mahindra Supro,Mahindra & Mahindra Jeeto,Mahindra & Mahindra Voyager,Maruti Suzuki Eeco,Maruti Suzuki Omni,Maruti Suzuki Versa,Mercedes-Benz MB 100 D,Mercedes-Benz MB Class,Tata Motors 207,Tata Motors Ace,Tata Motors Magic,Tata Motors Venture,Tata Motors Winger,Tata Motors Sumo,Toyota Hiace Commuter,Toyota Qualis.', 'policy_type' => 'TP', 'insurer_remarks' => 'OLD Only', 'location' => 'SK04/SK03/SK01/SK05', 'remarks_additional' => '( upto 6+1 Innova , Innova crysta, Hycross, Scorpio, Bolero)', 'points' => 33],
            
            ['insurer' => 'Shriram', 'segment' => 'Taxi', 'policy_type' => 'Comp / TP', 'insurer_remarks' => 'Upto 15 years', 'location' => 'ASSAM/TRIPURA/ARUNACHAL/MEGHALAYA/ MIZORAM', 'remarks_additional' => '7-10 Seater Allowed for TATA MAGIC/MAHINDRA & MAHINDRA MAXXIMO/MAHINDRA & MAHINDRA SUPRO/TOYOTA INNOVA/TATA VENTURE/MAHINDRA & MAHINDRA BOLERO/MAHINDRA & MAHINDRA SCORPIO', 'points' => 13],
            ['insurer' => 'Shriram', 'segment' => 'Taxi', 'policy_type' => 'Comp / TP', 'insurer_remarks' => 'Upto 15 years', 'location' => 'ASSAM/TRIPURA/ARUNACHAL/MEGHALAYA/ MIZORAM', 'remarks_additional' => '7-10 Seater Allowed for TATA MAGIC/MAHINDRA & MAHINDRA MAXXIMO/MAHINDRA & MAHINDRA SUPRO/TOYOTA INNOVA/TATA VENTURE/MAHINDRA & MAHINDRA BOLERO/MAHINDRA & MAHINDRA SCORPIO', 'points' => 39],
            
            ['insurer' => 'FUTURE', 'segment' => 'Taxi', 'policy_type' => 'Comp', 'insurer_remarks' => 'Upto 15 years', 'location' => 'AS', 'remarks_additional' => '', 'points' => 44],
            ['insurer' => 'FUTURE', 'segment' => 'Taxi', 'policy_type' => 'Comp', 'insurer_remarks' => 'Upto 15 years', 'location' => 'Rest OF NE', 'remarks_additional' => '', 'points' => 53],
            ['insurer' => 'FUTURE', 'segment' => 'Taxi', 'policy_type' => 'TP', 'insurer_remarks' => 'Upto 15 years', 'location' => 'AS', 'remarks_additional' => '', 'points' => 27],
            ['insurer' => 'FUTURE', 'segment' => 'Taxi', 'policy_type' => 'TP', 'insurer_remarks' => 'Upto 15 years', 'location' => 'Rest OF NE', 'remarks_additional' => '', 'points' => 36],
            
            ['insurer' => 'BAJAJ', 'segment' => 'Taxi', 'policy_type' => 'TP', 'location' => 'All RTOs', 'remarks_additional' => 'Declined Make/Model- Magic', 'points' => 25],
            
            // ========================================
            // AGRICULTURE TRACTOR
            // ========================================
            
            ['insurer' => 'Digit',  'segment' => 'Tractor', 'policy_type' => 'Comp / TP', 'location' => 'Good NL', 'remarks_additional' => '-', 'points' => 28],
            
            ['insurer' => 'ICICI',  'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'New', 'location' => 'NL,MN', 'remarks_additional' => '-', 'points' => 17],
            ['insurer' => 'ICICI',  'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'New', 'location' => 'ML', 'remarks_additional' => '', 'points' => 26],
            ['insurer' => 'ICICI',  'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'Old', 'location' => 'NL', 'remarks_additional' => '', 'points' => 30],
            
            ['insurer' => 'SBI',  'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'New', 'location' => 'SK', 'remarks_additional' => 'Tractor & Harvester (Excluding Trailer) Upto 15 Yrs', 'points' => 24],
            ['insurer' => 'SBI',  'segment' => 'Tractor', 'policy_type' => 'Comp/ TP', 'insurer_remarks' => 'Old', 'location' => 'SK', 'remarks_additional' => 'Tractor & Harvester (Excluding Trailer) Upto 15 Yrs', 'points' => 28],
            
            ['insurer' => 'SOMPO',  'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'New', 'location' => 'All RTO\'s ', 'remarks_additional' => 'New', 'points' => 29],
            ['insurer' => 'SOMPO',  'segment' => 'Tractor', 'policy_type' => 'Comp/ TP', 'insurer_remarks' => 'Old', 'location' => 'Assam', 'remarks_additional' => 'Old', 'points' => 26],
            ['insurer' => 'SOMPO',  'segment' => 'Tractor', 'policy_type' => 'Comp/ TP', 'insurer_remarks' => 'Old', 'location' => 'NE', 'remarks_additional' => 'Old (EXCEPT ASSAM)', 'points' => 22],
            
            ['insurer' => 'Chola',  'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'location' => 'AS/ML/TR/AR/NL', 'remarks_additional' => 'Without CPA Less 1.5%', 'points' => 19],
            
            ['insurer' => 'Shriram',  'segment' => 'Tractor', 'policy_type' => 'Comp/ TP', 'insurer_remarks' => 'Upto 15 Years', 'location' => 'ASSAM/TRIPURA/ARUNACHAL/MEGHALAYA/ MIZORAM', 'remarks_additional' => '', 'points' => 24],
            
            ['insurer' => 'KOTAK',  'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'location' => 'TR', 'remarks_additional' => '-', 'points' => 44],
            ['insurer' => 'KOTAK',  'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'location' => 'MZ', 'remarks_additional' => '-', 'points' => 39],

            ['insurer' => 'TATA',  'segment' => 'Tractor', 'policy_type' => 'Comp/ TP', 'location' => 'SK-05,SK-01,SK-02,SK-03,SK-04,SK-06,SK-07,SK-08', 'remarks_additional' => '', 'points' => 37],
            
            // ========================================
            // MIS-D
            // ========================================
            ['insurer' => 'ICICI', 'segment' => 'MISD',  'policy_type' => 'Comp/ TP', 'location' => 'SK', 'remarks_additional' => '(Excluding CRANES)', 'points' => 26],
            ['insurer' => 'ICICI', 'segment' => 'MISD',  'policy_type' => 'Comp/ TP', 'location' => 'AR,AS,MN,MZ,ML,NL ', 'remarks_additional' => '(Excluding CRANES)', 'points' => 35],
            ['insurer' => 'ICICI', 'segment' => 'MISD',  'policy_type' => 'Comp/ TP', 'location' => 'Guwahati', 'remarks_additional' => '(Excluding CRANES)', 'points' => 39],
            ['insurer' => 'ICICI', 'segment' => 'MISD',  'policy_type' => 'Comp/ TP', 'location' => 'TR', 'remarks_additional' => 'Old Only (Excluding CRANES)', 'points' => 26],
            ['insurer' => 'ICICI', 'segment' => 'MISD',  'policy_type' => 'Comp/ TP', 'location' => 'All RTO\'s', 'remarks_additional' => 'Garbage Van Only (Upto 3.5T Only)- Tata Ace, Intra, Maruti Super Carry, M&M Bolero, Supro, Jeeto, AL', 'points' => 30],
            
            ['insurer' => 'Royal', 'insurer_remarks' => 'Garbage van Only', 'segment' => 'MISD',  'policy_type' => 'TP', 'location' => 'All RTO\'s ', 'remarks_additional' => 'ELECTRIC ONLY', 'points' => 57],
            
            ['insurer' => 'Chola', 'insurer_remarks' => 'Without CPA Less 1.5%', 'segment' => 'MISD',  'policy_type' => 'Comp/ TP', 'location' => 'AS/ML/TR/ AR/NL', 'remarks_additional' => 'Excavator , Loader , Back Hoe Loader , Transit Mixer, Mobile Crane Carrying Vehicles, Material Lifting Vehicles For Eg - Hydra.', 'points' => 26],
            
            ['insurer' => 'Digit', 'segment' => 'MISD',  'policy_type' => 'Comprehensive', 'location' => 'Assam,NE', 'remarks_additional' => 'JCB', 'points' => 23],
            ['insurer' => 'Digit', 'segment' => 'MISD',  'policy_type' => 'Comprehensive', 'location' => 'Good NL', 'remarks_additional' => 'JCB', 'points' => 14],
            ['insurer' => 'Digit', 'segment' => 'MISD',  'policy_type' => 'Third Party', 'location' => 'Assam & NE', 'remarks_additional' => 'JCB', 'points' => 16],
            ['insurer' => 'Digit', 'segment' => 'MISD',  'policy_type' => 'Third Party', 'location' => 'Good NL', 'remarks_additional' => 'JCB', 'points' => 14],
            ['insurer' => 'Digit', 'segment' => 'MISD',  'policy_type' => 'Comprehensive', 'location' => 'AS & NE', 'remarks_additional' => 'Other than JCB', 'points' => 14],
            ['insurer' => 'Digit', 'segment' => 'MISD',  'policy_type' => 'Third Party', 'location' => 'AS & NE', 'remarks_additional' => 'Other than JCB', 'points' => 16],
            ['insurer' => 'Digit', 'segment' => 'MISD',  'policy_type' => 'Comprehensive', 'location' => 'Good NL', 'remarks_additional' => 'Other than JCB', 'points' => 19],
            ['insurer' => 'Digit', 'segment' => 'MISD',  'policy_type' => 'Third Party', 'location' => 'Good NL', 'remarks_additional' => 'Other than JCB', 'points' => 14],
        
        ];

        // Insert policies with default null values for unspecified columns
        foreach ($policies as $policy) {
            DB::table('insurance_grid_raws')->insert(array_merge([
                'location' => null,
                'location_remarks' => null,
                'insurer_remarks' => null,
                'segment_remarks' => null,
                'policy_type_remarks' => null,
                'remarks_additional' => null,
                'region' => 5,
                'period' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], $policy));
        }

        $this->command->info('Seeded ' . count($policies) . ' insurance policies from September 2025 grid.');
    }
}
