@extends('layouts.app')
@section('content')
<div class="container">
	<a href="/"class="btn btn-sm btn-outline-dark">❮ Back</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="btn-group float-right">
                        <a href="/notes/{{$post->id}}_{{$post->title}}/edit" class="btn btn-success btn-right">edit</a>
                        {!! Form::open(['action' => ['postsController@destroy',$post->id],'method' => 'DELETE']) !!}
                        {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                        {!! Form::close() !!}
                    </div>    
                    <h3>{{$post->title}}</h3>
                </div>

                <div class="card-body">
                    <p>{!!$post->body!!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
