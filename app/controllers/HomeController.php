<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showDashboard()
	{
		$tasks = Activity::with('classification.project')->where('done','=',0)->orderBy('id','desc')->get();

		return View::make('home', compact('tasks'));
	}

	public function filterActivities($name)
	{
		$activities = Activity::where('name','like',"%$name%")->get();

		return $activities;
	}

}
