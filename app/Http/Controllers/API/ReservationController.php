<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reservetaion\ReserveBookRequest;
use App\Http\Resources\Reservation\ReserveBookResource;
use App\Services\ReservationService;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * @var ReservationService
     */
    protected $reservationService;

    public function __construct
    (
        ReservationService $reservationService
    )
    {
        $this->reservationService = $reservationService;
    }

    /**
     * @param ReserveBookRequest $request
     * @return ReserveBookResource
     */
    public function reserveBook(ReserveBookRequest $request): ReserveBookResource
    {
        return ReserveBookResource::make($this->reservationService->reserve($request->all()));
    }
}
