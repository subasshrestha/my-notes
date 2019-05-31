@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="card shadow">
        <div class="card-header">
            <a href="/notes/create" class="btn btn-primary float-right">Create new note</a><h3>Notes</h3>
        </div>
        <div class="list-group">
            @if (count($posts)>0)
                @foreach($posts as $post)
                    
                        <a href="notes/{{$post->id}}_{{$post->title}}" class="list-group-item">
                            <h4>{{$post->title}}</h4>   
                        </a>
                @endforeach
            @else
                <p class="text-center">You don't have any notes</p>
            @endif
        </div>
    </div>
    {{$posts->links()}}
</div>
@endsection
