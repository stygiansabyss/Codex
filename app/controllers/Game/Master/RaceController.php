<?php

class Game_Master_RaceController extends Game_Master_RulesController {

	public function getRaces()
	{
		$races = Race::orderByNameAsc()->get();

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Races')
				 ->setSortProperty('name')
				 ->setDeleteLink('/game/master/races/racedelete/')
				 ->setDeleteProperty('id')
				 ->setResources($races);

		// Add the display columns
		$settings->addDisplayField('name')
				 ->addDisplayField('fullName')
				 ->addDisplayField('hit_die');

		// Add the form fields
		$settings->addFormField('name', 'text')
				 ->addFormField('keyName', 'text')
				 ->addFormField('fullName', 'text')
				 ->addFormField('hpDice', 'text')
				 ->addFormField('heightCalculation', 'text')
				 ->addFormField('wm', 'text')
				 ->addFormField('lifeSpan', 'text')
				 ->addFormField('description', 'textarea');

		$this->setViewPath('core.helpers.crud');
		$this->setViewData('settings', $settings);
	}

	public function postRaces()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// Get the object
			$race                    = (isset($input['id']) && $input['id'] != null ? Race::find($input['id']) : new Race);
			$race->name              = $input['name'];
			$race->keyName           = $input['keyName'];
			$race->fullName          = $input['fullName'];
			$race->hpDice            = $input['hpDice'];
			$race->heightCalculation = $input['heightCalculation'];
			$race->wm                = $input['wm'];
			$race->lifeSpan          = $input['lifeSpan'];
			$race->description       = $input['description'];

			// Attempt to save the object
			$this->save($race);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $race->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getRacedelete($raceId)
	{
		$this->skipView();

		$race = Race::find($raceId);
		$race->delete();

		return Redirect::to('/game/master/races#races');
	}

	public function getRaceStats($raceId)
	{
		$raceStats = Race_Stat::where('race_id', $raceId)->orderBy('stat_id')->paginate(20);

		$races = new Utility_Collection();
		$races->add(Race::find($raceId));

		$raceArray = $this->arrayToSelect($races, 'id', 'name', false);

		$stats = Stat::orderByNameAsc()->get();

		$statArray = $this->arrayToSelect($stats, 'id', 'name', 'Select a stat');

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Race Stats')
				 ->setSortProperty('id')
				 ->setDeleteLink('/game/master/races/racestatdelete/')
				 ->setDeleteProperty('id')
				 ->setPaginationFlag('true')
				 ->setResources($raceStats);

		// Add the display columns
		$settings->addDisplayField('race_name')
				 ->addDisplayField('stat_name')
				 ->addDisplayField('start_dice')
				 ->addDisplayField('cap');

		// Add the form fields
		$settings->addFormField('race_id', 'select', $raceArray)
				 ->addFormField('stat_id', 'select', $statArray)
				 ->addFormField('startingDice', 'text')
				 ->addFormField('cap', 'text');

		$this->setViewPath('core.helpers.crud');
		$this->setViewData('settings', $settings);
	}

	public function postRaceStats()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// Get the object
			$raceStat               = (isset($input['id']) && $input['id'] != null ? Race_Stat::find($input['id']) : new Race_Stat);
			$raceStat->race_id      = $input['race_id'];
			$raceStat->stat_id      = $input['stat_id'];
			$raceStat->startingDice = $input['startingDice'];
			$raceStat->cap          = $input['cap'];

			// Attempt to save the object
			$this->save($raceStat);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $raceStat->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getRacestatdelete($raceStatId)
	{
		$this->skipView();

		$raceStat = Race_Stat::find($raceStatId);
		$raceStat->delete();

		return Redirect::to('/game/master/races#race-stats');
	}
}
