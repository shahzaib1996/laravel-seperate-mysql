@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6  ">
      <div class="card">
        <div class="card-header"> Brands
          <a href="view-brands" style="float: right;"> <button class="btn btn-success"> View </button> </a> 
        </div>

        <div class="card-body">

          @if (session()->has('message'))
          <div class="alert {{ session()->get('class') }}">
            <center>
              {!! session()->get('message') !!}
            </center>
          </div>
          @endif

          <h5> Add Brands </h5>

          <form action="store-brand" method="POST" class="myform" onsubmit="return checkMat('material_id');">
            @csrf
            <div class="form-group">
              <label class="name"> Name </label>
              <input type="text" name="name" class="form-control" placeholder="Enter material name..."  required>
            </div>

            <div class="form-group">
              <label class="name"> Material </label>
              <select class="form-control" name="material_id" id="material_id">
                <option  value="none"> Select Material </option>
                @foreach($materials as $material)
                <option value="{{$material->id}}"> {{$material->name}} </option>
                @endforeach
              </select>
            </div>



            <div class="form-group">
              <label class="name"> Description </label>
              <input type="text" name="description" class="form form-control" placeholder="Enter description..."  required>
            </div>

            <div class="form-group">
              <label class="name"> Price </label>
              <input type="number" name="price" class="form-control" placeholder="Enter price..."  required>
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
              @foreach($brands as $brand)
              <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->price }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  function checkMat(selectID) {
    var m = document.getElementById(selectID);

    if(m.value == "none") {
      alert("Please select Material!");
      return false;
    } else {
      return true;
    }
  }

</script>

@endsection
