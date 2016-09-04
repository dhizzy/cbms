<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Volume;
use Session;

class VolumeController extends Controller
{
        public function index(){
    	$volumes = DB::table('volumes')->get();

		$titleVolumes = DB::table('titles')
							->join('volumes', 'titles.id', '=', 'volumes.titleid')
							->select('titles.name', 'titles.id', 'volumes.volume')
							->orderBy('titles.name', 'volumes.volume')
							->get();
    	// var_dump($titleVolumes);
    	return view("volumes.index", ['titleVolumes' => $titleVolumes]);
    }
}
