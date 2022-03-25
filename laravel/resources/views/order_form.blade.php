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
            <form form method="POST" action="{{ route('orderform.delivalyDaysCreate') }}">
            @csrf
                <div>                
                    配送先:
                    <select name="area">
                        @foreach ($area as $key => $data)
                            <option value="{{ $key }}">{{ $key }}</option>
                        @endforeach
                    </select>
                </div>
                <button>次へ</button>
            </form>
        </div>
    </body>
</html>
