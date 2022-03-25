<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>注文フォーム</title>
    </head>
    <body>
        <div class="test">
            <h1>注文フォーム</h1>
            <form form method="POST" action="">
            @csrf
                <div>
                    希望配送日:
                    <select name="$delivalydate">
                    @foreach ($delivaly_dates as $delivalydate)
                        <option value="{{ $delivalydate }}">{{ $delivalydate }}</option>
                    @endforeach
                    </select>
                </div>
                <button>送信</button>
            </form>
        </div>
    </body>
</html>
