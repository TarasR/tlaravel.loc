@extends('default.layouts.layout')


@section('navbar')
    @parent
@endsection

@section('head')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    @include('default.about_content')
@endsection



