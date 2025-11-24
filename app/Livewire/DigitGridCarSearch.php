<?php

namespace App\Livewire;

use App\Models\DigitGridCar;
use App\Traits\WithDefaults;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Livewire\Attributes\Url;
use Livewire\Component;


class DigitGridCarSearch extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;
    use WithDefaults;

    public $heading = 'Grid for Digit - Private Cars';

    #[Url]
    public ?string $rto_state = '';

    #[Url]
    public ?int $period = null;

    protected $updatesQueryString = [
        'rto_state',
        'period',
        'page',
    ];

    public function mount()
    {
        $this->period = $this->period ?? $this->getDefaultPeriod();
    }

    // Reset pagination when filters change
    public function updatedRtoZone()
    {
        $this->resetPage();
    }
    public function updatedRtoState()
    {
        $this->resetPage();
    }
    public function updatedPeriod()
    {
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->rto_state = '';
        $this->period = $this->getDefaultPeriod();

        $this->resetPage();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(function () {
                $query = DigitGridCar::query();

                if (!empty($this->rto_state)) {
                    $query->where('rto_state', $this->rto_state);
                }

                if (!empty($this->period)) {
                    $query->where('period', $this->period);
                }

                return $query;
            })

            ->columns([
                // MOBILE CARD LAYOUT
                TextColumn::make('rto_zone') // base field, but we use the whole record
                    ->label('Result')
                    ->formatStateUsing(function ($state, $record): string {

                        $stateVal = e($record->rto_state);
                        $cluster = e($record->rto_zone);

                        $new1 = $this->formatSaodColumn($record, 'saod_petrol_non_hev', 'saod_petrol_hev', false);
                        $new2 = $this->formatSaodColumn($record, 'saod_non_petrol_non_hev', 'saod_non_petrol_hev', false);
                        $new3 = $this->formatSaodColumn($record, 'comp_petrol_non_hev', 'comp_petrol_hev', false);
                        $new4 = $this->formatSaodColumn($record, 'comp_non_petrol_non_hev', 'comp_non_petrol_hev', false);

                        $html = "
                            <div style='word-break: break-word; white-space: normal; font-size: 0.8rem; line-height: 1.25rem;'>
                                <div><span class=\"font-semibold\">State:</span> {$stateVal}</div>
                                <div><span class=\"font-semibold\">Cluster:</span> {$cluster}</div>

                                <div style='margin-top: 0.35rem;'>
                                    <div><span class=\"font-semibold\">SAOD Petrol Non-HEV / HEV: </span> {$new1}</div>
                                    <div><span class=\"font-semibold\">SAOD Non-Petrol (incl. CNG) Non-HEV / HEV: </span> {$new2}</div>
                                    <div><span class=\"font-semibold\">Comp Petrol Non-HEV / HEV: </span> {$new3}</div>
                                    <div><span class=\"font-semibold\">Comp Non-Petrol (incl. CNG) Non-HEV / HEV: </span> {$new4}</div>
                                </div>
                        ";

                        $html .= "</div>";

                        return $html;
                    })
                    ->html()
                    ->hiddenFrom('md') // mobile-only
                    ->wrap(),


                // DESKTOP COLUMNS
                TextColumn::make('rto_state') // base field, but we’ll display 3 values
                    ->label('State / Cluster')
                    ->formatStateUsing(function ($state, $record): string {
                        $state    = e($record->rto_state);
                        $cluster    = e($record->rto_zone);

                        // stacked
                        return "
                            <div style='word-break: break-word; white-space: normal;'>
                                <div><span class='font-semibold'>State:</span> {$state}</div>
                                <div><span class='font-semibold'>Cluster:</span> {$cluster}</div>
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

                TextColumn::make('saod_petrol_non_hev')
                    ->label(new HtmlString('SAOD Petrol<br>Non-HEV / HEV'))
                    ->formatStateUsing(fn ($state, $record) => $this->formatSaodColumn($record, 'saod_petrol_non_hev', 'saod_petrol_hev'))
                    ->html()
                    ->alignCenter()
                    ->extraAttributes([
                        'style' => 'width: 90px; max-width: 90px;',
                    ])
                    ->visibleFrom('md'),

                TextColumn::make('saod_non_petrol_non_hev')
                    ->label(new HtmlString('SAOD Non-Petrol (incl. CNG)<br>Non-HEV / HEV'))
                    ->formatStateUsing(fn ($state, $record) => $this->formatSaodColumn($record, 'saod_non_petrol_non_hev', 'saod_non_petrol_hev'))
                    ->html()
                    ->alignCenter()
                    ->extraAttributes([
                        'style' => 'width: 90px; max-width: 90px;',
                    ])
                    ->visibleFrom('md'),

                TextColumn::make('comp_petrol_non_hev')
                    ->label(new HtmlString('Comp Petrol<br>Non-HEV / HEV'))
                    ->formatStateUsing(fn ($state, $record) => $this->formatSaodColumn($record, 'comp_petrol_non_hev', 'comp_petrol_hev'))
                    ->html()
                    ->alignCenter()
                    ->extraAttributes([
                        'style' => 'width: 90px; max-width: 90px;',
                    ])
                    ->visibleFrom('md'),

                TextColumn::make('comp_non_petrol_non_hev')
                    ->label(new HtmlString('Comp Non-Petrol (incl. CNG)<br>Non-HEV / HEV'))
                    ->formatStateUsing(fn ($state, $record) => $this->formatSaodColumn($record, 'comp_non_petrol_non_hev', 'comp_non_petrol_hev'))
                    ->html()
                    ->alignCenter()
                    ->extraAttributes([
                        'style' => 'width: 120px; max-width: 120px;',
                    ])
                    ->visibleFrom('md'),

            ])
            ->emptyStateHeading('No Results Found')
            ->emptyStateDescription('Try adjusting your search criteria')
            ->defaultSort('rto_state')
            ->paginated(100)
            ->paginationPageOptions([100])
            ->striped();
    }


    private function formatSaodColumn($record, string $nonHevField, string $hevField, $formatting = true): string
    {
        $preHtmlTag = '<span class="font-bold">';
        $postHtmlTag = '</span>';
        if (!$formatting) {
            $preHtmlTag = $postHtmlTag = '';
        }

        return $preHtmlTag . $record->$nonHevField - 10 . '%' . $postHtmlTag . ' / ' .
            $preHtmlTag . $record->$hevField - 10 . '%' . $postHtmlTag ;
    }

    public function render()
    {
        $states = DigitGridCar::query()
            ->select('rto_state')
            ->distinct()
            ->orderBy('rto_state')
            ->pluck('rto_state')
            ->filter()
            ->values();

        return view('livewire.digit-car-search', [
            'states'     => $states,
        ])->layout('components.layouts.main', ['heading' => $this->heading]);
    }
}
