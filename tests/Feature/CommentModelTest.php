<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Topic;
use App\Models\Comment;

class CommentModelTest extends TestCase
{
    use RefreshDatabase;

    public function testCommentをTopicに作成することができるか()
    {

    }

    public function test作成されたCommentがTopicに関連づけられているか()
    {

    }
}
