<?php

use Illuminate\Http\Request;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::put('tutorizados/verifica/{tutor_id}/{token}', 'API\TutorizadoController@verificar');

Route::middleware('auth:api')->group(function() {

// Rutas adicionales a las de los Resources
    Route::get('users/profile/{user_id}', 'API\UserController@profile');

    Route::put('centro/verifica/{centro_id}', 'API\CentroController@verificado');

    Route::apiResource('users', 'API\UserController')->parameters([
        'users' => 'user'
    ]);

    Route::apiResource('tutorizados', 'API\TutorizadoController');


    Route::apiResource('centros', 'API\CentroController')->parameters([
        'centros' => 'centro'
    ]);

    Route::apiResource('anyosescolares', 'API\AnyoEscolarController')->parameters(['anyosescolares' => 'anyoescolar']);

    Route::apiResource('niveles', 'API\NivelController')->parameters([
        'niveles' => 'nivel'
    ]);

    Route::put('grupos/asignaTutor/{grupo_id}/{user_id}', 'API\GrupoController@asignaTutor');

    Route::apiResource('grupos', 'API\GrupoController');

    Route::apiResource('matriculas', 'API\MatriculaController');

    Route::apiResource('materias', 'API\MateriaController')->parameters([
        'materia' => 'materia'
    ]);

    Route::apiResource('materiamatriculadas', 'API\MateriamatriculadaController');

    Route::apiResource('materiasimpartidas', 'API\MateriaimpartidaController')->parameters([
        'materiasimpartidas' => 'materiaimpartida'
    ]);

    Route::apiResource('faltasProfesores', 'API\FaltaProfesorController')->parameters([
        'faltasProfesores' => 'faltaProfesor'
    ]);
});

Route::any('/{any}', function (ServerRequestInterface $request) {
    $databaseConnection = config('database.default');
    $databaseBase = 'database.connections.' . $databaseConnection . '.';
    $configAPI = new Config([
        'username' => config($databaseBase . 'username'),
        'password' => config($databaseBase . 'password'),
        'database' => config($databaseBase . 'database'),
        'address' => config($databaseBase . 'host'),
        'basePath' => '/api',
        'debug' => true,
    ]);
    $api = new Api($configAPI);
    $response = $api->handle($request);
    return $response;
})->where('any', '.*');


