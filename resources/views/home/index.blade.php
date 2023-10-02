@extends('home.layout')

@section('content')

<br>

@if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
   {{$message}}
  </div>
@endif

<section class="blog_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="blog_left_sidebar">
                    <article class="blog_style1">
                        <div class="blog_img">
                            <img class="img-fluid" src="{{URL('images/blog-2.jpg')}}" alt="">
                        </div>
                        <div class="blog_text">
                            <div class="blog_text_inner">
                                <div class="cat">
                                    <a class="cat_btn">Gadgets</a>
                                    <a><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
                                    <a><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
                                </div>
                                <a><h4>Nest Protect: 2nd Gen Smoke CO Alarm</h4></a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                <a class="blog_btn">Read More</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>




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
