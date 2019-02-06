@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6  ">
      <div class="card">
        <div class="card-header"> Materials
          <a href="../view-materials" style="float: right;"> <button class="btn btn-success"> View </button> </a> 
        </div>

        <div class="card-body">

          @if (session()->has('message'))
          <div class="alert {{ session()->get('class') }}">
            <center>
              {!! session()->get('message') !!}
            </center>
          </div>
          @endif

          <h5> Edit Materials with an id " {{$material->id}} " </h5>

          <form action="../update" method="POST" class="myform" >
            @csrf
            <div class="form-group">
              <label class="name"> Name </label>
              <input type="text" name="name" class="form-control" placeholder="Enter material name..." value="{{$material->name}}"  required>
            </div>

            <div class="form-group">
              <label class="name"> Description </label>
              <input type="text" name="description" class="form form-control" placeholder="Enter description..." value="{{$material->description}}" required>
            </div>

            <input type="hidden" name="id" value="{{$material->id}}">

            <input type="submit" name="update_material" value="Update" class="btn btn-success" style="width:100%;">

          </form>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection
