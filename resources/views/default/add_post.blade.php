@extends('default.layouts.layout')

@section('navbar')
    @parent
@endSection

@section('sidebar')
    @parent
@Endsection

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
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form method="post" action="{{ route('admin_add_post_p') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Head</label>
                <input type="text" class="form-control" name="name" value ="{{ old('name') }}" id="exampleInputHead1" aria-describedby="headHelp" placeholder="Enter head">
<!--                <small id="headHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="text" class="form-control" name="img" value ="{{ old('img') }}" id="exampleInputImage" placeholder="Image">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="text" value="{{ old('text') }}" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@Endsection
