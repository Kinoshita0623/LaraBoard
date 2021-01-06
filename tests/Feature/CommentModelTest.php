<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Topic;
use App\Models\Comment;
use PHPUnit\Framework\Assert;

class CommentModelTest extends TestCase
{
    use RefreshDatabase;

    public function testCommentをTopicに作成することができるか()
    {
        $topic = Topic::factory()->create();
        $topic->comments()->save(Comment::factory()->make());
        Assert::assertEquals(1, $topic->comments()->get()->count());
    }

    public function test作成されたCommentがTopicに関連づけられているか()
    {
        $topic = Topic::factory()->create();
        $comment = Comment::factory()->make();
        $topic->comments()->save($comment);
        Assert::assertEquals($comment->id, $topic->comments()->first()->id);

    }
}
