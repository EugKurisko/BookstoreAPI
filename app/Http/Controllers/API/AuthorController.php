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
     * @param int $authorId
     * @param UpdateAuthorRequest $request
     * @return AuthorResource
     */
    public function updateAuthor(int $authorId, UpdateAuthorRequest $request): AuthorResource
    {
        return AuthorResource::make($this->authorService->updateAuthor(Author::findOrFail($authorId), $request->all()));
    }

    /**
     * @param int $authorId
     * @return AuthorResource
     */
    public function showAuthor(int $authorId): AuthorResource
    {
        return AuthorResource::make(Author::findOrFail($authorId));
    }

    /**
     * @param int $authorId
     * @return bool
     */
    public function deleteAuthor(int $authorId): bool
    {
        return (bool)Author::findOrFail($authorId)->delete();
    }

}
