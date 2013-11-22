<?php
 
class BaseModel extends Core_BaseModel {
 
    /********************************************************************
     * Core
     *******************************************************************/
    const ROLE_DEVELOPER   = 2;
    const ROLE_GUEST       = 3;
    const ROLE_FORUM_ADMIN = 5;
    const ROLE_SITE_ADMIN  = 1;

	/********************************************************************
	 * Getter and Setter methods
	 *******************************************************************/

	public function getImageAttribute()
	{
		$class = get_called_class();

		$image     = 'img/avatars/'. $class .'/'. Str::studly($this->name) .'.jpg';
		$imagePath = public_path() .'/'. $image;

		if (File::exists($imagePath)) {
			return $image;
		} else {
			return '/img/no_user.png';
		}
	}
}