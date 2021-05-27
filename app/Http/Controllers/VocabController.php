<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Vocabulary;
use Illuminate\Http\Request;

class VocabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vocabularies = Vocabulary::orderByDesc('id')->paginate(5);

        return view('admins.vocab.show_vocab', compact('vocabularies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::all();
        return view('admins.vocab.create_vocab', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vocabularies = Vocabulary::query()->create($request->only('topic_id','vocabulary_name', 'vietsub', 'vocabulary_image', 'vocabulary_audio'));

        if($file = $request->file('vocabulary_image'))
        {
            $fileName = date('YmdHis') . '_' . $file->getClientOriginalName();

            $file->move(public_path('upload/images/vocabulary'), $fileName);

            $vocabularies->update(['vocabulary_image'=> $fileName]);
        }

        if($fileAudio = $request->file('vocabulary_audio'))
        {
            $fileNameAudio = date('YmdHis') . '_' . $fileAudio->getClientOriginalName();

            $fileAudio->move('upload/audio', $fileNameAudio);

            $vocabularies->update(['vocabulary_audio' => $fileNameAudio]);

        }

        return redirect()->route('vocabulary.index');
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
        Vocabulary::destroy($id);
    }

   
}
