<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthorService;
use App\Http\Requests\Author\StoreAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;

class AuthorController extends Controller
{
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Display a listing of the authors.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $authors = $this->authorService->getAll();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new author.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created author in storage.
     *
     * @param  \App\Http\Requests\Author\StoreAuthorRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAuthorRequest $request)
    {
        $data = $request->validated();
        $author = $this->authorService->createAuthor($data);

        return redirect()->route('authors.index')
            ->with('success', 'Author created successfully.');
    }


    public function show($id)
    {
        $author = $this->authorService->getAuthorById($id);
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified author.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $author = $this->authorService->getAuthorById($id);
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified author in storage.
     *
     * @param  \App\Http\Requests\Author\UpdateAuthorRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAuthorRequest $request, $id)
    {
        $author = $this->authorService->getAuthorById($id);
        $data = $request->validated();
        $this->authorService->updateAuthor($author, $data);

        return redirect()->route('authors.index')
            ->with('success', 'Author updated successfully.');
    }

    /**
     * Remove the specified author from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $author = $this->authorService->getAuthorById($id);
        $this->authorService->deleteAuthor($author);

        return redirect()->route('authors.index')
            ->with('success', 'Author deleted successfully.');
    }
}
