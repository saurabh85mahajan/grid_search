<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NovApSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policies = [];

        // BAJAJ - Private Car - Comprehensive
        $insurer = 'BAJAJ';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'Rest Of Telangana', 'remarks_additional' => 'Non High End Vehicle - Diesel Without NCB - 6% PO On OD', 'points' => 31],
                ['location' => 'Andhra Pradesh, Hyderabad', 'remarks_additional' => 'Non High End Vehicle - Diesel Without NCB - 6% PO On OD', 'points' => 40],
                ['location' => 'All RTOs', 'remarks_additional' => 'High End Vehicles - With NCB Only', 'points' => 22],
                ['location' => 'All RTOs', 'remarks_additional' => 'High End Vehicles - Without NCB Only', 'points' => 9],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'insurer_remarks' => 'ODD Below 80% Allowed',
                'policy_type_remarks' => 'All Fuel',
            ], $policy);
        }

        // FUTURE - Private Car - Comprehensive
        $insurer = 'FUTURE';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['policy_type_remarks' => 'All Fuel', 'location' => 'System RTO', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // UNIVERSAL SOMPO - Private Car - Comprehensive
        $insurer = 'SOMPO';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'With NCB', 'points' => 33],
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'Without NCB', 'points' => 28],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // DIGIT - Private Car - Comprehensive
        $insurer = 'DIGIT';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'High End', 'points' => 17],
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'Non High End', 'points' => 22],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // SHRIRAM - Private Car - Comprehensive
        $insurer = 'SHRIRAM';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['policy_type_remarks' => 'Petrol Excluding Electric', 'location' => 'Andhra Pradesh', 'points' => 24],
                ['policy_type_remarks' => 'Petrol Excluding Electric', 'location' => 'Telangana', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'remarks_additional' => '1+3. Only HONDA & HYUNDAI & KIA manufacture only',
            ], $policy);
        }

        // SBI - Private Car - Comprehensive
        $insurer = 'SBI';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['insurer_remarks' => 'Without NCB', 'policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'points' => 20],
                ['insurer_remarks' => 'With NCB', 'policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'points' => 25],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'remarks_additional' => 'Upto 15 Years Only - ( Electric Declined ). For Audi/BMW/Mercedes Makes PO - 13%',
            ], $policy);
        }

        // ZUNO - Private Car - Comprehensive
        $insurer = 'ZUNO';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'With NCB - ODD Upto 85% Allowed. With NCB ( ODD 85% And Above Points = 1.70 X ). Without NCB - ODD Upto 80% Allowed', 'points' => 23],
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'With NCB - ODD Upto 85% Allowed. With NCB ( ODD 85% And Above Points = 1.70 X ). Without NCB - ODD Upto 80% Allowed', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // RELIANCE - Private Car - Comprehensive
        $insurer = 'RELIANCE';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['policy_type_remarks' => 'Petrol, Electric & CNG-LPG', 'location' => 'All RTOs', 'remarks_additional' => 'Without NCB', 'points' => 9],
                ['policy_type_remarks' => 'Petrol, Electric & CNG-LPG', 'location' => 'All RTOs', 'remarks_additional' => 'With NCB', 'points' => 18],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // ICICI - Private Car - Comprehensive
        $insurer = 'ICICI';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['insurer_remarks' => '1+3 & 1+1', 'policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'With NCB', 'points' => 27],
                ['insurer_remarks' => '1+3 & 1+1', 'policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'Without NCB', 'points' => 15],
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'With NCB', 'points' => 27],
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'Without NCB', 'points' => 15],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // LIBERTY - Private Car - Comprehensive
        $insurer = 'LIBERTY';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['policy_type_remarks' => 'Petrol', 'location' => 'ANDHRA PRADESH - 2 V & ANDHRA PRADESH - 3 R', 'remarks_additional' => 'With NCB & Without NCB', 'points' => 24],
                ['policy_type_remarks' => 'Petrol', 'location' => 'ANDHRA PRADESH - 1 KV & TELANGANA - 1 & 2', 'remarks_additional' => 'With NCB & Without NCB', 'points' => 25],
                ['policy_type_remarks' => 'Petrol', 'location' => 'ANDHRA PRADESH - 2 V', 'remarks_additional' => 'With NCB & Without NCB', 'points' => 21],
                ['policy_type_remarks' => 'Diesel & Others', 'location' => 'ANDHRA PRADESH -1 KV ,ANDHRA PRADESH -3 R & TELANGANA -1 H', 'remarks_additional' => 'Without NCB', 'points' => 18],
                ['policy_type_remarks' => 'Diesel & Others', 'location' => 'TELANGANA - 2 R', 'remarks_additional' => 'Without NCB', 'points' => 18],
                ['policy_type_remarks' => 'Diesel & Others', 'location' => 'ANDHRA PRADESH -1 KV, ANDHRA PRADESH -3 R & TELANGANA -2 R', 'remarks_additional' => 'With NCB', 'points' => 22],
                ['policy_type_remarks' => 'Diesel & Others', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'With NCB', 'points' => 24],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'insurer_remarks' => 'Excluding - Electric',
            ], $policy);
        }

        // MAGMA (On NET) - Private Car - Comprehensive
        $insurer = 'MAGMA';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['policy_type_remarks' => 'Petrol', 'location' => 'TL1', 'remarks_additional' => 'New', 'points' => 25],
                ['policy_type_remarks' => 'Petrol', 'location' => 'AP & TL2', 'remarks_additional' => 'With NCB -1+1', 'points' => 14],
                ['policy_type_remarks' => 'Petrol', 'location' => 'TL1', 'remarks_additional' => 'With NCB -1+1', 'points' => 16],
                ['policy_type_remarks' => 'Petrol', 'location' => 'AP', 'remarks_additional' => 'Without NCB -1+1', 'points' => 14],
                ['policy_type_remarks' => 'Petrol', 'location' => 'TL1', 'remarks_additional' => 'Without NCB -1+1', 'points' => 13],
                ['policy_type_remarks' => 'Petrol', 'location' => 'TL2', 'remarks_additional' => 'Without NCB -1+1', 'points' => 15],
                ['policy_type_remarks' => 'Diesel', 'location' => 'AP', 'remarks_additional' => 'With NCB -1+1', 'points' => 15],
                ['policy_type_remarks' => 'Diesel', 'location' => 'TL1', 'remarks_additional' => 'With NCB -1+1', 'points' => 17],
                ['policy_type_remarks' => 'Diesel', 'location' => 'TL2', 'remarks_additional' => 'With NCB -1+1', 'points' => 15],
                ['policy_type_remarks' => 'Diesel', 'location' => 'AP', 'remarks_additional' => 'Without NCB -1+1', 'points' => 14],
                ['policy_type_remarks' => 'Diesel', 'location' => 'TL1 & TL2', 'remarks_additional' => 'Without NCB -1+1', 'points' => 15],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // CHOLA - Private Car - Comprehensive
        $insurer = 'CHOLA';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['insurer_remarks' => 'Without CPA Less 1.5%', 'policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'All CC', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // TATA - Private Car - Comprehensive
        $insurer = 'TATA';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'points' => 17],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // HDFC - Private Car - Comprehensive
        $insurer = 'HDFC';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['policy_type_remarks' => 'Petrol & Hybrid, Electric', 'location' => 'All RTOs', 'remarks_additional' => 'With NCB & Without NCB', 'points' => 27],
                ['policy_type_remarks' => 'Diesel & CNG-LPG', 'location' => 'All RTOs', 'remarks_additional' => 'With NCB', 'points' => 27],
                ['policy_type_remarks' => 'Diesel & CNG-LPG', 'location' => 'All RTOs', 'remarks_additional' => 'Without NCB', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // ROYAL - Private Car - Comprehensive
        $insurer = 'ROYAL';
        $segment = 'Private Car';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'Andhra Pradesh', 'points' => 12],
                ['location' => 'Telangana', 'points' => 11],
                ['location' => 'Vujaywada', 'points' => 18],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'insurer_remarks' => 'Old',
                'policy_type_remarks' => 'All Fuel',
            ], $policy);
        }

        // ICICI - Private Car - SAOD
        $insurer = 'ICICI';
        $segment = 'Private Car';
        $policyType = 'SAOD';

        foreach (
            [
                ['insurer_remarks' => 'NO POINTS ON NEGATIVE MODELS', 'policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'With NCB', 'points' => 27],
                ['insurer_remarks' => 'NO POINTS ON NEGATIVE MODELS', 'policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'Without NCB', 'points' => 15],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // DIGIT - Private Car - SAOD
        $insurer = 'DIGIT';
        $segment = 'Private Car';
        $policyType = 'SAOD';

        foreach (
            [
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'High End', 'points' => 17],
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'Non High End', 'points' => 22],
            ] as $policy_type_remarks
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // LIBERTY - Private Car - SAOD
        $insurer = 'LIBERTY';
        $segment = 'Private Car';
        $policyType = 'SAOD';

        foreach (
            [
                ['policy_type_remarks' => 'All Fuel', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'With NC', 'points' => 20],
                ['policy_type_remarks' => 'All Fuel', 'location' => 'ANDHRA PRADESH - 2 V & ANDHRA PRADESH - 3 R', 'remarks_additional' => 'With NCB', 'points' => 17],
                ['policy_type_remarks' => 'All Fuel', 'location' => 'ANDHRA PRADESH - 1 KV & TELANGANA - 2 R', 'remarks_additional' => 'With NCB', 'points' => 18],
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'Without NCB', 'points' => 16],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // UNIVERSAL SOMPO - Private Car - SAOD
        $insurer = 'SOMPO';
        $segment = 'Private Car';
        $policyType = 'SAOD';

        foreach (
            [
                ['policy_type_remarks' => 'All Fuel', 'location' => 'System RTO\'s', 'points' => 28],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // RELIANCE - Private Car - SAOD
        $insurer = 'RELIANCE';
        $segment = 'Private Car';
        $policyType = 'SAOD';

        foreach (
            [
                ['policy_type_remarks' => 'Diesel', 'location' => 'All RTOs', 'remarks_additional' => 'Without NCB', 'points' => 18],
                ['policy_type_remarks' => 'Non Diesel', 'location' => 'All RTOs', 'remarks_additional' => 'Without NCB', 'points' => 22],
                ['policy_type_remarks' => 'Diesel', 'location' => 'All RTOs', 'remarks_additional' => 'With NCB', 'points' => 27],
                ['policy_type_remarks' => 'Non Diesel', 'location' => 'All RTOs', 'remarks_additional' => 'With NCB', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // FUTURE - Private Car - SAOD
        $insurer = 'FUTURE';
        $segment = 'Private Car';
        $policyType = 'SAOD';

        foreach (
            [
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // ZUNO - Private Car - SAOD
        $insurer = 'ZUNO';
        $segment = 'Private Car';
        $policyType = 'SAOD';

        foreach (
            [
                ['policy_type_remarks' => 'All Fuel', 'location' => 'System RTO\'s', 'remarks_additional' => 'In Zuno ODD 85% And Above Points = 1.70 X', 'points' => 19],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // CHOLA - Private Car - SAOD
        $insurer = 'CHOLA';
        $segment = 'Private Car';
        $policyType = 'SAOD';

        foreach (
            [
                ['insurer_remarks' => 'Without CPA Less 1.5%', 'policy_type_remarks' => 'Petrol, CNG-LPG & Electric', 'location' => 'All RTOs', 'remarks_additional' => '1000-1500 CC', 'points' => 17],
                ['insurer_remarks' => 'Without CPA Less 1.5%', 'policy_type_remarks' => 'Petrol, CNG-LPG & Electric', 'location' => 'All RTOs', 'remarks_additional' => 'Above 1501 CC', 'points' => 18],
                ['insurer_remarks' => 'Without CPA Less 1.5%', 'policy_type_remarks' => 'Diesel', 'location' => 'All RTOs', 'remarks_additional' => 'Above 1501 CC', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // SBI - Private Car - SAOD
        $insurer = 'SBI';
        $segment = 'Private Car';
        $policyType = 'SAOD';

        foreach (
            [
                ['insurer_remarks' => 'With NCB', 'policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 12 Years Only - W/O NCB Less 5%. Audi/BMW/Mercedes Makes PO - 13%', 'points' => 22],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // TATA - Private Car - SAOD
        $insurer = 'TATA';
        $segment = 'Private Car';
        $policyType = 'SAOD';

        foreach (
            [
                ['policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'points' => 17],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // HDFC - Private Car - SAOD
        $insurer = 'HDFC';
        $segment = 'Private Car';
        $policyType = 'SAOD';

        foreach (
            [
                ['policy_type_remarks' => 'Petrol & Hybrid, Electric', 'location' => 'All RTOs', 'remarks_additional' => 'With NCB', 'points' => 27],
                ['policy_type_remarks' => 'Petrol & Hybrid, Electric', 'location' => 'All RTOs', 'remarks_additional' => 'Without NCB', 'points' => 22],
                ['policy_type_remarks' => 'Diesel & CNG-LPG', 'location' => 'All RTOs', 'remarks_additional' => 'With NCB', 'points' => 18],
                ['policy_type_remarks' => 'Diesel & CNG-LPG', 'location' => 'All RTOs', 'remarks_additional' => 'Without NCB', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // FUTURE - Private Car - Third Party
        $insurer = 'FUTURE';
        $segment = 'Private Car';
        $policyType = 'Third Party';

        foreach (
            [
                ['policy_type_remarks' => 'Petrol', 'location' => 'Telangana', 'points' => 27],
                ['policy_type_remarks' => 'Diesel', 'location' => 'Telangana', 'points' => 18],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // UNIVERSAL SOMPO - Private Car - Third Party
        $insurer = 'SOMPO';
        $segment = 'Private Car';
        $policyType = 'Third Party';

        foreach (
            [
                ['policy_type_remarks' => 'Diesel', 'location' => 'All RTOs', 'points' => 18],
                ['policy_type_remarks' => 'Petrol + Electric', 'location' => 'All RTOs', 'points' => 22],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // SHRIRAM - Private Car - Third Party
        $insurer = 'SHRIRAM';
        $segment = 'Private Car';
        $policyType = 'Third Party';

        foreach (
            [
                ['policy_type_remarks' => 'Petrol', 'location' => 'Telangana', 'remarks_additional' => 'Age 4 - 15 Years Only - Excluding Electric', 'points' => 22],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // TATA - Private Car - Third Party
        $insurer = 'TATA';
        $segment = 'Private Car';
        $policyType = 'Third Party';

        foreach (
            [
                ['policy_type_remarks' => 'Diesel', 'location' => 'Hyderabad', 'points' => 40],
                ['policy_type_remarks' => 'Petrol,CNG & Electric', 'location' => 'Hyderabad', 'points' => 41],
                ['policy_type_remarks' => 'Petrol', 'location' => 'Telangana', 'points' => 31],
                ['policy_type_remarks' => 'Diesel', 'location' => 'Vijaywada', 'points' => 18],
                ['policy_type_remarks' => 'Petrol,CNG & Electric', 'location' => 'Vijaywada', 'points' => 35],
                ['policy_type_remarks' => 'Diesel', 'location' => 'Vishakhapattanam', 'points' => 36],
                ['policy_type_remarks' => 'Petrol,CNG & Electric', 'location' => 'Vishakhapattanam', 'points' => 44],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'remarks_additional' => 'Excluding Rest of AP',
            ], $policy);
        }

        // ICICI - Private Car - Third Party
        $insurer = 'ICICI';
        $segment = 'Private Car';
        $policyType = 'Third Party';

        foreach (
            [
                ['policy_type_remarks' => 'Petrol, CNG-LPG, Diesel', 'location' => 'Vijaywada, Vishakhapattanam, Hyderabad', 'points' => 16],
                ['policy_type_remarks' => 'Petrol, CNG-LPG, Diesel', 'location' => 'Rest of AP & TS', 'points' => 16],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // LIBERTY - Private Car - Third Party
        $insurer = 'LIBERTY';
        $segment = 'Private Car';
        $policyType = 'Third Party';

        foreach (
            [
                ['policy_type_remarks' => 'Petrol', 'location' => 'ANDHRA PRADESH - 2 V', 'remarks_additional' => 'Upto 1000 CC', 'points' => 23],
                ['policy_type_remarks' => 'Petrol', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'Upto 1000 CC', 'points' => 33],
                ['policy_type_remarks' => 'Petrol', 'location' => 'ANDHRA PRADESH - 2 V', 'remarks_additional' => '1001-1500 CC', 'points' => 33],
                ['policy_type_remarks' => 'Petrol', 'location' => 'ANDHRA PRADESH - 1 KV', 'remarks_additional' => '1001-1500 CC', 'points' => 23],
                ['policy_type_remarks' => 'Petrol', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => '1001-1500 CC', 'points' => 45],
                ['policy_type_remarks' => 'Petrol', 'location' => 'ANDHRA PRADESH - 1 KV', 'remarks_additional' => 'Above 1500 CC', 'points' => 37],
                ['policy_type_remarks' => 'Petrol', 'location' => 'ANDHRA PRADESH - 2 V', 'remarks_additional' => 'Above 1500 CC', 'points' => 38],
                ['policy_type_remarks' => 'Petrol', 'location' => 'TELANGANA - 2 R', 'remarks_additional' => 'Above 1500 CC', 'points' => 22],
                ['policy_type_remarks' => 'Petrol', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'Above 1500 CC', 'points' => 45],
                ['policy_type_remarks' => 'Diesel', 'location' => 'ANDHRA PRADESH - 2 V', 'remarks_additional' => 'Above 1500 CC', 'points' => 18],
                ['policy_type_remarks' => 'Diesel', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'Above 1500 CC', 'points' => 31],
                ['policy_type_remarks' => 'Diesel', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => '1001-1500 CC', 'points' => 23],
                ['policy_type_remarks' => 'CNG', 'location' => 'ANDHRA PRADESH - 1 KV', 'remarks_additional' => 'Above 1500 CC', 'points' => 26],
                ['policy_type_remarks' => 'CNG', 'location' => 'ANDHRA PRADESH - 2 V', 'remarks_additional' => 'Above 1500 CC', 'points' => 34],
                ['policy_type_remarks' => 'CNG', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'Above 1500 CC', 'points' => 43],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'insurer_remarks' => 'Excluding Electric',
            ], $policy);
        }

        // DIGIT - Private Car - Third Party
        $insurer = 'DIGIT';
        $segment = 'Private Car';
        $policyType = 'Third Party';

        foreach (
            [
                ['policy_type_remarks' => 'Petrol', 'location' => 'AP Bad', 'remarks_additional' => 'Upto 1000 CC', 'points' => 13],
                ['policy_type_remarks' => 'Petrol', 'location' => 'AP Good', 'remarks_additional' => 'Upto 1000 CC', 'points' => 33],
                ['policy_type_remarks' => 'Petrol', 'location' => 'AP Bad', 'remarks_additional' => 'Above 1000 CC', 'points' => 34],
                ['policy_type_remarks' => 'Petrol', 'location' => 'AP Good', 'remarks_additional' => 'Above 1000 CC', 'points' => 38],
                ['policy_type_remarks' => 'CNG', 'location' => 'AP Good', 'remarks_additional' => 'Upto 1000 CC', 'points' => 34],
                ['policy_type_remarks' => 'CNG', 'location' => 'AP Bad', 'remarks_additional' => 'Above 1000 CC', 'points' => 18],
                ['policy_type_remarks' => 'CNG', 'location' => 'AP Good', 'remarks_additional' => 'Above 1000 CC', 'points' => 27],
                ['policy_type_remarks' => 'Diesel', 'location' => 'AP Good', 'remarks_additional' => 'Upto 1500 CC - All Ages', 'points' => 18],
                ['policy_type_remarks' => 'Diesel', 'location' => 'AP Bad', 'remarks_additional' => 'Above 1500 CC - All Ages', 'points' => 30],
                ['policy_type_remarks' => 'Diesel', 'location' => 'AP Good', 'remarks_additional' => 'Above 1500 CC - All Ages', 'points' => 35],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // ZUNO - Private Car - Third Party
        $insurer = 'ZUNO';
        $segment = 'Private Car';
        $policyType = 'Third Party';

        foreach (
            [
                ['policy_type_remarks' => 'All Fuel', 'location' => 'System RTO\'s', 'points' => 21],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // CHOLA - Private Car - Third Party
        $insurer = 'CHOLA';
        $segment = 'Private Car';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Above 1000 CC', 'policy_type_remarks' => 'All Fuel', 'location' => 'All RTOs', 'remarks_additional' => 'Without CPA Less 1.5%', 'points' => 18],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // SBI - Private Car - Third Party
        $insurer = 'SBI';
        $segment = 'Private Car';
        $policyType = 'Third Party';

        foreach (
            [
                ['insurer_remarks' => 'Upto 1000 CC', 'policy_type_remarks' => 'Petrol. Excluding CNG & PLG', 'location' => 'Andhra Pradesh', 'points' => 21],
                ['insurer_remarks' => 'Upto 1000 CC', 'policy_type_remarks' => 'Petrol. Excluding CNG & PLG', 'location' => 'Telangana', 'points' => 14],
                ['insurer_remarks' => '1001-1500 CC', 'policy_type_remarks' => 'Petrol. Excluding CNG & PLG', 'location' => 'Andhra Pradesh', 'points' => 31],
                ['insurer_remarks' => '1001-1500 CC', 'policy_type_remarks' => 'Petrol. Excluding CNG & PLG', 'location' => 'Telangana', 'points' => 23],
                ['insurer_remarks' => 'Upto 1500 CC', 'policy_type_remarks' => 'Diesel', 'location' => 'All RTOs', 'points' => 13],
                ['insurer_remarks' => 'Above 1501 CC', 'policy_type_remarks' => 'Petrol Excluding CNG & PLG', 'location' => 'Andhra Pradesh', 'points' => 31],
                ['insurer_remarks' => 'Above 1501 CC', 'policy_type_remarks' => 'Petrol Excluding CNG & PLG', 'location' => 'Telangana', 'points' => 28],
                ['insurer_remarks' => 'Above 1501 CC', 'policy_type_remarks' => 'Diesel', 'location' => 'Andhra Pradesh', 'points' => 29],
                ['insurer_remarks' => 'Above 1501 CC', 'policy_type_remarks' => 'Diesel', 'location' => 'Telangana', 'points' => 21],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'remarks_additional' => 'Upto 25 Years',
            ], $policy);
        }

        // MAGMA - Private Car - Third Party
        $insurer = 'MAGMA';
        $segment = 'Private Car';
        $policyType = 'Third Party';

        foreach (
            [
                ['policy_type_remarks' => 'Diesel', 'location' => 'AP & TL1', 'remarks_additional' => 'Upto 1000 CC', 'points' => 24],
                ['policy_type_remarks' => 'Diesel', 'location' => 'TL1', 'remarks_additional' => '1001-1500 CC', 'points' => 36],
                ['policy_type_remarks' => 'Diesel', 'location' => 'AP', 'remarks_additional' => 'Above 1501 CC', 'points' => 20],
                ['policy_type_remarks' => 'Diesel', 'location' => 'TL1', 'remarks_additional' => 'Above 1501 CC', 'points' => 40],
                ['policy_type_remarks' => 'Petrol', 'location' => 'AP', 'remarks_additional' => 'Upto 1500 CC', 'points' => 24],
                ['policy_type_remarks' => 'Petrol', 'location' => 'AP', 'remarks_additional' => 'Above 1500 CC', 'points' => 25],
                ['policy_type_remarks' => 'Petrol', 'location' => 'TL1', 'remarks_additional' => 'Upto 1000 CC', 'points' => 27],
                ['policy_type_remarks' => 'Petrol', 'location' => 'TL1', 'remarks_additional' => '1001-1500 CC', 'points' => 45],
                ['policy_type_remarks' => 'Petrol', 'location' => 'TL1', 'remarks_additional' => 'Above 1500 CC', 'points' => 27],
                ['policy_type_remarks' => 'Petrol', 'location' => 'TL2', 'remarks_additional' => '1001-1500 CC', 'points' => 22],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // ROYAL - Private Car - Third Party
        $insurer = 'ROYAL';
        $segment = 'Private Car';
        $policyType = 'Third Party';

        foreach (
            [
                ['policy_type_remarks' => 'Diesel', 'location' => 'Chittoor,East & West Godavari,Guntur,Krishna,Nellore,Rest of AP', 'remarks_additional' => 'Above 15000 CC', 'points' => 31],
                ['policy_type_remarks' => 'Diesel', 'location' => 'Rest of Telangana', 'remarks_additional' => 'Above 15000 CC', 'points' => 35],
                ['policy_type_remarks' => 'Diesel', 'location' => 'Medak', 'remarks_additional' => 'Above 15000 CC', 'points' => 37],
                ['policy_type_remarks' => 'Diesel', 'location' => 'Visakhapatanam', 'remarks_additional' => 'Above 15000 CC', 'points' => 37],
                ['policy_type_remarks' => 'Diesel', 'location' => 'Hyderabad', 'remarks_additional' => 'Above 15000 CC', 'points' => 38],
                ['policy_type_remarks' => 'Non Diesel Only', 'location' => 'Rest of AP', 'remarks_additional' => 'Upto 1000 CC Excluding Telangana', 'points' => 13],
                ['policy_type_remarks' => 'Non Diesel Only', 'location' => 'Chittoor, Guntur, Krishna', 'remarks_additional' => 'Upto 1000 CC Excluding Telangana', 'points' => 21],
                ['policy_type_remarks' => 'Non Diesel Only', 'location' => 'Nellore', 'remarks_additional' => 'Upto 1000 CC Excluding Telangana', 'points' => 22],
                ['policy_type_remarks' => 'Non Diesel Only', 'location' => 'Hyderabad & Medak', 'remarks_additional' => 'Upto 1000 CC Excluding Telangana', 'points' => 22],
                ['policy_type_remarks' => 'Non Diesel Only', 'location' => 'East & West Godavari, Vishakhapattanm', 'remarks_additional' => 'Upto 1000 CC Excluding Telangana', 'points' => 24],
                ['policy_type_remarks' => 'Non Diesel Only', 'location' => 'East & West Godavari', 'remarks_additional' => 'Above 1001 CC', 'points' => 33],
                ['policy_type_remarks' => 'Non Diesel Only', 'location' => 'Guntur & Krishna', 'remarks_additional' => 'Above 1001 CC', 'points' => 33],
                ['policy_type_remarks' => 'Non Diesel Only', 'location' => 'Chittoor, Nellore, Rest of AP', 'remarks_additional' => 'Above 1001 CC', 'points' => 35],
                ['policy_type_remarks' => 'Non Diesel Only', 'location' => 'Visakhapatanam, Rest of Telangana', 'remarks_additional' => 'Above 1001 CC', 'points' => 36],
                ['policy_type_remarks' => 'Non Diesel Only', 'location' => 'Medak', 'remarks_additional' => 'Above 1001 CC', 'points' => 39],
                ['policy_type_remarks' => 'Non Diesel Only', 'location' => 'Hyderabad', 'remarks_additional' => 'Above 1001 CC', 'points' => 43],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // BAJAJ - 2W - Comprehensive
        $insurer = 'BAJAJ';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'All RTOs', 'remarks_additional' => '5% Less For Bajaj, Vespa, Royal Enfield Makes', 'points' => 36],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
                'policy_type_remarks' => '1+1',
            ], $policy);
        }

        // LIBERTY - 2W - Comprehensive
        $insurer = 'LIBERTY';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'ANDHRA PRADESH - 3 R', 'remarks_additional' => 'Upto 150 CC- Exluding Electric', 'points' => 45],
                ['location' => 'ANDHRA PRADESH - 1 KV', 'remarks_additional' => 'Upto 150 CC - Exluding Electric', 'points' => 48],
                ['location' => 'TELANGANA - 1 H & TELANGANA - 2 R', 'remarks_additional' => '75 CC - Exluding Electric', 'points' => 49],
                ['location' => 'TELANGANA - 1 H & TELANGANA - 2 R', 'remarks_additional' => '76-150 CC- Exluding Electric', 'points' => 41],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
                'policy_type_remarks' => '1+1',
            ], $policy);
        }

        // MAGMA - 2W - Comprehensive
        $insurer = 'MAGMA';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'AP', 'remarks_additional' => 'With CPA - Less 2%. TL1 Decline', 'points' => 36],
                ['location' => 'TL2 & TL3', 'remarks_additional' => 'With CPA - Less 2%. TL1 Decline', 'points' => 26],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
                'policy_type_remarks' => '1+1',
            ], $policy);
        }

        // UNIVERSAL SOMPO - 2W - Comprehensive
        $insurer = 'SOMPO';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'All RTOs', 'remarks_additional' => 'Suzuki & Royal Enfield Decline', 'points' => 36],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
                'policy_type_remarks' => '1+1',
            ], $policy);
        }

        // DIGIT - 2W - Comprehensive
        $insurer = 'DIGIT';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'APTS_Ref', 'remarks_additional' => 'Including Electric', 'points' => 50],
                ['location' => 'Rest of All RTOs', 'remarks_additional' => 'Including Electric', 'points' => 54],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
                'policy_type_remarks' => '1+1',
            ], $policy);
        }

        // ROYAL - 2W - Comprehensive
        $insurer = 'ROYAL';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'AP & Rest of TS', 'remarks_additional' => 'Roll Over', 'points' => 21],
                ['location' => 'Hyderabad', 'remarks_additional' => 'Roll Over', 'points' => 18],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
                'policy_type_remarks' => '1+1',
            ], $policy);
        }

        // TATA - 2W - Comprehensive
        $insurer = 'TATA';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'Hyderabad', 'remarks_additional' => 'Roll Over', 'points' => 53],
                ['location' => 'Andra Pradesh', 'points' => 34],
                ['location' => 'Telengana', 'points' => 29],
                ['location' => 'Vijaywada & Vishakapatnam', 'points' => 42],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
                'policy_type_remarks' => '1+1',
            ], $policy);
        }

        // ICICI - 2W - Comprehensive
        $insurer = 'ICICI';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'All RTOs', 'remarks_additional' => '1+1, 2+2, 3+3', 'points' => 54],
                ['location' => 'Rest Of AP', 'remarks_additional' => 'Electric Scooter. Rest of TS Decline & Excluding Vijaywada - Only For Registered Vehicle - Old Only', 'points' => 27],
                ['location' => 'Hyderabad & Vishakapatnam', 'remarks_additional' => 'Electric Scooter. Rest of TS Decline & Excluding Vijaywada - Only For Registered Vehicle - Old Only', 'points' => 25],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
                'policy_type_remarks' => '1+1',
            ], $policy);
        }

        // RELIANCE - 2W - Comprehensive
        $insurer = 'RELIANCE';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'Andhra Pradesh & Telangana', 'remarks_additional' => 'YAMAHA & EV Less 5%', 'points' => 33],
                ['location' => 'Hyderabad', 'remarks_additional' => 'YAMAHA & EV Less 5%', 'points' => 38],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
                'policy_type_remarks' => '1+1',
            ], $policy);
        }

        // BAJAJ - 2W - Third Party
        $insurer = 'BAJAJ';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'AP', 'remarks_additional' => 'Electric All Models Will be Done As per Bajaj Underwriter Approval Only - Decline Telangana', 'points' => 57],
                ['location' => 'Hyderabad', 'remarks_additional' => 'Electric All Models Will be Done As per Bajaj Underwriter Approval Only - Decline Telangana', 'points' => 52],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
            ], $policy);
        }

        // DIGIT - 2W - Third Party
        $insurer = 'DIGIT';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'APTS_Ref', 'remarks_additional' => 'Including Electric', 'points' => 47],
                ['location' => 'APTS_Bad & APTS_Good2', 'remarks_additional' => 'Including Electric', 'points' => 56],
                ['location' => 'APTS_Good1', 'remarks_additional' => 'Including Electric', 'points' => 58],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
            ], $policy);
        }

        // ROYAL - 2W - Third Party
        $insurer = 'ROYAL';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'AP & Rest of TS', 'remarks_additional' => 'Roll Over', 'points' => 28],
                ['location' => 'Hyderabad', 'remarks_additional' => 'Roll Over', 'points' => 24],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
            ], $policy);
        }

        // UNIVERSAL SOMPO - 2W - Third Party
        $insurer = 'SOMPO';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'All RTOs', 'remarks_additional' => 'Suzuki & Royal Enfield Decline', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
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
                'segment_remarks' => 'Scooter',
            ], $policy);
        }

        // ICICI - 2W - Third Party
        $insurer = 'ICICI';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'All RTOs', 'remarks_additional' => '0+1, 0+2, 0+3 - Excluding Electric', 'points' => 55],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
            ], $policy);
        }

        // TATA - 2W - Third Party
        $insurer = 'TATA';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'Hyderabad', 'points' => 57],
                ['location' => 'Andhra Pradesh', 'points' => 36],
                ['location' => 'Telengana', 'points' => 31],
                ['location' => 'Vijaywada & Vishakapatnam', 'points' => 47],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
            ], $policy);
        }

        // RELIANCE - 2W - Third Party
        $insurer = 'RELIANCE';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'Andhra Pradesh & Telangana', 'remarks_additional' => 'YAMAHA & EV Less 5%', 'points' => 28],
                ['location' => 'Hyderabad', 'remarks_additional' => 'YAMAHA & EV Less 5%', 'points' => 33],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
            ], $policy);
        }

        // LIBERTY - 2W - Third Party
        $insurer = 'LIBERTY';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['remarks_additional' => 'Upto 150 CC', 'location' => 'All RTOs', 'points' => 58],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Scooter',
            ], $policy);
        }

        // BAJAJ - 2W - Comprehensive
        $insurer = 'BAJAJ';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'All RTOs', 'remarks_additional' => '5% Less for Bajaj, Vespa, Royal Enfield Makes', 'points' => 31],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Bike',
                'policy_type_remarks' => '1+1',
            ], $policy);
        }

        // LIBERTY - 2W - Comprehensive
        $insurer = 'LIBERTY';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['policy_type_remarks' => '1+1. Upto 75 CC', 'location' => 'ANDHRA PRADESH - 1 KV & ANDHRA PRADESH - 3 R', 'points' => 40],
                ['policy_type_remarks' => '1+1. Upto 75 CC', 'location' => 'TELANGANA - 1 H', 'points' => 24],
                ['policy_type_remarks' => '1+1. Upto 75 CC', 'location' => 'TELANGANA - 2 R', 'points' => 27],
                ['policy_type_remarks' => '1+1. 76-150 CC', 'location' => 'ANDHRA PRADESH - 3 R', 'points' => 24],
                ['policy_type_remarks' => '1+1. 76-150 CC', 'location' => 'TELANGANA - 1 H & TELANGANA - 2 R', 'points' => 33],
                ['policy_type_remarks' => '1+1. 76-150 CC', 'location' => 'ANDHRA PRADESH - 1 KV', 'points' => 39],
                ['policy_type_remarks' => '1+1. 151-350 CC', 'location' => 'TELANGANA - 1 H', 'points' => 24],
                ['policy_type_remarks' => '1+1. 151-350 CC', 'location' => 'TELANGANA - 2 R', 'points' => 27],
                ['policy_type_remarks' => '1+1. 151-350 CC', 'location' => 'ANDHRA PRADESH - 3 R', 'points' => 28],
                ['policy_type_remarks' => '1+1. 151-350 CC', 'location' => 'ANDHRA PRADESH - 1 KV', 'points' => 40],
                ['policy_type_remarks' => '1+1. Above 350 CC', 'location' => 'TELANGANA - 2 R', 'points' => 27],
                ['policy_type_remarks' => '1+1. Above 350 CC', 'location' => 'TELANGANA - 1 H', 'points' => 31],
                ['policy_type_remarks' => '1+1. Above 350 CC', 'location' => 'ANDHRA PRADESH - 1 KV', 'points' => 34],
                ['policy_type_remarks' => '1+1. Above 350 CC', 'location' => 'ANDHRA PRADESH - 3 R', 'points' => 40],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'insurer_remarks' => 'Excluding Electric',
                'segment_remarks' => 'Bike',
                'remarks_additional' => 'ANDHRA PRADESH - 2 V DECLINE',
            ], $policy);
        }

        // UNIVERSAL SOMPO - 2W - Comprehensive
        $insurer = 'SOMPO';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'All RTOs', 'remarks_additional' => 'Upto 250 CC. Suzuki & Royal Enfield Decline', 'points' => 31],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Bike',
                'policy_type_remarks' => '1+1',
            ], $policy);
        }

        // MAGMA - 2W - Comprehensive
        $insurer = 'MAGMA';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'AP & TL1', 'remarks_additional' => '75-150 CC. TL3 Decline. With CPA - Less 2%', 'points' => 18],
                ['location' => 'TL2', 'remarks_additional' => '75-150 CC. TL3 Decline. With CPA - Less 2%', 'points' => 22],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Bike',
                'policy_type_remarks' => '1+1',
            ], $policy);
        }

        // GO DIGIT - 2W - Comprehensive (BIKE)
        $insurer = 'DIGIT';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['policy_type_remarks' => '1 + 1. Upto 180 CC - Other Than Hero & Honda Makes', 'location' => 'APTS_Ref', 'remarks_additional' => 'Upto 180 CC - Other Than Hero & Honda Makes', 'points' => 25],
                ['policy_type_remarks' => '1 + 1. Upto 180 CC - Other Than Hero & Honda Makes', 'location' => 'APTS_Bad', 'remarks_additional' => 'Upto 180 CC - Other Than Hero & Honda Makes', 'points' => 29],
                ['policy_type_remarks' => '1 + 1. Upto 180 CC - Other Than Hero & Honda Makes', 'location' => 'APTS_Good2', 'remarks_additional' => 'Upto 180 CC - Other Than Hero & Honda Makes', 'points' => 40],
                ['policy_type_remarks' => '1 + 1. Upto 180 CC - Other Than Hero & Honda Makes', 'location' => 'APTS_Good1', 'remarks_additional' => 'Upto 180 CC - Other Than Hero & Honda Makes', 'points' => 44],
                ['policy_type_remarks' => '1 + 1. Upto 180 CC - Hero s Honda Makes Only', 'location' => 'APTS_Ref', 'remarks_additional' => 'Upto 180 CC - Hero & Honda Makes Only', 'points' => 29],
                ['policy_type_remarks' => '1 + 1. Upto 180 CC - Hero s Honda Makes Only', 'location' => 'APTS_Bad', 'remarks_additional' => 'Upto 180 CC - Hero & Honda Makes Only', 'points' => 32],
                ['policy_type_remarks' => '1 + 1. Upto 180 CC - Hero s Honda Makes Only', 'location' => 'APTS Good1', 'remarks_additional' => 'Upto 180 CC - Hero & Honda Makes Only', 'points' => 47],
                ['policy_type_remarks' => '1 + 1. Upto 180 CC - Hero s Honda Makes Only', 'location' => 'APTS Good 2', 'remarks_additional' => 'Upto 180 CC - Hero & Honda Makes Only', 'points' => 47],
                ['policy_type_remarks' => '1 + 1. 181-350 CC Honda, JAWA, Avenger Makes Only', 'location' => 'APTS_Ref', 'remarks_additional' => '181-350 CC Honda, JAWA, Avenger Makes Only', 'points' => 23],
                ['policy_type_remarks' => '1 + 1. 181-350 CC Honda, JAWA, Avenger Makes Only', 'location' => 'APTS_Good1', 'remarks_additional' => '181-350 CC Honda, JAWA, Avenger Makes Only', 'points' => 27],
                ['policy_type_remarks' => '1 + 1. 181-350 CC Honda, JAWA, Avenger Makes Only', 'location' => 'APTS_Good2', 'remarks_additional' => '181-350 CC Honda, JAWA, Avenger Makes Only', 'points' => 36],
                ['policy_type_remarks' => '1 + 1. 181-350 CC Other Makes', 'location' => 'APTS_Good2', 'remarks_additional' => 'APTS_Ref Decline', 'points' => 18],
                ['policy_type_remarks' => '1 + 1. 181-350 CC Other Makes', 'location' => 'APTS_Bad', 'remarks_additional' => 'APTS_Ref Decline', 'points' => 23],
                ['policy_type_remarks' => '1 + 1. 181-350 CC Other Makes', 'location' => 'APTS_Good1', 'remarks_additional' => 'APTS_Ref Decline', 'points' => 24],
                ['policy_type_remarks' => '1 + 1. Above 351 CC', 'location' => 'APTS_Good1', 'points' => 27],
                ['policy_type_remarks' => '1 + 1. ROYAL ENFIELD 181-350 CC', 'location' => 'APTS Ref', 'remarks_additional' => 'Royal Enfield', 'points' => 29],
                ['policy_type_remarks' => '1 + 1. ROYAL ENFIELD 181-350 CC', 'location' => 'APTS_Bad', 'remarks_additional' => 'Royal Enfield', 'points' => 36],
                ['policy_type_remarks' => '1 + 1. ROYAL ENFIELD 181-350 CC', 'location' => 'APTS_Good1', 'remarks_additional' => 'Royal Enfield', 'points' => 36],
                ['policy_type_remarks' => '1 + 1. ROYAL ENFIELD 181-350 CC', 'location' => 'APTS_Good2', 'remarks_additional' => 'Royal Enfield', 'points' => 39],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Bike',
            ], $policy);
        }

        // TATA - 2W - Comprehensive
        $insurer = 'TATA';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'Andhra Pradesh', 'points' => 25],
                ['location' => 'Hyderabad, Vijaywada & Vishakapatnam', 'points' => 24],
                ['location' => 'Telengana', 'points' => 22],
                ['location' => 'Vishakapatnam & Rest of TS', 'points' => 9],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Bike',
                'policy_type_remarks' => '1+1',
            ], $policy);
        }

        // ICICI - 2W - Comprehensive
        $insurer = 'ICICI';
        $segment = '2W';
        $policyType = 'Comprehensive';

        foreach (
            [
                ['location' => 'Rest of AP', 'points' => 27],
                ['location' => 'Hyderabad', 'points' => 36],
                ['location' => 'Vijaywada', 'points' => 22],
                ['location' => 'Hyderabad, Vijaywada & Vishakapatnam', 'remarks_additional' => 'Electric Bike Only For Registered Vehicle - Old Only', 'points' => 29],
                ['location' => 'Rest of AP & TS', 'remarks_additional' => 'Only For Registered Vehicle - Old Only', 'points' => 31],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Bike',
                'policy_type_remarks' => '1+1',
                'insurer_remarks' => 'Excluding Bajaj, Yamaha, TVS and Suzuki',
            ], $policy);
        }

        // BAJAJ - 2W - Third Party
        $insurer = 'BAJAJ';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'Hyderabad', 'points' => 46],
                ['location' => 'Y.S.R, Medchal-Malkajgiri, Srikakulam', 'points' => 25],
                ['location' => 'Krishna', 'points' => 35],
                ['location' => 'Rest of AP', 'points' => 48],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Bike',
                'remarks_additional' => 'Electric All Models Will be Done As per Bajaj Underwriter Approval Only. Decline Telangana. All KTM models and YAMAHA Make Bikes - 22%',
            ], $policy);
        }

        // DIGIT - 2W - Third Party
        $insurer = 'DIGIT';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['policy_type_remarks' => 'Upto 180 CC', 'location' => 'APTS_Bad', 'remarks_additional' => 'Hero & Honda Makes Only', 'points' => 27],
                ['policy_type_remarks' => 'Upto 180 CC', 'location' => 'APTS_Good1', 'remarks_additional' => 'Hero & Honda Makes Only', 'points' => 47],
                ['policy_type_remarks' => 'Upto 180 CC', 'location' => 'APTS_Good2', 'remarks_additional' => 'Hero & Honda Makes Only', 'points' => 48],
                ['policy_type_remarks' => 'Upto 180 CC', 'location' => 'APTS_Ref', 'remarks_additional' => 'Hero & Honda Makes Only', 'points' => 13],
                ['policy_type_remarks' => 'Upto 180 CC', 'location' => 'APTS_Bad', 'remarks_additional' => 'Other Than Hero & Honda Makes', 'points' => 18],
                ['policy_type_remarks' => 'Upto 180 CC', 'location' => 'APTS_Good1', 'remarks_additional' => 'Other Than Hero & Honda Makes', 'points' => 43],
                ['policy_type_remarks' => 'Upto 180 CC', 'location' => 'APTS_Good2', 'remarks_additional' => 'Other Than Hero & Honda Makes', 'points' => 36],
                ['policy_type_remarks' => '181-350 CC Honda, JAWA, Avenger Makes Only', 'location' => 'APTS_Ref', 'remarks_additional' => 'Other Than Hero & Honda Makes', 'points' => 8],
                ['policy_type_remarks' => '181-350 CC Honda, JAWA, Avenger Makes Only', 'location' => 'APTS_Good1', 'remarks_additional' => 'APTS_Bad & APTS_REF RTO Cluster Decline', 'points' => 24],
                ['policy_type_remarks' => '181-350 CC Honda, JAWA, Avenger Makes Only', 'location' => 'APTS_Good2', 'remarks_additional' => 'APTS_Bad & APTS_REF RTO Cluster Decline', 'points' => 24],
                ['policy_type_remarks' => '181-350 CC Other Makes', 'location' => 'APTS_Good1', 'remarks_additional' => 'APTS_Bad & APTS_REF RTO Cluster Decline', 'points' => 15],
                ['policy_type_remarks' => '181-350 CC Other Makes', 'location' => 'APTS_Good2', 'remarks_additional' => 'APTS_Bad & APTS_REF RTO Cluster Decline', 'points' => 22],
                ['policy_type_remarks' => '181-350 CC - ROYAL ENFIELD', 'location' => 'APTS_Bad', 'remarks_additional' => 'ROYAL ENFIELD', 'points' => 23],
                ['policy_type_remarks' => '181-350 CC - ROYAL ENFIELD', 'location' => 'APTS_Good1', 'remarks_additional' => 'ROYAL ENFIELD', 'points' => 25],
                ['policy_type_remarks' => '181-350 CC - ROYAL ENFIELD', 'location' => 'APTS_Good2', 'remarks_additional' => 'ROYAL ENFIELD', 'points' => 24],
                ['policy_type_remarks' => 'Above 350 CC', 'location' => 'APTS_Ref', 'remarks_additional' => 'APTS_Bad, APTS_Good2 & APTS_REF RTO Cluster Decline', 'points' => 24],
                ['policy_type_remarks' => 'Above 350 CC', 'location' => 'APTS_Good1', 'remarks_additional' => 'APTS_Bad, APTS_Good2 & APTS_REF RTO Cluster Decline', 'points' => 15],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Bike',
            ], $policy);
        }

        // UNIVERSAL SOMPO - 2W - Third Party
        $insurer = 'SOMPO';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['policy_type_remarks' => 'Upto 250 CC', 'location' => 'All RTOs', 'remarks_additional' => 'Suzuki & Royal Enfield Decline', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Bike',
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
                'segment_remarks' => 'Bike',
            ], $policy);
        }

        // ICICI - 2W - Third Party
        $insurer = 'ICICI';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'Rest of AP', 'remarks_additional' => 'Excluding Bajaj, Yamaha, TVS and Suzuki', 'points' => 22],
                ['location' => 'Hyderabad', 'remarks_additional' => 'Excluding Bajaj, Yamaha, TVS and Suzuki', 'points' => 31],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Bike',
            ], $policy);
        }

        // LIBERTY - 2W - Third Party
        $insurer = 'LIBERTY';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['policy_type_remarks' => 'Upto 75 CC', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'ANDHRA PRADESH - 3 R & TELANGANA - 2 R DECLINE', 'points' => 34],
                ['policy_type_remarks' => 'Upto 75 CC', 'location' => 'ANDHRA PRADESH - 1 KV & 2 V', 'remarks_additional' => 'ANDHRA PRADESH - 3 R & TELANGANA - 2 R DECLINE', 'points' => 46],
                ['policy_type_remarks' => '76-150 CC', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'ANDHRA PRADESH - 3 R & TELANGANA - 2 R DECLINE', 'points' => 34],
                ['policy_type_remarks' => '76-150 CC', 'location' => 'ANDHRA PRADESH - 1 KV & 2 V', 'remarks_additional' => 'ANDHRA PRADESH - 3 R & TELANGANA - 2 R DECLINE', 'points' => 48],
                ['policy_type_remarks' => '151-350 CC', 'location' => 'ANDHRA PRADESH - 3 R', 'remarks_additional' => 'ANDHRA PRADESH - 3 R & TELANGANA - 2 R DECLINE', 'points' => 22],
                ['policy_type_remarks' => '151-350 CC', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'TELANGANA - 2 R DECLINE', 'points' => 34],
                ['policy_type_remarks' => '151-350 CC', 'location' => 'ANDHRA PRADESH - 1 KV & 2 V', 'remarks_additional' => 'TELANGANA - 2 R DECLINE', 'points' => 46],
                ['policy_type_remarks' => 'Above 350 CC', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'TELANGANA - 2 R DECLINE', 'points' => 34],
                ['policy_type_remarks' => 'Above 350 CC', 'location' => 'ANDHRA PRADESH - 1 KV & 2 V', 'remarks_additional' => 'TELANGANA - 2 R DECLINE', 'points' => 28],
                ['policy_type_remarks' => 'Above 350 CC', 'location' => 'ANDHRA PRADESH - 3 R', 'remarks_additional' => 'TELANGANA - 2 R DECLINE', 'points' => 36],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Bike',
                'insurer_remarks' => 'Excluding Electric',
            ], $policy);
        }

        // TATA - 2W - Third Party
        $insurer = 'TATA';
        $segment = '2W';
        $policyType = 'Third Party';

        foreach (
            [
                ['location' => 'Hyderabad', 'points' => 36],
                ['location' => 'Andhra Pradesh', 'points' => 27],
                ['location' => 'Telengana', 'points' => 23],
                ['location' => 'Vijaywada & Vishakapatnam', 'points' => 35],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'segment_remarks' => 'Bike',
            ], $policy);
        }

        // ICICI - 2W - SAOD
        $insurer = 'ICICI';
        $segment = '2W';
        $policyType = 'SAOD';

        foreach (
            [
                ['insurer_remarks' => 'Scooter', 'location' => 'Telangana',  'points' => 22],
                ['insurer_remarks' => 'Scooter', 'location' => 'Andhra Pradesh & Vishakapattnam', 'points' => 36],
                ['insurer_remarks' => 'Scooter', 'location' => 'Vijaywada', 'points' => 38],
                ['insurer_remarks' => 'Scooter', 'location' => 'Hyderabad', 'points' => 40],
                ['insurer_remarks' => 'Bike - Excluding Bajaj, Yamaha, TVS and Suzuki', 'location' => 'Andhra Pradesh, Hyderabad & Telangana', 'points' => 36],
                ['insurer_remarks' => 'Bike - Excluding Bajaj, Yamaha, TVS and Suzuki', 'location' => 'Vishakapattnam & Vijaywada', 'points' => 45],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
                'remarks_additional' => 'All Makes Excluding Electric',
            ], $policy);
        }

        // TATA - 2W - SAOD
        $insurer = 'TATA';
        $segment = '2W';
        $policyType = 'SAOD';

        foreach (
            [
                ['insurer_remarks' => 'Bike', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'Vishakapatnam Decline', 'points' => 27],
                ['insurer_remarks' => 'Bike', 'location' => 'Hyderabad & Vijaywada', 'remarks_additional' => 'Vishakapatnam Decline', 'points' => 18],
                ['insurer_remarks' => 'Bike', 'location' => 'Telengana', 'remarks_additional' => 'Vishakapatnam Decline', 'points' => 23],
                ['insurer_remarks' => 'Scooter', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'Vijaywada & Vishakapatnam Decline', 'points' => 36],
                ['insurer_remarks' => 'Scooter', 'location' => 'Hyderabad', 'remarks_additional' => 'Vijaywada & Vishakapatnam Decline', 'points' => 24],
                ['insurer_remarks' => 'Scooter', 'location' => 'Telengana', 'remarks_additional' => 'Vijaywada & Vishakapatnam Decline', 'points' => 31],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // UNIVERSAL SOMPO - 2W - SAOD
        $insurer = 'SOMPO';
        $segment = '2W';
        $policyType = 'SAOD';

        foreach (
            [
                ['insurer_remarks' => 'Bike. Upto 250 CC', 'location' => 'All RTOs', 'remarks_additional' => 'Suzuki & Royal Enfield Decline', 'points' => 27],
                ['insurer_remarks' => 'Scooter', 'location' => 'All RTOs', 'remarks_additional' => 'Suzuki & Royal Enfield Decline', 'points' => 31],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // RELIANCE - 2W - SAOD
        $insurer = 'RELIANCE';
        $segment = '2W';
        $policyType = 'SAOD';

        foreach (
            [
                ['insurer_remarks' => 'Bike', 'location' => 'All RTOs', 'points' => 42],
                ['insurer_remarks' => 'Scooter', 'location' => 'All RTOs', 'remarks_additional' => 'Scooter -YAMAHA & EV Less 5%', 'points' => 47],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => $policyType,
            ], $policy);
        }

        // ZUNO - 3W PCV - Comprehensive & Third Party
        $insurer = 'ZUNO';
        $segment = '3W PCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'As per System RTOs', 'remarks_additional' => 'Upto 6 Seater', 'points' => 47],
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
                ['policy_type' => 'Comprehensive', 'location' => 'Hyderabad', 'remarks_additional' => 'Exclude Location - Adilabad, Kvrangireddy, Khammam, Mahabub Nagar, Naigonda Excluding New Vehicle', 'points' => 36],
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh (Exclude East Godavari, Cuddapah and Kurnool)', 'remarks_additional' => 'Petrol & CNG', 'points' => 36],
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh (Exclude East Godavari, Cuddapah and Kurnool)', 'remarks_additional' => 'Diesel', 'points' => 13],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'points' => 53],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // BAJAJ - 3W PCV - Electric - Comprehensive & Third Party
        $insurer = 'BAJAJ';
        $segment = '3W PCV';

        foreach (
            [
                ['insurer_remarks' => 'Electric', 'policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'E-Rikshaw', 'points' => 27],
                ['insurer_remarks' => 'Electric', 'policy_type' => 'Third Party', 'location' => 'Excluding Telangana & Hyderabad', 'remarks_additional' => 'E-Rikshaw', 'points' => 34],
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
                ['policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH', 'remarks_additional' => 'NEW Vehicle Only', 'points' => 27],
                ['policy_type' => 'Comprehensive', 'location' => 'TELANGANA', 'remarks_additional' => 'NEW Vehicle Only', 'points' => 33],
                ['policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH', 'remarks_additional' => 'Age 1-5 Years Only', 'points' => 39],
                ['policy_type' => 'Comprehensive', 'location' => 'TELANGANA', 'remarks_additional' => 'Age 1-5 Years Only', 'points' => 36],
                ['policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH', 'remarks_additional' => 'Age Above 5 Years', 'points' => 47],
                ['policy_type' => 'Comprehensive', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'Age Above 5 Years', 'points' => 46],
                ['policy_type' => 'Comprehensive', 'location' => 'TELANGANA - 2 AKKWWN & TELANGANA - 3 R', 'remarks_additional' => 'Age Above 5 Years', 'points' => 55],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'All Ages', 'points' => 29],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // THREE WHEELER PCV (AUTO) segment
        // ICICI - THREE WHEELER PCV (AUTO) - Comprehensive & Third Party
        $insurer = 'ICICI';
        $segment = '3W PCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Hyderabad', 'remarks_additional' => 'New Only - Petrol & CNG Only', 'points' => 15],
                ['policy_type' => 'Comprehensive', 'location' => 'Telangana', 'remarks_additional' => 'New Only - Petrol & CNG Only', 'points' => 22],
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'New Only - Petrol & CNG Only', 'points' => 39],
                ['policy_type' => 'Comprehensive', 'location' => 'Vishakhapattanm', 'remarks_additional' => 'New Only - Petrol & CNG Only', 'points' => 47],
                ['policy_type' => 'Comprehensive', 'location' => 'Vijaywada', 'remarks_additional' => 'New Only - Petrol & CNG Only', 'points' => 60],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'Old Only - Petrol & CNG Only. Telangana Decline', 'points' => 36],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Hyderabad', 'remarks_additional' => 'Old Only - Petrol & CNG Only. Telangana Decline', 'points' => 58],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Vishakhapattanm & Vijaywada', 'remarks_additional' => 'Old Only - Petrol & CNG Only. Telangana Decline', 'points' => 55],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Vishakhapattanm', 'remarks_additional' => 'Diesel. Andhra Pradesh Decline', 'points' => 54],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Hyderabad, Vijaywada', 'remarks_additional' => 'Diesel. Andhra Pradesh Decline', 'points' => 55],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Telangana', 'remarks_additional' => 'Diesel - Old Only. Andhra Pradesh Decline', 'points' => 50],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Andhra Pradesh & Telangana', 'remarks_additional' => 'Electric', 'points' => 41],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Vishakhapattanm, Hyderabad, Vijaywada', 'remarks_additional' => 'Electric', 'points' => 46],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SHRIRAM - THREE WHEELER PCV (AUTO) - Comprehensive + Third Party
        $insurer = 'SHRIRAM';
        $segment = '3W PCV';

        foreach (
            [
                ['location' => 'Telangana TS/TG -05,16,17 RTO Codes Decline', 'remarks_additional' => 'Diesel Only - Age Upto 15 Years Only - Bajaj and TVS make only', 'points' => 39],
                ['location' => 'Telangana TS/TG -05,16,17 RTO Codes Decline', 'remarks_additional' => 'Other than Diesel - Upto 15 Years Only', 'points' => 44],
                ['location' => 'Telangana TS/TG -05,16,17 RTO Codes Decline', 'remarks_additional' => 'Diesel Only - Age Upto 5 Years Only - Bajaj make only ZONE 1 & 2 BRANCH', 'points' => 33],
                ['location' => 'Telangana TS/TG -05,16,17 RTO Codes Decline', 'remarks_additional' => 'Diesel Only - Age Upto 5 Years Only - Other than Bajaj make - ZONE 1', 'points' => 28],
                ['location' => 'Andhra Pradesh AP - 02, 07,21,23,24,25 Decline', 'remarks_additional' => 'Diesel Only - Age 6-15 Years Only - Bajaj make only', 'points' => 46],
                ['location' => 'Andhra Pradesh AP - 02, 07,21,23,24,25 Decline', 'remarks_additional' => 'Diesel Only - Age 6-15 Years Only - Other than Bajaj make', 'points' => 41],
                ['location' => 'Andhra Pradesh AP - 02, 07,21,23,24,25 Decline', 'remarks_additional' => 'Other than Diesel. Upto 15 Years Only', 'points' => 44],
                ['location' => 'All RTOs', 'remarks_additional' => 'Upto 15 Years Only. Electric Only - Upto 2000 Watt', 'points' => 37],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 15 Years Refer Decline Model List',
                'policy_type' => 'Comprehensive + Third Party',
            ], $policy);
        }

        // SBI - 3W PCV - Comprehensive & Third Party
        $insurer = 'SBI';
        $segment = '3W PCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Non Diesel Only', 'points' => 52],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Non Diesel Only', 'points' => 54],
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'Diesel Only - New Vehicle', 'points' => 46],
                ['policy_type' => 'Third Party', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'Diesel Only - New Vehicle', 'points' => 48],
                ['policy_type' => 'Comprehensive', 'location' => 'Telangana', 'remarks_additional' => 'Diesel Only - New Vehicle', 'points' => 42],
                ['policy_type' => 'Third Party', 'location' => 'Telangana', 'remarks_additional' => 'Diesel Only - New Vehicle', 'points' => 44],
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'Diesel Only - Old Vehicle', 'points' => 50],
                ['policy_type' => 'Third Party', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'Diesel Only - Old Vehicle', 'points' => 52],
                ['policy_type' => 'Comprehensive', 'location' => 'Telangana', 'remarks_additional' => 'Diesel Only - Old Vehicle', 'points' => 44],
                ['policy_type' => 'Third Party', 'location' => 'Telangana', 'remarks_additional' => 'Diesel Only - Old Vehicle', 'points' => 46],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Seating - 3+1 For Comp Age Upto 15 Years & Third Party Age Upto 25 Years Only',
            ], $policy);
        }

        // DIGIT - 3W PCV - Comprehensive & Third Party
        $insurer = 'DIGIT';
        $segment = '3W PCV';

        foreach (
            [
                ['insurer_remarks' => 'Diesel Only', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs Excluding Hyderabad', 'remarks_additional' => 'Upto 1 Year - Bajaj RE Only', 'points' => 31],
                ['insurer_remarks' => 'Diesel Only', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs Excluding Hyderabad', 'remarks_additional' => '1 to 5 Years - Bajaj RE Only', 'points' => 22],
                ['insurer_remarks' => 'Non Diesel Only', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Hyderabad', 'remarks_additional' => 'Upto 1 Years - Non Diesel Only', 'points' => 41],
                ['insurer_remarks' => 'Non Diesel Only', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Hyderabad', 'remarks_additional' => 'Above 1 Years - Non Diesel Only', 'points' => 40],
                ['insurer_remarks' => 'Non Diesel Only', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Rest of RTOs', 'remarks_additional' => 'All Ages - Non Diesel Only', 'points' => 35],
                ['insurer_remarks' => 'Non Diesel Only', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Hyderabad', 'remarks_additional' => 'E - Rickshaw', 'points' => 20],
                ['insurer_remarks' => 'Non Diesel Only', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Rest of All RTOs', 'remarks_additional' => 'E - Rickshaw', 'points' => 17],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // FUTURE - 3W PCV - Comprehensive & Third Party
        $insurer = 'FUTURE';
        $segment = '3W PCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'points' => 69],
                ['policy_type' => 'Third Party', 'location' => 'Andhra Pradesh', 'points' => 52],
                ['policy_type' => 'Comprehensive', 'location' => 'Telangana', 'points' => 58],
                ['policy_type' => 'Third Party', 'location' => 'Telangana', 'points' => 41],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '3+1',
            ], $policy);
        }

        // ROYAL - 3W PCV - Comprehensive & Third Party
        $insurer = 'ROYAL';
        $segment = '3W PCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Vizag, Krishna',  'points' => 39],
                ['policy_type' => 'Comprehensive', 'location' => 'Hyderabad', 'points' => 46],
                ['policy_type' => 'Third Party', 'location' => 'Vizag, Krishna',  'points' => 37],
                ['policy_type' => 'Third Party', 'location' => 'Hyderabad', 'points' => 46],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'remarks_additional' => 'Upto 3 Seater. Guntur, Rest of AP & TS Decline',
            ], $policy);
        }

        // ROYAL - 3W PCV - E- Rickshaw - Comprehensive & Third Party
        $insurer = 'ROYAL';
        $segment = '3W PCV';

        foreach (
            [
                ['insurer_remarks' => 'E- Rickshaw', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => '3+1', 'points' => 46],
                ['insurer_remarks' => 'E- Rickshaw', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '3+1', 'points' => 54],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // MAGMA - 3W PCV - Comprehensive & Third Party
        $insurer = 'MAGMA';
        $segment = '3W PCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'AP', 'remarks_additional' => 'Old Excluding Electric', 'points' => 37],
                ['policy_type' => 'Third Party', 'location' => 'AP & TL1', 'remarks_additional' => 'Electric', 'points' => 24],
                ['policy_type' => 'Third Party', 'location' => 'TL2', 'remarks_additional' => 'Electric', 'points' => 17],
                ['policy_type' => 'Third Party', 'location' => 'AP', 'remarks_additional' => 'Old Only Excluding Electric', 'points' => 36],
                ['policy_type' => 'Third Party', 'location' => 'TL1', 'remarks_additional' => 'Old Only Excluding Electric', 'points' => 30],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // TATA - 3W PCV - Comprehensive & Third Party
        $insurer = 'TATA';
        $segment = '3W PCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh & Telangana', 'remarks_additional' => 'Only New - Petrol, CNG, Electric & Diesel', 'points' => 41],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Andhra Pradesh & Telangana', 'remarks_additional' => '1-6 Year - Petrol & CNG, Diesel', 'points' => 39],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Andhra Pradesh & Telangana', 'remarks_additional' => 'Above 6 Year - Petrol & CNG, Diesel', 'points' => 41],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Andhra Pradesh & Telangana', 'remarks_additional' => 'Electric - Above 1 Years', 'points' => 41],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Hyderabad', 'remarks_additional' => 'All Ages. Petrol, CNG, Electric & Diesel', 'points' => 46],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Vishakhapattanm', 'remarks_additional' => 'All Ages. Petrol, CNG, Electric & Diesel', 'points' => 51],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Vijaywada', 'remarks_additional' => 'All Ages. Petrol, CNG, Electric & Diesel', 'points' => 48],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '(Seating 3+1)',
            ], $policy);
        }

        // BAJAJ - TAXI - Comprehensive & Third Party
        $insurer = 'BAJAJ';
        $segment = 'TAXI';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Rest of All RTOs', 'points' => 8],
                ['policy_type' => 'Comprehensive', 'location' => 'Hyderabad', 'points' => 22],
                ['policy_type' => 'Third Party', 'location' => 'TS, Hyderabad', 'points' => 29],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ICICI - TAXI - Comprehensive & Third Party
        $insurer = 'ICICI';
        $segment = 'TAXI';

        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Hyderabad', 'remarks_additional' => 'Electric Vehicle Only. Rest of AP & TS, Vijaywada, Vishakhapattnam Decline', 'points' => 46],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // CHOLA - TAXI - Comprehensive
        $insurer = 'CHOLA';
        $segment = 'TAXI';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 6 Seater Without CPA - Less 1.5%', 'points' => 10],
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
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'points' => 44],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'points' => 27],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // RELIANCE - TAXI - Comprehensive & Third Party
        $insurer = 'RELIANCE';
        $segment = 'TAXI';

        foreach (
            [
                ['insurer_remarks' => 'Upto 6 Seater', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'HyderBad', 'remarks_additional' => 'Non Nil Dep, Petrol + CNG + Battery', 'points' => 19],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SHRIRAM - TAXI - Comprehensive & Third Party
        $insurer = 'SHRIRAM';
        $segment = 'TAXI';

        foreach (
            [
                ['location' => 'Andhra Pradesh', 'remarks_additional' => '6+1 Seating For Comp Age Upto 15 Years & Third Party 20 Years Only', 'points' => 24],
                ['location' => 'Telangana', 'remarks_additional' => '6+1 Seating - Upto 15 Years Only', 'points' => 26],
                ['location' => 'Andhra Pradesh (AP-05 Decline)', 'remarks_additional' => 'Seating 7-10 Comp Upto 15 Yrs & TP Upto 20 YRS', 'points' => 18],
                ['location' => 'Telangana', 'remarks_additional' => 'Seating 7-10 Age Upto 15 Years Only', 'points' => 15],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Refer Decline Model List s Excluding Electric',
                'policy_type' => 'Comprehensive & Third Party',
            ], $policy);
        }

        // SBI - TAXI - Comprehensive & Third Party
        $insurer = 'SBI';
        $segment = 'TAXI';
        $insurerRemarks1 = '6 + 1 Seating - Excluding Innova, Innova crysta, Hycross, Scorpio, Bolero of State Capital With NCB Only (Without NCB Less 3% PO) Excluding Electric';
        $insurerRemarks2 = '6+1 - Only Innova, Innova crysta, Hycross, Scorpio, Bolero With NCB Only (Without NCB Less 3% PO) - Excluding Electric';

        foreach (
            [
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 999 CC, Nil Dep', 'points' => 15],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 999 CC, Non Niil Dep', 'points' => 25],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 999 CC', 'points' => 22],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => '1000- 1499 CC, Nil Dep', 'points' => 18],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => '1000- 1499 CC, Non Nil Dep', 'points' => 27],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '1000- 1499 CC,CC', 'points' => 32],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Above 1500 CC, Nil Dep', 'points' => 19],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Above 1500 CC, Non Nil Dep', 'points' => 29],
                ['insurer_remarks' => $insurerRemarks1, 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Above 1500 CC', 'points' => 34],
                ['insurer_remarks' => $insurerRemarks2, 'policy_type' => 'Comprehensive', 'location' => 'Telangana Decline Andhra Pradesh', 'remarks_additional' => 'Nil Dep, 6+1 Seater', 'points' => 21],
                ['insurer_remarks' => $insurerRemarks2, 'policy_type' => 'Comprehensive', 'location' => 'Telangana Decline Andhra Pradesh', 'remarks_additional' => 'Non Nil Dep, 6+1 Seater', 'points' => 31],
                ['insurer_remarks' => $insurerRemarks2, 'policy_type' => 'Third Party', 'location' => 'Telangana Decline Andhra Pradesh', 'remarks_additional' => '6+1 Seater', 'points' => 28],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ICICI - 3W GCV - Comprehensive & Third Party
        $insurer = 'ICICI';
        $segment = '3W GCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive - New', 'location' => 'Rest of AP & TS', 'remarks_additional' => 'Vijaywada Decline', 'points' => 18],
                ['policy_type' => 'Comprehensive - New', 'location' => 'Hyderabad & Vishakhapattnam', 'remarks_additional' => 'Vijaywada Decline', 'points' => 46],
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Rest of AP', 'remarks_additional' => 'Old Only Rest of TS & Hyderabad Decline', 'points' => 18],
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Vishakapatnam', 'remarks_additional' => 'Old Only Rest of TS & Hyderabad Decline', 'points' => 41],
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Hyderabad', 'remarks_additional' => 'Old Only Rest of TS & Hyderabad Decline', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ICICI - 3W GCV - Electric Only - Comprehensive & Third Party
        $insurer = 'ICICI';
        $segment = '3W GCV';

        foreach (
            [
                ['insurer_remarks' => 'Electric Only', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'Vijaywada, Vishakapatnam', 'points' => 46],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // FUTURE - 3W GCV - Comprehensive & Third Party
        $insurer = 'FUTURE';
        $segment = '3W GCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'points' => 67],
                ['policy_type' => 'Third Party', 'location' => 'Andhra Pradesh', 'points' => 50],
                ['policy_type' => 'Comprehensive', 'location' => 'Telangana', 'points' => 63],
                ['policy_type' => 'Third Party', 'location' => 'Telangana', 'points' => 46],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // BAJAJ - 3W GCV - Comprehensive
        $insurer = 'BAJAJ';
        $segment = '3W GCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Telangana, Hyderabad', 'remarks_additional' => 'Exclude Medak Decline Location-Krishna, guntur, Rangareddy, vijaynagaram, warangal, ananthpur, mahbub nagar, cudappah, East Godavari and medak Chittoor and Khammam', 'points' => 21],
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'Decline Location-Krishna, guntur, Rangareddy, vijaynagaram, warangal, ananthpur, mahbub nagar, cudappah, East Godavari and medak Chittoor and Khammam', 'points' => 18],
                ['policy_type' => 'Comprehensive', 'location' => 'Telangana, Hyderabad', 'remarks_additional' => 'Electric', 'points' => 31],
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'Electric', 'points' => 18],
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
                ['policy_type' => 'Comprehensive', 'location' => 'Guntur', 'points' => 26],
                ['policy_type' => 'Comprehensive', 'location' => 'Chittoor', 'points' => 11],
                ['policy_type' => 'Comprehensive', 'location' => 'Medak', 'points' => 30],
                ['policy_type' => 'Comprehensive', 'location' => 'Ongole', 'points' => 32],
                ['policy_type' => 'Comprehensive', 'location' => 'East Godavari', 'points' => 33],
                ['policy_type' => 'Comprehensive', 'location' => 'Nellore', 'points' => 38],
                ['policy_type' => 'Comprehensive', 'location' => 'Visakhpatnam, Hyderabad', 'points' => 39],
                ['policy_type' => 'Comprehensive', 'location' => 'West Godavari', 'points' => 40],
                ['policy_type' => 'Comprehensive', 'location' => 'Rest of AP', 'points' => 23],
                ['policy_type' => 'Third Party', 'location' => 'Chittoor', 'points' => 17],
                ['policy_type' => 'Third Party', 'location' => 'Guntur', 'points' => 32],
                ['policy_type' => 'Third Party', 'location' => 'Medak', 'points' => 36],
                ['policy_type' => 'Third Party', 'location' => 'Ongole', 'points' => 38],
                ['policy_type' => 'Third Party', 'location' => 'East Godavari', 'points' => 39],
                ['policy_type' => 'Third Party', 'location' => 'Hyderabad', 'points' => 40],
                ['policy_type' => 'Third Party', 'location' => 'Nellore', 'points' => 44],
                ['policy_type' => 'Third Party', 'location' => 'West Godavari', 'points' => 46],
                ['policy_type' => 'Third Party', 'location' => 'Visakhapatnam', 'points' => 45],
                ['policy_type' => 'Third Party', 'location' => 'Rest of AP', 'points' => 28],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'remarks_additional' => 'Excluding Anantapur, Kadapa, Mahbubnagar, Nizamabad & Rest of Telangana',
            ], $policy);
        }

        // ROYAL - 3W GCV - ELECTRIC - Comprehensive & Third Party
        $insurer = 'ROYAL';
        $segment = '3W GCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Mahbubnagar', 'points' => 20],
                ['policy_type' => 'Comprehensive', 'location' => 'Anantapur, Kadapa', 'points' => 20],
                ['policy_type' => 'Comprehensive', 'location' => 'Nizamabad', 'points' => 21],
                ['policy_type' => 'Comprehensive', 'location' => 'Rest of TS', 'points' => 22],
                ['policy_type' => 'Comprehensive', 'location' => 'Chittoor', 'points' => 26],
                ['policy_type' => 'Comprehensive', 'location' => 'Rest of AP', 'points' => 32],
                ['policy_type' => 'Comprehensive', 'location' => 'Guntur', 'points' => 34],
                ['policy_type' => 'Comprehensive', 'location' => 'Medak', 'points' => 36],
                ['policy_type' => 'Comprehensive', 'location' => 'East Godavari', 'points' => 38],
                ['policy_type' => 'Comprehensive', 'location' => 'Ongole', 'points' => 37],
                ['policy_type' => 'Comprehensive', 'location' => 'Hyderabad', 'points' => 38],
                ['policy_type' => 'Comprehensive', 'location' => 'West Godavari', 'points' => 45],
                ['policy_type' => 'Comprehensive', 'location' => 'Nellore', 'points' => 45],
                ['policy_type' => 'Comprehensive', 'location' => 'Visakhapatnam', 'points' => 46],
                ['policy_type' => 'Third Party', 'location' => 'Anantapur, Kadapa', 'points' => 24],
                ['policy_type' => 'Third Party', 'location' => 'Nizamabad', 'points' => 26],
                ['policy_type' => 'Third Party', 'location' => 'Mahbubnagar', 'points' => 23],
                ['policy_type' => 'Third Party', 'location' => 'Rest of TS', 'points' => 26],
                ['policy_type' => 'Third Party', 'location' => 'Chittoor', 'points' => 32],
                ['policy_type' => 'Third Party', 'location' => 'Rest of AP', 'points' => 42],
                ['policy_type' => 'Third Party', 'location' => 'Guntur', 'points' => 45],
                ['policy_type' => 'Third Party', 'location' => 'Medak', 'points' => 47],
                ['policy_type' => 'Third Party', 'location' => 'East Godavari', 'points' => 50],
                ['policy_type' => 'Third Party', 'location' => 'Ongole', 'points' => 49],
                ['policy_type' => 'Third Party', 'location' => 'Hyderabad', 'points' => 51],
                ['policy_type' => 'Third Party', 'location' => 'Nellore', 'points' => 54],
                ['policy_type' => 'Third Party', 'location' => 'Visakhapatnam, West Godavari', 'points' => 55],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'ELECTRIC',
            ], $policy);
        }

        // DIGIT - 3W GCV - REF RTOs DECLINE - Comprehensive & Third Party
        $insurer = 'DIGIT';
        $segment = '3W GCV';

        foreach (
            [
                ['insurer_remarks' => 'REF RTOs DECLINE', 'policy_type' => 'Comprehensive', 'location' => 'Hyderabad', 'remarks_additional' => 'Excluding E-Cart', 'points' => 13],
                ['insurer_remarks' => 'REF RTOs DECLINE', 'policy_type' => 'Comprehensive', 'location' => 'Rest of All RTOs', 'remarks_additional' => 'Excluding E-Cart', 'points' => 18],
                ['insurer_remarks' => 'REF RTOs DECLINE', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Excluding E-Cart', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SHRIRAM - 3W GCV - Electric - Comprehensive & Third Party
        $insurer = 'SHRIRAM';
        $segment = '3W GCV';

        foreach (
            [
                ['insurer_remarks' => 'Electric', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 15 Years Only - Upto 2000 Watt', 'points' => 37],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ZUNO - 3W GCV - Comprehensive & Third Party
        $insurer = 'ZUNO';
        $segment = '3W GCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'All RTOs', 'points' => 47],
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
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Without CPA - Less 1.5% Including Electric', 'points' => 33],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Including Electric', 'points' => 28],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // TATA - 3W GCV - Comprehensive & Third Party
        $insurer = 'TATA';
        $segment = '3W GCV';

        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Hyderabad', 'remarks_additional' => 'Comp - All Ages & TP Above 1 Years', 'points' => 51],
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Vijaywada & Vishakapatnam', 'remarks_additional' => 'Comp - All Ages & TP Above 1 Years', 'points' => 50],
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Rest of AP & TS', 'remarks_additional' => 'Comp -New and Comp / TP- Above 6 Years', 'points' => 41],
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Rest of AP & TS', 'remarks_additional' => '1-6 Years', 'points' => 39],
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
                ['insurer_remarks' => 'New', 'policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH - 3 KNO', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 26],
                ['insurer_remarks' => 'New', 'policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH - 2 V & TELANGANA - 1 H', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 27],
                ['insurer_remarks' => 'New', 'policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH - 1 KV', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 27],
                ['insurer_remarks' => '1-5 Years', 'policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH - 3 KNO', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 41],
                ['insurer_remarks' => '1-5 Years', 'policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH - 1 KV & ANDHRA PRADESH - 2 V', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 44],
                ['insurer_remarks' => '1-5 Years', 'policy_type' => 'Comprehensive', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'TELANGANA - 2 AKKWWN & TELANGANA - 3 R DECLINE', 'points' => 48],
                ['insurer_remarks' => '5-10 Years', 'policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH - 3 KNO', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 47],
                ['insurer_remarks' => '5-10 Years', 'policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH - 1 KV & ANDHRA PRADESH - 2 V', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 49],
                ['insurer_remarks' => '5-10 Years', 'policy_type' => 'Comprehensive', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'TELANGANA - 2 AKKWWN & TELANGANA - 3 R DECLINE', 'points' => 53],
                ['insurer_remarks' => 'Above 10 Years', 'policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH - 3 KNO', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 45],
                ['insurer_remarks' => 'Above 10 Years', 'policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH - 1 KV & ANDHRA PRADESH - 2 V', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 46],
                ['insurer_remarks' => 'Above 10 Years', 'policy_type' => 'Comprehensive', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'TELANGANA - 2 AKKWWN & TELANGANA - 3 R DECLINE', 'points' => 50],
                ['insurer_remarks' => 'New', 'policy_type' => 'Third Party', 'location' => 'ANDHRA PRADESH - 3 KNO', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 26],
                ['insurer_remarks' => 'New', 'policy_type' => 'Third Party', 'location' => 'ANDHRA PRADESH - 2 V & TELANGANA - 1 H', 'remarks_additional' => 'ANDHRA PRADESH - 4 R, TELANGANA - 2 AKKWWN & TELANGANA - 3 R DECLINE', 'points' => 27],
                ['insurer_remarks' => 'New', 'policy_type' => 'Third Party', 'location' => 'ANDHRA PRADESH - 1 KV', 'remarks_additional' => 'ANDHRA PRADESH - 4 R, TELANGANA - 2 AKKWWN & TELANGANA - 3 R DECLINE', 'points' => 27],
                ['insurer_remarks' => '1-5 Years', 'policy_type' => 'Third Party', 'location' => 'ANDHRA PRADESH - 3 KNO', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 43],
                ['insurer_remarks' => '1-5 Years', 'policy_type' => 'Third Party', 'location' => 'ANDHRA PRADESH - 1 KV & ANDHRA PRADESH - 2 V', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 44],
                ['insurer_remarks' => '1-5 Years', 'policy_type' => 'Third Party', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'TELANGANA - 2 AKKWWN & TELANGANA - 3 R DECLINE', 'points' => 48],
                ['insurer_remarks' => '5-10 Years', 'policy_type' => 'Third Party', 'location' => 'ANDHRA PRADESH - 3 KNO', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 47],
                ['insurer_remarks' => '5-10 Years', 'policy_type' => 'Third Party', 'location' => 'ANDHRA PRADESH - 1 KV & ANDHRA PRADESH - 2 V', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 49],
                ['insurer_remarks' => '5-10 Years', 'policy_type' => 'Third Party', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'TELANGANA - 2 AKKWWN DECLINE', 'points' => 53],
                ['insurer_remarks' => '5-10 Years', 'policy_type' => 'Third Party', 'location' => 'TELANGANA - 3 R', 'remarks_additional' => 'TELANGANA - 2 AKKWWN DECLINE', 'points' => 18],
                ['insurer_remarks' => 'Above 10 Years', 'policy_type' => 'Third Party', 'location' => 'ANDHRA PRADESH - 3 KNO', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 45],
                ['insurer_remarks' => 'Above 10 Years', 'policy_type' => 'Third Party', 'location' => 'ANDHRA PRADESH - 1 KV & ANDHRA PRADESH - 2 V', 'remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE', 'points' => 46],
                ['insurer_remarks' => 'Above 10 Years', 'policy_type' => 'Third Party', 'location' => 'TELANGANA - 1 H', 'remarks_additional' => 'TELANGANA - 2 AKKWWN DECLINE', 'points' => 50],
                ['insurer_remarks' => 'Above 10 Years', 'policy_type' => 'Third Party', 'location' => 'TELANGANA - 3 R', 'remarks_additional' => 'TELANGANA - 2 AKKWWN DECLINE', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SHRIRAM - GCW - Comprehensive & Third Party
        $insurer = 'SHRIRAM';
        $segment = 'GCW';

        foreach (
            [
                ['insurer_remarks' => 'Upto 2000 GVW', 'location' => 'Andhra Pradesh (AP-27 RTO Code Decline)', 'remarks_additional' => 'Upto 15 Years & Upto 20 Years for STP - Except Bolero Model', 'points' => 48],
                ['insurer_remarks' => '2001-2800 GVW', 'location' => 'Andhra Pradesh (AP-27 RTO Code Decline)', 'remarks_additional' => 'Upto 15 Years & Upto 20 Years for STP - Except Bolero Model', 'points' => 44],
                ['insurer_remarks' => 'Upto 2800 GVW', 'location' => 'Andhra Pradesh (AP-27 RTO Code Decline)', 'remarks_additional' => '5 to 10 years - Bolero Model only', 'points' => 41],
                ['insurer_remarks' => 'Upto 3500 GVW', 'location' => 'Telangana', 'remarks_additional' => 'For Comp Upto 15 Years & Third Party Upto 20 Years', 'points' => 44],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => 'Comprehensive & Third Party',
            ], $policy);
        }

        // FUTURE - GCW - Comprehensive & Third Party
        $insurer = 'FUTURE';
        $segment = 'GCW';

        foreach (
            [
                ['insurer_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'remarks_additional' => '-', 'points' => 67],
                ['insurer_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Third Party', 'location' => 'Andhra Pradesh', 'remarks_additional' => '-', 'points' => 50],
                ['insurer_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Telangana', 'remarks_additional' => '-', 'points' => 53],
                ['insurer_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Third Party', 'location' => 'Telangana', 'remarks_additional' => '-', 'points' => 36],
                ['insurer_remarks' => '2501 - 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'remarks_additional' => '-', 'points' => 67],
                ['insurer_remarks' => '2501 - 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Andhra Pradesh', 'remarks_additional' => '-', 'points' => 50],
                ['insurer_remarks' => '2501 - 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Telangana', 'remarks_additional' => '-', 'points' => 41],
                ['insurer_remarks' => '2501 - 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Telangana', 'remarks_additional' => '-', 'points' => 24],
                ['insurer_remarks' => 'MAHINDRA BOLERO Only', 'policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'Mahindra Bolero Only', 'points' => 53],
                ['insurer_remarks' => 'MAHINDRA BOLERO Only', 'policy_type' => 'Third Party', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'Mahindra Bolero Only', 'points' => 36],
                ['insurer_remarks' => 'MAHINDRA BOLERO Only', 'policy_type' => 'Comprehensive', 'location' => 'Telangana', 'remarks_additional' => 'Mahindra Bolero Only', 'points' => 39],
                ['insurer_remarks' => 'MAHINDRA BOLERO Only', 'policy_type' => 'Third Party', 'location' => 'Telangana', 'remarks_additional' => 'Mahindra Bolero Only', 'points' => 22],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // BAJAJ - GCW - Comprehensive & Third Party
        $insurer = 'BAJAJ';
        $segment = 'GCW';

        foreach (
            [
                ['insurer_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'AP', 'remarks_additional' => 'Decline Location - Chittor & Khammam', 'points' => 31],
                ['insurer_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'TS, Hyderabad', 'remarks_additional' => 'Decline Location - Medak', 'points' => 41],
                ['insurer_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'points' => 53],
                ['insurer_remarks' => '2501 - 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Hyderabad', 'remarks_additional' => 'Excluding East Godavari & Ananthpur, vizainagaram and mahbubnagar', 'points' => 31],
                ['insurer_remarks' => '2501 - 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'AP', 'remarks_additional' => 'Max 28% PO on net- All BOLERO and MAX PICK UP models', 'points' => 46],
                ['insurer_remarks' => '2501 - 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'TS, Hyderabad', 'remarks_additional' => 'Max 28% PO on net- All BOLERO and MAX PICK UP models', 'points' => 44],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // CHOLA - GCW - Comprehensive & Third Party
        $insurer = 'CHOLA';
        $segment = 'GCW';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Allowed Makes Tata, Maruti, Mahindra Only Allowed Models Ace, Super Ace, Yodha, Xenon, Magic, Intra Super Carry, Mahindra Jeeto, Tractor, Supro Only', 'points' => 43],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Allowed Models Ace, Super Ace, Yodha, Xenon, Magic, Intra Super Carry, Mahindra Jeeto, Tractor, Supro Only', 'points' => 38],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Other Makes & Models - Same points also applicable for Electric vehicle', 'points' => 27],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Other Makes & Models - Same points also applicable for Electric vehicle', 'points' => 18],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 3500 GVW Without CPA - Less 1.5%',
                'location' => 'All RTOs',
            ], $policy);
        }

        $insurer = 'SBI';
        $segment = 'GCW';

        // SBI - 2000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Makes - Except EV - Only New', 'points' => 56],
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'All Makes - Except EV - Only New', 'points' => 56],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Makes - Except EV - Only Old', 'points' => 60],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'SBI - 2000 GVW',
                'location' => 'All RTOs. Declined RTOs - AP 02,03,04,21,26,27'
            ], $policy);
        }

        // SBI - 2001-2500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Tata & Mahindra Supro Makes Only - Except EV - Only New', 'points' => 56],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Tata & Mahindra Supro Makes Only - Except EV - Only Old', 'points' => 60],
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Other Than Tata Makes - Except EV - Only New', 'points' => 45],
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Other Than Tata Makes - Except EV - Only Old', 'points' => 47],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '2001-2500 GVW',
                'location' => 'All RTOs - Declined RTOs - AP 02,03,04,21,26,27'
            ], $policy);
        }

        // ROYAL - Upto 2300 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 53, 'location' => 'Hyderabad'],
                ['policy_type' => 'Comprehensive', 'points' => 52, 'location' => 'Rest of All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => 'ROYAL',
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2300 GVW',
            ], $policy);
        }

        // ROYAL - 2301 - 3500 GVW - Comprehensive
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 11, 'location' => 'Chittoor'],
                ['policy_type' => 'Comprehensive', 'points' => 20, 'location' => 'Rest of AP'],
                ['policy_type' => 'Comprehensive',  'points' => 24, 'location' => 'Medak & Guntur'],
                ['policy_type' => 'Comprehensive',  'points' => 28, 'location' => 'East Godavari, Ongole, Hyderabad'],
                ['policy_type' => 'Comprehensive',  'points' => 32, 'location' => 'Vishakhapatnam, West Godavari, Nellore'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => 'ROYAL',
                'segment' => $segment,
                'insurer_remarks' => '2301 - 3500 GVW',
                'remarks_additional' => 'Nizamabad, Rest of TS, Mehbubnagar, Anantapur, kadapa Excluding',
            ], $policy);
        }

        // ROYAL - Upto 2300 GVW - Third Party
        foreach (
            [
                ['policy_type' => 'Third Party',  'points' => 28, 'location' => 'Anantapur'],
                ['policy_type' => 'Third Party',  'points' => 29, 'location' => 'kadapa & Mahbubnagar'],
                ['policy_type' => 'Third Party',  'points' => 31, 'location' => 'Nizamabad'],
                ['policy_type' => 'Third Party',  'points' => 32, 'location' => 'Rest of TS'],
                ['policy_type' => 'Third Party', 'points' => 35, 'location' => 'Chittoor'],
                ['policy_type' => 'Third Party', 'points' => 47, 'location' => 'Rest of AP, Guntur & Medak'],
                ['policy_type' => 'Third Party', 'points' => 51, 'location' => 'East Godavari, Vishakhapatnam, West Godavari, Ongole'],
                ['policy_type' => 'Third Party', 'points' => 53, 'location' => 'Hyderabad'],
                ['policy_type' => 'Third Party', 'points' => 55, 'location' => 'Nellore'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => 'ROYAL',
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2300 GVW',
            ], $policy);
        }

        // ROYAL - 2301 - 3500 GVW - Third Party
        foreach (
            [
                ['policy_type' => 'Third Party', 'points' => 12, 'location' => 'Rest of TS'],
                ['policy_type' => 'Third Party', 'points' => 19, 'location' => 'Chittoor'],
                ['policy_type' => 'Third Party', 'points' => 28, 'location' => 'Rest of AP'],
                ['policy_type' => 'Third Party', 'points' => 31, 'location' => 'Guntur, Medak, Ongole, East Godavari, Nellore, West Godavari & Hyderabad, Vishakhapatnam'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => 'ROYAL',
                'segment' => $segment,
                'insurer_remarks' => '2301 - 3500 GVW',
                'remarks_additional' => 'Mahbubnagar, Anantapur, kadapa, Nizamabad Excluding',
            ], $policy);
        }

        $insurer = 'DIGIT';
        $segment = 'GCW';

        // DIGIT - Upto 1600 GVW - REF RTOs DECLINE
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Upto 5 Years Only', 'points' => 46, 'location' => 'Hyderabad'],
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Above 5 Years Only', 'points' => 50, 'location' => 'Hyderabad'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 1600 GVW - REF RTOs DECLINE',
            ], $policy);
        }

        // DIGIT - 1601 - 2500 GVW - REF RTOs DECLINE
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'points' => 46, 'location' => 'Hyderabad'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '1601 - 2500 GVW - REF RTOs DECLINE',
            ], $policy);
        }

        // DIGIT - Upto 2500 GVW - REF RTOs DECLINE
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Decline RTOs :- AP 01,02,03,15,20,21,22,24,26,36', 'points' => 46, 'location' => 'Bad Vizag/Vijaywada'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Decline RTOs :- AP 01,02,03,15,20,21,22,24,26,36', 'points' => 47, 'location' => 'Bad Vizag/Vijaywada'],
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Decline RTOs :- AP 01,02,03,15,20,21,22,24,25,36, Upto 2 Years Only', 'points' => 46, 'location' => 'Good Vizag/Vijaywada'],
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Decline RTOs :- AP 01,02,03,15,20,21,22,24,25,36, Above 2 Years Only', 'points' => 55, 'location' => 'Good Vizag/Vijaywada'],
                ['policy_type' => 'Comprehensive & Third Party', 'points' => 27, 'location' => 'Hyderabad'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2500 GVW - REF RTOs DECLINE',
            ], $policy);
        }

        // DIGIT - 2501 - 3500 GVW - REF RTOs DECLINE
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'points' => 27, 'location' => 'Hyderabad'],
                ['policy_type' => 'Comprehensive & Third Party', 'points' => 18, 'location' => 'Bad Vizag/Vijaywada'],
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Tata Makes Only', 'points' => 46, 'location' => 'Good Vizag/Vijaywada'],
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Other Than Tata Makes', 'points' => 18, 'location' => 'Good Vizag/Vijaywada'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '2501 - 3500 GVW - REF RTOs DECLINE',
            ], $policy);
        }

        $insurer = 'RELIANCE';

        // RELIANCE - Upto 2500 GVW
        foreach (
            [
                ['remarks_additional' => 'Mahindra- Jeeto, Supro, Maxximo Makes Only. Telangana RTOs Decline', 'points' => 30, 'location' => 'Andhra Pradesh'],
                ['remarks_additional' => 'Mahindra- Jeeto, Supro, Maxximo Makes Only. Telangana RTOs Decline', 'points' => 43, 'location' => 'Hyderabad'],
                ['remarks_additional' => 'TATA & Maruti Makes Only. Telangana RTOs Decline', 'points' => 35, 'location' => 'Andhra Pradesh'],
                ['remarks_additional' => 'TATA & Maruti Makes Only. Telangana RTOs Decline', 'points' => 48, 'location' => 'Hyderabad'],
                ['remarks_additional' => 'Other Makes. Telangana RTOs Decline', 'points' => 25, 'location' => 'Andhra Pradesh'],
                ['remarks_additional' => 'Other Makes. Telangana RTOs Decline', 'points' => 38, 'location' => 'Hyderabad'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2500 GVW',
                'policy_type' => 'Comprehensive & Third Party',
            ], $policy);
        }

        $insurer = 'MAGMA';

        // MAGMA - Upto 2500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 53, 'location' => 'AP & TL1'],
                ['policy_type' => 'Comprehensive', 'points' => 52, 'location' => 'TL2'],
                ['policy_type' => 'Third Party', 'points' => 26, 'location' => 'AP, TL1, TL2'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2500 GVW',
            ], $policy);
        }

        // MAGMA - 2501 - 2800 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 26, 'location' => 'AP'],
                ['policy_type' => 'Comprehensive', 'points' => 21, 'location' => 'TL1 & TL2'],
                ['policy_type' => 'Third Party', 'points' => 24, 'location' => 'AP & TL1'],
                ['policy_type' => 'Third Party', 'points' => 33, 'location' => 'TL2'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '2501 - 2800 GVW',
            ], $policy);
        }

        // MAGMA - 2801 - 3500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 21, 'location' => 'AP'],
                ['policy_type' => 'Comprehensive', 'points' => 31, 'location' => 'TL1 & TL2'],
                ['policy_type' => 'Third Party', 'points' => 8, 'location' => 'AP'],
                ['policy_type' => 'Third Party', 'points' => 24, 'location' => 'TL1'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '2801 - 3500 GVW',
            ], $policy);
        }

        $insurer = 'LIBERTY';
        $segment = 'GCW';

        // LIBERTY - Upto 2500 GVW - Comprehensive
        foreach (
            [
                ['remarks_additional' => 'Upto 1 Year, ANDHRA PRADESH - 4 R, TELANGANA - 2 AKKMWN & TELANGANA - 3 R DECLINE', 'points' => 32, 'location' => 'ANDHRA PRADESH - 1 KV & ANDHRA PRADESH - 2 V'],
                ['remarks_additional' => 'Upto 1 Year, ANDHRA PRADESH - 4 R, TELANGANA - 2 AKKMWN & TELANGANA - 3 R DECLINE', 'points' => 29, 'location' => 'ANDHRA PRADESH - 3 KNO'],
                ['remarks_additional' => 'Upto 1 Year, ANDHRA PRADESH - 4 R, TELANGANA - 2 AKKMWN & TELANGANA - 3 R DECLINE', 'points' => 27, 'location' => 'TELANGANA - 1 H'],
                ['remarks_additional' => '1-5 Years & Above 10 Years, ANDHRA PRADESH - 4 R, TELANGANA - 2 AKKMWN & TELANGANA - 3 R DECLINE', 'points' => 56, 'location' => 'ANDHRA PRADESH - 1KV, ANDHRA PRADESH - 2V & ANDHRA PRADESH - 3 KNO & TELANGANA - 1 H'],
                ['remarks_additional' => '6-10 Years, ANDHRA PRADESH - 4 R, TELANGANA - 2 AKKMWN & TELANGANA - 3 R DECLINE', 'points' => 58, 'location' => 'ANDHRA PRADESH - 1 KV & ANDHRA PRADESH - 2 V'],
                ['remarks_additional' => '6-10 Years, ANDHRA PRADESH - 4 R, TELANGANA - 2 AKKMWN & TELANGANA - 3 R DECLINE', 'points' => 56, 'location' => 'ANDHRA PRADESH - 3 KNO & TELANGANA - 1 H'],
                ['remarks_additional' => 'TELANGANA - 2 AKKMWN & TELANGANA - 3 R DECLINE', 'points' => 27, 'location' => 'TELANGANA - 1 H'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2500 GVW',
                'policy_type' => 'Comprehensive',
            ], $policy);
        }

        // LIBERTY - Upto 2500 GVW - Third Party (First Group)
        foreach (
            [
                ['remarks_additional' => 'ANDHRA PRADESH - 4 R DECLINE, NEW ONLY', 'points' => 32, 'location' => 'ANDHRA PRADESH - 1 KV, ANDHRA PRADESH - 2 V & ANDHRA PRADESH - 3 KNO'],
                ['remarks_additional' => 'TELANGANA - 2 AKKMWN DECLINE, 1-5 YEARS ONLY', 'points' => 32, 'location' => 'ANDHRA PRADESH - 4 R'],
                ['remarks_additional' => 'TELANGANA - 2 AKKMWN DECLINE, 1-5 YEARS ONLY', 'points' => 57, 'location' => 'ANDHRA PRADESH - 1 KV'],
                ['remarks_additional' => 'TELANGANA - 2 AKKMWN DECLINE, 1-5 YEARS ONLY', 'points' => 58, 'location' => 'ANDHRA PRADESH - 3 KNO'],
                ['remarks_additional' => 'TELANGANA - 2 AKKMWN DECLINE, 1-5 YEARS ONLY', 'points' => 60, 'location' => 'ANDHRA PRADESH - 2V & TELANGANA - 1H'],
                ['remarks_additional' => 'TELANGANA - 2 AKKMWN DECLINE, 1-5 YEARS ONLY', 'points' => 34, 'location' => 'TELANGANA - 3 R'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2500 GVW',
                'policy_type' => 'Third Party',
            ], $policy);
        }

        // LIBERTY - Upto 2500 GVW - Third Party (Second Group - 5-10 Years)
        foreach (
            [
                ['points' => 39, 'location' => 'ANDHRA PRADESH - 4 R'],
                ['points' => 57, 'location' => 'ANDHRA PRADESH - 1 KV'],
                ['points' => 58, 'location' => 'ANDHRA PRADESH - 3 KNO'],
                ['points' => 60, 'location' => 'ANDHRA PRADESH - 2V & TELANGANA - 1H'],
                ['points' => 40, 'location' => 'TELANGANA - 3 R'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2500 GVW',
                'policy_type' => 'Third Party',
                'remarks_additional' => 'TELANGANA - 2 AKKMWN DECLINE, 5-10 YEARS ONLY',
            ], $policy);
        }

        // LIBERTY - Upto 2500 GVW - Third Party (Third Group - Above 10 Years)
        foreach (
            [
                ['points' => 34, 'location' => 'ANDHRA PRADESH - 4 R'],
                ['points' => 57, 'location' => 'ANDHRA PRADESH - 1 KV'],
                ['points' => 60, 'location' => 'ANDHRA PRADESH - 2V & TELANGANA - 1H'],
                ['points' => 58, 'location' => 'ANDHRA PRADESH - 3 KNO'],
                ['points' => 36, 'location' => 'TELANGANA - 3 R'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2500 GVW',
                'policy_type' => 'Third Party',
                'remarks_additional' => 'TELANGANA - 2 AKKMWN DECLINE, ABOVE 10 YEARS ONLY',
            ], $policy);
        }

        $insurer = 'HDFC';

        // HDFC - Upto 2500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Ages', 'points' => 46, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2500 GVW',
            ], $policy);
        }

        // HDFC - 2500-3500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 4 Years Only', 'points' => 31, 'location' => 'Andhra Pradesh'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Ages', 'points' => 36, 'location' => 'Telangana'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '2500-3500 GVW',
            ], $policy);
        }

        // HDFC - Upto 2500 GVW - Third Party
        foreach (
            [
                ['policy_type' => 'Third Party', 'remarks_additional' => 'All Ages', 'points' => 50, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2500 GVW',
            ], $policy);
        }

        // HDFC - 2500-3500 GVW - Third Party
        foreach (
            [
                ['policy_type' => 'Third Party', 'remarks_additional' => 'All Ages', 'points' => 41, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '2500-3500 GVW',
            ], $policy);
        }

        $insurer = 'ZUNO';

        // ZUNO - Upto 2500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Mahindra, Tata, Maruti Makes Only. Mahindra Bolero Camper decline', 'points' => 50, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'ZUNO - Upto 2500 GVW',
            ], $policy);
        }

        // ZUNO - 2501-3500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Mahindra, Tata, Maruti Makes Only. Mahindra Bolero Camper decline', 'points' => 42, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'ZUNO - 2501-3500 GVW',
            ], $policy);
        }

        $insurer = 'SOMPO';

        // UNIVERSAL SOMPO - Upto 3500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'points' => 31, 'location' => 'AP & TS'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'UNIVERSAL SOMPO - Upto 3500 GVW',
            ], $policy);
        }

        $insurer = 'ICICI';

        // ICICI - Upto 2450 GVW - New Vehicle Only
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 27, 'location' => 'Hyderabad'],
                ['policy_type' => 'Comprehensive', 'points' => 46, 'location' => 'Vijaywada'],
                ['policy_type' => 'Comprehensive', 'points' => 31, 'location' => 'Vishakapatnam'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2450 GVW - New Vehicle Only',
                'remarks_additional' => 'Rest of AP & TS Decline',
            ], $policy);
        }

        // ICICI - Upto 2450 GVW - Old Vehicle Only
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 46, 'location' => 'Vishakapatnam, Rest of AP & Hyderabad'],
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Old', 'points' => 18, 'location' => 'Vijaywada'],
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Old', 'points' => 41, 'location' => 'Rest of Telangana'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2450 GVW - Old Vehicle Only',
            ], $policy);
        }

        // ICICI - 2451 - 3500 GVW - NEW Vehicle Only
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'New Only', 'points' => 22, 'location' => 'Vijaywada'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '2451 - 3500 GVW - NEW Vehicle Only',
            ], $policy);
        }

        // ICICI - 2451 - 3500 GVW - Old Vehicle Only
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Old', 'points' => 18, 'location' => 'Vijaywada'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '2451 - 3500 GVW - Old Vehicle Only',
            ], $policy);
        }

        $segment = 'GCW';
        $segment_remarks = '3501 - 7500 GVW';

        $insurer = 'BAJAJ';

        // BAJAJ
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Excluding Hyderabad & Telangana', 'points' => 20, 'location' => 'Andhra Pradesh'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Excluding Hyderabad & Telangana', 'points' => 20, 'location' => 'Andhra Pradesh'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'segment_remarks' => $segment_remarks,
            ], $policy);
        }

        $insurer = 'MAGMA';

        // MAGMA - 3501 - 7500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => '1+3, Only HONDA & HYUNDAI & KIA manufacture only', 'points' => 14, 'location' => 'TL1'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '3501 - 7500 GVW',
            ], $policy);
        }

        $insurer = 'ICICI';

        // ICICI - 3501-7500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Andhra Pradesh & Hyderabad Decline', 'points' => 18, 'location' => 'Vijaywada'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Andhra Pradesh & Hyderabad Decline', 'points' => 22, 'location' => 'Telangana & Visakhapatnam'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '3501-7500 GVW',
            ], $policy);
        }

        $insurer = 'SBI';

        // SBI - 3501-5000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Excluding Eicher & Mahindra', 'points' => 22, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '3501-5000 GVW',
            ], $policy);
        }

        // SBI - 5001- 7500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Allowed RTOs - TS All RTOs, AP - 05,06,07,16,17,30,31,32,33,35, Excluding Eicher s Mahindra', 'points' => 20, 'location' => 'AP & TS See Allowed RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '5001- 7500 GVW',
            ], $policy);
        }

        $insurer = 'FUTURE';

        // FUTURE
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'With NCB - ODD Upto 85% Allowed, With NCB ( ODD 85% And Above Points = 1.70 X )', 'points' => 39, 'location' => 'Andhra Pradesh'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'With NCB - ODD Upto 85% Allowed, With NCB ( ODD 85% And Above Points = 1.70 X )', 'points' => 24, 'location' => 'Andhra Pradesh'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'segment_remarks' => $segment_remarks,
            ], $policy);
        }

        $insurer = 'SOMPO';

        // UNIVERSAL SOMPO - 3501-7500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'points' => 22, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'SOMPO - 3501-7500 GVW',
            ], $policy);
        }

        $insurer = 'CHOLA';

        // CHOLA
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Without CPA - Less 1.5%, Excluding Electric', 'points' => 15, 'location' => 'All RTOs'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Without CPA - Less 1.5%, Excluding Electric', 'points' => 8, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'segment_remarks' => $segment_remarks,
            ], $policy);
        }

        // ROYAL - Upto 3500 GVW - Electric
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Electric', 'points' => 45, 'location' => 'Andhra Pradesh'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Electric', 'points' => 39, 'location' => 'Telangana'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Electric', 'points' => 51, 'location' => 'Andhra Pradesh'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Electric', 'points' => 47, 'location' => 'Telangana'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => 'ROYAL',
                'segment' => $segment,
                'insurer_remarks' => 'Upto 3500 GVW - Electric',
            ], $policy);
        }

        $segment = 'GCW';
        $segment_remarks = '3501 - 7500 GVW';

        $insurer = 'TATA';

        // TATA - Upto 2500 GVW
        foreach (
            [
                ['points' => 48, 'location' => 'Hyderabad'],
                ['points' => 55, 'location' => 'Rest of AP'],
                ['points' => 49, 'location' => 'Rest of TS, Vijaywada & Vishakapatnam'],
                ['points' => 39, 'location' => 'Hyderabad'],
                ['points' => 46, 'location' => 'Vijyawada & Vishakhapattnam'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Upto 2500 GVW',
                'policy_type' => 'Comprehensive & Third Party',
                'remarks_additional' => 'Comp - All Ages & TP Above 1 Years',
            ], $policy);
        }

        // TATA - 2501-3500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'points' => 39, 'remarks_additional' => 'Comp - All Ages & TP Above 1 Years', 'location' => 'Hyderabad'],
                ['policy_type' => 'Comprehensive & Third Party', 'points' => 46, 'remarks_additional' => 'Comp - All Ages & TP Above 1 Years', 'location' => 'Vijyawada & Vishakhapattnam'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Ages', 'points' => 31, 'location' => 'Rest of Telangana & Rest of Andhra Pradesh'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 6 Years', 'points' => 31, 'location' => 'Rest of Telangana & Rest of Andhra Pradesh'],
                ['policy_type' => 'Third Party', 'remarks_additional' => '1 to 6 Years', 'points' => 18, 'location' => 'Rest of Andhra Pradesh'],
                ['policy_type' => 'Third Party', 'remarks_additional' => '1 to 6 Years', 'points' => 30, 'location' => 'Rest of Telangana'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '2501-3500 GVW',
            ], $policy);
        }

        // TATA - 3501-7500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Ages', 'points' => 27, 'location' => 'Rest of Andhra Pradesh'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 6 Years', 'points' => 22, 'location' => 'Rest of Telangana'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 1 Years', 'points' => 24, 'location' => 'Rest of Andhra Pradesh'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 1 Years', 'points' => 22, 'location' => 'Rest of Telangana'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Age', 'points' => 27, 'location' => 'Hyderabad'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 1 Years', 'points' => 33, 'location' => 'Hyderabad'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Age', 'points' => 27, 'location' => 'Vijyawada'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 1 Years', 'points' => 36, 'location' => 'Vijyawada'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Age', 'points' => 26, 'location' => 'Vishakhapattnam'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 1 Years', 'points' => 36, 'location' => 'Vishakhapattnam'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '3501-7500 GVW',
            ], $policy);
        }

        $insurer = 'ROYAL';

        // ROYAL - 3501 - 7500 GVW - Comprehensive
        foreach (
            [
                ['points' => 13, 'location' => 'Medak, Ongole, Guntur'],
                ['points' => 18, 'location' => 'East Godavari'],
                ['points' => 17, 'location' => 'Hyderabad'],
                ['points' => 22, 'location' => 'Visakhapatnam, West Godavari, Nellore'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '3501 - 7500 GVW',
                'policy_type' => 'Comprehensive',
                'remarks_additional' => 'Nizamabad, Rest of TS, Mehbubnagar, Anantapur, Chittoor Decline kadapa & Rest of AP Excluding',
            ], $policy);
        }

        // ROYAL - 3501 - 7500 GVW - Third Party
        foreach (
            [
                ['points' => 11, 'location' => 'Chittoor'],
                ['points' => 23, 'location' => 'Rest of AP'],
                ['points' => 26, 'location' => 'Guntur'],
                ['points' => 30, 'location' => 'Medak'],
                ['points' => 31, 'location' => 'Ongole'],
                ['points' => 32, 'location' => 'East Godavari'],
                ['points' => 36, 'location' => 'Hyderabad'],
                ['points' => 34, 'location' => 'Visakhapatnam, West Godavari, Nellore'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'policy_type' => 'Third Party',
                'insurer_remarks' => '3501 - 7500 GVW',
                'remarks_additional' => 'Nizamabad, Rest of TS, Mehbubnagar, Anantapur, kadapa Decline',
            ], $policy);
        }

        $insurer = 'DIGIT';

        // DIGIT - Comprehensive
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 5 Years', 'points' => 18, 'location' => 'Good Vizag/Vijaywada'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 5 Years', 'points' => 15, 'location' => 'Hyderabad'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 5 Years', 'points' => 16, 'location' => 'Bad Vizag/Vijaywada'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Age 2 - 5 Years Only', 'points' => 17, 'location' => 'Hyderabad'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '',
            ], $policy);
        }

        // DIGIT - Third Party
        foreach (
            [
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Upto 5 Years', 'points' => 10, 'location' => 'Good & Bad Vizag/Vijaywada'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 5 Years', 'points' => 22, 'location' => 'Good Vizag/Vijaywada'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 5 Years', 'points' => 19, 'location' => 'Hyderabad, Bad Vizag/Vijaywada'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        $segment = 'GCW';

        $insurer = 'SHRIRAM';

        // SHRIRAM - 12001 - 42500 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Upto 15 Years Comp & Upto 25 Years for STP', 'points' => 22, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001 - 42500 GVW',
            ], $policy);
        }

        // SHRIRAM - 42501 - 50000 GVW
        foreach (
            [
                ['points' => 13, 'location' => 'Andhra Pradesh'],
                ['points' => 10, 'location' => 'Telangana'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '42501 - 50000 GVW',
                'policy_type' => 'Comprehensive & Third Party',
                'remarks_additional' => 'Upto 15 Years Comp & Upto 25 Years for STP',
            ], $policy);
        }

        // SHRIRAM - Above 50001 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Upto 15 Years Comp & Upto 25 Years for STP', 'points' => 10, 'location' => 'Andhra Pradesh'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Above 50001 GVW',
            ], $policy);
        }

        $insurer = 'FUTURE';

        // FUTURE - 7501-12000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 30, 'location' => 'Telangana'],
                ['policy_type' => 'Third Party', 'points' => 13, 'location' => 'Telangana'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '7501-12000 GVW',
            ], $policy);
        }

        // FUTURE - 12001-20000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 39, 'location' => 'Andhra Pradesh'],
                ['policy_type' => 'Third Party', 'points' => 22, 'location' => 'Andhra Pradesh'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001-20000 GVW',
            ], $policy);
        }

        // FUTURE - 20001 - 40000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 36, 'location' => 'Telangana'],
                ['policy_type' => 'Third Party', 'points' => 19, 'location' => 'Telangana'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001 - 40000 GVW',
            ], $policy);
        }

        $insurer = 'BAJAJ';

        // BAJAJ - 7501 - 15000 GVW
        foreach (
            [
                ['policy_type' => 'Third Party', 'points' => 24, 'location' => 'Andhra Pradesh'],
                ['policy_type' => 'Third Party', 'points' => 35, 'location' => 'Guntur'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '7501 - 15000 GVW',
            ], $policy);
        }

        // BAJAJ - 15001 - 20000 GVW
        foreach (
            [
                ['policy_type' => 'Third Party', 'points' => 28, 'location' => 'Andhra Pradesh'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '15001 - 20000 GVW',
            ], $policy);
        }

        $insurer = 'RELIANCE';

        // RELIANCE - 12001 - 20000 GVW
        foreach (
            [
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Upto 5 Yr', 'points' => 18, 'location' => 'Hyderabad'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 5 Yr', 'points' => 19, 'location' => 'Hyderabad'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001 - 20000 GVW',
            ], $policy);
        }

        // RELIANCE - 20001-40000 GVW
        foreach (
            [
                ['policy_type' => 'Third Party', 'remarks_additional' => 'All Ages', 'points' => 18, 'location' => 'Hyderabad'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001-40000 GVW',
            ], $policy);
        }

        $insurer = 'CHOLA';

        // CHOLA - 7501 - 16000 GVW
        foreach (
            [
                ['insurer_remarks' => '7501 - 16000 GVW', 'points' => 19],
                ['insurer_remarks' => '16000 - 20000 GVW', 'points' => 15],
                ['insurer_remarks' => '20001 - 40000 GVW', 'points' => 27],
                ['insurer_remarks' => '40001 - 43000 GVW', 'points' => 24],
                ['insurer_remarks' => '43001 - 47500 GVW', 'points' => 18],
                ['insurer_remarks' => '47500 - 56000 GVW', 'points' => 13],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '7501 - 16000 GVW',
                'remarks_additional' => 'Without CPA - Less 1.5%, Excluding Electric',
                'location' => 'All RTOs',
                'policy_type' => 'Comprehensive',
            ], $policy);
        }

        // CHOLA - 20001 - 43000 GVW
        foreach (
            [
                ['policy_type' => 'Third Party', 'points' => 18, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001 - 43000 GVW',
                'remarks_additional' => 'Without CPA - Less 1.5%, Excluding Electric',
            ], $policy);
        }

        $insurer = 'ICICI';

        // ICICI - 7501 - 12000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Except Bharat benz, Volvo, Man & Scania pan India, Hyderabad & Vishakhapatnam Decline', 'points' => 31, 'location' => 'Rest Of AP'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Except Bharat benz, Volvo, Man & Scania pan India, Hyderabad & Vishakhapatnam Decline', 'points' => 27, 'location' => 'Rest of Telangana'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Except Bharat benz, Volvo, Man & Scania pan India, Hyderabad & Vishakhapatnam Decline', 'points' => 13, 'location' => 'Vijaywada'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 5 Years Only - TATA & AL Makes Only', 'points' => 41, 'location' => 'Hyderabad'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'I7501 - 12000 GVW',
            ], $policy);
        }

        // ICICI - 12001 - 20000 GVW - Tipper
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 13, 'location' => 'Vishakhapatnam'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001 - 20000 GVW - Tipper',
            ], $policy);
        }

        // ICICI - 20001 -40000 GVW - Tipper
        foreach (
            [
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 5 Years Only - TATA & AL Makes Only', 'points' => 27, 'location' => 'Hyderabad'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001 -40000 GVW - Tipper',
            ], $policy);
        }

        $segment = 'GCW';
        $insurer = 'ROYAL';

        // ROYAL - 7501 - 12000 GVW - Comprehensive
        foreach (
            [
                ['points' => 15, 'location' => 'Nizamabad, Medak, Ongole, Guntur'],
                ['points' => 18, 'location' => 'Hyderabad'],
                ['points' => 24, 'location' => 'Visakhapatnam, East & West Godavari, Nellore'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '7501 - 12000 GVW',
                'policy_type' => 'Comprehensive',
                'remarks_additional' => 'Mehbubnagar, Chittoor Decline, Rest of AP, Rest of TS, Anantapur, Kadapa Excluding',
            ], $policy);
        }

        // ROYAL - 12001 - 20000 GVW - Comprehensive
        foreach (
            [
                ['remarks_additional' => 'Nil Dep Only, Guntur, Kadapa, Ongole, West Godavari, Rest of AP, Medak, Rest of TS Excluding', 'points' => 15, 'location' => 'Visakhapatnam, East Godavari'],
                ['remarks_additional' => 'Nil Dep Only, Guntur, Kadapa, Ongole, West Godavari, Rest of AP, Medak, Rest of TS Excluding', 'points' => 12, 'location' => 'Chittoor & Hyderabad'],
                ['remarks_additional' => 'Nil Dep Only, Guntur, Kadapa, Ongole, West Godavari, Rest of AP, Medak, Rest of TS Excluding', 'points' => 10, 'location' => 'Anantapur, Nellore, Nizamabad, Mehbubnagar'],
                ['remarks_additional' => 'Only TATA & AL Makes - Non Nil Dep. Excluding Rest of All RTOs', 'points' => 15, 'location' => 'Visakhapatnam, East Godavari'],
                ['remarks_additional' => 'Only TATA & AL Makes - Non Nil Dep. Excluding Rest of All RTOs', 'points' => 28, 'location' => 'Hyderabad'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001 - 20000 GVW',
                'policy_type' => 'Comprehensive',
            ], $policy);
        }

        // ROYAL - 20001 - 40000 GVW - Comprehensive
        foreach (
            [
                ['remarks_additional' => 'Excluding Rest of All RTOs', 'points' => 9, 'location' => 'Anantapur, Chittoor, Guntur, Medak, Hyderabad'],
                ['remarks_additional' => 'Nil Dep Only', 'points' => 12, 'location' => 'Kadapa, Ongole, West Godavari, Rest of AP, Mehbubnagar, Rest of TS'],
                ['remarks_additional' => 'Nil Dep Only', 'points' => 17, 'location' => 'East Godavari, Nellore, Visakhapatnam & Nizamabad'],
                ['remarks_additional' => 'TATA and AL Makes Only Non Nil Dep, Excluding Anantapur s Medak', 'points' => 12, 'location' => 'Chittoor, Mehbubnagar, Rest of TS'],
                ['remarks_additional' => 'TATA and AL Makes Only Non Nil Dep, Excluding Anantapur s Medak', 'points' => 13, 'location' => 'Guntur'],
                ['remarks_additional' => 'TATA and AL Makes Only Non Nil Dep, Excluding Anantapur s Medak', 'points' => 14, 'location' => 'West Godavari'],
                ['remarks_additional' => 'TATA and AL Makes Only Non Nil Dep, Excluding Anantapur s Medak', 'points' => 15, 'location' => 'Rest of AP'],
                ['remarks_additional' => 'TATA and AL Makes Only Non Nil Dep, Excluding Anantapur s Medak', 'points' => 17, 'location' => 'Kadapa & Nizamabad'],
                ['remarks_additional' => 'TATA and AL Makes Only Non Nil Dep, Excluding Anantapur s Medak', 'points' => 21, 'location' => 'East Godavari, Nellore, Visakhapatnam & Ongole'],
                ['remarks_additional' => 'TATA and AL Makes Only Non Nil Dep, Excluding Anantapur s Medak', 'points' => 26, 'location' => 'Hyderabad'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001 - 40000 GVW',
                'policy_type' => 'Comprehensive',
            ], $policy);
        }

        // ROYAL - 7501 - 12000 GVW - Third Party
        foreach (
            [
                ['points' => 16, 'location' => 'Anantapura'],
                ['points' => 18, 'location' => 'Rest of AP'],
                ['points' => 17, 'location' => 'Rest of TS'],
                ['points' => 21, 'location' => 'Kadapa'],
                ['points' => 29, 'location' => 'Guntur, Ongole, Nizamabad'],
                ['points' => 30, 'location' => 'Medak'],
                ['points' => 36, 'location' => 'Hyderabad'],
                ['points' => 34, 'location' => 'Visakhapatnam, West Godavari, Nellore'],
                ['points' => 39, 'location' => 'East Godavari'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '7501 - 12000 GVW',
                'policy_type' => 'Third Party',
                'remarks_additional' => 'Excluding Chittoor & Mahbubnagar',
            ], $policy);
        }

        // ROYAL - 12001 -20000 GVW - Third Party
        foreach (
            [
                ['points' => 14, 'location' => 'Nellore'],
                ['points' => 16, 'location' => 'Guntur'],
                ['points' => 17, 'location' => 'West Godavari & Rest of AP'],
                ['points' => 18, 'location' => 'Ongole'],
                ['points' => 24, 'location' => 'Rest of TS'],
                ['points' => 32, 'location' => 'East Godavari, Medak, Nizamabad, Visakhapatnam & Mahbubnagar'],
                ['points' => 34, 'location' => 'Hyderabad'],

            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001 -20000 GVW',
                'policy_type' => 'Third Party',
                'remarks_additional' => 'Excluding Chittoor, Kadapa, Anantapura',
            ], $policy);
        }

        // ROYAL - 20000 - 40000 GVW - Third Party
        foreach (
            [
                ['points' => 19, 'location' => 'Medak'],
                ['points' => 24, 'location' => 'Guntur & Rest of TS'],
                ['points' => 31, 'location' => 'Rest of AP, Kadapa, Chittoor & West Godavari, Hyderabad & Mehbubnagar, Ongole, Visakhapatnam, East Godavari, Nellore, Nizamabad'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20000 - 40000 GVW',
                'policy_type' => 'Third Party',
                'remarks_additional' => 'Excluding Anantapur',
            ], $policy);
        }

        $segment = 'GCW';
        $insurer = 'DIGIT';

        // DIGIT - 7501 - 12000 GVW - Excluding Oil Tanker
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 5 Years', 'points' => 15, 'location' => 'Hyderabad'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 5 Years', 'points' => 18, 'location' => 'Good Vizag/Vijaywada'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Upto 5 Years', 'points' => 12, 'location' => 'Good & Bad Vizag/Vijaywada'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 5 Years', 'points' => 15, 'location' => 'Hyderabad'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 5 Years', 'points' => 23, 'location' => 'Good & Bad Vizag/Vijaywada'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '7501 - 12000 GVW - Excluding Oil Tanker',
            ], $policy);
        }

        // DIGIT - 7501 - 12000 GVW- Oil Tanker
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'points' => 17, 'location' => 'Hyderabad'],
                ['policy_type' => 'Comprehensive', 'points' => 24, 'location' => 'Good Vizag/Vijaywada'],
                ['policy_type' => 'Third Party', 'points' => 25, 'location' => 'Good Vizag/Vijaywada'],
                ['policy_type' => 'Comprehensive', 'points' => 11, 'location' => 'Bad Vizag/Vijaywada'],
                ['policy_type' => 'Third Party', 'points' => 25, 'location' => 'Bad Vizag/Vijaywada'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '7501 - 12000 GVW- Oil Tanker',
                'remarks_additional' => 'Above 5 Years',
            ], $policy);
        }

        // DIGIT - 12001 - 20000 GVW - Excluding Oil & Gas Tanker
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 5 Years. All excluding Volvo and Scania', 'points' => 13, 'location' => 'Hyderabad'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 5 Years. All excluding Volvo and Scania', 'points' => 15, 'location' => 'Hyderabad'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001 - 20000 GVW - Excluding Oil & Gas Tanker',
            ], $policy);
        }

        // DIGIT - 20001 - 40000 GVW - Age Above 5 Years Only Excluding Volvo & Scannia
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Included Port Trailer, Oil Tanker s Gas Tanker', 'points' => 27, 'location' => 'Good Vizag/Vijaywada'],
                ['policy_type' => 'Third Party', 'remarks_additional' => '(Decline RTOs :- AP - 02,03,20,25)', 'points' => 41, 'location' => '(Decline RTOs :- AP - 02,03,20,25)'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Other Than Tipper/Dumper - Excluding Oil & Gas Tanker', 'points' => 18, 'location' => 'Bad Vizag/Vijaywada'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Tipper/Dumper Only- Excluding Oil & Gas Tanker', 'points' => 27, 'location' => 'Bad Vizag/Vijaywada'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Other Than Tipper/Dumper - Excluding Oil & Gas Tanker', 'points' => 22, 'location' => '(Decline RTOs :- AP - 02,03,20,25)'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Tipper/Dumper Only- Excluding Oil & Gas Tanker', 'points' => 27, 'location' => '(Decline RTOs :- AP - 02,03,20,25)'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001 - 40000 GVW - Age Above 5 Years Only Excluding Volvo & Scannia',
            ], $policy);
        }

        // DIGIT - 12001 - 20000 GVW - Oil Tanker
        foreach (
            [
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 5 Years', 'points' => 13, 'location' => 'Hyderabad'],
                ['policy_type' => 'Comprehensive & Third Party', 'points' => 8, 'location' => 'Good Vizag/Vijaywada & Bad Vizag/Vijaywada'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001 - 20000 GVW - Oil Tanker',
            ], $policy);
        }

        // DIGIT - 12001 - 20000 GVW - Gas Tanker
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 13, 'location' => 'Hyderabad'],
                ['policy_type' => 'Third Party', 'points' => 13, 'location' => 'Hyderabad'],
                ['policy_type' => 'Comprehensive & Third Party', 'points' => 13, 'location' => 'Good Vizag/Vijaywada & Bad Vizag/Vijaywada'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001 - 20000 GVW - Gas Tanker',
                'remarks_additional' => 'Above 5 Years',
            ], $policy);
        }

        // DIGIT - 20000-40000 GVW - Port Trailer
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 18, 'location' => 'Bad Vizag/Vijaywada'],
                ['policy_type' => 'Third Party', 'points' => 22, 'location' => 'Bad Vizag/Vijaywada'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20000-40000 GVW - Port Trailer',
                'remarks_additional' => 'Above 5 Years',
            ], $policy);
        }

        // DIGIT - 20000-40000 GVW - Oil & Gas Tanker
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 20, 'location' => 'Bad Vizag/Vijaywada'],
                ['policy_type' => 'Third Party', 'points' => 24, 'location' => 'Bad Vizag/Vijaywada'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20000-40000 GVW - Oil & Gas Tanker',
            ], $policy);
        }

        // DIGIT - Above 40000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 5 Years. All excluding Volvo and Scania', 'points' => 8, 'location' => 'Good Vizag/Vijaywada'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 5 Years. All excluding Volvo and Scania', 'points' => 11, 'location' => 'Good Vizag/Vijaywada'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Above 40000 GVW',
            ], $policy);
        }

        $insurer = 'MAGMA';

        // MAGMA - 7500 - 12000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 23, 'location' => 'TL1'],
                ['policy_type' => 'Comprehensive', 'points' => 16, 'location' => 'TL2'],
                ['policy_type' => 'Third Party', 'points' => 11, 'location' => 'AP & TL2'],
                ['policy_type' => 'Third Party', 'points' => 16, 'location' => 'TL1'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '7500 - 12000 GVW',
            ], $policy);
        }

        // MAGMA - 12001 - 20000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Upto 5 Years', 'points' => 25, 'location' => 'AP'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Upto 5 Years', 'points' => 18, 'location' => 'TL1'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 5 Years', 'points' => 27, 'location' => 'AP'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 5 Years', 'points' => 23, 'location' => 'TL1'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 5 Years', 'points' => 14, 'location' => 'TL2'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Upto 5 Years', 'points' => 17, 'location' => 'AP'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 5 Years', 'points' => 21, 'location' => 'AP'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001 - 20000 GVW',
            ], $policy);
        }

        // MAGMA - 20001 - 40000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Upto 5 Years', 'points' => 24, 'location' => 'AP'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 5 Years', 'points' => 28, 'location' => 'AP'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 5 Years', 'points' => 29, 'location' => 'TL1, TL2'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Upto 5 Years', 'points' => 12, 'location' => 'AP'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 5 Years', 'points' => 22, 'location' => 'AP'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001 - 40000 GVW',
            ], $policy);
        }

        // MAGMA - Above 40001 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'points' => 19, 'location' => 'AP'],
                ['policy_type' => 'Comprehensive', 'points' => 18, 'location' => 'TL1'],
                ['policy_type' => 'Third Party', 'points' => 13, 'location' => 'AP'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Above 40001 GVW',
            ], $policy);
        }

        $segment = 'GCW';
        $insurer = 'TATA';

        // TATA - 7501 - 12000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Age', 'points' => 27, 'location' => 'Hyderabad'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Age', 'points' => 27, 'location' => 'Vijaywada'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Age', 'points' => 26, 'location' => 'Vishakhapattnam'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Age', 'points' => 27, 'location' => 'Rest of Andhra Pradesh'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 6 Years', 'points' => 22, 'location' => 'Rest of Telangana'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Age', 'points' => 36, 'location' => 'Vijaywada & Vishakhapaattnam'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'All Age', 'points' => 33, 'location' => 'Hyderabad'],
                ['policy_type' => 'Third Party', 'remarks_additional' => '1-6 Years', 'points' => 26, 'location' => 'Rest of Andhra Pradesh'],
                ['policy_type' => 'Third Party', 'remarks_additional' => '1-6 Years', 'points' => 18, 'location' => 'Rest of Telangana'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 6 Years', 'points' => 34, 'location' => 'Rest of Andhra Pradesh, Rest of Telangana'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '7501 - 12000 GVW',
            ], $policy);
        }

        // TATA - 12000-20000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 6 Years - Hyderabad Decline', 'points' => 23, 'location' => 'Rest of Andhra Pradesh'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 6 Years - Hyderabad Decline', 'points' => 22, 'location' => 'Rest of Telangana, Vijaywada & Vishakhapattnam'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 1 Years', 'points' => 33, 'location' => 'Hyderabad'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 1 Years', 'points' => 36, 'location' => 'Vijaywada & Vishakhapattnam'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 6 Years', 'points' => 35, 'location' => 'Rest of Andhra Pradesh, Rest of Telangana'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12000-20000 GVW',
            ], $policy);
        }

        // TATA - 20001-35000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Upto 6 Years', 'points' => 12, 'location' => 'Rest of Andhra Pradesh'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 6 Years', 'points' => 23, 'location' => 'Rest of Andhra Pradesh'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 6 Years', 'points' => 22, 'location' => 'Rest of Telangana, Vijaywada & Vishakhapattnam'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001-35000 GVW',
            ], $policy);
        }

        // TATA - 35001-45000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 6 Years', 'points' => 23, 'location' => 'Rest of Andhra Pradesh'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Above 6 Years', 'points' => 22, 'location' => 'Rest of Telangana, Vijaywada & Vishakhapattnam'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '35001-45000 GVW',
            ], $policy);
        }

        // TATA - 20001-45000 GVW
        foreach (
            [
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 6 Years', 'points' => 35, 'location' => 'Rest of Andhra Pradesh, Rest of Telangana'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001-45000 GVW',
            ], $policy);
        }

        // TATA - Above 20001 GVW
        foreach (
            [
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 1 Years', 'points' => 33, 'location' => 'Hyderabad'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Above 1 Years', 'points' => 36, 'location' => 'Vijaywada & Vishakhapattnam'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Above 20001 GVW',
            ], $policy);
        }

        $segment = 'GCW';
        $insurer = 'LIBERTY';

        // LIBERTY - 12001-20000 GVW
        foreach (
            [
                ['remarks_additional' => '1-5 YEARS', 'points' => 20, 'location' => 'ANDHRA PRADESH - 2 V'],
                ['remarks_additional' => '6-10 YEARS', 'points' => 18, 'location' => 'ANDHRA PRADESH - 3 R'],
                ['remarks_additional' => '6-10 YEARS', 'points' => 22, 'location' => 'TELANGANA - 1 H & TELANGANA - 2 R'],
                ['remarks_additional' => '6-10 YEARS', 'points' => 24, 'location' => 'ANDHRA PRADESH - 1 KV'],
                ['remarks_additional' => '6-10 YEARS', 'points' => 31, 'location' => 'ANDHRA PRADESH - 2 V'],
                ['remarks_additional' => 'Above 10 YEARS', 'points' => 18, 'location' => 'ANDHRA PRADESH - 3 R'],
                ['remarks_additional' => 'Above 10 YEARS', 'points' => 22, 'location' => 'TELANGANA - 1 H & TELANGANA - 2 R'],
                ['remarks_additional' => 'Above 10 YEARS', 'points' => 24, 'location' => 'ANDHRA PRADESH - 1 KV'],
                ['remarks_additional' => 'Above 10 YEARS', 'points' => 31, 'location' => 'ANDHRA PRADESH - 2 V'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001-20000 GVW',
                'policy_type' => 'Comprehensive',
            ], $policy);
        }

        // LIBERTY - 20001-40000 GVW
        foreach (
            [
                ['remarks_additional' => '1-5 YEARS', 'points' => 18, 'location' => 'ANDHRA PRADESH - 2 V'],
                ['remarks_additional' => 'ABOVE 5 YEARS', 'points' => 13, 'location' => 'ANDHRA PRADESH - 3 R'],
                ['remarks_additional' => 'ABOVE 5 YEARS', 'points' => 22, 'location' => 'ANDHRA PRADESH -1 KV, TELANGANA - 1 H &TELANGANA - 2 R'],
                ['remarks_additional' => 'ABOVE 5 YEARS', 'points' => 31, 'location' => 'ANDHRA PRADESH - 2 V'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001-40000 GVW',
                'policy_type' => 'Comprehensive',
            ], $policy);
        }

        // LIBERTY - 40001-43000 GVW
        foreach (
            [
                ['remarks_additional' => '1-5 YEARS', 'points' => 22, 'location' => 'ANDHRA PRADESH - 2 V'],
                ['remarks_additional' => 'ABOVE 5 YEARS', 'points' => 16, 'location' => 'ANDHRA PRADESH - 3 R'],
                ['remarks_additional' => 'ABOVE 5 YEARS', 'points' => 22, 'location' => 'ANDHRA PRADESH - 1 KV & TELANGANA - 1 H & 2 R'],
                ['remarks_additional' => 'ABOVE 5 YEARS', 'points' => 27, 'location' => 'ANDHRA PRADESH - 2 V'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '40001-43000 GVW',
                'policy_type' => 'Comprehensive',
            ], $policy);
        }

        // LIBERTY - 12001-20000 GVW - Third Party
        foreach (
            [
                ['remarks_additional' => '1-5  YEARS', 'points' => 18, 'location' => 'ANDHRA PRADESH - 1 KV'],
                ['remarks_additional' => '1-5 YEARS', 'points' => 16, 'location' => 'TELANGANA - 1H, TELANGANA - 2 AKKMWN &TELANGANA - 3 R'],
                ['remarks_additional' => '1-5 YEARS', 'points' => 34, 'location' => 'ANDHRA PRADESH - 2 V'],
                ['remarks_additional' => '1-5 YEARS', 'points' => 8, 'location' => 'ANDHRA PRADESH - 3 KNO & ANDHRA PRADESH - 4 R'],
                ['remarks_additional' => 'Above 5 YEARS', 'points' => 26, 'location' => 'ANDHRA PRADESH - 3 KNO & ANDHRA PRADESH - 4 R'],
                ['remarks_additional' => 'Above 5 YEARS', 'points' => 29, 'location' => 'TELANGANA - 1H, TELANGANA - 2 AKKMWN & TELANGANA - 3 R'],
                ['remarks_additional' => 'Above 5 YEARS', 'points' => 31, 'location' => 'ANDHRA PRADESH - 1 KV'],
                ['remarks_additional' => 'Above 5 YEARS', 'points' => 36, 'location' => 'ANDHRA PRADESH - 2 V'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001-20000 GVW',
                'policy_type' => 'Third Party',
            ], $policy);
        }

        // LIBERTY - 20001- 40000 GVW - Third Party
        foreach (
            [
                ['remarks_additional' => '1-5 YEARS', 'points' => 8, 'location' => 'ANDHRA PRADESH - 3 KNO & ANDHRA PRADESH - 4 R'],
                ['remarks_additional' => '1-5 YEARS', 'points' => 17, 'location' => 'TELANGANA - 1H, TELANGANA - 2 AKKMWN & TELANGANA - 3 R'],
                ['remarks_additional' => '1-5 YEARS', 'points' => 18, 'location' => 'ANDHRA PRADESH - 1 KV & ANDHRA PRADESH - 2 V'],
                ['remarks_additional' => 'ABOVE 5 YEARS', 'points' => 24, 'location' => 'ANDHRA PRADESH - 3 KNO & ANDHRA PRADESH - 4 R'],
                ['remarks_additional' => 'ABOVE 5 YEARS', 'points' => 28, 'location' => 'ANDHRA PRADESH - 1 KV'],
                ['remarks_additional' => 'ABOVE 5 YEARS', 'points' => 29, 'location' => 'TELANGANA - 1H, TELANGANA - 2 AKKMWN & TELANGANA - 3 R'],
                ['remarks_additional' => 'ABOVE 5 YEARS', 'points' => 44, 'location' => 'ANDHRA PRADESH - 2 V'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001- 40000 GVW',
                'policy_type' => 'Third Party',
            ], $policy);
        }

        $segment = 'GCW';
        $insurer = 'SBI';

        // SBI - 7501-12000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'Excluding Eicher', 'points' => 22, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '7501-12000 GVW',
            ], $policy);
        }

        // SBI - 12001-20000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'remarks_additional' => 'TATA & Ashok leyland - Only New', 'points' => 21, 'location' => 'All RTOs'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'TATA & Ashok leyland - 1- 5 Years', 'points' => 23, 'location' => 'All RTOs'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'TATA & Ashok leyland - 1- 5 Years', 'points' => 25, 'location' => 'All RTOs'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'TATA & Ashok leyland - Above 5 Years', 'points' => 26, 'location' => 'Andhra Pradesh'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'TATA & Ashok leyland - Above 5 Years', 'points' => 27, 'location' => 'Andhra Pradesh'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'TATA & Ashok leyland- Above 5 Years', 'points' => 27, 'location' => 'Telangana'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'TATA & Ashok leyland- Above 5 Years', 'points' => 27, 'location' => 'Telangana'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001-20000 GVW',
            ], $policy);
        }

        // SBI - 12001-20000 GVW - Other Makes
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Other Makes - 1-5 Years', 'points' => 11, 'location' => 'All RTOs'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Other Makes - 1-5 Years', 'points' => 13, 'location' => 'All RTOs'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Other Makes - Above 5 Years', 'points' => 14, 'location' => 'All RTOs'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Other Makes - Above 5 Years', 'points' => 16, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '12001-20000 GVW',
            ], $policy);
        }

        // SBI - 20001-40000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'TATA & Ashok leyland- Only New', 'points' => 19, 'location' => 'All RTOs'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'TATA & Ashok leyland- 1- 5 Years', 'points' => 21, 'location' => 'All RTOs'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'TATA & Ashok leyland- Above 5 Years', 'points' => 24, 'location' => 'Andhra Pradesh'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'TATA & Ashok leyland- Above 5 Years', 'points' => 25, 'location' => 'Telangana'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001-40000 GVW',
            ], $policy);
        }

        // SBI - 20001-40000 GVW - Third Party
        foreach (
            [
                ['policy_type' => 'Third Party', 'remarks_additional' => 'TATA & Ashok leyland - Only New', 'points' => 21, 'location' => 'All RTOs'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'TATA & Ashok leyland- 1- 5 Years', 'points' => 23, 'location' => 'All RTOs'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'TATA & Ashok leyland - Above 5 Years', 'points' => 26, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001-40000 GVW',
            ], $policy);
        }

        // SBI - 20001-40000 GVW - Other Makes
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Other Makes - 1-5 Years', 'points' => 10, 'location' => 'Andhra Pradesh'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Other Makes - 1-5 Years', 'points' => 11, 'location' => 'Telangana'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Other Makes - Above 5 Years', 'points' => 13, 'location' => 'Andhra Pradesh'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'Other Makes - Above 5 Years', 'points' => 14, 'location' => 'Telangana'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001-40000 GVW',
            ], $policy);
        }

        // SBI - 20001-40000 GVW - Third Party Other Makes
        foreach (
            [
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Other Makes - 1- 5 Years', 'points' => 16, 'location' => 'All RTOs'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'Other Makes - Above 5 Years', 'points' => 18, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => '20001-40000 GVW',
            ], $policy);
        }

        // SBI - Above 40000 GVW
        foreach (
            [
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'TATA & Ashok leyland - Upto 5 Years', 'points' => 14, 'location' => 'All RTOs'],
                ['policy_type' => 'Comprehensive', 'remarks_additional' => 'TATA & Ashok leyland Above 5 Years', 'points' => 18, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Above 40000 GVW',
            ], $policy);
        }

        // SBI - Above 40000 GVW - Third Party
        foreach (
            [
                ['policy_type' => 'Third Party', 'remarks_additional' => 'TATA & Ashok leyland - Upto 5 Years', 'points' => 15, 'location' => 'All RTOs'],
                ['policy_type' => 'Third Party', 'remarks_additional' => 'TATA & Ashok leyland- Above 5 Years', 'points' => 18, 'location' => 'All RTOs'],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Above 40000 GVW',
            ], $policy);
        }

        // DIGIT - School Bus - Comprehensive & Third Party
        $insurer = 'DIGIT';
        $segment = 'School Bus';

        foreach (
            [
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'School Bus - Upto 7 Seater - Excluding Ref RTOs', 'points' => 28],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'School bus-In the name of school and Yellow Bus - 8 & above 8 Seater Only', 'points' => 70],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'School Bus On Transporter s Individual Name - 8 & above 8 Seater Only', 'points' => 60],
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
                ['insurer_remarks' => '18 & 18 Above Seater', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'School Bus. For Comp Age Upto 15 Years & Third Party Age Upto 25 years Only', 'points' => 57],
                ['insurer_remarks' => '18 & 18 Above Seater', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'School Bus. For Comp Age Upto 15 Years & Third Party Age Upto 25 years Only', 'points' => 58],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // TATA - School Bus - Comprehensive & Third Party
        $insurer = 'TATA';
        $segment = 'School Bus';

        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Andhra Pradesh & Telangana', 'remarks_additional' => 'School Bus Upto 11 Seater', 'points' => 48],
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Andhra Pradesh & Telangana', 'remarks_additional' => 'School Bus - Above 11 Seater', 'points' => 78],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // TATA - Staff Bus - Comprehensive & Third Party
        $insurer = 'TATA';
        $segment = 'School Bus';

        foreach (
            [
                ['location' => 'Vijaywada, Vishakhapattanm', 'remarks_additional' => 'Staff Bus - Upto 12 Seater', 'points' => 13],
                ['location' => 'Hyderabad', 'remarks_additional' => 'Staff Bus - Upto 12 Seater', 'points' => 19],
                ['location' => 'Rest of Andhra Pradesh', 'remarks_additional' => 'Staff Bus - Above 12 Seater Vijaywada Decline', 'points' => 45],
                ['location' => 'Hyderabad', 'remarks_additional' => 'Staff Bus - Above 12 Seater Vijaywada Decline', 'points' => 46],
                ['location' => 'Rest of Telangana', 'remarks_additional' => 'Staff Bus - Above 12 Seater Vijaywada Decline', 'points' => 64],
                ['location' => 'Vishakhapattanm', 'remarks_additional' => 'Staff Bus - Above 12 Seater Vijaywada Decline', 'points' => 44],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Staff Bus',
                'policy_type' => 'Comprehensive & Third Party',
            ], $policy);
        }

        // ROYAL - School Bus - Comprehensive & Third Party
        $insurer = 'ROYAL';
        $segment = 'School Bus';

        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Andhra Pradesh & Telangana', 'points' => 52],
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
                ['policy_type' => 'Comprehensive', 'location' => 'Vishakhapattanm', 'remarks_additional' => 'Upto 18 Seater', 'points' => 71],
                ['policy_type' => 'Comprehensive', 'location' => 'Rest of All RTOs', 'remarks_additional' => 'Upto 18 Seater', 'points' => 73],
                ['policy_type' => 'Comprehensive', 'location' => 'AP2', 'remarks_additional' => '18-36 Seater', 'points' => 49],
                ['policy_type' => 'Comprehensive', 'location' => 'Hyderabad', 'remarks_additional' => '18-36 Seater', 'points' => 61],
                ['policy_type' => 'Comprehensive', 'location' => 'Vishakhapattanm & Vijaywada', 'remarks_additional' => '18-36 Seater', 'points' => 73],
                ['policy_type' => 'Comprehensive', 'location' => 'Rest of TS & AP1', 'remarks_additional' => '18-36 Seater - Only Old', 'points' => 65],
                ['policy_type' => 'Comprehensive', 'location' => 'AP2', 'remarks_additional' => 'Above 36 Seater', 'points' => 57],
                ['policy_type' => 'Comprehensive', 'location' => 'Rest of All RTOs', 'remarks_additional' => 'Above 36 Seater', 'points' => 73],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'School Bus', 'points' => 48],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ICICI - Staff Bus - Comprehensive & Third Party
        $insurer = 'ICICI';
        $segment = 'School Bus';

        foreach (
            [
                ['insurer_remarks' => 'Staff Bus', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'Vijaywada', 'remarks_additional' => 'Staff Bus - Seating Above 18 Seater Vishakhapattnam Decline', 'points' => 39],
                ['insurer_remarks' => 'Staff Bus', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'Rest of AP', 'remarks_additional' => 'Staff Bus On Corporate Name Only - Seating Above 18 Seater Vishakhapattnam Decline - Above 6 Years', 'points' => 35],
                ['insurer_remarks' => 'Staff Bus', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'Telangana', 'remarks_additional' => 'Staff Bus On Corporate Name Only - Seating Above 18 Seater Vishakhapattnam Decline', 'points' => 35],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // MAGMA - School Bus & Staff Bus - Comprehensive & Third Party
        $insurer = 'MAGMA';
        $segment = 'School Bus';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'AP, TL1, TL2', 'remarks_additional' => 'School Bus Vehicle is registered in the name of the School Only', 'points' => 52],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'School Bus Vehicle is registered in the name of the School Only', 'points' => 24],
                ['policy_type' => 'Comprehensive', 'location' => 'AP', 'remarks_additional' => 'Staff Bus', 'points' => 39],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Staff Bus', 'points' => 24],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // BAJAJ - School Bus & Staff Bus - Comprehensive & Third Party
        $insurer = 'BAJAJ';
        $segment = 'School Bus';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Staff Bus - Above 10 Seater', 'points' => 22],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Staff Bus - Above 10 Seater', 'points' => 46],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }


        // ICICI - MISD - Comprehensive & Third Party
        $insurer = 'ICICI';
        $segment = 'MISD';

        foreach (
            [
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Hyderabad & Rest Of Telangana', 'remarks_additional' => 'Excluding CRANES Decline Vijaywada & Vishakapatnam', 'points' => 39],
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Rest of AP', 'remarks_additional' => 'Decline Vijaywada & Vishakapatnam', 'points' => 32],
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Garbage Van Only - Tata Ace, Intra, Maruti Super Carry, M&M Bolero, Supro, Jeeto, AL Dost Only', 'points' => 30],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // TATA - MISD - Comprehensive & Third Party
        $insurer = 'TATA';
        $segment = 'MISD';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'Upto 1 Years', 'points' => 30],
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Vishakapatnam', 'remarks_additional' => 'Upto 1 Years', 'points' => 14],
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Vijaywada', 'remarks_additional' => 'All Ages', 'points' => 14],
                ['policy_type' => 'Comprehensive & Third Party', 'location' => 'Hyderabad', 'remarks_additional' => 'All Ages', 'points' => 35],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // MAGMA - MISD - Third Party
        $insurer = 'MAGMA';
        $segment = 'MISD';

        foreach (
            [
                ['policy_type' => 'Third Party', 'location' => 'AP, TL1, TL2', 'remarks_additional' => 'Garbage Van Only', 'points' => 23],
                ['policy_type' => 'Third Party', 'location' => 'TL3', 'remarks_additional' => 'Garbage Van Only', 'points' => 26],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // CHOLA - MISD - Comprehensive & Third Party
        $insurer = 'CHOLA';
        $segment = 'MISD';

        foreach (
            [
                ['insurer_remarks' => 'Without CPA - Less 1.5%', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Excavator, Loader, Back Hoe Loader, Transit Mixer, Mobile Crane Carrying Vehicles, Material Lifting Vehicles For Eg - Hydra.', 'points' => 26],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // BAJAJ - MISD - Comprehensive & Third Party
        $insurer = 'BAJAJ';
        $segment = 'MISD';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'TS, Hyderabad', 'remarks_additional' => 'Excluding Ambulance Cranes and Transit Mixer', 'points' => 17],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // DIGIT - MISD - Only JCB - Comprehensive & Third Party
        $insurer = 'DIGIT';
        $segment = 'MISD';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Hyderabad', 'points' => 35],
                ['policy_type' => 'Third Party', 'location' => 'Hyderabad', 'points' => 26],
                ['policy_type' => 'Comprehensive', 'location' => 'Good Vizag + Vijayawada & Bad Vizag + Vijayawada', 'remarks_additional' => 'Upto 1 Years', 'points' => 39],
                ['policy_type' => 'Comprehensive', 'location' => 'Good Vizag + Vijayawada & Bad Vizag + Vijayawada', 'remarks_additional' => 'Above 1 Years', 'points' => 37],
                ['policy_type' => 'Third Party', 'location' => 'Good Vizag + Vijayawada & Bad Vizag + Vijayawada', 'remarks_additional' => 'Upto 1 Years', 'points' => 30],
                ['policy_type' => 'Third Party', 'location' => 'Good Vizag + Vijayawada & Bad Vizag + Vijayawada', 'remarks_additional' => 'Above 1 Years', 'points' => 28],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Only JCB',
            ], $policy);
        }

        // DIGIT - MISD - Other Than JCB - Comprehensive & Third Party
        $insurer = 'DIGIT';
        $segment = 'MISD';

        foreach (
            [
                ['insurer_remarks' => 'Other Than JCB', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 5 Years', 'points' => 19],
                ['insurer_remarks' => 'Other Than JCB', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'points' => 15],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ICICI - AGRICULTURE TRACTOR - Comprehensive & Third Party
        $insurer = 'ICICI';
        $segment = 'TRACTOR';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Rest Of AP & Vijaywada', 'remarks_additional' => 'New Vehicle Only Hyderabad Decline', 'points' => 35],
                ['policy_type' => 'Comprehensive', 'location' => 'Rest Of Telangana', 'remarks_additional' => 'New Vehicle Only Hyderabad Decline', 'points' => 39],
                ['policy_type' => 'Comprehensive', 'location' => 'Vishakapatnam', 'remarks_additional' => 'New Vehicle Only Hyderabad Decline', 'points' => 44],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Rest Of AP', 'remarks_additional' => 'Above 6 Years - Hyderabad, Vijaywada Decline & Excluding Telangana', 'points' => 30],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Vishakhapattanm', 'remarks_additional' => 'Old Vehicle Only - Hyderabad, Vijaywada Decline & Excluding Telangana', 'points' => 26],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // FUTURE - AGRICULTURE TRACTOR - Comprehensive & Third Party
        $insurer = 'FUTURE';
        $segment = 'TRACTOR';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'points' => 39],
                ['policy_type' => 'Third Party', 'location' => 'All RTOs', 'points' => 22],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // TATA - AGRICULTURE TRACTOR - Comprehensive & Third Party
        $insurer = 'TATA';
        $segment = 'TRACTOR';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh & Telangana', 'remarks_additional' => 'New Vehicle only', 'points' => 39],
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh & Telangana', 'remarks_additional' => 'Above 1 Years', 'points' => 35],
                ['policy_type' => 'Third Party', 'location' => 'Andhra Pradesh & Telangana', 'remarks_additional' => 'Above 5 Years', 'points' => 35],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Hyderabad, Vijaywada & Vishakapatnam', 'remarks_additional' => 'Comp - All Ages & TP - Above 1 Years', 'points' => 35],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SHRIRAM - AGRICULTURE TRACTOR - Comprehensive & Third Party
        $insurer = 'SHRIRAM';
        $segment = 'TRACTOR';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'remarks_additional' => 'New Only - Agriculture tractors only without trolly/trailer', 'points' => 30],
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'Telangana', 'remarks_additional' => 'Upto 15 Years', 'points' => 24],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ROYAL - AGRICULTURE TRACTOR - Comprehensive & Third Party
        $insurer = 'ROYAL';
        $segment = 'TRACTOR';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh', 'points' => 30],
                ['policy_type' => 'Third Party', 'location' => 'Andhra Pradesh', 'points' => 16],
                ['policy_type' => 'Comprehensive', 'location' => 'Telangana', 'points' => 35],
                ['policy_type' => 'Third Party', 'location' => 'Telangana', 'points' => 29],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
                'insurer_remarks' => 'Without Nil Dep Only',
                'remarks_additional' => 'Trolleys / Trailers excluded',
            ], $policy);
        }

        // MAGMA - AGRICULTURE TRACTOR - Comprehensive & Third Party
        $insurer = 'MAGMA';
        $segment = 'TRACTOR';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'AP', 'remarks_additional' => 'New Only', 'points' => 37],
                ['policy_type' => 'Comprehensive', 'location' => 'TL2, TL3', 'remarks_additional' => 'New Only', 'points' => 37],
                ['policy_type' => 'Comprehensive', 'location' => 'TL3', 'remarks_additional' => 'New Only', 'points' => 37],
                ['policy_type' => 'Comprehensive', 'location' => 'TL1, TL2, AP', 'remarks_additional' => 'Old Only', 'points' => 39],
                ['policy_type' => 'Third Party', 'location' => 'AP', 'remarks_additional' => 'Old Only', 'points' => 35],
                ['policy_type' => 'Third Party', 'location' => 'TL1, TL2, TL3', 'remarks_additional' => 'Old Only', 'points' => 29],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // LIBERTY - AGRICULTURE TRACTOR - Comprehensive
        $insurer = 'LIBERTY';
        $segment = 'TRACTOR';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH', 'remarks_additional' => 'All Ages - Telangana Decline', 'points' => 24],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // SBI - AGRICULTURE TRACTOR - Comprehensive & Third Party
        $insurer = 'SBI';
        $segment = 'TRACTOR';

        foreach (
            [
                ['insurer_remarks' => 'Tractor & Harvester Only - With Trailer', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'NEW', 'points' => 36],
                ['insurer_remarks' => 'Tractor & Harvester Only - With Trailer', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => '1 to 25 Years', 'points' => 39],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // ZUNO - AGRICULTURE TRACTOR - Comprehensive & Third Party
        $insurer = 'ZUNO';
        $segment = 'TRACTOR';

        foreach (
            [
                ['policy_type' => 'Comprehensive + Third Party', 'location' => 'System RTOs', 'remarks_additional' => 'Tractor With Registered Single Trailor', 'points' => 33],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // DIGIT - AGRICULTURE TRACTOR - Comprehensive & Third Party
        $insurer = 'DIGIT';
        $segment = 'TRACTOR';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Hyderabad', 'remarks_additional' => 'Upto 5 Years', 'points' => 11],
                ['policy_type' => 'Comprehensive', 'location' => 'Good Vizag/Vijaywada', 'remarks_additional' => 'Upto 1 Years', 'points' => 44],
                ['policy_type' => 'Comprehensive', 'location' => 'Good Vizag/Vijaywada', 'remarks_additional' => '1-5 Years', 'points' => 35],
                ['policy_type' => 'Comprehensive', 'location' => 'Bad Vizag/Vijaywada', 'remarks_additional' => 'Upto 5 Years', 'points' => 28],
                ['policy_type' => 'Third Party', 'location' => 'Good Vizag/Vijaywada', 'remarks_additional' => 'Upto 5 Years', 'points' => 26],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // CHOLA - AGRICULTURE TRACTOR - Comprehensive & Third Party
        $insurer = 'CHOLA';
        $segment = 'TRACTOR';

        foreach (
            [
                ['insurer_remarks' => 'Without CPA - Less 1.5%', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'All Ages Vehicle', 'points' => 39],
                ['insurer_remarks' => 'Without CPA - Less 1.5%', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Old Only', 'points' => 17],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // UNIVERSAL SOMPO - AGRICULTURE TRACTOR - Comprehensive & Third Party
        $insurer = 'SOMPO';
        $segment = 'TRACTOR';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'ANDHRA PRADESH - 2 V & ANDHRA PRADESH - 3 R', 'remarks_additional' => 'New s Rollover', 'points' => 30],
                ['policy_type' => 'Third Party', 'location' => 'ANDHRA PRADESH - 2 V & ANDHRA PRADESH - 3 R', 'points' => 29],
            ] as $policy
        ) {
            $policies[] = array_merge([
                'insurer' => $insurer,
                'segment' => $segment,
            ], $policy);
        }

        // KOTAK - AGRICULTURE TRACTOR - Comprehensive
        $insurer = 'KOTAK';
        $segment = 'TRACTOR';

        foreach (
            [
                ['policy_type' => 'Comprehensive', 'location' => 'Andhra Pradesh_1', 'points' => 39],
                ['policy_type' => 'Comprehensive', 'location' => 'Telangana_1', 'points' => 30],
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
                'region' => 7,
                'period' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], $policy));
        }

        $this->command->info('Seeded ' . count($policies) . ' insurance policies from September 2025 grid.');
    }
}
