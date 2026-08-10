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
    <h2>{{ $title ?? 'Articles' }}</h2>

    @forelse($articles as $article)
        <div class="blog-post">
            <h3><a href="{{ route('article', $article->id) }}">{{ $article->name }}</a></h3>
            <p>{{ Str::limit($article->text, 200) }}</p>
        </div>
    @empty
        <p>No articles found.</p>
    @endforelse
@endsection
