@extends('layouts.admin')

@section('content')
    <div class="container">

        <h1>All Posts</h1>
        @include('admin.partials.confirm-message')
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Add new Post</a>


        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th class="w-25 text-center" scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr class="">
                            <td scope="row">{{ $post->id }}</td>
                            <td>
                                @if (Str::startsWith($post->image, 'https://'))
                                    <img width="120" src="{{ $post->image }}" alt="">
                                @else
                                    <img width="120" src="{{ asset('storage/' . $post->image) }}" alt="">
                                @endif
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td class="w-25 text-center">
                                <a class="btn btn-sm btn-dark" href="{{ route('admin.posts.show', $post) }}">view</a>
                                <a class="btn btn-sm btn-dark" href="{{ route('admin.posts.edit', $post) }}">edit</a>

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $post->id }}">
                                    Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modal-{{ $post->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitle-{{ $post->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{ $post->id }}">
                                                    {{ $post->title }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Are you sure?</div>
                                            <div class="modal-footer">
                                                <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>

                    @empty
                        <tr class="">
                            <td colspan="5" scope="row">No records</td>

                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
@endsection
