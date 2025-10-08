<?php

namespace App\Livewire;

use App\Models\InsuranceGridRaw;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class PublicInsuranceSearch extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('insurer')
                    ->label('Select Insurer')
                    ->options(fn () => InsuranceGridRaw::distinct()->orderBy('insurer')->pluck('insurer', 'insurer')->toArray())
                    ->searchable()
                    ->placeholder('All Insurers')
                    ->native(false),
                Select::make('segment')
                    ->label('Select Segment')
                    ->options(fn () => InsuranceGridRaw::distinct()->orderBy('segment')->pluck('segment', 'segment')->toArray())
                    ->searchable()
                    ->placeholder('All Segments')
                    ->native(false),
                Select::make('policy_type')
                    ->label('Select Policy Type')
                    ->options(fn () => InsuranceGridRaw::distinct()->orderBy('policy_type')->pluck('policy_type', 'policy_type')->toArray())
                    ->searchable()
                    ->placeholder('All Policy Types')
                    ->native(false),
            ])
            ->columns(3)
            ->statePath('data');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(function () {
                $query = InsuranceGridRaw::query();

                if ($this->data['insurer'] ?? null) {
                    $query->where('insurer', $this->data['insurer']);
                }

                if ($this->data['segment'] ?? null) {
                    $query->where('segment', $this->data['segment']);
                }

                if ($this->data['policy_type'] ?? null) {
                    $query->where('policy_type', $this->data['policy_type']);
                }

                return $query;
            })
            ->columns([
                TextColumn::make('insurer')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('segment')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('policy_type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('points')
                    ->sortable()
                    ->badge()
                    ->color('success'),
                TextColumn::make('location')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->location)
                    ->wrap(),
                TextColumn::make('location_remarks')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('insurer_remarks')
                    ->label('Insurer Remarks')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('segment_remarks')
                    ->label('Segment Remarks')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('policy_type_remarks')
                    ->label('Policy Type Remarks')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('remarks_additional')
                    ->label('Additional Remarks')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('insurer')
            ->paginated([10, 25, 50, 100])
            ->striped();
    }

    public function render()
    {
        return view('livewire.public-insurance-search')
            ->layout('components.layouts.app');
    }
}