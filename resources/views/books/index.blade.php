@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components.messages')

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title mb-0">Books</h1>
                    <a href="{{ route('books.create') }}" class="btn btn-primary">Create Book</a>
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Authors</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->description }}</td>
                                <td>
                                    @foreach ($book->authors as $author)
                                        {{ $author->name }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-info">View
                                        Details</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
