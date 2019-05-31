@extends('layouts.app')
@section('content')
	@guest
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center card shadow"style="margin-top: 15%">
                <div class="card-body">
                <h1>Welcome</h1> 
                <h3>Here, you can create and save your notes</h3> 
                <a href="/login" class="btn btn-primary btn-lg">login</a>
                <a href="/register" class="btn btn-primary btn-lg">Sign Up</a>  
                </div>
            </div>
        </div>
    </div>
            @endguest
@endsection