@extends('default.layouts.layout')

@section('navbar')
    @parent
@endSection

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
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form method="post" action="{{ route('productsAdd') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" class="form-control" name="title" value ="{{ old('title') }}" id="exampleInputTitle" aria-describedby="Title" placeholder="Enter title">
            </div>
            
            <div class="form-group">
                <label for="exampleInputSlug">Slug</label>
                <input type="text" class="form-control" name="slug" value ="{{ $slug }}" id="exampleInputSlug" placeholder="{{ $slug }}" readonly>
            </div>

            <div class="form-group">
                <label for="exampleInputPrice">Price</label>
                <input type="text" class="form-control" name="price" value ="{{ old('price') }}" id="exampleInputPrice" placeholder="Price">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" name="description" value="{{ old('description') }}" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
