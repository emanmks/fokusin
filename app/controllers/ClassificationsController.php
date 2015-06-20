<?php

class ClassificationsController extends \BaseController {

	public function store()
	{
		$classification = new Classification;

		$classification->project_id = Input::get('project_id');
		$classification->name = Input::get('name');
		$classification->save();
	}

	public function show($id)
	{
		$classification = Classification::with('project','tasks')->findOrFail($id);

		return View::make('classifications.show', compact('classification'));
	}

	public function update($id)
	{
		$classification = Classification::findOrFail($id);

		$classification->name = Input::get('name');
		$classification->save();
	}

	public function destroy($id)
	{
		$classification = Classification::with('tasks')->find($id);

		if($classification->tasks->count() > 0)
		{
			return array('success' => 0);
		}
		else
		{
			Classification::destroy($id);
			return array('success' => 1);
		}
	}

}
