<?php

namespace App\Repositories;

use App\Interfaces\AuthorInterface;
use App\Models\Author;

class AuthorRepository implements AuthorInterface
{
    public function __construct(private Author $model)
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
