@extends('home')

@section('content')
<div class="dv-cnt">
    <div class="frm-cnt dv-frm">
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Cerca le canzoni di...
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach ($singers as $singer )
                    <li> <a href="{{route('showsingersongs', $singer->id)}}">{{$singer->name}}</a></li>
                @endforeach
            </ul>
        </div>

        @if($displaySongs)
        <div class="wht">
            @for ($i = 0; $i < count($songs); $i ++)
                <div class="flx">
                    <div class="frm-cnt dv-frm">
                        <ul class="list-group">
                            <li class="list-group-item">Titlo: <span>{{$songs[$i]->title}}</span></li>
                        </ul>
                    </div>
                    <div class="frm-cnt dv-frm">
                        <ul class="list-group">
                            <li class="list-group-item">Data di uscita: <span>{{$songs[$i]->release}}</span></li>
                        </ul>
                    </div>
                </div>
            @endfor
        </div>
        @endif
    </div>
</div>
@endsection
