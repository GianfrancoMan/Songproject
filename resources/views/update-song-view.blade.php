@extends('home')

@section('content')
<div class="dv-cnt">
        <form class="frm-cnt" method="post" action="{{route('storeupdate', $song->id) }}">
            @csrf
            <div class="form-group dv-frm">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title"  value="{{$song->title}}">
            @error('title')
            <div class="alert alert-danger" role="alert">
                <label class="ctrl-hint">Il Titol e Richiesto(max 100 caratteri)!</label>
              </div>
            @enderror
            </div>
            <div class="form-group dv-frm">
            <label for="release_date">Data di uscita</label>
            <input type="date" class=""form-control" name="release_date" value="{{ $song->release }}">
            @error('release_date')
            <div class="alert alert-danger" role="alert">
                <label class="ctrl-hint">La data di uscita è richiesta!</label>
              </div>
            @enderror
            </div>
            <div class="form-group dv-frm">
                <label for="singer" class="form-label select-label">Aggiungi un cantante</label>
                <select class="form-select slct" multiple name="singer[]">
                    @foreach ($singers as $singer)
                     <option class="opt" value="{{$singer->id}}">{{$singer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group dv-frm">
                <button type="submit" class="btn btn-primary">Modifica Canzone</button>
            </div>
        </form>
</div>
@endsection
