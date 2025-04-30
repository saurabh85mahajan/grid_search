<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CcResource\Pages;
use App\Models\Cc;
use App\Traits\HasStatusColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Fieldset;


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
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Select::make('proposal_type')
                                            ->label('Proposal type')
                                            ->options([
                                                'Fresh' => 'Fresh',
                                                'Renewal' => 'Renewal',
                                            ])
                                            ->placeholder('Select Proposal Type'),
                                            
                                        Forms\Components\Select::make('posp')
                                            ->label('Product Posp')
                                            ->options([
                                                'POSP' => 'POSP',
                                                'Non POSP' => 'Non POSP',
                                            ])
                                            ->placeholder('Select POSP'),
                                    ]),
                            ])->collapsible(),
                        
                        // Basic Information
                        Forms\Components\Section::make('Client Details')
                            ->schema([
                                Forms\Components\Grid::make(4)
                                    ->schema([
									
										Forms\Components\Select::make('salutation_id')
                                            ->label('Salutation')
                                            ->relationship('salutation', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Salutation'),
									
										Forms\Components\TextInput::make('first_name')
                                            ->label('First Name')
                                            ->required()
                                            ->placeholder('Enter First Name'),
                                            
                                        Forms\Components\TextInput::make('middle_name')
                                            ->label('Middle Name')
                                            ->placeholder('Enter Middle Name'),
                                            
                                        Forms\Components\TextInput::make('last_name')
                                            ->label('Last Name')
                                            ->placeholder('Enter Last Name'),
                                    ]),
								
								Forms\Components\Grid::make(1)
                                    ->schema([
									
										Forms\Components\TextInput::make('address_1')
                                            ->label('Address')
                                            ->placeholder('Enter Address 1')
                                    ]),
									
								Forms\Components\Grid::make(2)
                                    ->schema([
									
										Forms\Components\TextInput::make('address_2')
                                            ->label('Address 2')
                                            ->placeholder('Enter Address 2'),
                                            
                                        Forms\Components\TextInput::make('address_3')
                                            ->label('Address 3')
                                            ->placeholder('Enter Address 3'),
                                    ]),
                                    
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        
										Forms\Components\TextInput::make('zipcode')
                                            ->label('Pin Code')
                                            ->placeholder('Enter Pin Code'),
										
										Forms\Components\Select::make('city_id')
                                            ->label('City')
                                            ->relationship('city', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select City')
                                    ]),
								Forms\Components\Grid::make(2)
                                    ->schema([
                                        
										Forms\Components\TextInput::make('email')
                                            ->label('Email')
                                            ->email()
                                            ->placeholder('Enter Email Address'),
										
										Forms\Components\TextInput::make('phone')
                                            ->label('Mobile')
                                            ->tel()
                                            ->placeholder('Enter Mobile Number'),
                                            
                                        
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
                                            ->relationship('region', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Region'),
										
										Forms\Components\Select::make('business_lock_id')
                                            ->label('Business Lock')
                                            ->relationship('businessLock', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Bussiness Lock'),
											
									]),
									
									Forms\Components\Grid::make(2)
                                    ->schema([
                                        
										Forms\Components\Select::make('insurance_company_id')
                                            ->label('Insurance Company')
                                            ->relationship('insuranceCompany', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Insurance Company'),
										
										Forms\Components\TextInput::make('policy_number')
                                            ->label('Policy No.')
                                            ->placeholder('Enter Policy No.'),
											
										
											
									]), 
									
									Forms\Components\Grid::make(2)
                                    ->schema([
                                        
										Forms\Components\DatePicker::make('policy_issue_date')
                                            ->label('Policy Issue Date')
											->placeholder('Select Policy Issue Date')
											->format('Y-m-d'),
										
										Forms\Components\TextInput::make('code')
                                            ->label('Code')
                                            ->placeholder('Enter Code'),
											
											
									]),
									
									Forms\Components\Grid::make(3)
                                    ->schema([
                                        
										Forms\Components\Select::make('product_id')
                                            ->label('Product')
                                            ->relationship('product', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Product'),
										
										Forms\Components\Select::make('product_category_id')
                                            ->label('Product Category')
                                            ->relationship('productCategory', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Product Category'),
											
										Forms\Components\TextInput::make('risk_category')
                                            ->label('Risk Category')
                                            ->placeholder('Risk Category'),
											
									]),
									
									Forms\Components\Grid::make(3)
                                    ->schema([
                                        
										Forms\Components\DatePicker::make('inception_date')
                                            ->label('Inception Date')
											->format('Y-m-d'),
											
										Forms\Components\DatePicker::make('expiry_date')
                                            ->label('Expiry Date')
											->format('Y-m-d'),
											
										Forms\Components\Select::make('ncb_id')
                                            ->label('NCB')
                                            ->relationship('ncb', 'name')
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
											->format('Y-m-d'),
											
										Forms\Components\TextInput::make('idv')
                                            ->label('IDV')
                                            ->placeholder('Enter IDV'),
											
									]),
									
									Forms\Components\Grid::make(2)
                                    ->schema([
                                        
										Forms\Components\Select::make('py_insurance_company_id')
                                            ->label('PY Ins. Comp.')
                                            ->relationship('insuranceCompany', 'name')
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
                                            ->relationship('make', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Make'),
										
										Forms\Components\TextInput::make('vehicle_model')
                                            ->label('Vehicle Model')
                                            ->placeholder('Enter Vehicle Model'),
										
										Forms\Components\TextInput::make('vehicle_sub_model')
                                            ->label('Vehicle Sub Model')
                                            ->placeholder('Enter Vehicle Sub Model'),
											
									]),
									
									Forms\Components\Grid::make(4)
                                    ->schema([
                                        
										Forms\Components\TextInput::make('cc')
                                            ->label('CC')
                                            ->placeholder('Enter CC'),
										
										Forms\Components\TextInput::make('yom')
                                            ->label('YOM')
                                            ->placeholder('Enter YOM'),
											
										Forms\Components\Select::make('fuel_type_id')
                                            ->label('Fuel Type')
                                            ->relationship('fuelType', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select Fuel Type'),
											
										Forms\Components\Select::make('seating_capacity')
                                            ->label('Seating Capacity')
                                            ->searchable()
                                            ->placeholder('--Select--')
											->options([
												2 => 2,
												4 => 4,
												5 => 5,
												6 => 6,
												7 => 7
											]),
											
									]),
									
									Fieldset::make('Registration Number')
									->schema([
										Forms\Components\TextInput::make('registration_number_1')
                                            ->hiddenLabel() 
                                            ->placeholder('GJ'),
										
										Forms\Components\TextInput::make('registration_number_2')
                                            ->hiddenLabel()
                                            ->placeholder('01'),
											
										Forms\Components\TextInput::make('registration_number_3')
                                            ->hiddenLabel()
                                            ->placeholder('AB'),
										
										Forms\Components\TextInput::make('registration_number_4')
                                            ->hiddenLabel()
                                            ->placeholder('1234'),
									])
									->columns(4),
									
									Forms\Components\Grid::make(3)
                                    ->schema([
                                        
										Forms\Components\TextInput::make('engine_type')
                                            ->label('Engine No.')
                                            ->placeholder('Enter Engine No.'),
											
										Forms\Components\TextInput::make('chasis')
                                            ->label('Chasis')
                                            ->placeholder('Enter Chasis'),
											
										Forms\Components\Select::make('rto_id')
                                            ->label('RTO')
                                            ->relationship('rto', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select RTO'),
											
									]),
									
									
								
                            ])->collapsible(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration_no')
                    ->label('Registration No')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('make.name')
                    ->label('Make')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->sortable(),
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
