@extends('home')

@section('content')
<div class="dv-cnt">
    @if(!$result)
        <form class="frm-cnt" method="post" action="{{ route('newsinger') }}">
            @csrf
            <div class="form-group dv-frm">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name"  placeholder="inserisci il nome">
            </div>
            <div class="form-group dv-frm">
            <label for="brthdate">Data di nascita</label>
            <input type="date" class=""form-control" name="birthdate" value="">
            </div>
            <div class="form-group dv-frm">
                <label for="gender">Gender</label>
                <select class="form-select" name="gender">
                    <option value="male" selected>Male</option>
                    <option value="female">Female</option>
                    <option value="fluid">fluid</option>
                </select>
            </div>
            <div class="form-group dv-frm">
                <button type="submit" class="btn btn-primary">Aggiungi Cantante</button>
            </div>
        </form>
    @else
        <div>Cantante registrato con sucesso</div>
    @endif
</div>
@endsection

