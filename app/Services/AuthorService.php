<?php

namespace App\Services;

use App\Interfaces\AuthorInterface;

class AuthorService
{
    protected $authorRepository;

    public function __construct(AuthorInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function getAll()
    {
        return $this->authorRepository->getAll();
    }

    public function getAuthorById($id)
    {
        return $this->authorRepository->getById($id);
    }

    public function createAuthor(array $data)
    {
        return $this->authorRepository->create($data);
    }

    public function updateAuthor($author, array $data)
    {
        return $this->authorRepository->update($author, $data);
    }

    public function deleteAuthor($author)
    {
        return $this->authorRepository->delete($author);
    }
}
