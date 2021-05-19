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

        // dd($topics);

        return view('users.topics.start_vocabularies', compact('topics'));
    }

    public function remember_vocabulary($id)
    {
        $topics = Topic::with('vocabularies')->findOrFail($id);
        $vocabulary = Vocabulary::orderByDesc('id')->paginate(10);

        // $vocabulary = Vocabulary::with('topic')->findOrFail($id);
        // dd($topics->toArray());

        return view('users.topics.remember_vocabulary', compact('topics', 'vocabulary'));
    }

    public function  random_vocabulary($id)
    {

        // $topics = Topic::with('vocabularies')->findOrFail($id);

        // $vocabulary = $topics->vocabularies->toArray();

        // shuffle($vocabulary);

        $topics = Topic::find($id);
        $arr = [];
        $vocabularies = $topics->vocabularies->random();

        // dd($vocabularies->toArray());


        //  $array = [$vocabulary];

        //  $random = Arr::random($array);

        // dd($random);

        // dd($topics['vocabularies']->toArray());


        // foreach ($vocabulary as $topic) {
        //      dd($topic);
        // }

         return view('users.topics.random_topics', compact('topics', 'vocabularies' ));

    }
}
