<?php

class Classification extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	// Every Single Classification Has Many Activites
	public function tasks()
	{
		return $this->hasMany('Activity');
	}

	public function project()
	{
		return $this->belongsTo('Project');
	}

}