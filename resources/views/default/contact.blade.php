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
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <form method="post" action="{{ route('contact') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="Your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" id="message" rows="5" placeholder="Your message" required>{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@endsection
