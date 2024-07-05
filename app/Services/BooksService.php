<?php

namespace App\Services;

use App\Interfaces\BookInterface;

class BooksService
{
    public function __construct(private BookInterface $bookInterface)
    {
    }

    public function all()
    {
        return $this->bookInterface->all();
    }

    public function show($id)
    {
        return $this->bookInterface->show($id);
    }

    public function store(array $data)
    {
        return $this->bookInterface->store($data);
    }

    public function edit($id)
    {
        return $this->bookInterface->edit($id);
    }

    public function update(array $data, $id)
    {
        return $this->bookInterface->update($data, $id);
    }

    public function delete($id)
    {
        return $this->bookInterface->delete($id);
    }
}
