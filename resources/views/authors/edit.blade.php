@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Edit Author</h2>
            </div>
            <form action="{{ route('authors.update', $author->id) }}" method="POST">
                <div class="card-body">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $author->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea id="bio" name="bio" class="form-control @error('bio') is-invalid @enderror">{{ old('bio', $author->bio) }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <div class="float-end mb-2">
                        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Go Back</a>
                        <button type="submit" class="btn btn-primary">Update Author</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
