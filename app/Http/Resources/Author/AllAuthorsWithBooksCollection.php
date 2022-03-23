<?php

namespace App\Http\Resources\Author;

use App\Http\Resources\Book\AllBooksCollection;

class AllAuthorsWithBooksCollection extends AllAuthorsCollection
{

    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        $result = parent::toArray($request);
        $result['books'] = AllBooksCollection::collection($this->books);

        return $result;
    }
}
