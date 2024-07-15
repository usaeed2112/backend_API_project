<?php

namespace App\Services;

use App\Interfaces\BookInterface;

class BookService
{
    protected $bookRepository;

    public function __construct(BookInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getAllBooks()
    {
        return $this->bookRepository->getAll();
    }

    public function getBookById($id)
    {
        return $this->bookRepository->getById($id);
    }

    public function createBook(array $data)
    {
        return $this->bookRepository->create($data);
    }

    public function updateBook($book, array $data)
    {
        return $this->bookRepository->update($book, $data);
    }

    public function deleteBook($book)
    {
        return $this->bookRepository->delete($book);
    }
}
