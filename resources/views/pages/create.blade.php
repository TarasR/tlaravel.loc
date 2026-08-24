@extends('default.layouts.layout')

@section('navbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">New page</div>
        <div class="card-body">
            <form method="POST" action="{{ route('pages.store') }}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label>Alias <small class="text-muted">(used in URL, e.g. <code>about</code>)</small></label>
                    <input type="text" name="alias" class="form-control{{ $errors->has('alias') ? ' is-invalid' : '' }}" value="{{ old('alias') }}" required>
                </div>
                <div class="form-group">
                    <label>Text</label>
                    <textarea name="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" rows="10" required>{{ old('text') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('pages.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
