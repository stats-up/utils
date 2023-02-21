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
    public function sso(){
        $url = $_SERVER['REQUEST_URI'];
        //if url contains # replace with ? for query string
        if(strpos($url, '#') !== false){
            $url = str_replace('#', '?', $url);
            return redirect($url);
        }
        if(isset($_GET["access_token"])){
            $access_token = $_GET["access_token"];
            $url = "https://graph.microsoft.com/oidc/userinfo";
            // Init, execute, close curl
            $ch = curl_init();
            //dd($ch);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
            $r = curl_exec($ch);
            curl_close($ch);
            //dd($r);
            //Decode json
            dd(json_decode($r, true));
        }else{
            dd("No se recibió el token", $_GET);
        }
    }
}
