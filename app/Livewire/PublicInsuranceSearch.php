<?php

namespace App\Livewire;

use App\Models\InsuranceGridRaw;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class PublicInsuranceSearch extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public $insurer = '';
    public $segment = '';
    public $policy_type = '';

    // These methods trigger table refresh when filters change
    public function updatedInsurer()
    {
        $this->resetTable();
    }

    public function updatedSegment()
    {
        $this->resetTable();
    }

    public function updatedPolicyType()
    {
        $this->resetTable();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(function () {
                $query = InsuranceGridRaw::query();

                // Fixed: use $this->insurer instead of $this->data['insurer']
                if (!empty($this->insurer)) {
                    $query->where('insurer', $this->insurer);
                }

                if (!empty($this->segment)) {
                    $query->where('segment', $this->segment);
                }

                if (!empty($this->policy_type)) {
                    $query->where('policy_type', $this->policy_type);
                }

                return $query;
            })
            ->columns([
                TextColumn::make('insurer')
                    ->label('Insurer')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold')
                    ->color('primary'),
                TextColumn::make('segment')
                    ->label('Segment')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                TextColumn::make('policy_type')
                    ->label('Policy Type')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                TextColumn::make('points')
                    ->label('Points')
                    ->sortable()
                    ->badge()
                    ->color('success')
                    ->size('lg')
                    ->weight('bold'),
                TextColumn::make('location')
                    ->label('Location')
                    ->limit(40)
                    ->tooltip(fn ($record) => $record->location)
                    ->wrap()
                    ->searchable(),
            ])
            ->actions([
                ViewAction::make()
                    ->modalHeading(fn ($record) => "{$record->insurer} - {$record->segment}")
                    ->modalContent(fn ($record) => view('livewire.insurance-details', ['record' => $record])),
            ])
            ->defaultSort('insurer')
            ->paginated([10, 25, 50, 100])
            ->striped();
    }

    public function clearFilters()
    {
        $this->insurer = '';
        $this->segment = '';
        $this->policy_type = '';
        $this->resetTable();
    }

    public function render()
    {
        return view('livewire.public-insurance-search')
            ->layout('components.layouts.app');
    }
}