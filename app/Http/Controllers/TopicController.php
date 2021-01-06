<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTopicRequest;

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
        $req->input('title');

        $topic = Topic::create([
            'title' => $req->input('title'),
            'author' => $req->input('author'),
            'text' => $req->input('text'),
        ]);
        return $topic;
    }

    public function topicList()
    {
        $topics = Topic::all();

        return view("topicList", ['topics' => $topics]);
    }

    public function show($topicId)
    {
        $topic = Topic::findOrFail($topicId);

        return view("show",['topic' => $topic]);
    }

}
