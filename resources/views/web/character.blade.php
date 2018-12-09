@extends('master')
@section('title','board')

@section('sidebar')
    @include('layouts.sidebar')
@stop

@section('nav')
    @include('layouts.nav')
@stop

@section('content')
    @include('components.character')
@stop