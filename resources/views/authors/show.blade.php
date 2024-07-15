@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Author Details</h2>
            </div>
            <div class="card-body">
                <div>
                    <p><strong>Name:</strong> {{ $author->name }}</p>
                    <p><strong>Bio:</strong> {{ $author->bio }}</p>
                </div>

                <div>
                    <h3>Books by {{ $author->name }}</h3>
                    @if ($author->books->isEmpty())
                        <p>No books found for this author.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($author->books as $book)
                                <li class="list-group-item">{{ $book->title }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <div class="float-end ">
                    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
