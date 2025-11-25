<?php

namespace App\Livewire;

use Livewire\Component;


class HdfcGridCarSearch extends Component
{
    public $heading = 'Grid for HDFC - Private Cars';


    public function render()
    {
        return view('livewire.hdfc-car-search')
                ->layout('components.layouts.main', ['heading' => $this->heading]);
    }
}
