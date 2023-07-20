<?php

namespace App\Http\Controllers;

use App\Enums\StudentStatusEnum;
use App\Http\Requests\Student\DestroyRequest;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->model = (new Student())->query();
        $routeName = Route::currentRouteName();
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

    public function store(StoreRequest $request)
    {
        Student::create($request->validated());
        return redirect()->route('students.index');
    }


    public function edit(Student $student)
    {
        $courses = Course::get();
        return view('student.edit', ['each' => $student, 'courses' => $courses,]);
    }


    public function update(UpdateRequest $request, $studentId)
    {
        //$this->model->where('id', $courseID)->update($request->validated());
        //$this->model->update($request->validated());

        $object = $this->model->find($studentId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('students.index');
    }

    public function destroy(DestroyRequest $request, $student)
    {
        // $course->delete();
        Student::destroy($student);
        return redirect()->route('students.index');
    }
}
