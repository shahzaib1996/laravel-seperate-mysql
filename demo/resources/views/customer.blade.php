@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Customer </div>

                <div class="card-body">


                   <h4>{{$customer->name}} </h4>
                   <ul>
                    @foreach( $customer->orders as $order )
                        <li>{{ $order->product }}</li>

                    @endforeach
                      
                   </ul>
                        

               </div>
           </div>
       </div>
   </div>
</div>
@endsection
