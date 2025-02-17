<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public static function updateAuthCookie($old_auth, $new_auth){
        if($new_auth['user_type'] == 'admin'){
            foreach($old_auth['admin'] as $key => $value){
                if($value != $new_auth['admin'][$key]){
                    Cookie::queue('auth', serialize($new_auth));
                    break;
                }
            }
        }
        if($new_auth['user_type'] == 'user'){
            if(count($old_auth['user']) != count($new_auth['user'])){
                Cookie::queue('auth', serialize($new_auth));
            }else{
                $new_auth_keys = array_keys($new_auth['user']);
                $i = 0;
                foreach($old_auth['user'] as $key => $value){
                    if($value != $new_auth['user'][$key]){
                        Cookie::queue('auth', serialize($new_auth));
                    }
                    if($key != $new_auth_keys[$i]){
                        Cookie::queue('auth', serialize($new_auth));
                        break;
                    }
                    $i++;
                }
            }
        }        
        if($new_auth['user_type'] != $old_auth['user_type'] || ($new_auth['user_type'] != 'guest' && $new_auth['token'] != $old_auth['token'])){
            Cookie::expire('auth');
            return redirect()->route('login.page');
        }
    }

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
