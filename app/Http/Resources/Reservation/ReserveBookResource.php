<?php

namespace App\Http\Resources\Reservation;

use App\Http\Resources\Book\BookResource;
use App\Models\Reservation;
use Illuminate\Http\Resources\Json\JsonResource;

class ReserveBookResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Reservation $this */
        return [
            'id' => $this->id,
            'book' => BookResource::make($this->book),
            'quantity' => $this->quantity,
        ];
    }
}
