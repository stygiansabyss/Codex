<?php

class Forum_Post extends Core\Forum_Post
{
	/********************************************************************
	 * Declarations
	 *******************************************************************/

	/********************************************************************
	 * Aware validation rules
	 *******************************************************************/

	/********************************************************************
	 * Relationships
	 *******************************************************************/

    /**
     * Character Relationship
     *
     * @return Character
     */
	public function character()
	{
		return $this->morphTo()->morph;
	}

	/********************************************************************
	 * Model events
	 *******************************************************************/

	/********************************************************************
	 * Getter and Setter methods
	 *******************************************************************/

	/********************************************************************
	 * Extra Methods
	 *******************************************************************/

}