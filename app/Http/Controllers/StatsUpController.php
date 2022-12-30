<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsUpController extends Controller
{

    public function home()
    {
        return view('sup/home/home');
    }

    public function recepcionista(Request $request, $path){
        if($this->validar_acceso_ip()){
            return view("sup/$path/$path");
        }else{
            return redirect('/');
        }
    }

    private function validar_acceso_ip(){
        $client_ip = $_SERVER['REMOTE_ADDR'];
        $ip_permitidas = explode(",", env('IP_PERMITIDAS'));
        if(count($ip_permitidas) > 0){
            if(in_array($client_ip, $ip_permitidas)){
                return true;
            }
        }
        return false;
    }
}
