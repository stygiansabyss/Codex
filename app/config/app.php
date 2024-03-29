<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Application Games Enabled
	|--------------------------------------------------------------------------
	|
	| This flag is used to determine if the site uses games.  If it is set to true
	| any area allowing for game integration will look for it.  Otherwise, it will
	| skip them entirely.
	|
	*/
	'gameMode' => false,

	/*
	|--------------------------------------------------------------------------
	| Application Forum for News
	|--------------------------------------------------------------------------
	|
	| This flag is used to determine if the site uses the forum system to control
	| the front page.  If set to false, there will be no options to promote posts
	| to the front page.
	|
	*/
	'forumNews' => true,

	/*
	|--------------------------------------------------------------------------
	| Site Details
	|--------------------------------------------------------------------------
	|
	| The name of your site and the icon it should use.  This will show up in 
	| twitter menues.  Set the siteIcon to null for no icon.
	|
	*/

	'siteName' => 'Codex',
	'siteIcon' => null,

	/*
	|--------------------------------------------------------------------------
	| Github repo
	|--------------------------------------------------------------------------
	|
	| If your site uses a github repo, set it's name here. This will 
	| allow the application to give it priority in certain areas
	| over other repos that may be shown.
	|
	*/

	'primaryRepo' => 'Codex',

	/*
	|--------------------------------------------------------------------------
	| All github repos
	|--------------------------------------------------------------------------
	|
	| The full list of repo names you want displayed in the site.
	|
	*/

	'allRepos' => array(
			'Codex' => 'Codex',
			'stygianvault' => 'StygianVault',
			'AHScoreboard' => 'AH Scoreboard',
			'dev-toolbox' => 'Dev-Toolbox',
			'core' => 'Core',
			'LaravelBase' => 'Laravel Base',
	),

	/*
	|--------------------------------------------------------------------------
	| Application Menu
	|--------------------------------------------------------------------------
	|
	| This variable is used to determine if the site uses the default twitter nav
	| bar or any form of custom menu.  Set this value to the name of the blade
	| located in views/layouts/menus that you wish to use.
	| Options: twitter, utopian
	|
	*/
	'menu' => 'utopian',

	/*
	|--------------------------------------------------------------------------
	| Application Maintenance Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in maintenance mode, only those ips listed in the
	| allowed access list will be able to see the site. The access list is located
	| in the filters.php file.
	|
	*/
	'devmode' => false,

	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => true,

	/*
	|--------------------------------------------------------------------------
	| Application URL
	|--------------------------------------------------------------------------
	|
	| This URL is used by the console to properly generate URLs when using
	| the Artisan command line tool. You should set this to the root of
	| your application so that it is used when running Artisan tasks.
	|
	*/

	'url' => 'http://localhost',

	/*
	|--------------------------------------------------------------------------
	| Application Timezone
	|--------------------------------------------------------------------------
	|
	| Here you may specify the default timezone for your application, which
	| will be used by the PHP date and date-time functions. We have gone
	| ahead and set this to a sensible default for you out of the box.
	|
	*/

	'timezone' => 'America/Chicago',

	/*
	|--------------------------------------------------------------------------
	| Application Locale Configuration
	|--------------------------------------------------------------------------
	|
	| The application locale determines the default locale that will be used
	| by the translation service provider. You are free to set this value
	| to any of the locales which will be supported by the application.
	|
	*/

	'locale' => 'en',

	/*
	|--------------------------------------------------------------------------
	| Encryption Key
	|--------------------------------------------------------------------------
	|
	| This key is used by the Illuminate encrypter service and should be set
	| to a random, 32 character string, otherwise these encrypted strings
	| will not be safe. Please do this before deploying an application!
	|
	*/

	'key' => 'r6HpeaF1F3iZAkMCAOle62rZTyclp72Q',

	/*
	|--------------------------------------------------------------------------
	| Autoloaded Service Providers
	|--------------------------------------------------------------------------
	|
	| The service providers listed here will be automatically loaded on the
	| request to your application. Feel free to add your own services to
	| this array to grant expanded functionality to your applications.
	|
	*/

	'providers' => array(

		'Illuminate\Foundation\Providers\ArtisanServiceProvider',
		'Illuminate\Auth\AuthServiceProvider',
		'Illuminate\Cache\CacheServiceProvider',
		'Illuminate\Foundation\Providers\CommandCreatorServiceProvider',
		'Illuminate\Session\CommandsServiceProvider',
		'Illuminate\Foundation\Providers\ComposerServiceProvider',
		'Illuminate\Routing\ControllerServiceProvider',
		'Illuminate\Cookie\CookieServiceProvider',
		'Illuminate\Database\DatabaseServiceProvider',
		'Illuminate\Encryption\EncryptionServiceProvider',
		'Illuminate\Filesystem\FilesystemServiceProvider',
		'Illuminate\Hashing\HashServiceProvider',
		'Illuminate\Html\HtmlServiceProvider',
		'Illuminate\Foundation\Providers\KeyGeneratorServiceProvider',
		'Illuminate\Log\LogServiceProvider',
		'Illuminate\Mail\MailServiceProvider',
		'Illuminate\Foundation\Providers\MaintenanceServiceProvider',
		'Illuminate\Database\MigrationServiceProvider',
		'Illuminate\Foundation\Providers\OptimizeServiceProvider',
		'Illuminate\Pagination\PaginationServiceProvider',
		'Illuminate\Foundation\Providers\PublisherServiceProvider',
		'Illuminate\Queue\QueueServiceProvider',
		'Illuminate\Redis\RedisServiceProvider',
		'Illuminate\Auth\Reminders\ReminderServiceProvider',
		'Illuminate\Foundation\Providers\RouteListServiceProvider',
		'Illuminate\Database\SeedServiceProvider',
		'Illuminate\Foundation\Providers\ServerServiceProvider',
		'Illuminate\Session\SessionServiceProvider',
		'Illuminate\Foundation\Providers\TinkerServiceProvider',
		'Illuminate\Translation\TranslationServiceProvider',
		'Illuminate\Validation\ValidationServiceProvider',
		'Illuminate\View\ViewServiceProvider',
		'Illuminate\Workbench\WorkbenchServiceProvider',
		'Way\Generators\GeneratorsServiceProvider',
		'Juy\Profiler\Providers\ProfilerServiceProvider',
		'Intervention\Image\ImageServiceProvider',
		'Core\View\ViewServiceProvider',
	),

	/*
	|--------------------------------------------------------------------------
	| Service Provider Manifest
	|--------------------------------------------------------------------------
	|
	| The service provider manifest is used by Laravel to lazy load service
	| providers which are not needed for each request, as well to keep a
	| list of all of the services. Here, you may set its storage spot.
	|
	*/

	'manifest' => storage_path().'/meta',

	/*
	|--------------------------------------------------------------------------
	| Class Aliases
	|--------------------------------------------------------------------------
	|
	| This array of class aliases will be registered when this application
	| is started. However, feel free to register as many as you wish as
	| the aliases are "lazy" loaded so they don't hinder performance.
	|
	*/

	'aliases' => array(

		'App'                         => 'Illuminate\Support\Facades\App',
		'Artisan'                     => 'Illuminate\Support\Facades\Artisan',
		'Auth'                        => 'Illuminate\Support\Facades\Auth',
		'Blade'                       => 'Illuminate\Support\Facades\Blade',
		'Cache'                       => 'Illuminate\Support\Facades\Cache',
		'ClassLoader'                 => 'Illuminate\Support\ClassLoader',
		'Config'                      => 'Illuminate\Support\Facades\Config',
		'Controller'                  => 'Illuminate\Routing\Controllers\Controller',
		'Cookie'                      => 'Illuminate\Support\Facades\Cookie',
		'Crypt'                       => 'Illuminate\Support\Facades\Crypt',
		'DB'                          => 'Illuminate\Support\Facades\DB',
		'Eloquent'                    => 'Illuminate\Database\Eloquent\Model',
		'Event'                       => 'Illuminate\Support\Facades\Event',
		'File'                        => 'Illuminate\Support\Facades\File',
		'Form'                        => 'Illuminate\Support\Facades\Form',
		'Hash'                        => 'Illuminate\Support\Facades\Hash',
		'Input'                       => 'Illuminate\Support\Facades\Input',
		'Lang'                        => 'Illuminate\Support\Facades\Lang',
		'Log'                         => 'Illuminate\Support\Facades\Log',
		'Mail'                        => 'Illuminate\Support\Facades\Mail',
		'Paginator'                   => 'Illuminate\Support\Facades\Paginator',
		'Password'                    => 'Illuminate\Support\Facades\Password',
		'Queue'                       => 'Illuminate\Support\Facades\Queue',
		'Redirect'                    => 'Illuminate\Support\Facades\Redirect',
		'Redis'                       => 'Illuminate\Support\Facades\Redis',
		'Request'                     => 'Illuminate\Support\Facades\Request',
		'Response'                    => 'Illuminate\Support\Facades\Response',
		'Route'                       => 'Illuminate\Support\Facades\Route',
		'Schema'                      => 'Illuminate\Support\Facades\Schema',
		'Seeder'                      => 'Illuminate\Database\Seeder',
		'Session'                     => 'Illuminate\Support\Facades\Session',
		'Str'                         => 'Illuminate\Support\Str',
		'URL'                         => 'Illuminate\Support\Facades\URL',
		'View'                        => 'Core\View\ViewFacade',
		'SocketIOClient'              => 'ElephantIO\Client',
		'Image'                       => 'Intervention\Image\Facades\Image',
		'Github'                      => 'Github\Client',
		'Chat'                        => 'Core\Chat',
		'Forum'                       => 'Core\Forum',
		'Message'                     => 'Core\Message',
		'Chat_Room'                   => 'Core\Chat_Room',
		'Forum_Board'                 => 'Core\Forum_Board',
		'Forum_Board_Type'            => 'Core\Forum_Board_Type',
		'Forum_Category_Type'         => 'Core\Forum_Category_Type',
		'Forum_Moderation'            => 'Core\Forum_Moderation',
		'Forum_Moderation_Log'        => 'Core\Forum_Moderation_Log',
		'Forum_Moderation_Reply'      => 'Core\Forum_Moderation_Reply',
		'Forum_Post_Edit'             => 'Core\Forum_Post_Edit',
		'Forum_Post_Status'           => 'Core\Forum_Post_Status',
		'Forum_Post_Type'             => 'Core\Forum_Post_Type',
		'Forum_Post_View'             => 'Core\Forum_Post_View',
		'Forum_Reply'                 => 'Core\Forum_Reply',
		'Forum_Reply_Edit'            => 'Core\Forum_Reply_Edit',
		'Forum_Reply_Roll'            => 'Core\Forum_Reply_Roll',
		'Forum_Reply_Type'            => 'Core\Forum_Reply_Type',
		'Forum_Support_Status'        => 'Core\Forum_Support_Status',
		'Message_Folder'              => 'Core\Message_Folder',
		'Message_Folder_Message'      => 'Core\Message_Folder_Message',
		'Message_Type'                => 'Core\Message_Type',
		'Message_User_Delete'         => 'Core\Message_User_Delete',
		'Message_User_Read'           => 'Core\Message_User_Read',
		'User_Preference'             => 'Core\User_Preference',
		'User_Preference_User'        => 'Core\User_Preference_User',
		'User_Permission_Action'      => 'Core\User_Permission_Action',
		'User_Permission_Action_Role' => 'Core\User_Permission_Action_Role',
		'User_Permission_Role'        => 'Core\User_Permission_Role',
		'User_Permission_Role_User'   => 'Core\User_Permission_Role_User',
		'Seed'                        => 'Core\Seed',
		'Migration'                   => 'Core\Migration',
	),

);
