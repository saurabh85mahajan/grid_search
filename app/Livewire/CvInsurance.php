<?php

namespace App\Livewire;

use Livewire\Component;

class CvInsurance extends Component
{
    public function render()
    {
        return view('livewire.cv-insurance')
            ->layout('components.layouts.main', ['heading' => 'CV Insurance']);
    }
}