<?php

namespace App\Http\Controllers;

use App\Models\Listen;
use App\Models\Listen_word;
use Illuminate\Http\Request;

class WordTrueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Listen_word::orderByDesc('id')->paginate(10);

        return view('admins.listens.word_true.show_word_true', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listens = Listen::all();

        return view('admins.listens.word_true.create_word_true', compact('listens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Listen_word::query()->create($request->only('listen_audio_id','word_true','status_true','word_false','word_false'));

        return redirect()->route('word_true.index');

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
        $listens = Listen::all();
        $words = Listen_word::findOrFail($id);

        return view('admins.listens.word_true.edit_word_true', compact('words', 'listens'));
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
        $words = Listen_word::with('listen')->findOrFail($id);

        $words->update($request->only('listen_audio_id', 'word_true', 'status_true', 'word_false', 'status_false'));

        return redirect()->route('word_true.index')->with('message', 'Bạn đã Update thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Listen_word::destroy($id);
    }
}
