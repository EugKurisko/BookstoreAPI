<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAuthorRequest;
use App\Http\Resources\AllAuthorsCollection;
use App\Models\Author;
use App\Services\AuthorService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AuthorController extends Controller
{
    /**
     * @var AuthorService
     */
    protected $authorService;

    public function __construct
    (
        AuthorService $authorService
    )
    {
        $this->authorService = $authorService;
    }

    public function allAuthors(): AnonymousResourceCollection
    {
        return AllAuthorsCollection::collection($this->authorService->getAll());
    }

    /**
     * @param CreateAuthorRequest $request
     * @return Author
     */
    public function createAuthor(CreateAuthorRequest $request): Author
    {
        return $this->authorService->storeAuthor($request->all());
    }
}
