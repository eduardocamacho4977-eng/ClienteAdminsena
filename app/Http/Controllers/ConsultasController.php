<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Area;
use App\Models\Computer;
use App\Models\Apprentice;
use App\Models\Teacher;
use App\Models\TrainingCenter;

class ConsultasController extends Controller
{
    //
   public function consultas()
    {
                // area consultas//

        //$area = Course::find(7);
        //return $area;

         //$area = Teacher::find(7);
        //return $area;

           //cursos cunsultas// 

        //$course = Area::find(1);
        //return $course;

         //$course = TrainingCenter::find(1);
        //return $course;

        //$course = Teacher::find(1);
        //return $course;

        //computador consultas

        //$computer = Apprentice::find(28);
       // return $computer;

       //aprendices consultas//

        //$apprentice = Computer::find(21);
       // return $apprentice;

        //$apprentice = Course::find(9);
       // return $apprentice;

       // profesores consultas//

        //$teacher = Area::find(12);
        //return $teacher;

        //$teacher = TrainingCenter::find(1);
        //return $teacher;

        //$teacher = Course::find(1);
        //return $teacher;


        //$trainingCenter = Teacher::find(1);
        //return $trainingCenter;
    }

}