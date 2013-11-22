<?php

class Game_Master_SkillController extends Game_Master_RulesController {

	public function getSkillLists()
	{
		$skillLists = Skill_List::orderByNameAsc()->get();

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Skill Lists')
				 ->setSortProperty('name')
				 ->setDeleteLink('/game/master/rules/skilllistdelete/')
				 ->setDeleteProperty('id')
				 ->setResources($skillLists);

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

	public function postSkillLists()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// Get the object
			$skillList              = (isset($input['id']) && $input['id'] != null ? Skill_List::find($input['id']) : new Skill_List);
			$skillList->name        = $input['name'];
			$skillList->keyName     = $input['keyName'];
			$skillList->description = $input['description'];

			// Attempt to save the object
			$this->save($skillList);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $skillList->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getSkilllistdelete($skillListId)
	{
		$this->skipView();

		$skillList = Skill_List::find($skillListId);
		$skillList->delete();

		return Redirect::to('/game/master/rules#skill-lists');
	}

	public function getSkillListPercentiles()
	{
		$skillListPercentiles = Skill_List_Percentile::orderBy('skill_list_id', 'asc')->orderBy('percentageStart', 'asc')->paginate(20);

		$skillLists     = Skill_List::orderByNameAsc()->get();
		$skillListArray = $this->arrayToSelect($skillLists, 'id', 'name', false);

		$skills    = Skill::orderByNameAsc()->get();
		$abilities = Ability::orderByNameAsc()->get();

		$skillArray = array(0 => 'Select a Skill/Ability');

		foreach ($skills as $skill) {
			$skillArray['Skill::'. $skill->id] = $skill->name .' (Skill)';
		}
		foreach ($abilities as $ability) {
			$skillArray['Ability::'. $ability->id] = $ability->name .' (Ability)';
		}

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Skill List Percentiles')
				 ->setSortProperty('percentageStart')
				 ->setDeleteLink('/game/master/rules/skilllistpercentiledelete/')
				 ->setDeleteProperty('id')
				 ->setPaginationFlag(true)
				 ->setResources($skillListPercentiles);

		// Add the display columns
		$settings->addDisplayField('skill_List_Name')
				 ->addDisplayField('type')
				 ->addDisplayField('name')
				 ->addDisplayField('percent_range');

		// Add the form fields
		$settings->addFormField('skill_list_id', 'select', $skillListArray)
				 ->addFormField('morph_display_id', 'select', $skillArray)
				 ->addFormField('percentageStart', 'text')
				 ->addFormField('percentageEnd', 'text')
				 ->addFormField('trainTime', 'text');

		$this->setViewPath('core.helpers.crud');
		$this->setViewData('settings', $settings);
	}

	public function postSkillListPercentiles()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// ppd($input);
			// Get the object
			$skillList                  = (isset($input['id']) && $input['id'] != null ? Skill_List_Percentile::find($input['id']) : new Skill_List_Percentile);
			$skillList->skill_list_id   = $input['skill_list_id'];
			$skillList->percentageStart = $input['percentageStart'];
			$skillList->percentageEnd   = $input['percentageEnd'];
			$skillList->trainTime       = $input['trainTime'];

			if ($input['morph_id'] != '0') {
				$morphParts = explode('::', $input['morph_id']);

				$skillList->morph_id = $morphParts[1];
				$skillList->morph_type = $morphParts[0];
			}

			// Attempt to save the object
			$this->save($skillList);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $skillList->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getSkilllistpercentiledelete($skillListId)
	{
		$this->skipView();

		$skillList = Skill_List_Percentile::find($skillListId);
		$skillList->delete();

		return Redirect::to('/game/master/rules#skill-list-percentiles');
	}

	public function getSkills()
	{
		$skills = Skill::orderByNameAsc()->paginate(20);
		$bases  = Base::orderByNameAsc()->get();
		$skillLists = Skill_List::orderByNameAsc()->get();

		$baseArray = $this->arrayToSelect($bases, 'id', 'name', 'Select a base');
		$listArray = $this->arrayToSelect($skillLists, 'id', 'name', 'Select a skill list');

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Skills')
				 ->setSortProperty('name')
				 ->setDeleteLink('/game/master/rules/statdelete/')
				 ->setDeleteProperty('id')
				 ->setPaginationFlag(true)
				 ->setResources($skills);

		// Add the display columns
		$settings->addDisplayField('name')
				 ->addDisplayField('skill_list_name')
				 ->addDisplayField('base_name');

		// Add the form fields
		$settings->addFormField('name', 'text')
				 ->addFormField('keyName', 'text')
				 ->addFormField('fullName', 'text')
				 ->addFormField('base_id', 'select', $baseArray)
				 ->addFormField('skill_list_id', 'select', $listArray)
				 ->addFormField('description', 'textarea');

		$this->setViewPath('core.helpers.crud');
		$this->setViewData('settings', $settings);
	}

	public function postSkills()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// Get the object
			$skill                  = (isset($input['id']) && $input['id'] != null ? Skill::find($input['id']) : new Skill);
			$skill->name            = $input['name'];
			$skill->keyName         = $input['keyName'];
			$skill->fullName        = $input['fullName'];
			$skill->description     = $input['description'];
			$skill->base_id         = (isset($input['base_id']) && strlen($input['base_id']) == 10 ? $input['base_id'] : null);
			$skill->skill_list_id   = (isset($input['skill_list_id']) && strlen($input['skill_list_id']) == 10 ? $input['skill_list_id'] : null);

			// Attempt to save the object
			$this->save($skill);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $skill->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getSkilldelete($skillId)
	{
		$this->skipView();

		$skill = Skill::find($skillId);
		$skill->delete();

		return Redirect::to('/game/master/rules#skills');
	}

	public function getAbilities()
	{
		$abilities = Ability::orderByNameAsc()->paginate(20);
		$skillLists = Skill_List::orderByNameAsc()->get();

		$listArray = $this->arrayToSelect($skillLists, 'id', 'name', 'Select a skill list');

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Abilities')
				 ->setSortProperty('name')
				 ->setDeleteLink('/game/master/rules/abilitydelete/')
				 ->setDeleteProperty('id')
				 ->setPaginationFlag(true)
				 ->setResources($abilities);

		// Add the display columns
		$settings->addDisplayField('name')
				 ->addDisplayField('skill_list_name');

		// Add the form fields
		$settings->addFormField('name', 'text')
				 ->addFormField('keyName', 'text')
				 ->addFormField('fullName', 'text')
				 ->addFormField('skill_list_id', 'select', $listArray)
				 ->addFormField('description', 'textarea');

		$this->setViewPath('core.helpers.crud');
		$this->setViewData('settings', $settings);
	}

	public function postAbilities()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// Get the object
			$ability                  = (isset($input['id']) && $input['id'] != null ? Ability::find($input['id']) : new Ability);
			$ability->name            = $input['name'];
			$ability->keyName         = $input['keyName'];
			$ability->fullName        = $input['fullName'];
			$ability->description     = $input['description'];
			$ability->skill_list_id   = (isset($input['skill_list_id']) && strlen($input['skill_list_id']) == 10 ? $input['skill_list_id'] : null);

			// Attempt to save the object
			$this->save($ability);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $ability->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getAbilitydelete($abilityId)
	{
		$this->skipView();

		$ability = Ability::find($abilityId);
		$ability->delete();

		return Redirect::to('/game/master/rules#abilities');
	}
}