<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MyController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
	}

	private function getApiUser() {
		$client = new Client();
		$res    = $client->request( 'GET', 'https://web-api-chuyen-de.herokuapp.com/user' );
		$result = json_decode( $res->getBody() )->results;

		return $result;
	}

	private function getApiCourse() {
		$client = new Client();
		$res    = $client->request( 'GET', 'https://web-api-chuyen-de.herokuapp.com/course' );
		$result = json_decode( $res->getBody() )->results;

		return $result;
	}

	public function user() {
		return view( 'user', [ 'result' => $this->getApiUser() ] );
	}

	public function course() {
		return view( 'course', [ 'result' => $this->getApiCourse() ] );
	}

	public function UserOfCourse( $id ) {
		$course_name = '';
		foreach ( $this->getApiCourse() as $course ) {
			if ( $course->_id == $id ) {
				$course_name = $course->tenKH;
				break;
			}
		}

		return view( 'user_of_course', [ 'result'      => $this->getApiUser(),
		                                 'course_id'   => $id,
		                                 'course_name' => $course_name,
		] );
	}

	public function showFormLogin() {
		if ( session()->get( 'auth' ) == 'true' ) {
			return redirect( '/' );
		} else {
			return view( 'login' );
		}
	}

	public function login( Request $request ) {
		$client = new Client();
		$res    = $client->request( 'POST', 'https://web-api-chuyen-de.herokuapp.com/user/login', [
			'form_params' => [
				'email'    => $request->email,
				'password' => $request->password,
			],
		] );
		$result = json_decode( $res->getBody() )->results;
		session( [ 'auth' => $result ] );

		return redirect( '/' );
	}

	public function logout() {
		session()->forget('auth');

		return redirect( '/login' );
	}

}
