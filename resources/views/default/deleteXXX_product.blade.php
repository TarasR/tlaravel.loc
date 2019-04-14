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

        <form method="post" action="{{ route('productEdit',['product' => $data['id']]) }}">
            @csrf

            <div class="form-group">
                <input type="hidden" name="_method" value ="delete">
            </div>            

            <button type="submit" class="btn btn-primary">Delete</button>
        </form>

        
    </div>
@endsection