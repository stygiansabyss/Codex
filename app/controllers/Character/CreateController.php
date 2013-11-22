<?php

class Character_CreateController extends BaseController {

	public function getIndex()
	{
		// Set up the wizard required settings
		$settings               = new stdClass();
		$settings->viewLocation = 'character.create';
		$settings->stepBadges   = array
		(
			1 => 'Overview',
			2 => 'Class/Career',
		);

		// Get any data the pages need
		$races   = $this->arrayToSelect(Race::orderByNameAsc()->get(), 'id', 'name', 'Select a race');

		$classes = Character_Class::with('careers')->orderByNameAsc()->get();
		$classArray   = $this->arrayToSelect($classes, 'id', 'name', 'Select a class');

		$character = new stdClass();
		$character->name = 'Steven';
		$character->alias = 'Stygian';
		$character->race = new stdClass();
		$character->race->name = 'Human';

		$this->setViewPath('core.helpers.wizard');
		$this->setViewData('settings', $settings);
		$this->setViewData('races', $races);
		$this->setViewData('character', $character);
		$this->setViewData('classes', $classes);
		$this->setViewData('classArray', $classArray);
	}

	protected function getStats($characterId)
	{
		$character = Character::find($characterId);
		$stats = $character->stats;
		$bases = $character->bases;
	}
}