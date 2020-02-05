<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Periodolectivo;
use Illuminate\Http\Request;
use App\Http\Resources\PeriodolectivoResource;

class PeriodolectivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PeriodolectivoResource::collection(Periodolectivo::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periodo = Periodolectivo::create(json_decode($request->getContent(), true));
        return new PeriodolectivoResource($periodo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Periodolectivo  $periodolectivo
     * @return \Illuminate\Http\Response
     */
    public function show(Periodolectivo $periodo)
    {
        return new PeriodolectivoResource($periodo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Periodolectivo  $periodolectivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periodolectivo $periodo)
    {
        $periodo->update(json_decode($request->getContent(), true));
        return new PeriodolectivoResource($periodo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periodolectivo  $periodolectivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodolectivo $periodo)
    {
        $periodo->delete();
    }
}
