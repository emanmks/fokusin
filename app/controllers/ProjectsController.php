<?php

class ProjectsController extends \BaseController {

	public function index()
	{
		$projects = Project::with('classifications','tasks')->get();

		return View::make('projects.index', compact('projects'));
	}

	public function create()
	{
		return View::make('projects.create');
	}

	public function store()
	{
		$project = new Project();

		$project->name = Input::get('name');
		$project->deadline = Input::get('deadline');
		$project->description = Input::get('description');
		$project->save();

		return array('id' => $project->id);
	}

	public function show($id)
	{
		$project = Project::with('classifications','tasks')->findOrFail($id);

		return View::make('projects.show', compact('project'));
	}

	public function edit($id)
	{
		$project = Project::find($id);

		return View::make('projects.edit', compact('project'));
	}

	public function update($id)
	{
		$project = Project::find($id);

		$project->name = Input::get('name');
		$project->deadline = Input::get('deadline');
		$project->description = Input::get('description');
		$project->save();
	}

	public function destroy($id)
	{
		$project = Project::with('tasks')->find($id);

		if($project->tasks->count() > 0)
		{
			return array('success' => 0);
		}
		else
		{
			Project::destroy($id);
			return array('success' => 1);
		}
	}

}
