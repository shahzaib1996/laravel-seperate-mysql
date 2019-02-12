@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Stored Procedures</div>

        <div class="card-body">

          <form action="getpara" method="POST" onsubmit="return checkMat('procedure')">
            @csrf

            <div class="alert alert-danger" id="alertbox" style="display: none;" > <center> Please Select Name of Procedure ! </center> </div>

            <div class="form-group">
              <label class="name"> Procedures </label>
              <select class="form-control" name="procedure" id="procedure">
                <option  value="none"> None </option>
                @foreach($pro as $p)
                <option>
                  {{ $p->SPECIFIC_NAME }}
                </option>
                @endforeach
              </select>
            </div>
            <input type="submit" name="show_tables" value="NEXT" class="btn btn-success">
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
