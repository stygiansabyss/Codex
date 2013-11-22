<?php

class Game_Master_RulesController extends BaseController {

	// Needed for sub-controllers
	public function getIndex($baseId = null)
	{
		$this->subMenu->addMenuItem('Game Master', 'game/master');
		$this->subMenu->addMenuItem('Rules', 'game/master/rules');
		$this->subMenu->addMenuItem('Races', 'game/master/races');
		$this->subMenu->addMenuItem('Skills', 'game/master/skills');
		$this->subMenu->addMenuItem('Spells', 'game/master/spells');

		if ($baseId != null) {
			$base = Base::find($baseId);
			$base->getCalculation();
		}

		$spellClasses = Spell_Class::orderByNameAsc()->get();
		$skillLists   = Skill_List::orderByNameAsc()->get();
		$races        = Race::orderByNameAsc()->get();

		$this->setViewData('spellClasses', $spellClasses);
		$this->setViewData('skillLists', $skillLists);
		$this->setViewData('races', $races);
	}

	public function getStats()
	{
		$stats = Stat::orderByNameAsc()->get();

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Stats')
				 ->setSortProperty('name')
				 ->setDeleteLink('/game/master/rules/statdelete/')
				 ->setDeleteProperty('id')
				 ->setResources($stats);

		// Add the display columns
		$settings->addDisplayField('name')
				 ->addDisplayField('fullName');

		// Add the form fields
		$settings->addFormField('name', 'text')
				 ->addFormField('keyName', 'text')
				 ->addFormField('fullName', 'text')
				 ->addFormField('description', 'textarea');

		$this->setViewPath('core.helpers.crud');
		$this->setViewData('settings', $settings);
	}

	public function postStats()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// Get the object
			$stat              = (isset($input['id']) && $input['id'] != null ? Stat::find($input['id']) : new Stat);
			$stat->name        = $input['name'];
			$stat->keyName     = $input['keyName'];
			$stat->fullName    = $input['fullName'];
			$stat->description = $input['description'];

			// Attempt to save the object
			$this->save($stat);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $stat->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getStatdelete($statId)
	{
		$this->skipView();

		$stat = Stat::find($statId);
		$stat->delete();

		return Redirect::to('/game/master/rules#stats');
	}

	public function getBases()
	{
		$bases = Base::orderByNameAsc()->get();

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Bases')
				 ->setSortProperty('name')
				 ->setDeleteLink('/game/master/rules/basedelete/')
				 ->setDeleteProperty('id')
				 ->setResources($bases);

		// Add the display columns
		$settings->addDisplayField('name')
				 ->addDisplayField('fullName')
				 ->addDisplayField('calculation');

		// Add the form fields
		$settings->addFormField('name', 'text')
				 ->addFormField('keyName', 'text')
				 ->addFormField('fullName', 'text')
				 ->addFormField('description', 'textarea')
				 ->addFormField('calculation', 'text');

		$this->setViewPath('core.helpers.crud');
		$this->setViewData('settings', $settings);
	}

	public function postBases()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// Get the object
			$base              = (isset($input['id']) && $input['id'] != null ? Base::find($input['id']) : new Base);
			$base->name        = $input['name'];
			$base->keyName     = $input['keyName'];
			$base->fullName    = $input['fullName'];
			$base->description = $input['description'];
			$base->calculation = $input['calculation'];

			// Attempt to save the object
			$this->save($base);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $base->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getBasedelete($baseId)
	{
		$this->skipView();

		$base = Base::find($baseId);
		$base->delete();

		return Redirect::to('/game/master/rules#bases');
	}

	public function getVitals()
	{
		$vitals = Vital::orderByNameAsc()->get();

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Vitals')
				 ->setSortProperty('name')
				 ->setDeleteLink('/game/master/rules/vitaldelete/')
				 ->setDeleteProperty('id')
				 ->setResources($vitals);

		// Add the display columns
		$settings->addDisplayField('name')
				 ->addDisplayField('fullName')
				 ->addDisplayField('calculation');

		// Add the form fields
		$settings->addFormField('name', 'text')
				 ->addFormField('keyName', 'text')
				 ->addFormField('fullName', 'text')
				 ->addFormField('description', 'textarea')
				 ->addFormField('calculation', 'text');

		$this->setViewPath('core.helpers.crud');
		$this->setViewData('settings', $settings);
	}

	public function postVitals()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// Get the object
			$vital              = (isset($input['id']) && $input['id'] != null ? Vital::find($input['id']) : new Vital);
			$vital->name        = $input['name'];
			$vital->keyName     = $input['keyName'];
			$vital->fullName    = $input['fullName'];
			$vital->description = $input['description'];
			$vital->calculation = $input['calculation'];

