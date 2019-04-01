<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;

class UserController extends Controller
{
    /**
     * Regresa el listado de dependencias
     * consulta para los usuarios normales
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::join('user_states','users.id_user_state','=','user_states.id')
        ->select('users.*','user_states.name as user_state')
        ->where('user_states.name','<>','Por confirmar')
        ->where('users.id_role','=',3)
        ->where('users.id','<>',1)->get();
    }

    public function allIndex(){
        return user::all();
    }

    /**
     * Registra una nueva dependencia
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //administrador
        if($request['id_role']==2){       
            $user = new User;
            
                $user->document = $request['document'];
                $user->name = $request['name'];
                $user->lastname = $request['lastname'];
                $user->email = $request['email'];
                $user->phone = $request['phone'];
                $user->id_role = 2;//admin
                $user->id_user_state = 1;//activo
                $user->id_dependence = $request['id_dependence'];
                $user->password = bcrypt($request['password']);
                $user->save();
        }else{
            //usuario normal
                $user = new User;

                $user->document = $request['document'];
                $user->name = $request['name'];
                $user->lastname = $request['lastname'];
                $user->email = $request['email'];
                $user->phone = $request['phone'];
                $user->id_role = 3;//user
                $user->id_user_state = $request['id_user_state'];//activo
                $user->id_dependence = 1;//sin dependencia
                $user->password = bcrypt($request['password']);
                $user->save();
        }

        return $user;
    }
    //generador de token
    function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
    
            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),
    
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,
    
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,
    
            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    //metodo cuando un usuario se registra desde la app movil, se le genera un token con el metodo anterior.
    public function storeToken(Request $request){

        $token = $this->gen_uuid();

        $user = new User;
        $user->document = $request['document'];
        $user->name = $request['name'];
        $user->lastname = $request['lastname'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->id_role = 3;//user
        $user->id_user_state = $request['id_user_state'];//activo
        $user->id_dependence = 1;//sin dependencia
        $user->password = bcrypt($request['password']);
        $user->remember_token = $token;
        $user->save();

        $this->validate($request,[
            'email' => 'required|email'
        ]);
        
        $data = array(
            'name' => $request->name,
            'email' => $request->email, // poner:    $request->email,
            'send' => 'http://165.227.183.7/show-token-user/'.$token
        );


        Mail::send('emails.token',$data,function($message) use ($data){
            $message->to($data['email']);
            $message->subject('Confirma tu cuenta en SAT');
            $message->from('sat.reply@gmail.com');
        });

        return $user;

    }




    /**
     * Consulta una dependencia dado su id y retorna la información de esta
     * consulta para los administradores
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idRole)
    {
       return User::join('user_states','users.id_user_state','=','user_states.id')
        ->select('users.*','user_states.name as user_state')
        ->where('id_role','=',$idRole)
        ->where('user_states.name','<>','Por confirmar')->get();
    }

     /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFindUsers($idUser){
        return User::find($idUser);
    }
    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUsersCommon($idStateUser){
        return  User::where('id_user_state','=',$idStateUser)
                    ->where('id_role','=','3')
                    ->get();
    }
     /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findUserForEmail($email){
        return  User::where('email','=',$email)->firstOrFail();
    }

    /**
     * Actualiza la información de una dependencia dado su id
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request['id']);
        
        $user->document = isset($request['document']) ? $request['document'] : $user->document; 
        $user->name = isset($request['name']) ? $request['name'] : $user->name; 
        $user->lastname = isset($request['lastname']) ? $request['lastname'] : $user->lastname; 
        $user->email = isset($request['mail']) ? $request['mail'] : $user->email; 
        $user->phone = isset($request['phone']) ? $request['phone'] : $user->phone; 
        $user->save();
        return $user;
        /**si exite el name del request lo pone, si no pone el nombre de la dependencia.
        $dependence->name = isset($request['name']) ? $request['name'] : $dependence->name;        
        $dependence->save();
        return $dependence;*/
        
    }

    /**
     * Elimina el registro de una dependencia dado su id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $nombre = $user->name;
        $user->delete();

        return "Usuario {$nombre} eliminado";
    }

}
