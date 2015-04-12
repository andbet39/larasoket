<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use LRedis;

class SocketController extends Controller {



	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index()
	{

		return view('socket');

	}

	public function writemessage()
	{

		return view('writemessage');

	}

	public function sendMessage(){

		$redis = LRedis::connection();
		$redis->publish('message', Request::input('message'));

		return redirect('writemessage');

	}


}
