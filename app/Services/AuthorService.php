<?php

namespace App\Services;

use App\Models\Author;
use App\Repositories\AuthorRepository;
use Illuminate\Database\Eloquent\Collection;

class AuthorService
{
    protected $authorRepository;

    public function __construct
    (
        AuthorRepository $authorRepository
    )
    {
        $this->authorRepository = $authorRepository;
    }
    /**
     * @return Author[]|Collection
     */
    public function getAll()
    {
        return Author::all();
    }

    /**
     * @param array $data
     * @return Author
     */
    public function storeAuthor(array $data): Author
    {
        return $this->authorRepository->create($data);
    }

    /**
     * @param Author $author
     * @param array $data
     * @return Author
     */
    public function updateAuthor(Author $author, array $data): Author
    {
        return $this->authorRepository->update($author, $data);
    }
}
