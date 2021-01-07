<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTopicRequest;
use App\Http\Requests\CreateCommentRequest;

class TopicController extends Controller
{
    //作成画面を返す
    public function new()
    {
        return view("new");
    }

    //ポスト先
    public function create(CreateTopicRequest $req)
    {

        $topic = Topic::create([
            'title' => $req->input('title'),
            'author' => $req->input('author'),
            'text' => $req->input('text'),
        ]);
        return redirect('/');
    }

    public function topicList()
    {
        $topics = Topic::all();

        return view("topicList", ['topics' => $topics]);
    }

    public function show($topicId)
    {
        $topic = Topic::findOrFail($topicId);

        $comments = $topic->comments()->get();

        return view("show",['topic' => $topic,'comments' => $comments]);
    }

    public function comment(CreateCommentRequest $req, $topicId)
    {
        // topic をtopicIdで取得する

        // $topic->comments()->create([])

        $topic = Topic::findOrFail($topicId);

        $comment = $topic->comments()->create([
            'author' => $req->input('author'),
            'text' => $req->input('text'),
        ]);

        return redirect()->route('topics.show', [ 'topicId' => $topicId ]);
    }

}
