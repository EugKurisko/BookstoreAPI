<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\CreateAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Http\Resources\Author\AllAuthorsCollection;
use App\Http\Resources\Author\AllAuthorsWithBooksCollection;
use App\Http\Resources\Author\AuthorResource;
use App\Models\Author;
use App\Services\AuthorService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;

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

    /**
     * @return AnonymousResourceCollection
     */
    public function allAuthors(): AnonymousResourceCollection
    {
        return AllAuthorsCollection::collection($this->authorService->getAllAuthors());
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function allAuthorsWithBooks(): AnonymousResourceCollection
    {
        return AllAuthorsWithBooksCollection::collection($this->authorService->getAllAuthorsWithBooks());
    }

    /**
     * @param CreateAuthorRequest $request
     * @return AuthorResource
     */
    public function createAuthor(CreateAuthorRequest $request): AuthorResource
    {
        return AuthorResource::make($this->authorService->storeAuthor($request->all()));
    }

    /**
     * @param Author $author
     * @param UpdateAuthorRequest $request
     * @return AuthorResource
     * @throws Throwable
     */
    public function updateAuthor(Author $author, UpdateAuthorRequest $request): AuthorResource
    {
        return AuthorResource::make($this->authorService->updateAuthor($author, $request->all()));
    }

    /**
     * @param Author $author
     * @return AuthorResource
     */
    public function showAuthor(Author $author): AuthorResource
    {
        return AuthorResource::make($author);
    }

    /**
     * @param Author $author
     * @return bool
     */
    public function deleteAuthor(Author $author): bool
    {
        return (bool)$author->delete();
    }

}
