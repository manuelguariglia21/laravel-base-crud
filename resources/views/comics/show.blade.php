@extends('layouts.main')

@section('content')
<main>
  <h1>{{$comic->title}}</h1>


  <a href="{{route('comics.index')}}">Torna alla Lista</a>
</main>
@endsection