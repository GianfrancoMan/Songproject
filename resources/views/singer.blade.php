@extends('home')

@section('content')
<div class="dv-cnt">
    @if(!$result)
        <form class="frm-cnt" method="post" action="{{ route('newsinger') }}">
            @csrf
            <div class="form-group dv-frm">
            <label for="name">{{__('Nome')}}</label>
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                name="name"
                placeholder="{{__('inserisci il nome')}}"
                value="{{ old('name') }}"">
                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{__('Il nome è richiesto')}}
                </div>
                @enderror
            </div>
            <div class="form-group dv-frm">
                <label for="brthdate">{{__('Data di nascita')}}</label>
                <input
                    type="date"
                    class="form-control  @error('birthdate') is-invalid @enderror"
                    name="birthdate"
                    id="birthdate"
                    value="{{ old('birthdate')}}">
                @error('birthdate')
                <div class="alert alert-danger" role="alert">
                    {{__('La data di nascita è richiesta')}}
                </div>
                @enderror
            </div>
            <div class="form-group dv-frm">
                <label for="gender">{{__('Gender')}}</label>
                <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                    <option value="" selected></option>
                    <option value="male">{{__('Uomo')}}</option>
                    <option value="female">{{__('Donna')}}</option>
                    <option value="fluid">{{__('Altro')}}</option>
                </select>
                @error('gender')
                <div class="alert alert-danger" role="alert">
                    {{__('Il genere è richiesto')}}
                </div>
                @enderror
            </div>
            <div class="form-group dv-frm">
                <button type="submit" class="btn btn-primary">{{__('Aggiungi cantante')}}</button>
            </div>
        </form>
    @else
        <div>{{__('Cantante registrato con sucesso')}}</div>
    @endif
</div>
@endsection

