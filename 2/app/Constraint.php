<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constraint extends Model
{
    protected $fillable = [
        'codification_periode_id', 'comment', 'constraint_from', 'constraint_from_id', 'constraint_to', 'constraint_to_id'
    ];

    public function codification_periode()
    {
        return $this->belongsTo('App\CodificationPeriode');
    }

    public static function getConstraint($id)
    {
        $constraint = Constraint::findOrFail($id);

        $constraint->codification_periode_name = (CodificationPeriode::findOrFail($constraint->codification_periode_id))->name;
        if ($constraint->constraint_from == 'Departement') {
            $departmant = Department::findOrFail($constraint->constraint_from_id);
            $constraint->constraint_from_name = $departmant->name;
        }
        if ($constraint->constraint_from == 'Formation') {
            $formation = Formation::getFormation($constraint->constraint_from_id);
            $constraint->constraint_from_name = $formation->department_name  . ' - ' . $formation->formation_name;
        }
        if ($constraint->constraint_from == 'Grade') {
            $grade = Grade::getGrade($constraint->constraint_from_id);
            $constraint->constraint_from_name = $grade->department_name . ' - ' . $grade->formation_name . ' ' . $grade->grade_number;
        }
        if ($constraint->constraint_from == 'Sex') {
            $sex = Sex::findOrFail($constraint->constraint_from_id);
            $constraint->constraint_from_name = 'Sexe ' . $sex->name;
        }

        if ($constraint->constraint_to == 'Block') {
            $block = Block::findOrFail($constraint->constraint_to_id);
            $constraint->constraint_to_name = $block->name;
        }
        if ($constraint->constraint_to == 'Floor') {
            $floor = Floor::getFloor($constraint->constraint_to_id);
            $constraint->constraint_to_name = $floor->bloc_name . ' - Étage ' . $floor->floor_number;
        }
        if ($constraint->constraint_to == 'Lane') {
            $lane = Lane::getLane($constraint->constraint_to_id);
            $constraint->constraint_to_name = $lane->bloc_name . ' - Étage ' . $lane->floor_number . ' - Couloir ' . $lane->lane_name;
        }
        if ($constraint->constraint_to == 'Room') {
            $room = Room::getRoom($constraint->constraint_to_id);
            $constraint->constraint_to_name = $room->bloc_name . ' - Étage ' . $room->floor_number . ' - Couloir ' . $room->lane_name . ' - Couloir ' . $room->room_number;
        }
        if (in_array($constraint->constraint_to, ['Block_Places', 'Room_Places'])) {
            $constraint->constraint_to_name = $constraint->constraint_to . ' places';
        }

        return $constraint;
    }

    public static function getConstraintsOptionList()
    {
        return Constraint::join('codification_periodes', 'constraints.codification_periode_id', 'codification_periodes.id')
            ->join('blocks', 'codification_periodes.block_id', 'blocks.id')
            ->select('constraints.id', 'constraints.name as constraint_name', 'codification_periodes.number as codification_periode_number', 'blocks.name as block_name')
            ->OrderBy('blocks.name', 'ASC')
            ->OrderBy('codification_periodes.number', 'ASC')
            ->OrderBy('constraints.name', 'DESC')
            ->get();
    }

    public static function getConstraintsShortList($limit = 15)
    {
        return Constraint::select('id')
            ->orderBy('codification_periode_id', 'DESC')
            ->paginate($limit);
    }

    public static function getConstraintsOptionListToArray()
    {
        $constraints = Constraint::getConstraintsOptionList();
        $constraints = $constraints->mapWithKeys(function ($item) {
            return [$item['id'] => $item['constraint_name'] = $item['block_name'] . ' - Étage ' . $item['codification_periode_number'] . ' - Couloir ' . $item['constraint_name']];
        })->toArray();
        return $constraints;
    }

}
