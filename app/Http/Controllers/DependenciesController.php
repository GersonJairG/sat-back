<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependence;
use App\Models\TimeBlock;

class DependenciesController extends Controller
{
    /**
     * Regresa el listado de dependencias
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dependenceId = 'dependences.id';
        return Dependence::join('time_blocks', $dependenceId, '=', 'time_blocks.id_dependence')
                    ->select($dependenceId, 'dependences.name', 'time_blocks.week')
                    ->where($dependenceId,'<>','1')
                    ->get();        
    }

    /**
     * Registra una nueva dependencia
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dependence = new Dependence;
        $dependence->name = $request['name'];
        $dependence->save();
        $this->storeTimeBlock($dependence->id,$request['week']);
        return $dependence;
    }

    private function storeTimeBlock($idDependence,$week){
        $timeBlock = new TimeBlock;
        $timeBlock->id_dependence = $idDependence;
        $timeBlock->week = $week;
        $timeBlock->save();
        return $timeBlock;
    }

    /**
     * Consulta una dependencia dado su id y retorna la información de esta
     *
     * @param  int  $identificador
     * @return \Illuminate\Http\Response
     */
    public function show($identificador)
    {
        return Dependence::find($identificador);
    }

    /**
     * Actualiza la información de una dependencia dado su id
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $identificador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $identificador)
    {
        $dependence = Dependence::find($identificador);        
        $dependence->name = isset($request['name']) ? $request['name'] : $dependence->name;        
        $dependence->save();
        $this->updateTimeBlock($dependence->id,$request['week']);
        return $dependence;
    }

    private function updateTimeBlock($identificador,$week){
        $timeBlock = TimeBlock::where('id_dependence',$identificador)->first();
        $timeBlock->week = isset($week) ? $week : $timeBlock->week;
        $timeBlock->save();
        return $timeBlock;  
    }

    /**
     * Elimina el registro de una dependencia dado su id
     *
     * @param  int  $identificador
     * @return \Illuminate\Http\Response
     */
    public function destroy($identificador)
    {
        $dependence = Dependence::find($identificador);
        $nombre = $dependence->name;
        $dependence->delete();

        return "dependencia {$nombre} eliminada";
    }
}
