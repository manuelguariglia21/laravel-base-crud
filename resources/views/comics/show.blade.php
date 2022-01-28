@extends('layouts.main')

@section('content')
<main>
  <h1>{{$comic->title}}</h1>

  
  
  
  <a href="{{route('comics.index')}}" type="button" class="btn btn-primary">Torna alla Lista</a>
</main>
@endsection