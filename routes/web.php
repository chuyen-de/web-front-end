<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$app->group( [ 'middleware' => 'auth', 'namespace' => 'App\Http\Controllers' ], function ( $app ) {
	$app->get( '/', 'MyController@user' );
	$app->get( '/user', 'MyController@user' );
	$app->get( '/course', 'MyController@course' );
	$app->get( '/course/{id}/user', 'MyController@UserOfCourse' );
} );

$app->get( '/login', 'MyController@showFormLogin' );
$app->get( '/logout', 'MyController@logout' );
$app->post( '/login', 'MyController@login' );
