@extends('layouts.app')


@section('title','Create Post')

@section('content')

    <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
           <textarea name="description" id="description" rows="3" class="form-control">{{$post->description}}</textarea>
        </div>
        <div class="mb-3">
            <img src="{{asset('/storage/images/'.$post->image)}}" alt="" class="img-thumbnail d-block">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary px-5 float-end">Post</button>
    </form>
@endsection
