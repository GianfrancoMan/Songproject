@extends('home')

@section('content')
<div class="dv-cnt">
        <form class="frm-cnt" method="POST" action="{{ route('newsong') }}">
            @csrf
            <div class="form-group dv-frm">
                <label for="title">{{__('Titolo')}}</label>
                <input
                    type="text"
                    class="form-control  @error('title') is-invalid @enderror"
                    id="title"
                    name="title"
                    placeholder="{{__('inserisci il titolo della canzone')}}"
                    value="{{ old('title')}}">
                @error('title')
                <div class="alert alert-danger" role="alert">
                    <label class="ctrl-hint">{{__('Il Titolo e Richiesto(max 100 caratteri)!')}}</label>
                </div>
                @enderror
            </div>
            <div class="form-group dv-frm">
                <label for="release_date">{{__('Data di uscita')}}</label>
                <input
                    id="'release_date"
                    type="date"
                    class="form-control  @error('release_date') is-invalid @enderror"
                    name="release_date">
                @error('release_date')
                <div class="alert alert-danger" role="alert">
                    <label class="ctrl-hint">{{__('La data di uscita è richiesta!')}}</label>
                </div>
                @enderror
            </div>
            <div class="form-group dv-frm">
                <label for="singer" class="form-label select-label">{{__('Scegli uno o più interpreti')}}<span class="ctrl-hint">{{__('(premi ctrl per selezionare più voci)')}}</span></label>
                <select class="form-select slct @error('singer') is-invalid @enderror" multiple  name="singer[]">
                    <option value="" hidden></option>
                    @foreach ($singers as $singer )
                    <option class="opt" value="{{$singer->id}}">{{$singer->name}}</option>
                    @endforeach
                </select>
                @error('singer')
                <div class="alert alert-danger" role="alert">
                    {{__('Seleziona almeno un cantante')}}
                </div>
                @enderror
            </div>
            <div class="form-group dv-frm">
                <button type="submit" class="btn btn-primary">{{__('Aggiungi canzone')}}</button>
            </div>
        </form>
</div>
@endsection
