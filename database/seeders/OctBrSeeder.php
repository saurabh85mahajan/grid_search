<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OctBrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policies = [
            // ========================================
            // Private Car - COMPREHENSIVE
            // ========================================
            
            // BAJAJ
            ['insurer' => 'BAJAJ', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive', 'location' => 'All RTO\'s', 'remarks_additional' => 'Petrol With & W/O NCB & Diesel with NCB - Non High End', 'points' => 40],
            ['insurer' => 'BAJAJ', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive + SAOD', 'location' => 'All RTO\'s', 'remarks_additional' => 'Diesel Without NCB - For Both High End and Non High End', 'points' => 9],
            ['insurer' => 'BAJAJ', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive', 'location' => 'All RTO\'s', 'remarks_additional' => 'High End Vehicles - with NCB Only', 'points' => 22],
            
            // DIGIT
            ['insurer' => 'DIGIT', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Petrol - Non High End - (OD + Addon)', 'points' => 27],
			['insurer' => 'DIGIT', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Non Petrol - Non High End - (OD + Addon)', 'points' => 27],
			['insurer' => 'DIGIT', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Non Petrol - Non High End - (OD + Addon)', 'points' => 24],
			['insurer' => 'DIGIT', 'segment' => 'Private Car', 'policy_type' => 'SAOD', 'location' => 'JH', 'remarks_additional' => 'Non High End - (OD + Addon)', 'points' => 21],
            ['insurer' => 'DIGIT', 'segment' => 'Private Car', 'policy_type' => 'SAOD', 'location' => 'BR', 'remarks_additional' => 'Non High End - (OD + Addon)', 'points' => 24],
			['insurer' => 'DIGIT', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive + SAOD', 'location' => 'BR, JH', 'remarks_additional' => 'High End', 'points' => 17],
            
            // HDFC
            ['insurer' => 'HDFC', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive', 'location' => 'ALL RTOS', 'remarks_additional' => 'Petrol, Electric & Hybrid & (Diesel, CNG, LPG- With NCB)', 'points' => 27],
            ['insurer' => 'HDFC', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive', 'location' => 'ALL RTOS', 'remarks_additional' => 'Diesel, CNG, LPG- Without NCB', 'points' => 13],
            ['insurer' => 'HDFC', 'segment' => 'Private Car', 'policy_type' => 'SAOD', 'location' => 'ALL RTOS', 'remarks_additional' => 'Petrol, Electric & Hybrid- With NCB', 'points' => 27],
            ['insurer' => 'HDFC', 'segment' => 'Private Car', 'policy_type' => 'SAOD', 'location' => 'ALL RTOS', 'remarks_additional' => 'Petrol, Electric & Hybrid- Without NCB', 'points' => 22],
            ['insurer' => 'HDFC', 'segment' => 'Private Car', 'policy_type' => 'SAOD', 'location' => 'ALL RTOS', 'remarks_additional' => 'Diesel, CNG, LPG - With NCB', 'points' => 18],
            ['insurer' => 'HDFC', 'segment' => 'Private Car', 'policy_type' => 'SAOD', 'location' => 'ALL RTOS', 'remarks_additional' => 'Diesel, CNG, LPG - Without NCB', 'points' => 13],
     
            // ICICI
            ['insurer' => 'ICICI', 'notice' => 'Declined Models in ICICI - Bolero,Tavera,Qualis,Indica,Indigo, Omni, Eeco, TATA Sumo, Hyundai Getz, GM, Chevrolet and absolete Models', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive - Brand New', 'location' => 'BR', 'remarks_additional' => '-', 'points' => 24],
            ['insurer' => 'ICICI', 'notice' => 'Declined Models in ICICI - Bolero,Tavera,Qualis,Indica,Indigo, Omni, Eeco, TATA Sumo, Hyundai Getz, GM, Chevrolet and absolete Models', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive - Brand New', 'location' => 'JH', 'remarks_additional' => '-', 'points' => 9],
            
			['insurer' => 'ICICI', 'notice' => 'Declined Models in ICICI - Bolero,Tavera,Qualis,Indica,Indigo, Omni, Eeco, TATA Sumo, Hyundai Getz, GM, Chevrolet and absolete Models', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive- 1+1', 'location' => 'BR', 'remarks_additional' => 'Petrol , CNG,- With NCB', 'points' => 24],
            ['insurer' => 'ICICI', 'notice' => 'Declined Models in ICICI - Bolero,Tavera,Qualis,Indica,Indigo, Omni, Eeco, TATA Sumo, Hyundai Getz, GM, Chevrolet and absolete Models', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive- 1+1', 'location' => 'JH', 'remarks_additional' => 'Petrol , CNG,- With NCB', 'points' => 20],
            ['insurer' => 'ICICI', 'notice' => 'Declined Models in ICICI - Bolero,Tavera,Qualis,Indica,Indigo, Omni, Eeco, TATA Sumo, Hyundai Getz, GM, Chevrolet and absolete Models', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive- 1+1', 'location' => 'BR', 'remarks_additional' => 'Diesel & Electric - With NCB', 'points' => 24],
            ['insurer' => 'ICICI', 'notice' => 'Declined Models in ICICI - Bolero,Tavera,Qualis,Indica,Indigo, Omni, Eeco, TATA Sumo, Hyundai Getz, GM, Chevrolet and absolete Models', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive- 1+1', 'location' => 'JH', 'remarks_additional' => 'Diesel & Electric - With NCB', 'points' => 13],
           
			['insurer' => 'ICICI', 'notice' => 'Declined Models in ICICI - Bolero,Tavera,Qualis,Indica,Indigo, Omni, Eeco, TATA Sumo, Hyundai Getz, GM, Chevrolet and absolete Models', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive + SAOD', 'location' => 'BR', 'remarks_additional' => 'All Fuel - Without NCB', 'points' => 20],
            ['insurer' => 'ICICI', 'notice' => 'Declined Models in ICICI - Bolero,Tavera,Qualis,Indica,Indigo, Omni, Eeco, TATA Sumo, Hyundai Getz, GM, Chevrolet and absolete Models', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive + SAOD', 'location' => 'JH', 'remarks_additional' => 'All Fuel - Without NCB', 'points' => 13],
            
			['insurer' => 'ICICI', 'notice' => 'Declined Models in ICICI - Bolero,Tavera,Qualis,Indica,Indigo, Omni, Eeco, TATA Sumo, Hyundai Getz, GM, Chevrolet and absolete Models', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Only Used Car - Owner Changed Cars Only', 'points' => 22],
            ['insurer' => 'ICICI', 'notice' => 'Declined Models in ICICI - Bolero,Tavera,Qualis,Indica,Indigo, Omni, Eeco, TATA Sumo, Hyundai Getz, GM, Chevrolet and absolete Models', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Only Used Car - Owner Changed Cars Only', 'points' => 13],
            
			['insurer' => 'ICICI', 'notice' => 'Declined Models in ICICI - Bolero,Tavera,Qualis,Indica,Indigo, Omni, Eeco, TATA Sumo, Hyundai Getz, GM, Chevrolet and absolete Models', 'segment' => 'Private Car', 'policy_type' => 'SAOD', 'location' => 'BR', 'remarks_additional' => 'With NCB All Fuel Type', 'points' => 22],
            ['insurer' => 'ICICI', 'notice' => 'Declined Models in ICICI - Bolero,Tavera,Qualis,Indica,Indigo, Omni, Eeco, TATA Sumo, Hyundai Getz, GM, Chevrolet and absolete Models', 'segment' => 'Private Car', 'policy_type' => 'SAOD', 'location' => 'JH', 'remarks_additional' => 'With NCB All Fuel Type', 'points' => 20],
            
			
            //TATA
            ['insurer' => 'TATA', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive + SAOD', 'location' => 'All RTO\'s', 'remarks_additional' => '-', 'points' => 17],

			//SOMPO
            ['insurer' => 'SOMPO', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'With NCB', 'location' => 'All RTOs', 'remarks_additional' => '', 'points' => 33],
			['insurer' => 'SOMPO', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Non NCB','location' => 'All RTOs', 'remarks_additional' => '', 'points' => 28],
			['insurer' => 'SOMPO', 'segment' => 'Private Car', 'policy_type' => 'SAOD', 'location' => 'All RTOs', 'remarks_additional' => '', 'points' => 28],


            //RELIANCE (With NCB)
            ['insurer' => 'RELIANCE', 'segment' => 'Private Car', 'insurer_remarks' => 'With NCB', 'policy_type' => 'Comprehensive', 'location' => 'All RTO\'s', 'remarks_additional' => 'Non Diesel', 'points' => 27],
            ['insurer' => 'RELIANCE', 'segment' => 'Private Car', 'insurer_remarks' => 'With NCB', 'policy_type' => 'SAOD', 'location' => 'All RTO\'s', 'remarks_additional' => '-', 'points' => 27],

			//RELIANCE (Without NCB)
			['insurer' => 'RELIANCE', 'segment' => 'Private Car', 'insurer_remarks' => 'Without NCB', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Non Diesel', 'points' => 18],
            ['insurer' => 'RELIANCE', 'segment' => 'Private Car', 'insurer_remarks' => 'Without NCB', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Non Diesel', 'points' => 9],
            ['insurer' => 'RELIANCE', 'segment' => 'Private Car', 'insurer_remarks' => 'Without NCB', 'policy_type' => 'SAOD', 'location' => 'All RTO\'s', 'remarks_additional' => 'Non Diesel', 'points' => 22],
            ['insurer' => 'RELIANCE', 'segment' => 'Private Car', 'insurer_remarks' => 'Without NCB', 'policy_type' => 'SAOD', 'location' => 'All RTO\'s', 'remarks_additional' => 'Diesel', 'points' => 18],

            //ROYAL
            ['insurer' => 'ROYAL', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive + SAOD', 'location' => 'JH, BR', 'remarks_additional' => '-', 'points' => 16],

			// MAGMA (On NET)
			['insurer' => 'MAGMA', 'segment' => 'Private Car', 'insurer_remarks' => 'ON NET', 'policy_type' => 'Comprehensive- 1+3', 'location' => 'All RTO\'s', 'remarks_additional' => 'All Fuel', 'points' => 21],
            ['insurer' => 'MAGMA', 'segment' => 'Private Car', 'insurer_remarks' => 'ON NET', 'policy_type' => 'Comprehensive- 1+1', 'location' => 'All RTO\'s', 'remarks_additional' => 'All Fuel', 'points' => 18],
            ['insurer' => 'MAGMA', 'segment' => 'Private Car', 'insurer_remarks' => 'ON NET', 'policy_type' => 'SAOD', 'location' => 'All RTO\'s', 'remarks_additional' => 'Petrol', 'points' => 14],
            ['insurer' => 'MAGMA', 'segment' => 'Private Car', 'insurer_remarks' => 'ON NET', 'policy_type' => 'SAOD', 'location' => 'BR', 'remarks_additional' => 'Diesel with NCB', 'points' => 15],
            ['insurer' => 'MAGMA', 'segment' => 'Private Car', 'insurer_remarks' => 'ON NET', 'policy_type' => 'SAOD', 'location' => 'All RTO\'s', 'remarks_additional' => 'Diesel without NCB', 'points' => 14],


            // LIBERTY (Electric Decline)
            ['insurer' => 'LIBERTY', 'segment' => 'Private Car', 'insurer_remarks' => 'Electric Decline', 'policy_type' => 'Comprehensive', 'location' => 'All RTO\'s', 'remarks_additional' => 'Petrol , HyBrid & EV', 'points' => 25],
            ['insurer' => 'LIBERTY', 'segment' => 'Private Car', 'insurer_remarks' => 'Electric Decline', 'policy_type' => 'Comprehensive', 'location' => 'All RTO\'s', 'remarks_additional' => 'Diesel & CNG - With NCB', 'points' => 18],
            ['insurer' => 'LIBERTY', 'segment' => 'Private Car', 'insurer_remarks' => 'Electric Decline', 'policy_type' => 'Comprehensive', 'location' => 'All RTO\'s', 'remarks_additional' => 'Diesel & CNG- Without NCB', 'points' => 23],
            ['insurer' => 'LIBERTY', 'segment' => 'Private Car', 'insurer_remarks' => 'Electric Decline', 'policy_type' => 'SAOD', 'location' => 'All RTO\'s', 'remarks_additional' => '-', 'points' => 17],
			

            // CHOLA
            ['insurer' => 'CHOLA', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive', 'location' => 'All RTO\'s', 'remarks_additional' => 'WO CPA Less 1.5% ', 'points' => 27],

            // FUTURE
            ['insurer' => 'FUTURE', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive + SAOD', 'location' => 'All RTO\'s', 'remarks_additional' => '-', 'points' => 27],

            // SBI
            ['insurer' => 'SBI', 'segment' => 'Private Car', 'policy_type' => 'Comprehensive', 'insurer_remarks' => 'Upto 15 Years Only', 'notice' => 'In SBI For Pvt Car Comp & SAOD declined Model- Ashok Leyland-Stile,Bajaj Tempo-Trax,Bajaj Tempo Traveller,Chevrolet-Enjoy,Tavera,Datsun-GO Plus,Force-All Models,ICML-Rhino Rx,Mahindra & Mahindra-540,555 DI,Armada,CDR,CL 500,-Commander,DP550,Festara,Gio,Jeep,Marshal,Maxx,Maxximo,Savari,Supro,Jeeto,Voyager,Maruti Suzuki-Eeco,Omni,Versa,Mercedes-Benz-MB 100 D,MB Class,Tata Motors-207,Ace,Magic,Venture,Winger ,Sumo,Toyota-Hiace Commuter,Qualis.', 'location' => 'All RTO\'s', 'remarks_additional' => '(Electric Decline) - Non NCB Less 5% (13% on Audi/BMW/Mercedes & for obsolete model)', 'points' => 27],
            ['insurer' => 'SBI', 'segment' => 'Private Car', 'policy_type' => 'SAOD', 'insurer_remarks' => 'Upto 15 Years Only', 'notice' => 'In SBI For Pvt Car Comp & SAOD declined Model- Ashok Leyland-Stile,Bajaj Tempo-Trax,Bajaj Tempo Traveller,Chevrolet-Enjoy,Tavera,Datsun-GO Plus,Force-All Models,ICML-Rhino Rx,Mahindra & Mahindra-540,555 DI,Armada,CDR,CL 500,-Commander,DP550,Festara,Gio,Jeep,Marshal,Maxx,Maxximo,Savari,Supro,Jeeto,Voyager,Maruti Suzuki-Eeco,Omni,Versa,Mercedes-Benz-MB 100 D,MB Class,Tata Motors-207,Ace,Magic,Venture,Winger ,Sumo,Toyota-Hiace Commuter,Qualis.', 'location' => 'All RTO\'s', 'remarks_additional' => '(Electric Decline) - Non NCB Less 5% (13% on Audi/BMW/Mercedes & for obsolete model)', 'points' => 24],


			// SHRIRAM
            ['insurer' => 'SHRIRAM', 'segment' => 'Private Car', 'insurer_remarks' => 'EV Decline', 'policy_type' => 'Comprehensive - New', 'location' => 'BR, JH', 'remarks_additional' => 'Only HONDA & HYUNDAI & KIA manufacture only - Only Petrol', 'points' => 33],
	
			['insurer' => 'SHRIRAM', 'segment' => 'Private Car', 'insurer_remarks' => 'Old EV Decline', 'policy_type' => 'Comprehensive + SAOD', 'policy_type_remarks' => 'Petrol + CNG + LPG', 'location' => 'BR, JH , Mumbai', 'remarks_additional' => 'Upto 15 Years Only- Maruti/Hyundai/ Honda/Tata/Renault Make Only - With NCB', 'points' => 31],
			['insurer' => 'SHRIRAM', 'segment' => 'Private Car', 'insurer_remarks' => 'Old EV Decline', 'policy_type' => 'Comprehensive + SAOD', 'policy_type_remarks' => 'Petrol + CNG + LPG', 'location' => 'BR, JH', 'remarks_additional' => 'Upto 15 Years Only- Maruti/Hyundai/ Honda/Tata/Renault Make Only - Without NCB', 'points' => 27],
			['insurer' => 'SHRIRAM', 'segment' => 'Private Car', 'insurer_remarks' => 'Old EV Decline', 'policy_type' => 'Comprehensive + SAOD', 'policy_type_remarks' => 'Diesel', 'location' => 'BR', 'remarks_additional' => 'Only M & M - Upto 15 Years Only', 'points' => 22],
			['insurer' => 'SHRIRAM', 'segment' => 'Private Car', 'insurer_remarks' => 'Old EV Decline', 'policy_type' => 'Comprehensive + SAOD', 'policy_type_remarks' => 'Diesel', 'location' => 'JH', 'remarks_additional' => 'Only M & M - Upto 15 Years Only', 'points' => 20],
			['insurer' => 'SHRIRAM', 'segment' => 'Private Car', 'insurer_remarks' => 'Old EV Decline', 'policy_type' => 'Comprehensive + SAOD', 'policy_type_remarks' => 'Diesel', 'location' => 'BR', 'remarks_additional' => 'Other than M & M - Upto 15 Years Only', 'points' => 13],


			// ========================================
            // PRIVATE CAR - THIRD PARTY
            // ========================================

			//BAJAJ
			['segment' => 'Private Car', 'insurer' => 'BAJAJ', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '-', 'points' => 52],
			['segment' => 'Private Car', 'insurer' => 'BAJAJ', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'All Fuel', 'points' => 45],
			['segment' => 'Private Car', 'insurer' => 'BAJAJ', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Swift Diesel & CNG', 'points' => 18],

			//DIGIT
			['segment' => 'Private Car', 'insurer' => 'DIGIT', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'CNG', 'location' => 'Bihar_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR02,03,11,21,24,25,26,27,37,38,39,43,44,45,50,56,57', 'points' => 18],
			
			['segment' => 'Private Car', 'insurer' => 'DIGIT', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'CNG - Above 1000 CC', 'location' => 'Bihar_Good', 'remarks_additional' => 'Allowed RTO\'s- BR01,04,05,06,07,08,09,10,19,22,28,29,30,31,32,33,34,46,51,52,53,55', 'points' => 32],

			['segment' => 'Private Car', 'insurer' => 'DIGIT', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'PETROL & ELECTRIC - Upto 1000 CC', 'location' => 'Bihar_Good, Bihar_Bad', 'remarks_additional' => '', 'points' => 41],
			['segment' => 'Private Car', 'insurer' => 'DIGIT', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'PETROL & ELECTRIC - Upto 1000 CC', 'location' => 'Jharkhand', 'remarks_additional' => '', 'points' => 43],

			['segment' => 'Private Car', 'insurer' => 'DIGIT', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'PETROL & ELECTRIC - Above 1000 CC', 'location' => 'Bihar_Good', 'remarks_additional' => 'Allowed RTO\'s- BR01,04,05,06,07,08,09,10,19,22,28,29,30,31,32,33,34,46,51,52,53,55', 'points' => 52],
			['segment' => 'Private Car', 'insurer' => 'DIGIT', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'PETROL & ELECTRIC - Above 1000 CC', 'location' => 'Bihar_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR02,03,11,21,24,25,26,27,37,38,39,43,44,45,50,56,57 ', 'points' => 50],
			['segment' => 'Private Car', 'insurer' => 'DIGIT', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'PETROL & ELECTRIC - Above 1000 CC', 'location' => 'Jharkhand', 'remarks_additional' => '', 'points' => 37],

			['segment' => 'Private Car', 'insurer' => 'DIGIT', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'DIESEL- Upto 1500 CC', 'location' => 'Bihar_Good', 'remarks_additional' => 'Allowed RTO\'s- BR01,04,05,06,07,08,09,10,19,22,28,29,30,31,32,33,34,46,51,52,53,55', 'points' => 28],
			['segment' => 'Private Car', 'insurer' => 'DIGIT', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'DIESEL- Upto 1500 CC', 'location' => 'Jharkhand', 'remarks_additional' => '', 'points' => 18],

			['segment' => 'Private Car', 'insurer' => 'DIGIT', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'DIESEL- Above 1500 CC', 'location' => 'Bihar_Good', 'remarks_additional' => 'Allowed RTO\'s- BR01,04,05,06,07,08,09,10,19,22,28,29,30,31,32,33,34,46,51,52,53,55', 'points' => 46],
			['segment' => 'Private Car', 'insurer' => 'DIGIT', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'DIESEL- Above 1500 CC', 'location' => 'Bihar_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR02,03,11,21,24,25,26,27,37,38,39,43,44,45,50,56,57', 'points' => 51],
			['segment' => 'Private Car', 'insurer' => 'DIGIT', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'DIESEL- Above 1500 CC', 'location' => 'Jharkhand', 'remarks_additional' => '', 'points' => 32],	

			//ICICI
			['segment' => 'Private Car', 'insurer' => 'ICICI', 'policy_type' => 'Third Party', 'location' => 'Patna', 'remarks_additional' => '', 'points' => 24],	
			['segment' => 'Private Car', 'insurer' => 'ICICI', 'policy_type' => 'Third Party', 'location' => 'Rest of BR', 'remarks_additional' => '', 'points' => 25],	
			['segment' => 'Private Car', 'insurer' => 'ICICI', 'policy_type' => 'Third Party', 'location' => 'Ranchi', 'remarks_additional' => '', 'points' => 11],	
			['segment' => 'Private Car', 'insurer' => 'ICICI', 'policy_type' => 'Third Party', 'location' => 'Rest of JH', 'remarks_additional' => '', 'points' => 12],	

			//TATA
			['segment' => 'Private Car', 'insurer' => 'TATA', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '-', 'points' => 45],	
			['segment' => 'Private Car', 'insurer' => 'TATA', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Diesel', 'points' => 36],	
			['segment' => 'Private Car', 'insurer' => 'TATA', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Non Diesel', 'points' => 38],	

			//MAGMA
			['segment' => 'Private Car', 'insurer' => 'MAGMA', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Upto 1000 CC - Diesel', 'points' => 36],
			['segment' => 'Private Car', 'insurer' => 'MAGMA', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Upto 1000 CC - Diesel', 'points' => 27],
			['segment' => 'Private Car', 'insurer' => 'MAGMA', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Upto 1000 CC - Petrol', 'points' => 44],
			['segment' => 'Private Car', 'insurer' => 'MAGMA', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Upto 1000 CC - Petrol', 'points' => 43],

			['segment' => 'Private Car', 'insurer' => 'MAGMA', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '1001- 1500 - Diesel', 'points' => 49],
			['segment' => 'Private Car', 'insurer' => 'MAGMA', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '1001- 1500 - Diesel', 'points' => 45],
			['segment' => 'Private Car', 'insurer' => 'MAGMA', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '1001- 1500 - Petrol', 'points' => 42],
			['segment' => 'Private Car', 'insurer' => 'MAGMA', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '1001- 1500 - Petrol', 'points' => 36],
			['segment' => 'Private Car', 'insurer' => 'MAGMA', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Above 1500 CC - Diesel', 'points' => 41],
			['segment' => 'Private Car', 'insurer' => 'MAGMA', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Above 1500 CC - Diesel', 'points' => 44],
			['segment' => 'Private Car', 'insurer' => 'MAGMA', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Above 1500 CC - Petrol', 'points' => 27],
			['segment' => 'Private Car', 'insurer' => 'MAGMA', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Above 1500 CC - Petrol', 'points' => 42],

			//RELIANCE
			['segment' => 'Private Car', 'insurer' => 'RELIANCE', 'policy_type' => 'Third Party - Non Diesel', 'location' => 'BR', 'remarks_additional' => 'Upto 1000 CC', 'points' => 20],
			['segment' => 'Private Car', 'insurer' => 'RELIANCE', 'policy_type' => 'Third Party - Non Diesel', 'location' => 'Patna', 'remarks_additional' => 'Above 1000 CC', 'points' => 42],
			['segment' => 'Private Car', 'insurer' => 'RELIANCE', 'policy_type' => 'Third Party - Non Diesel', 'location' => 'Rest of BR', 'remarks_additional' => 'Above 1000 CC', 'points' => 38],

			//ROYAL
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'Patna', 'remarks_additional' => 'Non Diesel - Upto 1000 CC', 'points' => 36],
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'Rest of BR', 'remarks_additional' => 'Non Diesel - Upto 1000 CC', 'points' => 24],
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Non Diesel - Upto 1000 CC', 'points' => 36],
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'All RTO\'s', 'remarks_additional' => 'Non Diesel - Above 1000 CC', 'points' => 43],
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'Bokaro', 'remarks_additional' => 'Diesel - Upto 1000 CC', 'points' => 18],
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'Ranchi', 'remarks_additional' => 'Diesel - Upto 1000 CC', 'points' => 11],
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'Patna', 'remarks_additional' => 'Diesel -1001- 1500 CC', 'points' => 27],
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'Rest Of Bihar', 'remarks_additional' => 'Diesel -1001- 1500 CC', 'points' => 26],
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'Bokaro', 'remarks_additional' => 'Diesel -1001- 1500 CC', 'points' => 24],
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'Ranchi', 'remarks_additional' => 'Diesel -1001- 1500 CC', 'points' => 27],
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'Rest Of Jharkhand', 'remarks_additional' => 'Diesel -1001- 1500 CC', 'points' => 19],
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'Patna, Bokaro', 'remarks_additional' => 'Diesel - Above 1500 CC', 'points' => 44],
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'Rest Of Bihar', 'remarks_additional' => 'Diesel - Above 1500 CC', 'points' => 42],
			['segment' => 'Private Car', 'insurer' => 'ROYAL', 'policy_type' => 'Third Party', 'location' => 'Ranchi, Rest Of JH', 'remarks_additional' => 'Diesel - Above 1500 CC', 'points' => 35],
		
			//ZUNO
			['segment' => 'Private Car', 'insurer' => 'ZUNO', 'policy_type' => 'Third Party', 'location' => 'All RTO\'s', 'remarks_additional' => '-', 'points' => 22],

			//SOMPO
			['segment' => 'Private Car', 'insurer' => 'SOMPO', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '-', 'points' => 22],
		
			//CHOLA
			['segment' => 'Private Car', 'insurer' => 'CHOLA', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'WO CPA Less 1.5%', 'points' => 27],
		
			//LIBERTY
			['segment' => 'Private Car', 'insurer' => 'LIBERTY', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Petrol, HyBrid & EV - Upto 1000 CC', 'points' => 38],
			['segment' => 'Private Car', 'insurer' => 'LIBERTY', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Petrol, HyBrid & EV - Upto 1000 CC', 'points' => 30],
			['segment' => 'Private Car', 'insurer' => 'LIBERTY', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Petrol, HyBrid & EV - 1001- 1500 CC', 'points' => 45],
			['segment' => 'Private Car', 'insurer' => 'LIBERTY', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Petrol, HyBrid & EV - Above 1500 CC', 'points' => 49],
			['segment' => 'Private Car', 'insurer' => 'LIBERTY', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Petrol, HyBrid & EV - Above 1500 CC', 'points' => 45],
			['segment' => 'Private Car', 'insurer' => 'LIBERTY', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'CNG - 1001- 1500 CC', 'points' => 26],
			['segment' => 'Private Car', 'insurer' => 'LIBERTY', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'CNG - 1001- 1500 CC', 'points' => 21],
			['segment' => 'Private Car', 'insurer' => 'LIBERTY', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'CNG - Above 1500 CC', 'points' => 44],
			['segment' => 'Private Car', 'insurer' => 'LIBERTY', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'CNG - Above 1500 CC', 'points' => 41],
			['segment' => 'Private Car', 'insurer' => 'LIBERTY', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Diesel - Above 1500 CC', 'points' => 31],
			['segment' => 'Private Car', 'insurer' => 'LIBERTY', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Diesel - Above 1500 CC', 'points' => 28],
			
			//FUTURE
			['segment' => 'Private Car', 'insurer' => 'FUTURE', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Petrol', 'points' => 27],
			['segment' => 'Private Car', 'insurer' => 'FUTURE', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Diesel', 'points' => 18],
			
			//SBI
			['segment' => 'Private Car', 'insurer' => 'SBI', 'insurer_remarks' => 'Upto 25 Years Only', 'notice' => 'In SBI For Pvt Car SATP declined Model- Ashok Leyland-Stile,Bajaj Tempo-Trax,Bajaj Tempo Traveller,Chevrolet-Enjoy,Tavera,Datsun-GO Plus,Force-All Models,ICML-Rhino Rx,Mahindra & Mahindra-540,555 DI,Armada,CDR,CL 500,-Commander,DP 550,Festara,Gio,Jeep,Marshal,Maxx,Maxximo,Savari,Supro,Jeeto,Voyager,Maruti Suzuki-Eeco,Omni,Versa,Mercedes-Benz-MB 100 D,MB Class,Tata Motors-207,Ace,Magic,Venture,Winger ,Sumo,Toyota-Hiace Commuter,Qualis', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Non Diesel - Upto 1000 CC', 'points' => 18],
			['segment' => 'Private Car', 'insurer' => 'SBI', 'insurer_remarks' => 'Upto 25 Years Only', 'notice' => 'In SBI For Pvt Car SATP declined Model- Ashok Leyland-Stile,Bajaj Tempo-Trax,Bajaj Tempo Traveller,Chevrolet-Enjoy,Tavera,Datsun-GO Plus,Force-All Models,ICML-Rhino Rx,Mahindra & Mahindra-540,555 DI,Armada,CDR,CL 500,-Commander,DP 550,Festara,Gio,Jeep,Marshal,Maxx,Maxximo,Savari,Supro,Jeeto,Voyager,Maruti Suzuki-Eeco,Omni,Versa,Mercedes-Benz-MB 100 D,MB Class,Tata Motors-207,Ace,Magic,Venture,Winger ,Sumo,Toyota-Hiace Commuter,Qualis', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Non Diesel - 1001 - 1500 CC', 'points' => 27],
			['segment' => 'Private Car', 'insurer' => 'SBI', 'insurer_remarks' => 'Upto 25 Years Only', 'notice' => 'In SBI For Pvt Car SATP declined Model- Ashok Leyland-Stile,Bajaj Tempo-Trax,Bajaj Tempo Traveller,Chevrolet-Enjoy,Tavera,Datsun-GO Plus,Force-All Models,ICML-Rhino Rx,Mahindra & Mahindra-540,555 DI,Armada,CDR,CL 500,-Commander,DP 550,Festara,Gio,Jeep,Marshal,Maxx,Maxximo,Savari,Supro,Jeeto,Voyager,Maruti Suzuki-Eeco,Omni,Versa,Mercedes-Benz-MB 100 D,MB Class,Tata Motors-207,Ace,Magic,Venture,Winger ,Sumo,Toyota-Hiace Commuter,Qualis', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Non Diesel - Above 1500 CC', 'points' => 31],
			['segment' => 'Private Car', 'insurer' => 'SBI', 'insurer_remarks' => 'Upto 25 Years Only', 'notice' => 'In SBI For Pvt Car SATP declined Model- Ashok Leyland-Stile,Bajaj Tempo-Trax,Bajaj Tempo Traveller,Chevrolet-Enjoy,Tavera,Datsun-GO Plus,Force-All Models,ICML-Rhino Rx,Mahindra & Mahindra-540,555 DI,Armada,CDR,CL 500,-Commander,DP 550,Festara,Gio,Jeep,Marshal,Maxx,Maxximo,Savari,Supro,Jeeto,Voyager,Maruti Suzuki-Eeco,Omni,Versa,Mercedes-Benz-MB 100 D,MB Class,Tata Motors-207,Ace,Magic,Venture,Winger ,Sumo,Toyota-Hiace Commuter,Qualis', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Diesel - Upto 1500 CC', 'points' => 10],
			['segment' => 'Private Car', 'insurer' => 'SBI', 'insurer_remarks' => 'Upto 25 Years Only', 'notice' => 'In SBI For Pvt Car SATP declined Model- Ashok Leyland-Stile,Bajaj Tempo-Trax,Bajaj Tempo Traveller,Chevrolet-Enjoy,Tavera,Datsun-GO Plus,Force-All Models,ICML-Rhino Rx,Mahindra & Mahindra-540,555 DI,Armada,CDR,CL 500,-Commander,DP 550,Festara,Gio,Jeep,Marshal,Maxx,Maxximo,Savari,Supro,Jeeto,Voyager,Maruti Suzuki-Eeco,Omni,Versa,Mercedes-Benz-MB 100 D,MB Class,Tata Motors-207,Ace,Magic,Venture,Winger ,Sumo,Toyota-Hiace Commuter,Qualis', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Diesel - Above 1500 CC', 'points' => 25],
			

			// ========================================
            // TWO WHEELER - COMPREHENSIVE
            // ========================================

			['insurer' => 'BAJAJ', 'segment' => '2W', 'segment_remarks' => 'Bike - 1+1', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Electric All Models Will be Done As per Bajaj Underwriter Approval Only less 5 % Bajaj, Vespa & Royal Enfield', 'points' => 31],
			['insurer' => 'BAJAJ', 'segment' => '2W', 'segment_remarks' => 'Scooter - 1+1', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Electric All Models Will be Done As per Bajaj Underwriter Approval Only less 5 % Bajaj, Vespa & Royal Enfield', 'points' => 36],

			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Upto 180 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Hero & Honda Makes Only', 'location' => 'BR_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR05,06,16,23,28,51 ', 'points' => 48],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Upto 180 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Hero & Honda Makes Only', 'location' => 'BR_Good, JH', 'remarks_additional' => '', 'points' => 49],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Upto 180 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Other Makes', 'location' => 'BR_Good', 'remarks_additional' => '', 'points' => 48],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Upto 180 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Other Makes', 'location' => 'BR_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR05,06,16,23,28,51', 'points' => 37],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Upto 180 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Other Makes', 'location' => 'JH', 'remarks_additional' => '', 'points' => 40],

			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => '181-350 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Honda, Jawa Makes & Avenger Model', 'location' => 'BR_Good', 'remarks_additional' => '', 'points' => 31],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => '181-350 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Honda, Jawa Makes & Avenger Model', 'location' => 'BR_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR05,06,16,23,28,51', 'points' => 31],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => '181-350 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Honda, Jawa Makes & Avenger Model', 'location' => 'JH', 'remarks_additional' => '', 'points' => 27],

			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => '181-350 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Other Makes', 'location' => 'BR_Good', 'remarks_additional' => '', 'points' => 13],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => '181-350 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Other Makes', 'location' => 'BR_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR05,06,16,23,28,51', 'points' => 27],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => '181-350 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Other Makes', 'location' => 'JH', 'remarks_additional' => '', 'points' => 18],
			
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Above 350 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Comprehensive - 1+1', 'location' => 'BR_Good', 'remarks_additional' => '', 'points' => 27],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Above 350 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Comprehensive - 1+1', 'location' => 'BR_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR05,06,16,23,28,51', 'points' => 31],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Above 350 CC- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Comprehensive - 1+1', 'location' => 'JH', 'remarks_additional' => '', 'points' => 27],
			
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Scooter + EV TW- 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Comprehensive - 1+1', 'location' => 'All RTO\'s', 'remarks_additional' => '', 'points' => 50],

			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Royal Enfield - ( 180-350 Only ) - 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Comprehensive - 1+1', 'location' => 'BR_Good', 'remarks_additional' => '', 'points' => 45],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Royal Enfield - ( 180-350 Only ) - 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Comprehensive - 1+1', 'location' => 'BR_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR05,06,16,23,28,51', 'points' => 45],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Royal Enfield - ( 180-350 Only ) - 1+1', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Comprehensive - 1+1', 'location' => 'JH', 'remarks_additional' => '', 'points' => 41],


			['insurer' => 'ICICI', 'segment' => '2W', 'segment_remarks' => 'Scooter - (1+1)/(2+2)/(3+3)', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '', 'points' => 40],
			['insurer' => 'ICICI', 'segment' => '2W', 'segment_remarks' => 'Scooter - (1+1)/(2+2)/(3+3)', 'policy_type' => 'Comprehensive', 'location' => 'Ranchi', 'remarks_additional' => '', 'points' => 49],
			['insurer' => 'ICICI', 'segment' => '2W', 'segment_remarks' => 'Scooter - (1+1)/(2+2)/(3+3)', 'policy_type' => 'Comprehensive', 'location' => 'Rest of JH', 'remarks_additional' => '', 'points' => 45],

			['insurer' => 'ICICI', 'segment' => '2W', 'segment_remarks' => 'Bike - (1+1)/(2+2)/(3+3)', 'policy_type' => 'Compehensive', 'location' => 'BR', 'remarks_additional' => '', 'points' => 22],
			['insurer' => 'ICICI', 'segment' => '2W', 'segment_remarks' => 'Bike - (1+1)/(2+2)/(3+3)', 'policy_type' => 'Compehensive', 'location' => 'JH', 'remarks_additional' => '', 'points' => 27],

			['insurer' => 'ICICI', 'segment' => '2W', 'segment_remarks' => 'Electrci - Bike', 'policy_type' => 'Comprehensive - 1+1', 'location' => 'BR, Ranchi', 'remarks_additional' => '', 'points' => 31],
			['insurer' => 'ICICI', 'segment' => '2W', 'segment_remarks' => 'Electrci - Scooter', 'policy_type' => 'Comprehensive - 1+1', 'location' => 'BR, Ranchi', 'remarks_additional' => '', 'points' => 27],
			['insurer' => 'ICICI', 'segment' => '2W', 'segment_remarks' => 'Electrci - Scooter', 'policy_type' => 'Comprehensive - 1+1', 'location' => 'Rest of JH', 'remarks_additional' => '', 'points' => 36],


			['insurer' => 'TATA', 'segment' => '2W', 'segment_remarks' => 'Bike', 'policy_type' => 'Comprehensive ( 1+ 1)', 'location' => 'JH', 'remarks_additional' => '', 'points' => 40],
			['insurer' => 'TATA', 'segment' => '2W', 'segment_remarks' => 'Bike', 'policy_type' => 'Comprehensive ( 1+ 1)', 'location' => 'BR', 'remarks_additional' => '', 'points' => 36],
			['insurer' => 'TATA', 'segment' => '2W', 'segment_remarks' => 'Scooters', 'policy_type' => 'Comprehensive ( 1+ 1)', 'location' => 'JH', 'remarks_additional' => '', 'points' => 56],
			['insurer' => 'TATA', 'segment' => '2W', 'segment_remarks' => 'Scooters', 'policy_type' => 'Comprehensive ( 1+ 1)', 'location' => 'BR', 'remarks_additional' => '', 'points' => 49],


			['insurer' => 'RELIANCE', 'segment' => '2W', 'segment_remarks' => 'Bike - All CC', 'policy_type' => 'SAOD', 'location' => 'All RTOs', 'remarks_additional' => '', 'points' => 33],
			['insurer' => 'RELIANCE', 'segment' => '2W', 'segment_remarks' => 'Scooter', 'policy_type' => 'Comprehensive - 1+1', 'location' => 'All RTOs', 'remarks_additional' => '', 'points' => 29],
			['insurer' => 'RELIANCE', 'segment' => '2W', 'segment_remarks' => 'Scooter', 'policy_type' => 'SAOD', 'location' => 'All RTOs', 'remarks_additional' => '', 'points' => 38],


			['insurer' => 'LIBERTY', 'segment' => '2W', 'segment_remarks' => 'Bike', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Excluding Electric', 'location' => 'JH', 'remarks_additional' => '', 'points' => 36],
			['insurer' => 'LIBERTY', 'segment' => '2W', 'segment_remarks' => 'Scooter', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Excluding Electric', 'location' => 'BR, JH', 'remarks_additional' => '', 'points' => 49],


			// ========================================
            // TWO WHEELER - THIRD PARTY
            // ========================================

			['insurer' => 'BAJAJ', 'segment' => '2W', 'segment_remarks' => 'Bike', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'All KTM models and YAMAHA Make Bikes', 'points' => 22],
			['insurer' => 'BAJAJ', 'segment' => '2W', 'segment_remarks' => 'Bike', 'policy_type' => 'Third Party', 'location' => 'Bokaro', 'remarks_additional' => 'Other Model', 'points' => 22],
			['insurer' => 'BAJAJ', 'segment' => '2W', 'segment_remarks' => 'Bike', 'policy_type' => 'Third Party', 'location' => 'BR, Rest of JH', 'remarks_additional' => 'Other Model', 'points' => 48],
			['insurer' => 'BAJAJ', 'segment' => '2W', 'segment_remarks' => 'Scooter', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => '', 'points' => 50],

			
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Upto 180 CC', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Hero & Honda Makes Only', 'location' => 'BR_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR05,06,16,23,28,51 ', 'points' => 49],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Upto 180 CC', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Hero & Honda Makes Only', 'location' => 'BR_Good, JH', 'remarks_additional' => '', 'points' => 50],
			
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Upto 180 CC', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Other Makes', 'location' => 'BR_Good', 'remarks_additional' => '', 'points' => 49],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Upto 180 CC', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Other Makes', 'location' => 'BR_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR05,06,16,23,28,51', 'points' => 38],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Upto 180 CC', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Other Makes', 'location' => 'JH', 'remarks_additional' => '', 'points' => 41],

			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => '181-350 CC', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Honda, Jawa Makes & Avenger Model', 'location' => 'BR_Good', 'remarks_additional' => '', 'points' => 31],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => '181-350 CC', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Honda, Jawa Makes & Avenger Model', 'location' => 'BR_Bad , JH', 'remarks_additional' => '', 'points' => 27],

			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => '181-350 CC', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Other Makes', 'location' => 'BR_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR05,06,16,23,28,51', 'points' => 22],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => '181-350 CC', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Other Makes', 'location' => 'BR_Good', 'remarks_additional' => '', 'points' => 27],
		
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Above 350 CC', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Third Party', 'location' => 'BR_Good', 'remarks_additional' => '', 'points' => 24],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Above 350 CC', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Third Party', 'location' => 'BR_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR05,06,16,23,28,51', 'points' => 18],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Above 350 CC', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 13],
		
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Scooter + EV TW', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Third Party', 'location' => 'BR_Bad, JH', 'remarks_additional' => '', 'points' => 51],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Scooter + EV TW', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Third Party', 'location' => 'BR_Good', 'remarks_additional' => '', 'points' => 56],
			
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Royal Enfield - 180-350 Only', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Third Party', 'location' => 'BR_Good', 'remarks_additional' => '', 'points' => 27],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Royal Enfield - 180-350 Only', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Third Party', 'location' => 'BR_Bad', 'remarks_additional' => 'Allowed RTO\'s- BR05,06,16,23,28,51', 'points' => 41],
			['insurer' => 'DIGIT', 'segment' => '2W', 'segment_remarks' => 'Royal Enfield - 180-350 Only', 'notice' => 'In DIGIT - BR_Good Allowed RTO\'s- BR01,02,03,04,07,08,09,10,11,12,13,14,15,17,18,19,20,21,22,24,25,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,50,52,53,55,56,57', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 42],
			
			['insurer' => 'ICICI', 'segment' => '2W', 'segment_remarks' => 'Scooter - (0+1) (0+2) (0+3)', 'policy_type' => 'Third Party', 'location' => 'Patna', 'remarks_additional' => '-', 'points' => 47],
			['insurer' => 'ICICI', 'segment' => '2W', 'segment_remarks' => 'Scooter - (0+1) (0+2) (0+3)', 'policy_type' => 'Third Party', 'location' => 'Rest of BR, JH', 'remarks_additional' => '', 'points' => 57],
			['insurer' => 'ICICI', 'segment' => '2W', 'segment_remarks' => 'Bike - (0+1) (0+2) (0+3)', 'policy_type' => 'Third Party', 'location' => 'BR, Ranchi', 'remarks_additional' => 'Excluding Bajaj, Yamaha, TVS and Suzuki', 'points' => 32],
			['insurer' => 'ICICI', 'segment' => '2W', 'segment_remarks' => 'Bike - (0+1) (0+2) (0+3)', 'policy_type' => 'Third Party', 'location' => 'Rest of JH', 'remarks_additional' => 'Excluding Bajaj, Yamaha, TVS and Suzuki', 'points' => 37],

			['insurer' => 'LIBERTY', 'segment' => '2W', 'segment_remarks' => 'Bike', 'policy_type' => 'Third Party', 'location' => 'All RTO\'s', 'remarks_additional' => 'Upto 75 CC', 'points' => 46],
			['insurer' => 'LIBERTY', 'segment' => '2W', 'segment_remarks' => 'Bike', 'policy_type' => 'Third Party', 'location' => 'All RTO\'s', 'remarks_additional' => '76- 150 CC', 'points' => 50],
			['insurer' => 'LIBERTY', 'segment' => '2W', 'segment_remarks' => 'Bike', 'policy_type' => 'Third Party', 'location' => 'All RTO\'s', 'remarks_additional' => '151- 350 CC', 'points' => 46],
			['insurer' => 'LIBERTY', 'segment' => '2W', 'segment_remarks' => 'Bike', 'policy_type' => 'Third Party', 'location' => 'All RTO\'s', 'remarks_additional' => 'Above 350 CC', 'points' => 50],
			['insurer' => 'LIBERTY', 'segment' => '2W', 'segment_remarks' => 'Scooter', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Upto 150 CC', 'points' => 55],
			['insurer' => 'LIBERTY', 'segment' => '2W', 'segment_remarks' => 'Scooter', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Upto 150 CC', 'points' => 50],
			
			['insurer' => 'TATA', 'segment' => '2W', 'segment_remarks' => 'Bike', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '-', 'points' => 50],
			['insurer' => 'TATA', 'segment' => '2W', 'segment_remarks' => 'Bike', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 41],
			['insurer' => 'TATA', 'segment' => '2W', 'segment_remarks' => 'Scooter', 'policy_type' => 'Third Party', 'location' => 'JH, BR', 'remarks_additional' => '-', 'points' => 57],
			
			['insurer' => 'RELIANCE', 'segment' => '2W', 'segment_remarks' => 'Scooter', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Yamaha & EV: Less 5%', 'points' => 24],
			
			['insurer' => 'ROYAL', 'segment' => '2W', 'segment_remarks' => 'Electric', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Electric Only', 'points' => 46],
		
			// ========================================
            // 3W - PASSENGER CARRYING VEHICLE - ( PCV )
            // ========================================
			
			['insurer' => 'BAJAJ', 'segment' => '3W PCV', 'segment_remarks' => 'E - Autorikshaw', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Declined Locations - Giridh chatra pakur', 'points' => 41],
			['insurer' => 'BAJAJ', 'segment' => '3W PCV', 'segment_remarks' => 'E - Autorikshaw', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '', 'points' => 55],
			['insurer' => 'BAJAJ', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Comprehensive', 'location' => 'Bihar', 'remarks_additional' => 'Only Bajaj & Piaggio', 'points' => 41],
			['insurer' => 'BAJAJ', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Comprehensive', 'location' => 'Jharkhand', 'remarks_additional' => 'Only Bajaj - Declined Locations - Giridh chatra pakur', 'points' => 46],
			['insurer' => 'BAJAJ', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '', 'points' => 50],

			['insurer' => 'DIGIT', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Comprehensive', 'location' => 'Jharkhand', 'remarks_additional' => 'Petrol, CNG', 'points' => 40],
			['insurer' => 'DIGIT', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Third Party', 'location' => 'Jharkhand', 'remarks_additional' => 'Petrol, CNG', 'points' => 35],
			['insurer' => 'DIGIT', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Comprehensive', 'location' => 'Bihar', 'remarks_additional' => 'Petrol, CNG', 'points' => 30],
			['insurer' => 'DIGIT', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Third Party', 'location' => 'Bihar', 'remarks_additional' => 'Petrol, CNG', 'points' => 28],
			
			['insurer' => 'DIGIT', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Comprehensive', 'location' => 'Jharkhand', 'remarks_additional' => 'Diesel Only - Only BAJAJ & TVS Makes Allowed', 'points' => 39],
			['insurer' => 'DIGIT', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Comprehensive', 'location' => 'Bihar', 'remarks_additional' => 'Diesel Only - Only BAJAJ & TVS Makes Allowed', 'points' => 30],
			['insurer' => 'DIGIT', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Third Party', 'location' => 'Jharkhand', 'remarks_additional' => 'Diesel Only', 'points' => 34],
			['insurer' => 'DIGIT', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Third Party', 'location' => 'Bihar', 'remarks_additional' => 'Diesel Only', 'points' => 28],
			
			['insurer' => 'DIGIT', 'segment' => '3W PCV', 'segment_remarks' => 'E - Autorikshaw', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Jharkhand', 'remarks_additional' => '', 'points' => 50],
			['insurer' => 'DIGIT', 'segment' => '3W PCV', 'segment_remarks' => 'E - Autorikshaw', 'policy_type' => 'Comprehensive', 'location' => 'Bihar', 'remarks_additional' => '-', 'points' => 41],
			['insurer' => 'DIGIT', 'segment' => '3W PCV', 'segment_remarks' => 'E - Autorikshaw', 'policy_type' => 'Third Party', 'location' => 'Bihar', 'remarks_additional' => '', 'points' => 47],
			
			['insurer' => 'LIBERTY', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Excluding Electric', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'NEW', 'points' => 28],
			['insurer' => 'LIBERTY', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Excluding Electric', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'NEW', 'points' => 27],
			['insurer' => 'LIBERTY', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Excluding Electric', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '1 - 5 Years', 'points' => 34],
			['insurer' => 'LIBERTY', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Excluding Electric', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '1 - 5 Years', 'points' => 35],
			['insurer' => 'LIBERTY', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Excluding Electric', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Above 5 years', 'points' => 44],
			['insurer' => 'LIBERTY', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Excluding Electric', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 5 years', 'points' => 45],
			['insurer' => 'LIBERTY', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Excluding Electric', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '', 'points' => 29],
			
			['insurer' => 'ICICI', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Petrol & CNG', 'policy_type' => 'Comprehensive & Third Party - New', 'location' => 'Patna', 'remarks_additional' => '', 'points' => 31],
			['insurer' => 'ICICI', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Petrol & CNG', 'policy_type' => 'Comprehensive & Third Party - New', 'location' => 'Rest of BR', 'remarks_additional' => '-', 'points' => 46],
			['insurer' => 'ICICI', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Petrol & CNG', 'policy_type' => 'Comprehensive & Third Party - New', 'location' => 'Ranchi', 'remarks_additional' => '-', 'points' => 34],
			['insurer' => 'ICICI', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Petrol & CNG', 'policy_type' => 'Comprehensive & Third Party - New', 'location' => 'Rest of JH', 'remarks_additional' => '', 'points' => 19],
			
			['insurer' => 'ICICI', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Diesel', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'Patna', 'remarks_additional' => '', 'points' => 23],
			['insurer' => 'ICICI', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Diesel', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'Rest of BR', 'remarks_additional' => '', 'points' => 46],
			['insurer' => 'ICICI', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Diesel', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'Ranchi', 'remarks_additional' => 'New', 'points' => 36],
			['insurer' => 'ICICI', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Diesel', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'Rest of JH', 'remarks_additional' => 'New', 'points' => 22],
			
			['insurer' => 'ICICI', 'segment' => '3W PCV', 'segment_remarks' => 'E- Rickshaw', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR, Rest of JH', 'remarks_additional' => '-', 'points' => 52],
			['insurer' => 'ICICI', 'segment' => '3W PCV', 'segment_remarks' => 'E- Rickshaw', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'Ranchi', 'remarks_additional' => '', 'points' => 49],

			['insurer' => 'SHRIRAM', 'segment' => '3W PCV', 'segment_remarks' => 'Petrol , CNG', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => 'Upto 15 Years Only', 'points' => 43],
			['insurer' => 'SHRIRAM', 'segment' => '3W PCV', 'segment_remarks' => 'Petrol , CNG', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Upto 15 Years Only', 'points' => 38],
			['insurer' => 'SHRIRAM', 'segment' => '3W PCV', 'segment_remarks' => 'Diesel', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => 'Upto 15 Years Only', 'points' => 43],
			['insurer' => 'SHRIRAM', 'segment' => '3W PCV', 'segment_remarks' => 'Diesel', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Upto 15 Years Only', 'points' => 41],
			['insurer' => 'SHRIRAM', 'segment' => '3W PCV', 'segment_remarks' => 'E- Autorikshaw', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Upto 15 Years Only- Upto 2000 Watt', 'points' => 44],

			['insurer' => 'RELIANCE', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Diesel Decline', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BIHAR', 'remarks_additional' => '-', 'points' => 46],

			['insurer' => 'FUTURE', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => '-', 'points' => '69'],
			['insurer' => 'FUTURE', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH', 'remarks_additional' => '-', 'points' => '46'],

			['insurer' => 'MAGMA', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Old', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '', 'points' => 50],
			['insurer' => 'MAGMA', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Old', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '', 'points' => 31],
			['insurer' => 'MAGMA', 'segment' => '3W PCV', 'segment_remarks' => 'E- Autorikshaw', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '', 'points' => 31],
			['insurer' => 'MAGMA', 'segment' => '3W PCV', 'segment_remarks' => 'E- Autorikshaw', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '', 'points' => 26],
			['insurer' => 'MAGMA', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 37],
			['insurer' => 'MAGMA', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 31],
			['insurer' => 'MAGMA', 'segment' => '3W PCV', 'segment_remarks' => 'E- Autorikshaw', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 30],
			['insurer' => 'MAGMA', 'segment' => '3W PCV', 'segment_remarks' => 'E- Autorikshaw', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 24],

			['insurer' => 'SBI', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Non Diesel - 3+1', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Comprehensive - Upto 15 Years Age Third Party - Upto 25 Years Age', 'points' => 49],
			['insurer' => 'SBI', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Non Diesel - 3+1', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Comprehensive - Upto 15 Years Age Third Party - Upto 25 Years Age', 'points' => 51],
			['insurer' => 'SBI', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw - Diesel - 3+1', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Comprehensive - Upto 15 Years Age Third Party - Upto 25 Years Age', 'points' => 44],
			['insurer' => 'SBI', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw  - Diesel - 3+1', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Comprehensive - Upto 15 Years Age Third Party - Upto 25 Years Age', 'points' => 46],

			['insurer' => 'TATA', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw  - Petrol & CNG', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH, BR', 'remarks_additional' => 'Brand New', 'points' => 44],
			['insurer' => 'TATA', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw  - Petrol & CNG', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH, BR', 'remarks_additional' => 'Old', 'points' => 43],
			['insurer' => 'TATA', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw  - Electric', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH', 'remarks_additional' => 'All Age', 'points' => 46],
			['insurer' => 'TATA', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw  - Electric', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => 'Brand New', 'points' => 46],
			['insurer' => 'TATA', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw  - Electric', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => 'Old', 'points' => 45],
			['insurer' => 'TATA', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw  - Diesel', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH, BR', 'remarks_additional' => 'Brand New', 'points' => 41],
			['insurer' => 'TATA', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw  - Diesel', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH, BR', 'remarks_additional' => 'Old', 'points' => 40],

			['insurer' => 'ROYAL', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw ', 'policy_type' => 'Comprehensive', 'location' => 'Patna', 'remarks_additional' => '0-3 Seater', 'points' => 39],
			['insurer' => 'ROYAL', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw ', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '0-3 Seater', 'points' => 15],
			['insurer' => 'ROYAL', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw ', 'policy_type' => 'Comprehensive', 'location' => 'Rest of BR', 'remarks_additional' => '0-3 Seater', 'points' => 18],
			['insurer' => 'ROYAL', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw ', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '0-3 Seater', 'points' => 13],
			['insurer' => 'ROYAL', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw ', 'policy_type' => 'Third Party', 'location' => 'Rest fo BR', 'remarks_additional' => '0-3 Seater', 'points' => 18],
			['insurer' => 'ROYAL', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw ', 'policy_type' => 'Third Party', 'location' => 'Patna', 'remarks_additional' => '0-3 Seater', 'points' => 37],
			['insurer' => 'ROYAL', 'segment' => '3W PCV', 'segment_remarks' => 'Autorikshaw ', 'policy_type' => 'Third Party', 'location' => 'JH, BR', 'remarks_additional' => 'Above 3 Seating', 'points' => 18],
			['insurer' => 'ROYAL', 'segment' => '3W PCV', 'segment_remarks' => 'E - Autorikshaw', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => '3+1', 'points' => 46],
			['insurer' => 'ROYAL', 'segment' => '3W PCV', 'segment_remarks' => 'E - Autorikshaw', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '3+1', 'points' => 54],

			// ========================================
            // 3W - GOODS CARRYING VEHICLE - ( GCV )
            // ========================================

			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'policy_type' => 'Third Party', 'location' => 'Bihar, Jharkhand', 'remarks_additional' => '-', 'points' => 55],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => 'E Cart', 'policy_type' => 'Comprehensive', 'location' => 'Bihar', 'remarks_additional' => 'Electric', 'points' => 31],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => 'E Cart', 'policy_type' => 'Third Party', 'location' => 'Bihar, Jharkhand', 'remarks_additional' => 'Electric', 'points' => 45],
			
			['insurer' => 'DIGIT', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '-', 'points' => 36],
			['insurer' => 'DIGIT', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '-', 'points' => 31],
			['insurer' => 'DIGIT', 'segment' => '3W GCV', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '-', 'points' => 29],
			['insurer' => 'DIGIT', 'segment' => '3W GCV', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '-', 'points' => 22],
			['insurer' => 'DIGIT', 'segment' => '3W GCV', 'segment_remarks' => 'E Cart', 'policy_type' => 'Comprehensive', 'location' => 'JH, BR', 'remarks_additional' => 'E-Loader', 'points' => 24],
			['insurer' => 'DIGIT', 'segment' => '3W GCV', 'segment_remarks' => 'E Cart', 'policy_type' => 'Third Party', 'location' => 'JH, BR', 'remarks_additional' => 'E-Loader', 'points' => 18],

			['insurer' => 'SHRIRAM', 'segment' => '3W GCV', 'segment_remarks' => 'Non Electric', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'JH, BR', 'remarks_additional' => 'Upto 15 Yrs', 'points' => 46],
			['insurer' => 'SHRIRAM', 'segment' => '3W GCV', 'segment_remarks' => 'E Cart', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'JH, BR', 'remarks_additional' => 'Upto 15 Years Only- Upto 2000 Watt', 'points' => 44],
			
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'New', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '-', 'points' => 36],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'New', 'policy_type' => 'Comprehensive', 'location' => 'Ranchi', 'remarks_additional' => '', 'points' => 41],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'New', 'policy_type' => 'Comprehensive', 'location' => 'Rest of JH', 'remarks_additional' => '', 'points' => 31],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'Old', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 46],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'Electric', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'Patna', 'remarks_additional' => 'Old', 'points' => 22],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'Electric', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'Rest of BR, Ranchi', 'remarks_additional' => '', 'points' => 27],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'Electric', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'Rest of JH', 'remarks_additional' => '', 'points' => 22],
			
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'Bokaro', 'remarks_additional' => '', 'points' => 29],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'Hazaribagh', 'remarks_additional' => '', 'points' => 34],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'Ranchi', 'remarks_additional' => '', 'points' => 37],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'Rest Of Jharkhand', 'remarks_additional' => '', 'points' => 41],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'Patna', 'remarks_additional' => '', 'points' => 45],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'Muzaffarpur', 'remarks_additional' => '', 'points' => 46],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'East Singhbhum', 'remarks_additional' => '', 'points' => 50],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'Bhagalpur', 'remarks_additional' => '', 'points' => 51],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'Gaya, Rest Of Bihar, Purnia', 'remarks_additional' => '', 'points' => 52],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'Dhanbad', 'remarks_additional' => '', 'points' => 54],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Third Party', 'location' => 'Bokaro', 'remarks_additional' => '', 'points' => 36],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Third Party', 'location' => 'Hazaribagh, Ranchi, Rest Of Bihar', 'remarks_additional' => '', 'points' => 46],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Third Party', 'location' => 'Muzaffarpur, East Singhbhum, Gaya, Purnia, Dhanbad', 'remarks_additional' => '', 'points' => 55],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Third Party', 'location' => 'Patna, Bhagalpur', 'remarks_additional' => '', 'points' => 50],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'policy_type' => 'Third Party', 'location' => 'Rest Of JH', 'remarks_additional' => '', 'points' => 41],
			
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'E - Cart', 'policy_type' => 'Comprehensive', 'location' => 'Bokaro', 'remarks_additional' => '', 'points' => 35],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'E - Cart', 'policy_type' => 'Comprehensive', 'location' => 'Hazaribagh', 'remarks_additional' => '', 'points' => 38],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'E - Cart', 'policy_type' => 'Comprehensive', 'location' => 'Ranchi', 'remarks_additional' => '', 'points' => 40],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'E - Cart', 'policy_type' => 'Comprehensive', 'location' => 'Rest Of Jharkhand', 'remarks_additional' => '', 'points' => 46],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'E - Cart', 'policy_type' => 'Comprehensive', 'location' => 'Patna', 'remarks_additional' => '', 'points' => 48],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'E - Cart', 'policy_type' => 'Comprehensive', 'location' => 'Muzaffarpur, Bhagalpur', 'remarks_additional' => '', 'points' => 49],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'E - Cart', 'policy_type' => 'Comprehensive', 'location' => 'Gaya, Purnia', 'remarks_additional' => '', 'points' => 50],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'E - Cart', 'policy_type' => 'Comprehensive', 'location' => 'Dhanbad', 'remarks_additional' => '', 'points' => 51],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'E - Cart', 'policy_type' => 'Comprehensive', 'location' => 'East Singhbhum', 'remarks_additional' => '', 'points' => 52],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'E - Cart', 'policy_type' => 'Comprehensive', 'location' => 'Rest Of Bihar', 'remarks_additional' => '', 'points' => 54],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'E - Cart', 'policy_type' => 'Third Party', 'location' => 'Bokaro', 'remarks_additional' => '', 'points' => 50],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'E - Cart', 'policy_type' => 'Third Party', 'location' => 'Ranchi, Hazaribagh', 'remarks_additional' => '', 'points' => 55],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'E - Cart', 'policy_type' => 'Third Party', 'location' => 'Rest of BH, Rest of JH', 'remarks_additional' => '', 'points' => 60],
			
			['insurer' => 'TATA', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '-', 'points' => 42],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '-', 'points' => 39],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '-', 'points' => 46],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '-', 'points' => 43],
			
			// ========================================
            // TAXI
            // ========================================
			
			['insurer' => 'RELIANCE', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Patna', 'remarks_additional' => 'Upto 6 Str (Non Nil Dep) ( Petrol + CNG + Battery )', 'points' => 41],
			['insurer' => 'RELIANCE', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Rest of BR, JH', 'remarks_additional' => 'Upto 6 Str (Non Nil Dep) ( Petrol + CNG + Battery )', 'points' => 36],
			['insurer' => 'RELIANCE', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'Patna', 'remarks_additional' => 'Upto 6 Str (Nil Dep) ( Petrol + CNG + Battery )', 'points' => 33],
			['insurer' => 'RELIANCE', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive', 'location' => 'Rest of BR, JH', 'remarks_additional' => 'Upto 6 Str (Nil Dep) ( Petrol + CNG + Battery )', 'points' => 28],
			['insurer' => 'RELIANCE', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Patna', 'remarks_additional' => 'Upto 6 Str (Non Nil Dep) (Diesel)', 'points' => 33],
			['insurer' => 'RELIANCE', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Rest of BR, JH', 'remarks_additional' => 'Upto 6 Str (Non Nil Dep) (Diesel)', 'points' => 33],
			['insurer' => 'RELIANCE', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Patna', 'remarks_additional' => 'PCV Taxi 7+1 ( Only NND ) ( Maruti, Toyota, Mahindra, Kia, MG ) All Fuel Type', 'points' => 33],
			['insurer' => 'RELIANCE', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Rest of BR, JH', 'remarks_additional' => 'PCV Taxi 7+1 ( Only NND ) ( Maruti, Toyota, Mahindra, Kia, MG ) All Fuel Type', 'points' => 28],
			
			['insurer' => 'ICICI', 'segment' => 'Taxi', 'segment_remarks' => 'Electric Decline', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Upto 1000 CC', 'points' => 22],
			['insurer' => 'ICICI', 'segment' => 'Taxi', 'segment_remarks' => 'Electric Decline', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Upto 1000 CC', 'points' => 31],
			['insurer' => 'ICICI', 'segment' => 'Taxi', 'segment_remarks' => 'Electric Decline', 'policy_type' => 'Comprehensive', 'location' => 'Patna', 'remarks_additional' => 'Upto 1000 CC', 'points' => 31],
			['insurer' => 'ICICI', 'segment' => 'Taxi', 'segment_remarks' => 'Electric Decline', 'policy_type' => 'Comprehensive', 'location' => 'Rest of BR', 'remarks_additional' => 'Upto 1000 CC', 'points' => 27],
			['insurer' => 'ICICI', 'segment' => 'Taxi', 'segment_remarks' => 'Electric Decline', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Upto 1000 CC', 'points' => 46],

			['insurer' => 'ICICI', 'segment' => 'Taxi', 'segment_remarks' => 'Above 1000 CC', 'policy_type' => 'Comprehensive', 'location' => 'Patna', 'remarks_additional' => '-', 'points' => 31],
			['insurer' => 'ICICI', 'segment' => 'Taxi', 'segment_remarks' => 'Above 1000 CC', 'policy_type' => 'Comprehensive', 'location' => 'Rest of BR', 'remarks_additional' => '-', 'points' => 27],
			['insurer' => 'ICICI', 'segment' => 'Taxi', 'segment_remarks' => 'Above 1000 CC', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '-', 'points' => 46],
			['insurer' => 'ICICI', 'segment' => 'Taxi', 'segment_remarks' => 'Above 1000 CC', 'policy_type' => 'Comprehensive', 'location' => 'Ranchi', 'remarks_additional' => '-', 'points' => 18],
			['insurer' => 'ICICI', 'segment' => 'Taxi', 'segment_remarks' => 'Above 1000 CC', 'policy_type' => 'Third Party', 'location' => 'Ranchi', 'remarks_additional' => '-', 'points' => 41],
			['insurer' => 'ICICI', 'segment' => 'Taxi', 'segment_remarks' => 'Above 1000 CC', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Rest of JH', 'remarks_additional' => '-', 'points' => 27],
		
			['insurer' => 'TATA', 'segment' => 'Taxi', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => '-', 'points' => 27],
			
			['insurer' => 'BAJAJ', 'segment' => 'Taxi', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '-', 'points' => 31],
			
			['insurer' => 'SBI', 'segment' => 'Taxi', 'segment_remarks' => '6+1 - Excluding Innova , Innova crysta, Hycross, Scorpio, Bolero', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age) & Non NCB Less 3%', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'With Nil Dep', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 999 CC', 'points' => 17],
			['insurer' => 'SBI', 'segment' => 'Taxi', 'segment_remarks' => '6+1 - Excluding Innova , Innova crysta, Hycross, Scorpio, Bolero', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age) & Non NCB Less 3%', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'With Nil Dep', 'location' => 'All RTOs', 'remarks_additional' => '1000 - 1499 CC', 'points' => 19],
			['insurer' => 'SBI', 'segment' => 'Taxi', 'segment_remarks' => '6+1 - Excluding Innova , Innova crysta, Hycross, Scorpio, Bolero', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age) & Non NCB Less 3%', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'With Nil Dep', 'location' => 'All RTOs', 'remarks_additional' => 'Above 1499 CC', 'points' => 21],
			['insurer' => 'SBI', 'segment' => 'Taxi', 'segment_remarks' => '6+1 - Excluding Innova , Innova crysta, Hycross, Scorpio, Bolero', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age) & Non NCB Less 3%', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Without Nil Dep', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 999 CC', 'points' => 24],
			['insurer' => 'SBI', 'segment' => 'Taxi', 'segment_remarks' => '6+1 - Excluding Innova , Innova crysta, Hycross, Scorpio, Bolero', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age) & Non NCB Less 3%', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Without Nil Dep', 'location' => 'All RTOs', 'remarks_additional' => '1000 - 1499 CC', 'points' => 27],
			['insurer' => 'SBI', 'segment' => 'Taxi', 'segment_remarks' => '6+1 - Excluding Innova , Innova crysta, Hycross, Scorpio, Bolero', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age) & Non NCB Less 3%', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Without Nil Dep', 'location' => 'All RTOs', 'remarks_additional' => 'Above 1499 CC', 'points' => 28],
			['insurer' => 'SBI', 'segment' => 'Taxi', 'segment_remarks' => '6+1 - Excluding Innova , Innova crysta, Hycross, Scorpio, Bolero', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age) & Non NCB Less 3%', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 999 CC ', 'points' => 27],
			['insurer' => 'SBI', 'segment' => 'Taxi', 'segment_remarks' => '6+1 - Excluding Innova , Innova crysta, Hycross, Scorpio, Bolero', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age) & Non NCB Less 3%', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '1000 - 1499 CC', 'points' => 31],
			['insurer' => 'SBI', 'segment' => 'Taxi', 'segment_remarks' => '6+1 - Excluding Innova , Innova crysta, Hycross, Scorpio, Bolero', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age) & Non NCB Less 3%', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Above 1499 CC', 'points' => 33],

			['insurer' => 'SBI', 'segment' => 'Taxi', 'segment_remarks' => '6+1 - Only Innova , Innova crysta, Hycross, Scorpio, Bolero', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age) & Non NCB Less 3%', 'policy_type' => 'Comprehensive', 'location' => 'BR01, JH01', 'remarks_additional' => 'With Nil Dep', 'points' => 23],
			['insurer' => 'SBI', 'segment' => 'Taxi', 'segment_remarks' => '6+1 - Only Innova , Innova crysta, Hycross, Scorpio, Bolero', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age) & Non NCB Less 3%', 'policy_type' => 'Comprehensive', 'location' => 'BR01, JH01', 'remarks_additional' => 'Without Nil Dep', 'points' => 30],
			['insurer' => 'SBI', 'segment' => 'Taxi', 'segment_remarks' => '6+1 - Only Innova , Innova crysta, Hycross, Scorpio, Bolero', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age) & Non NCB Less 3%', 'policy_type' => 'Third Party', 'location' => 'BR01, JH01', 'remarks_additional' => '', 'points' => 33],

			['insurer' => 'SHRIRAM', 'segment' => 'Taxi', 'segment_remarks' => 'Upto 10 Seating', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 15 Years - EV Decline', 'points' => 22],

			// ========================================
            // LCV - MCV - HCV - GOODS CARRYING VEHICLE
            // ========================================

			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Excluding Muzaffarpur, Bhagalpur', 'points' => 41],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 55],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 57],

			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Bihar', 'remarks_additional' => 'Exclude - South 24 parganas , Muzzaffarpur', 'points' => 18],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Jharkhand', 'remarks_additional' => '-', 'points' => 8],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Bihar, Jharkhand', 'remarks_additional' => 'All BOLERO and MAX PICK UP models', 'points' => 31],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Bihar, Jharkhand', 'remarks_additional' => 'Other Model', 'points' => 55],

			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '3501-7500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Bihar', 'remarks_additional' => 'Muzzaffarpur Declined', 'points' => 13],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '3501-7500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Jharkhand', 'remarks_additional' => 'Exclude - Giridh, Chatra, Pakur', 'points' => 8],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '3501-7500 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '-', 'points' => 41],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '3501-7500 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '-', 'points' => 42],

			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '7501-15000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Bihar, Jharkhand', 'remarks_additional' => '-', 'points' => 13],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '7501-15000 GVW', 'policy_type' => 'Third Party', 'location' => 'Bihar', 'remarks_additional' => '-', 'points' => 55],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '7501-15000 GVW', 'policy_type' => 'Third Party', 'location' => 'Jharkhand', 'remarks_additional' => '', 'points' => 45],

			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '15001 - 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Bihar', 'remarks_additional' => 'Muzzaffarpur Declined', 'points' => 13],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '15001 - 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '-', 'points' => 8],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '15001 - 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'Bihar', 'remarks_additional' => '', 'points' => 26],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '15001 - 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 38],

			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '20001 - 30000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Bihar', 'remarks_additional' => '-', 'points' => 13],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '20001 - 30000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '-', 'points' => 8],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '20001 - 43000 GVW', 'policy_type' => 'Third Party', 'location' => 'Bihar', 'remarks_additional' => '', 'points' => 36],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '20001 - 43000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 42],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => '30001- 43000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'In Bihar- M&M Decline', 'points' => 13],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => 'Above 43000 GVW', 'policy_type' => 'Third Party', 'location' => 'Hazaribag', 'remarks_additional' => 'JH02', 'points' => 31],
			['insurer' => 'BAJAJ', 'segment' => '3W GCV', 'segment_remarks' => 'Above 43000 GVW', 'policy_type' => 'Third Party', 'location' => 'Rest of JH', 'remarks_additional' => '', 'points' => 41],

			['insurer' => 'KOTAK', 'segment' => '3W GCV', 'segment_remarks' => '12001 -20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'As Per Allowed RTO\'s', 'remarks_additional' => '', 'points' => 24],
			['insurer' => 'KOTAK', 'segment' => '3W GCV', 'segment_remarks' => '20001 - 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'As Per Allowed RTO\'s', 'remarks_additional' => '', 'points' => 22],

			['insurer' => 'DIGIT', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH, BR', 'remarks_additional' => 'Upto 2 years', 'points' => 41],
			['insurer' => 'DIGIT', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH, BR', 'remarks_additional' => 'Above 2 Years', 'points' => 46],
			['insurer' => 'DIGIT', 'segment' => '3W GCV', 'segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Jharkhand', 'remarks_additional' => '-', 'points' => 12],
			['insurer' => 'DIGIT', 'segment' => '3W GCV', 'segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Jharkhand', 'remarks_additional' => '-', 'points' => 18],

			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'JH, BR', 'remarks_additional' => '-', 'points' => 53],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '', 'points' => 48],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 43],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '', 'points' => 30],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Upto 6 Yrs', 'points' => 33],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '2501-3500 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Above 6 Yrs', 'points' => 35],

			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '3501-12000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => '-', 'points' => 27],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '3501-12000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => '-', 'points' => 31],

			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'Brand New', 'points' => 13],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Above 1 to 6 Years', 'points' => 18],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 1 to 6 Years', 'points' => 30],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Above 6 Years', 'points' => 30],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => '', 'points' => 46],

			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '20001-35000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Brand New', 'points' => 22],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '20001-35000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Brand New', 'points' => 16],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '20001-35000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Above 1 to 6 Years', 'points' => 18],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '20001-35000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 1 to 6 Years', 'points' => 30],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '20001-35000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Above 6 Years', 'points' => 30],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '20001-35000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => '-', 'points' => 46],

			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '35001-45000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Brand New', 'points' => 18],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '35001-45000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Brand New', 'points' => 16],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '35001-45000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Above 1 to 6 Years', 'points' => 18],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '35001-45000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 1 to 6 Years', 'points' => 30],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '35001-45000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Above 6 Years', 'points' => 30],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => '35001-45000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => '-', 'points' => 46],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => 'Above 45000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '-', 'points' => 16],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => 'Above 45000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Upto 6 Years', 'points' => 34],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => 'Above 45000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Above 6 Years', 'points' => 38],
			['insurer' => 'TATA', 'segment' => '3W GCV', 'segment_remarks' => 'Above 45000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '-', 'points' => 18],

			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'New', 'points' => 38],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'New', 'points' => 40],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 55],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 54],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Above 5 Years', 'points' => 60],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 5 Years', 'points' => 57],

			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'New', 'points' => 18],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 24],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Above 5 Years', 'points' => 39],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'New', 'points' => 18],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 27],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '12001-20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 5 Years', 'points' => 36],

			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'New', 'points' => 18],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 22],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Above 5 Years', 'points' => 39],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'New', 'points' => 18],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 27],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '20001-40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 5 Years', 'points' => 34],

			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '40001- 43500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'New', 'points' => 11],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '40001- 43500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 25],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '40001- 43500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'New', 'points' => 15],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '40001- 43500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 27],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '40001- 43500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Above 5 Years', 'points' => 31],

			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 55],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 54],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Above 5 Years', 'points' => 57],

			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '12001 - 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 36],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '12001 - 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 42],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '12001 - 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Above 5 Years', 'points' => 46],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '12001 - 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Above 5 Years', 'points' => 45],

			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '20001 - 40000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 27],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '20001 - 40000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Above 1 to 5 Years', 'points' => 22],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '20001 - 40000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Above 5 Years', 'points' => 31],
			['insurer' => 'LIBERTY', 'segment' => '3W GCV', 'segment_remarks' => '20001 - 40000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Above 5 Years', 'points' => 45],

			['insurer' => 'RELIANCE', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR', 'remarks_additional' => ' TATA & Maruti Only', 'points' => 60],
			['insurer' => 'RELIANCE', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'JH', 'remarks_additional' => ' TATA & Maruti Only', 'points' => 28],
			['insurer' => 'RELIANCE', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR', 'remarks_additional' => 'Mahindra - Jeeto, Supro & Maxximo Makes Only', 'points' => 55],
			['insurer' => 'RELIANCE', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'JH', 'remarks_additional' => 'Mahindra - Jeeto, Supro & Maxximo Makes Only', 'points' => 23],
			['insurer' => 'RELIANCE', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Other Than TATA & Maruti & Mahindra - Jeeto, Supro & Maxximo Makes Only', 'points' => 43],

			['insurer' => 'SOMPO', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 3500 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH, BR', 'remarks_additional' => 'Upto 25 Years', 'points' => 30],
			['insurer' => 'SOMPO', 'segment' => '3W GCV', 'segment_remarks' => 'Above 3500 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH', 'remarks_additional' => 'Upto 25 Years', 'points' => 26],
			['insurer' => 'SOMPO', 'segment' => '3W GCV', 'segment_remarks' => '3501- 20000 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => 'Upto 25 Years', 'points' => 26],
			['insurer' => 'SOMPO', 'segment' => '3W GCV', 'segment_remarks' => 'Above 20000 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => 'Upto 25 Years', 'points' => 20],

			['insurer' => 'HDFC', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH, BR', 'remarks_additional' => '', 'points' => 27],
			['insurer' => 'HDFC', 'segment' => '3W GCV', 'segment_remarks' => '2501- 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH, BR', 'remarks_additional' => '', 'points' => 18],
			['insurer' => 'HDFC', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Third Party', 'location' => 'JH, BR', 'remarks_additional' => '', 'points' => 46],
			['insurer' => 'HDFC', 'segment' => '3W GCV', 'segment_remarks' => '2501- 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'JH, BR', 'remarks_additional' => '', 'points' => 22],

			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR', 'remarks_additional' => '-', 'points' => '80'],
			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => '2501- 3500 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => '69'],
			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'JH', 'remarks_additional' => '-', 'points' => '69'],
			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => '2501- 3500 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'JH', 'remarks_additional' => '-', 'points' => '65'],
			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => 'Mahindra Bolero Only', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR', 'remarks_additional' => 'Mahindra Bolero Only', 'points' => '72'],
			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => 'Mahindra Bolero Only', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'JH', 'remarks_additional' => 'Mahindra Bolero Only', 'points' => '67'],

			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR', 'remarks_additional' => '-', 'points' => '56'],
			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'JH', 'remarks_additional' => '-', 'points' => '47'],
			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => '7501- 12000 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR', 'remarks_additional' => '-', 'points' => '32'],
			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => '7501- 12000 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'JH', 'remarks_additional' => '-', 'points' => '47'],

			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => '12001- 40000 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR', 'remarks_additional' => '-', 'points' => '58'],
			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'JH', 'remarks_additional' => '-', 'points' => '50'],
			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => '60'],
			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR', 'remarks_additional' => '-', 'points' => '36'],
			['insurer' => 'FUTURE', 'segment' => '3W GCV', 'segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'JH', 'remarks_additional' => '-', 'points' => '50'],

			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW ', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '', 'points' => 47],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW ', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '', 'points' => 50],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '2501- 2800 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '', 'points' => 39],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '2501- 2800 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '', 'points' => 31],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '2801- 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '', 'points' => 30],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '2801- 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '', 'points' => 27],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '', 'points' => 18],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '', 'points' => 22],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '7501 - 12000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => '', 'points' => 22],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '12001 - 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Upto 5 Years', 'points' => 27],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '12001 - 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Upto 5 Years', 'points' => 19],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '12001 - 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Above 5 Years', 'points' => 30],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '12001 - 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 5 Years', 'points' => 22],

			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '20001 - 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Upto 5 Years', 'points' => 25],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '20001 - 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Upto 5 Years', 'points' => 35],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '20001 - 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Above 5 Years', 'points' => 31],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '20001 - 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 5 Years', 'points' => 35],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'ALL AGES', 'points' => 22],

			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2500 GVW', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => '', 'points' => 26],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '2501- 2800 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 36],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '2501- 2800 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 24],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '2801- 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 31],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 29],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '2801- 7500 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 22],

			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '7501- 12000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 40],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '7501- 12000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 26],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Upto 5 Years', 'points' => 25],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Above 5 Years', 'points' => 34],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Above 5 Years', 'points' => 26],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Upto 5 Years', 'points' => 24],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Above 5 Years', 'points' => 39],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Above 5 Years', 'points' => 40],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 35],
			['insurer' => 'MAGMA', 'segment' => '3W GCV', 'segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 34],

			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2450 GVW', 'notice' => 'In ICICI - Upto 3500 GVW- Wherever it\'s mentioned Maruti , It\'s Maruti super carry only. Ecco and Omni are negative models.', 'policy_type' => 'Comprehensive - New', 'location' => 'Patna', 'remarks_additional' => 'Only Tata', 'points' => 27],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2450 GVW', 'notice' => 'In ICICI - Upto 3500 GVW- Wherever it\'s mentioned Maruti , It\'s Maruti super carry only. Ecco and Omni are negative models.', 'policy_type' => 'Comprehensive - New', 'location' => 'Patna', 'remarks_additional' => 'Only M&M', 'points' => 36],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2450 GVW', 'notice' => 'In ICICI - Upto 3500 GVW- Wherever it\'s mentioned Maruti , It\'s Maruti super carry only. Ecco and Omni are negative models.', 'policy_type' => 'Comprehensive - New', 'location' => 'Rest of BR', 'remarks_additional' => '', 'points' => 18],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2450 GVW', 'notice' => 'In ICICI - Upto 3500 GVW- Wherever it\'s mentioned Maruti , It\'s Maruti super carry only. Ecco and Omni are negative models.', 'policy_type' => 'Comprehensive + Third Party - Old', 'location' => 'Patna', 'remarks_additional' => '', 'points' => 46],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2450 GVW', 'notice' => 'In ICICI - Upto 3500 GVW- Wherever it\'s mentioned Maruti , It\'s Maruti super carry only. Ecco and Omni are negative models.', 'policy_type' => 'Comprehensive + Third Party - Old', 'location' => 'Rest of BR', 'remarks_additional' => '', 'points' => 36],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2450 GVW', 'notice' => 'In ICICI - Upto 3500 GVW- Wherever it\'s mentioned Maruti , It\'s Maruti super carry only. Ecco and Omni are negative models.', 'policy_type' => 'Comprehensive + Third Party - Old', 'location' => 'Ranchi', 'remarks_additional' => 'Upto 5 Yrs', 'points' => 36],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2450 GVW', 'notice' => 'In ICICI - Upto 3500 GVW- Wherever it\'s mentioned Maruti , It\'s Maruti super carry only. Ecco and Omni are negative models.', 'policy_type' => 'Comprehensive + Third Party - Old', 'location' => 'Ranchi', 'remarks_additional' => 'Above 5 Years', 'points' => 31],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2450 GVW', 'notice' => 'In ICICI - Upto 3500 GVW- Wherever it\'s mentioned Maruti , It\'s Maruti super carry only. Ecco and Omni are negative models.', 'policy_type' => 'Comprehensive + Third Party - Old', 'location' => 'Rest of JH', 'remarks_additional' => '', 'points' => 41],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => '2451 - 3500 GVW', 'notice' => 'In ICICI - Upto 3500 GVW- Wherever it\'s mentioned Maruti , It\'s Maruti super carry only. Ecco and Omni are negative models.', 'policy_type' => 'Comprehensive + Third Party - Old', 'location' => 'Patna', 'remarks_additional' => 'M&M Only Ranchi Decline', 'points' => 13],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => '2451 - 3500 GVW', 'notice' => 'In ICICI - Upto 3500 GVW- Wherever it\'s mentioned Maruti , It\'s Maruti super carry only. Ecco and Omni are negative models.', 'policy_type' => 'Comprehensive + Third Party - Old', 'location' => 'Rest of BR, JH', 'remarks_additional' => 'M&M Only Ranchi Decline', 'points' => 18],
			['insurer' => 'ICICI', 'segment' => '3W GCV', 'segment_remarks' => '7501- 12000 GVW', 'notice' => 'In ICICI - Upto 3500 GVW- Wherever it\'s mentioned Maruti , It\'s Maruti super carry only. Ecco and Omni are negative models.', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '', 'points' => 27],

			['insurer' => 'CHOLA', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 3500 GVW - Without CPA Less 1.5%', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Allowed Makes :- TATA/ Maruti/ Mahindra Allowed Models :- Ace, Super Ace, Yodha, Xenon, Magic, Intra, Super Carry, Mahindra Jeeto,Tractor ,Supro', 'points' => 41],
			['insurer' => 'CHOLA', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 3500 GVW - Without CPA Less 1.5%', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'All Other Makes - Including Electric Without CPA Less 1.5%', 'points' => 31],
			['insurer' => 'CHOLA', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 3500 GVW - Without CPA Less 1.5%', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'All Other Makes - Including Electric Without CPA Less 1.5%', 'points' => 24],
			['insurer' => 'CHOLA', 'segment' => '3W GCV', 'segment_remarks' => '3501-7500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Without CPA Less 1.5%', 'points' => 13],
			['insurer' => 'CHOLA', 'segment' => '3W GCV', 'segment_remarks' => '7501- 16000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Without CPA Less 1.5%', 'points' => 15],
			
			['insurer' => 'CHOLA', 'segment' => '3W GCV', 'segment_remarks' => '16001- 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Without CPA Less 1.5%', 'points' => 10],
			['insurer' => 'CHOLA', 'segment' => '3W GCV', 'segment_remarks' => '20001-43000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Without CPA Less 1.5%', 'points' => 24],
			['insurer' => 'CHOLA', 'segment' => '3W GCV', 'segment_remarks' => '43001- 47500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Without CPA Less 1.5%', 'points' => 15],
			['insurer' => 'CHOLA', 'segment' => '3W GCV', 'segment_remarks' => '3501-16000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Without CPA Less 1.5%', 'points' => 8],
			['insurer' => 'CHOLA', 'segment' => '3W GCV', 'segment_remarks' => '20001-43000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Without CPA Less 1.5%', 'points' => 15],

			['insurer' => 'SHRIRAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2800 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH, BR', 'remarks_additional' => 'Upto 15 Years', 'points' => 31],
			['insurer' => 'SHRIRAM', 'segment' => '3W GCV', 'segment_remarks' => '2801-3500 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH, BR', 'remarks_additional' => 'Upto 15 Years', 'points' => 36],
			['insurer' => 'SHRIRAM', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Upto 15 Years', 'points' => 18],
			['insurer' => 'SHRIRAM', 'segment' => '3W GCV', 'segment_remarks' => '7501- 12000 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Upto 15 Years', 'points' => 14],
			['insurer' => 'SHRIRAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => 'Comp - Upto 15 Years & TP - Upto 25 Years', 'points' => 22],
			['insurer' => 'SHRIRAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH', 'remarks_additional' => 'Comp - Upto 15 Years & TP - Upto 25 Years', 'points' => 17],
			['insurer' => 'SHRIRAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 42500 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Comp - Upto 15 Years & TP - Upto 25 Years', 'points' => 25],
			['insurer' => 'SHRIRAM', 'segment' => '3W GCV', 'segment_remarks' => '42501- 50000 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Comp - Upto 15 Years & TP - Upto 25 Years', 'points' => 21],
			['insurer' => 'SHRIRAM', 'segment' => '3W GCV', 'segment_remarks' => 'Above 50000 GVW', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Comp - Upto 15 Years & TP - Upto 25 Years', 'points' => 13],

			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2300 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '', 'points' => 59],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2300 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '', 'points' => 52],

			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Patna', 'remarks_additional' => '', 'points' => 9],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Muzaffarpur', 'remarks_additional' => '', 'points' => 10],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Bhagalpur', 'remarks_additional' => '', 'points' => 11],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Bokaro', 'remarks_additional' => '', 'points' => 12],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Gaya, Purnia', 'remarks_additional' => '', 'points' => 13],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Rest Of Bihar', 'remarks_additional' => '', 'points' => 19],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Hazaribagh, Ranchi, Rest Of Jh', 'remarks_additional' => '', 'points' => 21],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Dhanbad, East Singhbhum', 'remarks_additional' => '', 'points' => 28],

			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'East Singhbhum', 'remarks_additional' => '', 'points' => 16],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Dhanbad', 'remarks_additional' => '', 'points' => 14],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '7501- 12000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Bihar', 'remarks_additional' => '', 'points' => 9],

			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Upto 85 % Disc with Nil dep other than Tata & AL', 'points' => 19],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Upto 85 % Disc with Nil dep other than Tata & AL', 'points' => 28],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Upto 85 % Disc without Nil dep other than Tata & AL', 'points' => 22],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Upto 85 % Disc without Nil dep other than Tata & AL', 'points' => 28],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Upto 90 % Disc with Nil dep - Tata & AL', 'points' => 18],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Bhagalpur, Gaya, Muzaffarpur, Patna, Purnia', 'remarks_additional' => 'Upto 90 % Disc with Nil dep - Tata & AL', 'points' => 21],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Rest Of Bihar', 'remarks_additional' => 'Upto 90 % Disc with Nil dep - Tata & AL', 'points' => 19],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Upto 90 % Disc without Nil dep - Tata & AL', 'points' => 28],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Upto 90 % Disc without Nil dep - Tata & AL', 'points' => 38],

			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Bokaro, Hazaribagh, Ranchi, East Singhbhum', 'remarks_additional' => 'Upto 85 % Disc with Nil dep other than Tata & AL', 'points' => 21],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Dhanbad', 'remarks_additional' => 'Upto 85 % Disc with Nil dep other than Tata & AL', 'points' => 17],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Rest of JH', 'remarks_additional' => 'Upto 85 % Disc with Nil dep other than Tata & AL', 'points' => 12],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Bokaro, Hazaribagh, Ranchi, East Singhbhum', 'remarks_additional' => 'Upto 85 % Disc without Nil dep other than Tata & AL', 'points' => 24],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Dhanbad', 'remarks_additional' => 'Upto 85 % Disc without Nil dep other than Tata & AL', 'points' => 19],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Rest of JH', 'remarks_additional' => 'Upto 85 % Disc without Nil dep other than Tata & AL', 'points' => 15],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Bhagalpur, Gaya, Muzaffarpur, Patna', 'remarks_additional' => 'Upto 85 % Disc - other than Tata & AL', 'points' => 26],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Purnia', 'remarks_additional' => 'Upto 85 % Disc - other than Tata & AL', 'points' => 17],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Rest of BR', 'remarks_additional' => 'Upto 85 % Disc - other than Tata & AL', 'points' => 22],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Bokaro, Hazaribagh, Ranchi, East Singhbhum', 'remarks_additional' => 'Upto 90 % Disc with Nil dep - Tata & AL', 'points' => 19],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Dhanbad', 'remarks_additional' => 'Upto 90 % Disc with Nil dep - Tata & AL', 'points' => 14],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'Rest of JH', 'remarks_additional' => 'Upto 90 % Disc with Nil dep - Tata & AL', 'points' => 9],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Upto 90 % Disc with Nil dep - Tata & AL', 'points' => 20],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Upto 90 % Disc without Nil dep - Tata & AL', 'points' => 28],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Upto 90 % Disc without Nil dep - Tata & AL', 'points' => 35],

			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2300 GVW', 'policy_type' => 'Third Party', 'location' => 'Bokaro', 'remarks_additional' => '', 'points' => 33],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2300 GVW', 'policy_type' => 'Third Party', 'location' => 'Hazaribagh', 'remarks_additional' => '', 'points' => 38],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2300 GVW', 'policy_type' => 'Third Party', 'location' => 'Ranchi', 'remarks_additional' => '', 'points' => 42],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2300 GVW', 'policy_type' => 'Third Party', 'location' => 'Dhanbad, Rest Of Jharkhand', 'remarks_additional' => '', 'points' => 46],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2300 GVW', 'policy_type' => 'Third Party', 'location' => 'East Singhbhum', 'remarks_additional' => '', 'points' => 51],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2300 GVW', 'policy_type' => 'Third Party', 'location' => 'Purnia, Bhagalpur, Gaya, Muzaffarpur, Patna', 'remarks_additional' => '', 'points' => 55],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2300 GVW', 'policy_type' => 'Third Party', 'location' => 'Rest Of Bihar', 'remarks_additional' => '', 'points' => 60],

			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Bokaro', 'remarks_additional' => '', 'points' => 23],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Patna', 'remarks_additional' => '', 'points' => 25],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Muzaffarpur', 'remarks_additional' => '', 'points' => 26],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Bhagalpur', 'remarks_additional' => '', 'points' => 27],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Hazaribagh', 'remarks_additional' => '', 'points' => 27],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Gaya', 'remarks_additional' => '', 'points' => 28],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Purnia', 'remarks_additional' => '', 'points' => 29],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '2301- 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'Rest Of Bihar, Rest Of Jharkhand', 'remarks_additional' => '', 'points' => 31],

			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Third Party', 'location' => 'Hazaribagh', 'remarks_additional' => '', 'points' => 11],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Third Party', 'location' => 'Ranchi', 'remarks_additional' => '', 'points' => 16],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Third Party', 'location' => 'Rest Of Bihar', 'remarks_additional' => 'Excluding - Gaya, Purnia, Bhagalpur, Muzaffarpur, Patna', 'points' => 18],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Third Party', 'location' => 'Dhanbad', 'remarks_additional' => '', 'points' => 25],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Third Party', 'location' => 'Rest Of Jharkhand', 'remarks_additional' => 'Excluding- Bokaro', 'points' => 22],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '3501- 7500 GVW', 'policy_type' => 'Third Party', 'location' => 'East Singhbhum', 'remarks_additional' => '', 'points' => 34],

			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '7501- 12000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 20],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '7501- 12000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 28],

			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'Ranchi', 'remarks_additional' => '', 'points' => 30],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'Hazaribagh', 'remarks_additional' => '', 'points' => 31],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'Dhanbad', 'remarks_additional' => '', 'points' => 34],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'Bokaro, Rest Of Jharkhand', 'remarks_additional' => '', 'points' => 36],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'Muzaffarpur, East Singhbhum', 'remarks_additional' => '', 'points' => 37],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '12001- 20000 GVW', 'policy_type' => 'Third Party', 'location' => 'Rest Of Bihar', 'remarks_additional' => '', 'points' => 41],

			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 31],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 27],

			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Electric Only', 'points' => 46],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 3500 GVW', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Electric Only', 'points' => 48],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Electric Only', 'points' => 53],
			['insurer' => 'ROYAL SUNDARAM', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 3500 GVW', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => 'Electric Only', 'points' => 55],

			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2000 GVW -All makes & 2001-2500 GVW Tata makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'NEW- (Except EV)', 'points' => 56],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2000 GVW -All makes & 2001-2500 GVW Tata makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Old - (Except EV)', 'points' => 61],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => 'Upto 2000 GVW -All makes & 2001-2500 GVW Tata makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Old - (Except EV)', 'points' => 59],

			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '2001- 2500 GVW - Other than Tata makes Only', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'New- (Except EV)', 'points' => 45],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '2001- 2500 GVW - Other than Tata makes Only', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Old -(Except EV)', 'points' => 47],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '2001- 2500 GVW - Other than Tata makes Only', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'policy_type' => 'Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Old -(Except EV)', 'points' => 49],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '2501- 3500 GVW', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'policy_type' => 'Comprehensive & Third Party', 'location' => 'BR, JH', 'remarks_additional' => 'Only TATA & Ashok Leyland, Mahindra', 'points' => 43],

			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '3501- 5000 GVW', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => 'Excluding- Eicher & Mahindra', 'points' => 22],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '5001- 7500 GVW', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => 'Excluding- Eicher & Mahindra', 'points' => 20],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '7501- 12000 GVW', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Excluding- Eicher', 'points' => 22],

			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => 'New', 'points' => 12],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => '1-5 Years', 'points' => 14],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => '5-15 Years', 'points' => 17],

			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => 'New', 'points' => 20],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'BR', 'remarks_additional' => '1-5 Years', 'points' => 33],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'JH', 'remarks_additional' => '1-5 Years', 'points' => 26],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'BR', 'remarks_additional' => '5-15 Years', 'points' => 34],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'JH', 'remarks_additional' => '5-15 Years', 'points' => 31],

			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => 'New', 'points' => 14],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => '1-5 Years', 'points' => 16],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => '5-25 Years', 'points' => 18],

			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => 'New', 'points' => 20],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'BR', 'remarks_additional' => '1-5 Years', 'points' => 34],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'JH', 'remarks_additional' => '1-5 Years', 'points' => 27],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'BR', 'remarks_additional' => '5-25 Years', 'points' => 36],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '12000- 20000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'JH', 'remarks_additional' => '5-25 Years', 'points' => 31],


			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => 'New', 'points' => 15],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => '1-5 Years', 'points' => 17],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => '5-15 Years', 'points' => 19],

			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => 'New', 'points' => 21],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'BR', 'remarks_additional' => '1-5 Years', 'points' => 33],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'JH', 'remarks_additional' => '1-5 Years', 'points' => 27],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'BR', 'remarks_additional' => '5-15 Years', 'points' => 34],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'JH', 'remarks_additional' => '5-15 Years', 'points' => 31],

			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'BR', 'remarks_additional' => 'New', 'points' => 18],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'JH', 'remarks_additional' => 'New', 'points' => 18],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'BR', 'remarks_additional' => '1-5 Years', 'points' => 20],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'JH', 'remarks_additional' => '1-5 Years', 'points' => 19],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'BR', 'remarks_additional' => '5-25 Years', 'points' => 23],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'JH', 'remarks_additional' => '5-25 Years', 'points' => 22],

			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => 'New', 'points' => 23],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'BR', 'remarks_additional' => '1-5 Years', 'points' => 34],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'JH', 'remarks_additional' => '1-5 Years', 'points' => 28],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'BR', 'remarks_additional' => '5-25 Years', 'points' => 36],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => '20001- 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'JH', 'remarks_additional' => '5-25 Years', 'points' => 31],

			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'BR', 'remarks_additional' => 'Upto 15 Years', 'points' => 8],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'JH', 'remarks_additional' => 'Upto 15 Years', 'points' => 9],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 5 Years', 'points' => 14],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => '5 -15 Years', 'points' => 15],

			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'BR', 'remarks_additional' => 'Upto 25 Years', 'points' => 9],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'Other Than TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'JH', 'remarks_additional' => 'Upto 15 Years', 'points' => 10],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 5 Years', 'points' => 15],
			['insurer' => 'SBI', 'segment' => '3W GCV', 'segment_remarks' => 'Above 40000 GVW', 'policy_type' => 'Third Party', 'policy_type_remarks' => 'TATA & Ashok Leyland Makes', 'notice' => 'In SBI - (Comp- Upto 15 Years Age & TP- Upto 25 Years Age)', 'location' => 'All RTOs', 'remarks_additional' => '5 -25 Years', 'points' => 17],

			// ========================================
            // SCHOOL BUS / STAFF BUS
            // ========================================

			['insurer' => 'BAJAJ', 'segment' => 'Staff Bus', 'policy_type' => 'Comprehensive', 'location' => 'Bihar, Jharkhand', 'remarks_additional' => 'Above 10 Seater', 'points' => 22],
			['insurer' => 'BAJAJ', 'segment' => 'Staff Bus', 'policy_type' => 'Third Party', 'location' => 'Bihar, Jharkhand', 'remarks_additional' => 'Above 10 Seater', 'points' => 48],
			['insurer' => 'BAJAJ', 'segment' => 'Staff Bus', 'policy_type' => 'Comprehensive', 'location' => 'Bihar, Jharkhand', 'remarks_additional' => 'Upto 10 Seater', 'points' => 17],
			['insurer' => 'BAJAJ', 'segment' => 'Staff Bus', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => 'Upto 10 Seater', 'points' => 31],

			['insurer' => 'DIGIT', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive + Third Party', 'policy_type_remarks' => 'Electric Declined', 'location' => 'All RTOs', 'remarks_additional' => 'On School Name - 8 & Above Seater Only', 'points' => 73],
			['insurer' => 'DIGIT', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive + Third Party', 'policy_type_remarks' => 'Electric Declined', 'location' => 'All RTOs', 'remarks_additional' => 'On Other Name - 8 & Above Seater Only', 'points' => 60],
			['insurer' => 'DIGIT', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive + Third Party', 'policy_type_remarks' => 'Electric Declined', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 7 Seater Only', 'points' => 28],
			['insurer' => 'DIGIT', 'segment' => 'School Bus', 'segment_remarks' => 'Staff Bus', 'policy_type' => 'Comprehensive + Third Party', 'policy_type_remarks' => 'Electric Declined', 'location' => 'All RTOs', 'remarks_additional' => 'On Company Name - Above 10 Seater Only', 'points' => 48],
			['insurer' => 'DIGIT', 'segment' => 'School Bus', 'segment_remarks' => 'Staff Bus', 'policy_type' => 'Comprehensive + Third Party', 'policy_type_remarks' => 'Electric Declined', 'location' => 'All RTOs', 'remarks_additional' => 'On Transporter Name - Above 10 Seater Only - On Individual Name Declined', 'points' => 26],

			['insurer' => 'TATA', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 11 Str', 'points' => 48],
			['insurer' => 'TATA', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Above 11 Str', 'points' => 75],
			['insurer' => 'TATA', 'segment' => 'School Bus', 'segment_remarks' => 'Staff Bus', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Above 11 Seater', 'points' => 39],
			['insurer' => 'TATA', 'segment' => 'School Bus', 'segment_remarks' => 'Staff Bus', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 11 Seater', 'points' => 26],

			['insurer' => 'ICICI', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive', 'location' => 'BR, Ranchi', 'remarks_additional' => 'Upto 17 Str', 'points' => 73],
			['insurer' => 'ICICI', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive- Old', 'location' => 'Rest of JH', 'remarks_additional' => 'Upto 17 Str', 'points' => 72],
			['insurer' => 'ICICI', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive', 'location' => 'Patna', 'remarks_additional' => '18- 36 Str', 'points' => 70],
			['insurer' => 'ICICI', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive', 'location' => 'Rest of BR', 'remarks_additional' => '18- 36 Str', 'points' => 73],
			['insurer' => 'ICICI', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive', 'location' => 'Ranchi', 'remarks_additional' => '18- 36 Str', 'points' => 68],
			['insurer' => 'ICICI', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive', 'location' => 'Rest of JH', 'remarks_additional' => '18- 36 Str', 'points' => 48],
			['insurer' => 'ICICI', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Above 36 Str', 'points' => 68],
			['insurer' => 'ICICI', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive', 'location' => 'Patna', 'remarks_additional' => 'Above 36 Str', 'points' => 38],
			['insurer' => 'ICICI', 'segment' => 'School Bus', 'policy_type' => 'Comprehensive', 'location' => 'Rest of BR', 'remarks_additional' => 'Above 36 Str', 'points' => 55],
			['insurer' => 'ICICI', 'segment' => 'School Bus', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Upto 36 Str', 'points' => 48],
			['insurer' => 'ICICI', 'segment' => 'School Bus', 'policy_type' => 'Third Party', 'location' => 'JH, Rest of BR', 'remarks_additional' => 'Above 36 Str', 'points' => 48],
			['insurer' => 'ICICI', 'segment' => 'School Bus', 'policy_type' => 'Third Party', 'location' => 'Patna', 'remarks_additional' => 'Above 36 Str', 'points' => 33],

			// ========================================
            // TRACTOR
            // ========================================

			['insurer' => 'BAJAJ', 'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'location' => 'Bihar', 'remarks_additional' => 'Without Trailer', 'points' => 22],
			['insurer' => 'BAJAJ', 'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'location' => 'Jharkhand', 'remarks_additional' => 'Without Trailer', 'points' => 26],
			['insurer' => 'BAJAJ', 'segment' => 'Tractor', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Without Trailer', 'points' => 40],

			['insurer' => 'DIGIT', 'segment' => 'Tractor', 'policy_type' => 'Third Party', 'location' => 'Jharkhand', 'remarks_additional' => 'Upto 5 years', 'points' => 30],
			['insurer' => 'DIGIT', 'segment' => 'Tractor', 'policy_type' => 'Third Party', 'location' => 'Bihar', 'remarks_additional' => 'Upto 5 years', 'points' => 28],
			['insurer' => 'DIGIT', 'segment' => 'Tractor', 'policy_type' => 'Third Party', 'location' => 'Jharkhand', 'remarks_additional' => 'Above 5 Years', 'points' => 28],
			['insurer' => 'DIGIT', 'segment' => 'Tractor', 'policy_type' => 'Third Party', 'location' => 'Bihar', 'remarks_additional' => 'Above 5 Years', 'points' => 15],

			['insurer' => 'TATA', 'segment' => 'Tractor', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH', 'remarks_additional' => '-', 'points' => 39],
			['insurer' => 'TATA', 'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Brand New', 'points' => 39],
			['insurer' => 'TATA', 'segment' => 'Tractor', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => 'Old', 'points' => 36],

			['insurer' => 'KOTAK', 'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'location' => 'Bihar_1', 'remarks_additional' => '', 'points' => 48],
			['insurer' => 'KOTAK', 'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'location' => 'Jharkhand_1', 'remarks_additional' => '', 'points' => 39],

			['insurer' => 'MAGMA', 'segment' => 'Tractor', 'segment_remarks' => 'New', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '', 'points' => 27],
			['insurer' => 'MAGMA', 'segment' => 'Tractor', 'segment_remarks' => 'New', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '', 'points' => 22],
			['insurer' => 'MAGMA', 'segment' => 'Tractor', 'segment_remarks' => 'Old', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '', 'points' => 28],
			['insurer' => 'MAGMA', 'segment' => 'Tractor', 'segment_remarks' => 'Old', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '', 'points' => 23],
			['insurer' => 'MAGMA', 'segment' => 'Tractor', 'segment_remarks' => 'Old', 'policy_type' => 'Third Party', 'location' => 'BR', 'remarks_additional' => '', 'points' => 33],
			['insurer' => 'MAGMA', 'segment' => 'Tractor', 'segment_remarks' => 'Old', 'policy_type' => 'Third Party', 'location' => 'JH', 'remarks_additional' => '', 'points' => 34],

			['insurer' => 'CHOLA', 'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => 'Without CPA Less 1.5%', 'points' => 41],
			['insurer' => 'CHOLA', 'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => 'Without CPA Less 1.5%', 'points' => 37],

			['insurer' => 'RELIANCE', 'segment' => 'Tractor', 'segment_remarks' => 'Without Trailer', 'policy_type' => 'Comprehensive - New', 'location' => 'JH', 'remarks_additional' => 'New', 'points' => 24],
			['insurer' => 'RELIANCE', 'segment' => 'Tractor', 'segment_remarks' => 'Without Trailer', 'policy_type' => 'Comprehensive - Old', 'location' => 'JH', 'remarks_additional' => 'Upto 5 Yrs', 'points' => 41],
			['insurer' => 'RELIANCE', 'segment' => 'Tractor', 'segment_remarks' => 'Without Trailer', 'policy_type' => 'Comprehensive - Old', 'location' => 'JH', 'remarks_additional' => 'Above 5 Yrs', 'points' => 37],
			['insurer' => 'RELIANCE', 'segment' => 'Tractor', 'segment_remarks' => 'Without Trailer', 'policy_type' => 'Comprehensive - New', 'location' => 'BR', 'remarks_additional' => 'New', 'points' => 48],
			['insurer' => 'RELIANCE', 'segment' => 'Tractor', 'segment_remarks' => 'Without Trailer', 'policy_type' => 'Comprehensive - Old', 'location' => 'BR', 'remarks_additional' => 'Upto 5 Yrs', 'points' => 39],
			['insurer' => 'RELIANCE', 'segment' => 'Tractor', 'segment_remarks' => 'Without Trailer', 'policy_type' => 'Comprehensive - Old', 'location' => 'BR', 'remarks_additional' => 'Above 5 Yrs', 'points' => 35],

			['insurer' => 'ROYAL', 'segment' => 'Tractor', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Both for New and Old , without Nil dep - Comp - Trolleys / Trailers to be excluded', 'points' => 35],

			['insurer' => 'SBI', 'segment' => 'Tractor', 'segment_remarks' => 'Harvester', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => '( With Trailer ) - Upto 25 Years', 'points' => 41],
			['insurer' => 'SBI', 'segment' => 'Tractor', 'segment_remarks' => 'Harvester', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH', 'remarks_additional' => '( With Trailer ) - Upto 25 Years', 'points' => 40],

			['insurer' => 'LIBERTY', 'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'location' => 'BR', 'remarks_additional' => '-', 'points' => 46],
			['insurer' => 'LIBERTY', 'segment' => 'Tractor', 'policy_type' => 'Comprehensive', 'location' => 'JH', 'remarks_additional' => '-', 'points' => 36],

			// ========================================
            // MISD
            // ========================================

			['insurer' => 'DIGIT', 'segment' => 'MISD', 'segment_remarks' => 'JCB', 'policy_type' => 'Comprehensive', 'location' => 'Jharkhand', 'remarks_additional' => '-', 'points' => 30],
			['insurer' => 'DIGIT', 'segment' => 'MISD', 'segment_remarks' => 'JCB', 'policy_type' => 'Third Party', 'location' => 'Jharkhand', 'remarks_additional' => '', 'points' => 24],
			['insurer' => 'DIGIT', 'segment' => 'MISD', 'segment_remarks' => 'JCB', 'policy_type' => 'Comprehensive', 'location' => 'Bihar', 'remarks_additional' => 'New', 'points' => 39],
			['insurer' => 'DIGIT', 'segment' => 'MISD', 'segment_remarks' => 'JCB', 'policy_type' => 'Comprehensive', 'location' => 'Bihar', 'remarks_additional' => 'Old', 'points' => 37],
			['insurer' => 'DIGIT', 'segment' => 'MISD', 'segment_remarks' => 'JCB', 'policy_type' => 'Third Party', 'location' => 'Bihar', 'remarks_additional' => 'Old', 'points' => 28],
			['insurer' => 'DIGIT', 'segment' => 'MISD', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'JH', 'remarks_additional' => 'Other Than JCB', 'points' => 26],
			['insurer' => 'DIGIT', 'segment' => 'MISD', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => 'Other Than JCB', 'points' => 15],
			['insurer' => 'SHRIRAM', 'segment' => 'MISD', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Upto 15 Yrs', 'location' => 'BR', 'remarks_additional' => 'Excluding crane and ambulance', 'points' => 15],
			['insurer' => 'SHRIRAM', 'segment' => 'MISD', 'policy_type' => 'Comprehensive', 'policy_type_remarks' => 'Upto 15 Yrs', 'location' => 'JH', 'remarks_additional' => 'Excluding Crane, Tractor and Ambulance', 'points' => 17],
			['insurer' => 'TATA', 'segment' => 'MISD', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR, JH', 'remarks_additional' => '', 'points' => 22],
			['insurer' => 'ICICI', 'segment' => 'MISD', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'BR', 'remarks_additional' => 'Excluding CRANES', 'points' => 44],
			['insurer' => 'ICICI', 'segment' => 'MISD', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Ranchi', 'remarks_additional' => 'Excluding CRANES', 'points' => 39],
			['insurer' => 'ICICI', 'segment' => 'MISD', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'Rest of JH', 'remarks_additional' => 'Excluding CRANES', 'points' => 26],
			['insurer' => 'ICICI', 'segment' => 'MISD', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Garbage Van Only - Allowed Makes onlyTata Ace, Intra, Maruti Super Carry, M&M Bolero, Supro, Jeeto, AL Dost', 'points' => 30],
			['insurer' => 'ROYAL', 'segment' => 'MISD', 'segment_remarks' => 'Garbage Van', 'policy_type' => 'Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Electric Garbage Van Only', 'points' => 57],
			['insurer' => 'CHOLA', 'segment' => 'MISD', 'policy_type' => 'Comprehensive + Third Party', 'location' => 'All RTOs', 'remarks_additional' => 'Loader, Excavators/Earth Movers, Crane Bulldozers/Bullgraders, Road Rollers, Fork Lift Trucks - Without CPA Less 1.5%', 'points' => 26],
			['insurer' => 'CHOLA', 'segment' => 'MISD', 'segment_remarks' => 'Harvestor', 'policy_type' => 'Comprehensive', 'location' => 'BR, JH', 'remarks_additional' => 'Harvestor - Without CPA Less 1.5%', 'points' => 35],
			['insurer' => 'RELIANCE', 'segment' => 'MISD', 'policy_type' => 'Comprehensive', 'location' => 'All RTOs', 'remarks_additional' => 'CPM - Only JCB, L&T, Caterpillar Allowed', 'points' => 41],
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
                'region' => 4,
                'period' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], $policy));
        }

        $this->command->info('Seeded ' . count($policies) . ' insurance policies from September 2025 grid.');
    }
}
