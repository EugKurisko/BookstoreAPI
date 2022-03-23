<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Resources\Book\AllBooksCollection;
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
        return AllBooksCollection::collection($this->bookService->getAll());
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
     * @param int $bookId
     * @return BookResource
     */
    public function showBook(int $bookId): BookResource
    {
        return BookResource::make(Book::findOrFail($bookId));
    }

}
