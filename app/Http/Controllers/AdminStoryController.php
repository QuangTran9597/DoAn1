<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryRequest;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Story_Image;

class AdminStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::orderByDesc('id')->paginate(5);

        return view('admins.stories.show_story', compact('stories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.stories.create_story');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
        $stories = Story::query()->create($request->only('story_name', 'story_title', 'story_content', 'story_image', 'link'));

        if ($file = $request->file('story_image'))
        {
            $fileName = date('YmdHis') . '_' . $file->getClientOriginalName();

            $file->move(public_path('upload/images/stories'), $fileName);

            $stories->update(['story_image'=> $fileName]);
        }

        return redirect()->route('story.index');
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
        $stories = Story::findOrFail($id);

        return view('admins.stories.edit_story', compact('stories'));
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
        $stories = Story::findOrFail($id);

        $stories->update($request->only('story_name', 'story_title', 'story_content', 'story_image', 'link'));

        if ($file = $request->file('story_image'))
        {
            $fileName = date('YmdHis') . '_' . $file->getClientOriginalName();

            $file->move(public_path('upload/images/stories'), $fileName);

            $stories->update(['story_image'=> $fileName]);
        }

        return redirect()->route('story.index')->with('message', 'B???n ???? update th??nh c??ng');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Story::destroy($id);
    }
}
