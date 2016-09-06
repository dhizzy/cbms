<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Publisher;
use Session;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = DB::table('publishers')
                        ->orderBy('publishers.name', 'asc')
                        ->get();

        return view("publishers.publishers", ['publishers' => $publishers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $publisher = new Publisher;

        $publisher->name = $request->name;

        $publisher->save();

        Session::flash('flash_message', 'Publisher successfully created');
        
        return redirect()->route('publishers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);
        return view("publishers.editPublisher", ['publisher' => $publisher]);
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
        
        $newPublisherName = $request->name;

        $publisher = Publisher::findOrFail($id);

        $publisher->name = $newPublisherName;

        $publisher->save();

        Session::flash('flash_message', 'Publisher successfully updated');
        
        return redirect()->route('publishers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publisher = Publisher::findOrFail($id);

        $publisher->delete();

        Session::flash('flash_message', 'Publisher successfully deleted');
        
        return redirect()->route('publishers');
    }
}