<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCourseRequest;
use App\Http\Requests\EditLessonRequest;
use App\Http\Requests\LessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::orderByDesc('id')->paginate(5);
        return view('admins.lessons.show_lesson', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Course::all();
        return view('admins.lessons.create_lesson', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonRequest $request)
    {

        $lesson = Lesson::query()->create($request->only('course_id','lesson_name', 'lesson_title', 'lesson_content','lesson_image'));

        if($file = $request->file('lesson_image'))
        {
            $fileName = date('YmdHis') . '_' . $file->getClientOriginalName();

            $file->move(public_path('upload/images'), $fileName);

            $lesson->update(['lesson_image'=> $fileName]);
        }

        return redirect()->route('lesson.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lessons = Lesson::with('course')->findOrFail($id);

        $courses = Course::all();

        return view('admins.lessons.edit_lesson', compact(['lessons', 'courses']));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditLessonRequest $request, $id)
    {

        $lesson = Lesson::with('course')->findOrFail($id);

        $lesson->update($request->only('course_id', 'lesson_name', 'lesson_title', 'lesson_content', 'lesson_image'));

        if($file = $request->file('lesson_image'))
        {
            $fileName = date('YmdHis') . '_' . $file->getClientOriginalName();

            $file->move(public_path('upload/images'), $fileName);

            $lesson->update(['lesson_image'=> $fileName]);
        }

        return redirect()->route('lesson.index')->with('message', 'B???n ???? Update th??nh c??ng');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lesson::destroy($id);
    }
}
