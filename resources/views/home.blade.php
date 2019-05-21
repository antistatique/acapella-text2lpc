@extends('layouts.app')

@section('title', 'Encodage LPC')

@section('content')
    <home appurl={{ env('APP_URL')}} sentence={{ rawurlencode(app('request')->input('sentence')) }}></home>
@endsection