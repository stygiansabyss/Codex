<?php

class Race extends BaseModel {

	/********************************************************************
	 * Declarations
	 *******************************************************************/
	protected $table      = 'races';
	protected $primaryKey = 'uniqueId';
	public $incrementing  = false;

	/**
	 * Soft Delete users instead of completely removing them
	 *
	 * @var bool $softDelete Whether to delete or soft delete
	 */
	protected $softDelete = true;

	/********************************************************************
	 * Aware validation rules
	 *******************************************************************/
	public static $rules = array(
		'name'        => 'required',
		'keyName'     => 'required',
		'hpDice'      => 'required',
	);

	/********************************************************************
	 * Scopes
	 *******************************************************************/

	/********************************************************************
	 * Relationships
	 *******************************************************************/
	public function stats()
	{
		return $this->hasMany('Race_Stat', 'race_id')->with('Stat');
	}

	/********************************************************************
	 * Model Events
	 *******************************************************************/

	/********************************************************************
	 * Getter and Setter methods
	 *******************************************************************/
	public function getHitDieAttribute()
	{
		return 'd'. $this->hpDice;
	}

	public function getStatsOrderedAttribute()
	{
		$stats = $this->stats->sortBy(function ($stat) {
			return $stat->stat->name;
		});

		return $stats;
	}

	/********************************************************************
	 * Extra Methods
	 *******************************************************************/
}