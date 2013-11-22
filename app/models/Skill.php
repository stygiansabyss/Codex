<?php

class Skill extends BaseModel {

	/********************************************************************
	 * Declarations
	 *******************************************************************/
	protected $table      = 'skills';
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
		'skill_list_id' => 'required|exists:skill_lists,uniqueId',
		'base_id'       => 'required|exists:bases,uniqueId',
		'name'          => 'required',
		'keyName'       => 'required',
	);

	/********************************************************************
	 * Scopes
	 *******************************************************************/

	/********************************************************************
	 * Relationships
	 *******************************************************************/
	public function skillList()
	{
		return $this->belongsTo('Skill_List', 'skill_list_id');
	}
	public function base()
	{
		return $this->belongsTo('Base', 'base_id');
	}

	/********************************************************************
	 * Model Events
	 *******************************************************************/

	/********************************************************************
	 * Getter and Setter methods
	 *******************************************************************/
	public function getSkillListNameAttribute()
	{
		return $this->skillList->name;
	}

	public function getBaseNameAttribute()
	{
		return $this->base->name;
	}

	public function getPercentRangeAttribute()
	{
		return $this->percentageStart .' - '. $this->percentageEnd;
	}

	/********************************************************************
	 * Extra Methods
	 *******************************************************************/
}