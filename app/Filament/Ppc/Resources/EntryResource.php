<?php

namespace App\Filament\Ppc\Resources;

use App\Filament\Ppc\Resources\EntryResource\Pages;
use App\Models\Entry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Carbon\Carbon;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\FontWeight;


class EntryResource extends Resource
{
    protected static ?string $model = Entry::class;

    protected static ?string $navigationIcon = "heroicon-o-rectangle-stack";

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Bussiness Information
            Forms\Components\Section::make("Bussiness Details")
                ->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\Hidden::make("user_id")
                            ->default(auth()->user()->id)
                            ->dehydrated(fn($state, $record) => $record === null),

                        Forms\Components\TextInput::make("business_sourced_by")
                            ->label("Business Sourced by")
                            ->placeholder("Enter First Name")
                            ->extraInputAttributes(['maxlength' => 50]),

                        Forms\Components\TextInput::make("advisor_name")
                            ->label("Advisor/POS Name")
                            ->placeholder("Enter Advisor/POS Name")
                            ->extraInputAttributes(['maxlength' => 50]),

                        Forms\Components\TextInput::make("advisor_code")
                            ->label("Advisor / POS Code")
                            ->placeholder("Advisor / POS Code")
                            ->extraInputAttributes(['maxlength' => 50]),
                    ]),
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\Select::make("business_type_id")
                            ->label("Nature of Business")
                            ->relationship(
                                "businessType",
                                "name",
                                modifyQueryUsing: fn(
                                    Builder $query
                                ) => $query->where("is_active", true)
                            )
                            ->searchable()
                            ->preload()
                            ->placeholder("--Select--"),
                    ]),
                ])
                ->collapsible(),

            // Customer Information
            Forms\Components\Section::make("Personal Details")
                ->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make("name")
                            ->label("Name")
                            ->required()
                            ->validationMessages([
                                "required" => "Please Enter Name",
                            ])
                            ->placeholder("Enter Name")
                            ->extraInputAttributes(['maxlength' => 50]),

                        Forms\Components\TextInput::make("mobile_no")
                            ->label("Mobile No.")
                            ->required()
                            ->tel()
                            ->validationMessages([
                                "required" => "Please Enter Mobile",
                            ])
                            ->placeholder("Enter Mobile"),

                        Forms\Components\TextInput::make("email")
                            ->label("Email")
                            ->email()
                            ->placeholder("Enter Email Address"),
                    ]),

                    Fieldset::make(
                        "Upload PAN Card"
                    )
                        ->schema([
                            Forms\Components\FileUpload::make("pan_card")
                                ->label("")
                                ->placeholder("PAN Card")
                                ->preserveFilenames(),
                        ])
                        ->columns(1),

                    Fieldset::make(
                        "Upload Adhar"
                    )
                        ->schema([
                            Forms\Components\FileUpload::make("aadhaar_front")
                                ->label("")
                                ->preserveFilenames()
                                ->placeholder("Front Side"),
                            Forms\Components\FileUpload::make("aadhaar_back")
                                ->label("")
                                ->preserveFilenames()
                                ->placeholder("Back Side"),
                        ])
                        ->columns(2),
                ])
                ->collapsible(),

            // Nominee Details
            Forms\Components\Section::make("Nominee Details")
                ->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make("nominee_name")
                            ->label("Nominee Name")
                            ->helperText('Mention NA in case of Non-individual')
                            ->extraInputAttributes(['maxlength' => 50])
                            ->placeholder("Enter Nominee Name"),
                        Forms\Components\TextInput::make("nominee_relationship")
                            ->label("Nominee Relationship")
                            ->placeholder("Enter Nominee Relationship")
                            ->extraInputAttributes(['maxlength' => 50]),
                        Forms\Components\DatePicker::make("nominee_dob")
                            ->label("Nominee Date of Birth")
                            ->helperText('Mention Date of Incorporation in case of Non-individual')
                            ->placeholder("Select Nominee DOB")
                            ->format("Y-m-d"),
                    ]),
                ])
                ->collapsible(),

            // Insurance Details
            Forms\Components\Section::make("Insurance Details")
                ->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\Select::make("insurance_company_id")
                            ->label("Select Insurance Company Name")
                            ->relationship(
                                "insuranceCompany",
                                "name",
                                modifyQueryUsing: fn(
                                    Builder $query
                                ) => $query->where("is_active", true)
                            )
                            ->searchable()
                            ->preload()
                            ->required()
                            ->validationMessages([
                                "required" => "Please Select Insurance Company",
                            ])
                            ->placeholder("--Select--"),

                        Forms\Components\Select::make("insurance_type_id")
                            ->afterStateUpdated(function (Forms\Set $set) {
                                $set('life_insurance_type_id', null);
                                $set('health_insurance_type_id', null);
                            })
                            ->label("Select Type of Insurance")
                            ->relationship(
                                "insuranceType",
                                "name",
                                modifyQueryUsing: fn(
                                    Builder $query
                                ) => $query->where("is_active", true)
                            )
                            ->searchable()
                            ->preload()
                            ->placeholder("--Select--")
                            ->live(),

                        Forms\Components\Select::make("life_insurance_type_id")
                            ->label("Type of Life Insurance")
                            ->visible(fn(Forms\Get $get): bool => $get('insurance_type_id') == 1)
                            ->dehydrated()
                            ->relationship(
                                "lifeInsuranceType",
                                "name",
                                modifyQueryUsing: fn(
                                    Builder $query
                                ) => $query->where("is_active", true)
                            )
                            ->searchable()
                            ->preload()
                            ->placeholder("--Select--"),

                        Forms\Components\Select::make("health_insurance_type_id")
                            ->label("Type of Health Plan")
                            ->dehydrated()
                            ->visible(fn(Forms\Get $get): bool => $get('insurance_type_id') == 2)
                            ->relationship(
                                "healthInsuranceType",
                                "name",
                                modifyQueryUsing: fn(
                                    Builder $query
                                ) => $query->where("is_active", true)
                            )
                            ->searchable()
                            ->preload()
                            ->placeholder("--Select--"),
                        Forms\Components\Select::make(
                            "general_insurance_type_id"
                        )
                            ->label("Type of General Insurance")
                            ->dehydrated()
                            ->visible(fn(Forms\Get $get): bool => $get('insurance_type_id') == 3)
                            ->relationship(
                                "generalInsuranceType",
                                "name",
                                modifyQueryUsing: fn(
                                    Builder $query
                                ) => $query->where("is_active", true)
                            )
                            ->searchable()
                            ->preload()
                            ->placeholder("--Select--"),
                    ]),
                ])
                ->collapsible(),

            // Vehicle Details
            Forms\Components\Section::make("Vehicle Details")
                ->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\Select::make("make_id")
                            ->label("Vehicle Make")
                            ->relationship(
                                "make",
                                "name",
                                modifyQueryUsing: fn(
                                    Builder $query
                                ) => $query->where("is_active", true)
                            )
                            ->required()
                            ->validationMessages([
                                'required' => 'Please select Make',
                            ])
                            ->searchable()
                            ->preload()
                            ->placeholder("Select Make"),
                        Forms\Components\TextInput::make("vehicle_model")
                            ->label("Vehicle Model")
                            ->placeholder("Enter Vehicle Model")
                            ->validationMessages([
                                'required' => 'Please select Model',
                            ])
                            ->required()
                            ->extraInputAttributes(['maxlength' => 50]),
                        Forms\Components\TextInput::make("vehicle_number")
                            ->label("Vehicle Number")
                            ->placeholder("Enter Vehicle Number")
                            ->validationMessages([
                                'required' => 'Please enter Vehicle Number',
                            ])
                            ->required()
                            ->extraInputAttributes(['maxlength' => 12]),
                    ]),
                ])
                ->collapsible(),

            // Policy Details
            Forms\Components\Section::make("Policy Details")
                ->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make("idv")
                            ->label("Insured Declared Value (IDV)")
                            ->placeholder("Enter IDV")
                            ->numeric()
                            ->prefix('₹')
                            ->extraInputAttributes([
                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                            ]),

                        Forms\Components\TextInput::make("third_party_premium")
                            ->label("Third Party Premium")
                            ->helperText('Without GST')
                            ->placeholder("Enter Premium")
                            ->prefix('₹')
                            ->extraInputAttributes([
                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                            ])
                            ->numeric(),

                        Forms\Components\TextInput::make("own_damage_premium")
                            ->label("Own Damage and Riders Premium")
                            ->helperText('Without GST')
                            ->prefix('₹')
                            ->extraInputAttributes([
                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                            ])
                            ->placeholder("Enter Premium")
                            ->numeric(),
                    ]),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\DatePicker::make("od_risk_start_date")
                            ->label("Risk Start Date")
                            ->helperText('Own Damage')
                            ->format("Y-m-d"),

                        Forms\Components\DatePicker::make("od_risk_end_date")
                            ->label("Risk End Date")
                            ->helperText('Own Damage')
                            ->format("Y-m-d"),

                        Forms\Components\DatePicker::make("tp_risk_start_date")
                            ->label("Risk Start Date")
                            ->helperText('Third Party')
                            ->format("Y-m-d"),

                        Forms\Components\DatePicker::make("tp_risk_end_date")
                            ->label("Risk End Date")
                            ->helperText('Third Party')
                            ->format("Y-m-d"),

                        Forms\Components\DatePicker::make("risk_start_date")
                            ->label("Risk Start Date")
                            ->format("Y-m-d"),

                        Forms\Components\DatePicker::make("risk_end_date")
                            ->label("Risk End Date")
                            ->format("Y-m-d"),
                    ]),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\FileUpload::make("policy_bond")
                            ->label("")
                            ->preserveFilenames()
                            ->placeholder("Upload Policy Bond"),

                        Forms\Components\FileUpload::make("rc_copy")
                            ->label("")
                            ->preserveFilenames()
                            ->placeholder("Upload RC copy"),
                    ]),

                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\Select::make("premium_frequency_id")
                            ->label("Premium frequency")
                            ->relationship(
                                "premiumFrequency",
                                "name",
                                modifyQueryUsing: fn(
                                    Builder $query
                                ) => $query->where("is_active", true)
                            )
                            ->searchable()
                            ->preload()
                            ->placeholder("Select Premium frequency"),

                        Forms\Components\Select::make("premium_paying_term")
                            ->label("Premium Paying Term")
                            ->helperText('In number of years')
                            ->searchable()
                            ->placeholder("--Select--")
                            ->options(function () {
                                $years = [];

                                for ($year = 1; $year <= 20; $year++) {
                                    $years[$year] = $year;
                                }

                                return $years;
                            }),

                        Forms\Components\Select::make("policy_term")
                            ->label("Policy Term")
                            ->helperText('In number of years')
                            ->searchable()
                            ->placeholder("--Select--")

                            ->options(function () {
                                $years = [];

                                for ($year = 1; $year <= 50; $year++) {
                                    $years[$year] = $year;
                                }

                                return $years;
                            }),

                    ]),

                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make("sum_insured")
                            ->label("Sum Insured/Assured")
                            ->prefix('₹')
                            ->extraInputAttributes([
                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                            ])
                            ->placeholder("Sum Insured/Assured"),
                        Forms\Components\TextInput::make("premium_amount")
                            ->label("Premium Amount")
                            ->helperText('Without GST')
                            ->numeric()
                            ->prefix('₹')
                            ->extraInputAttributes([
                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                            ])
                            ->placeholder("Enter Premium Amount without GST"),
                        Forms\Components\TextInput::make("premium_amount_total")
                            ->label("Total Premium Amount")
                            ->numeric()
                            ->placeholder("Enter Total Premium Amount")
                            ->prefix('₹')
                            ->extraInputAttributes([
                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                            ]),
                    ]),

                    Forms\Components\FileUpload::make("policy_bond_receipt")
                        ->label("")
                        ->preserveFilenames()
                        ->placeholder(
                            "Upload Policy Bond / Premium Receipt"
                        ),

                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make("number_of_lives")
                            ->label("Number of lives")
                            ->numeric()
                            ->placeholder("Enter Number of lives")
                            ->extraInputAttributes([
                                'oninput' => 'if(this.value.length > 1) this.value = this.value.slice(0, 1);'
                            ]),



                        Forms\Components\TextInput::make("out_percentage")
                            ->label("Out%")
                            ->numeric()
                            ->placeholder("Enter Out%")
                            ->maxValue(100)
                            ->minValue(1)
                            ->extraInputAttributes([
                                'oninput' => 'if(this.value.length > 5) this.value = this.value.slice(0, 5);'
                            ]),

                        Forms\Components\TextInput::make("net_od")
                            ->label("Net/Od")
                            ->numeric()
                            ->placeholder("Enter Net/Od")
                            ->prefix('₹')
                            ->extraInputAttributes([
                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                            ]),
                    ]),
                ])
                ->collapsible(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\Action::make('exportCsv')
                    ->label('Download as CSV')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function ($livewire) {
                        // Get the active filters
                        $search = $livewire->tableSearch;

                        // You can also get the filter forms data
                        $filters = $livewire->tableFiltersForm->getState();

                        // Build query
                        $query = Entry::query()
						->join('users', 'users.id', '=', 'entries.user_id');
                        // Apply search
                        if (!empty($search)) {
                            $query->where(function ($q) use ($search) {
                                $q->Where('users.name', 'like', "%{$search}%")
                                    ->orWhere('entries.name', 'like', "%{$search}%")
									->orWhere('mobile_no', 'like', "%{$search}%")
                                    ->orWhere('entries.email', 'like', "%{$search}%")
									->orWhere('makes.name', 'like', "%{$search}%")
									->orWhere('vehicle_model', 'like', "%{$search}%")
                                    ->orWhere('vehicle_number', 'like', "%{$search}%")
                                    ->orWhere('premium_amount_total', 'like', "%{$search}%");
                            });
                        }

                        // Apply filters
                        if (!empty($filters['created_from'])) {
                            $query->where('created_at', '>=', Carbon::parse($filters['created_from'])->startOfDay());
                        }

                        if (!empty($filters['created_until'])) {
                            $query->where('created_at', '<=', Carbon::parse($filters['created_until'])->endOfDay());
                        }

                        // Select only the required columns
                        $data = $query
						->select('entries.id', 'entries.business_sourced_by', 'entries.advisor_name', 'entries.advisor_code', 'business_types.name as bussines_name', 'entries.name', 'entries.pan_card', 'entries.mobile_no', 'entries.email', 'entries.aadhaar_front', 'entries.aadhaar_back', 'entries.nominee_name', 'entries.nominee_dob', 'entries.nominee_relationship', 'entries.nominee_dob', 'insurance_companies.name as insurance_company_name', 		'insurance_types.name as insurance_name_type', 'life_insurance_types.name as life_insurance_type_name', 'health_insurance_types.name as health_insurance_name', 'general_insurance_types.name as general_insurance_type_name', 'makes.name as make_name', 'premium_frequencies.name as premium_frequency_name', 'entries.vehicle_model', 'entries.vehicle_number', 'entries.idv', 'entries.own_damage_premium', 'entries.third_party_premium', 'entries.od_risk_start_date', 'entries.od_risk_end_date', 'entries.tp_risk_start_date', 'entries.tp_risk_end_date', 'entries.policy_bond', 'entries.rc_copy', 'entries.tp_risk_end_date', 'entries.sum_insured', 'entries.premium_paying_term', 'entries.policy_term', 'entries.premium_amount', 'entries.risk_start_date', 'entries.risk_end_date', 'entries.policy_bond_receipt', 'entries.number_of_lives', 'entries.premium_amount_total', 'entries.out_percentage', 'entries.net_od')
						->join('business_types', 'business_types.id', '=', 'entries.business_type_id')
						->join('insurance_companies', 'insurance_companies.id', '=', 'entries.insurance_company_id')
						->join('insurance_types', 'insurance_types.id', '=', 'entries.insurance_type_id')
						->join('life_insurance_types', 'life_insurance_types.id', '=', 'entries.life_insurance_type_id')
						->join('health_insurance_types', 'health_insurance_types.id', '=', 'entries.health_insurance_type_id')
						->join('general_insurance_types', 'general_insurance_types.id', '=', 'entries.general_insurance_type_id')
						->join('makes', 'makes.id', '=', 'entries.make_id')
						->join('premium_frequencies', 'premium_frequencies.id', '=', 'entries.premium_frequency_id')
						->get();

                        //Todo Add All Columns.
                        $headers = ['Sr No','Business sourced by','Advisor/POS Name','	Advisor / POS Code','Nature of Business','Name','Upload PAN Card Copy','Mobile No.','Email id','Upload Address Proof (Aadhar Card Copy - front)','Upload Address Proof (Aadhar Card Copy - back)','Nominee Name (Mention NA in case of Non-individual)','Nominee Date of Birth (Mention Date of Incorporation in case of Non-individual)','Nominee Relationship with Policy Holder','Select insurance company name','Select Type of Insurance','Type of Life Insurance','Type of Health Plan','Type of General Insurance','Vehicle Make','Vehicle Model','Vehicle Number','Insured Declared Value (IDV)','Own Damage and Riders Premium (without GST)','Third Party Premium (Without GST)','Risk Start Date (Own Damage)','Risk end Date (Own Damage)','Risk start Date (Third Party)','Risk End Date (Third Party)','Upload Policy Bond','Upload RC copy','Premium frequency','Sum Insured/Assured','Premium Paying Term (In number of years)','Policy Term (In number of years)','Premium Amount without GST)','Risk Start Date','Risk End Date','Upload Policy Bond / Premium Receipt','Number of lives','Premium Amount','Out %','Net/Od'];

                        $csvContent = implode(',', $headers) . "\n";
						$i=1;
						foreach ($data as $row) {
                            $csvContent .= implode(',', [
                                $i,
                                '"' . str_replace('"', '""', $row->business_sourced_by ?? '') . '"',
                                '"' . str_replace('"', '""', $row->advisor_name ?? '') . '"',
                                '"' . str_replace('"', '""', $row->advisor_code ?? '') . '"',
                                '"' . str_replace('"', '""', $row->bussines_name ?? '') . '"',
                                '"' . str_replace('"', '""', $row->name ?? '') . '"',
                                '"' . str_replace('"', '""', $row->pan_card ?? '') . '"',
                                '"' . str_replace('"', '""', $row->mobile_no ?? '') . '"',
                                '"' . str_replace('"', '""', $row->email ?? '') . '"',
                                '"' . str_replace('"', '""', $row->aadhaar_front ?? '') . '"',
                                '"' . str_replace('"', '""', $row->aadhaar_back ?? '') . '"',
                                '"' . str_replace('"', '""', $row->nominee_name ?? '') . '"',
                                '"' . str_replace('"', '""', $row->nominee_dob ?? '') . '"',
                                '"' . str_replace('"', '""', $row->nominee_relationship ?? '') . '"',
                                '"' . str_replace('"', '""', $row->insurance_company_name ?? '') . '"',
                                '"' . str_replace('"', '""', $row->insurance_name_type ?? '') . '"',
                                '"' . str_replace('"', '""', $row->life_insurance_type_name ?? '') . '"',
                                '"' . str_replace('"', '""', $row->health_insurance_name ?? '') . '"',
                                '"' . str_replace('"', '""', $row->general_insurance_type_name ?? '') . '"',
                                '"' . str_replace('"', '""', $row->make_name ?? '') . '"',
                                '"' . str_replace('"', '""', $row->vehicle_model ?? '') . '"',
                                '"' . str_replace('"', '""', $row->vehicle_number ?? '') . '"',
                                '"' . str_replace('"', '""', $row->idv ?? '') . '"',
                                '"' . str_replace('"', '""', $row->own_damage_premium ?? '') . '"',
                                '"' . str_replace('"', '""', $row->third_party_premium ?? '') . '"',
                                '"' . str_replace('"', '""', $row->od_risk_start_date ?? '') . '"',
                                '"' . str_replace('"', '""', $row->od_risk_end_date ?? '') . '"',
                                '"' . str_replace('"', '""', $row->tp_risk_start_date ?? '') . '"',
                                '"' . str_replace('"', '""', $row->tp_risk_end_date ?? '') . '"',
                                '"' . str_replace('"', '""', $row->policy_bond ?? '') . '"',
                                '"' . str_replace('"', '""', $row->rc_copy ?? '') . '"',
                                '"' . str_replace('"', '""', $row->premium_frequency_name ?? '') . '"',
                                '"' . str_replace('"', '""', $row->sum_insured ?? '') . '"',
                                '"' . str_replace('"', '""', $row->premium_paying_term ?? '') . '"',
                                '"' . str_replace('"', '""', $row->policy_term ?? '') . '"',
                                '"' . str_replace('"', '""', $row->premium_amount ?? '') . '"',
                                '"' . str_replace('"', '""', $row->risk_start_date ?? '') . '"',
                                '"' . str_replace('"', '""', $row->risk_end_date ?? '') . '"',
                                '"' . str_replace('"', '""', $row->policy_bond_receipt ?? '') . '"',
                                '"' . str_replace('"', '""', $row->number_of_lives ?? '') . '"',
                                '"' . str_replace('"', '""', $row->premium_amount_total ?? '') . '"',
                                '"' . str_replace('"', '""', $row->out_percentage ?? '') . '"',
                                '"' . str_replace('"', '""', $row->net_od ?? '') . '"',
                            ]) . "\n";
							$i++;
                        }

                        // Create a temporary file
                        $tempFile = tempnam(sys_get_temp_dir(), 'csv');
                        file_put_contents($tempFile, $csvContent);

                        // Return a download response
                        return response()->download(
                            $tempFile,
                            'export-' . date('Y-m-d-H-i-s') . '.csv',
                            ['Content-Type' => 'text/csv']
                        )->deleteFileAfterSend();
                    })
            ])
            ->columns([
                TextColumn::make('user.id')
                    ->formatStateUsing(function (Entry $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->user->name}</div>
                            </div>
                        ";
                    })
                    ->html()
                    ->label('Agent')
                    ->searchable(['name']),
                TextColumn::make('name')
                    ->formatStateUsing(function (Entry $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->name}</div>
                                <div class='text-sm text-gray-500'>{$record->mobile_no}</div>
                                <div class='text-xs text-gray-500'>{$record->email}</div>
                            </div>
                        ";
                    })
                    ->html()
                    ->label('Client Name')
                    ->searchable(['name', 'mobile_no', 'email']),
                Tables\Columns\TextColumn::make('make')
                    ->label('Vehicle Details')
                    ->formatStateUsing(function (Entry $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->vehicle_number}</div>
                                <div class='text-sm text-gray-500'>{$record->make->name}</div>
								<div class='text-sm text-gray-500'>{$record->vehicle_model}</div>
                            </div>
                        ";
                    })
                    ->searchable(['vehicle_number', 'vehicle_model'])
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->html(),
                Tables\Columns\TextColumn::make('insuranceCompany.name')
                    ->label('Insurance Detail')
                    ->formatStateUsing(function (Entry $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->insuranceCompany->name}</div>
                                <div class='text-xs text-gray-500'>{$record->insurance_type_name}</div>
                            </div>
                        ";
                    })
                    ->html()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('premium_amount_total')
                    ->label('Total Premium')
                    ->formatStateUsing(function (Entry $record): string {
                        $totalPremium = number_format($record->premium_amount_total, 2);
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>₹{$totalPremium}</div>
                            </div>
                        ";
                    })
                    ->html()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('dS M, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder =>
                                $query->where('created_at', '>=', Carbon::parse($date)->startOfDay()),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder =>
                                $query->where('created_at', '<=', Carbon::parse($date)->endOfDay()),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['created_from'] ?? null) {
                            $indicators['created_from'] = 'Created from ' . Carbon::parse($data['created_from'])->toFormattedDateString();
                        }

                        if ($data['created_until'] ?? null) {
                            $indicators['created_until'] = 'Created until ' . Carbon::parse($data['created_until'])->toFormattedDateString();
                        }

                        return $indicators;
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->hidden(
                        fn($record): bool =>
                        $record['user_id'] != auth()->user()->id
                    ),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            "index" => Pages\ListEntries::route("/"),
            "create" => Pages\CreateEntry::route("/create"),
            "edit" => Pages\EditEntry::route("/{record}/edit"),
            'view' => Pages\ViewEntry::route('/{record}'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Bussiness Details')
                    ->schema([
                        Grid::make(4)
                            ->schema([
                                TextEntry::make('business_sourced_by')
                                    ->label('Business Sourced by'),
                                TextEntry::make('advisor_name')
                                    ->label('Advisor/POS Name'),
                                TextEntry::make('advisor_code')
                                    ->label('Advisor / POS Code'),
                                TextEntry::make('businessType.name')
                                    ->label('Nature of Business'),
                            ]),
                    ])->collapsible(),
                Section::make('Personal Details')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Name')
                                    ->state(
                                        fn($record) =>
                                        trim(($record->name ?? '') . ' ')
                                    )
                                    ->weight(FontWeight::Bold),
                                TextEntry::make('email')
                                    ->label('Email')
                                    ->icon('heroicon-m-envelope')
                                    ->copyable(),

                                TextEntry::make('mobile_no')
                                    ->label('Mobile')
                                    ->icon('heroicon-m-device-phone-mobile')
                                    ->copyable(),
                                TextEntry::make('pan_card')
                                    ->label('Pan Card')
                                    ->icon('heroicon-m-document-text')
                                    ->badge(),
                                TextEntry::make('aadhaar_front')
                                    ->label('Aadhaar Front')
                                    ->icon('heroicon-m-document-text')
                                    ->badge(),
                                TextEntry::make('aadhaar_back')
                                    ->label('Aadhaar Front')
                                    ->icon('heroicon-m-document-text')
                                    ->badge(),
                            ]),
                    ])->collapsible(),
                Section::make('Nominee Details')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('nominee_name')
                                    ->label('Nominee Name'),
                                TextEntry::make('nominee_dob')
                                    ->label('Nominee Date of Birth')
                                    ->icon('heroicon-m-calendar-date-range'),
                                TextEntry::make('nominee_relationship')
                                    ->label('Nominee Relationship'),
                            ]),
                    ])->collapsible(),
                Section::make('Insurance Details')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('insuranceCompany.name')
                                    ->label('Insurance Company'),
                                TextEntry::make('insuranceType.name')
                                    ->label('Type'),
                                TextEntry::make('lifeInsuranceType.name')
                                    ->label('Life Insurance')
                                    ->visible(fn($state): bool => filled($state)),
                                TextEntry::make('healthInsuranceType.name')
                                    ->label('Health Plan')
                                    ->visible(fn($state): bool => filled($state)),
                                TextEntry::make('generalInsuranceType.name')
                                    ->label('General Insurance'),
                            ]),
                    ])->collapsible(),
                Section::make('Vehicle Details')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('make.name')
                                    ->label('Vehicle Make')
                                    ->badge(),
                                TextEntry::make('vehicle_model')
                                    ->label('Vehicle Model')
                                    ->badge(),
                                TextEntry::make('vehicle_number')
                                    ->label('Vehicle Number')
                                    ->badge(),
                            ]),
                    ])->collapsible(),
                Section::make('Policy Details')
                    ->schema([
                        Grid::make(4)
                            ->schema([
                                TextEntry::make('od_risk_start_date')
                                    ->label('Risk Start Date (Own Damage)')
                                    ->icon('heroicon-m-calendar-days'),
                                TextEntry::make('od_risk_end_date')
                                    ->label('Risk end Date (Own Damage)')
                                    ->icon('heroicon-m-calendar-days'),
                                TextEntry::make('tp_risk_start_date')
                                    ->label('Risk start Date (Third Party)')
                                    ->icon('heroicon-m-calendar-days'),
                                TextEntry::make('tp_risk_end_date')
                                    ->label('Risk End Date (Third Party)')
                                    ->icon('heroicon-m-calendar-days'),
                            ]),
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('own_damage_premium')
                                    ->label('Own Damage and Riders Premium')
                                    ->weight(FontWeight::Bold)
                                    ->money('INR'),
                                TextEntry::make('idv')
                                    ->label('IDV')
                                    ->weight(FontWeight::Bold)
                                    ->money('INR'),
                                TextEntry::make('third_party_premium')
                                    ->label('Third Party Premium')
                                    ->weight(FontWeight::Bold)
                                    ->money('INR'),
                            ]),
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('policy_bond')
                                    ->label('Policy Bond')
                                    ->icon('heroicon-m-document-text')
                                    ->badge(),
                                TextEntry::make('rc_copy')
                                    ->label('RC')
                                    ->icon('heroicon-m-document-text')
                                    ->badge(),
                            ]),
                        Grid::make(4)
                            ->schema([
                                TextEntry::make('premiumFrequency.name')
                                    ->label('Premium frequency'),
                                TextEntry::make('sum_insured')
                                    ->label('Sum Insured/Assured')
                                    ->weight(FontWeight::Bold)
                                    ->money('INR'),
                                TextEntry::make('premium_paying_term')
                                    ->label('Premium Paying Term'),
                                TextEntry::make('policy_term')
                                    ->label('Policy Term'),
                                TextEntry::make('premium_amount')
                                    ->label('Premium Amount without GST')
                                    ->weight(FontWeight::Bold)
                                    ->money('INR'),
                                TextEntry::make('risk_start_date')
                                    ->label('Risk Start Date')
                                    ->icon('heroicon-m-calendar-days'),
                                TextEntry::make('risk_end_date')
                                    ->label('Risk End Date')
                                    ->icon('heroicon-m-calendar-days'),
                                TextEntry::make('policy_bond')
                                    ->label('Premium Receipt')
                                    ->icon('heroicon-m-document-text')
                                    ->badge(),
                            ]),
                        Grid::make(4)
                            ->schema([
                                TextEntry::make('policy_term')
                                    ->label('Number of lives')
                                    ->icon('heroicon-m-user'),
                                TextEntry::make('premium_amount')
                                    ->label('Premium Amount')
                                    ->weight(FontWeight::Bold)
                                    ->money('INR'),
                                TextEntry::make('out_percentage')
                                    ->label('Out%')
                                    ->suffix('%'),
                                TextEntry::make('net_od')
                                    ->label('Net/Od')
                                    ->suffix('%'),
                            ]),
                    ])->collapsible(),
            ]);
    }
}
