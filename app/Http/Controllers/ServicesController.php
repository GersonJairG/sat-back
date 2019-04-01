<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const idDependence = 'idDependece';
    public function index()
    {
        return Service::join('dependences', 'services.id_dependence', '=', 'dependences.id')
                ->select('services.id', 'services.name', 'services.id_dependence','dependences.name as dependence')
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
        $service = new Service;
        $service->name = $request['name'];
        $service->id_dependence = $request[idDependence];
        $service->save();

        return $service;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Service::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $service->name = isset($request['name']) ? $request['name'] : $service->name;
        $service->id_dependence = isset($request[idDependence]) ? $request[idDependence] : $service->id_dependence;
        $service->save();
        return $service;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $nombre = $service->name;
        $service->delete();

        return "servicio {$nombre} eliminado";
    }
}
