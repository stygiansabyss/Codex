<?php

class Forum_PostController extends Core_Forum_PostController {

	public function getAdd($boardId = null)
	{
		// Make sure they can access this
		$this->checkPermission('FORUM_POST');

		// Get the information
		$board      = Forum_Board::where('uniqueId', $boardId)->first();
		$types      = $this->arrayToSelect(Forum_Post_Type::orderByNameAsc()->get(), 'id', 'name', 'Select Post Type');

		// Set the template
		$this->setViewData('types', $types);
		$this->setViewData('board', $board);

		// Handle game details
		// $characters = Character::where('user_id', $this->activeUser->id)->orderByNameAsc()->get();

		if ($this->hasPermission('POST_ENTITY')) {
			$entities = Entity::orderByNameAsc()->get();
		}

		$postAsArray = array(0 => $this->activeUser->username);

		// if ($characters->count() > 0) {
		// 	foreach ($characters as $character) {
		// 		$postAsArray['Character::'. $character->id] = $character->name;
		// 	}
		// }

		if (isset($entities) && $entities->count() > 0) {
			foreach ($entities as $entity) {
				$postAsArray['Entity::'. $entity->id] = $entity->name .' (Entity)';
			}
		}

		$this->setViewData('postAsArray', $postAsArray);
	}

	public function postAdd($boardId)
	{
		// Handle any form data
		$input = e_array(Input::all());

		if ($input != null) {
			$board   = Forum_Board::where('uniqueId', $boardId)->first();
			$message = e($input['content']);

			$post                      = new Forum_Post;
			$post->forum_board_id      = $board->id;
			$post->forum_post_type_id  = (isset($input['forum_post_type_id']) && $input['forum_post_type_id'] != 0 ? $input['forum_post_type_id'] : null);
			$post->user_id             = $this->activeUser->id;
			// $post->morph_id            = (isset($input['character_id']) && strlen($input['character_id']) == 10 ? $input['character_id'] : null);
			$post->name                = $input['name'];
			$post->keyName             = Str::slug($input['name']);
			$post->content             = $message;
			$post->moderatorLockedFlag = 0;
			$post->approvedFlag        = 0;
			$post->modified_at         = date('Y-m-d H:i:s');

			if ($input['morph'] != '0') {
				$morphParts = explode('::', $input['morph']);

				$post->morph_id   = $morphParts[1];
				$post->morph_type = $morphParts[0];
			}

			$this->checkErrorsSave($post);

			// Set status if a support post
			if ($post->board->category->forum_category_type_id == Forum_Category::TYPE_SUPPORT) {
				$post->setStatus(Forum_Support_Status::TYPE_OPEN);
			}

			// Set this user as already having viewed the post
			$post->userViewed($this->activeUser->id);

			return $this->redirect('forum/post/view/'. $post->id, $post->name.' has been submitted.');
		}
	}

}