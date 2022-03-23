<?php

namespace App\Repositories;

use App\Models\Reservation;

class ReservationRepository
{
    /**
     * @param array $data
     * @return Reservation
     */
    public function create(array $data): Reservation
    {
        $reservation = new Reservation($data);
        $reservation->save();

        return $reservation;
    }
}
