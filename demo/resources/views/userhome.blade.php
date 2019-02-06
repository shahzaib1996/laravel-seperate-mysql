@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert {{session('class')}}" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1> Welcome to User Dashboard </h1>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
