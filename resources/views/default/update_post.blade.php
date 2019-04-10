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

        @cannot('update', $article)
            <div class="alert alert-danger">
                You don't have acsess
            </div>
        @endcannot

        <form method="post" action="{{ route('admin_update_post_p') }}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token }}">
            <input type="hidden" name="id" value="{{ $article->id }}">
            <div class="form-group">
                <label for="exampleInputEmail1">Head</label>
                <input type="text" class="form-control" name="name" value ="{{ $article->name }}" id="name" aria-describedby="headHelp" placeholder="Enter head">
<!--                <small id="headHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="text" class="form-control" name="img" value ="{{ $article->img }}" id="img" placeholder="Image">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Textarea</label>
                <textarea class="form-control" id="text" name="text" rows="5">{{ $article->text }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@Endsection
