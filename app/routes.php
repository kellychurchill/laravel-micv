<?php
// Show pages.
Route::get('/', 'HomeController@index');
Route::get('view/{id}', 'HomeController@view');

// Resources
Route::resource('policy_holders', 'PolicyHolderController');