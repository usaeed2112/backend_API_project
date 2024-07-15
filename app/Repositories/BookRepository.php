<?php

namespace App\Repositories;

use App\Interfaces\BookInterface;
use App\Models\Book;

class BookRepository implements BookInterface
{
    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function getAll()
    {
        return $this->book->with('authors')->get();
    }

    public function getById($id)
    {
        return $this->book->with('authors')->findOrFail($id);
    }

    public function create(array $data)
    {
        $book = $this->book->create($data);
        if (isset($data['authors'])) {
            $book->authors()->attach($data['authors']);
        }
        return $book->load('authors');
    }

    public function update($book, array $data)
    {
        $book->update($data);
        if (isset($data['authors'])) {
            $book->authors()->sync($data['authors']);
        }
        return $book->load('authors');
    }

    public function delete($book)
    {
        $book->authors()->detach();
        return $book->delete();
    }
}
