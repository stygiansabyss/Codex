<?php

class Game_Master_Character_EntityController extends Game_Master_CharacterController {

	public function getAdd() {}

	public function postAdd()
	{
		$this->skipView();

		$input = e_array(Input::all());

		if ($input != null) {
			$entity              = new Entity;
			$entity->name        = $input['name'];
			$entity->color       = $input['color'];
			$entity->description = $input['description'];
			$entity->activeFlag  = isset($input['activeFlag']) ? 1 : 0;
			$entity->hiddenFlag  = isset($input['hiddenFlag']) ? 1 : 0;

			$this->checkErrorsSave($entity);

			$avatar = Input::file('avatar');

			// ppd($avatar);
			if ($avatar != null) {
				$mime = $avatar->getMimeType();
				$mime = explode('/', $mime);
				$extension = $mime[1];

				$imageName = Str::studly($entity->name) .'.'. $extension;

				$avatar->move('img/avatars/Entity', $imageName);

				// Convert to PNG
				$newImage = Image::make('img/avatars/Entity/'. $imageName);
				$newImage->save('img/avatars/Entity/'. Str::studly($entity->name) .'.jpg', 90);

				File::delete('img/avatars/Entity/'. $imageName);
			}
		}

		$this->redirect('/game/master', 'Entity created');
	}

	public function getEdit($entityId)
	{
		$entity = Entity::find($entityId);

		$this->setViewData('entity', $entity);
	}

	public function postEdit($entityId)
	{
		$this->skipView();

		$input = e_array(Input::all());

		if ($input != null) {
			$entity              = Entity::find($entityId);
			$entity->name        = $input['name'];
			$entity->color       = $input['color'];
			$entity->description = $input['description'];
			$entity->activeFlag  = isset($input['activeFlag']) ? 1 : 0;
			$entity->hiddenFlag  = isset($input['hiddenFlag']) ? 1 : 0;

			$this->checkErrorsSave($entity);

			$avatar = Input::file('avatar');

			// ppd($avatar);
			if ($avatar != null) {
				$mime = $avatar->getMimeType();
				$mime = explode('/', $mime);
				$extension = $mime[1];

				$imageName = Str::studly($entity->name) .'.'. $extension;

				$avatar->move('img/avatars/Entity', $imageName);

				// Convert to PNG
				$newImage = Image::make('img/avatars/Entity/'. $imageName);
				$newImage->save('img/avatars/Entity/'. Str::studly($entity->name) .'.jpg', 90);

				File::delete('img/avatars/Entity/'. $imageName);
			}
		}

		$this->redirect('/game/master', 'Entity updated');
	}

	public function getDelete($entityId)
	{
		$this->skipView();

		$entity = Entity::find($entityId);
		$entity->delete();

		$imageName = Str::studly($entity->name) .'.jpg';
		File::delete('img/avatars/Entity/'. $imageName);

		$this->redirect('/game/master', 'Entity deleted');
	}
}
