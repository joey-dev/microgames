@extends('layouts.main')

@section('css')
<link href="{{ asset('./css/detail.css') }}" rel="stylesheet">
@endsection

@section('javascript')
<script src="{{ asset('./js/detail.js') }}"></script>
<script>
function setDirLink()
{
  var link = "{{route('gamePlay', [$id, $name])}}";
  window.open(link, '_blank');
}
</script>
@endsection

@section('lateJavascript')
@endsection


@section('content')
    <div class="playBox">
      <button class="btn btnPrimary" onclick="setDirLink()">Play!</button>
    </div>
    @foreach($pages as $page)

        @if ($page->kind == 'title')
            <div class="titleBox">{{$page->what}}</div>
        @elseif ($page->kind == 'text')
            <div class="textBox">{{$page->what}}</div>
        @elseif ($page->kind == 'file')
            <div class="imgBox"><img class="img" src="{{asset('images/games/page/'.$page->what)}}"></div>
            <div class="underBox"></div>
        @endif

    @endforeach

@endsection
