<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Throwable;

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

    /**
     * @param Author $author
     * @param array $data
     * @return Author
     * @throws Throwable
     */
    public function update(Author $author, array $data): Author
    {
        $author->fill($data);
        $author->save();
        return $author;
    }
}
