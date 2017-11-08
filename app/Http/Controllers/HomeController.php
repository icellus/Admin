<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\ResourceModel;
use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{

	/**
	 * HomeController constructor.
	 */
	public function __construct()
    {
//        $this->middleware('auth');
    }

	/**
	 * Show the application dashboard.
	 *
	 * @param \App\Model\ResourceModel $resource
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index(ResourceModel $resource)
    {
        return view('home');
    }

	public function get() {
    	echo '123';
	}
}
