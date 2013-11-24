<?php

class Game_Master_CampaignController extends BaseController {

	public function getView($campaignId)
	{
		$this->checkPermission('GAME_MASTER');

		$campaign = Campaign::find($campaignId);

		$forum       = new Forum;
		$recentPosts = $forum->recentPosts();

		$entities = Entity::orderByNameAsc()->get();

		$this->setViewData('recentPosts', $recentPosts);
		$this->setViewData('entities', $entities);
		$this->setViewData('campaign', $campaign);
	}

	public function getManage()
	{
		$this->checkPermission('MANAGE_CAMPAIGNS');

		$campaigns = Campaign::orderByNameAsc()->get();

		$this->setViewData('campaigns', $campaigns);
	}

	public function getAdd()
	{
		$users = User::orderBy('username', 'asc')->get();

		$users = $users->filter(function ($user) {
			if ($user->checkPermission('GAME_MASTER')) {
				return true;
			}
		});

		$this->setViewData('users', $users);
	}

	public function postAdd()
	{
		$this->skipView();

		$input = e_array(Input::all());

		if ($input != null) {
			$campaign              = new Campaign;
			$campaign->name        = $input['name'];
			$campaign->keyName     = $input['keyName'];
			$campaign->description = $input['description'];

			$this->checkErrorsSave($campaign);

			$campaign->addGms($input['user_id']);

			$campaign->createForumCategory();
		}

		$this->redirect('/game/master/campaign/manage', 'New campaign added.');
	}

	public function getEdit($campaignId)
	{
		$campaign = Campaign::find($campaignId);
		$users    = User::orderBy('username', 'asc')->get();

		$users = $users->filter(function ($user) {
			if ($user->checkPermission('GAME_MASTER')) {
				return true;
			}
		});

		$this->setViewData('campaign', $campaign);
		$this->setViewData('users', $users);
	}

	public function postEdit($campaignId)
	{
		$this->skipView();

		$input = e_array(Input::all());

		if ($input != null) {
			$campaign              = Campaign::find($campaignId);
			$campaign->name        = $input['name'];
			$campaign->keyName     = $input['keyName'];
			$campaign->description = $input['description'];

			$this->checkErrorsSave($campaign);

			$campaign->addGms($input['user_id']);
		}

		$this->redirect('/game/master/campaign/manage', 'New campaign added.');
	}

	public function getDelete($campaignId)
	{
		$this->skipView();

		$campaign = Campaign::find($campaignId);
		$campaign->delete();

		$this->redirect('/game/master/campaign/manage', 'Campaign deleted.');
	}
}
