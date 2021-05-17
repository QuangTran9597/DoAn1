<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Runtime;

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
}
