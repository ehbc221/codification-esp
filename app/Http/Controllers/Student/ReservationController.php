<?php

namespace App\Http\Controllers\Student;

use App\CodificationPeriode;
use App\Position;
use App\Reservation;
use App\Http\Requests\ReservationRequest;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;

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
        $codification_periode = CodificationPeriode::getCurrentCodificationPeriodeToArray();

        $reservations = Reservation::getReservationsShortList(Auth::user()->id);
        foreach ($reservations as $reservation) {
            $position = Position::getPosition($reservation->position_id);
            $reservation['position_name'] = $position->block_name . ' - Étage ' . $position->floor_number . ' - Couloir ' . $position->lane_name . ' - Chambre ' . $position->room_number . ' - Position ' . $position->position_number;
        }

        $action_name = 'Liste';
        return view('student.reservations.index', compact(['action_name', 'codification_periode', 'reservations']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!CodificationPeriode::isOpened() || Student::hasCurrentReservation(Auth::user()->id)) {
            return redirect()->route('student.reservations.index')
                ->with('error', 'Impossible d\'ajouter une réservation maintenant.');
        }

        $codification_periode = CodificationPeriode::getCurrentCodificationPeriodeToArray();
        $student = Student::getStudentToArray(Auth::user()->id);
        $positions = Position::getPositionsOptionListToArray();

        $action_name = 'Ajouter';
        return view('student.reservations.create', compact(['action_name', 'codification_periode', 'student', 'positions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReservationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {
        if (!CodificationPeriode::isOpened() || Student::hasCurrentReservation(Auth::user()->id)) {
            return redirect()->route('student.reservations.index')
                ->with('error', 'Impossible d\'ajouter une réservation maintenant.');
        }

        $input = [
            'codification_periode_id' => (CodificationPeriode::getCurrentCodificationPeriode())->id,
            'student_id' => (Student::getStudent(Auth::user()->id))->id,
            'position_id' => $request->input('position_id'),
            'validation_code' => Uuid::uuid4(),
            'is_validated' => false,
        ];

        $reservation = Reservation::create($input);

        return redirect()->route('student.reservations.show', ['id' => $reservation->id])
            ->with('success', 'Réservation ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!(Student::isOwner($id) || ($user = Auth::user())->hasRole('admin'))) {
            return redirect()->route('student.reservations.index')
                ->with('error', 'Impossible de voir cette réservation.');
        }

        $reservation = Reservation::getReservation($id);
        $position = Position::getPosition($reservation->position_id);
        $reservation['position_number'] = $position['block_name'] . ' - Étage ' . $position['floor_number'] . ' - Couloir ' . $position['lane_name'] . ' - Chambre ' . $position['room_number'] . ' - Position ' . $position['position_number'];
        $student = Student::getStudent($reservation['student_id']);
        $reservation['student_name'] = $student->name;

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('student.reservations.show', compact(['action_name', 'reservation']))
            ->with('success', $success);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!(Reservation::isInCurrentCodificationPeriode($id) && Student::isOwner($id))) {
            return redirect()->route('student.reservations.index')
                ->with('error', 'Impossible de modifier cette réservation.');
        }

        $reservation = Reservation::findOrFail($id);

        $codification_periode = CodificationPeriode::getCurrentCodificationPeriodeToArray();

        if (empty($codification_periode)) {
            $positions = new Collection([]);
            $student = new Collection([]);
        }
        else {
            $positions = Position::getPositionsOptionListToArray();
            $student = Student::getStudentToArray(Auth::user()->id);
        }

        $action_name = 'Modifier';
        return view('student.reservations.edit', compact(['action_name', 'reservation', 'codification_periode', 'student', 'positions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ReservationRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationRequest $request, $id)
    {
        if (!(CodificationPeriode::isOpened() && Reservation::isInCurrentCodificationPeriode($id) && Student::isOwner($id))) {
            return redirect()->route('student.reservations.index')
                ->with('error', 'Impossible de modifier cette réservation.');
        }

        $reservation = Reservation::findOrFail($id);

        $input = [
            'codification_periode_id' => (CodificationPeriode::getCurrentCodificationPeriode())->id,
            'student_id' => (Student::getStudent(Auth::user()->id))->id,
            'position_id' => $request->input('position_id'),
        ];

        $reservation->update($input);

        return redirect()->route('student.reservations.show', ['id' => $reservation->id])
            ->with('success', 'Réservation modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!(CodificationPeriode::isOpened() && Reservation::isInCurrentCodificationPeriode($id) && Student::isOwner($id))) {
            return redirect()->route('student.reservations.index')
                ->with('error', 'Impossible de supprimer cette réservation.');
        }

        $reservation = Reservation::findOrFail($id);

        $reservation->delete();

        return redirect()->route('student.reservations.index')
            ->with('success', 'Réservation supprimée avec succès.');
    }

}
