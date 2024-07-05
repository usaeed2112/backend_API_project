<?php

namespace App\Repositories;

use App\Interfaces\BookInterface;
use App\Models\Book;

class BookRepository implements BookInterface
{
    public function __construct(private Book $model)
    {
    }
    public function all()
    {
        return $this->model->get();
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function edit($id)
    {
        return $this->model->find($id);
    }

    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
