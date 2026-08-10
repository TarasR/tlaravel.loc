@extends('default.layouts.layout')

@section('navbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Pages</h2>
        <a href="{{ route('pages.create') }}" class="btn btn-success">+ Add page</a>
    </div>

    <div class="card">
        <table class="table table-hover mb-0">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Alias</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td><a href="{{ route('pages.show', $page->id) }}">{{ $page->name }}</a></td>
                        <td><code>{{ $page->alias }}</code></td>
                        <td class="text-right">
                            <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this page?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">No pages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
