@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header" style="text-transform: capitalize;">Procedure '{{$procedure}}' </div>

        <div class="card-body">

          <form action="runsp" method="POST" onsubmit="return checkMat('procedure')">
            @csrf

            <div class="alert alert-danger" id="alertbox" style="display: none;" > <center> Please Select Name of Procedure ! </center> </div>
            <input type="hidden" name="procedure" value="{{$procedure}}">

            @if(!$para) 
              <div class="alert alert-info" > <center> No Parameter Found ! <br> Click submit to run the Procedure </center> </div>
            @endif
            
            @foreach($para as $p)
              @if($p->DATA_TYPE == 'int')
                @php
                  $tt = 'number'
                @endphp
              @else 
                @php
                  $tt = 'text'
                @endphp
              @endif

              <div class="form-group">
              <label class="name" style="text-transform: capitalize;"> {{$p->PARAMETER_NAME}} </label>
              <input type="{{$tt}}" class="form-control" placeholder="Type {{$p->DATA_TYPE}}" name="Fields[]" required>
              <input type="hidden" class="form-control" value="{{$p->DATA_TYPE}}" name="F_type[]" required>
            </div>
            @endforeach

            

            <input type="submit" name="run_sp" value="Submit" class="btn btn-success">
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function checkMat(selectID) {
    var m = document.getElementById(selectID);

    if(m.value == "none") {
      var alertbox = document.getElementById('alertbox');
      alertbox.style.display = "block";
      return false;
    } else {
      return true;
    }
  }
</script>
@endsection
