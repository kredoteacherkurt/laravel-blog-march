@extends('layouts.app')

@section('title', 'Show Post')


@section('content')
    <div class="border rounded p-3">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->description }}</p>
        <img src="{{ asset('/storage/images/' . $post->image) }}" alt="" class="img-thumbnail w-100">
    </div>
    <form action="{{route('comments.store',$post->id)}}" method="post" class="border p-3 shadow mt-3 rounded-1">
        @csrf
        <div class="input-group">
            <input type="hidden" name="post_id" value="{{$post->id}}" id="">
            <textarea name="body" id="body" rows="1" class="form-control" placeholder="Add a comment"></textarea>
            <button type="submit" class="btn btn-primary">Post</button>
        </div>
    </form>
    <ul class="list-group mt-3">
        @foreach ($post->comments as $comment)
            <li class="list-group-item">
               <p><span class="fw-bold">{{$comment->user->name}}</span> : {{$comment->body}}</p>
            </li>
        @endforeach
    </ul>
@endsection
