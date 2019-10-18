@extends('layouts.app')

@section('title', 'Encodage LPC')

@section('content')
    <home sentence="{{ rawurlencode(app('request')->input('sentence')) }}" phonemes="{{ rawurlencode(app('request')->input('phonemes')) }}" libraries="{{ json_encode($libraries) }}"></home>
@endsection