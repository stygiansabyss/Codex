<?php

class Campaign_Character extends BaseModel {

	/********************************************************************
	 * Declarations
	 *******************************************************************/
	protected $table      = 'campaign_characters';

	/********************************************************************
	 * Aware validation rules
	 *******************************************************************/
	public static $rules = array(
		'campaign_id'  => 'required|exists:campaigns,uniqueId',
		'character_id' => 'required|exists:characters,uniqueId',
	);

	/********************************************************************
	 * Scopes
	 *******************************************************************/
	public function scopeApprovedAsc($query)
	{
		return $query->where('approvedFlag', 1);
	}
	public function scopeUnapprovedAsc($query)
	{
		return $query->where('approvedFlag', 0);
	}

	/********************************************************************
	 * Relationships
	 *******************************************************************/
	public function campaign()
	{
		return $this->belongsTo('Campaign', 'campaign_id');
	}
	public function character()
	{
		return $this->belongsTo('Character', 'character_id');
	}

	/********************************************************************
	 * Model Events
	 *******************************************************************/

	/********************************************************************
	 * Getter and Setter methods
	 *******************************************************************/

	/********************************************************************
	 * Extra Methods
	 *******************************************************************/
}