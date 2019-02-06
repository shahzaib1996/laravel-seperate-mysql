@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 ">
      <div class="card">
        <div class="card-header"> Materials
          <a href="material" style="float: right;"> <button class="btn btn-success"> Add New </button> </a> 
        </div>

        <div class="card-body">

          @if (session()->has('message'))
          <div class="alert {{ session()->get('class') }}">
            <center>
              {!! session()->get('message') !!}
            </center>
          </div>
          @endif

          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created By</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($materials as $material)
              <tr>
                <td>{{ $material->id }}</td>
                <td>{{ $material->name }}</td>
                <td>{{ $material->description }}</td>
                <td>{{ $material->created_by }}</td>
                @if(Auth::user()->is_admin == 1 )
                <td><a href="edit-material/{{$material->id}}" class="btn btn-primary">Edit</a></td>
                <td> <a href="delete-material/{{$material->id}}" class="btn btn-danger">Delete</a> </td>
                @endif
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
