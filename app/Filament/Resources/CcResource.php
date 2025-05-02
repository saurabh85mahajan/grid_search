<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CcResource\Pages;
use App\Models\Cc;
use App\Models\ProductCategory;
use App\Traits\HasStatusColumn;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Checkbox;

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
                                            ->disabledOn('edit')
                                            ->live()
                                            ->columnSpan(1),

                                        Forms\Components\TextInput::make('last_year_entry_no')
                                            ->label('Last Year Entry No')
                                            ->required()
                                            ->visible(fn (Forms\Get $get) => $get('proposal_type') === 'Renewal')
                                            ->columnSpan(1),

                                        Forms\Components\Select::make('posp')
                                            ->label('Product Posp')
                                            ->options([
                                                'POSP' => 'POSP',
                                                'Non POSP' => 'Non POSP',
                                            ])
                                            ->placeholder('Select POSP')
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
                                            ->relationship('salutation', 'name', 
                                                modifyQueryUsing: fn(Builder $query) => $query->active()->orderBy('id', 'asc'))
                                            ->searchable()
                                            ->preload()
                                            ->extraAttributes(['style' => 'width: 100px;'])
                                            ->columnSpan(2)
                                            ->placeholder('Select'),

                                        Forms\Components\TextInput::make('first_name')
                                            ->label('First Name')
                                            ->required()
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
                                            ->extraInputAttributes(['maxlength' => 8])
                                            ->placeholder('Enter Pin Code'),

                                        Forms\Components\Select::make('city_id')
                                            ->label('City')
                                            ->relationship('city', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select City')
                                            ->required(),

                                        Forms\Components\TextInput::make('phone')
                                            ->label('Mobile')
                                            ->tel()
                                            ->placeholder('Enter Mobile Number')
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
                                            ->required(),

                                        Forms\Components\Select::make('business_lock_id')
                                            ->label('Business Lock')
                                            ->relationship('businessLock', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Bussiness Lock')
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
                                            ->required(),

                                        Forms\Components\TextInput::make('policy_number')
                                            ->label('Policy No.')
                                            ->placeholder('Enter Policy No.')
                                            ->columnSpan(3)
                                            ->required(),

                                        Forms\Components\DatePicker::make('policy_issue_date')
                                            ->label('Policy Issue Date')
                                            ->placeholder('Select Policy Issue Date')
                                            ->format('Y-m-d')
                                            ->maxDate(now())
                                            ->columnSpan(2)
                                            ->required(),

                                        Forms\Components\TextInput::make('code')
                                            ->label('Code')
                                            ->placeholder('Enter Code')
                                            ->columnSpan(3)
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
                                            ->placeholder('Select Product'),

                                        Forms\Components\Select::make('product_category_id')
                                            ->label('Product Category')
                                            ->required()
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
                                            ->required(),

                                        Forms\Components\DatePicker::make('expiry_date')
                                            ->label('Expiry Date')
                                            ->format('Y-m-d')
                                            ->minDate(now())
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
                                            ->placeholder('Enter Tariff Rate'),

                                        Forms\Components\TextInput::make('actual_tarrif')
                                            ->label('Actual Tariff')
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
                                            ->placeholder('Select Make')
                                            ->required(),

                                        Forms\Components\TextInput::make('vehicle_model')
                                            ->label('Vehicle Model')
                                            ->placeholder('Enter Vehicle Model')
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
                                            ->required(),

                                        Forms\Components\Select::make('fuel_type_id')
                                            ->label('Fuel Type')
                                            ->relationship('fuelType', 'name', modifyQueryUsing: fn(Builder $query) => $query->active())
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Fuel Type')
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
                                            ->extraInputAttributes(['maxlength' => 2])
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
                                            ->required()
                                            ->placeholder('Enter Engine No.'),

                                        Forms\Components\TextInput::make('chasis')
                                            ->label('Chasis')
                                            ->minLength(5)
                                            ->required()
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
                                            ->placeholder('Enter OD'),

                                        Forms\Components\TextInput::make('add_on')
                                            ->label('Add On')
                                            ->placeholder('Enter Add On'),

                                        Forms\Components\TextInput::make('other')
                                            ->label('Other')
                                            ->placeholder('Enter Other'),

                                    ]),
                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\TextInput::make('tp_premium')
                                            ->label('TP Premium')
                                            ->placeholder('Enter OD'),

                                        Forms\Components\Select::make('tp_tax')
                                            ->label('TP Tax')
                                            ->placeholder('Enter TP Tax')
                                            ->options([
                                                1 => 1,
                                                2 => 2,
                                                3 => 3,
                                                4 => 4,
                                                5 => 5
                                            ]),

                                        Forms\Components\TextInput::make('tppd')
                                            ->label('TPPD')
                                            ->placeholder('Enter Other'),

                                    ]),
                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\TextInput::make('liab_cng')
                                            ->label('Liab CNG')
                                            ->placeholder('Enter Liab CNG'),

                                        Forms\Components\TextInput::make('liab_passenger')
                                            ->label('Liab Passenger')
                                            ->placeholder('Enter Liab Passenger'),

                                        Forms\Components\TextInput::make('liab_owner_driver')
                                            ->label('Liab Owner Driver')
                                            ->placeholder('Enter Liab Owner Driver'),

                                    ]),
                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\Select::make('tax')
                                            ->label('Tax')
                                            ->placeholder('Select Tax')
                                            ->options([
                                                1 => 1,
                                                2 => 2,
                                                3 => 3,
                                                4 => 4,
                                                5 => 5
                                            ]),

                                        Forms\Components\TextInput::make('tax_amount')
                                            ->label('Tax Amount')
                                            ->placeholder('Enter tax_amount'),

                                        Forms\Components\TextInput::make('total_premium')
                                            ->label('Total Premium')
                                            ->placeholder('Enter Total Premium'),

                                    ]),

                                Fieldset::make('Add On Coverages')
                                    ->schema([
                                        Checkbox::make('add_on_coverages')->inline()->label('Nil Dep.'),
                                        Checkbox::make('add_on_coverages')->inline()->label('Consumable'),
                                        Checkbox::make('add_on_coverages')->inline()->label('Engine Protector'),
                                        Checkbox::make('add_on_coverages')->inline()->label('Tyre Cover'),
                                        Checkbox::make('add_on_coverages')->inline()->label('Ncb Protector'),
                                        Checkbox::make('add_on_coverages')->inline()->label('R21'),
                                        Checkbox::make('add_on_coverages')->inline()->label('Keycover'),
                                        Checkbox::make('add_on_coverages')->inline()->label('RSA'),
                                        Checkbox::make('add_on_coverages')->inline()->label('Lose of Personal Belongings'),
                                        Checkbox::make('add_on_coverages')->inline()->label('Spare Car'),
                                    ])
                                    ->columns(4),

                            ])->collapsible(),

                        // Payment Details
                        Forms\Components\Section::make('Payment Details')
                            ->schema([
                                Forms\Components\Grid::make(3)
                                    ->schema([

                                        Forms\Components\TextInput::make('payment_mode')
                                            ->label('Payment Mode')
                                            ->placeholder('Enter Payment Mode'),

                                        Forms\Components\DatePicker::make('payment_date')
                                            ->label('Payment Date')
                                            ->format('Y-m-d'),

                                        Forms\Components\TextInput::make('cheque_trans_number')
                                            ->label('Other')
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
                                            ->placeholder('Select Bank'),

                                        Forms\Components\TextInput::make('payment_amount')
                                            ->label('Payment Amount')
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
                        return "{$record->proposal_type} {$record->posp}";
                    })
                    ->html()
                    ->label('Proposal Type')
                    ->searchable(['proposal_type', 'posp'])
                    ->sortable(),

                TextColumn::make('first_name')
                    ->formatStateUsing(function (Cc $record): string {
                        return "{$record->first_name} {$record->last_name}";
                    })
                    ->html()
                    ->label('Name')
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('make.name')
                    ->label('Make')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('vehicle_model')
                    ->label('Model')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('policy_number')
                    ->label('Policy Number')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('insuranceCompany.name')
                    ->label('Insurance Company')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                (new static)->getStatusFilter(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ...(new static)->getStatusBulkActions(),
                ]),
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
