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
use App\Filament\Exports\EntryExporter;

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
                            ->placeholder("Enter First Name"),

                        Forms\Components\TextInput::make("advisor_name")
                            ->label("Advisor/POS Name")
                            ->placeholder("Enter Advisor/POS Name"),

                        Forms\Components\TextInput::make("advisor_code")
                            ->label("Advisor / POS Code")
                            ->placeholder("Advisor / POS Code"),
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
                            ->placeholder("Enter Name"),

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

                            ->placeholder("Upload PAN Card Copy"),
                    ]),

                    Fieldset::make(
                        "Upload Address Proof (Aadhar Card Copy - both front and back)"
                    )
                        ->schema([
                            Forms\Components\FileUpload::make("aadhaar_front")
                                ->label("")

                                ->placeholder("Upload Aadhaar Front"),
                            Forms\Components\FileUpload::make("aadhaar_back")
                                ->label("")

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
                            ->placeholder("Enter Nominee Name"),
                        Forms\Components\TextInput::make("nominee_relationship")
                            ->label("Nominee Relationship with Policy Holder")
                            ->placeholder(
                                "Enter Nominee Relationship with Policy Holder"
                            ),
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
                            ->placeholder("--Select--"),

                        Forms\Components\Select::make("life_insurance_type_id")
                            ->label("Type of Life Insurance")
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
                        Forms\Components\Select::make(
                            "health_insurance_type_id"
                        )
                            ->label("Type of Health Plan")
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
                            ->placeholder("Enter Vehicle Model"),
                        Forms\Components\TextInput::make("vehicle_number")
                            ->label("Vehicle Number")
                            ->placeholder("Enter Vehicle Number"),
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
                            ->numeric(),

                        Forms\Components\TextInput::make("third_party_premium")
                            ->label("Third Party Premium (Without GST)")
                            ->placeholder("Enter Premium")
                            ->numeric(),

                        Forms\Components\TextInput::make("own_damage_premium")
                            ->label(
                                "Own Damage and Riders Premium (without GST)"
                            )
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

                            ->placeholder("Upload Policy Bond"),

                        Forms\Components\FileUpload::make("rc_copy")
                            ->label("")

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
                            ->placeholder("Enter Premium Amount without GST"),

                        Forms\Components\DatePicker::make("risk_start_date")
                            ->label("Risk Start Date")
                            ->format("Y-m-d"),

                        Forms\Components\DatePicker::make("risk_end_date")
                            ->label("Risk End Date")
                            ->format("Y-m-d"),

                        Forms\Components\FileUpload::make("policy_bond_receipt")
                            ->label("")

                            ->placeholder(
                                "Upload Policy Bond / Premium Receipt"
                            ),

                        Forms\Components\TextInput::make("number_of_lives")
                            ->label("Number of lives")
                            ->numeric()
                            ->placeholder("Enter Number of lives"),

                        Forms\Components\TextInput::make("premium_amount_total")
                            ->label("Premium Amount")
                            ->numeric()
                            ->placeholder("Enter Premium Amount"),

                        Forms\Components\TextInput::make("out_percentage")
                            ->label("Out%")
                            ->numeric()
                            ->placeholder("Enter Out%"),

                        Forms\Components\TextInput::make("net_od")
                            ->label("Net/Od")
                            ->numeric()
                            ->placeholder("Enter Net/Od"),
                    ]),
                ])
                ->collapsible(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                ExportAction::make()
                    ->exporter(EntryExporter::class)
                    ->label("Export Entries"),
            ])
            ->columns([
                Tables\Columns\TextColumn::make("business_sourced_by")
                    ->label("Business Sourced By")
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make("advisor_name")
                    ->label("Advisor/POS Name")
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make("advisor_code")
                    ->label("Advisor/POS Code")
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make("name")
                    ->label("Name")
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make("mobile_no")
                    ->label("Mobile No.")
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make("email")
                    ->label("Email")
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            "index" => Pages\ListEntries::route("/"),
            "create" => Pages\CreateEntry::route("/create"),
            "edit" => Pages\EditEntry::route("/{record}/edit"),
        ];
    }
}
