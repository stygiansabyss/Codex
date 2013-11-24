<?php

class Campaign extends BaseModel {

	/********************************************************************
	 * Declarations
	 *******************************************************************/
	protected $table      = 'campaigns';
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
	public function gms()
	{
		return $this->hasMany('Campaign_GM', 'campaign_id');
	}
	public function characters()
	{
		return $this->hasMany('Campaign_Character', 'campaign_id');
	}
	public function forumCategory()
	{
		return $this->hasOne('Forum_Category', 'campaign_id');
	}

	/********************************************************************
	 * Model Events
	 *******************************************************************/
	public static function boot()
	{
		parent::boot();

		self::observe(new Observer_Campaign);
	}

	/********************************************************************
	 * Getter and Setter methods
	 *******************************************************************/

	/********************************************************************
	 * Extra Methods
	 *******************************************************************/
	public function createForumCategory()
	{
		// Get the new position
		$technicalSupport = Forum_Category::where('forum_category_type_id', Forum_Category::TYPE_SUPPORT)->first();

		$newPosition = $technicalSupport->position;
		$technicalSupport->moveDown();

		$category                         = new Forum_Category;
		$category->campaign_id            = $this->id;
		$category->forum_category_type_id = Forum_Category::TYPE_CAMPAIGN;
		$category->name                   = $this->name;
		$category->keyName                = strtoupper(Str::studly($this->name));
		$category->position               = $newPosition;

		$category->save();
	}

	public function addGms($userIds)
	{
		$allGms = Campaign_GM::where('campaign_id', $this->id)->get();

		if ($allGms->count() > 0) {
			foreach ($allGms as $allGm) {
				$allGm->delete();
			}
		}

		foreach ($userIds as $userId => $value) {
			$existingGm = Campaign_GM::where('campaign_id', $this->id)->where('user_id', $userId)->first();
			if ($existingGm != null) {
				continue;
			}


			$campaignGm              = new Campaign_GM;
			$campaignGm->user_id     = $userId;
			$campaignGm->campaign_id = $this->id;

			$campaignGm->save();
		}
	}

	public function isGm($userId)
	{
		$gm = $this->gms->filter(function ($gm) use ($userId) {
			if ($gm->user_id == $userId) {
				return true;
			}
		});

		if ($gm->count() > 0) {
			return true;
		}

		return false;
	}
}