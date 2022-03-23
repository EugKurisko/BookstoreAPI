<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookService
{

    /**
     * @return Book[]|Collection
     */
    public function getAll()
    {
        return Book::all();
    }
}
