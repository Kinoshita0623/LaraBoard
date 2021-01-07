<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>新規作成</title>
    </head>
    <body>
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>

        <form method="post">
            @csrf
                <input type="text" name="title" />
                <input type="text" name="author" />
                <input type="text" name="text" />
                <input type="submit" />
        </form>
    </body>
</html>
