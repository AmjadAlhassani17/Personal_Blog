@extends('home.layout')

@section('content')
<br>
<div class='container p-5'>

    <div class="mb-3">
        <h3>Title : {{$home->title}}</h3>
    </div>

    <div class="mb-3">
        <p>Full-Text : {{$home->full_text}}</p>
    </div>

    <div class="mb-3">
        <img src="/images/{{$home->image}}" width="770px" height="400px">
    </div>

    <div class="mb-3">
        <p>category_id : {{$home->category_id}}</p>
    </div>

    <div class="mb-3">
        <p>user_id : {{$home->user_id}}</p>
    </div>

    <div class="mb-3">
        <p>Tags : {{ implode(', ', $home->tags->pluck('name')->toArray()) }}</p>
    </div>

</div>

@endsection
