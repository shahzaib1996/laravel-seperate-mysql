@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6  ">
      <div class="card">
        <div class="card-header"> Materials
          <a href="view-materials" style="float: right;"> <button class="btn btn-success"> View </button> </a> 
        </div>

        <div class="card-body">

          @if (session()->has('message'))
          <div class="alert {{ session()->get('class') }}">
            <center>
              {!! session()->get('message') !!}
            </center>
          </div>
          @endif

          <h5> Add Materials </h5>

          <form action="store" method="POST" class="myform" >
            @csrf
            <div class="form-group">
              <label class="name"> Name </label>
              <input type="text" name="name" class="form-control" placeholder="Enter material name..."  required>
            </div>

            <div class="form-group">
              <label class="name"> Description </label>
              <input type="text" name="description" class="form form-control" placeholder="Enter description..."  required>
            </div>

            <input type="submit" name="add_material" value="Submit" class="btn btn-success" style="width:100%;">

          </form>

          <br> <br>

          <h4 class="text-center"> Recent Entries </h4>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
              @foreach($materials as $material)
              <tr>
                <td>{{ $material->id }}</td>
                <td>{{ $material->name }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
