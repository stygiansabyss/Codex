<?php

class Race_Stat extends BaseModel {

	/********************************************************************
	 * Declarations
	 *******************************************************************/
	protected $table = 'race_stats';

	/********************************************************************
	 * Aware validation rules
	 *******************************************************************/
	public static $rules = array(
		'race_id'      => 'required|exists:races,uniqueId',
		'stat_id'      => 'required|exists:stats,uniqueId',
		'startingDice' => 'required',
		'cap'          => 'required',
	);

	/********************************************************************
	 * Scopes
	 *******************************************************************/

	/********************************************************************
	 * Relationships
	 *******************************************************************/
	public function race()
	{
		return $this->belongsTo('Race', 'race_id');
	}
	public function stat()
	{
		return $this->belongsTo('Stat', 'stat_id');
	}

	/********************************************************************
	 * Model Events
	 *******************************************************************/

	/********************************************************************
	 * Getter and Setter methods
	 *******************************************************************/
	public function getRaceNameAttribute()
	{
		return $this->race->name;
	}
	public function getStatNameAttribute()
	{
		return $this->stat->name;
	}
	public function getStartDiceAttribute()
	{
		return $this->startingDice .'d6';
	}

	/********************************************************************
	 * Extra Methods
	 *******************************************************************/
}