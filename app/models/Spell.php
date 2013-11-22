<?php

class Spell extends BaseModel {

	/********************************************************************
	 * Declarations
	 *******************************************************************/
	protected $table      = 'spells';
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
	);

	/********************************************************************
	 * Scopes
	 *******************************************************************/

	/********************************************************************
	 * Relationships
	 *******************************************************************/
	public function spellClass()
	{
		return $this->belongsTo('Spell_Class', 'spell_class_id');
	}

	/********************************************************************
	 * Model Events
	 *******************************************************************/

	/********************************************************************
	 * Getter and Setter methods
	 *******************************************************************/
	public function getClassNameAttribute()
	{
		return $this->spellClass->name;
	}

	public function getLostSpellAttribute()
	{
		return $this->lostSpellFlag == 1 ? 'Yes' : null;
	}

	/********************************************************************
	 * Extra Methods
	 *******************************************************************/
}