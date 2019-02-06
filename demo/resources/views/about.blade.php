@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">About Us </div>

                <div class="card-body">
                   
                    This is About us Page. <br>
                    and My Name is {{ $name }} <br>
                    My contact {{ $mobile }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
