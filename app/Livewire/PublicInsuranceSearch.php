<?php

namespace App\Livewire;

use App\Models\InsuranceGridRaw;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Attributes\Url;
use Livewire\Component;

class PublicInsuranceSearch extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public $userType = 'agent';

    #[Url]
    public $insurer = '';

    #[Url]
    public $segment = '';

    #[Url]
    public $policy_type = '';

    #[Url]
    public $region = 1;

    #[Url]
    public $period = 1;

    public function mount($userType = 'agent')
    {
        $this->userType = $userType;
    }

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

                if (!empty($this->region)) {
                    $query->where('region', $this->region);
                }

                if (!empty($this->period)) {
                    $query->where('period', $this->period);
                }

                return $query;
            })
            ->columns([
            TextColumn::make('insurer')
                ->label('Insurance')
                ->formatStateUsing(function ($state, $record): string { 
                    $points = $this->userType === 'employee' ? $record->points : ($record->points - 5);
                    return "
                        <div class='bg-white rounded-lg p-3 space-y-2' style='width: 100%; max-width: 100%;'>
                            <div class='flex justify-between items-start gap-3 pb-2 border-b border-gray-200'>
                                <span class='font-bold text-primary-600 text-lg' style='word-break: break-word; overflow-wrap: break-word; white-space: normal; flex: 1; min-width: 0;'>{$record->insurer_with_remarks}</span>
                                <span class='bg-green-100 text-green-800 px-3 py-1 rounded-full font-bold text-xl shrink-0'>{$points}</span>
                            </div>
                            <div class='text-sm space-y-2' style='width: 100%;'>
                                <div style='word-break: break-word; overflow-wrap: break-word; white-space: normal; max-width: 100%;'>
                                    <span class='font-semibold'>Segment:</span> 
                                    <span class='text-info-600' style='word-break: break-word; overflow-wrap: break-word; white-space: normal;'>{$record->segment_with_remarks}</span>
                                </div>
                                <div style='word-break: break-word; overflow-wrap: break-word; white-space: normal; max-width: 100%;'>
                                    <span class='font-semibold'>Policy:</span> 
                                    <span style='word-break: break-word; overflow-wrap: break-word; white-space: normal;'>{$record->policy_type_with_remarks}</span>
                                </div>
                                <div style='word-break: break-word; overflow-wrap: break-word; white-space: normal; max-width: 100%;'>
                                    <span class='font-semibold'>Location:</span> 
                                    <span style='word-break: break-word; overflow-wrap: break-word; white-space: normal;'>{$record->location}</span>
                                </div>
                                <div style='word-break: break-word; overflow-wrap: break-word; white-space: normal; max-width: 100%;'>
                                    <span class='font-semibold'>Remarks:</span> 
                                    <span class='text-xs text-gray-600' style='word-break: break-word; overflow-wrap: break-word; white-space: normal;'>{$record->remarks_additional}</span>
                                </div>
                            </div>
                        </div>
                    ";
                })
                ->html()
                ->hiddenFrom('md')
                ->wrap(), // Add this too
                TextColumn::make('insurer_with_remarks')
                    ->label('Insurer')
                    ->weight('semibold')
                    ->color('primary')
                    ->wrap()
                    ->extraAttributes(['style' => 'width: 120px; max-width: 120px; word-break: break-word; white-space: normal;'])
                    ->visibleFrom('md'),
                TextColumn::make('segment_with_remarks')
                    ->label('Segment')
                    ->color('info')
                    ->wrap()
                    ->extraAttributes(['style' => 'width: 150px; max-width: 150px; word-break: break-word; white-space: normal;'])
                    ->visibleFrom('md'),
                TextColumn::make('policy_type_with_remarks')
                    ->label('Policy Type')
                    ->wrap()
                    ->extraAttributes(['style' => 'width: 150px; max-width: 150px; word-break: break-word; white-space: normal;'])
                    ->visibleFrom('md'),
                TextColumn::make('location')
                    ->label('Location')
                    ->wrap()
                    ->extraAttributes(['style' => 'width: 150px; max-width: 150px; word-break: break-word; white-space: normal;'])
                    ->visibleFrom('md'),
                TextColumn::make('remarks_additional')
                    ->label('Remarks')
                    ->wrap()
                    ->extraAttributes(['style' => 'width: 250px; max-width: 250px; word-break: break-word; white-space: normal;'])
                    ->visibleFrom('md'),
                TextColumn::make('points')
                    ->label('Points')
                    ->formatStateUsing(fn ($state) => $this->userType === 'employee' ? $state : $state - 5)
                    ->color('success')
                    ->size('lg')
                    ->weight('bold')
                    ->alignCenter()
                    ->extraAttributes(['style' => 'width: 100px; max-width: 100px; word-break: break-word; white-space: normal;'])
                    ->visibleFrom('md'),
            ])
            ->emptyStateHeading('No Results Found')
            ->emptyStateDescription('Try adjusting your search criteria')
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
        $this->region = 1;
        $this->period = 1;
        $this->resetTable();
    }

    public function render()
    {
        return view('livewire.public-insurance-search', [
            'periodArray' => InsuranceGridRaw::getPeriodArray(),
            'regionArray' => InsuranceGridRaw::getRegionArray(),
        ])
            ->layout('components.layouts.app');
    }
}