<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Centro;
use App\Policies\CentroPolicy;
use App\Http\Controllers\Controller;
use App\Http\Resources\CentroResource;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

use App\Anyoescolar;
use App\Periodolectivo;
use App\Periodoclase;
use App\Faltaprofesor;
use App\Http\Resources\AnyoescolarResource;

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

        $centro = json_decode($request->getContent(), true);

        if(!Auth::user()->isSuperAdmin()){
            $centro['coordinador'] = Auth::id();
        }

        if(in_array("verificado", $centro)){
                 unset($centro['verificado']);
        }

        $centro = Centro::create($centro);

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

       $break_data = json_decode($request->getContent(), true);
        if(in_array("verificado", $break_data)){
                 unset($break_data['verificado']);
        }
        $centro = Centro::create(json_decode($request->getContent(), true));

        return new CentroResource($centro);
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

   public function verificado(User $user, $centro_id)
    {
        $centro=Centro::findOrFail($centro_id);

        if ($this->authorize('verificado',$centro)) {
             $centro = Centro::find($centro_id);
             $centro->update(['verificado' => true]);
              return new CentroResource($centro);

        }
    }

    public function sustituciones(User $user, $dia_semana=null, $hora_inicio=null)
    {
        $anyosActuales = Anyoescolar::anyoescolarActual();;
        if ($dia_semana && $hora_inicio){
            $periodosLectivos = Periodolectivo::whereIn('anyoescolar_id', $anyosActuales)->where([
                ['dia', '=', $dia_semana],
                ['hora_inicio', '=', $hora_inicio],
            ])->get('id');
        }else{
            $periodosLectivos = Periodolectivo::whereIn('anyoescolar_id', $anyosActuales)->get('id');
        }
        $periodosClases = Periodoclase::whereIn('periodo_id',$periodosLectivos)->get('id');
        $totalSustituciones = Faltaprofesor::whereIn('periodoclase_id',$periodosClases)->get('profesor_guardia');
        $counted = $totalSustituciones->countBy('profesor_guardia');
        $filtrado = $counted->filter(function ($value, $key) {
            return $key != '';
        });

        return $filtrado;
    }
}
