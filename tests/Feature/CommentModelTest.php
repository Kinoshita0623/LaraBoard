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

    public function testCommentから依存先のTopicを取得できるか()
    {
        $topic = Topic::factory()->create();
        $comment = Comment::factory()->make();
        $topic->comments()->save($comment);
        Assert::assertEquals($topic->id, $comment->topic()->first()->id);
    }

    public function testCommentへCommentをすることができるのか()
    {
        $topic = Topic::factory()->create();
        $comment = Comment::factory()->make();
        $topic->comments()->save($comment);

        $commentToReply = Comment::factory()-make();
        $commentToReply->replyTo()->associate($comment);
        Assert::assertNotNull($comment->comments()->first());
        Assert::assertEquals($commentToReply->id ,$comment->comments()->first()->id);
    }

    public function testCommentへreplyメソッドを使用してCommentすることができるか()
    {
        $topic = Topic::factory()->create();
        $comment = Comment::factory()->make();
        $topic->comments()->save($comment);

        $commentToReply = Comment::factory()->make();
        $comment->reply($commentToReply);
        Assert::assertNotNull($comment->comments()->first());
        Assert::assertEquals($commentToReply->id ,$comment->comments()->first()->id);

    }
}
