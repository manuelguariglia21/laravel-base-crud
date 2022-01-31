@extends('layouts.main')

@section('content')
<main>
  <h1>{{$comic->title}}</h1>

  <div class="action-area">
    <div class="action-btn">
      <a href="{{route('comics.edit', $comic )}}" type="button" class="btn btn-success">Edit</a>
    </div>
    <div class="action-btn">
      <form action="{{ route('comics.destroy', $comic) }}" onsubmit="return confirm('sei sicuro di voler eliminare {{$comic->title}}')" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button></td>
      </form>
    </div>
  </div>
  
  <div class="show-box container">
    <div class="row">

      <div class="info-box col-6">
        <ul>
          <li><strong>Title: </strong> {{$comic->title}}</li>
          <li><strong>Description: </strong>{{$comic->description}}</li>
          <li><strong>Price: </strong>{{$comic->price}}</li>
          <li><strong>Series: </strong>{{$comic->series}}</li>
          <li><strong>Sale Date: </strong>{{$comic->sale_date}}</li>
          <li><strong>Type: </strong>{{$comic->type}}</li>
          <li><strong>Slug: </strong>{{$comic->slug}}</li>
        </ul>
      </div>

      <div class="image-box col-6">
        <img src="{{$comic->thumb}}" alt="{{$comic->title}}">
      </div>
    </div>
  </div>

  
  
  
  <a href="{{route('comics.index')}}" type="button" class="btn btn-primary">Torna alla Lista</a>
</main>
@endsection