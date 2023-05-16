<form class="frm-cnt" method="POST" action="@if(!$isupdate){{route($action)}}@else{{route($action, $song->id)}} @endif ">
    @csrf
    <div class="form-group dv-frm">
        <label for="title">{{__('Titolo')}}</label>
        <input
            type="text"
            class="form-control  @error('title') is-invalid @enderror"
            id="title"
            name="title"
            @if(!$isupdate)
                placeholder="{{__('inserisci il titolo della canzone')}}"
                value="{{ old('title')}}"
            @else
                value="{{$song->title}}"
            @endif
        >
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
            name="release_date"
            @if(!$isupdate)
                value="{{ old('release_date')}}"
            @else
                value="{{$song->release}}"
            @endif
        >
        @error('release_date')
        <div class="alert alert-danger" role="alert">
            <label class="ctrl-hint">{{__('La data di uscita è richiesta!')}}</label>
        </div>
        @enderror
    </div>
    <div class="form-group dv-frm">
        <label for="singer" class="form-label select-label">{{__('Scegli uno o più interpreti')}}<span class="ctrl-hint">{{__('(premi ctrl per selezionare più voci)')}}</span></label>
        <select class="form-select slct @if(!$isupdate)@error('singer') is-invalid @enderror @endif" multiple  name="singer[]">
            <option value="" hidden></option>
            @foreach ($singers as $singer )
            <option class="opt" value="{{$singer->id}}">{{$singer->name}}</option>
            @endforeach
        </select>
        @if(!$isupdate)
            @error('singer')
            <div class="alert alert-danger" role="alert">
                {{__('Seleziona almeno un cantante')}}
            </div>
            @enderror
        @endif
    </div>
    <div class="form-group dv-frm">
        @if(!$isupdate)
            <button type="submit" class="btn btn-primary">{{__('Aggiungi canzone')}}</button>
        @else
        <button type="submit" class="btn btn-primary">{{__('Modifica canzone')}}</button>
        @endif
    </div>
</form>
