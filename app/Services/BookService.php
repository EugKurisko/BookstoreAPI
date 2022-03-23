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
    public function getAllBooks()
    {
        return Book::all();
    }

    /**
     * @return void
     */
    public function getAllBooksWithAuthors(): Collection
    {
        return Book::whereHas('author')->get();
    }

    /**
     * @param array $data
     * @return Book
     */
    public function storeBook(array $data): Book
    {
        return $this->bookRepository->create($data);
    }

    /**
     * @param Book $book
     * @param array $data
     * @return Book
     */
    public function updateBook(Book $book, array $data): Book
    {
        return $this->bookRepository->update($book, $data);
    }

}
