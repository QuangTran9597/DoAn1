<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValue;

class PageStoryController extends Controller
{
    public function showStory()
    {
        $stories = Story::all();

        return view('users.stories.show_story', compact('stories'));
    }

    public function startStory($id)
    {
        $stories = Story::findOrFail($id);

        return view('users.stories.start_story', compact('stories'));

    }

    public function storyVocabulary($id)
    {
        $stories = Story::with('story_images')->findOrFail($id);

        return view('users.stories.vocabulary_story', compact('stories'));

    }

    public function startRemember($id)
    {
        $stories = Story::with('story_images')->findOrFail($id);

        $images = $stories->story_images->take(6);

        return view('users.stories.remember_story', compact('stories', 'images'));

    }
}
