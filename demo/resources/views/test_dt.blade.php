<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->

  <!-- TEST -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

  <style type="text/css">



  .navbar {
    background: #fff;
    padding-bottom: 5px;
    padding-top: 5px;
}



ul.myul {
    list-style-type: none;
    padding-left: 0px;
    margin-top: 5px;

}

ul.myul li a{
    display: block;
    padding: 10px;
    text-decoration: none;
    color: rgba(0,0,0,.5);

}
ul.myul li a:hover {
    background: #f6f7f7 !important;
    border-radius: 10px 10px 10px 10px;
    color:grey !important;

}

.check_box {
    display: inline-block;
    text-align: justify;
    border: 1px solid #dedede;padding: 10px;margin-right: 10px;
    color: grey;
}
.check_box:hover {
    opacity: 1;
}


.colcheck {
    transform: scale(1.5);
    opacity: 0.6;
}

.colcheck:checked {
    opacity: 1 !important;
}

.btn-success{
    border-radius: 0px 0px 0px 0px !important;
}

</style>



</head>
<body style="background: #f4f4f4;">
  <div id="app">

    <nav class="navbar navbar-default">
      <div class="container" style="padding-left: 40px !important;">
        <div class="navbar-header">
          <a class="navbar-brand" href="/home">
            {{ config('app.name', 'Laravel') }}
        </a>

        <ul class="navbar-nav mr-auto myul">
            <li class="nav-item leftnav" style="font-size:16px;">
              <a class="nav-link" href="../addcredentials">Connection</a>
          </li>

          <li class="nav-item leftnav" style="font-size:16px;margin-left: 10px;">
              <a class="nav-link" href="../databases">Databases</a>
          </li>
      </ul>


  </div>
</div>
</nav>

<main class="py-4" style="margin-top: 50px;padding-left: 50px;padding-right: 50px;">

  <div class="container-fluid">


    

</form>

<br>



@if(false)

<h4> <center> Table is empty </center> </h4>

@else


<div class="table-responsive" id="tabledata"> 
    <table class="datatable table table-hover table-bordered" style="background: #fff;">

       <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>details</th>
            <th>price</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>

    <tbody>



    </tbody>



</table>


</div>





@endif


</div>



</main>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->

  <!-- TEST -->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> 


  <script type="text/javascript">

    $(document).ready(function(){
      $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('serverSide' ) }}",
        columnDefs: [
        {
           targets: [ 0, 1, 2 ],
           className: 'mdl-data-table__cell--non-numeric'
       }
       ]
   });
  });

</script>

</body>
</html>