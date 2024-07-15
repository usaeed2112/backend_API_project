<?php

namespace App\Interfaces;

interface AuthorInterface
{
    /**
     * Get all authors.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll();

    /**
     * Get an author by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getById($id);

    /**
     * Create a new author.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data);

    /**
     * Update an existing author.
     *
     * @param  mixed  $author  // Can be an integer ID or Eloquent model instance
     * @param  array  $data
     * @return bool
     */
    public function update($author, array $data);

    /**
     * Delete an author.
     *
     * @param  mixed  $author  // Can be an integer ID or Eloquent model instance
     * @return bool|null
     */
    public function delete($author);
}
