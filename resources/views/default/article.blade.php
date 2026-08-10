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
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $article->name }}</h2>
        <div>{!! $article->text !!}</div>
        <a href="{{ route('articles') }}">&larr; Back to articles</a>
    </div>
@endsection
