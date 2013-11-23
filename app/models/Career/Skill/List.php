<?php

class Career_Skill_List extends BaseModel {

	/********************************************************************
	 * Declarations
	 *******************************************************************/
	protected $table      = 'career_skill_lists';

	/********************************************************************
	 * Aware validation rules
	 *******************************************************************/
	public static $rules = array(
		'career_id'     => 'required|exists:careers,uniqueId',
		'skill_list_id' => 'required|exists:skill_lists,uniqueId',
	);

	/********************************************************************
	 * Scopes
	 *******************************************************************/

	/********************************************************************
	 * Relationships
	 *******************************************************************/
	public function career()
	{
		return $this->belongsTo('Career', 'career_id');
	}
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
	public function getCareerNameAttribute()
	{
		return $this->career->name;
	}

	public function getSkillListNameAttribute()
	{
		return $this->skillList->name;
	}

	public function getSkillCapAttribute()
	{
		return $this->cap == 0 ? null : $this->cap;
	}

	/********************************************************************
	 * Extra Methods
	 *******************************************************************/
}