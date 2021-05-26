<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PageExamController extends Controller
{
    public function showExams()
    {

        $lessons = Lesson::first();

        return view('users.exams.show_exam' ,compact('lessons'));
    }

    public function startExams()
    {
        $vocabularies = Vocabulary::all()->toArray();

        $arrVocabulary = [];

        for( $i = 0; $i <20 ; $i++)
        {
            $vocabulary = [];

            for( $j = 0 ; $j < 4; $j++)
            {
                $wordTrue = array_rand($vocabularies, 1);
                array_push($vocabulary, $vocabularies[$wordTrue]);
                unset($vocabularies[$wordTrue]);
            }
            array_push($arrVocabulary, $vocabulary);
        }

        return view('users.exams.start_exams', compact('arrVocabulary', 'vocabulary'));

    }
}
