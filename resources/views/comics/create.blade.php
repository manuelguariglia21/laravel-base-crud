@extends('layouts.main')

@section('content')
<main>
  
  {{-- errors messages --}}
  @if ($errors->any())
    <div class="alert alert-warning" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    
  @endif
  <h1>New Comic</h1>

  
  <form action="{{route('comics.store')}}" method="POST">
    @csrf
    <div class="form-group">

      {{-- title --}}
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">

      {{-- description --}}
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" placeholder="Enter description"></textarea>

      {{-- thumb --}}
      <label for="thumb">Thumb</label>
      <input type="text" class="form-control" name="thumb" id="thumb" placeholder="Enter thumb's url">

      {{-- price --}}
      <label for="price">Price</label>
      <input type="number" class="form-control" name="price" id="price" placeholder="Enter price">

      {{-- series --}}
      <label for="series">Series</label>
      <input type="text" class="form-control" name="series" id="series" placeholder="Enter series">

      {{-- sale_date --}}
      <label for="sale_date">Sale Date</label>
      <input type="text" class="form-control" name="sale_date" id="sale_date" placeholder="Enter sale date">

      {{-- type --}}
      <label for="type">Type</label>
      <input type="text" class="form-control" name="type"  id="type" placeholder="Enter type">

      {{-- slug --}}
      <label for="slug">Slug</label>
      <input type="text" class="form-control" name="slug"  id="slug" placeholder="Enter slug">


    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>
  
  
  <a href="{{route('comics.index')}}" type="button" class="btn btn-primary">Torna alla Lista</a>
</main>
@endsection