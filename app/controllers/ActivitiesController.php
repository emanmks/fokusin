<?php

class ActivitiesController extends \BaseController {


	public function store()
	{
		$activity = new Activity;

		$activity->classification_id = Input::get('classification_id');
		$activity->name = Input::get('name');
		$activity->save();
	}

	public function update($id)
	{
		$activity = Activity::find($id);

		$activity->name = Input::get('name');
		$activity->save();
	}

	public function show($id)
	{
		$activity = Activity::find($id);

		return View::make('activities.show', compact('activity'));
	}

	public function destroy($id)
	{
		Activity::destroy($id);
	}

	public function done($id)
	{
		$activity = Activity::find($id);

		$activity->done = 1;
		$activity->save();
	}

	public function unDone($id)
	{
		$activity = Activity::find($id);

		$activity->done = 0;
		$activity->save();
	}

}
