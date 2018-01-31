<?php

namespace App\Http\Controllers\Admin;

use App\Position;
use App\Reservation;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Support\Facades\View;

class ReservationController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Réservations');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::getReservationsShortListOnly();
        foreach ($reservations as $reservation) {
            $position = Position::getPosition($reservation->position_id);
            $reservation['position_name'] = $position->block_name . ' - Étage ' . $position->floor_number . ' - Couloir ' . $position->lane_name . ' - Chambre ' . $position->room_number . ' - Position ' . $position->position_number;
        }

        $action_name = 'Liste';
        return view('admin.reservations.index', compact(['action_name', 'codification_periode', 'reservations']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::getReservation($id);
        $position = Position::getPosition($reservation->position_id);
        $reservation['position_number'] = $position['block_name'] . ' - Étage ' . $position['floor_number'] . ' - Couloir ' . $position['lane_name'] . ' - Chambre ' . $position['room_number'] . ' - Position ' . $position['position_number'];
        $student = Student::getStudentByStudentId($reservation['student_id']);
        $reservation['student_name'] = $student->name;

        $action_name = "Voir";
        return view('admin.reservations.show', compact(['action_name', 'reservation']));
    }

}
