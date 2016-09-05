<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Volume;
use Session;

class VolumeController extends Controller
{
	public function getAllVolumes(){
    	$volumes = DB::table('volumes')->get();

		$titleVolumes = DB::table('titles')
							->join('volumes', 'titles.id', '=', 'volumes.titleid')
							->select('titles.name', 'titles.id', 'volumes.volume', 'volumes.id AS volid')
							->orderBy('titles.name', 'volumes.volume')
							->get();
    	return view("volumes.index", ['titleVolumes' => $titleVolumes]);
	}

    public function getSpecificVolumes($titleId, $titleName){
    	$volumes = DB::table('volumes')->get();

		$titleVolumes = DB::table('titles')
							->join('volumes', 'titles.id', '=', 'volumes.titleid')
							->select('titles.name', 'titles.id', 'volumes.volume', 'volumes.id AS volid')
							->orderBy('titles.name', 'volumes.volume')
							->where('titles.id', $titleId)
							->get();

    	return view("volumes.index", ['titleVolumes' => $titleVolumes, 'titleName' => $titleName, 'titleId' => $titleId]);
    }

    public function create(Request $request){
    	// var_dump($request);

    	$volume = new Volume;
    	$volume->titleid = $request->titleNumber;
    	$volume->volume = $request->number;
    	$volume->save();

    	return redirect()->route('volumes');
    }

    public function edit($volumeId){

		$titleVolumes = DB::table('titles')
							->join('volumes', 'titles.id', '=', 'volumes.titleid')
							->select('titles.name', 'titles.id', 'volumes.volume', 'volumes.id AS volid')
							->orderBy('titles.name', 'volumes.volume')
							->where('volumes.id', $volumeId)
							->get();


	    return view("volumes.editVolume", ['titleVolumes' => $titleVolumes]);
    }

    public function destroy(Request $request, $volumeId){
        $volume = Volume::findOrFail($volumeId);
        $volume->delete();

		return redirect()->route('volumes');
    }

    public function update(Request $request, $volid){
        $volume = Volume::findOrFail($volid);

        $volume->volume = $request->volumeNumber;

        $volume->save();

        Session::flash('flash_message', 'Volume successfully updated');
        
    	return redirect()->route('volumes');
    }
}
