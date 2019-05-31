@extends('layouts.app')
@section('content')
<a href="/notes/{{$post->id}}_{{$post->title}}"class="btn btn-sm btn-outline-dark">❮ Back</a>
{!! Form::open(['action' => ['postsController@update',$post->id],'method' => 'PUT']) !!}
    <div class="form-group ">
        {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
        {{Form::textarea('body',$post->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Write your note'])}}    
    </div>
    {!!Form::submit('Submit',['class'=>'btn btn-success'])!!}
{!! Form::close() !!}
@endsection
