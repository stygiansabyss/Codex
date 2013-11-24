<?php

class Character extends BaseModel {

	/********************************************************************
	 * Declarations
	 *******************************************************************/
	protected $table      = 'characters';
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
		'name'    => 'required',
		'user_id' => 'required|exists:users,uniqueId'
	);

	/********************************************************************
	 * Scopes
	 *******************************************************************/

	/********************************************************************
	 * Relationships
	 *******************************************************************/

	/**
	 * Forum Post Relationship
	 *
	 * @return Forum_Post[]
	 */
	public function posts()
	{
		return $this->morphMany('Forum_Post', 'morph');
	}

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/********************************************************************
	 * Model Events
	 *******************************************************************/

	/********************************************************************
	 * Getter and Setter methods
	 *******************************************************************/
	public function getActiveAttribute()
	{
		return $this->activeFlag == 1 ? 'Yes' : 'No';
	}
	public function getHiddenAttribute()
	{
		return $this->hiddenFlag == 1 ? 'Yes' : 'No';
	}
	public function getApprovedAttribute()
	{
		return $this->approvedFlag == 1 ? 'Yes' : 'No';
	}

	/**
	 * Get the number of posts from this user
	 *
	 */
	public function getPostsCountAttribute()
	{
		$postsCount = $this->posts->count();
		// $repliesCount = $this->replies->count();
		// return $postsCount + $repliesCount;

		return $postsCount;
	}

	/********************************************************************
	 * Extra Methods
	 *******************************************************************/
}