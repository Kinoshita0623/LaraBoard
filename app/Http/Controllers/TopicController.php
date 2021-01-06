<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    //作成画面を返す
    public function new()
    {
        return view("welcome");
    }
}
