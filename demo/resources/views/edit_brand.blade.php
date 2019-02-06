@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6  ">
      <div class="card">
        <div class="card-header"> Brand
          <a href="../view-brands" style="float: right;"> <button class="btn btn-success"> View </button> </a> 
        </div>

        <div class="card-body">

          @if (session()->has('message'))
          <div class="alert {{ session()->get('class') }}">
            <center>
              {!! session()->get('message') !!}
            </center>
          </div>
          @endif

          <h5> Edit Brand with an id " {{$brand->id}} " </h5>

          <form action="../update-brand" method="POST" class="myform" onsubmit="return checkMat('material_id');">
            @csrf
            <div class="form-group">
              <label class="name"> Name </label>
              <input type="text" name="name" class="form-control" placeholder="Enter material name..." value="{{$brand->name}}"  required>
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
              <input type="text" name="description" class="form form-control" placeholder="Enter description..." value="{{$brand->description}}" required>
            </div>

            <div class="form-group">
              <label class="name"> Price </label>
              <input type="number" name="price" class="form-control" placeholder="Enter price..." value="{{$brand->price}}" required>
            </div>

            <input type="hidden" name="id" value="{{$brand->id}}">

            <input type="submit" name="update_brand" value="Update" class="btn btn-success" style="width:100%;">

          </form>


        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  document.getElementById('material_id').value= '{{ $brand->material_id }}';
  

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
