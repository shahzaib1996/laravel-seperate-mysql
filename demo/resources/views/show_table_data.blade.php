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

</style>



</head>
<body style="background: #f4f4f4;" onload="preSelect()">
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


        <form action="" name="ipp_form" id="ipp_form" >

          <label>Items per page </label>
          <select id="ipp" name="ipp" >
            <option>10</option>
            <option>20</option>
            <option>30</option>
          </select>

        </form>



        @if(count($table_data) == 0 )

        <h4> <center> Table is empty </center> </h4>

        @else
        

        @include('show')


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

    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Search Here" />' );
    } );

    // DataTable
    var table = $('#example').DataTable(
    {
      "paging":   false,
      "searching": true
    }
    );

    // Apply the search
    table.columns().every( function () {
      var that = this;

      $( 'input', this.footer() ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
          that
          .search( this.value )
          .draw();
        }
      } );
    } );
  } );


    $(document).ready(function(){ 

      $(document).on('click','.pagination a', function(event){
        event.preventDefault();

        $(this).css('background', '#508ec4');

        var page =  $(this).attr('href').split('page=')[1];
        fetch_data(page);
      });

      function fetch_data(page) {
        $.ajax({
          url:"{{url('/')}}/ajaxtabledata/fetch_data?table={{$table_name}}&page="+page,
          success:function(data) {
            $('#tabledata').html(data);
          }
        })
      }

    });

    function preSelect()
    {    
      var element = document.getElementById('ipp');
      element.value = '{{$item_per_page}}';

    }

    $(document).ready(function() {
      $("#ipp").on('change', function() {

        var u = "{{url('/')}}/changeipp/"+this.value;
        $.ajax({
          url: u,
          success: function(data) {
            location.reload();
          }
        });

      });
    });



  // $(document).ready(function() {
  //   $('#example').DataTable({
  //     'paging'      : true,
  //     'lengthChange': true,
  //     'searching'   : true,
  //     'ordering'    : true,
  //     'info'        : true
  //   });
  // } );

</script>

</body>
</html>