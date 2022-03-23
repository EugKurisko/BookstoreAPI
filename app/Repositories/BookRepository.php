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

    /**
     * @param Book $book
     * @param array $data
     * @return Book
     */
    public function update(Book $book, array $data): Book
    {
        $book->fill($data);
        $book->save();
        return $book;
    }
}
