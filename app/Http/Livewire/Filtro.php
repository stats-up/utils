<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;
use Spatie\SimpleExcel\SimpleExcelReader;

class Filtro extends Component
{

    use WithFileUploads;

    public $file;
    public $datos = [];

    public function load(){
        //temp path
        $path = $this->file->getRealPath();
        $rows = SimpleExcelReader::create($path)->getRows();
        $rows->each(function(array $rowProperties) {
            if($rowProperties['Clase Doc. Ventas'] == 'Pedido estándar'){
                array_push($this->datos, $rowProperties);
            }
        });
        $this->dispatchBrowserEvent('swalClose');
        $this->dispatchBrowserEvent('datatable');
    }

    public function render()
    {
        return view('livewire.filtro');
    }
}
