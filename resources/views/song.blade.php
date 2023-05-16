@extends('home')

@section('content')
<div class="dv-cnt">
    <x-forms.song-form action="newsong" :isupdate="false" :song="null" :singers="$singers" />
</div>
@endsection
