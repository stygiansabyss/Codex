<?php

class Game_MasterController extends BaseController {

	public function getIndex()
	{
		$this->subMenu->addMenuItem('Game Master', 'game/master');
		$this->subMenu->addMenuItem('Rules', 'game/master/rules');

		$forum       = new Forum;
		$recentPosts = $forum->recentPosts();

		$entities = Entity::orderByNameAsc()->get();

		$this->setViewData('recentPosts', $recentPosts);
		$this->setViewData('entities', $entities);
	}
}