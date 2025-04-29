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
                Forms\Components\Section::make('Client Details')
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
                                            ->label('Posp')
                                            ->options([
                                                'POSP' => 'POSP',
                                                'Non POSP' => 'Non POSP',
                                            ])
                                            ->placeholder('Select POSP'),
                                    ]),
                            ]),
                        
                        // Basic Information
                        Forms\Components\Section::make('Basic Information')
                            ->schema([
                                Forms\Components\Grid::make(3)
                                    ->schema([
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
                                    
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('phone')
                                            ->label('Phone')
                                            ->tel()
                                            ->placeholder('Enter Phone Number'),
                                            
                                        Forms\Components\TextInput::make('email')
                                            ->label('Email')
                                            ->email()
                                            ->placeholder('Enter Email Address'),
                                    ]),
                            ]),
                            
                        // Address
                        Forms\Components\Section::make('Address')
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\Textarea::make('address_1')
                                            ->label('Address')
                                            ->placeholder('Address 1')
                                            ->rows(3)
                                            ->columnSpan(2),
                                            
                                        Forms\Components\Select::make('city_id')
                                            ->label('City')
                                            ->relationship('city', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->placeholder('Select City')
                                            ->columnSpan(1),
                                    ])
                                    ->columns(3),
                            ]),
                    ])
                    ->collapsible(),
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
