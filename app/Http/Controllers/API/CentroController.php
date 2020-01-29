<?php

namespace App\Http\Controllers\API;

use App\Centro;
use App\Http\Controllers\Controller;
use App\Http\Resources\CentroResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CentroController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Centro::class, 'centro');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CentroResource::collection(Centro::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $centro = Centro::create(json_decode($request->getContent(), true));
        /* Con URLEncoded Form data
         *         $centro = Centro::create([
                    'codigo' => $inputJson->codigo,
                    'nombre' => $inputJson->nombre,
                    'web' => $inputJson->web,
                    // TODO manage geometry points
                    'situacion' => $inputJson->situacion,
                    // TODO manage coordinador
                    'coordinador' => Auth::id(),
                ]);
        */

        return new CentroResource($centro);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function show(Centro $centro)
    {
        return new CentroResource($centro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Centro $centro)
    {
        $centro->update(json_decode($request->getContent(), true));
        return new CentroResource($centro);
        /* Con URLEncoded Form data
                $centro->setAttribute('codigo', $inputJson->codigo);
                $centro->setAttribute('nombre', $inputJson->nombre);
                $centro->setAttribute('web', $inputJson->web);
                $centro->setAttribute('situacion', $inputJson->situacion);

                $centro->save();
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Centro $centro
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Centro $centro)
    {
        $centro->delete();
    }
}
