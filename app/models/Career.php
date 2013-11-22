<?php

class Career extends BaseModel {

	/********************************************************************
	 * Declarations
	 *******************************************************************/
	protected $table      = 'careers';
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
	public function characterClass()
	{
		return $this->belongsTo('Character_Class', 'class_id');
	}

	/********************************************************************
	 * Model Events
	 *******************************************************************/

	/********************************************************************
	 * Getter and Setter methods
	 *******************************************************************/
	public function getGmApprovalAttribute()
	{
		return $this->gmApprovalFlag == 1 ? 'Yes' : 'No';
	}
	public function getClassNameAttribute()
	{
		return $this->characterClass->name;
	}

	/********************************************************************
	 * Extra Methods
	 *******************************************************************/
}