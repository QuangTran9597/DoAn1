<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Runtime;
use Illuminate\Support\Arr;

class PageVocabularyController extends Controller
{
    public function start_vocabulary($id)
    {
       $topics = Topic::with('vocabularies')->findOrFail($id);

        return view('users.topics.start_vocabularies', compact('topics'));
    }

    public function remember_vocabulary($id)
    {
        $topics = Topic::with('vocabularies')->findOrFail($id);

        $vocabulary = Vocabulary::orderByDesc('id')->paginate(10);

        return view('users.topics.remember_vocabulary', compact('topics', 'vocabulary'));
    }

    public function  random_vocabulary($id)
    {

        $topics = Topic::find($id);

        $arr = [];

        $vocabularies = $topics->vocabularies->random();

        return view('users.topics.random_topics', compact('topics', 'vocabularies' ));

    }
}
