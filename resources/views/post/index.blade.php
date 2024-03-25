@extends('layouts.app')

@section('title', 'Index')

@section('content')
    @forelse ($all_posts as $post)
        <div class="border p-3 rounded mb-3">

            <a href="{{route('post.show',$post->id)}}" class="text-decoration-none">{{ $post->title }}</a>
            <p class="text-muted"> {{ $post->user->name }}</p>
            <h3>{{ $post->description }}</h3>

            @if ($post->user->id == Auth::user()->id)
                {{-- homework --}}
                <div class="text-end">
                    <a href="{{route('post.edit',$post->id)}}" class="btn btn-warning btn-sm d-inline">Edit</a>
                    <form action="{{route('post.destroy',$post->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            @endif
        </div>
    @empty
        <h2 class="text-center">No posts yet</h2>
        <p class="text-muted text-center"><a href="{{route('post.create')}}" class="text-decoration-none">Create</a> a new post</p>
    @endforelse
@endsection
