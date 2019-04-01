<?php

namespace App\Http\Controllers\Auth;


use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Role;
use App\Models\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    const EMAIL = 'email';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function getPermissionsByRole($role){
        $role = Role::find($role);
        return $role->permissions;
    }


    public function login(Request $request){ 
        $user = $request->all();
        if (Auth::attempt([
                EMAIL => $user[EMAIL],
                'password' => $user['password']
            ])){
            // Authentication passed...
            if(Auth::user()->id_role==3){
                return [];
            }
            return array(
                "id" => Auth::user()->id,
                "name" => Auth::user()->name,
                EMAIL => Auth::user()->email,
                "role" => Auth::user()->id_role,
                "dependence" => Auth::user()->id_dependence,
                "permissions" => $this->getPermissionsByRole(Auth::user()->id_role)
            );
        }        
    }

    public function loginMovil(Request $request){
        $user = $request->all();
        if (Auth::attempt([
                EMAIL => $user[EMAIL],
                'password' => $user['password']
            ])){
        // Authentication passed...
        if(Auth::user()->id_role==3 && Auth::user()->id_user_state==1){
            return array(
                "id" => Auth::user()->id,
                "name" => Auth::user()->name,
                "lastname" => Auth::user()->lastname,
                EMAIL => Auth::user()->email,
                "document" => Auth::user()->document,                
                "permissions" => $this->getPermissionsByRole(Auth::user()->id_role)
            );
            
        }else{
            return [];
        }

    }
    }
}
