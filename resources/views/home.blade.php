@extends('layouts.app')

@section('title', 'Encodage LPC')

@section('content')
    <home sentence={{ rawurlencode(app('request')->input('sentence')) }}></home>
@endsection