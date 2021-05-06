<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Topic;
use App\Models\Vocabulary;
use Illuminate\Http\Request;

class PageTopicsController extends Controller
{
    public function show_topics()
    {
        $lessons = Lesson::all();
        return view('users.topics', compact('lessons'));
    }

    public function start_topics($id)
    {
        $lessons = Lesson::with('topics')->findOrFail($id);
        //  dd($lessons->toArray());
        return view('users.topics.start_topics', compact('lessons'));
    }
}