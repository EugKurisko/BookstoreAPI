<?php

namespace App\Services;

use App\Models\Reservation;
use App\Repositories\ReservationRepository;

class ReservationService
{
    /**
     * @var ReservationRepository
     */
    protected $reservationRepository;

    public function __construct
    (
        ReservationRepository $reservationRepository
    )
    {
        $this->reservationRepository = $reservationRepository;
    }

    /**
     * @param array $data
     * @return Reservation
     */
    public function reserve(array $data): Reservation
    {
        return $this->reservationRepository->create($data);
    }
}
