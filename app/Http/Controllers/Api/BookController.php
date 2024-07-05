<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookCreateRequest;
use App\Http\Requests\Book\BookEditRequest;
use App\Http\Resources\BookResource;
use App\Services\BooksService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(private BooksService $booksService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = $this->booksService->all();
        return response()->json(['message' => 'Books Data found successfully', 'books' => BookResource::collection($books)], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BookCreateRequest $request)
    {
        $this->booksService->store($request->all());
        return response()->json(['message' => 'Book Added successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = $this->booksService->show($id);
        return response()->json(['message' => 'Book Data found successfully', 'book' => new BookResource($book)], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = $this->booksService->edit($id);

        return response()->json(['message' => 'Book Data found successfully', 'book' => new BookResource($book)], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookEditRequest $request, string $id)
    {
        $this->booksService->update($request->all(), $id);
        return response()->json(['message' => 'Book Updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->booksService->delete($id);
        return response()->json(['message' => 'Book Deleted successfully'], 200);
    }
}
