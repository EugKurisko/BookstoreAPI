<?php

namespace App\Http\Resources\Book;

class AllBooksWithAuthorsCollection extends AllBooksCollection
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
