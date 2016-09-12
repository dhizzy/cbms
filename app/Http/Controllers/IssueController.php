<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Issue;
use Session;

class IssueController extends Controller
{
	/* add stuff here */
	public function allIssues(){
		$issues = DB::table('titles')
							->join('volumes', 'titles.id', '=', 'volumes.titleid')
							->join('issues', 'volumes.id', '=', 'issues.volid')
							->leftJoin('publishers', 'issues.publisherid', '=', 'publishers.id')
							->select('titles.name', 'titles.id', 'volumes.volume', 'issues.issue', 'publishers.name AS publisherName')
							->orderBy('volumes.volume', 'asc')
							->orderBy('issues.issue', 'asc')
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
							->orderBy('volumes.volume', 'asc')
							->orderBy('issues.issue', 'asc')
							->where('volumes.id', $volume)
							->get();

		return view('issues.issues', ['issues' => $issues]);
	}

	public function addNewIssue(){
		
		$titles = DB::table('titles')
					->select('titles.name', 'titles.id')
					->orderBy('titles.name')
					->get();
		
		return view('issues.addissue', ['titles' => $titles]);
	}

	public function create(Request $request){
		$issue = new Issue;
		$issue->volid = $request->volume;
		$issue->issue = $request->issue;
		if (isset($request->publisher)){
			$issue->publisherid = $request->publisher;			
		}
		$issue->save();
		return redirect()->route('addissue');
	}
}