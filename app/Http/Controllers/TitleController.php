<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Title;
use Session;

class TitleController extends Controller
{
    public function index(){
    	$titles = DB::table('titles')
                ->orderBy('titles.name', 'asc')
                ->get();

    	return view("titles.index", ['titles' => $titles]);
    }


	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function create(Request $request){
        $title = new Title;

        $title->name = $request->name;

        $title->save();

        Session::flash('flash_message', 'Title successfully created');
        
        return redirect()->route('titles');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = Title::findOrFail($id);
        return view("titles.editTitle", ['title' => $title]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        
        $newTitleName = $request->name;

        $title = Title::findOrFail($id);

        $title->name = $newTitleName;

        $title->save();

        Session::flash('flash_message', 'Title successfully edited');
        
        return redirect()->route('titles');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = Title::findOrFail($id);

        $title->delete();

        Session::flash('flash_message', 'Title successfully deleted');
        
        return redirect()->route('titles');
    }
}