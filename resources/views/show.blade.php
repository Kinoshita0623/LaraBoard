<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>{{ $topic->title }}</title>
    </head>
    <body>
        <h1>{{ $topic->title }}</h1>
        <p>{{ $topic->author }}</p>
        <p>{{ $topic->text }}</p>

        <p>コメント</p>
        <p>{{ $comments }}</p>

        <form method="post">
            @csrf
                <input type="text" name="author" />
                <input type="text" name="text" />
                <input type="submit" />
        </form>
        <a href="/">戻る</a>
    </body>
</html>
