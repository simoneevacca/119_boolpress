@extends('layouts.admin')

@section('content')
    <div class="container">

        <h1>All Posts</h1>
        <a href="" class="btn btn-primary">Add new Post</a>


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
                        <td>{{ $post->image }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td class="w-25 text-center">
                            <a class="btn btn-sm btn-dark" href="{{ route('admin.posts.show', $post) }}">view</a>
                            <a class="btn btn-sm btn-dark" href="">edit</a>
                            <a class="btn btn-sm btn-dark" href="">delete</a>
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
