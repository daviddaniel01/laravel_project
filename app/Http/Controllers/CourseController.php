<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\StoreRequest;
use App\Models\Course;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class CourseController extends Controller
{

    private Builder $model;
    public function __construct()
    {
        $this->model = (new Course())->query();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName); // tách chuỗi
        $arr = array_map('ucfirst', $arr); // viết hoa chữ cái đầu
        $title = implode(' - ', $arr); //nối mảng
        View::share('title', $title);
    }


    public function index()
    {
        $data = Course::get();
        return view('course.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(StoreRequest $request)
    {
        $object = new Course();
        $object->fill($request->all());
        $object->save();
    }

    public function edit(Course $course)
    {
        return view('course.edit', ['each' => $course]);
    }


    public function update(Request $request, $courseId)
    {
        //$this->model->where('id', $courseID)->update($request->validated());
        //$this->model->update($request->validated());

        $object = $this->model->find($courseId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('courses.index');
    }
}