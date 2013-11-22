<?php

class Entity extends BaseModel {

	/********************************************************************
	 * Declarations
	 *******************************************************************/
	protected $table      = 'entities';
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