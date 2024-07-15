@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components.messages')
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title mb-0">Manage Authors</h5>
                <a href="{{ route('authors.create') }}" class="btn btn-primary">Create New Author</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Bio</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ strlen($author->bio) > 50 ? substr($author->bio, 0, 50) . '...' : $author->bio }}
                                    </td>
                                    <td>
                                        <a href="{{ route('authors.edit', $author->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('authors.show', $author->id) }}" class="btn btn-sm btn-info">View
                                            Details</a>
                                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this author?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
