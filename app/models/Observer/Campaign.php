<?php

class Observer_Campaign {
	public function deleting($model)
	{
		if ($model->gms->count() > 0) {
			foreach ($model->gms as $gm) {
				$gm->delete();
			}
		}
		if ($model->characters->count() > 0) {
			foreach ($model->characters as $character) {
				$character->delete();
			}
		}
		if ($model->forumCategory != null) {
			$model->forumCategory->delete();
		}
	}
}