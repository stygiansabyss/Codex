<?php

class Skill_List_Percentile extends BaseModel {

	/********************************************************************
	 * Declarations
	 *******************************************************************/
	protected $table      = 'skill_list_percentiles';
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
		'morph_id'      => 'required',
		'morph_type'    => 'required',
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
	public function morph()
	{
		return $this->morphTo();
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

	public function getPercentRangeAttribute()
	{
		return $this->percentageStart .' - '. $this->percentageEnd;
	}

	public function getPercentageStartAttribute($value)
	{
		return str_pad($value, 2, 0, STR_PAD_LEFT);
	}

	public function getPercentageEndAttribute($value)
	{
		return str_pad($value, 2, 0, STR_PAD_LEFT);
	}

	public function getNameAttribute($value)
	{
		return $this->morph->name;
	}

	public function getTypeAttribute()
	{
		return $this->morph_type;
	}

	public function getMorphDisplayIdAttribute()
	{
		return $this->morph_type .'::'. $this->morph_id;
	}

	/********************************************************************
	 * Extra Methods
	 *******************************************************************/
}