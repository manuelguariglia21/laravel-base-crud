@extends('layouts.main')

@section('content')
<main>
  {{-- errors messages --}}
  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    
  @endif
  <h1>{{$comic->title}} - edit</h1>

  
  <form action="{{route('comics.update', $comic)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">

       {{-- title --}}
       <label for="title">Title</label>
       <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter title" value = '{{old('title', $comic->title)}}'>
 
       @error('title')
         <p class='text-danger'>
           {{$message}}
         </p>
       @enderror
 
       {{-- description --}}
       <label for="description">Description</label>
       <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Enter description">{{$comic->description}}</textarea>
 
       @error('description')
         <p class='text-danger'>
           {{$message}}
         </p>
       @enderror
 
       {{-- thumb --}}
       <label for="thumb">Thumb</label>
       <input type="text" class="form-control @error('thumb') is-invalid @enderror" name="thumb" id="thumb" placeholder="Enter thumb's url" value = '{{old('thumb', $comic->thumb)}}'>
 
       @error('thumb')
         <p class='text-danger'>
           {{$message}}
         </p>
       @enderror
 
       {{-- price --}}
       <label for="price">Price</label>
       <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Enter price" value = '{{old('price', $comic->price)}}'>
 
       @error('price')
         <p class='text-danger'>
           {{$message}}
         </p>
       @enderror
 
       {{-- series --}}
       <label for="series">Series</label>
       <input type="text" class="form-control @error('series') is-invalid @enderror" name="series" id="series" placeholder="Enter series" value = '{{old('series', $comic->series)}}'>
 
       @error('series')
         <p class='text-danger'>
           {{$message}}
         </p>
       @enderror
 
       {{-- sale_date --}}
       <label for="sale_date">Sale Date</label>
       <input type="text" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" id="sale_date" placeholder="Enter sale date" value = '{{old('sale_date', $comic->sale_date)}}'>
 
       @error('sale_date')
         <p class='text-danger'>
           {{$message}}
         </p>
       @enderror
 
       {{-- type --}}
       <label for="type">Type</label>
       <input type="text" class="form-control @error('type') is-invalid @enderror" name="type"  id="type" placeholder="Enter type" value = '{{old('type', $comic->type)}}'>
 
       @error('type')
         <p class='text-danger'>
           {{$message}}
         </p>
       @enderror
 
       {{-- slug --}}
       <label for="slug">Slug</label>
       <input type="text" class="form-control @error('title') is-invalid @enderror" name="slug"  id="slug" placeholder="Enter slug" value = '{{old('slug', $comic->slug)}}'>
 
       @error('slug')
         <p class='text-danger'>
           {{$message}}
         </p>
       @enderror


    </div>

    <button type="submit" class="btn btn-primary">Update</button>

  </form>
  
  
  <a href="{{route('comics.index')}}" type="button" class="btn btn-primary">Torna alla Lista</a>
</main>
@endsection