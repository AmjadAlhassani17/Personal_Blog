@extends('home.layout')

@section('content')

<div class="container mt-4 col-md-8 col-md-offset-1 bg-white">
    <!-- Profile Edit Form -->
    <div class="row">
        <div class="col-md-12">
            <h2>Profile</h2>
            <br>
            <form>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" value={{Auth::user()->name}} disabled readonly>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput2" value={{Auth::user()->email}} disabled readonly>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="email" class="form-control" id="exampleFormControlInput3" value=************ disabled readonly>
                  </div>
                <br>
            </form>
        </div>
    </div>
</div>

@endsection

