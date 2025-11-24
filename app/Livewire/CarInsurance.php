<?php

namespace App\Livewire;

use Livewire\Component;

class CarInsurance extends Component
{
    public function render()
    {
        return view('livewire.car-insurance')
            ->layout('components.layouts.main', ['heading' => 'Car Insurance']);
    }
}