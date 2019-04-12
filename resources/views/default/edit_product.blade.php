@extends('default.layouts.layout')

@section('navbar')
    @parent
@endSection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div>
        <form method="post" action="{{ route('productEdit',['product' => $data['id']]) }}">
            @csrf
            

            <div class="form-group">
                <input type="hidden" name="id" value ="{{ old('id') }}" id="{{ $data['id'] }}">
            </div>
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" class="form-control" name="title" value ="{{ $data['title'] }}" id="{{ $data['title'] }}" aria-describedby="Title">
            </div>
            
            <div class="form-group">
                <label for="exampleInputSlug">Slug</label>
                <input type="text" class="form-control" name="slug" value ="{{ $data['slug'] }}" id="{{ $data['slug'] }}" placeholder="Slug" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputPrice">Price</label>
                <input type="text" class="form-control" name="price" value ="{{ $data['price'] }}" id="{{ $data['price'] }}" placeholder="Price">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" name="description" rows="5">{{ $data['description'] }}</textarea>
            </div>          

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        
    </div>
@endsection