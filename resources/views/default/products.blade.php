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

<!--    <a href="#" class="btn btn-primary">Add</a> -->

<div>
    <table class="table">
        <thead class="thead-dark"> 
            <tr>            
                <th>id</th>
                <th>title</th>
                <th colspan=2>action</th>
            </tr>                
        </thead>

        <tbody class="thead-light">
            @foreach($data as $mas)
                <tr>
                    <td> {{ $mas->id }}</td>                        
                    <td><a href="/admin/products/{{ $mas->slug }}">{{ $mas->title }}</a> </td>
                    <td>
                        <div>                        
                            <a href="/admin/products/edit/{{ $mas->id }}" class="btn btn-primary">Edit</a>
                        </div>
                    </td>
                    <td>
                        <div>
                            <a href="/admin/products/delete/{{ $mas->id }}" class="btn btn-primary">Delete</a>   
                        </div>
                    </td>
                        
                </tr>
            @endforeach
        </tbody>    
    </table>
</div>

<div>
    <a href="{{ route('productsAdd') }}" class="btn btn-primary">Add product</a>
</div>

@endsection



