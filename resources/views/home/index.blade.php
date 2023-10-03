@extends('home.layout')

@section('content')

<br>

@if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
   {{$message}}
  </div>
  <script>
    setTimeout(function () {
      document.getElementById('success-message').style.display = 'none';
    }, 3000);
  </script>
@endif

@foreach ($articles as $article)
    <section class="blog_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="blog_left_sidebar">
                        <article class="blog_style1">
                            <div class="blog_img">
                                <img src="/images/{{$article->image}}" width="770px" height="400px" alt="">
                            </div>
                            <div class="blog_text">
                                <div class="blog_text_inner">
                                    <div class="cat">
                                        @foreach ($article->tags as $tag)
                                            <a class="cat_btn">{{ $tag->name }}</a>
                                        @endforeach
                                        <a><i class="fa fa-calendar" aria-hidden="true"></i>   {{ $article->created_at->format('Y-m-d H:i:s') }}</a>
                                    </div>
                                    <a><h4>{{$article->title}}</h4></a>
                                    <p>{{$article->full_text}}</p>
                                    @auth
                                        <div class="article-actions">
                                            <a class="blog_btn" href="{{route('home.show',$article->id)}}">Show Article</a>
                                            <a class="blog_btn" href="{{route('home.edit',$article->id)}}">Edit Article</a>
                                            <form action="{{route('home.destroy',$article->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete Article</button>
                                            </form>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            {!!  $articles->links()   !!}
        </div>
    </section>
@endforeach



{{-- <div class="table-responsive">
    <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-light">

            <tr>
                <th>ID</th>
                <th>image</th>
                <th>title</th>
                <th>full_text</th>
                <th>category_id</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($articles as $article)
                    <tr class="table-primary" >
                        <td>{{$article->id}}</td>
                        <td><img src="/images/{{$article->image}}" width="200px" height="300px"></td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->full_text}}</td>
                        <td>{{$article->category_id}}</td>
                        <td>
                            @auth
                                <form action="{{route('home.destroy',$article->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <a class="btn btn-primary" href="{{route('home.edit',$article->id)}}">Edit</a>
                            @endauth
                            <a class="btn btn-info" href="{{route('home.show',$article->id)}}">Show</a>
                        </td>
                    </tr>

                @endforeach


            </tbody>
            <tfoot>

            </tfoot>
    </table>

    {!!  $articles->links()   !!}
</div> --}}

@endsection
