<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Listen;
use App\Models\Story;
use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function welcome(){

        $lessons = Lesson::orderByDesc('id')->limit(3)->get();

        $topics = Topic::orderByDesc('id')->limit(3)->get();

        $stories = Story::orderByDesc('id')->limit(3)->get();

        return view('admins.topics.welcome', compact('lessons', 'topics', 'stories'));
    }

    public function search(Request $request)
    {
        $searchText = $request->input('search');

        $date =  Carbon::hasFormat($searchText, 'Y-m-d');

        $lessons = DB::table('lessons')->where('lesson_name', 'LIKE', "%{$searchText}%")->orWhere('lesson_title', 'LIKE', "%{ $searchText}%");

        $topics = DB::table('topics')->where('topic_name', 'LIKE', "% {$searchText}%")->orWhere('topic_title', 'LIKE', "%{ $searchText}%");

        $stories = DB::table('stories')->where('story_name', 'LIKE', "% { $searchText}%")->orWhere('story_title', 'LIKE', "%{$searchText}%");

        if($lessons || $topics || $stories )
        {

            $lessons = $lessons->paginate(3);
            $topics = $topics->paginate(3);
            $stories = $stories->paginate(3);

            return view('admins.search', compact('lessons', 'topics', 'stories'));

        } else {
            $date != null;
            $lessons->whereDate('created_at', $searchText);
            return view('admins.search')->with('lessons');
        }



    }
}
