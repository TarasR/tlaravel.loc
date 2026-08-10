@extends('default.layouts.layout')

@section('navbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $page->name }}</h2>
            <p class="text-muted">Alias: <code>{{ $page->alias }}</code></p>
            <hr>
            <div>{!! $page->text !!}</div>
        </div>
        <div class="card-footer">
            <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
            <a href="{{ route('pages.index') }}" class="btn btn-link btn-sm">&larr; Back to pages</a>
        </div>
    </div>
@endsection
