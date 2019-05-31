@extends('layouts.app')
@section('content')
<a href="/"class="btn btn-sm btn-outline-dark">❮ Back</a>
{!! Form::open(['action' => 'postsController@store','method' => 'POST']) !!}
    <div class="form-group">
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
        {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Write your note'])}}    
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
{!! Form::close() !!}
@endsection
