<?php

use Illuminate\Http\Request;
use Site\Entities\State;

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

Route::get('/regions', function() {

    $regions = State::all();

    return response()->json($regions);

});

Route::get('/region/{region}/localities', function($region) {

    $region = State::where('slug', $region)->first();

    return response()->json($region->localities);

});

Route::get('/cep/{postal_code}', function($postal_code) {

    $response = \Httpful\Request::get('https://viacep.com.br/ws/'.$postal_code.'/json/')
        ->addHeaders(array(
            'ContentType' => 'application/json'
        ))->send();

    if ( $response->code === 200 || $response->code === 201 ) {

        if( isset($response->body->erro) ) {
            return response(isset($response->body->Message)?$response->body->Message:'Não encontrado', 400);
        } else {
            return response()->json( $response->body );
        }

    } else {
        return response(isset($response->body->Message)?$response->body->Message:'Não encontrado', 400);
    }

});