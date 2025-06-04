<?php

namespace App\Livewire\Pagos;

use App\Models\Pago;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Pagos extends Component
{
    use WithPagination;

    public $search, $periodo;

    public function mount(){
           
    }

    public function render()
    {
         $pagos = Pago::with('afiliado')
            ->where('id', 'like', '%'.$this->search. '%')
            ->orWhere('codigo', 'like', '%'.$this->search. '%')
           // ->orWhere('documento_id ', 'like', '%'.$this->search. '%') 
            ->orderBy('id','DESC')
            ->paginate(6);
            
        return view('livewire.pagos.pagos', [
            'pagos' => $pagos
        ]);
    }
}
