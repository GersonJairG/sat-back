<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType;
use App\Models\Dependence;

class ServiceTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServiceType::join('services','service_types.id_service','=','services.id')
                          ->join('dependences','services.id_dependence','=','dependences.id')
                          ->select('service_types.id','service_types.name','dependences.id as dependence')
                          ->get();
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serviceTypes = new ServiceType;
        $serviceTypes->id_service = $request['idService'];
        $serviceTypes->name = $request['name'];
        $serviceTypes->description = $request['description'];
        $serviceTypes->average_time = $request['averageTime'];
        $serviceTypes->save();

        return $serviceTypes;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $identificador
     * @return \Illuminate\Http\Response
     */
    public function show($idService){
        return ServiceType::where('id_service', '=', $idService)->get();
    }

    public function findServiceType($identificador){
        return ServiceType::find($identificador);
    }

    public function getForDependence($idDependence){
        return Dependence::join('services','dependences.id','=','services.id_dependence')
                         ->join('service_types','services.id','=','service_types.id_service')  
                         ->where('dependences.id','=',$idDependence)
                         ->select('service_types.id','service_types.name')
                         ->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $identificador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $identificador)
    {
        $serviceType = ServiceType::find($identificador);        
        $serviceType->description = isset($request['description']) ? $request['description'] : $serviceType->description;
        $serviceType->average_time = isset($request['average_time']) ? $request['average_time'] : $serviceType->average_time;
        $serviceType->id_service = isset($request['id_service']) ? $request['id_service'] : $serviceType->id_service;
        $serviceType->name = isset($request['name']) ? $request['name'] : $serviceType->name;    
        $serviceType->save();
        return $serviceType;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $identificador
     * @return \Illuminate\Http\Response
     */
    public function destroy($identificador)
    {
        $serviceType = ServiceType::find($identificador);
        $nombre = $serviceType->name;
        $serviceType->delete();

        return "tipo de servicio {$nombre} eliminado";
    }
}
