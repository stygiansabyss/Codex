<?php

class Base extends BaseModel {

	/********************************************************************
	 * Declarations
	 *******************************************************************/
	protected $table      = 'bases';
	protected $primaryKey = 'uniqueId';
	public $incrementing  = false;

	/********************************************************************
	 * Aware validation rules
	 *******************************************************************/
	public static $rules = array(
		'name'        => 'required',
		'keyName'     => 'required',
		'calculation' => 'required',
	);

	/********************************************************************
	 * Scopes
	 *******************************************************************/

	/********************************************************************
	 * Relationships
	 *******************************************************************/

	/********************************************************************
	 * Model Events
	 *******************************************************************/

	/********************************************************************
	 * Getter and Setter methods
	 *******************************************************************/

	/********************************************************************
	 * Extra Methods
	 *******************************************************************/
	/**
	* run each time the base is changed on all characters
	* run each time a characters stat is modified
	* save to a pivot table for the character
	* probably change to go through the string and find any stats first and replace with player stat value
	* possible calculation
	* -- AVERAGE(X,Y,Z)  = array_sum() / count()
	* -- ADDITION(X,Y,2) = array_sum()
	* -- DICE(X)         = rand(1, X)
	* -- MODIFIER(Model, Column)
	*/
	public function getCalculation($characterId = null)
	{
		$character = new stdClass();
		$character->STR = 2;
		$character->DEX = 10;
		$character->AG  = 5;

		$baseStat = $this->description;

		if (stripos($this->description, 'AVERAGE') !== false) {
			preg_match('/AVERAGE\((.*?)\)/', $this->description, $matches);

			if (isset($matches[1])) {
				$stats = explode(',', $matches[1]);

				foreach ($stats as $key => $stat) {
					$stats[$key] = $character->{$stat};
				}

				$average = round(array_sum($stats) / count($stats));

				pp($baseStat);
				$baseStat = str_replace($matches[0], $average, $baseStat);
				pp($matches);
				ppd($baseStat);
			}
		}

	}
}