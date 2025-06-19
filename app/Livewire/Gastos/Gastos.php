<?php

namespace App\Livewire\Gastos;

use App\Models\Gastos as ModelsGastos;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Gastos extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $detalle, $total_gasto, $gastoid, $search, $updating = 0, $id;

    public function render()
    {
         $gastos = ModelsGastos::where('id', 'like', '%'.$this->search. '%')
            ->orWhere('detalle', 'like', '%'.$this->search. '%')
            ->orWhere('fecha_pago', 'like', '%'.$this->search. '%') 
            ->orderBy('id','DESC')
            ->simplePaginate(2);

        return view('livewire.gastos.gastos',[
            'gastos' => $gastos
        ]);
    }

    public function closeModal(){
        $this->resetValidation();
        $this->reset(['detalle', 'total_gasto']);
        $this->updating = 0;
    }

    public function Rules(){
        return [
                'detalle' => [
                    'required',
                    'string',
                ],
                'total_gasto' => [
                    'required',
                    'numeric',
                ],
            ];
        }

    public function create(){
        $this->validate($this->Rules());

        $user = Auth::user()->id;

        ModelsGastos::updateOrCreate(
            ['id' => $this->gastoid], 
            [
            'detalle' => $this->detalle,
            'total_gasto' => $this->total_gasto,
            'fecha_pago' => now(),
            'user_id' => $user,
            'afiliado_id' => 1,
        ]);

        if ($this->updating) {
            LivewireAlert::title('¡Gasto Actualizado!')
            ->success()
            ->show();
        } else {
             LivewireAlert::title('¡Gasto Creado!')
            ->success()
            ->show();
        }
        
        $this->redirectRoute('Admin.Gastos');
    }

    public function edit(ModelsGastos $gasto){
            $this->updating = 1;
            $this->gastoid = $gasto->id;
            $this->detalle = $gasto->detalle;
            $this->total_gasto = $gasto->total_gasto;
    }

    public function delete(ModelsGastos $gasto){
            $gasto->delete();

             LivewireAlert::title('¡Gasto Eliminado!')
            ->success()
            ->show();
    }
    
}
