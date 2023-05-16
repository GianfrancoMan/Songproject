@extends('home')

@section('content')
<div class="dv-cnt">
    <x-forms.song-form action="storeupdate" :isupdate="true" :song="$song" :singers="$singers" />
</div>
@endsection
