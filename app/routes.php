<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('logout', function()
{
    Auth::logout();
    return Redirect::to('/')->with('message', 'You have successfully logged out.');
});

// Non-Secure routes
Route::group(array(), function()
{
	Route::controller('scoreboard', 'ScoreboardController');
});

// Secure routes
Route::group(array('before' => 'auth'), function()
{
    Route::get('dashboard', 'HomeController@getDashboard');
});
Route::group(array('before' => 'auth|permission:FORUM_ADMIN'), function()
{
    // Route::controller('forum-admin'          , 'ForumAdminController');
    // Route::controller('forum-admin/modify'   , 'ForumAdminModifyController');
});

// Landing page
Route::controller('/', 'HomeController');

if (!Auth::guest()) {
    // Auth::user()->updateLastActive();
}
require_once('start/local.php');