@extends('layouts.app')

@section('title', 'Vos bibilothèques d\'images')

@section('content')
    <libraries libraries="{{ json_encode($libraries) }}"></libraries>
@endsection