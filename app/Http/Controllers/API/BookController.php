<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Http\Resources\Book\AllBooksCollection;
use App\Http\Resources\Book\AllBooksWithAuthorsCollection;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookController extends Controller
{
    /**
     * @var BookService
     */
    protected $bookService;

    public function __construct
    (
        BookService $bookService
    )
    {
        $this->bookService = $bookService;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function allBooks(): AnonymousResourceCollection
    {
        return AllBooksCollection::collection($this->bookService->getAllBooks());
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function allBooksWithAuthors(): AnonymousResourceCollection
    {
        return AllBooksWithAuthorsCollection::collection($this->bookService->getAllBooksWithAuthors());
    }


    /**
     * @param CreateBookRequest $request
     * @return BookResource
     */
    public function createBook(CreateBookRequest $request): BookResource
    {
        return BookResource::make($this->bookService->storeBook($request->all()));
    }

    /**
     * @param Book $book
     * @return BookResource
     */
    public function showBook(Book $book): BookResource
    {
        return BookResource::make($book);
    }

    /**
     * @param Book $book
     * @param UpdateBookRequest $request
     * @return BookResource
     */
    public function updateBook(Book $book, UpdateBookRequest $request): BookResource
    {
        return BookResource::make($this->bookService->updateBook($book, $request->all()));
    }

    /**
     * @param Book $book
     * @return bool
     */
    public function deleteBook(Book $book): bool
    {
        return (bool)$book->delete();
    }
}
