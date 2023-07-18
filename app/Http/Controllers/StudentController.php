<?php

namespace App\Http\Controllers;

use App\Enums\StudentStatusEnum;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function __construct()
    {
        $arrStudentStatus = StudentStatusEnum::getArrayView();
        View::share('arrStudentStatus', $arrStudentStatus);
    }

    public function index()
    {
        $data = Student::get();
        return view('student.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $courses = Course::get();
        return view('student.create', [
            'courses' => $courses,
        ]);
    }

    public function store(Request $request)
    {
        $object = new Student();
        $object->fill($request->all());
        $object->save();
    }
}
