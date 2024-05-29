@extends('layouts.admin')

@section('content')

    <div class="container">

        <h1>Post: {{ $post->title }}</h1>

        <div class="d-flex gap-5">
            <img src="{{ $post->image }}" alt="">
            <p>{{ $post->content }}</p>
        </div>

    </div>


@endsection