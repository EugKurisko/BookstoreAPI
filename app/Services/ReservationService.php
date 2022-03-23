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

    /**
     * @var BookService
     */
    protected $bookService;

    public function __construct
    (
        ReservationRepository $reservationRepository,
        BookService $bookService
    )
    {
        $this->reservationRepository = $reservationRepository;
        $this->bookService = $bookService;
    }

    /**
     * @param array $data
     * @return Reservation
     */
    public function reserve(array $data): Reservation
    {
        $reservation = $this->reservationRepository->create($data);
        $this->bookService->reduceAmountOfBooks($reservation->quantity, $reservation->book);
        return $reservation;
    }
}
