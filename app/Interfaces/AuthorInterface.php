<?php

namespace App\Interfaces;

interface AuthorInterface
{
    public function all();

    public function show($id);

    public function store(array $data);

    public function edit($id);

    public function update(array $data, $id);

    public function delete($id);
}