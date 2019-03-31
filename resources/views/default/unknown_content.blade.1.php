<div>
<table class="table">
    <thead class="thead-dark"> 
        <tr>
            @foreach($hTitle as $k=>$v)
                <th>{{ $k }}</th>
            @endforeach            
        </tr>    
    </thead>

    <tbody class="thead-light">
        @foreach($data as $key)
            <tr>            
                @foreach($key as $value)
                    <td> {{ $value }}</td>
                @endforeach           
            </tr>
        @endforeach
    </tbody>    
</table>

</div>

<p>New table</p>

<div>
<table class="table">
    <thead class="thead-dark">
        <tr>
            @foreach($hTitle as $k=>$v)
                <th>{{ $k }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody class="thead-light">
        @foreach($data as $key1 => $value1)
            <tr>            
                @foreach($value1 as $key3 => $value3)
                    <td>{{ print_r($value3) }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>    
</table>
</div>
