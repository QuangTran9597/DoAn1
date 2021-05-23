<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Listen;
use App\Models\Listen_word;
use App\Models\Topic;

class ListenController extends Controller
{
    public function start_listen()
    {
        $lessons = Lesson::query()->where('id', 2)->get();

        $topics = Topic::query()->where('lesson_id', 2)->get();

        //  dd($topics->toArray());

        return view('users.listen.start_listen', compact('topics', 'lessons'));
    }

    public function start_listen_id($id)
    {
        $topics = Topic::with('listens')->findOrFail($id);

        //    dd($topics->toArray());

        $listens_topics = $topics['listens']->first();

            //  dd($listens_topics->toArray());

         $listens_words = Listen::with('listens_words')->first();
        //   dd($listens_words->toArray());

        $listens_word = $listens_words['listens_words']->toArray();

            // dd($listens_word);

        // $word = Listen_word::query()->where('listen_audio_id', 1)->get();
        // dd($word->toArray());

        return view('users.listen.start_listen_one', compact('topics', 'listens_topics' ,'listens_word'));
    }

    public function show_listen_two($id)
    {
        $topics = Topic::with('listens')->findOrFail($id);

        // $listens = $topics['listens']->where('id', 2);
        // dd($listens->toArray());

         $listens = Listen::find(2);
         $calls = $listens->calls;

        //    dd($listens->toArray());

        // dd($calls->toArray());

        return view('users.listen.two_start_listen', compact('topics', 'calls', 'listens'));
    }
}
