@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('admin.partials.validation-error')

        <form action="{{ route('admin.posts.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    aria-describedby="titlehelpId" placeholder="Write title" value="{{ old('title', $post->title) }}" />
                <small id="helpId" class="form-text text-muted">Write the title here</small>
            </div>
            @error('title')
                <div class="text-danger mb-3">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="image" class="form-label">Choose file</label>
                <input type="file" class="form-control" name="image" id="image" placeholder=""
                    aria-describedby="fileHelpId" />
                <div id="fileHelpId" class="form-text">Upload the image</div>
            </div>
            @error('image')
                <div class="text-danger mb-3">{{ $message }}</div>
            @enderror


            <div class="mb-3">
                <label for="content" class="form-label"></label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3">{{ old('content', $post->content) }}</textarea>
            </div>
            @error('content')
                <div class="text-danger mb-3">{{ $message }}</div>
            @enderror




            <button type="submit" class="btn btn-primary">
                Update
            </button>


        </form>


    </div>
@endsection
