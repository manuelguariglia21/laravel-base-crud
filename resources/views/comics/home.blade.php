@extends('layouts.main')

@section('content')
<main>
  <h1>Gestione Fumetti</h1>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Series</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($comicList as $comic)

      <tr>
        <th scope="row">{{$comic->id}}</th>
        <td>{{$comic->title}}</td>
        <td>{{$comic->series}}</td>
        <td>{{$comic->price}}</td>
        <td>XXX</td>
      </tr>
          
      @endforeach
      
    </tbody>
  </table>
  {{$comicList->links()}}
</main>
@endsection