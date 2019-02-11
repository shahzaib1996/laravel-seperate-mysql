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



</head>
<body style="background: #f4f4f4;">
  <div id="app">


    <main class="py-4" style="margin-top: 50px;padding-left: 50px;padding-right: 50px;">

      <div class="container-fluid">


    

        <div class="table-responsive" id="tabledata"> 
          <table id="example" class="table table-hover table-bordered" style="background: #fff;">
            <thead>
              <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>Price</th>
              </tr>
            </thead>



            <tfoot>
              <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>Price</th>
              </tr>
            </tfoot>
          </table>

          

        </div>




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
      processing: true,
      serverSide: true,
      ajax: "{{ route('sendlaratables', ['table' => $table_name ]) }}",
      columns: [
      { name: 'review' },
      { name: 'product_id' },
      { name: 'star' }
      ]
    }
    );

    // Apply the search
    table.columns().every( function () {
      var that = this;

      $( 'tfoot input', this.footer() ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
          that
          .search( this.value )
          .draw();
        }
      } );
    } );
  } );

    // $('#example').DataTable({
    //   processing: true,
    //   serverSide: true,
    //   ajax: "{{ route('sendlaratables', ['table' => $table_name ]) }}",
    //   columns: [
    //   { name: 'id' },
    //   { name: 'name' },
    //   { name: 'price' }
    //   ]

    // });

  </script>

</body>
</html>