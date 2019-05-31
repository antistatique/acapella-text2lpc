@extends('layouts.app')

@section('title', 'Connexion Text2LPC')

@section('content')
    <login name-error="{{ $errors->first('name') }}" password-error="{{ $errors->first('password') }}" ></login>
@endsection