<?php

namespace App\Livewire;

use App\Models\IciciGridCv;
use App\Traits\WithDefaults;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Attributes\Url;
use Livewire\Component;


class IciciGridCvSearch extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;
    use WithDefaults;

    public $heading = 'Grid for ICICI - CV';

    #[Url]
    public ?string $category = '';

    #[Url]
    public ?string $cluster = '';

    #[Url]
    public ?int $period = null;

    protected $updatesQueryString = [
        'category',
        'cluster',
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
    public function updatedCluster()
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
        $this->cluster = '';
        $this->period = $this->getDefaultPeriod();

        $this->resetPage();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(function () {
                $query = IciciGridCv::query();

                if (!empty($this->category)) {
                    $query->where('category', $this->category);
                }

                if (!empty($this->cluster)) {
                    $query->where('rto_cluster', $this->cluster);
                }

                if (!empty($this->period)) {
                    $query->where('period', $this->period);
                }

                return $query;
            })

            ->columns([
                // DESKTOP COLUMNS
                TextColumn::make('rto_cluster') // base field, but we’ll display 3 values
                    ->label('Cluster')
                    ->html()
                    ->wrap(),

                TextColumn::make('category')
                    ->label('Category')
                    ->wrap(),
                TextColumn::make('formatted_value')
                    ->label('Value')
                    ->wrap(),

            ])
            ->recordClasses(fn ($record) => $record->is_highlight ? 'bg-primary-500' : null)
            ->emptyStateHeading('No Results Found')
            ->emptyStateDescription('Try adjusting your search criteria')
            ->defaultSort('rto_cluster')
            ->paginated(100)
            ->paginationPageOptions([100])
            ->striped();
    }


    public function render()
    {
        $clusters = IciciGridCv::query()
            ->select('rto_cluster')
            ->distinct()
            ->orderBy('rto_cluster')
            ->pluck('rto_cluster')
            ->filter()
            ->values();

        $categories = IciciGridCv::query()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->filter()
            ->values();

        return view('livewire.icici-cv-search', [
            'clusters'      => $clusters,
            'categories'     => $categories,
        ])->layout('components.layouts.main', ['heading' => $this->heading]);
    }
}
