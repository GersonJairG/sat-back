<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\Turn;
use App\Models\Feedback;
use App\Models\User;

class MailController extends Controller
{ 
    const EMAIL = 'email';
    public function getContact(){
        
        return view('/emails/contact');
    }

    public function postContact(Request $request){
        $this->validate($request,[
            EMAIL => 'required|email'
        ]);
        
        $data = array(
            'name' => $request->name,
            EMAIL => $request->email,            
            'feedback' => 'http://165.227.183.7/show-feedback/'.$request->idFirebase
        );


        Mail::send('emails.confirm',$data,function($message) use ($data){
            $message->to($data[EMAIL]);
            $message->subject('Calificacion de SAT');
            $message->from('sat.reply@gmail.com');
        });
        return $request;
    }

    public function showFeedback($idFirebase){
        $turnos = Turn::all();
        $feedbacks = Feedback::all();
        foreach ($turnos as $turno) {
            if($turno->id_firebase==$idFirebase){                    
                    foreach ($feedbacks as $feedback) {
                        if($feedback->id_turn == $turno->id){
                            return view('/emails/error');
                        }
                    }
                    return view('/emails/feedback');
            }
        }
        return view('/emails/error');
    }

    public function registerFeedback(Request $request){
        $idFirebase = $request['idFirebase'];
        $turn = Turn::where('id_firebase','=',$idFirebase)->firstOrFail();

        $feedback = new Feedback;
        $feedback->id_turn = $turn->id;
        $feedback->value = $request['estrellas'];
        $feedback->detail = $request['feedback'];
        $feedback->save();
        return $feedback;
    }

    public function showLoginToken(Request $request){
        $token = $request['token'];
        $usuarios = User::all();

        foreach ($usuarios as  $usuario) {
            if($usuario->remember_token == $token && $usuario->id_user_state==4){
                $usuario->id_user_state = 1;//activo
                $usuario->save();
                header('Location: http://sat-movil.000webhostapp.com');
            }
        }
        return view('emails/error');
    }
}
