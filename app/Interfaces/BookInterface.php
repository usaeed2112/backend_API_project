<?php

namespace App\Interfaces;


interface BookInterface
{
    public function getAll();
    public function getById($id);
    public function create(array $data);
    public function update($book, array $data);
    public function delete($book);
}

