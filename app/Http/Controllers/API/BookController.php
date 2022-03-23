<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AllBooksCollection;
use App\Services\BookService;
use Illuminate\Http\Request;
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
}
