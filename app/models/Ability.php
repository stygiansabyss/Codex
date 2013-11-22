<?php

class Ability extends BaseModel {

	/********************************************************************
	 * Declarations
	 *******************************************************************/
	protected $table      = 'abilities';
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

	/********************************************************************
	 * Extra Methods
	 *******************************************************************/
}