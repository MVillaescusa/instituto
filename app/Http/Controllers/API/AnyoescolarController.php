<?php

namespace App\Http\Controllers\API;

use App\Anyoescolar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AnyoescolarResource;

class AnyoescolarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AnyoescolarResource::collection(Anyoescolar::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anyoescolar = Anyoescolar::create(json_decode($request->getContent(), true));

        return new AnyoescolarResource($anyoescolar);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anyoescolar  $anyoescolar
     * @return \Illuminate\Http\Response
     */
    public function show(Anyoescolar $anyoescolar)
    {
        return new AnyoescolarResource($anyoescolar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anyoescolar  $anyoescolar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anyoescolar $anyoescolar)
    {
        $anyoescolar->update(json_decode($request->getContent(), true));

        return new AnyoescolarResource($anyoescolar);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anyoescolar  $anyoescolar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anyoescolar $anyoescolar)
    {
        $anyoescolar->delete();
    }
}
