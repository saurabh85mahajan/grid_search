<?php

namespace App\Livewire;

use Livewire\Component;

class TwoWheelerInsurance extends Component
{
    public function render()
    {
        return view('livewire.two-wheeler-insurance')
            ->layout('components.layouts.main', ['heading' => '2 Wheeler Insurance']);
    }
}