<?php

namespace App\Http\Livewire;

use Livewire\Component;

class JsonGen extends Component
{

    public $tipo_peticion = 'POST';
    public $token = '';
    public $url = '';

    public function generar($json){
        //generate random string 8 chars long
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 12);
        $item["id"] = $randomString;
        $item["type"] = $this->tipo_peticion;
        $item["token"] = $this->token;
        $item["data"] = $json;
        //create file in public folder

        $file = fopen(public_path('json\\'.$randomString.'.json'), 'w');
        fwrite($file, json_encode($item));
        fclose($file);
        if($this->token == ""){
            $this->url = url('/api/get-json/'.$randomString);
        }else{
            $this->url = url('/api/get-json/'.$randomString.'?api-key='.$this->token);
        }
        
    }

    public function render()
    {
        return view('livewire.json-gen');
    }
}
