@extends('home.layout')

@section('content')
<br>
<div class="row">
    <div class="col align-self-start">
     <a   class="btn btn-primary" href="{{route('home.index')}}" >All articles</a>
    </div>

</div>

<br>


<div class='container p-5'>

<div class="mb-3">

  <h3>Title : {{$home->title}}</h3>
 </div>
 <div class="mb-3">
   <p>{{$home->full_text}}</p>
 </div>
 <div class="mb-3">
    <img src="/images/{{$home->image}}" width="200px" height="300px">

    </div>
</div>

@endsection
