@extends('home')

@section('content')
<div class="dv-cnt">
    @if(!$result)
    <x-forms.singer-form :action="$action" :name="$name" :birthdate="$birthdate" />
    @else
        <div>{{__('Cantante registrato con sucesso')}}</div>
    @endif
</div>
@endsection

