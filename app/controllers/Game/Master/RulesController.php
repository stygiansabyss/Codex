<?php

class Game_Master_RulesController extends BaseController {

	// Needed for sub-controllers
	public function getIndex($baseId = null)
	{
		if ($baseId != null) {
			$base = Base::find($baseId);
			$base->getCalculation();
		}
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
				 ->addDisplayField('keyName')
				 ->addDisplayField('description');

		// Add the form fields
		$settings->addFormField('name', 'text')
				 ->addFormField('keyName', 'text')
				 ->addFormField('fullName', 'text')
				 ->addFormField('description', 'textarea')
				 ->addFormField('calculation', 'select', array(0 => 'Select a calculation type', 'average' => 'Average', 'addition' => 'Addition'))
				 ->addFormField('value', 'text');

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
			$base->value       = $input['value'];

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
}