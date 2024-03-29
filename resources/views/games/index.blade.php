@extends('layouts.main')

@section('css')
<link href="{{ asset('./css/index.css') }}" rel="stylesheet">
@endsection

@section('javascript')
<script src="{{ asset('js/index.js') }}"></script>
@endsection

@section('lateJavascript')
@endsection


@section('content')

  <div class="wrapper">
    @foreach($games as $game)


        <div class="innerDiv">
          <a href="{{route('gameDetail', [$game->id, $game->slug])}}">
          <div class="totalImg"><div class="gameName">
            {{$game->name}}
          </div>
            <div>
                <img src="{{asset(glob('images/games/main/'.$game->id.'.*')[0])}}" alt="image of {{$game->name}}" class="banner">
            </div>
            <div class="underImage">
            </div>
          </div></a>
          <div class="tagWrapper">
            @foreach($game->tags()->get() as $tag)
            <div class="tag">
              {{$tag->name}}
            </div>
            @endforeach
          </div>
        </div>

    @endforeach
  </div>
@endsection
