<?php

class Game_MasterController extends BaseController {

	public function getIndex()
	{
		$this->subMenu->addMenuItem('Game Master', 'game/master');
		$this->subMenu->addMenuItem('Rules', 'game/master/rules');
		$this->subMenu->addMenuItem('Races', 'game/master/races');
		$this->subMenu->addMenuItem('Skills', 'game/master/skills');
		$this->subMenu->addMenuItem('Spells', 'game/master/spells');

		$forum       = new Forum;
		$recentPosts = $forum->recentPosts();

		$entities = Entity::orderByNameAsc()->get();

		$this->setViewData('recentPosts', $recentPosts);
		$this->setViewData('entities', $entities);
	}
}