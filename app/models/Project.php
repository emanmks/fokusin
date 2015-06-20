<?php

class Project extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	// Every Single Project Has Many Activity
	public function classifications()
	{
		return $this->hasMany('Classification');
	}

	public function tasks()
	{
		return $this->hasManyThrough('Activity','Classification');
	}
}