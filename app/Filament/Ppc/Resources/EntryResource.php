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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Carbon\Carbon;
use Filament\Forms\Components\FileUpload;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\FontWeight;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Filament\Infolists\Components\ViewEntry;

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

                    Forms\Components\Grid::make(3)->schema([
                            FileUpload::make('pan_card')
                                ->label('PAN Card')
                                ->disk('protected')
                                ->directory('entry/pan/')
                                ->acceptedFileTypes(['image/*'])
                                ->maxSize(10240)
                                ->maxFiles(1)
                                ->previewable()
                                ->getUploadedFileNameForStorageUsing(
                                    fn(TemporaryUploadedFile $file): string =>
                                    time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                                ),
                            FileUpload::make('aadhaar_front')
                                ->label('Aadhar Front Side')
                                ->disk('protected')
                                ->directory('entry/aadhaar_front/')
                                ->acceptedFileTypes(['image/*'])
                                ->maxSize(10240)
                                ->maxFiles(1)
                                ->previewable()
                                ->getUploadedFileNameForStorageUsing(
                                    fn(TemporaryUploadedFile $file): string =>
                                    time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                                ),
                            FileUpload::make('aadhaar_back')
                                ->label('Aadhar Back Side')
                                ->disk('protected')
                                ->directory('entry/aadhaar_back/')
                                ->acceptedFileTypes(['image/*'])
                                ->maxSize(10240)
                                ->maxFiles(1)
                                ->previewable()
                                ->getUploadedFileNameForStorageUsing(
                                    fn(TemporaryUploadedFile $file): string =>
                                    time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                                ),
                        ])
                        ->columns(3),
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
                        FileUpload::make('policy_bond')
                            ->label('Policy Bond')
                            ->disk('protected')
                            ->directory('entry/policy_bond/')
                            ->acceptedFileTypes(['image/*'])
                            ->maxSize(10240)
                            ->maxFiles(1)
                            ->previewable()
                            ->getUploadedFileNameForStorageUsing(
                                fn(TemporaryUploadedFile $file): string =>
                                time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                            ),
                        FileUpload::make('rc_copy')
                            ->label('Upload RC copy')
                            ->disk('protected')
                            ->directory('entry/rc/')
                            ->acceptedFileTypes(['image/*'])
                            ->maxSize(10240)
                            ->maxFiles(1)
                            ->previewable()
                            ->getUploadedFileNameForStorageUsing(
                                fn(TemporaryUploadedFile $file): string =>
                                time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                            ),
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


                    FileUpload::make('policy_bond')
                        ->label('Upload Premium Receipt')
                        ->disk('protected')
                        ->directory('entry/receipt/')
                        ->acceptedFileTypes(['image/*'])
                        ->maxSize(10240)
                        ->maxFiles(1)
                        ->previewable()
                        ->getUploadedFileNameForStorageUsing(
                            fn(TemporaryUploadedFile $file): string =>
                            time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
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
                        $query = $livewire->getFilteredTableQuery();
                        $query = $query->with([
                            'user:id,name',
                            'businessType:id,name',
                            'insuranceCompany:id,name',
                            'insuranceType:id,name',
                            'lifeInsuranceType:id,name',
                            'healthInsuranceType:id,name',
                            'generalInsuranceType:id,name',
                            'make:id,name',
                            'premiumFrequency:id,name',
                        ]);
                        $records = $query->get();
                        $formatCurrency = function ($value) {
                            if (empty($value)) {
                                return '';
                            }
                            return number_format((float) $value, 2, '.', ',');
                        };

                        $formatUpload = function ($value) {
                            if (!empty($value)) {
                                return 'Uploaded';
                            }
                            return 'N.A.';
                        };

                        // Define CSV structure - field name mapping to record accessor
                        $csvStructure = [
                            'Sr No' => fn($row, $index) => $index + 1,
                            'Agent' => fn($row) => optional($row->user)->name,
                            'Created At' => fn($row) => $row->created_at->format('Y-m-d'),
                            'Business sourced by' => 'business_sourced_by',
                            'Advisor/POS Name' => 'advisor_name',
                            'Advisor / POS Code' => 'advisor_code',
                            'Nature of Business' => fn($row) => optional($row->businessType)->name,
                            'Name' => 'name',
                            'Upload PAN Card Copy' => fn($row) => $formatUpload($row->pan_card),
                            'Mobile No.' => 'mobile_no',
                            'Email id' => 'email',
                            'Upload Address Proof (Aadhar Card Copy - front)' => fn($row) => $formatUpload($row->aadhaar_front),
                            'Upload Address Proof (Aadhar Card Copy - back)' => fn($row) => $formatUpload($row->aadhaar_back),
                            'Nominee Name (Mention NA in case of Non-individual)' => 'nominee_name',
                            'Nominee Date of Birth (Mention Date of Incorporation in case of Non-individual)' => 'nominee_dob',
                            'Nominee Relationship with Policy Holder' => 'nominee_relationship',
                            'Select insurance company name' => fn($row) => optional($row->insuranceCompany)->name,
                            'Select Type of Insurance' => fn($row) => optional($row->insuranceType)->name,
                            'Type of Life Insurance' => fn($row) => optional($row->lifeInsuranceType)->name,
                            'Type of Health Plan' => fn($row) => optional($row->healthInsuranceType)->name,
                            'Type of General Insurance' => fn($row) => optional($row->generalInsuranceType)->name,
                            'Vehicle Make' => fn($row) => optional($row->make)->name,
                            'Vehicle Model' => 'vehicle_model',
                            'Vehicle Number' => 'vehicle_number',
                            'Insured Declared Value (IDV)' => fn($row) => $formatCurrency($row->idv),
                            'Own Damage and Riders Premium (without GST)' => fn($row) => $formatCurrency($row->own_damage_premium),
                            'Third Party Premium (Without GST)' => fn($row) => $formatCurrency($row->third_party_premium),
                            'Risk Start Date (Own Damage)' => 'od_risk_start_date',
                            'Risk end Date (Own Damage)' => 'od_risk_end_date',
                            'Risk start Date (Third Party)' => 'tp_risk_start_date',
                            'Risk End Date (Third Party)' => 'tp_risk_end_date',
                            'Upload Policy Bond' => fn($row) => $formatUpload($row->policy_bond),
                            'Upload RC copy' => fn($row) => $formatUpload($row->rc_copy),
                            'Premium frequency' => fn($row) => optional($row->premiumFrequency)->name,
                            'Sum Insured/Assured' => fn($row) => $formatCurrency($row->sum_insured),
                            'Premium Paying Term (In number of years)' => 'premium_paying_term',
                            'Policy Term (In number of years)' => 'policy_term',
                            'Premium Amount without GST)' => fn($row) => $formatCurrency($row->premium_amount),
                            'Risk Start Date' => 'risk_start_date',
                            'Risk End Date' => 'risk_end_date',
                            'Upload Policy Bond / Premium Receipt' => fn($row) => $formatUpload($row->policy_bond_receipt),
                            'Number of lives' => 'number_of_lives',
                            'Premium Amount' => fn($row) => $formatCurrency($row->premium_amount_total),
                            'Out %' => 'out_percentage',
                            'Net/Od' => fn($row) => $formatCurrency($row->net_od),
                        ];

                        // Create CSV header
                        $headers = array_keys($csvStructure);
                        $csvContent = implode(',', $headers) . "\n";

                        // Process each record
                        foreach ($records as $index => $record) {
                            $row = [];

                            // Generate each field for the row
                            foreach ($csvStructure as $header => $accessor) {
                                $value = '';

                                if (is_callable($accessor)) {
                                    // Use the closure to get the value
                                    $value = $accessor($record, $index);
                                } else {
                                    // Direct property access
                                    $value = data_get($record, $accessor, '');
                                }

                                // Format for CSV and escape quotes
                                $row[] = '"' . str_replace('"', '""', $value ?? '') . '"';
                            }

                            // Add row to CSV content
                            $csvContent .= implode(',', $row) . "\n";
                        }

                        // Create a temporary file
                        $tempFile = tempnam(sys_get_temp_dir(), 'csv');
                        file_put_contents($tempFile, $csvContent);

                        // Return a download response
                        return response()->download(
                            $tempFile,
                            'entry-' . date('Y-m-d-H-i-s') . '.csv',
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
                                ViewEntry::make('pan_card')
                                    ->label('Pan Card')
                                    ->view('filament.infolists.components.file-viewer'),
								ViewEntry::make('aadhaar_front')
                                    ->label('Aadhaar Front')
                                    ->view('filament.infolists.components.file-viewer'),
								ViewEntry::make('aadhaar_back')
                                    ->label('Aadhaar Back')
                                    ->view('filament.infolists.components.file-viewer'),
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
                                ViewEntry::make('policy_bond')
                                    ->label('Policy Bond')
                                    ->view('filament.infolists.components.file-viewer'),
								ViewEntry::make('rc_copy')
                                    ->label('RC')
                                    ->view('filament.infolists.components.file-viewer'),
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
                                ViewEntry::make('policy_bond_receipt')
                                    ->label('Premium Receipt')
                                    ->view('filament.infolists.components.file-viewer'),
                            ]),
                        Grid::make(4)
                            ->schema([
                                TextEntry::make('number_of_lives')
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
