@extends('home.layout')

@section('content')

{{-- <br>
<div class="row">
    <div class="col align-self-start">
     <a   class="btn btn-primary" href="{{route('home.index')}}" >All Articles</a>
    </div>
</div>
<br> --}}


  @if ($errors->any())
  <div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $item)
        <li>{{$item}}</li>
        @endforeach

    </ul>
  </div>

  @endif


<div class='container p-5'>

<form action="{{route('home.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Full Text</label>
        <textarea class="form-control" name="full_text" id="" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" >
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-select" name="category_id">
            <option selected>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tags" class="form-label">Tags (comma-separated)</label>
        <input type="text" class="form-control" name="tags" placeholder="e.g., tag1, tag2, tag3">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection
