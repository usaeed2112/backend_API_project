<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BookService;
use App\Services\AuthorService;
use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Models\Book;

class BookController extends Controller
{
    protected $bookService;
    protected $authorService;

    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    /**
     * Display a listing of the books.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = $this->bookService->getAllBooks();
        return response()->json(['status' => 'success', 'message' => 'Books fetched successfully', 'books' => $books], 200);
    }

    /**
     * Store a newly created book in storage.
     *
     * @param  \App\Http\Requests\Book\StoreBookRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();
        $book = $this->bookService->createBook($data);

        return response()->json(['status' => 'success', 'message' => 'Book created successfully', 'book' => $book], 201);
    }

    /**
     * Display the specified book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $book = $this->bookService->getBookById($id);
        if (!$book) {
            return response()->json(['status' => 'error', 'message' => 'Book not found'], 404);
        }
        return response()->json(['status' => 'success', 'message' => 'Book details fetched successfully', 'book' => $book], 200);
    }

    /**
     * Update the specified book in storage.
     *
     * @param  \App\Http\Requests\Book\UpdateBookRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateBookRequest $request, $id)
    {
        $book = $this->bookService->getBookById($id);
        if (!$book) {
            return response()->json(['status' => 'error', 'message' => 'Book not found'], 404);
        }
        $data = $request->validated();
        $this->bookService->updateBook($book, $data);

        return response()->json(['status' => 'success', 'message' => 'Book updated successfully', 'book' => $book], 200);
    }

    /**
     * Remove the specified book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $book = $this->bookService->getBookById($id);
        if (!$book) {
            return response()->json(['status' => 'error', 'message' => 'Book not found'], 404);
        }
        $this->bookService->deleteBook($book);

        return response()->json(['status' => 'success', 'message' => 'Book deleted successfully'], 200);
    }
}
