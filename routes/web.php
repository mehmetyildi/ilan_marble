<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();



Route::group(['prefix' => LaravelLocalization::setLocale()], function(){
	Route::prefix(config('app.cms_path'))->middleware('auth')->as('cms.')->namespace('Cms')->group(function(){
		Route::name('search')->get('/search', 'SearchController@search');
		Route::name('home')->get('/home', 'HomeController@index');
		Route::name('search')->get('/search', 'SearchController@search');
        Route::name('change-settings')->post('/settings', 'UserProfileController@changeSettings');
        Route::name('change-profile-photo.index')->get('/change-profile-photo', 'UserProfileController@changeProfilePhoto');
        Route::name('change-profile-photo.store')->post('/change-profile-photo', 'UserProfileController@storeProfilePhoto');

        Route::name('tasks.index')->get('/tasks', 'TasksController@index');
        Route::name('tasks.store')->post('/tasks', 'TasksController@store');
        Route::name('tasks.update')->post('/tasks/update', 'TasksController@update');
        Route::name('tasks.fetch')->get('/tasks/fetch', 'TasksController@fetch');
        Route::name('tasks.order')->post('/tasks/order', 'TasksController@order');
        Route::name('tasks.orderCompleted')->post('/tasks/orderCompleted', 'TasksController@orderCompleted');

		Route::prefix('abouts')->as('abouts.')->namespace('Abouts')->group(function(){
			Route::name('index')->get('/', 'AboutsController@index');
			Route::name('edit')->get('/{record}/edit', 'AboutsController@edit');
			Route::name('delete')->delete('/{record}', 'AboutsController@delete');
			Route::name('store')->post('/store', 'AboutsController@store');
			Route::name('update')->put('/{record}', 'AboutsController@update');
			Route::name('delete-file')->delete('/{record}/delete-file', 'AboutsController@deleteFile');
		});

		Route::prefix('banners')->as('banners.')->namespace('Banners')->group(function(){
			Route::name('index')->get('/', 'BannersController@index');
			Route::name('create')->get('/create', 'BannersController@create');
			Route::name('edit')->get('/{record}/edit', 'BannersController@edit');
			Route::name('delete')->delete('/{record}', 'BannersController@delete');
			Route::name('store')->post('/store', 'BannersController@store');
			Route::name('update')->put('/{record}', 'BannersController@update');
			Route::name('delete-file')->delete('/{record}/delete-file', 'BannersController@deleteFile');
			Route::name('sort')->get('/sort', 'BannersController@sort');
			Route::name('sort-records')->post('/sort-records', 'BannersController@sortRecords');
		});

		Route::prefix('events')->as('events.')->namespace('Events')->group(function(){
			Route::name('index')->get('/', 'EventsController@index');
			Route::name('create')->get('/create', 'EventsController@create');
			Route::name('edit')->get('/{record}/edit', 'EventsController@edit');
			Route::name('delete')->delete('/{record}', 'EventsController@delete');
			Route::name('store')->post('/store', 'EventsController@store');
			Route::name('update')->put('/{record}', 'EventsController@update');
			Route::name('delete-file')->delete('/{record}/delete-file', 'EventsController@deleteFile');
			Route::name('sort')->get('/sort', 'EventsController@sort');
			Route::name('sort-records')->post('/sort-records', 'EventsController@sortRecords');
		});

		Route::prefix('locations')->as('locations.')->namespace('Locations')->group(function(){
			Route::name('index')->get('/', 'LocationsController@index');
			Route::name('create')->get('/create', 'LocationsController@create');
			Route::name('edit')->get('/{record}/edit', 'LocationsController@edit');
			Route::name('delete')->delete('/{record}', 'LocationsController@delete');
			Route::name('store')->post('/store', 'LocationsController@store');
			Route::name('update')->put('/{record}', 'LocationsController@update');
			Route::name('delete-file')->delete('/{record}/delete-file', 'LocationsController@deleteFile');
			Route::name('sort')->get('/sort', 'LocationsController@sort');
			Route::name('sort-records')->post('/sort-records', 'LocationsController@sortRecords');
		});

		Route::prefix('mags')->as('mags.')->namespace('Mags')->group(function(){
			Route::name('index')->get('/', 'MagsController@index');
			Route::name('create')->get('/create', 'MagsController@create');
			Route::name('edit')->get('/{record}/edit', 'MagsController@edit');
			Route::name('delete')->delete('/{record}', 'MagsController@delete');
			Route::name('store')->post('/store', 'MagsController@store');
			Route::name('update')->put('/{record}', 'MagsController@update');
			Route::name('delete-file')->delete('/{record}/delete-file', 'MagsController@deleteFile');
			Route::name('sort')->get('/sort', 'MagsController@sort');
			Route::name('sort-records')->post('/sort-records', 'MagsController@sortRecords');
		});

		Route::prefix('marbles')->as('marbles.')->namespace('Marbles')->group(function(){
			Route::name('index')->get('/', 'MarblesController@index');
			Route::name('create')->get('/create', 'MarblesController@create');
			Route::name('edit')->get('/{record}/edit', 'MarblesController@edit');
			Route::name('delete')->delete('/{record}', 'MarblesController@delete');
			Route::name('store')->post('/store', 'MarblesController@store');
			Route::name('update')->put('/{record}', 'MarblesController@update');
			Route::name('delete-file')->delete('/{record}/delete-file', 'MarblesController@deleteFile');
			Route::name('sort')->get('/sort', 'MarblesController@sort');
			Route::name('sort-records')->post('/sort-records', 'MarblesController@sortRecords');
		});

		Route::prefix('projects')->as('projects.')->namespace('Projects')->group(function(){
			Route::name('index')->get('/', 'ProjectsController@index');
			Route::name('create')->get('/create', 'ProjectsController@create');
			Route::name('edit')->get('/{record}/edit', 'ProjectsController@edit');
			Route::name('delete')->delete('/{record}', 'ProjectsController@delete');
			Route::name('store')->post('/store', 'ProjectsController@store');
			Route::name('update')->put('/{record}', 'ProjectsController@update');
			Route::name('delete-file')->delete('/{record}/delete-file', 'ProjectsController@deleteFile');
			Route::name('sort')->get('/sort', 'ProjectsController@sort');
			Route::name('sort-records')->post('/sort-records', 'ProjectsController@sortRecords');
		});

		Route::prefix('quarries')->as('quarries.')->namespace('Quarries')->group(function(){
			Route::name('index')->get('/', 'QuarriesController@index');
			Route::name('create')->get('/create', 'QuarriesController@create');
			Route::name('edit')->get('/{record}/edit', 'QuarriesController@edit');
			Route::name('delete')->delete('/{record}', 'QuarriesController@delete');
			Route::name('store')->post('/store', 'QuarriesController@store');
			Route::name('update')->put('/{record}', 'QuarriesController@update');
			Route::name('delete-file')->delete('/{record}/delete-file', 'QuarriesController@deleteFile');
			Route::name('sort')->get('/sort', 'QuarriesController@sort');
			Route::name('sort-records')->post('/sort-records', 'QuarriesController@sortRecords');
		});

		Route::prefix('qimages')->as('qimages.')->namespace('Qimages')->group(function(){
			Route::name('index')->get('/', 'QimagesController@index');
			Route::name('create')->get('/create', 'QimagesController@create');
			Route::name('edit')->get('/{record}/edit', 'QimagesController@edit');
			Route::name('delete')->delete('/{record}', 'QimagesController@delete');
			Route::name('store')->post('/store', 'QimagesController@store');
			Route::name('update')->put('/{record}', 'QimagesController@update');
			Route::name('delete-file')->delete('/{record}/delete-file', 'QimagesController@deleteFile');
			Route::name('sort')->get('/sort', 'QimagesController@sort');
			Route::name('sort-records')->post('/sort-records', 'QimagesController@sortRecords');
		});

		Route::prefix('user-management')->as('user-management.')->namespace('UserManagement')->group(function(){
			Route::name('roles.index')->get('/roles', 'RolesController@index');
			Route::name('roles.store')->post('/roles', 'RolesController@store');
			Route::name('roles.create')->get('/roles/create', 'RolesController@create');
			Route::name('roles.edit')->get('/roles/{role}/edit', 'RolesController@edit');
			Route::name('roles.update')->put('/roles/{role}', 'RolesController@update');
			Route::name('roles.delete')->delete('/roles/{role}', 'RolesController@delete');

			Route::name('permissions.index')->get('/permissions', 'PermissionsController@index');
			Route::name('permissions.create')->get('/permissions/create', 'PermissionsController@create');
			Route::name('permissions.store')->post('/permissions', 'PermissionsController@store');
			Route::name('permissions.edit')->get('/permissions/{permission}/edit', 'PermissionsController@edit');
			Route::name('permissions.update')->put('/permissions/{permission}', 'PermissionsController@update');
			Route::name('permissions.delete')->delete('/permissions/{permission}', 'PermissionsController@delete');

			Route::name('users.index')->get('/users', 'UsersController@index');
			Route::name('users.store')->post('/users', 'UsersController@store');
			Route::name('users.create')->get('/users/create', 'UsersController@create');
			Route::name('users.edit')->get('/users/{user}/edit', 'UsersController@edit');
			Route::name('users.update')->put('/users/{user}', 'UsersController@update');
			Route::name('users.delete')->delete('/users/{invitee}', 'UsersController@delete');
			Route::name('users.ban')->put('/users/{user}/ban', 'UsersController@ban');
			Route::name('users.reactivate')->put('/users/{user}/reactivate', 'UsersController@reactivate');
		});

		Route::prefix('inbox')->as('inbox.')->namespace('Inbox')->group(function(){
			Route::name('index')->get('/', 'InboxController@index');
			Route::name('sent')->get('/sent', 'InboxController@sent');
			Route::name('trash')->get('/trash', 'InboxController@trash');
			Route::name('important')->get('/important', 'InboxController@important');
			Route::name('drafts')->get('/drafts', 'InboxController@drafts');
			Route::name('form')->get('/form/{form}', 'InboxController@form');
			Route::name('category')->get('/category/{category}', 'InboxController@category');
			Route::name('detail')->get('/{mail}/detail', 'InboxController@detail');
			Route::name('edit')->get('/{mail}/edit', 'InboxController@edit');
			Route::name('reply')->get('/{mail}/reply', 'InboxController@reply');
			Route::name('compose')->get('/compose', 'InboxController@compose');
			Route::name('search')->get('/search', 'InboxController@search');

			Route::name('send')->post('/send', 'InboxController@send');
			Route::name('save-draft')->post('/save-draft', 'InboxController@saveDraft');
			Route::name('update')->post('/{mail}/update', 'InboxController@update');
			Route::name('delete')->put('/delete', 'InboxController@delete');
			Route::name('discard')->delete('/discard', 'InboxController@discard');
			Route::name('mark-as-important')->post('/mark-as-important', 'InboxController@markAsImportant');
			Route::name('mark-as-read')->post('/mark-as-read', 'InboxController@markAsRead');
			Route::name('mark-as-trash')->post('/mark-as-trash', 'InboxController@markAsTrash');
			Route::name('move-to-trash')->post('/{mail}/move-to-trash', 'InboxController@moveToTrash');
		});
		Route::prefix('popups')->as('popups.')->namespace('Popups')->group(function(){
			Route::name('index')->get('/', 'PopupsController@index');
			Route::name('store')->post('/', 'PopupsController@store');
			Route::name('create')->get('/create', 'PopupsController@create');
			Route::name('sort')->get('/sort', 'PopupsController@sort');
			Route::name('sort-records')->post('/sort-records', 'PopupsController@sortRecords');
			Route::name('edit')->get('/{record}/edit', 'PopupsController@edit');
			Route::name('update')->put('/{record}', 'PopupsController@update');
			Route::name('delete')->delete('/{record}', 'PopupsController@delete');
			Route::name('delete-file')->delete('/{record}/delete-file', 'PopupsController@deleteFile');
			Route::name('toggle-promotion')->post('/toggle-promotion', 'PopupsController@togglePromotion');
		});

	});
});

