<?php

namespace App\Livewire;

use Livewire\Component;


class TataGridCarSearch extends Component
{
    public $heading = 'Grid for HDFC - Private Cars';


    public function render()
    {
        return view('livewire.tata-car-search')
                ->layout('components.layouts.main', ['heading' => $this->heading]);
    }
}
