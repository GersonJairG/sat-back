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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Dependence::find($id);
    }

    /**
     * Actualiza la información de una dependencia dado su id
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dependence = Dependence::find($id);        
        $dependence->name = isset($request['name']) ? $request['name'] : $dependence->name;        
        $dependence->save();
        $this->updateTimeBlock($dependence->id,$request['week']);
        return $dependence;
    }

    private function updateTimeBlock($id,$week){
        $timeBlock = TimeBlock::where('id_dependence',$id)->first();
        $timeBlock->week = isset($week) ? $week : $timeBlock->week;
        $timeBlock->save();
        return $timeBlock;  
    }

    /**
     * Elimina el registro de una dependencia dado su id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dependence = Dependence::find($id);
        $nombre = $dependence->name;
        $dependence->delete();

        return "dependencia {$nombre} eliminada";
    }
}
