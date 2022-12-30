<?php

namespace App\Http\Livewire\Sup;

use Livewire\Component;

class Log extends Component
{
    public $log;
    public $toggle = true;

    public function obt_log(){
        $this->log = file_get_contents(storage_path('logs/laravel.log'));
    }
    public function actualizar_log(){
        $this->obt_log();
        if($this->toggle){
            $this->dispatchBrowserEvent('actualizarLog',['log' => $this->log]);
        }
    }
    public function deleteLog(){
        file_put_contents(storage_path('logs/laravel.log'),'');
        $this->toggle = true;
    }
    public function mount(){
        $this->obt_log();
    }

    public function render()
    {
        return view('livewire.sup.log');
    }
}
