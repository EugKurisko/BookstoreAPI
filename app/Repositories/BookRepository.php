<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    /**
     * @param array $data
     * @return Book
     */
    public function create(array $data): Book
    {
        $book = new Book($data);
        $book->save();
        return $book;
    }
}
