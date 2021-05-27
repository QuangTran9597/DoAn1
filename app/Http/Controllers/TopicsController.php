<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Models\Lesson;
use App\Models\Topic;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::orderByDesc('id')->paginate(5);
        return view('admins.topics.show_topics', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lessons = Lesson::all();
        return view('admins.topics.create_topics', compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {

        $post  = Topic::query()->create($request->only('lesson_id', 'topic_name','topic_title', 'topic_content', 'topic_image'));

        if($file = $request->file('topic_image'))
        {
            $fileName = date('YmdHis') . '_' . $file->getClientOriginalName();

            $file->move(public_path('upload/images/topics'), $fileName);

            $post->update(['topic_image'=> $fileName]);
        }

        return redirect()->route('topics.index');

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
        $topics = Topic::with('lesson')->findOrFail($id);

        $lessons = Lesson::all();

        return view('admins.topics.edit_topic', compact(['topics', 'lessons']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $topics = Topic::with('lesson')->findOrFail($id);

        $topics->update($request->only('lesson_id', 'topic_name', 'topic_title', 'topic_content', 'topic_image'));

        if($file = $request->file('topic_image'))
        {
            $fileName = date('YmdHis') . '_' . $file->getClientOriginalName();

            $file->move(public_path('upload/images/topics'), $fileName);

            $topics->update(['topic_image'=> $fileName]);
        }

        return redirect()->route('topics.index')->with('message', 'Bạn đã Update thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Topic::destroy($id);
    }
}
