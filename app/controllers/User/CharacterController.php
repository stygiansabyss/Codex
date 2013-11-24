<?php

class User_CharacterController extends BaseController {

	public function getIndex()
	{
		$characters = $this->activeUser->characters;

		$this->setViewData('characters', $characters);
	}

	public function getAdd()
	{
		$character = new Character;
		$races     = Race::orderByNameAsc()->get();
		$stats     = Stat::orderByNameAsc()->get();

		$raceArray = $this->arrayToSelect($races, 'id', 'name', 'Select a race');

		$this->setViewPath('user.character.modify');
		$this->setViewData('character', $character);
		$this->setViewData('stats', $stats);
		$this->setViewData('raceArray', $raceArray);
	}

	public function postAdd()
	{
		$this->skipView();

		$input = e_array(Input::all());

		if ($input != null) {
			if (isset($input['siteRollFlag'])) {
				// Roll the character's stats
				$race = Race::find($input['race_id']);
				$raceStats = $race->statsOrdered;

				foreach ($raceStats as $raceStat) {
					$range = range(1, $raceStat->startingDice);
					$roll = 0;

					foreach ($range as $dice) {
						$roll += rand(1, 6);
					}

					// Rolls cannot exceed the racial cap
					if ($roll > $raceStat->cap) {
						$roll = $raceStat->cap;
					}

					// CHANGE THIS TO ID
					$input[$raceStat->stat->name] = $roll;
				}
			}
			ppd($input);
		}
	}

	public function getEdit($characterId)
	{

	}

	public function postEdit($characterId)
	{

	}

	public function getDelete($characterId)
	{
		$character = Character::find($characterId);
		$character->delete();

		$this->redirect('/user/characters', $character->name .' has been deleted.');
	}

	public function getGetRaceStats($raceId)
	{
		$this->skipView();

		$race = Race::find($raceId);
		$raceStats = $race->statsOrdered;

		$stats = new Utility_Collection();

		foreach ($raceStats as $raceStat) {
			$newStat               = new stdClass();
			$newStat->id           = $raceStat->stat->id;
			$newStat->name         = $raceStat->stat->name;
			$newStat->startingDice = $raceStat->startDice;
			$newStat->cap          = $raceStat->cap;

			$stats->add($newStat);
		}

		return $stats->toJson();
	}
}