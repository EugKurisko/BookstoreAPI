<?php

namespace App\Repositories;

use App\Models\Author;

class AuthorRepository
{
    /**
     * @param array $data
     * @return Author
     */
    public function create(array $data): Author
    {
        $author = new Author($data);
        $author->save();
        return $author;
    }
}
