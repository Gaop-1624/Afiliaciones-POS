<?php

namespace App\Livewire\Cierres;

use Livewire\Component;

class Cierres extends Component
{
    public $activeTab = "diario";

    public function setActiveTab($tab){
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.cierres.cierres');
    }
}
