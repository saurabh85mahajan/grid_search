<?php

namespace App\Filament\Ppc\Resources;

use App\Filament\Ppc\Resources\EntryResource\Pages;
use App\Filament\Ppc\Resources\EntryResource\RelationManagers;
use App\Models\Entry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Carbon\Carbon;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Support\Enums\FontWeight;
use Filament\Infolists\Components\ImageEntry;


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
                        Forms\Components\Hidden::make("user_id")->default(
                            auth()->user()->id
                        ),

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
                            ->tel()
                            ->placeholder("Enter Mobile"),

                        Forms\Components\TextInput::make("email")
                            ->label("Email")
                            ->email()
                            ->required()
                            ->validationMessages([
                                "required" => "Please Enter Email Address",
                            ])
                            ->placeholder("Enter Email Address"),

                        Forms\Components\FileUpload::make("pan_card")
                            ->label("")
							->placeholder("Upload PAN Card Copy")
							->preserveFilenames(),
                    ]),

                    Fieldset::make(
                        "Upload Address Proof (Aadhar Card Copy - both front and back)"
                    )
                        ->schema([
                            Forms\Components\FileUpload::make("aadhaar_front")
                                ->label("")
								->preserveFilenames()
                                ->placeholder("Upload Aadhaar Front"),
                            Forms\Components\FileUpload::make("aadhaar_back")
                                ->label("")
								->preserveFilenames()
                                ->placeholder("Upload Aadhaar Back"),
                        ])
                        ->columns(2),
                ])
                ->collapsible(),

            // Nominee Details
            Forms\Components\Section::make("Nominee Details")
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make("nominee_name")
                            ->label(
                                "Nominee Name (Mention NA in case of Non-individual)"
                            )
							->extraInputAttributes(['maxlength' => 50])
                            ->placeholder("Enter Nominee Name"),
                        Forms\Components\TextInput::make("nominee_relationship")
                            ->label("Nominee Relationship with Policy Holder")
                            ->placeholder(
                                "Enter Nominee Relationship with Policy Holder"
                            )
							->extraInputAttributes(['maxlength' => 50]),
                        Forms\Components\DatePicker::make("nominee_dob")
                            ->label(
                                "Nominee Date of Birth (Mention Date of Incorporation in case of Non-individual)"
                            )
                            ->placeholder("Select Nominee DOB")
                            ->format("Y-m-d"),
                    ]),
                ])
                ->collapsible(),

            // Insurance Details
            Forms\Components\Section::make("Insurance Details")
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
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
                            ->disabled(fn (Forms\Get $get): bool => $get('insurance_type_id') == 3)
							->dehydrated()
							/* ->hidden(
								fn(Forms\Get $get): bool =>
								in_array($get('insurance_type_id'), ['3'])
							) */
							->relationship(
                                "lifeInsuranceType",
                                "name",
                                modifyQueryUsing: fn(
                                    Builder $query
                                ) => $query->where("is_active", true)
                            )
                            ->searchable()
                            ->preload()
                            ->placeholder("--Select--")
							,
							
                        Forms\Components\Select::make("health_insurance_type_id")
                            ->label("Type of Health Plan")
                            ->dehydrated()
							->disabled(fn (Forms\Get $get): bool => $get('insurance_type_id') == 3)
							/* ->hidden(
								fn(Forms\Get $get): bool =>
								in_array($get('insurance_type_id'), ['3'])
							) */
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
                            ->searchable()
                            ->preload()
                            ->placeholder("Select Make"),
                        Forms\Components\TextInput::make("vehicle_model")
                            ->label("Vehicle Model")
                            ->placeholder("Enter Vehicle Model")
							->extraInputAttributes(['maxlength' => 50]),
                        Forms\Components\TextInput::make("vehicle_number")
                            ->label("Vehicle Number")
                            ->placeholder("Enter Vehicle Number")
							->extraInputAttributes(['maxlength' => 50]),
                    ]),
                ])
                ->collapsible(),

            // Policy Details
            Forms\Components\Section::make("Policy Details")
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make("idv")
                            ->label("Insured Declared Value (IDV)")
                            ->placeholder("Enter IDV")
                            ->numeric()
							->prefix('₹')
							->extraInputAttributes([
								'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
							]),

                        Forms\Components\TextInput::make("third_party_premium")
                            ->label("Third Party Premium (Without GST)")
                            ->placeholder("Enter Premium")
							->prefix('₹')
							->extraInputAttributes([
								'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
							])
                            ->numeric(),

                        Forms\Components\TextInput::make("own_damage_premium")
                            ->label(
                                "Own Damage and Riders Premium (without GST)"
                            )
							->prefix('₹')
							->extraInputAttributes([
								'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
							])
                            ->placeholder("Enter Premium")
                            ->numeric(),
                    ]),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\DatePicker::make("od_risk_start_date")
                            ->label("Risk Start Date (Own Damage)")
                            ->format("Y-m-d"),

                        Forms\Components\DatePicker::make("od_risk_end_date")
                            ->label("Risk end Date (Own Damage)")
                            ->format("Y-m-d"),

                        Forms\Components\DatePicker::make("tp_risk_start_date")
                            ->label("Risk start Date (Third Party)")
                            ->format("Y-m-d"),

                        Forms\Components\DatePicker::make("tp_risk_end_date")
                            ->label("Risk End Date (Third Party)")
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

                    Forms\Components\Grid::make(2)->schema([
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

                        Forms\Components\TextInput::make("sum_insured")
                            ->label("Sum Insured/Assured")
							->prefix('₹')
							->extraInputAttributes([
								'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
							])
                            ->placeholder("Sum Insured/Assured"),

                        Forms\Components\Select::make("premium_paying_term")
                            ->label("Premium Paying Term (In number of years)")
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
                            ->label("Policy Term (In number of years)")
                            ->searchable()
                            ->placeholder("--Select--")

                            ->options(function () {
                                $years = [];

                                for ($year = 1; $year <= 20; $year++) {
                                    $years[$year] = $year;
                                }

                                return $years;
                            }),

                        Forms\Components\TextInput::make("premium_amount")
                            ->label("Premium Amount without GST")
                            ->numeric()
							->prefix('₹')
							->extraInputAttributes([
								'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
							])
                            ->placeholder("Enter Premium Amount without GST"),

                        Forms\Components\DatePicker::make("risk_start_date")
                            ->label("Risk Start Date")
                            ->format("Y-m-d"),

                        Forms\Components\DatePicker::make("risk_end_date")
                            ->label("Risk End Date")
                            ->format("Y-m-d"),

                        Forms\Components\FileUpload::make("policy_bond_receipt")
                            ->label("")
							->preserveFilenames()
                            ->placeholder(
                                "Upload Policy Bond / Premium Receipt"
                            ),

                        Forms\Components\TextInput::make("number_of_lives")
                            ->label("Number of lives")
                            ->numeric()
                            ->placeholder("Enter Number of lives")
							->extraInputAttributes([
								'oninput' => 'if(this.value.length > 1) this.value = this.value.slice(0, 1);'
							]),

                        Forms\Components\TextInput::make("premium_amount_total")
                            ->label("Premium Amount")
                            ->numeric()
                            ->placeholder("Enter Premium Amount")
							->prefix('₹')
							->extraInputAttributes([
								'oninput' => 'if(this.value.length > 10) this.value = this.value.slice(0, 10);'
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
                        $query = Entry::query();

                        // Apply search
                        if (!empty($search)) {
                            $query->where(function ($q) use ($search) {
                                $q->where('business_sourced_by', 'like', "%{$search}%")
                                    ->orWhere('advisor_name', 'like', "%{$search}%")
                                    ->orWhere('advisor_code', 'like', "%{$search}%")
                                    ->orWhere('name', 'like', "%{$search}%")
                                    ->orWhere('mobile_no', 'like', "%{$search}%")
                                    ->orWhere('email', 'like', "%{$search}%")
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
                        $data = $query->select('id', 'name', 'email', 'mobile_no', 'business_sourced_by', 'advisor_name', 'advisor_code', 'nominee_name', 'nominee_relationship', 'nominee_dob', 'created_at')->get();

                        //Todo Add All Columns.
                        $headers = ['ID', 'Name', 'Email', 'Mobile', 'Business Sourced by', 'Advisor/POS Name', 'Advisor / POS Code', 'Nominee Name', 'Nominee Relationship', 'Nominee Date of Birth', 'Created At'];

                        $csvContent = implode(',', $headers) . "\n";

                        foreach ($data as $row) {
                            $csvContent .= implode(',', [
                                $row->id,
                                '"' . str_replace('"', '""', $row->name ?? '') . '"',
                                '"' . str_replace('"', '""', $row->email ?? '') . '"',
                                '"' . str_replace('"', '""', $row->mobile_no ?? '') . '"',
                                '"' . str_replace('"', '""', $row->business_sourced_by ?? '') . '"',
                                '"' . str_replace('"', '""', $row->advisor_name ?? '') . '"',
                                '"' . str_replace('"', '""', $row->advisor_code ?? '') . '"',
                                '"' . str_replace('"', '""', $row->nominee_name ?? '') . '"',
                                '"' . str_replace('"', '""', $row->nominee_relationship ?? '') . '"',
                                '"' . str_replace('"', '""', $row->nominee_dob ?? '') . '"',
                                $row->created_at
                            ]) . "\n";
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
                    ->searchable(['name'])
                    ->sortable(),
				TextColumn::make('business_sourced_by')
                    ->formatStateUsing(function (Entry $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->business_sourced_by}</div>
                                <div class='text-sm text-gray-500'>{$record->advisor_name}</div>
                                <div class='text-xs text-gray-500'>{$record->advisor_code}</div>
                            </div>
                        ";
                    })
                    ->html()
                    ->label('Business')
                    ->searchable(['business_sourced_by', 'advisor_name', 'advisor_code'])
                    ->sortable(),
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
                    ->label('Name')
                    ->searchable(['name', 'mobile_no', 'email'])
                    ->sortable(),
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
                    ->html(),
				Tables\Columns\TextColumn::make('insuranceCompany.name')
                    ->label('Insurance Detail')
                    ->formatStateUsing(function (Entry $record): string {
                        return "
                            <div class='space-y-1'>
                                <div class='font-medium'>{$record->insuranceCompany->name}</div>
                                <div class='text-sm text-gray-500'>{$record->insuranceType->name}</div>
                                <div class='text-xs text-gray-500'>Life: Type: {$record->lifeInsuranceType->name}</div>
                                <div class='text-xs text-gray-500'>Health: {$record->healthInsuranceType->name}</div>
                                <div class='text-xs text-gray-500'>General: {$record->generalInsuranceType->name}</div>
                            </div>
                        ";
                    })
                    ->html(),
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
				->hidden(fn ($record) :bool => 
					$record['user_id'] != auth()->user()->id
				),
                Tables\Actions\ViewAction::make(),
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
							->state(fn ($record) => 
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
							->visible(fn ($state):bool => filled($state)),
							TextEntry::make('healthInsuranceType.name')
							->label('Health Plan')
							->visible(fn ($state):bool => filled($state)),
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
