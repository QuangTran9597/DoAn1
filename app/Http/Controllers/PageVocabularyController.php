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
}
