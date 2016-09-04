<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Volume;
use Session;

class IssueController extends Controller
{
	/* add stuff here */
	public function allIssues(){
		$issues = DB::table('titles')
							->join('volumes', 'titles.id', '=', 'volumes.titleid')
							->join('issues', 'volumes.id', '=', 'issues.volid')
							->join('publishers', 'issues.publisherid', '=', 'publishers.id')
							->select('titles.name', 'titles.id', 'volumes.volume', 'issues.issue', 'publishers.name AS publisherName')
							->orderBy('volumes.volume', 'issues.issue')
							->get();

		return view('issues.issues', ['issues' => $issues]);
	}

	/* add stuff here */
	public function findIssues($volume){
		$issues = DB::table('titles')
							->join('volumes', 'titles.id', '=', 'volumes.titleid')
							->join('issues', 'volumes.id', '=', 'issues.volid')
							->join('publishers', 'issues.publisherid', '=', 'publishers.id')
							->select('titles.name', 'titles.id', 'volumes.volume', 'issues.issue', 'publishers.name AS publisherName')
							->orderBy('volumes.volume', 'issues.issue')
							->where('volumes.id', $volume)
							->get();

		return view('issues.issues', ['issues' => $issues]);
	}
}
