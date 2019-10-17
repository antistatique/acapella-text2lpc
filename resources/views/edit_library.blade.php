@extends('layouts.app')

@section('title', 'Edition d\'une librairie')

@section('content')
    <edit-library library="{{ json_encode($library) }}"></edit-library>
@endsection