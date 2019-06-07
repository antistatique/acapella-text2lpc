@extends('layouts.app')

@section('title', 'Ajouter votre librairie d\'images')

@section('content')
    <add-library key-images="{{ json_encode($keyImages) }}"></add-library>
@endsection