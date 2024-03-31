<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getDataLogin($request){
        $ket ='';
        $user ='';
        if($request->admin){
            $ket ='admin';
            $user = $request->admin;
        }else if($request->user){
            $ket ='user';
            $user = $request->user;
        }
        return ['keterangan' => $ket, 'user' => $user];
    }
}
