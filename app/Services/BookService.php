<?php

namespace App\Services;

use App\Models\Book;
use App\Repositories\BookRepository;
use Illuminate\Database\Eloquent\Collection;

class BookService
{
    /**
     * @var BookRepository
     */
    protected $bookRepository;
    public function __construct
    (
        BookRepository $bookRepository
    )
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @return Book[]|Collection
     */
    public function getAll()
    {
        return Book::all();
    }

    /**
     * @param array $data
     * @return Book
     */
    public function storeBook(array $data): Book
    {
        return $this->bookRepository->create($data);
    }

}
