@extends('layouts.app')

@section('title','Show Post')


@section('content')
    <div class="border rounded p-3">
        <h1>{{$post->title}}</h1>
        <p>{{$post->description}}</p>
        <img src="{{asset('/storage/images/'.$post->image)}}" alt="" class="img-thumbnail w-100">
    </div>
@endsection
