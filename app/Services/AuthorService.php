<?php

namespace App\Services;

use App\Interfaces\AuthorInterface;

class AuthorService
{
    public function __construct(private AuthorInterface $authorsInterface)
    {
    }

    public function all()
    {
        return $this->authorsInterface->all();
    }

    public function show($id)
    {
        return $this->authorsInterface->show($id);
    }

    public function store(array $data)
    {
        return $this->authorsInterface->store($data);
    }

    public function edit($id)
    {
        return $this->authorsInterface->edit($id);
    }

    public function update(array $data, $id)
    {
        return $this->authorsInterface->update($data, $id);
    }

    public function delete($id)
    {
        return $this->authorsInterface->delete($id);
    }
}
