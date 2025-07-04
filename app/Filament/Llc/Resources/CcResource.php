<?php

namespace App\Filament\Llc\Resources;

use App\Filament\Llc\Resources\CcResource\Pages;
use App\Models\Cc;
use App\Models\User;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Infolist;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CcResource extends Resource
{
    protected static ?string $model = Cc::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();
        $is_organisation_admin = $user->is_organisation_admin;
        $organisationId = $user->organisation_id;
        $is_manager = $user->is_manager;

        if ($is_organisation_admin) {
            $ccs = parent::getEloquentQuery();
        } else if ($is_manager) {
            $users = User::getSubordinates($organisationId);
            $ccs = parent::getEloquentQuery()->whereIn('user_id', $users);
        } else {
            $ccs = parent::getEloquentQuery()->where('user_id', auth()->user()->id);
        }
        return $ccs;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Client Details Card
                Forms\Components\Section::make('CC Entry')
                    ->schema([
                        // Proposal Information
                        Forms\Components\Section::make('Proposal Information')
                            ->schema([
                                Forms\Components\Grid::make(3)
                                    ->schema([
                                        Forms\Components\Hidden::make("user_id")
                                            ->default(auth()->user()->id)
                                            ->dehydrated(fn($state, $record) => $record === null),
                                        Forms\Components\Select::make('broker')
                                            ->label('Broker Name')
                                            ->options([
                                                'Robinhood' => 'Robinhood',
                                                'Landmark ' => 'Landmark',
                                                'Certigo' => 'Certigo',
                                                'Alligeance' => 'Alligeance',
                                                'Arham' => 'Arham',
                                                'Ankush' => 'Ankush',
                                                'Aman' => 'Aman',
                                                'Sahil' => 'Sahil',
                                            ])
                                            ->placeholder('Select Broker')
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Please select Broker',
                                            ])
                                            ->columnSpan(1),

                                        Forms\Components\TextInput::make('posp')
                                            ->label('Posp Name')
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Please enter Posp Name',
                                            ])
                                            ->extraInputAttributes(['maxlength' => 50])
                                            ->columnSpan(1)
                                            ->placeholder('Posp Name'),

                                        Forms\Components\TextInput::make('source')
                                            ->label('Source')
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Please enter Source',
                                            ])
                                            ->extraInputAttributes(['maxlength' => 50])
                                            ->columnSpan(1)
                                            ->placeholder('Enter Source Name'),
                                    ]),
                            ])->collapsible(),

                        // Basic Information
                        Forms\Components\Section::make('Client Details')
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->schema([

                                        Forms\Components\Select::make('salutation_id')
                                            ->label('Salutation')
                                            ->relationship(
                                                'salutation',
                                                'name',
                                                modifyQueryUsing: fn(Builder $query) => $query->active()->orderBy('id', 'asc')
                                            )
                                            ->searchable()
                                            ->preload()
                                            ->extraAttributes(['style' => 'width: 100px;'])
                                            ->columnSpan(2)
                                            ->placeholder('Select'),

                                        Forms\Components\TextInput::make('first_name')
                                            ->label('First Name')
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Please enter First Name',
                                            ])
                                            ->extraInputAttributes(['maxlength' => 50])
                                            ->columnSpan(4)
                                            ->placeholder('Enter First Name'),

                                        Forms\Components\TextInput::make('middle_name')
                                            ->label('Middle Name')
                                            ->extraInputAttributes(['maxlength' => 50])
                                            ->columnSpan(3)
                                            ->placeholder('Enter Middle Name'),

                                        Forms\Components\TextInput::make('last_name')
                                            ->label('Last Name')
                                            ->extraInputAttributes(['maxlength' => 50])
                                            ->columnSpan(3)
                                            ->placeholder('Enter Last Name'),
                                    ])->columns(12),

                                Forms\Components\Grid::make()
                                    ->schema([

                                        Forms\Components\TextInput::make('address_1')
                                            ->label('Address')
                                            ->placeholder('Enter Address 1')
                                            ->columnSpan(6)
                                            ->validationMessages([
                                                'required' => 'Please enter Address',
                                            ])
                                            ->required(),

                                        Forms\Components\TextInput::make('address_2')
                                            ->label('Address 2')
                                            ->columnSpan(3)
                                            ->placeholder('Enter Address 2'),

                                        Forms\Components\TextInput::make('address_3')
                                            ->label('Address 3')
                                            ->columnSpan(3)
                                            ->placeholder('Enter Address 3'),
                                    ])->columns(12),

                                Forms\Components\Grid::make(4)
                                    ->schema([

                                        Forms\Components\TextInput::make('zipcode')
                                            ->label('Pin Code')
                                            ->numeric()
                                            ->minLength(6)
                                            ->maxLength(8)
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 8) this.value = this.value.slice(0, 8);'
                                            ])
                                            ->placeholder('Enter Pin Code'),

                                        Forms\Components\Select::make('city_id')
                                            ->label('City')
                                            ->relationship('city', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select City')
                                            ->validationMessages([
                                                'required' => 'Please select City',
                                            ])
                                            ->required(),

                                        Forms\Components\TextInput::make('phone')
                                            ->label('Mobile')
                                            ->tel()
                                            ->placeholder('Enter Mobile Number')
                                            ->validationMessages([
                                                'required' => 'Please enter Mobile',
                                            ])
                                            ->required(),

                                        Forms\Components\TextInput::make('email')
                                            ->label('Email')
                                            ->email()
                                            ->placeholder('Enter Email Address'),

                                    ]),
                            ])->collapsible(),

                        // Nominee Details
                        Forms\Components\Section::make('Nominee Details')
                            ->schema([
                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\TextInput::make('relationship')
                                            ->label('Nominee Rel.')
                                            ->placeholder('Enter Nominee Relation'),

                                        Forms\Components\TextInput::make('nominee_name')
                                            ->label('Nominee Name')
                                            ->placeholder('Nominee Name'),
                                        Forms\Components\DatePicker::make('nominee_dob')
                                            ->label('Nominee DOB')
                                            ->placeholder('Select Nominee DOB')
                                            ->maxDate(fn(string $operation) => $operation === 'create' ? now() : null)
                                            ->format('Y-m-d'),
                                    ]),


                            ])->collapsible(),

                        // Policy Details
                        Forms\Components\Section::make('Policy Details')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([

                                        Forms\Components\Select::make('business_type')
                                            ->label('Nature of Business')
                                            ->options([
                                                'Fresh' => 'Fresh',
                                                'Port ' => 'Port',
                                                'Renwal' => 'Renwal',
                                                'Rollover' => 'Rollover',
                                            ])
                                            ->placeholder('Select Business'),

                                        Forms\Components\Select::make('insurance_type')
                                            ->label('Type of Insurance')
                                            ->options([
                                                'Motor' => 'Motor',
                                                'Health ' => 'Health',
                                                'Marine' => 'Marine',
                                                '2 Wheeler' => '2 Wheeler',
                                                'Life' => 'Life',
                                                'Fire' => 'Fire',
                                                'Travel' => 'Travel',
                                            ])
                                            ->placeholder('Select Insurance Type')
                                            ->validationMessages([
                                                'required' => 'Please enter Type of Insurance',
                                            ])
                                            ->required(),
                                    ]),

                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\Select::make('insurance_company_name')
                                            ->label('Insurance Company')
                                            ->options([
                                                'Digit' => 'Digit',
                                                'Hdfc ' => 'Hdfc',
                                                'Icici' => 'Icici',
                                                'Tata' => 'Tata',
                                                'United' => 'United',
                                                'Sbi' => 'Sbi',
                                                'Reliance' => 'Reliance',
                                                'Bajaj' => 'Bajaj',
                                                'New India' => 'New India',
                                            ])
                                            ->placeholder('Select Insurance Type')
                                            ->validationMessages([
                                                'required' => 'Please select Insurance Company',
                                            ])
                                            ->required(),

                                        Forms\Components\TextInput::make('policy_number')
                                            ->label('Policy No.')
                                            ->placeholder('Enter Policy No.'),
                                        Forms\Components\TextInput::make('sum_issured')
                                            ->label('Sum Issured')
                                            ->prefix('₹')
                                            ->required()
                                            ->numeric()
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                                            ])
                                            ->placeholder('Enter Sum Issured'),
                                    ]),
                                Forms\Components\Grid::make(2)
                                    ->schema([

                                        Forms\Components\DatePicker::make('risk_start_date')
                                            ->label('Risk Start Date')
                                            ->format('Y-m-d'),

                                        Forms\Components\DatePicker::make('risk_end_date')
                                            ->label('Risk End Date')
                                            ->format('Y-m-d'),
                                    ]),
                                Forms\Components\Grid::make(2)
                                    ->schema([

                                        Forms\Components\DatePicker::make('tp_start_date')
                                            ->label('TP Start Date')
                                            ->format('Y-m-d'),

                                        Forms\Components\DatePicker::make('tp_end_date')
                                            ->label('TP End Date')
                                            ->format('Y-m-d'),
                                    ]),


                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\Select::make('make_id')
                                            ->label('Make')
                                            ->relationship('make', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            // ->validationMessages([
                                            //     'required' => 'Please select Make',
                                            // ])
                                            ->placeholder('Select Make'),
                                            // ->required(),

                                        Forms\Components\TextInput::make('vehicle_model')
                                            ->label('Vehicle Model')
                                            ->placeholder('Enter Vehicle Model'),
                                            // ->validationMessages([
                                            //     'required' => 'Please select Model',
                                            // ])
                                            // ->required(),

                                        Forms\Components\TextInput::make('vehicle_sub_model')
                                            ->label('Vehicle Sub Model')
                                            ->placeholder('Enter Vehicle Sub Model'), 
                                    ]),

                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\TextInput::make('cc')
                                            ->label('CC')
                                            ->numeric()
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 25) this.value = this.value.slice(0, 25);'
                                            ])
                                            ->placeholder('Enter CC'),

                                        Forms\Components\Select::make('yom')
                                            ->label('YOM')
                                            ->searchable()
                                            ->placeholder('Select YOM')
                                            ->options(function () {
                                                $currentYear = now()->year;
                                                $years = [];

                                                for ($year = $currentYear; $year >= 1990; $year--) {
                                                    $years[$year] = $year;
                                                }

                                                return $years;
                                            }),
                                            // ->validationMessages([
                                            //     'required' => 'Please select YOM',
                                            // ]),
                                            // ->required(),

                                        Forms\Components\Select::make('fuel_type_id')
                                            ->label('Fuel Type')
                                            ->relationship('fuelType', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Fuel Type'),
                                    ]),

                                Fieldset::make('Registration Number')
                                    ->schema([
                                        Forms\Components\TextInput::make('registration_number_1')
                                            ->hiddenLabel()
                                            ->extraInputAttributes(['maxlength' => 2])
                                            ->placeholder('GJ'),

                                        Forms\Components\TextInput::make('registration_number_2')
                                            ->hiddenLabel()
                                            ->extraInputAttributes(['maxlength' => 2])
                                            ->placeholder('01'),

                                        Forms\Components\TextInput::make('registration_number_3')
                                            ->hiddenLabel()
                                            ->extraInputAttributes(['maxlength' => 4])
                                            ->placeholder('AB'),

                                        Forms\Components\TextInput::make('registration_number_4')
                                            ->hiddenLabel()
                                            ->extraInputAttributes(['maxlength' => 4])
                                            ->placeholder('1234'),
                                    ])
                                    ->columns(4)
                                    ->extraAttributes(['style' => 'max-width: 35%; margin-right: 60%;']),

                                Forms\Components\Grid::make(4)
                                    ->schema([

                                        Forms\Components\TextInput::make('engine_type')
                                            ->label('Engine No.')
                                            ->minLength(5)
                                            ->extraInputAttributes(['maxlength' => 25])
                                            ->rules(['regex:/^[a-zA-Z0-9]+$/'])
                                            ->validationMessages([
                                                // 'required' => 'Please enter Engine No.',
                                                'regex' => 'Only Enter letters and numbers.'
                                            ])
                                            ->placeholder('Enter Engine No.'),

                                        Forms\Components\TextInput::make('chasis')
                                            ->label('Chasis')
                                            ->minLength(5)
                                            ->extraInputAttributes(['maxlength' => 25])
                                            // ->required()
                                            ->validationMessages([
                                                // 'required' => 'Please enter Chasis',
                                                'regex' => 'Only Enter letters and numbers.'
                                            ])
                                            ->placeholder('Enter Chasis'),
                                        Forms\Components\TextInput::make('ncb')
                                            ->label('Current NCB')
                                            ->extraInputAttributes(['maxlength' => 25])
                                            ->placeholder('Enter NCB'),
                                        Forms\Components\TextInput::make('last_ncb')
                                            ->label('Last NCB')
                                            ->extraInputAttributes(['maxlength' => 25])
                                            ->placeholder('Enter Last NCB'),
                                    ]),

                            ])->collapsible(),

                        // Premium Details
                            Forms\Components\Section::make('Premium Details')
                                ->schema([
                                    // STEP 1: Basic Premium Components
                                    Forms\Components\Fieldset::make('Premium Components')
                                        ->schema([
                                            Forms\Components\Grid::make(3)
                                                ->schema([
                                                    Forms\Components\TextInput::make('od')
                                                        ->label('OD Amount')
                                                        ->prefix('₹')
                                                        ->numeric()
                                                        ->extraInputAttributes([
                                                            'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                                                        ])
                                                        ->placeholder('Enter OD Amount'),

                                                    Forms\Components\TextInput::make('rider')
                                                        ->label('Rider Amount')
                                                        ->prefix('₹')
                                                        ->numeric()
                                                        ->extraInputAttributes([
                                                            'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                                                        ])
                                                        ->placeholder('Enter Rider Amount'),

                                                    Forms\Components\TextInput::make('commission')
                                                        ->label('Commission')
                                                        ->prefix('₹')
                                                        ->disabled()
                                                        ->dehydrated(true)
                                                        ->extraAttributes([
                                                            'x-data' => '{}',
                                                            'x-init' => 'Alpine.effect(() => {
                                                                const odAmount = parseFloat($wire.get("data.od") || 0);
                                                                const riderAmount = parseFloat($wire.get("data.rider") || 0);
                                                                const commission = odAmount + riderAmount;
                                                                const formattedCommission = commission.toFixed(2);
                                                                $wire.set("data.commission", formattedCommission);
                                                            })'
                                                        ])
                                                        ->placeholder('Auto-calculated'),
                                                ]),
                                        ]),

                                    // STEP 2: Net Calculation
                                    Forms\Components\Fieldset::make('Net Premium Calculation')
                                        ->schema([
                                            Forms\Components\Grid::make(4)
                                                ->schema([
                                                    Forms\Components\TextInput::make('third_party_amount')
                                                        ->label('Third Party Amount')
                                                        ->prefix('₹')
                                                        ->numeric()
                                                        ->extraInputAttributes([
                                                            'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                                                        ])
                                                        ->placeholder('Enter Third Party Amount'),

                                                    Forms\Components\TextInput::make('net')
                                                        ->label('Net Amount')
                                                        ->prefix('₹')
                                                        ->disabled()
                                                        ->dehydrated(true)
                                                        ->extraAttributes([
                                                            'x-data' => '{}',
                                                            'x-init' => 'Alpine.effect(() => {
                                                                const odAmount = parseFloat($wire.get("data.od") || 0);
                                                                const riderAmount = parseFloat($wire.get("data.rider") || 0);
                                                                const thirdPartyAmount = parseFloat($wire.get("data.third_party_amount") || 0);
                                                                const total = odAmount + riderAmount + thirdPartyAmount;
                                                                const formattedTotal = total.toFixed(2);
                                                                $wire.set("data.net", formattedTotal);
                                                            })'
                                                        ])
                                                        ->placeholder('Auto-calculated'),

                                                    Forms\Components\TextInput::make('gst')
                                                        ->label('GST (%)')
                                                        ->numeric()
                                                        ->maxValue(100)
                                                        ->minValue(1)
                                                        ->extraInputAttributes([
                                                            'oninput' => 'if(this.value.length > 5) this.value = this.value.slice(0, 5);'
                                                        ])
                                                        ->placeholder('Enter GST %'),

                                                    Forms\Components\TextInput::make('total_amount')
                                                        ->label('Total Amount (Inc. GST)')
                                                        ->prefix('₹')
                                                        ->disabled()
                                                        ->dehydrated(true)
                                                        ->extraAttributes([
                                                            'x-data' => '{}',
                                                            'x-init' => 'Alpine.effect(() => {
                                                                const netAmount = parseFloat($wire.get("data.net") || 0);
                                                                const gstPercent = parseFloat($wire.get("data.gst") || 0);
                                                                const gstAmount = netAmount * (gstPercent / 100);
                                                                const totalAmount = netAmount + gstAmount;
                                                                const formattedTotal = totalAmount.toFixed(2);
                                                                $wire.set("data.total_amount", formattedTotal);
                                                            })'
                                                        ])
                                                        ->placeholder('Auto-calculated'),
                                                ]),
                                        ]),

                                    // STEP 3: Commission Breakdown - What We Pay
                                    Forms\Components\Fieldset::make('Commission Payout (What We Pay)')
                                        ->schema([
                                            Forms\Components\Grid::make(4)
                                                ->schema([
                                                    Forms\Components\TextInput::make('paid_per_ca')
                                                        ->label('CA Rate (%)')
                                                        ->numeric()
                                                        ->maxValue(100)
                                                        ->minValue(1)
                                                        ->extraInputAttributes([
                                                            'oninput' => 'if(this.value.length > 5) this.value = this.value.slice(0, 5);'
                                                        ])
                                                        ->placeholder('Enter CA %'),

                                                    Forms\Components\TextInput::make('ca_amount')
                                                        ->label('CA Amount')
                                                        ->prefix('₹')
                                                        ->disabled()
                                                        ->dehydrated(true)
                                                        ->extraAttributes([
                                                            'x-data' => '{}',
                                                            'x-init' => 'Alpine.effect(() => {
                                                                const paidPerCa = parseFloat($wire.get("data.paid_per_ca") || 0);
                                                                const commission = parseFloat($wire.get("data.commission") || 0);
                                                                const caAmount = (paidPerCa / 100) * commission;
                                                                const formattedCaAmount = caAmount.toFixed(2);
                                                                $wire.set("data.ca_amount", formattedCaAmount);
                                                            })'
                                                        ])
                                                        ->placeholder('Auto-calculated'),

                                                    Forms\Components\TextInput::make('paid_per_tp')
                                                        ->label('TP Rate (%)')
                                                        ->numeric()
                                                        ->maxValue(100)
                                                        ->minValue(1)
                                                        ->extraInputAttributes([
                                                            'oninput' => 'if(this.value.length > 5) this.value = this.value.slice(0, 5);'
                                                        ])
                                                        ->placeholder('Enter TP %'),

                                                    Forms\Components\TextInput::make('tp_amount')
                                                        ->label('TP Amount')
                                                        ->prefix('₹')
                                                        ->disabled()
                                                        ->dehydrated(true)
                                                        ->extraAttributes([
                                                            'x-data' => '{}',
                                                            'x-init' => 'Alpine.effect(() => {
                                                                const paidPerTp = parseFloat($wire.get("data.paid_per_tp") || 0);
                                                                const commission = parseFloat($wire.get("data.third_party_amount") || 0);
                                                                const caAmount = (paidPerTp / 100) * commission;
                                                                const formattedCaAmount = caAmount.toFixed(2);
                                                                $wire.set("data.tp_amount", formattedCaAmount);
                                                            })'
                                                        ])
                                                        ->placeholder('Auto-calculated'),
                                                ]),
                                        ]),

                                    // STEP 4: Commission Breakdown - What We Receive
                                    Forms\Components\Fieldset::make('Commission Received (What We Get)')
                                        ->schema([
                                            Forms\Components\Grid::make(4)
                                                ->schema([
                                                    Forms\Components\TextInput::make('received_per_ca')
                                                        ->label('CA Received Rate (%)')
                                                        ->numeric()
                                                        ->maxValue(100)
                                                        ->minValue(1)
                                                        ->extraInputAttributes([
                                                            'oninput' => 'if(this.value.length > 5) this.value = this.value.slice(0, 5);'
                                                        ])
                                                        ->placeholder('Enter Received CA %'),

                                                    Forms\Components\TextInput::make('ca_received_amount')
                                                        ->label('CA Received Amount')
                                                        ->prefix('₹')
                                                        ->disabled()
                                                        ->dehydrated(true)
                                                        ->extraAttributes([
                                                            'x-data' => '{}',
                                                            'x-init' => 'Alpine.effect(() => {
                                                                const paidPerCa = parseFloat($wire.get("data.received_per_ca") || 0);
                                                                const commission = parseFloat($wire.get("data.commission") || 0);
                                                                const caAmount = (paidPerCa / 100) * commission;
                                                                const formattedCaAmount = caAmount.toFixed(2);
                                                                $wire.set("data.ca_received_amount", formattedCaAmount);
                                                            })'
                                                        ])
                                                        ->placeholder('Auto-calculated'),

                                                    Forms\Components\TextInput::make('received_per_tp')
                                                        ->label('TP Received Rate (%)')
                                                        ->numeric()
                                                        ->maxValue(100)
                                                        ->minValue(1)
                                                        ->extraInputAttributes([
                                                            'oninput' => 'if(this.value.length > 5) this.value = this.value.slice(0, 5);'
                                                        ])
                                                        ->placeholder('Enter Received TP %'),

                                                    Forms\Components\TextInput::make('tp_received_amount')
                                                        ->label('TP Received Amount')
                                                        ->prefix('₹')
                                                        ->disabled()
                                                        ->dehydrated(true)
                                                        ->extraAttributes([
                                                            'x-data' => '{}',
                                                            'x-init' => 'Alpine.effect(() => {
                                                                const paidPerTp = parseFloat($wire.get("data.received_per_tp") || 0);
                                                                const commission = parseFloat($wire.get("data.third_party_amount") || 0);
                                                                const caAmount = (paidPerTp / 100) * commission;
                                                                const formattedCaAmount = caAmount.toFixed(2);
                                                                $wire.set("data.tp_received_amount", formattedCaAmount);
                                                            })'
                                                        ])
                                                        ->placeholder('Auto-calculated'),
                                                ]),
                                        ]),

                                    // STEP 5: Final Summary
                                    Forms\Components\Fieldset::make('Summary')
                                        ->schema([
                                            Forms\Components\Grid::make(3)
                                                ->schema([
                                                    Forms\Components\TextInput::make('total_paid_amount')
                                                        ->label('Total Paid Out')
                                                        ->prefix('₹')
                                                        ->disabled()
                                                        ->dehydrated(true)
                                                        ->extraAttributes([
                                                            'x-data' => '{}',
                                                            'x-init' => 'Alpine.effect(() => {
                                                                const paidPerCa = parseFloat($wire.get("data.ca_amount") || 0);
                                                                const commission = parseFloat($wire.get("data.tp_amount") || 0);
                                                                const caAmount = paidPerCa + commission;
                                                                const formattedCaAmount = caAmount.toFixed(2);
                                                                $wire.set("data.total_paid_amount", formattedCaAmount);
                                                            })'
                                                        ])
                                                        ->placeholder('Auto-calculated'),

                                                    Forms\Components\TextInput::make('total_received_payout')
                                                        ->label('Total Received')
                                                        ->prefix('₹')
                                                        ->disabled()
                                                        ->dehydrated(true)
                                                        ->extraAttributes([
                                                            'x-data' => '{}',
                                                            'x-init' => 'Alpine.effect(() => {
                                                                const paidPerCa = parseFloat($wire.get("data.ca_received_amount") || 0);
                                                                const commission = parseFloat($wire.get("data.tp_received_amount") || 0);
                                                                const caAmount = paidPerCa + commission;
                                                                const formattedCaAmount = caAmount.toFixed(2);
                                                                $wire.set("data.total_received_payout", formattedCaAmount);
                                                            })'
                                                        ])
                                                        ->placeholder('Auto-calculated'),

                                                    Forms\Components\TextInput::make('profit')
                                                        ->label('Net Profit')
                                                        ->prefix('₹')
                                                        ->disabled()
                                                        ->dehydrated(true)
                                                        ->extraAttributes([
                                                            'x-data' => '{}',
                                                            'x-init' => 'Alpine.effect(() => {
                                                                const paidPerCa = parseFloat($wire.get("data.total_paid_amount") || 0);
                                                                const commission = parseFloat($wire.get("data.total_received_payout") || 0);
                                                                const caAmount = commission - paidPerCa;
                                                                const formattedCaAmount = caAmount.toFixed(2);
                                                                $wire.set("data.profit", formattedCaAmount);
                                                            })'
                                                        ])
                                                        ->placeholder('Auto-calculated'),
                                                ]),
                                        ]),
                                ])->collapsible(),
                        Forms\Components\Section::make('Documents')
                            ->schema([
                                FileUpload::make('policy')
                                    ->label('Current Policy')
                                    ->disk('protected')
                                    ->directory('cc/policy/')
                                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                                    ->maxSize(10240)
                                    ->maxFiles(1)
                                    ->downloadable()
                                    ->openable()    
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string =>
                                        time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                                    ),
                                FileUpload::make('last_policy')
                                    ->label('Last Policy')
                                    ->disk('protected')
                                    ->directory('cc/policy/')
                                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                                    ->maxSize(10240)
                                    ->maxFiles(1)
                                    ->downloadable()
                                    ->openable()    
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string =>
                                        time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                                    ),
                                FileUpload::make('rc')
                                    ->label('RC')
                                    ->disk('protected')
                                    ->directory('cc/rc/')
                                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                                    ->maxSize(10240)
                                    ->maxFiles(1)
                                    ->downloadable()
                                    ->openable()    
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string =>
                                        time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                                    ),

                                FileUpload::make('pan_card')
                                    ->label('PAN Card')
                                    ->disk('protected')
                                    ->directory('cc/pan_card/')
                                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                                    ->maxSize(10240)
                                    ->maxFiles(1)
                                    ->downloadable()
                                    ->openable()    
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
                                    ->downloadable()
                                    ->openable()    
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
                                    ->downloadable()
                                    ->openable()    
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string =>
                                        time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                                    ),
                            ])->collapsible(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('posp')
                    ->formatStateUsing(function (Cc $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->broker}</div>
                                <div class='text-sm text-gray-500'>{$record->posp}</div>
                                <div class='text-xs text-gray-500'>{$record->source} - {$record->business_type}</div>
                            </div>
                        ";
                    })
                    ->html()
                    ->label('Type')
                    ->searchable(['source', 'posp', 'broker', 'business_type']),

                TextColumn::make('first_name')
                    ->formatStateUsing(function (Cc $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->first_name} {$record->last_name}</div>
                                <div class='text-sm text-gray-500'>{$record->phone}</div>
                                <div class='text-xs text-gray-500'>{$record->city->name}, {$record->zipcode}</div>
                            </div>
                        ";
                    })
                    ->html()
                    ->label('Client Name')
                    ->searchable(['first_name', 'last_name', 'phone'])
                    ->sortable(),

                Tables\Columns\TextColumn::make('make')
                    ->label('Vehicle Details')
                    ->formatStateUsing(function (Cc $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->registration_number}</div>
                                <div class='text-sm text-gray-500'>{$record->make->name}, {$record->vehicle_model}</div>
                                <div class='text-xs text-gray-500'>Engine No.: {$record->engine_type}</div>
                                <div class='text-xs text-gray-500'>Chasis: {$record->chasis}</div>
                            </div>
                        ";
                    })
                    ->searchable(['engine_type', 'chasis', 'registration_number_1', 'registration_number_2', 'registration_number_3', 'registration_number_4'])
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->html(),
                Tables\Columns\TextColumn::make('insurance_company_name')
                    ->label('Insurance')
                    ->formatStateUsing(function (Cc $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->insurance_company_name}</div>
                                <div class='text-sm text-gray-500'>{$record->insurance_type}</div>
                                <div class='text-xs text-gray-500'>Policy: {$record->policy_number}</div>
                            </div>
                        ";
                    })
                    ->searchable(['insurance_company_name', 'insurance_type', 'policy_number'])
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->html(),
                TextColumn::make('sum_issured')
                    ->label('Sum Issured')
                    ->formatStateUsing(function (Cc $record): string {
                        $sumIssured = number_format($record->sum_issured, 2);
                        $thirdPartyAmount = number_format($record->third_party_amount, 2);
                        $totalPaidAmount = number_format($record->total_paid_amount, 2);
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>₹{$sumIssured}</div>
                                <div class='text-sm text-gray-500'>Third Party Amount: ₹{$thirdPartyAmount}</div>
                                <div class='text-xs text-gray-500'>Total Paid Out: ₹{$totalPaidAmount}</div>
                            </div>
                        ";
                    })
                    ->html()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('user.name')
                //     ->label('Agent')
                //     ->toggleable(isToggledHiddenByDefault: true),
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
                    }),
                // SelectFilter::make('agent')
                //     ->label('Agent')
                //     ->relationship('user', 'name', function (Builder $query) {
                //         return $query->where('organisation_id', 1);
                //     })
                //     ->preload() // Preload options instead of lazy-loading
                //     ->searchable() // Add search capability for larger lists
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->headerActions([
                Tables\Actions\Action::make('exportCsv')
                    ->label('Download as CSV')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function ($livewire) {
                        $query = $livewire->getFilteredTableQuery();
                        $query = $query->with([
                            // 'user:id,name',
                            'city:id,name',
                            // 'previousInsurer:id,name',
                            // 'insuranceCompany:id,name',
                            'fuelType:id,name',
                            'make:id,name',
                            'product:id,name',
                            // 'ncb:id,name',
                            'salutation:id,name',
                            // 'region:id,name',
                            // 'businessLock:id,name',
                            // 'productCategory:id,name',
                            // 'rto:id,name',
                            // 'bank:id,name',
                        ]);

                        $records = $query->get();

                        $formatCurrency = function ($value) {
                            if (empty($value)) {
                                return '';
                            }
                            return number_format((float) $value, 2, '.', ',');
                        };

                        // Define CSV structure - field name mapping to record accessor
                        $csvStructure = [
                            'Sr. No.' => fn($row, $index) => $index + 1,
                            'Created At' => fn($row) => $row->created_at->format('Y-m-d'),
                            'Broker Name' => 'broker',
                            'Posp Name' => 'posp',
                            'Source Name' => 'source',
                            'Client Name' => fn($row) => trim(optional($row->salutation)->name . ' ' . $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name),
                            'Mobile No' => 'phone',
                            'Email' => 'email',
                            'Address' => fn($row) => implode(', ', array_filter([
                                $row->address_1,
                                $row->address_2,
                                $row->address_3,
                                $row->city?->name,
                                $row->zipcode
                            ])),
                            'Nominee Name' => 'nominee_name',
                            'Nominee DOB' => 'nominee_dob',
                            'Nominee Relationship' => 'relationship',
                            'Nature of Business' => 'business_type',
                            'Type of Insurance' => 'insurance_type',
                            'Risk Start Date' => 'risk_start_date',
                            'Risk End Date' => 'risk_end_date',
                            'Policy No.' => 'policy_number',
                            'Company Name' => 'insurance_company_name',
                            'OD Amount' => fn($row) => $formatCurrency($row->od),
                            'Rider Amount' => fn($row) => $formatCurrency($row->rider),
                            'Commission Amount' => fn($row) => $formatCurrency($row->commission),
                            'Third Party' => fn($row) => $formatCurrency($row->third_party_amount),
                            'Net' => fn($row) => $formatCurrency($row->net),
                            'Net' => fn($row) => $formatCurrency($row->net),
                            'GST%' => 'gst',
                            'Total Amount' => fn($row) => $formatCurrency($row->total_amount),
                            'Paid % CA' => 'paid_per_ca',
                            'CA Amount' => fn($row) => $formatCurrency($row->ca_amount),
                            'Paid % TP' => 'paid_per_tp',
                            'TP Amount' => fn($row) => $formatCurrency($row->tp_amount),
                            'Received % CA' => 'received_per_ca',
                            'Received CA Amount' => fn($row) => $formatCurrency($row->ca_received_amount),
                            'Received  % TP' => 'received_per_tp',
                            'Received  TP Amount' => fn($row) => $formatCurrency($row->tp_received_amount),
                            'Total Paid Amount' => fn($row) => $formatCurrency($row->total_paid_amount),
                            'Total Received Payout' => fn($row) => $formatCurrency($row->total_received_payout),
                            'Profit' => fn($row) => $formatCurrency($row->profit),
                            'Last NCB' => 'last_ncb',
                            'Current NCB' => 'ncb',
                            'TP Start Date' => 'tp_start_date',
                            'TP End Date' => 'tp_end_date',
                            'Sum Issured' => fn($row) => $formatCurrency($row->sum_issured),
                            'Car No' => fn($row) => $row->registration_number,
                            'Make' => fn($row) => optional($row->make)->name,
                            'Model' => 'vehicle_model',
                            'Fuel Type' => fn($row) => optional($row->fuelType)->name,
                            'CC' => 'cc',
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
                            'cc-export-' . date('Y-m-d-H-i-s') . '.csv',
                            ['Content-Type' => 'text/csv']
                        )->deleteFileAfterSend();
                    })
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('CC Entry')
                    ->schema([
                        // Proposal Information
                        Section::make('Proposal Information')
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('broker')
                                            ->label('Broker'),

                                        TextEntry::make('posp')
                                            ->label('Posp'),

                                        TextEntry::make('source')
                                            ->label('Source'),
                                    ]),
                            ])
                            ->collapsible(),

                        // Client Details
                        Section::make('Client Details')
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('full_name')
                                            ->label('Client Name')
                                            ->state(
                                                fn($record) =>
                                                trim(($record->salutation?->name ?? '') . ' ' .
                                                    ($record->first_name ?? '') . ' ' .
                                                    ($record->middle_name ?? '') . ' ' .
                                                    ($record->last_name ?? ''))
                                            )
                                            ->weight(FontWeight::Bold),

                                        TextEntry::make('email')
                                            ->label('Email')
                                            ->icon('heroicon-m-envelope')
                                            ->copyable(),

                                        TextEntry::make('phone')
                                            ->label('Mobile')
                                            ->icon('heroicon-m-device-phone-mobile')
                                            ->copyable(),
                                    ]),

                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('full_address')
                                            ->label('Address')
                                            ->state(
                                                fn($record) =>
                                                implode(', ', array_filter([
                                                    $record->address_1,
                                                    $record->address_2,
                                                    $record->address_3,
                                                    $record->city?->name,
                                                    $record->zipcode
                                                ]))
                                            ),

                                        TextEntry::make('zipcode')
                                            ->label('Pin Code')
                                            ->badge(),
                                    ]),
                            ])
                            ->collapsible(),

                        // Nominee Details
                        Section::make('Nominee Details')
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('relationship')
                                            ->label('Nominee Rel.'),

                                        TextEntry::make('nominee_name')
                                            ->label('Nominee Name'),

                                        TextEntry::make('nominee_dob')
                                            ->label('Nominee DOB')
                                            ->date(),
                                    ]),
                            ])
                            ->collapsible(),

                        // Policy Details
                        Section::make('Policy Details')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('business_type')
                                            ->label('Nature of Business')
                                            ->badge(),

                                        TextEntry::make('insurance_type')
                                            ->label('Type of Insurance')
                                            ->badge(),
                                    ]),
                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('insurance_company_name')
                                            ->label('Insurance Company')
                                            ->weight(FontWeight::Bold),

                                        TextEntry::make('policy_number')
                                            ->label('Policy No.')
                                            ->copyable()
                                            ->badge()
                                            ->color('success'),
                                        TextEntry::make('sum_issured')
                                                ->label('Sum Issured')
                                                ->money('INR')
                                                ->weight(FontWeight::Bold),
                                    ]),

                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('risk_start_date')
                                            ->label('Risk Start Date')
                                            ->date(),
                                        TextEntry::make('risk_end_date')
                                            ->label('Risk End Date')
                                            ->date(),
                                    ]),
                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('tp_start_date')
                                            ->label('TP Start Date')
                                            ->date(),
                                        TextEntry::make('tp_end_date')
                                            ->label('TP End Date')
                                            ->date(),
                                    ]),
                                // Vehicle Details
                                Section::make('Vehicle Details')
                                    ->schema([
                                        Grid::make(3)
                                            ->schema([
                                                TextEntry::make('make.name')
                                                    ->label('Make')
                                                    ->badge(),

                                                TextEntry::make('vehicle_model')
                                                    ->label('Vehicle Model'),

                                                TextEntry::make('vehicle_sub_model')
                                                    ->label('Vehicle Sub Model'),
                                            ]),

                                        Grid::make(3)
                                            ->schema([
                                                TextEntry::make('cc')
                                                    ->label('CC'),

                                                TextEntry::make('yom')
                                                    ->label('YOM')
                                                    ->badge(),

                                                TextEntry::make('fuelType.name')
                                                    ->label('Fuel Type')
                                                    ->badge(),
                                            ]),

                                        TextEntry::make('registration_number')
                                            ->label('Registration Number')
                                            ->state(
                                                fn($record) =>
                                                trim(
                                                    ($record->registration_number_1 ?? '') . '-' .
                                                        ($record->registration_number_2 ?? '') . '-' .
                                                        ($record->registration_number_3 ?? '') . '-' .
                                                        ($record->registration_number_4 ?? '')
                                                )
                                            )
                                            ->badge()
                                            ->color('primary')
                                            ->copyable(),

                                        Grid::make(4)
                                            ->schema([
                                                TextEntry::make('engine_type')
                                                    ->label('Engine No.')
                                                    ->copyable(),

                                                TextEntry::make('chasis')
                                                    ->label('Chasis')
                                                    ->copyable(),
                                                TextEntry::make('ncb')
                                                    ->label('Current NCB'),
                                                TextEntry::make('last_ncb')
                                                    ->label('Last NCB'),
                                            ]),
                                    ])
                                    ->collapsible(),
                            ])
                            ->collapsible(),

                        // Premium Details
                            Section::make('Premium Details')
                                ->schema([
                                    // Premium Components
                                    Section::make('Premium Components')
                                        ->schema([
                                            Grid::make(3)
                                                ->schema([
                                                    TextEntry::make('od')
                                                        ->label('OD Amount')
                                                        ->money('INR'),

                                                    TextEntry::make('rider')
                                                        ->label('Rider Amount')
                                                        ->money('INR'),

                                                    TextEntry::make('commission')
                                                        ->label('Commission')
                                                        ->money('INR')
                                                        ->weight(FontWeight::Bold)
                                                        ->color('primary'),
                                                ]),
                                        ]),

                                    // Net Premium Calculation
                                    Section::make('Net Premium Calculation')
                                        ->schema([
                                            Grid::make(4)
                                                ->schema([
                                                    TextEntry::make('third_party_amount')
                                                        ->label('Third Party Amount')
                                                        ->money('INR'),

                                                    TextEntry::make('net')
                                                        ->label('Net Amount')
                                                        ->money('INR')
                                                        ->weight(FontWeight::Bold),

                                                    TextEntry::make('gst')
                                                        ->label('GST')
                                                        ->suffix('%'),

                                                    TextEntry::make('total_amount')
                                                        ->label('Total Amount (Inc. GST)')
                                                        ->money('INR')
                                                        ->weight(FontWeight::Bold)
                                                        ->size('lg')
                                                        ->color('success'),
                                                ]),
                                        ]),

                                    // Commission Payout (What We Pay)
                                    Section::make('Commission Payout (What We Pay)')
                                        ->schema([
                                            Grid::make(4)
                                                ->schema([
                                                    TextEntry::make('paid_per_ca')
                                                        ->label('CA Rate')
                                                        ->suffix('%'),

                                                    TextEntry::make('ca_amount')
                                                        ->label('CA Amount')
                                                        ->money('INR'),

                                                    TextEntry::make('paid_per_tp')
                                                        ->label('TP Rate')
                                                        ->suffix('%'),

                                                    TextEntry::make('tp_amount')
                                                        ->label('TP Amount')
                                                        ->money('INR'),
                                                ]),
                                        ]),

                                    // Commission Received (What We Get)
                                    Section::make('Commission Received (What We Get)')
                                        ->schema([
                                            Grid::make(4)
                                                ->schema([
                                                    TextEntry::make('received_per_ca')
                                                        ->label('CA Received Rate')
                                                        ->suffix('%'),

                                                    TextEntry::make('ca_received_amount')
                                                        ->label('CA Received Amount')
                                                        ->money('INR'),

                                                    TextEntry::make('received_per_tp')
                                                        ->label('TP Received Rate')
                                                        ->suffix('%'),

                                                    TextEntry::make('tp_received_amount')
                                                        ->label('TP Received Amount')
                                                        ->money('INR'),
                                                ]),
                                        ]),

                                    // Summary
                                    Section::make('Summary')
                                        ->schema([
                                            Grid::make(3)
                                                ->schema([
                                                    TextEntry::make('total_paid_amount')
                                                        ->label('Total Paid Out')
                                                        ->money('INR')
                                                        ->weight(FontWeight::Bold)
                                                        ->color('danger'),

                                                    TextEntry::make('total_received_payout')
                                                        ->label('Total Received')
                                                        ->money('INR')
                                                        ->weight(FontWeight::Bold)
                                                        ->color('success'),

                                                    TextEntry::make('profit')
                                                        ->label('Net Profit')
                                                        ->money('INR')
                                                        ->weight(FontWeight::Bold)
                                                        ->size('lg')
                                                        ->color(fn ($state) => $state >= 0 ? 'success' : 'danger'),
                                                ]),
                                        ]),
                                ])
                                ->collapsible(),

                        // //Documents
                        Section::make('Documents')
                            ->schema([
                                ViewEntry::make('policy')
                                    ->label('Current Policy')
                                    ->view('filament.infolists.components.file-viewer'),
                                ViewEntry::make('last_policy')
                                    ->label('Last Policy')
                                    ->view('filament.infolists.components.file-viewer'),
                                ViewEntry::make('rc')
                                    ->label('RC')
                                    ->view('filament.infolists.components.file-viewer'),
                                ViewEntry::make('aadhaar_front')
                                    ->label('Aadhar Front')
                                    ->view('filament.infolists.components.file-viewer'),
                                ViewEntry::make('aadhaar_back')
                                    ->label('Aadhar Back')
                                    ->view('filament.infolists.components.file-viewer'),
                                ViewEntry::make('pan_card')
                                    ->label('PAN Card')
                                    ->view('filament.infolists.components.file-viewer'),
                            ])
                            ->collapsible(),
                    ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCcs::route('/'),
            'create' => Pages\CreateCc::route('/create'),
            'edit' => Pages\EditCc::route('/{record}/edit'),
            'view' => Pages\ViewCc::route('/{record}'),
        ];
    }
}
