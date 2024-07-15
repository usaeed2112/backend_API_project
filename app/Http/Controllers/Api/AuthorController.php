<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthorService;
use App\Http\Requests\Author\StoreAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Models\Author;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $authors = $this->authorService->getAll();
        return response()->json(['status' => 'success', 'message' => 'Authors retrieved successfully', 'authors' => $authors], 200);
    }

    /**
     * Store a newly created author in storage.
     *
     * @param  \App\Http\Requests\Author\StoreAuthorRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAuthorRequest $request)
    {
        $data = $request->validated();
        $author = $this->authorService->createAuthor($data);

        return response()->json(['status' => 'success', 'message' => 'Author created successfully', 'author' => $author], 201);
    }

    /**
     * Display the specified author.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $author = $this->authorService->getAuthorById($id);
        if (!$author) {
            return response()->json(['status' => 'error', 'message' => 'Author not found'], 404);
        }
        return response()->json(['status' => 'success', 'message' => 'Author details fetched successfully', 'author' => $author], 200);
    }

    /**
     * Update the specified author in storage.
     *
     * @param  \App\Http\Requests\Author\UpdateAuthorRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateAuthorRequest $request, $id)
    {
        $author = $this->authorService->getAuthorById($id);
        if (!$author) {
            return response()->json(['status' => 'error', 'message' => 'Author not found'], 404);
        }
        $data = $request->validated();
        $this->authorService->updateAuthor($author, $data);

        return response()->json(['status' => 'success', 'message' => 'Author updated successfully', 'author' => $author], 200);
    }

    /**
     * Remove the specified author from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $author = $this->authorService->getAuthorById($id);
        if (!$author) {
            return response()->json(['status' => 'error', 'message' => 'Author not found'], 404);
        }
        $this->authorService->deleteAuthor($author);

        return response()->json(['status' => 'success', 'message' => 'Author deleted successfully'], 200);
    }
}
