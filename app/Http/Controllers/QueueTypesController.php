<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependence;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\QueueType;

class QueueTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QueueType::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $queueType = new QueueType;
        $queueType->name = $request['name'];
        $queueType->is_public = $request['isPublic'];
        $queueType->can_be_deleted = $request['canBeDeleted'];
        $queueType->save();

        return $queueType;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idDependence)
    {
        $dependencies = Dependence::where('id','=',$idDependence)->get();
        $result=[];
                foreach($dependencies as $dependence){
                    foreach($dependence->services as $service){
                        foreach ($service->serviceTypes as $serviceType) {
                            foreach ($serviceType->queue_types as $queueType) {
                                
                                array_push($result,$queueType);
                            }
                        }
                    }
                }
                return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $queueType = QueueType::find($id);  
        //si exite el name del request lo pone, si no pone el nombre del servicio.
        $queueType->name = isset($request['name']) ? $request['name'] : $queueType->name;

        $queueType->is_public = isset($request['isPublic']) ? $request['isPublic'] : $queueType->is_public;

        $queueType->can_be_deleted = isset($request['canBeDeleted']) ? $request['canBeDeleted'] : $queueType->can_be_deleted;

        $queueType->save();
        return $queueType;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $queueType = Service::find($id);
        $nombre = $queueType->name;
        $queueType->delete();

        return "tipo de cola {$nombre} eliminada";
    }
}
