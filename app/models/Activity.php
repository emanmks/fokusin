<?php

class Activity extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	// Every Single Activity Belongs To One Classification
	public function classification()
	{
		return $this->belongsTo('Classification');
	}

}