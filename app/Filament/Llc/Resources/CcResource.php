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
		
		if($is_organisation_admin){
			$ccs = parent::getEloquentQuery();
		}else if ($is_manager){
			$userUnderManager = User::getUsersUnderManager($organisationId);
			$userUnderManager[] = auth()->user()->id;
			$ccs = parent::getEloquentQuery()->whereIn('user_id', $userUnderManager);
		}else{
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
                                            ->maxDate(fn(string $operation) => $operation === 'create' ? now() : null)
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
                                            ->maxDate(fn(string $operation) => $operation === 'create' ? now() : null)
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
                                            ->minDate(fn(string $operation) => $operation === 'create' ? now() : null)
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
                                            ->minDate(fn(string $operation) => $operation === 'create' ? now() : null)
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
                                            ->validationMessages([
                                                'required' => 'Required',
                                            ])
                                            ->required(),

                                        Forms\Components\TextInput::make('registration_number_2')
                                            ->hiddenLabel()
                                            ->extraInputAttributes(['maxlength' => 2])
                                            ->placeholder('01')
                                            ->validationMessages([
                                                'required' => 'Required',
                                            ])
                                            ->required(),

                                        Forms\Components\TextInput::make('registration_number_3')
                                            ->hiddenLabel()
                                            ->extraInputAttributes(['maxlength' => 4])
                                            ->placeholder('AB'),

                                        Forms\Components\TextInput::make('registration_number_4')
                                            ->hiddenLabel()
                                            ->extraInputAttributes(['maxlength' => 4])
                                            ->placeholder('1234')
                                            ->validationMessages([
                                                'required' => 'Required',
                                            ])
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
                                            ->getOptionLabelFromRecordUsing(fn($record) => $record->full_name)
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
                                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
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
                                                'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
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
                                            ->hidden(
                                                fn(Forms\Get $get): bool =>
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
                                            ->hidden(
                                                fn(Forms\Get $get): bool =>
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
                        Forms\Components\Section::make('Documents')
                            ->schema([
                                FileUpload::make('policy')
                                    ->label('Policy')
                                    ->disk('protected')
                                    ->directory('cc/policy/')
                                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                                    ->maxSize(10240)
                                    ->maxFiles(1)
                                    ->previewable()
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string =>
                                        time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                                    ),
                                FileUpload::make('proposal_form')
                                    ->label('Proposal Form')
                                    ->disk('protected')
                                    ->directory('cc/proposals/')
                                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                                    ->maxSize(10240)
                                    ->maxFiles(1)
                                    ->previewable()
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string =>
                                        time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                                    ),

                                FileUpload::make('renewal_form')
                                    ->label('Renewal Form')
                                    ->disk('protected')
                                    ->directory('cc/renewals/')
                                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                                    ->maxSize(10240)
                                    ->maxFiles(1)
                                    ->previewable()
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string =>
                                        time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                                    ),

                                FileUpload::make('rc_book')
                                    ->label('RC Book')
                                    ->disk('protected')
                                    ->directory('cc/rc_book/')
                                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                                    ->maxSize(10240)
                                    ->maxFiles(1)
                                    ->previewable()
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string =>
                                        time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                                    ),

                                FileUpload::make('visiting_card')
                                    ->label('Visiting Card')
                                    ->disk('protected')
                                    ->directory('cc/visiting_card/')
                                    ->acceptedFileTypes(['image/*'])
                                    ->maxSize(10240)
                                    ->maxFiles(1)
                                    ->previewable()
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string =>
                                        time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                                    ),

                                FileUpload::make('mandate')
                                    ->label('Mandate')
                                    ->disk('protected')
                                    ->directory('cc/mandate/')
                                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                                    ->maxSize(10240)
                                    ->maxFiles(1)
                                    ->previewable()
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string =>
                                        time() . '_' . Str::random(16) . '_' . $file->getClientOriginalName()
                                    ),

                                FileUpload::make('other_document')
                                    ->label('Other')
                                    ->disk('protected')
                                    ->directory('cc/other_document/')
                                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                                    ->maxSize(10240)
                                    ->maxFiles(1)
                                    ->previewable()
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
                                    ->previewable()
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
                    ->label('Type')
                    ->searchable(['proposal_type', 'posp']),

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
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->html(),
                Tables\Columns\TextColumn::make('insuranceCompany.name')
                    ->label('Insurance')
                    ->formatStateUsing(function (Cc $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->insuranceCompany->name}</div>
                                <div class='text-sm text-gray-500'>{$record->policy_number}</div>
                                <div class='text-xs text-gray-500'>Issued on: {$record->policy_issue_date}</div>
                            </div>
                        ";
                    })
                    ->searchable(['policy_number'])
                    ->toggleable(isToggledHiddenByDefault: true)
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
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Agent')
                    ->toggleable(isToggledHiddenByDefault: true),
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
                SelectFilter::make('agent')
                    ->label('Agent')
                    ->relationship('user', 'name', function (Builder $query) {
                        return $query->where('organisation_id', 1);
                    })
                    ->preload() // Preload options instead of lazy-loading
                    ->searchable() // Add search capability for larger lists
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn($record) => $record->user_id === auth()->id()),
                Tables\Actions\ViewAction::make(),
            ])
            ->headerActions([
                Tables\Actions\Action::make('exportCsv')
                    ->label('Download as CSV')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function ($livewire) {
                        $query = $livewire->getFilteredTableQuery();
                        $query = $query->with([
                            'user:id,name',
                            'city:id,name',
                            'previousInsurer:id,name',
                            'insuranceCompany:id,name',
                            'fuelType:id,name',
                            'make:id,name',
                            'product:id,name',
                            'ncb:id,name',
                            'salutation:id,name',
                            'region:id,name',
                            'businessLock:id,name',
                            'productCategory:id,name',
                            'rto:id,name',
                            'bank:id,name',
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
                            'Agent' => fn($row) => optional($row->user)->name,
                            'Created At' => fn($row) => $row->created_at->format('Y-m-d'),
                            'Proposal Type' => 'proposal_type',
                            'Proposal type' => 'posp',
                            'Client Name' => fn($row) => trim(optional($row->salutation)->name . ' ' . $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name),
                            'Email' => 'email',
                            'Mobile' => 'phone',
                            'Address' => fn($row) => trim($row->address_1 . ' ' . $row->address_2 . ' ' . $row->address_3),
                            'Pin Code' => 'zipcode',
                            'Nominee Rel.' => 'relationship',
                            'Nominee Name' => 'nominee_name',
                            'Nominee DOB' => 'nominee_dob',
                            'Region' => fn($row) => optional($row->region)->name,
                            'Business Lock' => fn($row) => optional($row->businessLock)->name,
                            'Insurance Company' => fn($row) => optional($row->insuranceCompany)->name,
                            'Policy No.' => 'policy_number',
                            'Policy Issue Date' => 'policy_issue_date',
                            'Product' => fn($row) => optional($row->product)->name,
                            'Product Category' => fn($row) => optional($row->productCategory)->name,
                            'Risk Category' => 'risk_category',
                            'Inception Date' => 'inception_date',
                            'Expiry Date' => 'expiry_date',
                            'NCB' => fn($row) => optional($row->ncb)->name,
                            'Code' => 'code',
                            'TP Inception Date' => 'tp_inception_date',
                            'TP Expiry Date' => 'tp_expiry_date',
                            'IDV' => 'idv',
                            'PY Ins. Comp.' => fn($row) => optional($row->previousInsurer)->name,
                            'PY Policy No.' => 'py_policy_number',
                            'Tariff Rate' => 'tarrif_rate',
                            'Actual Tariff' => 'actual_tarrif',
                            'Third Party' => fn($row) => ($row->third_party == 1) ? ('Yes') : ('No'),
                            'Make' => fn($row) => optional($row->make)->name,
                            'Vehicle Model' => 'vehicle_model',
                            'Vehicle Sub Model' => 'vehicle_sub_model',
                            'CC' => 'cc',
                            'YOM' => 'yom',
                            'Fuel Type' => fn($row) => optional($row->fuelType)->name,
                            'Seating Capacity' => 'seating_capacity',
                            'Registration Number' => fn($row) => trim($row->registration_number_1 . ' ' . $row->registration_number_2 . ' ' . $row->registration_number_3 . ' ' . $row->registration_number_4),
                            'Engine No.' => 'engine_type',
                            'Chasis' => 'chasis',
                            'RTO' => fn($row) => optional($row->rto)->name,
                            'OD' => fn($row) => $formatCurrency($row->od),
                            'Add On' => fn($row) => $formatCurrency($row->add_on),
                            'Other' => fn($row) => $formatCurrency($row->other),
                            'TP Premium' => fn($row) => $formatCurrency($row->tp_premium),
                            'TP Tax' => 'tp_tax',
                            'TPPD(-)' => fn($row) => $formatCurrency($row->tppd),
                            'Liab CNG' => fn($row) => $formatCurrency($row->liab_cng),
                            'Liab Passenger' => fn($row) => $formatCurrency($row->liab_passenger),
                            'Liab Owner Driver' => fn($row) => $formatCurrency($row->liab_owner_driver),
                            'Tax' => 'tax',
                            'Tax Amount' => fn($row) => $formatCurrency($row->tax_amount),
                            'Total Premium' => fn($row) => $formatCurrency($row->total_premium),
                            'OD%' => 'od_percentage',
                            'TP%' => 'tp_percentage',
                            'Specific Amount' => fn($row) => $formatCurrency($row->specific_amount),
                            'Add On Coverages' => function ($row) {
                                // Handle array to string conversion for add_on_coverages
                                if (empty($row->add_on_coverages)) {
                                    return '';
                                }

                                // If it's JSON, decode it
                                if (is_string($row->add_on_coverages) && $decoded = json_decode($row->add_on_coverages, true)) {
                                    $coverages = $decoded;
                                } else {
                                    // Assume it's already an array
                                    $coverages = $row->add_on_coverages;
                                }

                                // Convert array to comma-separated string
                                if (is_array($coverages)) {
                                    return implode(', ', $coverages);
                                }

                                return (string) $row->add_on_coverages;
                            },
                            'Payment Mode' => 'payment_mode',
                            'Payment Date' => 'payment_date',
                            'Cheque/Trans Number' => 'cheque_trans_number',
                            'Bank' => fn($row) => optional($row->bank)->name,
                            'Payment Amount' => fn($row) => $formatCurrency($row->payment_amount),
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
                                        TextEntry::make('proposal_type')
                                            ->label('Proposal type')
                                            ->badge()
                                            ->color(fn(string $state): string => match ($state) {
                                                'Fresh' => 'success',
                                                'Renewal' => 'warning',
                                                default => 'gray',
                                            }),

                                        TextEntry::make('last_year_entry_no')
                                            ->label('Last Year Entry No')
                                            ->visible(fn($record) => $record->proposal_type === 'Renewal'),

                                        TextEntry::make('posp')
                                            ->label('Product Posp')
                                            ->badge()
                                            ->color(fn(string $state): string => match ($state) {
                                                'POSP' => 'success',
                                                'Non POSP' => 'warning',
                                                default => 'gray',
                                            }),
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
                                        TextEntry::make('region.name')
                                            ->label('Region')
                                            ->badge(),

                                        TextEntry::make('businessLock.name')
                                            ->label('Business Lock')
                                            ->badge(),
                                    ]),

                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('insuranceCompany.name')
                                            ->label('Insurance Company')
                                            ->weight(FontWeight::Bold),

                                        TextEntry::make('policy_number')
                                            ->label('Policy No.')
                                            ->copyable()
                                            ->badge()
                                            ->color('success'),

                                        TextEntry::make('policy_issue_date')
                                            ->label('Policy Issue Date')
                                            ->date(),
                                    ]),

                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('product.name')
                                            ->label('Product')
                                            ->badge(),

                                        TextEntry::make('productCategory.name')
                                            ->label('Product Category')
                                            ->badge(),

                                        TextEntry::make('risk_category')
                                            ->label('Risk Category'),
                                    ]),

                                Grid::make(4)
                                    ->schema([
                                        TextEntry::make('inception_date')
                                            ->label('Inception Date')
                                            ->date(),

                                        TextEntry::make('expiry_date')
                                            ->label('Expiry Date')
                                            ->date()
                                            ->color(
                                                fn($state) =>
                                                $state && \Carbon\Carbon::parse($state)->isPast()
                                                    ? 'danger'
                                                    : 'success'
                                            ),

                                        TextEntry::make('ncb.name')
                                            ->label('NCB')
                                            ->badge(),

                                        TextEntry::make('code')
                                            ->label('Code'),
                                    ]),

                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('tp_inception_date')
                                            ->label('TP Inception Date')
                                            ->date(),

                                        TextEntry::make('tp_expiry_date')
                                            ->label('TP Expiry Date')
                                            ->date(),

                                        TextEntry::make('idv')
                                            ->label('IDV'),
                                    ]),

                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('previousInsurer.name')
                                            ->label('PY Ins. Comp.'),

                                        TextEntry::make('py_policy_number')
                                            ->label('PY Policy No.'),
                                    ]),

                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('tarrif_rate')
                                            ->label('Tariff Rate')
                                            ->suffix('%'),

                                        TextEntry::make('actual_tarrif')
                                            ->label('Actual Tariff')
                                            ->suffix('%'),

                                        IconEntry::make('third_party')
                                            ->label('Third Party')
                                            ->boolean(),
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

                                        Grid::make(4)
                                            ->schema([
                                                TextEntry::make('cc')
                                                    ->label('CC'),

                                                TextEntry::make('yom')
                                                    ->label('YOM')
                                                    ->badge(),

                                                TextEntry::make('fuelType.name')
                                                    ->label('Fuel Type')
                                                    ->badge(),

                                                TextEntry::make('seating_capacity')
                                                    ->label('Seating Capacity'),
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

                                        Grid::make(3)
                                            ->schema([
                                                TextEntry::make('engine_type')
                                                    ->label('Engine No.')
                                                    ->copyable(),

                                                TextEntry::make('chasis')
                                                    ->label('Chasis')
                                                    ->copyable(),

                                                TextEntry::make('rto.full_name')
                                                    ->label('RTO'),
                                            ]),
                                    ])
                                    ->collapsible(),
                            ])
                            ->collapsible(),

                        // Premium Details
                        Section::make('Premium Details')
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('od')
                                            ->label('OD')
                                            ->money('INR'),

                                        TextEntry::make('add_on')
                                            ->label('Add On')
                                            ->money('INR'),

                                        TextEntry::make('other')
                                            ->label('Other')
                                            ->money('INR'),
                                    ]),

                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('tp_premium')
                                            ->label('TP Premium')
                                            ->money('INR'),

                                        TextEntry::make('tp_tax')
                                            ->label('TP Tax')
                                            ->suffix('%'),

                                        TextEntry::make('tppd')
                                            ->label('TPPD(-)')
                                            ->money('INR'),
                                    ]),

                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('liab_cng')
                                            ->label('Liab CNG')
                                            ->money('INR'),

                                        TextEntry::make('liab_passenger')
                                            ->label('Liab Passenger')
                                            ->money('INR'),

                                        TextEntry::make('liab_owner_driver')
                                            ->label('Liab Owner Driver')
                                            ->money('INR'),
                                    ]),

                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('tax')
                                            ->label('Tax')
                                            ->suffix('%'),

                                        TextEntry::make('tax_amount')
                                            ->label('Tax Amount')
                                            ->money('INR'),

                                        TextEntry::make('total_premium')
                                            ->label('Total Premium')
                                            ->money('INR')
                                            ->weight(FontWeight::Bold)
                                            ->size('lg')
                                            ->color('success'),
                                    ]),

                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('od_percentage')
                                            ->label('OD%')
                                            ->suffix('%'),

                                        TextEntry::make('tp_percentage')
                                            ->label('TP%')
                                            ->suffix('%'),

                                        TextEntry::make('specific_amount')
                                            ->label('Specific Amount')
                                            ->money('INR'),
                                    ]),

                                TextEntry::make('add_on_coverages')
                                    ->label('Add On Coverages')
                                    ->formatStateUsing(function ($state) {
                                        if (!$state) return 'None';

                                        $labels = [
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
                                        ];

                                        // Convert array to string
                                        if (is_array($state)) {
                                            $formattedLabels = collect($state)
                                                ->map(fn($item) => $labels[$item] ?? $item)
                                                ->toArray();

                                            return implode(', ', $formattedLabels);
                                        }

                                        return $state;
                                    })
                                    ->badge()
                                    ->separator(', '),
                            ])
                            ->collapsible(),

                        // Payment Details
                        Section::make('Payment Details')
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('payment_mode')
                                            ->label('Payment Mode')
                                            ->badge()
                                            ->formatStateUsing(fn($state) => ucfirst($state))
                                            ->color(fn(string $state): string => match ($state) {
                                                'card' => 'info',
                                                'cheque' => 'warning',
                                                'neft' => 'success',
                                                'dd' => 'primary',
                                                default => 'gray',
                                            }),

                                        TextEntry::make('payment_date')
                                            ->label('Payment Date')
                                            ->date(),

                                        TextEntry::make('cheque_trans_number')
                                            ->label('Cheque/Trans Number')
                                            ->visible(fn($record) => !in_array($record->payment_mode, ['other'])),
                                    ]),

                                Grid::make(2)
                                    ->schema([
                                        TextEntry::make('bank.name')
                                            ->label('Bank')
                                            ->visible(fn($record) => !in_array($record->payment_mode, ['card', 'other'])),

                                        TextEntry::make('payment_amount')
                                            ->label('Payment Amount')
                                            ->money('INR')
                                            ->weight(FontWeight::Bold),
                                    ]),
                            ])
                            ->collapsible(),
                        //Documents
                        Section::make('Documents')
                            ->schema([
                                ViewEntry::make('policy')
                                    ->label('Proposal Form')
                                    ->view('filament.infolists.components.file-viewer'),
                                ViewEntry::make('proposal_form')
                                    ->label('Proposal Form')
                                    ->view('filament.infolists.components.file-viewer'),
                                ViewEntry::make('renewal_form')
                                    ->label('Renewal Form')
                                    ->view('filament.infolists.components.file-viewer'),
                                ViewEntry::make('rc_book')
                                    ->label('RC Book')
                                    ->view('filament.infolists.components.file-viewer'),
                                ViewEntry::make('visiting_card')
                                    ->label('Visiting Card')
                                    ->view('filament.infolists.components.file-viewer'),
                                ViewEntry::make('mandate')
                                    ->label('Mandate')
                                    ->view('filament.infolists.components.file-viewer'),
                                ViewEntry::make('other_document')
                                    ->label('Other')
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
