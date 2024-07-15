<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Services\BookService;
use App\Services\AuthorService;

class BookController extends Controller
{
    protected $bookService;
    protected $authorService;

    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    public function index()
    {
        $books = $this->bookService->getAllBooks();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = $this->authorService->getAll();
        return view('books.create', compact('authors'));
    }

    public function store(StoreBookRequest $request)
    {
        $this->bookService->createBook($request->validated());
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show($id)
    {
        $book = $this->bookService->getBookById($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = $this->bookService->getBookById($id);
        $authors = $this->authorService->getAll();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(UpdateBookRequest $request, $id)
    {
        $book = $this->bookService->getBookById($id);
        $this->bookService->updateBook($book, $request->validated());
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = $this->bookService->getBookById($id);
        $this->bookService->deleteBook($book);
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
