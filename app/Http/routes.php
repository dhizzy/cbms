<?php

Route::get('/', function(){
	echo "<a href = 'publishers'>Publishers</a>";
	echo "<br>";
	echo "<a href = 'titles'>Series</a>";
	echo "<br>";
	echo "<a href = 'volume'>Volume</a>";
	echo "<br>";
	echo "<a href = 'issues'>Issues</a>";
	echo "<br>";
});

/**
 * List All Publishers
 */

Route::get('publishers', ['as'=> 'publishers', 'uses' => 'PublisherController@index']);

/**
 * Add New Publisher
 */

Route::post('publishers', 'PublisherController@create');

/**
 * Delete Publisher
 */

Route::delete('publishers/{id}', 'PublisherController@destroy');

/**
 * Edit Publisher
 */

Route::get('publisher/update/{id}', 'PublisherController@edit');

/**
 * Update Publisher
 */

Route::put('publisher/update/{id}/name/{name}', 'PublisherController@update');

/**
 * List All Titles
 */

// Route::get('titles', 'TitleController@index');

Route::get('titles', ['as' => 'titles', 'uses' => 'TitleController@index']);

/**
 * Create New Title
 */

Route::post('titles', 'TitleController@create');

/**
 * Delete Series
 */

Route::delete('titles/{id}', 'TitleController@destroy');

/**
 * Edit Series
 */

Route::get('title/update/{id}', 'TitleController@edit');

/**
 * Update Publisher
 */

Route::put('title/update/{id}/name/{name}', 'TitleController@update');

/**
 * List All Volumes
 */

//Route::get('volumes', 'VolumeController@index');

/**
 * Add New Volume
 */

//Route::post('volumes', 'VolumeController@create');

/**
 * Delete Volume
 */

//Route::destroy('volumes', 'VolumeController@destroy');

/**
 * Edit Volume
 */

//Route::edit('volumes', 'VolumeController@edit');



/**
 * List All Issues
 */

//Route::get('issues', 'IssuesController@index');

/**
 * Add New Issues
 */

//Route::post('issues', 'IssuesController@create');

/**
 * Delete Issue
 */

//Route::destroy('issues', 'IssueController@destroy');

/**
 * Edit Issue
 */

//Route::edit('issues', 'IssueController@edit');

