<?php

namespace App\Http\Controllers;

use App\Http\Requests\Semester\DestroyRequest;
use App\Http\Requests\Semester\StoreRequest;
use App\Http\Requests\Semester\UpdateRequest;
use App\Models\Course;
use App\Models\Semesters;
use App\Models\Student;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    private Builder $model;
    public function __construct()
    {
        $this->model = (new Semesters())->query();



        //$routeName = Route::currentRouteName();
        // $arr = explode('.', $routeName); // tách chuỗi
        // $arr = array_map('ucfirst', $arr); // viết hoa chữ cái đầu
        // $title = implode(' - ', $arr); //nối mảng
        // View::share('title', $title);
    }


    public function index()
    {
        $data = Semesters::get();
        return view('semester.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $students = Student::get();
        $courses = Course::get();
        return view(
            'semester.create',
            [
                'students' => $students,
                'courses' => $courses,
            ]
        );
    }

    public function store(StoreRequest $request)
    {
        Semesters::create($request->validated());
        return redirect()->route('semesters.index');
    }

    public function edit(Semesters $semester)
    {
        return view('semester.edit', ['each' => $semester->name]);
    }


    public function update(UpdateRequest $request, $semesterId)
    {
        //$this->model->where('id', $courseID)->update($request->validated());
        //$this->model->update($request->validated());

        $object = $this->model->find($semesterId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('semesters.index');
    }

    public function destroy(DestroyRequest $request, $semester)
    {
        // $course->delete();
        Semesters::destroy($semester);
        return redirect()->route('semesters.index');
    }
}
