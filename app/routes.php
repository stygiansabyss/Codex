<?php

// Let them logout
Route::get('logout', function()
{
	Auth::logout();
	return Redirect::to('/')->with('message', 'You have successfully logged out.');
});

// Non-Secure routes
Route::controller('api' , 'Core_ApiVersionOneController');

// Secure routes
/********************************************************************
 * General
 *******************************************************************/
Route::group(array('before' => 'auth'), function()
{
	Route::controller('user'	, 'Core_UserController');
	Route::controller('messages', 'Core_MessageController');
	Route::controller('chat'	, 'Core_ChatController');
	Route::controller('github'	, 'Core_GithubController');

	Route::controller('characters/create'	, 'Character_CreateController');
	Route::controller('characters'			, 'CharacterController');
});

/********************************************************************
 * Access to game Master
 *******************************************************************/
Route::group(array('before' => 'auth|permission:GAME_MASTER'), function()
{
	// Rules
	Route::controller('game/master/rules',				'Game_Master_RulesController');
	Route::controller('game/master/skills',				'Game_Master_SkillController');
	Route::controller('game/master/spells',				'Game_Master_SpellController');
	Route::controller('game/master/races',				'Game_Master_RaceController');

	// Campaigns
	Route::controller('game/master/campaign',			'Game_Master_CampaignController');

	// Characters
	Route::controller('game/master/character/entity',	'Game_Master_Character_EntityController');
	Route::controller('game/master/character',			'Game_Master_CharacterController');

	// Root
	Route::controller('game/master',					'Game_MasterController');
});

/********************************************************************
 * Access to forum moderation
 *******************************************************************/
Route::group(array('before' => 'auth|permission:FORUM_MOD'), function()
{
	Route::controller('forum/moderation', 'Core_Forum_ModerationController');
});

/********************************************************************
 * Access to forum administration
 *******************************************************************/
Route::group(array('before' => 'auth|permission:FORUM_ADMIN'), function()
{
	Route::controller('forum/admin', 'Core_Forum_AdminController');
});

/********************************************************************
 * Access to the forums
 *******************************************************************/
Route::group(array('before' => 'auth|permission:FORUM_ACCESS'), function()
{
	Route::controller('forum/post'		, 'Forum_PostController');
	Route::controller('forum/board'		, 'Core_Forum_BoardController');
	Route::controller('forum/category'	, 'Core_Forum_CategoryController');
	Route::controller('forum'			, 'Core_ForumController');
});

/********************************************************************
 * Access to the dev panel
 *******************************************************************/
Route::group(array('before' => 'auth|permission:SITE_ADMIN'), function()
{
	Route::controller('admin', 'Core_AdminController');
});

// Landing page
Route::controller('/', 'HomeController');

require_once('start/local.php');