Html::macro('clever_link', function($route) {	
	if( strpos(Request::path(), $route) !== false ) {
		$active = "class = 'active'";
	}
	else {
		$active = "";
	}
  return  $active ;
});

Html::macro('clever_link_dd', function($route) { 
  if( strpos(Request::path(), $route) !== false ) {
    $active = "active";
  }
  else {
    $active = "";
  }
  return '<li class="dropdown  '. $active . '">';
});


Html::macro('clever_link_cms', function($route) {    
    if( strpos(Request::path(), $route) !== false ) {
        $active = "active";
    }
    else {
        $active = "";
    }
 
  return '<li class="'.$active.'">';
});
Route::post('/send', array('as' => 'emails.template', 'uses' => 'EmailController@send'));
Route::group(['prefix' => LaravelLocalization::setLocale()], function(){
	Route::group(['middleware' => ['web']], function (){
		Route::name('home')->get('/', 'HomeController@index');
		Route::name('mags')->get('/mags', 'HomeController@mags');
		Route::name('events')->get('/events', 'HomeController@events');
		Route::name('eventDetail')->get('/events/detail/{event}', 'HomeController@eventDetail');
		Route::name('eventMag')->get('/eventMag', 'HomeController@eventMag');
		Route::name('quarries')->get('/quarries', 'HomeController@quarries');
		Route::name('geology')->get('/geology', 'HomeController@geology');
		Route::name('licences')->get('/licences', 'HomeController@licences');
		Route::name('marbles')->get('/marbles', 'HomeController@marbles');
		Route::name('marbleDetail')->get('/marbles/detail/{marble}', 'HomeController@marbleDetail');
		Route::name('mooncream')->get('/mooncream', 'HomeController@mooncream');
		Route::name('papillion')->get('/papillion', 'HomeController@papillion');
	    Route::name('contact')->get('/contact', 'HomeController@contact');
		Route::name('projects')->get('/projects', 'HomeController@projects');
		Route::name('ilbak')->get('/ilbak', 'HomeController@ilbak');
		Route::name('ilanmarble')->get('/ilanmarble', 'HomeController@ilanmarble');
		Route::name('visionmission')->get('/visionmission', 'HomeController@visionmission');
		Route::name('news')->get('/news', 'HomeController@news');
		Route::name('newsdetail')->get('/newsdetail', 'HomeController@newsdetail');
	});

});





