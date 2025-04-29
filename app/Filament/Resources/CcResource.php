<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CcResource\Pages;
use App\Filament\Resources\CcResource\RelationManagers;
use App\Models\Cc;
use App\Traits\HasStatusColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CcResource extends Resource
{
    use HasStatusColumn;

    protected static ?string $model = Cc::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        // Client Details Tab
                        Forms\Components\Tabs\Tab::make('Client Details')
                            ->schema([
                                Forms\Components\Section::make('Proposal Information')
                                    ->schema([
                                        Forms\Components\Select::make('proposal_type')
                                            ->options([
                                                'Fresh' => 'Fresh',
                                                'Renewal' => 'Renewal',
                                            ])
                                            ->placeholder('Select Proposal Type')
                                            ->columnSpan(1),
                                        Forms\Components\Select::make('posp')
                                            ->options([
                                                'POSP' => 'POSP',
                                                'Non POSP' => 'Non POSP',
                                            ])
                                            ->placeholder('Select Policy Type')
                                            ->columnSpan(1),
                                    ])
                                    ->columns(3),

                                Forms\Components\Section::make('Basic Information')
                                    ->schema([
                                        Forms\Components\TextInput::make('first_name')
                                            ->label('First Name')
                                            ->required()
                                            ->placeholder('Enter First Name')
                                            ->columnSpan(1),
                                        Forms\Components\TextInput::make('middle_name')
                                            ->label('Middle Name')
                                            ->placeholder('Enter Middle Name')
                                            ->columnSpan(1),
                                        Forms\Components\TextInput::make('last_name')
                                            ->label('Last Name')
                                            ->placeholder('Enter Last Name')
                                            ->columnSpan(1),
                                        Forms\Components\TextInput::make('phone')
                                            ->label('Phone')
                                            ->tel()
                                            ->placeholder('Enter Phone Number')
                                            ->columnSpan(1),
                                        Forms\Components\TextInput::make('email')
                                            ->label('Email')
                                            ->email()
                                            ->placeholder('Enter Email Address')
                                            ->columnSpan(1),
                                    ])
                                    ->columns(3),

                                Forms\Components\Section::make('Address')
                                    ->schema([
                                        Forms\Components\Textarea::make('address_1')
                                            ->label('Address')
                                            ->placeholder('Address 1')
                                            ->rows(3)
                                            ->columnSpan(2),
                                        Forms\Components\Grid::make()
                                            ->schema([
                                                Forms\Components\Select::make('city_id')
                                                    ->relationship('city', 'name')
                                                    ->searchable()
                                                    ->preload()
                                                    ->placeholder('Select City'),
                                            ])
                                            ->columnSpan(1),
                                    ])
                                    ->columns(3),
                            ]),
                    ])
                    ->columnSpanFull(),
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
