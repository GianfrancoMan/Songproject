@extends('home')

@section('content')
<div class="dv-cnt">
        <form class="frm-cnt" method="post" action="{{route('storeupdate', $song->id) }}">
            @csrf
            <div class="form-group dv-frm">
            <label for="title">{{__('Titolo')}}</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title"  value="{{$song->title}}">
            @error('title')
            <div class="alert alert-danger" role="alert">
                <label class="ctrl-hint">{{__('Il Titolo e Richiesto(max 100 caratteri)!')}}</label>
              </div>
            @enderror
            </div>
            <div class="form-group dv-frm">
            <label for="release_date">{{__('Data di uscita')}}</label>
            <input type="date" class="form-control  @error('release_date') is-invalid @enderror" name="release_date" value="{{ $song->release }}">
            @error('release_date')
            <div class="alert alert-danger" role="alert">
                <label class="ctrl-hint">{{__('La data di uscita è richiesta!')}}</label>
              </div>
            @enderror
            </div>
            <div class="form-group dv-frm">
                <label for="singer" class="form-label select-label">{{__('Aggiungi un cantante')}}</label>
                <select class="form-select slct" multiple name="singer[]">
                    @foreach ($singers as $singer)
                     <option class="opt" value="{{$singer->id}}">{{$singer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group dv-frm">
                <button type="submit" class="btn btn-primary">{{__('Modifica canzone')}}</button>
            </div>
        </form>
</div>
@endsection
