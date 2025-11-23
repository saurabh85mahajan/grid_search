<?php

namespace App\Livewire;

use App\Models\IciciGrid;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Attributes\Url;
use Livewire\Component;


class IciciGridSearch extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    #[Url]
    public ?string $rto_category = '';

    #[Url]
    public ?string $rto_zone = '';

    #[Url]
    public ?string $rto_state = '';

    #[Url]
    public ?string $rto_location = '';

    protected $updatesQueryString = [
        'rto_category',
        'rto_zone',
        'rto_state',
        'rto_location',
        'search',
        'page',
    ];

    // Reset pagination when filters change
    public function updatedRtoCategory()
    {
        $this->resetPage();
    }
    public function updatedRtoZone()
    {
        $this->resetPage();
    }
    public function updatedRtoState()
    {
        $this->resetPage();
    }
    public function updatedRtoLocation()
    {
        $this->resetPage();
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->rto_category = '';
        $this->rto_zone = '';
        $this->rto_state = '';
        $this->rto_location = '';

        $this->resetPage();
    }

    public function render()
    {
        // dropdown data
        $categories = IciciGrid::query()
            ->select('rto_category')
            ->distinct()
            ->orderBy('rto_category')
            ->pluck('rto_category')
            ->filter()
            ->values();

        $zones = IciciGrid::query()
            ->select('rto_zone')
            ->distinct()
            ->orderBy('rto_zone')
            ->pluck('rto_zone')
            ->filter()
            ->values();

        $states = IciciGrid::query()
            ->select('rto_state')
            ->distinct()
            ->orderBy('rto_state')
            ->pluck('rto_state')
            ->filter()
            ->values();

        return view('livewire.public-icici-search', [
            'categories' => $categories,
            'zones'      => $zones,
            'states'     => $states,
        ])->layout('components.layouts.app');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(function () {
                $query = IciciGrid::query();

                if (!empty($this->rto_category)) {
                    $query->where('rto_category', $this->rto_category);
                }

                if (!empty($this->rto_zone)) {
                    $query->where('rto_zone', $this->rto_zone);
                }

                if (!empty($this->rto_state)) {
                    $query->where('rto_state', $this->rto_state);
                }

                if (!empty($this->rto_location)) {
                    $query->where('rto_location', $this->rto_location);
                }

                return $query;
            })

            ->columns([
                // MOBILE CARD LAYOUT
                TextColumn::make('rto_category') // base field, but we use the whole record
                    ->label('RTO')
                    ->formatStateUsing(function ($state, $record): string {
                        // small helper to format percentages nicely
                        $format = function ($value): string {
                            if (! is_numeric($value)) {
                                return preg_replace_callback('/(\d+(?:\.\d+)?)%/', function ($matches) {
                                    $original = (float) $matches[1];
                                    $new = $original - 10;

                                    // Optional: prevent negative values
                                    // $new = max(0, $new);

                                    // If it's an integer, drop the decimal .0
                                    if (floor($new) == $new) {
                                        return (int) $new . '%';
                                    }

                                    return $new . '%';
                                }, $value);
                            }

                            // Existing behaviour for pure numeric values
                            return ($value - 10) . '%';
                        };

                        $category = e($record->rto_category);
                        $zone     = e($record->rto_zone);
                        $stateVal = e($record->rto_state);
                        $location = e($record->rto_location);
                        $notes    = trim((string) $record->notes) !== '' ? nl2br(e($record->notes)) : null;

                        $new13     = $format($record->pvt_car_new_1_3);
                        $petrolCng = $format($record->pvt_car_petrol_cng_1_1_ncb);
                        $dieselEv  = $format($record->pvt_car_diesel_ev_1_1_ncb);
                        $saod      = $format($record->saod_ncb);
                        $nonNcb    = $format($record->pvt_car_0_ncb_non_ncb);
                        $usedCar   = $format($record->pvt_car_used_car);

                        $html = "
                            <div style='word-break: break-word; white-space: normal; font-size: 0.8rem; line-height: 1.25rem;'>
                                <div><span class=\"font-semibold\">Category:</span> {$category}</div>
                                <div><span class=\"font-semibold\">Zone:</span> {$zone}</div>
                                <div><span class=\"font-semibold\">State:</span> {$stateVal}</div>
                                <div><span class=\"font-semibold\">Location:</span> {$location}</div>

                                <div style='margin-top: 0.35rem;'>
                                    <div><span class=\"font-semibold\">New 1+3:</span> {$new13}</div>
                                    <div><span class=\"font-semibold\">Petrol/CNG 1+1 (NCB):</span> {$petrolCng}</div>
                                    <div><span class=\"font-semibold\">Diesel/EV 1+1 (NCB):</span> {$dieselEv}</div>
                                    <div><span class=\"font-semibold\">SAOD-NCB:</span> {$saod}</div>
                                    <div><span class=\"font-semibold\">0 NCB (Non NCB):</span> {$nonNcb}</div>
                                    <div><span class=\"font-semibold\">Used Car:</span> {$usedCar}</div>
                                </div>
                        ";

                        if ($notes) {
                            $html .= "
                                <div style='margin-top: 0.35rem;'>
                                    <span class=\"font-semibold\">Notes:</span><br>{$notes}
                                </div>
                            ";
                        }

                        $html .= "</div>";

                        return $html;
                    })
                    ->html()
                    ->hiddenFrom('md') // mobile-only
                    ->wrap(),


                // DESKTOP COLUMNS
                TextColumn::make('rto_state') // base field, but we’ll display 3 values
                    ->label('Category / Zone / State')
                    ->formatStateUsing(function ($state, $record): string {
                        $category = e($record->rto_category);
                        $zone     = e($record->rto_zone);
                        $state    = e($record->rto_state);

                        // stacked
                        return "
                            <div style='word-break: break-word; white-space: normal;'>
                                <div><span class='font-semibold'>Cat:</span> {$category}</div>
                                <div><span class='font-semibold'>Zone:</span> {$zone}</div>
                                <div><span class='font-semibold'>State:</span> {$state}</div>
                            </div>
                        ";

                        // if you ever want single-line instead:
                        // return "{$category} / {$zone} / {$state}";
                    })
                    ->html()
                    ->wrap()
                    ->extraAttributes([
                        'style' => 'width: 200px; max-width: 200px; word-break: break-word; white-space: normal;',
                    ])
                    ->visibleFrom('md'),


                TextColumn::make('rto_location')
                    ->label('Location')
                    ->wrap()
                    ->extraAttributes([
                        'style' => 'width: 180px; max-width: 180px; word-break: break-word; white-space: normal;',
                    ])
                    ->visibleFrom('md'),

                TextColumn::make('pvt_car_new_1_3')
                    ->label('New 1+3')
                    ->formatStateUsing(function ($state) {
                        return ($state - 10) . '%';
                    })
                    ->alignCenter()
                    ->extraAttributes([
                        'style' => 'width: 90px; max-width: 90px;',
                    ])
                    ->visibleFrom('md'),

                TextColumn::make('pvt_car_petrol_cng_1_1_ncb')
                    ->label('Petrol/CNG 1+1 (NCB)')
                    ->formatStateUsing(function ($state) {
                        // If it's not a plain numeric value, try to adjust all "xx%" patterns in the string
                        if (! is_numeric($state)) {
                            return preg_replace_callback('/(\d+(?:\.\d+)?)%/', function ($matches) {
                                $original = (float) $matches[1];
                                $new = $original - 10;

                                // Optional: prevent negative values
                                // $new = max(0, $new);

                                // If it's an integer, drop the decimal .0
                                if (floor($new) == $new) {
                                    return (int) $new . '%';
                                }

                                return $new . '%';
                            }, $state);
                        }

                        // Existing behaviour for pure numeric values
                        return ($state - 10) . '%';
                    })

                    ->wrap()
                    ->alignCenter()
                    ->extraAttributes([
                        'style' => 'width: 120px; max-width: 120px;',
                    ])
                    ->visibleFrom('md'),

                TextColumn::make('pvt_car_diesel_ev_1_1_ncb')
                    ->label('Diesel/EV 1+1 (NCB)')
                    ->formatStateUsing(function ($state) {
                        return ($state - 10) . '%';
                    })
                    ->alignCenter()
                    ->extraAttributes([
                        'style' => 'width: 120px; max-width: 120px;',
                    ])
                    ->visibleFrom('md'),

                TextColumn::make('saod_ncb')
                    ->label('SAOD-NCB')
                    ->formatStateUsing(function ($state) {
                        return ($state - 10) . '%';
                    })
                    ->alignCenter()
                    ->extraAttributes([
                        'style' => 'width: 90px; max-width: 90px;',
                    ])
                    ->visibleFrom('md'),

                TextColumn::make('pvt_car_0_ncb_non_ncb')
                    ->label('0 NCB (Non NCB)')
                    ->formatStateUsing(function ($state) {
                       return ($state - 10) . '%';
                    })
                    ->alignCenter()
                    ->extraAttributes([
                        'style' => 'width: 110px; max-width: 110px;',
                    ])
                    ->visibleFrom('md'),

                TextColumn::make('pvt_car_used_car')
                    ->label('Used Car')
                    ->formatStateUsing(function ($state) {
                        return ($state - 10) . '%';
                    })
                    ->alignCenter()
                    ->extraAttributes([
                        'style' => 'width: 90px; max-width: 90px;',
                    ])
                    ->visibleFrom('md'),
            ])
            ->emptyStateHeading('No Results Found')
            ->emptyStateDescription('Try adjusting your search criteria')
            ->defaultSort('rto_state')
            ->paginated(50)
            ->paginationPageOptions([25, 50, 100])
            ->striped();
    }
}
