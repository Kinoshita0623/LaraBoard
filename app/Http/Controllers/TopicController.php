<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    //作成画面を返す
    public function new()
    {
        return view("new");
    }

    //ポスト先
    public function create(Request $req)
    {
        $req->input('title');

        $topic = Topic::create([
            'title' => $req->input('title'),
            'author' => $req->input('author'),
            'text' => $req->input('text'),
        ]);
    }
}
