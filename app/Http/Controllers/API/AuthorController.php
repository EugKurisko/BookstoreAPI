<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Resources\AllAuthorsCollection;
use App\Http\Resources\AuthorResource;
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
     */
    public function updateAuthor(int $authorId, UpdateAuthorRequest $request): AuthorResource
    {
        $data = $request->all();
        return AuthorResource::make($this->authorService->updateAuthor(Author::findOrFail($authorId), $data));
    }
}