			// Attempt to save the object
			$this->save($vital);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $vital->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getVitaldelete($vitalId)
	{
		$this->skipView();

		$vital = Vital::find($vitalId);
		$vital->delete();

		return Redirect::to('/game/master/rules#vitals');
	}

	public function getAppearances()
	{
		$appearances = Appearance::orderByNameAsc()->get();

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Appearances')
				 ->setSortProperty('name')
				 ->setDeleteLink('/game/master/rules/careerdelete/')
				 ->setDeleteProperty('id')
				 ->setResources($appearances);

		// Add the display columns
		$settings->addDisplayField('name')
				 ->addDisplayField('keyName');

		// Add the form fields
		$settings->addFormField('name', 'text')
				 ->addFormField('keyName', 'text')
				 ->addFormField('description', 'textarea');

		$this->setViewPath('core.helpers.crud');
		$this->setViewData('settings', $settings);
	}

	public function postAppearances()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// Get the object
			$appearance              = (isset($input['id']) && $input['id'] != null ? Appearance::find($input['id']) : new Appearance);
			$appearance->name        = $input['name'];
			$appearance->keyName     = $input['keyName'];
			$appearance->description = $input['description'];

			// Attempt to save the object
			$this->save($appearance);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $appearance->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getAppearancedelete($appearanceId)
	{
		$this->skipView();

		$appearance = Appearance::find($appearanceId);
		$appearance->delete();

		return Redirect::to('/game/master/rules#appearances');
	}

	public function getClasses()
	{
		$classes = Character_Class::orderByNameAsc()->get();

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Classes')
				 ->setSortProperty('name')
				 ->setDeleteLink('/game/master/rules/classdelete/')
				 ->setDeleteProperty('id')
				 ->setResources($classes);

		// Add the display columns
		$settings->addDisplayField('name')
				 ->addDisplayField('fullName')
				 ->addDisplayField('startingSpells');

		// Add the form fields
		$settings->addFormField('name', 'text')
				 ->addFormField('keyName', 'text')
				 ->addFormField('fullName', 'text')
				 ->addFormField('description', 'textarea')
				 ->addFormField('startingSpellsFlag', 'select', array('No Starting Spells', 'Starting Spells'));

		$this->setViewPath('core.helpers.crud');
		$this->setViewData('settings', $settings);
	}

	public function postClasses()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// Get the object
			$class                     = (isset($input['id']) && $input['id'] != null ? Character_Class::find($input['id']) : new Character_Class);
			$class->name               = $input['name'];
			$class->keyName            = $input['keyName'];
			$class->fullName           = $input['fullName'];
			$class->description        = $input['description'];
			$class->startingSpellsFlag = $input['startingSpellsFlag'];

			// Attempt to save the object
			$this->save($class);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $class->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getClassdelete($classId)
	{
		$this->skipView();

		$class = Character_Class::find($classId);
		$class->delete();

		return Redirect::to('/game/master/rules#classes');
	}

	public function getCareers()
	{
		$careers = Career::with('characterClass')->orderBy('name', 'desc')->get();

		$careers = $careers->sortBy(function ($career) {
			return $career->characterClass->name;
		});

		$classes = Character_Class::orderByNameAsc()->get();

		$classArray = $this->arrayToSelect($classes, 'id', 'name', 'Select a class');

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Careers')
				 ->setSortProperty('className')
				 ->setDeleteLink('/game/master/rules/careerdelete/')
				 ->setDeleteProperty('id')
				 ->setResources($careers);

		// Add the display columns
		$settings->addDisplayField('name')
				 ->addDisplayField('fullName')
				 ->addDisplayField('class_Name')
				 ->addDisplayField('gm_Approval');

		// Add the form fields
		$settings->addFormField('name', 'text')
				 ->addFormField('keyName', 'text')
				 ->addFormField('fullName', 'text')
				 ->addFormField('class_id', 'select', $classArray)
				 ->addFormField('description', 'textarea')
				 ->addFormField('gmApprovalFlag', 'select', array('Does not require GM Approval', 'Requires GM Approval'));

		$this->setViewPath('core.helpers.crud');
		$this->setViewData('settings', $settings);
	}

	public function postCareers()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// Get the object
			$career                 = (isset($input['id']) && $input['id'] != null ? Career::find($input['id']) : new Career);
			$career->name           = $input['name'];
			$career->keyName        = $input['keyName'];
			$career->fullName       = $input['fullName'];
			$career->description    = $input['description'];
			$career->class_id       = $input['class_id'];
			$career->gmApprovalFlag = $input['gmApprovalFlag'];

			// Attempt to save the object
			$this->save($career);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $career->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getCareerdelete($careerId)
	{
		$this->skipView();

		$career = Career::find($careerId);
		$career->delete();

		return Redirect::to('/game/master/rules#careers');
	}
}