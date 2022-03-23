<?php

namespace App\Http\Resources\Book;

use App\Models\Book;
use Illuminate\Http\Resources\Json\JsonResource;

class AllBooksCollection extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Book $this */

        return [
            'id' => $this->id,
            'title' => $this->title,
            'short_description' => $this->short_description,
        ];
    }
}
