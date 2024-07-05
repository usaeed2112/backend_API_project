<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\AuthorCreateRequest;
use App\Http\Requests\Author\AuthorEditRequest;
use App\Http\Resources\AuthorResource;
use App\Services\AuthorService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct(private AuthorService $authorService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = $this->authorService->all();
        return response()->json(['message' => 'Authors Data fetched successfully', 'authors' => AuthorResource::collection($authors)], 200);
    }


    /**
     * Store a newly created resource in db.
     */
    public function store(AuthorCreateRequest $request)
    {
        $this->authorService->store($request->all());
        return response()->json(['message' => 'Author Added successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = $this->authorService->show($id);
        return response()->json(['message' => 'Author Data fetched successfully', 'author' => new AuthorResource($author)], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = $this->authorService->edit($id);
        return response()->json(['message' => 'Author Data fetched successfully', 'author' => new AuthorResource($author)], 200);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(AuthorEditRequest $request, string $id)
    {
        $this->authorService->update($request->all(), $id);
        return response()->json(['message' => 'Author Updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorService->delete($id);
        return response()->json(['message' => 'Author Deleted successfully'], 200);
    }
}
