<?php

namespace App\Http\Livewire\Sup;
use Illuminate\Support\Facades\Log;

use Livewire\Component;

class Componentes extends Component
{
    public $vistas = [];
    public $nombre = "";
    public $codigo = "";
    public function mount(){
        $this->getVistas();
    }
    public function getCodeComponent($filename){
        //get code from file in Http/Livewire/Sup/Componentes
        //first letter is uppercase
        $filename = ucfirst($filename);
        //get file content
        $codigo = file_get_contents(__DIR__."\\".$filename.".php");
        $this->codigo = $codigo;
    }
    private function getVistas(){
        $files = glob(resource_path('./views/livewire/sup/*.blade.php'));
        $files = array_map('basename', $files);
        //remove extension blade.php
        $files = array_map(function($file){
            return str_replace('.blade.php', '', $file);
        }, $files);
        $this->vistas = $files;
    }
    public function getCodeView($filename){
        $this->nombre = $filename;
        $this->codigo = file_get_contents(resource_path('./views/livewire/sup/'.$filename.'.blade.php'));
    }
    public function render()
    {
        return view('livewire.sup.componentes');
    }
}
