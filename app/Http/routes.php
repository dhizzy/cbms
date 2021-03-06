<?php

Route::get('/', function(){
	echo "<a href = 'publishers'>Publishers</a>";
	echo "<br>";
	echo "<a href = 'titles'>Titles</a>";
	echo "<br>";
	echo "<a href = 'title/volumes'>Volume</a>";
	echo "<br>";
	echo "<a href = 'issues'>Issues</a>";
	echo "<br>";
	echo "<a href = 'addissue'>Add Issue</a>";
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
 * Delete Title
 */

Route::delete('titles/{id}', 'TitleController@destroy');

/**
 * Edit Title
 */

Route::get('title/update/{id}', 'TitleController@edit');

/**
 * Update Title
 */

Route::put('title/update/{id}/name/{name}', 'TitleController@update');


/**
 * Get Volume of selected Title
 */

Route::get('title/{titleId}/volumes/{titleName}', 'VolumeController@getSpecificVolumes');


/**
 * Get All Volumes
 */

Route::get('title/volumes', ['as' => 'volumes', 'uses' => 'VolumeController@getAllVolumes']);

/**
 * Add New Volume
 */

Route::post('volumes', 'VolumeController@create');

/**
 * Delete Volume
 */

Route::delete('volumes/{volumeId}', 'VolumeController@destroy');

/**
 * Edit Volume
 */

Route::get('volume/edit/{volumeId}', 'VolumeController@edit');

/**
 * Update Volume
 */

Route::put('volume/update/{volid}', 'VolumeController@update');


/**
 * List All Issues
 */

Route::get('issues', 'IssueController@allIssues');


/**
 * List Issues For Selected Volume
 */

Route::get('issues/{volume}', 'IssueController@findIssues');


/**
 * Add New Issues
 */

Route::post('issues', 'IssueController@create');

/**
 * Delete Issue
 */

//Route::destroy('issues', 'IssueController@destroy');

/**
 * Edit Issue
 */

//Route::edit('issues', 'IssueController@edit');

/**
 * Add Series/Volume/Issue
 */

Route::get('addissue', ['as'=>'addissue', 'uses'=>'IssueController@addNewIssue']);

/**
 * Ajax Request for volume
 */

Route::get('volume/{ issueid }', 'VolumeController@getVolumeForIssues');

Route::get('/addissue/getvolume', 'VolumeController@getvolume');

Route::get('/addissue/getissues', 'VolumeController@getissues');