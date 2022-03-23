<?php

namespace App\Http\Resources;

use App\Models\Author;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        /*** @var Author $this */
        return [
            'id' => $this->id,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
        ];
    }
}
