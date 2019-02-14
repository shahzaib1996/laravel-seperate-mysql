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

        @if(count($table_col) == 0 )

        <h4> <center> Table is empty </center> </h4>

        @else


        <form action="" method="" >

          @foreach($table_col_select as $field )

          <div class="check_box">
            <input type="checkbox" class="colcheck" name="cols[]" value="{{$field}}" 
            @if(in_array($field, $table_col)) 
            checked 
            @endif
            >
            <span style="text-transform: capitalize;margin-left: 5px;"> {{$field}} </span>
          </div>

          @endforeach



          <input type="submit" name="filter" class="btn btn-success" value="Filter" style="padding: 10px;border: 2px solid #5cb85c;margin-top: -4px;">

          <br>

          <input type="button" name="filter" class="btn btn-info" value="Export Current Data as Excel" onclick="exportToExcel()" style="padding: 10px;border: 2px solid #5bc0de;margin-top: 20px;">

        </form>

        <br>





        <div class="table-responsive" id="tabledata"> 
          <table id="example" class="datatable table table-hover table-bordered" style="background: #fff;">

            <thead>
              <tr>

                @for ($i = 0; $i < count($table_col); $i++)
                <th>
                  {{$table_col[$i]}}
                </th>
                @endfor

              </tr>

            </thead>

            <tbody>


            </tbody>

            <tfoot>
              <tr>

                @for ($i = 0; $i < count($table_col); $i++)
                <th>
                  {{$table_col[$i]}}
                </th>
                @endfor

              </tr>

            </tfoot>



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

    $(document).ready(function() {

  //   // Setup - add a text input to each footer cell
  $('#example tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input type="text" placeholder="Search Here" />' );
  } );

  //   // DataTable
  var table = $('.datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('serverSide' , [ 'table' => $table_name ] ) }}"

  });

  //   // Apply the search
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

});



    function exportToExcel() {
      var htmls = "";
      var uri = 'data:application/vnd.ms-excel;base64,';
      var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'; 
      var base64 = function(s) {
        return window.btoa(unescape(encodeURIComponent(s)))
      };
      var format = function(s, c) {
        return s.replace(/{(\w+)}/g, function(m, p) {
         return c[p];
       })
      };
      htmls = $('.datatable').html()
      var ctx = {
        worksheet : 'Worksheet',
        table : htmls
      }
      var link = document.createElement("a");
      link.download = "datatable_export.xls";
      link.href = uri + base64(format(template, ctx));
      link.click();
    }





    // $(document).ready(function() {
    //   $('.datatable').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{{ route('serverSide' , [ 'table' => $table_name ] ) }}"

    //   });
    // });




    // $(document).ready(function(){ 

    //   $(document).on('click','.pagination a', function(event){
    //     event.preventDefault();


    //     var page =  $(this).attr('href').split('page=')[1];
    //     fetch_data(page);
    //   });

    //   function fetch_data(page) {
    //     $.ajax({
    //       url:"{{url('/')}}/ajaxtabledata/fetch_data?table={{$table_name}}&page="+page,
    //       success:function(data) {
    //         $('#tabledata').html(data);
    //       }
    //     })
    //   }

    // });



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