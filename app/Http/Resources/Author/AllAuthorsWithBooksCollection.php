<?php

namespace App\Http\Resources\Author;

use App\Http\Resources\Book\AllBooksCollection;
use App\Models\Author;

class AllAuthorsWithBooksCollection extends AllAuthorsCollection
{

    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Author $this */
        $result = parent::toArray($request);
        $result['books'] = AllBooksCollection::collection($this->books);

        return $result;
    }
}
