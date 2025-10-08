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
                TextColumn::make('insurer_with_remarks')
                    ->label('Insurer')
                    ->weight('semibold')
                    ->color('primary')
                    ->wrap()
                    ->extraAttributes(['style' => 'width: 100px; max-width: 100px; word-break: break-word; white-space: normal;']),
                TextColumn::make('segment_with_remarks')
                    ->label('Segment')
                    ->color('info')
                    ->wrap()
                    ->extraAttributes(['style' => 'width: 150px; max-width: 150px; word-break: break-word; white-space: normal;']),
                TextColumn::make('policy_type_with_remarks')
                    ->label('Policy Type')
                    ->wrap()
                    ->extraAttributes(['style' => 'width: 150px; max-width: 150px; word-break: break-word; white-space: normal;']),
                TextColumn::make('location')
                    ->label('Location')
                    ->wrap()
                    ->extraAttributes(['style' => 'width: 150px; max-width: 150px; word-break: break-word; white-space: normal;']),
                TextColumn::make('remarks_additional')
                    ->label('Remarks')
                    ->wrap()
                    ->extraAttributes(['style' => 'width: 250px; max-width: 250px; word-break: break-word; white-space: normal;']),
                TextColumn::make('points')
                    ->label('Points')
                    ->color('success')
                    ->size('lg')
                    ->weight('bold')
                    ->alignCenter()
                    ->extraAttributes(['style' => 'width: 100px; max-width: 100px; word-break: break-word; white-space: normal;']),
            ])
            ->defaultSort('insurer')
            ->paginated(100)
            ->paginationPageOptions([100])
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