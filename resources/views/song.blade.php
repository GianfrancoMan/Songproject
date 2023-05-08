@extends('home')

@section('content')
<div class="dv-cnt">
        <form class="frm-cnt" method="POST" action="{{ route('newsong') }}">
            @csrf
            <div class="form-group dv-frm">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title"  placeholder="inserisci il titolo della canzone">
            @error('title')
            <div class="alert alert-danger" role="alert">
                <label class="ctrl-hint">Il Titol e Richiesto(max 100 caratteri)!</label>
              </div>
            @enderror
            </div>
            <div class="form-group dv-frm">
            <label for="release_date">Data di uscita</label>
            <input type="date" class=""form-control" name="release_date" value="">
            @error('release_date')
            <div class="alert alert-danger" role="alert">
                <label class="ctrl-hint">La data di uscita è richiesta!</label>
              </div>
            @enderror
            </div>
            <div class="form-group dv-frm">
                <label for="singer" class="form-label select-label">Scegli uno o più interpreti<span class="ctrl-hint">(premi ctrl per selezionare più voci)</span></label>
                <select class="form-select slct" multiple  name="singer[]">
                    @foreach ($singers as $singer )
                    <option class="opt" value="{{$singer->id}}">{{$singer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group dv-frm">
                <button type="submit" class="btn btn-primary">Aggiungi Canzone</button>
            </div>
        </form>
</div>
@endsection
