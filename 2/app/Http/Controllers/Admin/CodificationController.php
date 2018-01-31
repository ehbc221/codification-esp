<?php

namespace App\Http\Controllers\Admin;

use App\Codification;
use App\Position;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CodificationController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Codifications');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codifications = Codification::getCodificationsShortListOnly();
        foreach ($codifications as $codification) {
            $position = Position::getPosition($codification->position_id);
            $codification['position_name'] = $position->block_name . ' - Étage ' . $position->floor_number . ' - Couloir ' . $position->lane_name . ' - Chambre ' . $position->room_number . ' - Position ' . $position->position_number;
        }

        $action_name = 'Liste';
        return view('admin.codifications.index', compact(['action_name', 'codification_periode', 'codifications']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $codification = Codification::getCodification($id);
        $position = Position::getPosition($codification->position_id);
        $codification['position_number'] = $position['block_name'] . ' - Étage ' . $position['floor_number'] . ' - Couloir ' . $position['lane_name'] . ' - Chambre ' . $position['room_number'] . ' - Position ' . $position['position_number'];
        $student = Student::getStudentByStudentId($codification['student_id']);
        $codification['student_name'] = $student->name;

        $action_name = "Voir";
        return view('admin.codifications.show', compact(['action_name', 'codification']));
    }

}
