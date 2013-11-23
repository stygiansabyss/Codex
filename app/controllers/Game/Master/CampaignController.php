<?php

class Game_Master_CampaignController extends BaseController {

	public function getIndex($campaignId)
	{

	}

	public function getManage()
	{
		$campaigns = Campaign::orderByNameAsc()->get();

		$this->setViewData('campaigns', $campaigns);
	}
}
