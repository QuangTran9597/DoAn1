<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Story_Image;

class AdminStoryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Story_Image::orderByDesc('id')->paginate(5);

        return view('admins.stories.story_img.show_img', compact('images'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stories = Story::get();

        return view('admins.stories.story_img.create_img', compact('stories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $images = Story_Image::query()->create($request->only('story_id', 'image_name', 'vietsub', 'image', 'image_audio'));

        if($file = $request->file('image'))
        {
            $fileName = date('YmdHis') . '_' . $file->getClientOriginalName();

            $file->move(public_path('upload/images/stories/story_img'), $fileName);

            $images->update(['image'=> $fileName]);
        }

        if($fileAudio = $request->file('image_audio'))
        {
            $fileNameAudio = date('YmdHis') . '_' . $fileAudio->getClientOriginalName();

            $fileAudio->move('upload/audio/story', $fileNameAudio);

            $images->update(['image_audio' => $fileNameAudio]);

        }

        return redirect()->route('story_image.index');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Story_Image::destroy($id);
    }
}
