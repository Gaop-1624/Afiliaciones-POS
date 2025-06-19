<?php

namespace App\Livewire\Planillas;

use App\Models\Planilla;
use Livewire\Component;
use Livewire\WithPagination;

class Planillas extends Component
{
    use WithPagination;
    public function render()
    {
        /* $planillas = Planilla::where('id', 'like', '%'.$this->search. '%')
            ->orWhere('name', 'like', '%'.$this->search. '%') 
            ->orWhere('email', 'like', '%'.$this->search. '%') 
            ->orderBy('id','DESC')
            ->paginate(6); */
        $planillas = Planilla::paginate(3);

        return view('livewire.planillas.planillas', [
            'planillas' => $planillas
        ]);
    }
}
