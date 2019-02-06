@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Services </div>

                <div class="card-body">

                    <h4> Services we are providing: </h4>
                    <ul>
                    

                    @foreach( $services as $service => $cost )
                        <li>The "{{$service}}" cost is {{ $cost }}. </li>

                    @endforeach

                    </ul>

                    <h4>Employees</h4>

                    <ul>

                    @foreach( $employees as $name => $no )
                        <li>"{{$name}}" contact no is {{ $no }}. </li>
                    @endforeach

                    
                    
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
