<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turn;
use App\Models\Dependence;
use App\Models\User;

class TurnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Turn::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turn = new Turn;
        $turn->id_firebase = $request['idFirebase'];
        $turn->date = $request['date'];
        $turn->hour = $request['hour'];
        $turn->detail = $request['detail'];
        $turn->turn_type= $request['turnType'];
        $turn->id_turn_state = $request['idTurnState'];
        $turn->id_user = $request['idUser'];
        $turn->id_service_type = $request['idServiceType'];
        $turn->id_semester = $request['idSemester'];
        $turn->id_admin_assigned = $request['idAdminAssigned'];
        $turn->save();
        return $turn;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findForIdFirebase($idTurnFirebase){
        return Turn::where('id_firebase','=',$idTurnFirebase)->firstOrFail();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idTurnFirebase)
    {
        $turn = Turn::where('id_firebase','=',$idTurnFirebase)->firstOrFail();
        $turn->date = isset($request['date']) ? $request['date'] : $turn->date;
        $turn->hour = isset($request['hour']) ? $request['hour'] : $turn->hour;
        $turn->detail = isset($request['detail']) ? $request['detail'] : $turn->detail;
        $turn->turn_type = isset($request['turnType']) ? $request['turnType'] : $turn->turn_type;
        $turn->id_turn_state = isset($request['idTurnState']) ? $request['idTurnState'] : $turn->id_turn_state;
        $turn->id_user = isset($request['idUser']) ? $request['idUser'] : $turn->id_user;
        $turn->id_service_type = isset($request['idServiceType']) ? $request['idServiceType'] : $turn->id_service_type;
        $turn->id_semester = isset($request['idSemester']) ? $request['idSemester'] : $turn->id_semester;
        $turn->id_admin_assigned = isset($request['idAdminAssigned']) ? $request['idAdminAssigned'] : $turn->id_admin_assigned;
        $turn->save();
        return $turn;   
    }
}
