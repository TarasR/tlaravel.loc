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
                <th>action</th>
            </tr>                
        </thead>

        <tbody class="thead-light">
            @foreach($data as $mas)
                <tr>
                    <td> {{ $mas->id }}</td>                        
                    <td><a href="/admin/products/{{ $mas->slug }}">{{ $mas->title }}</a> </td>
                    <td>
                        <div>
                            <form class="form-inline">                                
                                <button type="submit" class="btn btn-primary my-1">Add</button>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div>
                            <form class="form-inline">                                
                                <button type="submit" class="btn btn-primary my-1">Edit</button>
                            </form>
                        </div>
                    </td>
                        
                </tr>
            @endforeach
        </tbody>    
    </table>
</div>
@endsection



