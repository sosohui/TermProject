@extends('master')
@section('title','main')

@section('sidebar')
    @include('layouts.sidebar')
@stop

@section('nav')
    @include('layouts.nav')
@stop

@section('content')
    @include('components.animation')
@stop