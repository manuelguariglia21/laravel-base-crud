@extends('layouts.main')

@section('content')
<main>
  {{-- delete message --}}
  @if (session('deleted'))
    <div class="alert alert-success" role="alert">
      {{session('deleted')}}
    </div>
  @endif

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
        <td>
          <a href="{{route('comics.show', $comic )}}" type="button" class="btn btn-primary">Show</a>
          <a href="{{route('comics.edit', $comic )}}" type="button" class="btn btn-success">Edit</a>
          <form action="{{ route('comics.destroy', $comic) }}" onsubmit="return confirm('sei sicuro di voler eliminare {{$comic->title}}')" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">DELETE</button></td>
          </form>
        </td>
      </tr>
          
      @endforeach
      
    </tbody>
  </table>
  {{$comicList->links()}}
</main>
@endsection