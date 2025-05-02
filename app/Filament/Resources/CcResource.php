<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CcResource\Pages;
use App\Models\Cc;
use App\Models\ProductCategory;
use App\Traits\HasStatusColumn;
use Carbon\Carbon;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Illuminate\Database\Eloquent\Builder;


class CcResource extends Resource
{
    use HasStatusColumn;

    protected static ?string $model = Cc::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                                        Forms\Components\Select::make('proposal_type')
                                            ->label('Proposal type')
                                            ->options([
                                                'Fresh' => 'Fresh',
                                                'Renewal' => 'Renewal',
                                            ])
                                            ->placeholder('Select Proposal Type')
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Please select Proposal Type',
                                            ])
                                            ->disabledOn('edit')
                                            ->live()
                                            ->columnSpan(1),

                                        Forms\Components\TextInput::make('last_year_entry_no')
                                            ->label('Last Year Entry No')
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Please enter Last Year Entry No',
                                            ])
                                            ->visible(fn(Forms\Get $get) => $get('proposal_type') === 'Renewal')
                                            ->columnSpan(1),

                                        Forms\Components\Select::make('posp')
                                            ->label('Product Posp')
                                            ->options([
                                                'POSP' => 'POSP',
                                                'Non POSP' => 'Non POSP',
                                            ])
                                            ->placeholder('Select POSP')
                                            ->validationMessages([
                                                'required' => 'Please select POSP',
                                            ])
                                            ->required(),
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
                                            ->maxDate(now())
                                            ->format('Y-m-d'),
                                    ]),


                            ])->collapsible(),

                        // Policy Details
                        Forms\Components\Section::make('Policy Details')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([

                                        Forms\Components\Select::make('region_id')
                                            ->label('Region')
                                            ->relationship('region', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Region')
                                            ->validationMessages([
                                                'required' => 'Please select Region',
                                            ])
                                            ->required(),

                                        Forms\Components\Select::make('business_lock_id')
                                            ->label('Business Lock')
                                            ->relationship('businessLock', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Bussiness Lock')
                                            ->validationMessages([
                                                'required' => 'Please select Business Lock',
                                            ])
                                            ->required(),

                                    ]),

                                Forms\Components\Grid::make()
                                    ->schema([

                                        Forms\Components\Select::make('insurance_company_id')
                                            ->label('Insurance Company')
                                            ->relationship('insuranceCompany', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->columnSpan(4)
                                            ->placeholder('Select Insurance Company')
                                            ->validationMessages([
                                                'required' => 'Please select Insurance Company',
                                            ])
                                            ->required(),

                                        Forms\Components\TextInput::make('policy_number')
                                            ->label('Policy No.')
                                            ->placeholder('Enter Policy No.')
                                            ->columnSpan(3)
                                            ->validationMessages([
                                                'required' => 'Please enter Policy No',
                                            ])
                                            ->required(),

                                        Forms\Components\DatePicker::make('policy_issue_date')
                                            ->label('Policy Issue Date')
                                            ->placeholder('Select Policy Issue Date')
                                            ->format('Y-m-d')
                                            ->maxDate(now())
                                            ->columnSpan(2)
                                            ->validationMessages([
                                                'required' => 'Please enter date',
                                            ])
                                            ->required(),

                                        Forms\Components\TextInput::make('code')
                                            ->label('Code')
                                            ->placeholder('Enter Code')
                                            ->columnSpan(3)
                                            ->validationMessages([
                                                'required' => 'Please enter Code',
                                            ])
                                            ->required(),
                                    ])->columns(12),

                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\Select::make('product_id')
                                            ->label('Product')
                                            ->required()
                                            ->relationship('product', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->validationMessages([
                                                'required' => 'Please select Product',
                                            ])
                                            ->placeholder('Select Product'),

                                        Forms\Components\Select::make('product_category_id')
                                            ->label('Product Category')
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Please select Product Category',
                                            ])
                                            ->relationship('productCategory', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->placeholder(fn(Forms\Get $get): string => empty($get('product_id')) ? 'First Select Product' : 'Select an option')
                                            ->options(function (Forms\Get $get) {
                                                return ProductCategory::active()->where('product_id', $get('product_id'))->pluck('name', 'id');
                                            }),

                                        Forms\Components\TextInput::make('risk_category')
                                            ->label('Risk Category')
                                            ->placeholder('Risk Category'),

                                    ]),

                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\DatePicker::make('inception_date')
                                            ->label('Inception Date')
                                            ->format('Y-m-d')
                                            ->validationMessages([
                                                'required' => 'Please enter date',
                                            ])
                                            ->required(),

                                        Forms\Components\DatePicker::make('expiry_date')
                                            ->label('Expiry Date')
                                            ->format('Y-m-d')
                                            ->minDate(now())
                                            ->validationMessages([
                                                'required' => 'Please enter date',
                                            ])
                                            ->required(),

                                        Forms\Components\Select::make('ncb_id')
                                            ->label('NCB')
                                            ->relationship('ncb', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select NCB'),

                                    ]),

                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\DatePicker::make('tp_inception_date')
                                            ->label('TP Inception Date')
                                            ->format('Y-m-d'),

                                        Forms\Components\DatePicker::make('tp_expiry_date')
                                            ->label('TP Expiry Date')
                                            ->minDate(now())
                                            ->format('Y-m-d'),

                                        Forms\Components\TextInput::make('idv')
                                            ->label('IDV')
                                            ->extraInputAttributes(['maxlength' => 9])
                                            ->rules(['regex:/^[a-zA-Z0-9]+$/'])
                                            ->placeholder('Enter IDV'),

                                    ]),

                                Forms\Components\Grid::make(2)
                                    ->schema([

                                        Forms\Components\Select::make('py_insurance_company_id')
                                            ->label('PY Ins. Comp.')
                                            ->relationship('insuranceCompany', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select PY Insurance Company'),

                                        Forms\Components\TextInput::make('py_policy_number')
                                            ->label('PY Policy No.')
                                            ->placeholder('Enter PY Policy No.'),

                                    ]),

                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\TextInput::make('tarrif_rate')
                                            ->label('Tariff Rate')
                                            ->extraInputAttributes(['maxlength' => 6])
                                            ->placeholder('Enter Tariff Rate'),

                                        Forms\Components\TextInput::make('actual_tarrif')
                                            ->label('Actual Tariff')
                                            ->extraInputAttributes(['maxlength' => 6])
                                            ->placeholder('Enter Actual Tariff'),

                                        Forms\Components\Checkbox::make('third_party')
                                            ->label('Third Party')
                                            ->inline(false)

                                    ]),

                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\Select::make('make_id')
                                            ->label('Make')
                                            ->relationship('make', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->validationMessages([
                                                'required' => 'Please select Make',
                                            ])
                                            ->placeholder('Select Make')
                                            ->required(),

                                        Forms\Components\TextInput::make('vehicle_model')
                                            ->label('Vehicle Model')
                                            ->placeholder('Enter Vehicle Model')
                                            ->validationMessages([
                                                'required' => 'Please select Model',
                                            ])
                                            ->required(),

                                        Forms\Components\TextInput::make('vehicle_sub_model')
                                            ->label('Vehicle Sub Model')
                                            ->placeholder('Enter Vehicle Sub Model'),

                                    ]),

                                Forms\Components\Grid::make(4)
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
                                            })
                                            ->validationMessages([
                                                'required' => 'Please select YOM',
                                            ])
                                            ->required(),

                                        Forms\Components\Select::make('fuel_type_id')
                                            ->label('Fuel Type')
                                            ->relationship('fuelType', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Fuel Type')
                                            ->validationMessages([
                                                'required' => 'Please select Fuel Type',
                                            ])
                                            ->required(),

                                        Forms\Components\TextInput::make('seating_capacity')
                                            ->label('Seating Capacity')
                                            ->numeric()
                                            ->maxValue(99)
                                            ->minValue(1)
                                            ->placeholder('Enter Capacity')

                                    ]),

                                Fieldset::make('Registration Number')
                                    ->schema([
                                        Forms\Components\TextInput::make('registration_number_1')
                                            ->hiddenLabel()
                                            ->extraInputAttributes(['maxlength' => 2])
                                            ->placeholder('GJ')
                                            ->required(),

                                        Forms\Components\TextInput::make('registration_number_2')
                                            ->hiddenLabel()
                                            ->extraInputAttributes(['maxlength' => 2])
                                            ->placeholder('01')
                                            ->required(),

                                        Forms\Components\TextInput::make('registration_number_3')
                                            ->hiddenLabel()
                                            ->extraInputAttributes(['maxlength' => 4])
                                            ->placeholder('AB'),

                                        Forms\Components\TextInput::make('registration_number_4')
                                            ->hiddenLabel()
                                            ->extraInputAttributes(['maxlength' => 4])
                                            ->placeholder('1234')
                                            ->required(),
                                    ])
                                    ->columns(4)
                                    ->extraAttributes(['style' => 'max-width: 35%; margin-right: 60%;']),

                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\TextInput::make('engine_type')
                                            ->label('Engine No.')
                                            ->minLength(5)
                                            ->extraInputAttributes(['maxlength' => 25])
                                            ->required()
                                            ->rules(['regex:/^[a-zA-Z0-9]+$/'])
                                            ->validationMessages([
                                                'required' => 'Please enter Engine No.',
                                                'regex' => 'Only Enter letters and numbers.'
                                            ])
                                            ->placeholder('Enter Engine No.'),

                                        Forms\Components\TextInput::make('chasis')
                                            ->label('Chasis')
                                            ->minLength(5)
                                            ->extraInputAttributes(['maxlength' => 25])
                                            ->required()
                                            ->validationMessages([
                                                'required' => 'Please enter Chasis',
                                                'regex' => 'Only Enter letters and numbers.'
                                            ])
                                            ->placeholder('Enter Chasis'),

                                        Forms\Components\Select::make('rto_id')
                                            ->label('RTO')
                                            ->relationship('rto', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select RTO'),

                                    ]),

                            ])->collapsible(),

                        // Premium Details
                        Forms\Components\Section::make('Premium Details')
                            ->schema([
                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\TextInput::make('od')
                                            ->label('OD')
                                            ->prefix('₹')
                                            ->numeric()
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                                            ])
                                            ->placeholder('Enter OD'),

                                        Forms\Components\TextInput::make('add_on')
                                            ->label('Add On')
                                            ->prefix('₹')
                                            ->numeric()
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                                            ])
                                            ->placeholder('Enter Add On'),

                                        Forms\Components\TextInput::make('other')
                                            ->label('Other')
                                            ->prefix('₹')
                                            ->numeric()
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 3) this.value = this.value.slice(0, 3);'
                                            ])
                                            ->placeholder('Enter Other'),

                                    ]),
                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\TextInput::make('tp_premium')
                                            ->label('TP Premium')
                                            ->prefix('₹')
                                            ->numeric()
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                                            ])
                                            ->placeholder('Enter OD'),

                                        Forms\Components\Select::make('tp_tax')
                                            ->label('TP Tax')
                                            ->placeholder('Select TP Tax')
                                            ->options([
                                                12 => 12,
                                                13 => 13,
                                                18 => 18,
                                                19 => 19,
                                            ]),

                                        Forms\Components\TextInput::make('tppd')
                                            ->label('TPPD(-)')
                                            ->prefix('₹')
                                            ->numeric()
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 3) this.value = this.value.slice(0, 3);'
                                            ])
                                            ->placeholder('Enter Other'),

                                    ]),
                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\TextInput::make('liab_cng')
                                            ->label('Liab CNG')
                                            ->numeric()
                                            ->prefix('₹')
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                                            ])
                                            ->placeholder('Enter Liab CNG'),

                                        Forms\Components\TextInput::make('liab_passenger')
                                            ->label('Liab Passenger')
                                            ->numeric()
                                            ->prefix('₹')
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                                            ])
                                            ->placeholder('Enter Liab Passenger'),

                                        Forms\Components\TextInput::make('liab_owner_driver')
                                            ->label('Liab Owner Driver')
                                            ->numeric()
                                            ->prefix('₹')
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                                            ])
                                            ->placeholder('Enter Liab Owner Driver'),

                                    ]),
                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\Select::make('tax')
                                            ->label('Tax')
                                            ->placeholder('Select Tax')
                                            ->options([
                                                "1.5" => 1.5,
                                                "1.8" => 1.8,
                                                "2.25" => 2.25,
                                                "4.5" => 4.5,
                                                "12.6" => 12.6,
                                                "15" => 15,
                                                "18" => 18,
                                            ]),

                                        Forms\Components\TextInput::make('tax_amount')
                                            ->label('Tax Amount')
                                            ->disabled()
                                            ->prefix('₹')
                                            ->dehydrated(true)
                                            ->extraAttributes([
                                                'x-data' => '{}',
                                                'x-init' => 'Alpine.effect(() => {
                                                    // Get field values
                                                    const odPremium = parseInt($wire.get("data.od") || 0);
                                                    const addOnPremium = parseInt($wire.get("data.add_on") || 0);
                                                    const otherPremium = parseInt($wire.get("data.other") || 0);
                                                    const liabCng = parseInt($wire.get("data.liab_cng") || 0);
                                                    const liabOwnerDriver = parseInt($wire.get("data.liab_owner_driver") || 0);
                                                    const liabPassenger = parseInt($wire.get("data.liab_passenger") || 0);
                                                    
                                                    const amount1 = odPremium + addOnPremium + otherPremium + liabCng + liabOwnerDriver + liabPassenger;

                                                    const tpPremium = parseInt($wire.get("data.tp_premium") || 0);
                                                    const tppd = parseInt($wire.get("data.tppd") || 0);
                                                    const tpTax = parseInt($wire.get("data.tp_tax") || 0);

                                                    const tpgsAmount = ((tpPremium -tppd) * tpTax) / 100;
                                                    const sTax = $wire.get("data.tax") || 0;

                                                    const serviceTax = ((amount1 * sTax) / 100) + tpgsAmount;

                                                    const premiumAmount = amount1 + tpPremium + serviceTax - tppd;

                                                    const formattedTaxAmount = serviceTax.toFixed(2);
                                                    const formattedPremiumAmount = premiumAmount.toFixed(2);
                                                    
                                                    // Set the value
                                                    $wire.set("data.tax_amount", formattedTaxAmount);
                                                    $wire.set("data.total_premium", formattedPremiumAmount);
                                                })'
                                            ]),

                                        Forms\Components\TextInput::make('total_premium')
                                            ->label('Total Premium')
                                            ->disabled()
                                            ->prefix('₹')
                                            ->dehydrated(true),
                                    ]),
                                Forms\Components\Grid::make(3)
                                    ->schema([
                                        Forms\Components\TextInput::make('od_percentage')
                                            ->label('OD%')
                                            ->numeric()
                                            ->maxValue(100)
                                            ->minValue(1)
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 5) this.value = this.value.slice(0, 5);'
                                            ])
                                            ->placeholder('OD(%)'),

                                        Forms\Components\TextInput::make('tp_percentage')
                                            ->label('TP%')
                                            ->numeric()
                                            ->maxValue(100)
                                            ->minValue(1)
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 5) this.value = this.value.slice(0, 5);'
                                            ])
                                            ->placeholder('TP(%)'),

                                        Forms\Components\TextInput::make('specific_amount')
                                            ->label('Specific Amount')
                                            ->numeric()
                                            ->prefix('₹')
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                                            ])
                                            ->placeholder('Specific Amount'),

                                    ]),
                                Forms\Components\CheckboxList::make('add_on_coverages')
                                    ->label('Add On Coverages')
                                    ->options([
                                        'nil_dep' => 'Nil Dep.',
                                        'consumable' => 'Consumable',
                                        'engine_protector' => 'Engine Protector',
                                        'tyre_cover' => 'Tyre Cover',
                                        'ncb_protector' => 'Ncb Protector',
                                        'r21' => 'R21',
                                        'keycover' => 'Keycover',
                                        'rsa' => 'RSA',
                                        'personal_belongings' => 'Lose of Personal Belongings',
                                        'spare_car' => 'Spare Car',
                                    ])
                                    ->columns(4),

                            ])->collapsible(),

                        // Payment Details
                        Forms\Components\Section::make('Payment Details')
                            ->schema([
                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\Select::make('payment_mode')
                                            ->label('Payment Mode')
                                            ->options([
                                                'card' => 'Card',
                                                'cheque' => 'Cheque',
                                                'dd' => 'DD',
                                                'neft' => 'NEFT',
                                                'other' => 'OTHER',
                                            ])
                                            ->live()
                                            ->placeholder('Select Payment Mode'),

                                        Forms\Components\DatePicker::make('payment_date')
                                            ->label('Payment Date')
                                            ->format('Y-m-d'),

                                        Forms\Components\TextInput::make('cheque_trans_number')
                                            ->label('Other')
                                            ->hidden(fn (Forms\Get $get): bool => 
                                                in_array($get('payment_mode'), ['other'])
                                            )
                                            ->placeholder('Enter Cheque/Trans Number'),

                                    ]),

                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Select::make('bank_id')
                                            ->label('Bank')
                                            ->relationship(
                                                'bank',
                                                'name',
                                                modifyQueryUsing: fn(Builder $query) => $query->where('is_active', true)
                                            )
                                            ->searchable()
                                            ->preload()
                                            ->hidden(fn (Forms\Get $get): bool => 
                                                in_array($get('payment_mode'), ['card', 'other'])
                                            )
                                            ->placeholder('Select Bank'),

                                        Forms\Components\TextInput::make('payment_amount')
                                            ->label('Payment Amount')
                                            ->numeric()
                                            ->prefix('₹')
                                            ->extraInputAttributes([
                                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
                                            ])
                                            ->placeholder('Enter Payment Amount'),
                                    ]),

                            ])->collapsible(),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('proposal_type')
                    ->formatStateUsing(function (Cc $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->proposal_type}</div>
                                <div class='text-sm text-gray-500'>{$record->posp}</div>
                            </div>
                        ";
                    })
                    ->html()
                    ->label('Proposal Type')
                    ->searchable(['proposal_type', 'posp']),

                TextColumn::make('first_name')
                    ->formatStateUsing(function (Cc $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->first_name} {$record->last_name}</div>
                                <div class='text-sm text-gray-500'>{$record->phone}</div>
                                <div class='text-xs text-gray-500'>{$record->city->name }, {$record->zipcode}</div>
                            </div>
                        ";
                    })
                    ->html()
                    ->label('Name')
                    ->searchable(['first_name', 'last_name', 'phone'])
                    ->sortable(),

                Tables\Columns\TextColumn::make('make')
                    ->label('Vehicle Details')
                    ->formatStateUsing(function (Cc $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->registration_number}</div>
                                <div class='text-sm text-gray-500'>{$record->make->name}, {$record->vehicle_model}</div>
                                <div class='text-xs text-gray-500'>Engine No.: {$record->engine_type } Chasis: {$record->chasis }</div>
                            </div>
                        ";
                    })
                    ->searchable(['engine_type', 'chasis', 'registration_number_1', 'registration_number_2', 'registration_number_3', 'registration_number_4'])
                    ->html(),
                Tables\Columns\TextColumn::make('insuranceCompany.name')
                    ->label('Insurance Company')
                    ->formatStateUsing(function (Cc $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->insuranceCompany->name}</div>
                                <div class='text-sm text-gray-500'>{$record->policy_number}</div>
                                <div class='text-xs text-gray-500'>Issued on: {$record->policy_issue_date }</div>
                            </div>
                        ";
                    })
                    ->searchable(['policy_number'])
                    ->html(),
                TextColumn::make('total_premium')
                    ->label('Total Premium')
                    ->formatStateUsing(function (Cc $record): string {
                        $totalPremium = number_format($record->total_premium, 2);
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>₹{$totalPremium}</div>
                            </div>
                        ";
                    })
                    ->html()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M, Y')
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
                            fn (Builder $query, $date): Builder => 
                                $query->where('created_at', '>=', Carbon::parse($date)->startOfDay()),
                        )
                        ->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => 
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([

            ]);
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
            'index' => Pages\ListCcs::route('/'),
            'create' => Pages\CreateCc::route('/create'),
            'edit' => Pages\EditCc::route('/{record}/edit'),
        ];
    }
}
