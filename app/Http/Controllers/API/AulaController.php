<?php

namespace App\Http\Controllers\API;

use App\Aula;
use App\Http\Controllers\Controller;
use App\Http\Resources\AulaResource;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AulaResource::collection(Aula::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aula = json_decode($request->getContent(), true);

        //falta añadir el policy
        $centro = Aula::create($aula);

        return new AulaResource($centro);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function show(Aula $aula)
    {
        return new AulaResource($aula);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aula $aula)
    {
        $aula->update(json_decode($request->getContent(), true));
        return new AulaResource($aula);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aula $aula)
    {
        if($aula->delete()){
            echo "Se ha borrado el aula con éxito";
        }

    }
}
