@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Databases </div>

        <div class="card-body">

          <form action="tables" method="POST" onsubmit="return checkMat('database')">
            @csrf

            <div class="alert alert-danger" id="alertbox" style="display: none;" > <center> Please Select Database ! </center> </div>

            <div class="form-group">
              <label class="name"> Databases </label>
              <select class="form-control" name="database" id="database">
                <option  value="none"> None </option>
                @foreach($dbs as $db)
                <option>
                  {{ $db }}
                </option>
                @endforeach
              </select>
            </div>
            <input type="submit" name="show_tables" value="SHOW TABLES" class="btn btn-success">
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
