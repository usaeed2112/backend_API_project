@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Book Details</h2>
            </div>
            <div class="card-body">
                <div>
                    <p><strong>Title:</strong> {{ $book->title }}</p>
                    <p><strong>Description:</strong> {{ $book->description }}</p>
                </div>

                <div>
                    <h3>Authors of "{{ $book->title }}"</h3>
                    @if ($book->authors->isEmpty())
                        <p>No authors found for this book.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($book->authors as $author)
                                <li class="list-group-item">{{ $author->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <div class="float-end">
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books</a>
                </div>
            </div>
        </div>
    </div>
@endsection
