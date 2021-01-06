<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>掲示板</title>
    </head>
    <body>
        <ul>
            @foreach ($topics as $topic)
                <li>
                    <a href="{{ route('topics.show',['topicId' => $topic->id] )}}">{{ $topic->title }}</a>
                    {{ $topic->author }}
                    {{ $topic->text }}
                </li>
            @endforeach
        </ul>
    </body>
</html>
