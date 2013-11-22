<?php

class Game_Master_SpellController extends Game_Master_RulesController {

	public function getSpellClasses()
	{
		$spellClasses = Spell_Class::orderByNameAsc()->get();

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Spell Classes')
				 ->setSortProperty('name')
				 ->setDeleteLink('/game/master/rules/spellclassdelete/')
				 ->setDeleteProperty('id')
				 ->setResources($spellClasses);

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

	public function postSpellClasses()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// Get the object
			$spellClass                 = (isset($input['id']) && $input['id'] != null ? Spell_Class::find($input['id']) : new Spell_Class);
			$spellClass->name           = $input['name'];
			$spellClass->keyName        = $input['keyName'];
			$spellClass->description    = $input['description'];

			// Attempt to save the object
			$this->save($spellClass);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $spellClass->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getSpellclassdelete($spellClassId)
	{
		$this->skipView();

		$spellClass = Spell_Class::find($spellClassId);
		$spellClass->delete();

		return Redirect::to('/game/master/rules#spell-classs');
	}

	public function getSpells($spellClassId)
	{
		$spells = Spell::with('spellClass')->where('spell_class_id', $spellClassId)->orderByNameAsc()->paginate(20);
		$classes = new Utility_Collection();
		$classes->add(Spell_Class::find($spellClassId));

		$classArray = $this->arrayToSelect($classes, 'id', 'name', false);

		// Set up the one page crud
		$settings = new Utility_Crud();
		$settings->setTitle('Spells')
				 ->setSortProperty('className')
				 ->setDeleteLink('/game/master/rules/spelldelete/')
				 ->setDeleteProperty('id')
				 ->setPaginationFlag(true)
				 ->setResources($spells);

		// Add the display columns
		$settings->addDisplayField('name')
				 ->addDisplayField('class_name')
				 ->addDisplayField('difficultyLevel')
				 ->addDisplayField('lost_spell');

		// Add the form fields
		$settings->addFormField('name', 'text')
				 ->addFormField('keyName', 'text')
				 ->addFormField('spell_class_id', 'select', $classArray)
				 ->addFormField('difficultyLevel', 'text')
				 ->addFormField('masteryLevel', 'text')
				 ->addFormField('lostSpellFlag', 'select', array('Normal Spell', 'Lost Spell'))
				 ->addFormField('description', 'textarea');

		$this->setViewPath('core.helpers.crud');
		$this->setViewData('settings', $settings);
	}

	public function postSpells()
	{
		$this->skipView();

		// Set the input data
		$input = e_array(Input::all());

		if ($input != null) {
			// Get the object
			$spellClass                 = (isset($input['id']) && $input['id'] != null ? Spell_Class::find($input['id']) : new Spell_Class);
			$spellClass->name           = $input['name'];
			$spellClass->keyName        = $input['keyName'];
			$spellClass->description    = $input['description'];

			// Attempt to save the object
			$this->save($spellClass);

			// Handle errors
			if ($this->errorCount() > 0) {
				$this->ajaxResponse->addErrors($this->getErrors());
			} else {
				$this->ajaxResponse->setStatus('success')->addData('resource', $spellClass->toArray());
			}

			// Send the response
			return $this->ajaxResponse->sendResponse();
		}
	}

	public function getSpelldelete($spellClassId)
	{
		$this->skipView();

		$spellClass = Spell_Class::find($spellClassId);
		$spellClass->delete();

		return Redirect::to('/game/master/rules#spell-classs');
	}
}