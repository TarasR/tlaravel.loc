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
    <table class="table">
        <thead class="thead-dark"> 
            <tr>            
                <th>id</th>
                <th>title</th>
                <th>slug</th>
                <th>price</th>
                <th>description</th>
            </tr>                
        </thead>

        <tbody class="thead-light">
            
                <tr>
                    <td> {{ $data->id }}</td>                        
                    <td> {{ $data->title }} </td>
                    <td> {{ $data->slug }} </td>
                    <td> {{ $data->price }} </td>
                    <td> {{ $data->description }} </td>                        
                </tr>
            
        </tbody>    
    </table>
</div>
@endsection



