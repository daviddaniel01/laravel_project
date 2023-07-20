<?php

namespace App\Http\Controllers;

use App\Enums\TeacherStatusEnum;
use App\Http\Requests\Teacher\DestroyRequest;
use App\Http\Requests\Teacher\StoreRequest;
use App\Http\Requests\Teacher\UpdateRequest;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->model = (new Teacher())->query();
        $routeName = Route::currentRouteName();
        $arrTeacherStatus = TeacherStatusEnum::getArrayView();
        View::share('arrTeacherStatus', $arrTeacherStatus);
    }

    public function index()
    {
        $data = Teacher::get();
        return view('teacher.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $courses = Course::get();
        return view('teacher.create', [
            'courses' => $courses,
        ]);
    }

    public function store(StoreRequest $request)
    {
        Teacher::create($request->validated());
        return redirect()->route('teachers.index');
    }


    public function edit(Teacher $teacher)
    {
        $courses = Course::get();
        return view('teacher.edit', ['each' => $teacher, 'courses' => $courses,]);
    }


    public function update(UpdateRequest $request, $teacherId)
    {
        //$this->model->where('id', $courseID)->update($request->validated());
        //$this->model->update($request->validated());

        $object = $this->model->find($teacherId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('teachers.index');
    }

    public function destroy(DestroyRequest $request, $teacher)
    {
        // $course->delete();
        Teacher::destroy($teacher);
        return redirect()->route('teachers.index');
    }
}
