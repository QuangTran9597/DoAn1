<?php

namespace App\Http\Controllers;

use App\Models\Listen;
use App\Models\Topic;
use Illuminate\Http\Request;

class AdminlistenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listens = Listen::orderByDesc('id')->paginate(5);
        return view('admins.listens.show_listen', compact('listens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::query()->where('lesson_id', 2)->get();

        return view('admins.listens.create_listens', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());

        $listen = Listen::query()->create($request->only('topic_id', 'listen_name', 'listen_audio'));

        if($fileAudio = $request->file('listen_audio'))
        {
            $fileNameAudio = date('YmdHis') . '_' . $fileAudio->getClientOriginalName();

            $fileAudio->move('upload/audio/listen', $fileNameAudio);

            $listen->update(['listen_audio' => $fileNameAudio]);

        }

        return redirect()->route('listen.index');
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
        $topics = Topic::query()->where('lesson_id', 2)->get();

        $listens = Listen::with('topic')->findOrFail($id);

        //  dd($listens->toArray());

        return view('admins.listens.edit_listen', compact('topics', 'listens'));
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
        $listens = Listen::with('topic')->findOrFail($id);

        $listens->update($request->only('topic_id','listen_name', 'listen_audio'));

        if($fileAudio = $request->file('listen_audio'))
        {
            $fileNameAudio = date('YmdHis') . '_' . $fileAudio->getClientOriginalName();

            $fileAudio->move('upload/audio/listen', $fileNameAudio);

            $listens->update(['listen_audio' => $fileNameAudio]);

        }

        return redirect()->route('listen.index')->with('message', 'Bạn đã Update thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
