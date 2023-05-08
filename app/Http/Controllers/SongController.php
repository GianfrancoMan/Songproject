<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use App\Models\SingerSong;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
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
    public function create() {
        $singers = Singer::orderBy('name', 'ASC')->get();
        return view('song', ['singers' => $singers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'release_date' => 'required',
          ]);

        $singers_id = $request->singer;
        if($countSingers = $singers_id != null && count($singers_id) > 0) {
            $song= [];
            $song['title'] = $request->title;
            $song['release'] = $request->release_date;
            $song =Song::create($song);

            $singer_song = [];



            $singer_song['song_id'] = $song->id;
            for($i=0; $i < count($singers_id); $i ++) {
                $singer_song['singer_id'] = $singers_id[$i];
                $result = SingerSong::create($singer_song);
            }
        }

        $message = $countSingers == true ? 'L\'operazione è andata a buon fine' : 'L\'operazione non è andata a buon fine: SELEZIONA ALMENO UN CANTANTE';

        return view('view-result')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        //
    }

}
