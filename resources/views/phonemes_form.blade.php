<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        {{ Form::open(array('action' => 'PhonemesController@transformPhonemes')) }}
            {{ Form::token() }}
            {{ Form::textarea('sentence') }}
            {{ Form::submit('Click me!')}}
        {{ Form::close() }}

        @if (isset($phonemes))
            <p>{{ $phonemes }}</p>
        @endif
    </body>
</html>