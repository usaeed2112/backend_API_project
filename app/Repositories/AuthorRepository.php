<?php

namespace App\Repositories;

use App\Interfaces\AuthorInterface;
use App\Models\Author;

class AuthorRepository implements AuthorInterface
{
    protected $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function getAll()
    {
        return $this->author->with('books')->get();
    }

    public function getById($id)
    {
        return $this->author->with('books')->findOrFail($id);
    }

    public function create(array $data)
    {
        $author = $this->author->create($data);
        return $author->load('books');
    }

    public function update($author, array $data)
    {
        $author->update($data);
        return $author->load('books');
    }

    public function delete($author)
    {
        $author->delete();
    }
}
