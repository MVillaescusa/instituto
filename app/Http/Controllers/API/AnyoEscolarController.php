<?php

namespace App\Http\Controllers\API;

use App\Anyoescolar;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnyoEscolarResource;
use Illuminate\Http\Request;
use App\Centro;
use Illuminate\Support\Facades\Auth;

class AnyoEscolarController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Anyoescolar::class, 'anyoescolar');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Va a devolver todo
        return AnyoEscolarResource::collection(Anyoescolar::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anyo = json_decode($request->getContent(),true);
        $centro = Centro::where('coordinador', "=", Auth::id())->get();
        $anyo['centro'] = $centro[0]->id; 
        $anyoescolar = Anyoescolar::create($anyo, true);

        return new AnyoEscolarResource($anyoescolar);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Anyoescolar $anyoescolar
     * @return \Illuminate\Http\Response
     */
    public function show(Anyoescolar $anyoescolar)
    {
        return new AnyoEscolarResource($anyoescolar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Anyoescolar $anyoescolar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anyoescolar $anyoescolar)
    {
        $anyoescolar->update(json_decode($request->getContent(), true));
        return new AnyoEscolarResource($anyoescolar);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Anyoescolar $anyoescolar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anyoescolar $anyoescolar)
    {
        $anyoescolar->delete();
    }
}
