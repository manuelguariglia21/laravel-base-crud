@extends('layouts.main')

@section('content')
<main>
  <h1>{{$comic->title}} - edit</h1>

  
  <form action="{{route('comics.update', $comic)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">

      {{-- title --}}
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{$comic->title}}">

      {{-- description --}}
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" placeholder="Enter description">{{$comic->description}}</textarea>

      {{-- thumb --}}
      <label for="thumb">Thumb</label>
      <input type="text" class="form-control" name="thumb" id="thumb" placeholder="Enter thumb's url" value="{{$comic->thumb}}">

      {{-- price --}}
      <label for="price">Price</label>
      <input type="number" class="form-control" name="price" id="price" placeholder="Enter price" value="{{$comic->price}}">

      {{-- series --}}
      <label for="series">Series</label>
      <input type="text" class="form-control" name="series" id="series" placeholder="Enter series" value="{{$comic->series}}">

      {{-- sale_date --}}
      <label for="sale_date">Sale Date</label>
      <input type="text" class="form-control" name="sale_date" id="sale_date" placeholder="Enter sale date" value="{{$comic->date}}">

      {{-- type --}}
      <label for="type">Type</label>
      <input type="text" class="form-control" name="type"  id="type" placeholder="Enter type" value="{{$comic->type}}">

      {{-- slug --}}
      <label for="slug">Slug</label>
      <input type="text" class="form-control" name="slug"  id="slug" placeholder="Enter slug" value="{{$comic->slug}}">


    </div>

    <button type="submit" class="btn btn-primary">Update</button>

  </form>
  
  
  <a href="{{route('comics.index')}}" type="button" class="btn btn-primary">Torna alla Lista</a>
</main>
@endsection