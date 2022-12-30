<?php

namespace App\Http\Livewire\Sup;

use Livewire\Component;

class Nav extends Component
{
    public $vistas = [];
    private function getVistas(){
        $files = glob(resource_path('./views/livewire/sup/*.blade.php'));
        $files = array_map('basename', $files);
        //remove extension blade.php
        $files = array_map(function($file){
            return str_replace('.blade.php', '', $file);
        }, $files);
        $this->vistas = $files;
    }
    public function mount(){
        $this->getVistas();
    }
    public function render()
    {
        return view('livewire.sup.nav');
    }
}
