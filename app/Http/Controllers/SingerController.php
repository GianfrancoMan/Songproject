<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result=false;
        $action = 'newsinger';
        $name = '';
        $birthdate = '';
        return view('singer', compact('result', 'action', 'name', 'birthdate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:100',
            'birthdate' => 'required',
            'gender' => 'required'
        ]);

        $newSinger = new Singer();
        $newSinger->name = $request->name;
        $newSinger->birthdate = $request->birthdate;
        $newSinger->gender = $request->gender;
        $result = $newSinger->save();

        $message = $result === true ? __("L'operazione è andata a buon fine") : __("L'operazione non è andata a buon fine");

        return view('view-result')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function show(Singer $singer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function edit(Singer $singer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Singer $singer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Singer $singer)
    {
        //
    }

    public function displayViewSingerData() {
        $singers = Singer::orderBy('name', 'ASC')->get();
        return view('view-singer-data', ['singers' => $singers, 'displaySongs' => false]);
    }

    public function showSingerSongs(int $id) {
        $singers = Singer::orderBy('name', 'ASC')->get();
        $singer = Singer::find($id);
        $songs = $singer->songs;
        return view('view-singer-data', ['songs' => $songs, 'displaySongs' => true, 'singers' => $singers]);
    }

}
