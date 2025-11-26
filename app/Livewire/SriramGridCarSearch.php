<?php

namespace App\Livewire;

use App\Models\SriramGridAll;
use App\Traits\WithDefaults;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Url;
use Livewire\Component;

class SriramGridCarSearch extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;
    use WithDefaults;

    public $heading = 'Grid for Sriram - All';

    #[Url]
    public ?string $category = '';

    #[Url]
    public ?string $state = '';

    #[Url]
    public ?int $period = null;

    protected $updatesQueryString = [
        'category',
        'state',
        'period',
        'page',
    ];

    public function mount()
    {
        $this->period = $this->period ?? $this->getDefaultPeriod();
    }

    // Reset pagination when filters change
    public function updatedCategory()
    {
        $this->resetPage();
    }
    public function updatedState()
    {
        $this->resetPage();
    }
    public function updatedPeriod()
    {
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->category = '';
        $this->state = '';
        $this->period = $this->getDefaultPeriod();

        $this->resetPage();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(function () {
                $query = SriramGridAll::query();

                if (!empty($this->category)) {
                    $query->where('category', $this->category);
                }

                if (!empty($this->state)) {
                    $query->where('state', $this->state);
                }

                if (!empty($this->period)) {
                    $query->where('period', $this->period);
                }

                return $query;
            })

            ->columns([
                TextColumn::make('period') // base field, but we use the whole record
                    ->label('Details')
                        ->formatStateUsing(function ($state, $record): string {
                            $state      = e($record->state);
                            $category   = e($record->category);
                            $dis        = e($record->dis);
                            $payout     = e($record->formatted_value); // Using the formatted value
                            $policyType = e($record->policy_type);
                            $age        = e($record->age);
                            $remarks    = trim((string) $record->remarks) !== '' ? nl2br(e($record->remarks)) : null;
                            $remarks1   = trim((string) $record->remarks_1) !== '' ? nl2br(e($record->remarks_1)) : null;

                            $html = "
                                <div style='word-break: break-word; white-space: normal; font-size: 0.8rem; line-height: 1.25rem;'>
                                    <div><span class=\"font-semibold\">State:</span> {$state}</div>
                                    <div><span class=\"font-semibold\">Category:</span> {$category}</div>
                                    <div><span class=\"font-semibold\">Dis %:</span> {$dis}</div>
                                    <div><span class=\"font-semibold\">Payout:</span> {$payout}</div>
                                    <div><span class=\"font-semibold\">Policy Type:</span> {$policyType}</div>
                                    <div><span class=\"font-semibold\">Age:</span> {$age}</div>
                            ";

                            if ($remarks) {
                                $html .= "
                                    <div style='margin-top: 0.35rem;'>
                                        <span class=\"font-semibold\">Remarks:</span><br>{$remarks}
                                    </div>
                                ";
                            }

                            if ($remarks1) {
                                $html .= "
                                    <div style='margin-top: 0.35rem;'>
                                        <span class=\"font-semibold\">Remarks 1:</span><br>{$remarks1}
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
                TextColumn::make('state') // base field, but we’ll display 3 values
                    ->label('State')
                    ->html()
                    ->wrap()
                    ->extraAttributes([
                        'style' => 'width: 300px; max-width: 300px;',
                    ])
                    ->visibleFrom('md'),

                TextColumn::make('category')
                    ->label('Category')
                    ->wrap()
                    ->extraAttributes([
                        'style' => 'width: 180px; max-width: 180px;',
                    ])
                    ->visibleFrom('md'),
                TextColumn::make('dis')
                    ->label('Dis %')
                    ->wrap()
                    ->extraAttributes([
                        'style' => 'width: 80px; max-width: 80px;',
                    ])
                    ->visibleFrom('md'),
                TextColumn::make('formatted_value')
                    ->label('Payout')
                    ->wrap()
                    ->extraAttributes([
                        'style' => 'width: 100px; max-width: 100px;',
                    ])
                    ->visibleFrom('md'),
                TextColumn::make('policy_type')
                    ->label('Policy Type')
                    ->wrap()
                    ->extraAttributes([
                        'style' => 'width: 120px; max-width: 120px;',
                    ])
                    ->visibleFrom('md'),
                TextColumn::make('age')
                    ->label('Age')
                    ->wrap()
                    ->extraAttributes([
                        'style' => 'width: 150px; max-width: 150px;',
                    ])
                    ->visibleFrom('md'),
                TextColumn::make('remarks')
                    ->label('Remarks')
                    ->wrap()
                    ->formatStateUsing(function ($state, $record): string {
                        $remarks     = e($record->remarks);
                        $remarks_1    = e($record->remarks_1);

                        // stacked
                        return "
                            <div style='word-break: break-word; white-space: normal;'>
                                <div>{$remarks}</div>
                                <div>{$remarks_1}</div>
                            </div>
                        ";

                        // if you ever want single-line instead:
                        // return "{$category} / {$zone} / {$state}";
                    })
                    ->html()
                    ->extraAttributes([
                        'style' => 'width: 200px; max-width: 200px;',
                    ])
                    ->visibleFrom('md'),

            ])
            ->recordClasses(fn ($record) => $record->is_highlight ? 'bg-primary-500' : null)
            ->emptyStateHeading('No Results Found')
            ->emptyStateDescription('Try adjusting your search criteria')
            ->defaultSort('state')
            ->paginated(100)
            ->paginationPageOptions([100])
            ->striped();
    }


    public function render()
    {
        $states = Cache::remember('sriram_all_states', now()->addDay(), function () {
            return SriramGridAll::query()
                ->select('state')
                ->distinct()
                ->orderBy('state')
                ->pluck('state')
                ->filter()
                ->values();
        });

        $categories = Cache::remember('sriram_all__categories', now()->addDay(), function () {
            return SriramGridAll::query()
                ->select('category')
                ->distinct()
                ->orderBy('category')
                ->pluck('category')
                ->filter()
                ->values();
        });

        return view('livewire.sriram-all-search', [
            'states'      => $states,
            'categories'     => $categories,
        ])->layout('components.layouts.main', ['heading' => $this->heading]);
    }
}
