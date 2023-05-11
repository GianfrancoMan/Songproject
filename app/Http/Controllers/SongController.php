<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use App\Models\SingerSong;
use App\Models\Song;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
            'singer' => 'required',
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

        $message = $countSingers == true ? __("L'operazione è andata a buon fine") : __("L'operazione non è andata a buon fine") . __(": SELEZIONA ALMENO UN CANTANTE");

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

    /*
     * Show the form for editing the specified resource.
     *
     */
    public function edit(int $id) {

        $song = new Song();
        $song = $song->find($id);
        $singer = new Singer();
        $singers = $singer->all();
        $relatedSingers = $song->singers()->get();
        $indexes = [];

        for($i=0; $i < count($singers); $i ++) {
            for($y=0; $y<count($relatedSingers); $y++) {
                if($singers[$i]->id === $relatedSingers[$y]->id ) {
                    $indexes[] = $singers[$i]->id;
                }
            }
        }
        //dd($indexes);
        for($i = 0; $i < count($indexes); $i ++) {
         $singers = $singers->where('id', '!==', $indexes[$i]);
        }
        //dd($filteredCollection);

        return view('update-song-view', ['song' => $song, 'singers' => $singers]);
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

    public function storeupdate(int $id, Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'release_date' => 'required',
          ]);

        $song =new Song();
        $song = $song->find($id);
        $song->title = $request->title;
        $song->release = $request->release_date;
        $result = $song->save();

        $singers_id = $request->singer ?? null;
        if($singers_id != null && count($singers_id) > 0) {

            $singer_song = [];

            $singer_song['song_id'] = $song->id;
            for($i=0; $i < count($singers_id); $i ++) {
                $singer_song['singer_id'] = $singers_id[$i];
                $result = SingerSong::create($singer_song);
            }
        }

        $message = $result == true ?  __("L'operazione è andata a buon fine") :  __("L'operazione non è andata a buon fine") ;

        return view('view-result')->with('message', $message);

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

    /*
    * Delete song by id
    */
    public function delete(int $id) {
        $song = new Song();
        $song = $song->find($id);
        $result = $song->delete();

        $message = $result == true ?  __("L'operazione è andata a buon fine") : __("L'operazione non è andata a buon fine");

        return view('view-result')->with('message', $message);
    }

}
