@extends('home')

@section('content')
<div class="dv-cnt">
    <div class="frm-cnt dv-frm">
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                {{__('Cerca le canzoni di')}}...
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach ($singers as $singer )
                    <li> <a class="singer-lst" href="{{route('showsingersongs', $singer->id)}}">{{$singer->name}} -- {{$singer->birthdate}} -- {{$singer->gender}}</a></li>
                @endforeach
            </ul>
        </div>

        @if($displaySongs)
        <div class="wht">
            @if( count($songs) > 0)
            @for ($i = 0; $i < count($songs); $i ++)
                <div class="flx">
                    <div class="frm-cnt dv-frm">
                        <ul class="list-group">
                            <li class="list-group-item">{{__('Titolo')}}: <span>{{$songs[$i]->title}}</span></li>
                        </ul>
                    </div>
                    <div class="frm-cnt dv-frm">
                        <ul class="list-group">
                            <li class="list-group-item">{{__('Data di uscita')}}: <span>{{$songs[$i]->release}}</span></li>
                        </ul>
                    </div>
                    <div class="frm-cnt dv-frm">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{route('updatesong', $songs[$i]->id)}}" class="btn btn-secondary">{{__('modifica')}}</a></li>
                        </ul>
                    </div>
                    <div class="frm-cnt dv-frm">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{route('deletesong', $songs[$i]->id)}}" class="btn btn-secondary">{{__('elimina')}}</a></li>
                        </ul>
                    </div>
                </div>
            @endfor
            @else
            <div class="flx">
                <div class="frm-cnt">
                    <label class="list-group-item">{{__('Nessuna canzone per questo interprete')}}</label>
                </div>
            </div>
            @endif
        </div>
        @endif
    </div>
</div>
@endsection
