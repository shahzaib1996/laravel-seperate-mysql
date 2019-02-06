@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Orders </div>

                <div class="card-body">

                    
                    @foreach($orders as $order)
                    <h4> This  '{{$order->product}}' belongs to {{$order->customer->name}} </h4>
                    @endforeach
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
