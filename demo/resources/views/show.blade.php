<div class="table-responsive" id="tabledata"> 
	<table id="example" class="table table-hover table-bordered" style="background: #fff;">

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

			@foreach($table_data as $mod )
			<tr>
				@for ($i = 0; $i < count($table_col); $i++)
				<td>
					{{ $mod[$table_col[$i]] }}
				</td>
				@endfor
			</tr>

			@endforeach

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


{{ $table_data->links() }}
</div>




<script type="text/javascript">
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
    	var title = $(this).text();
    	$(this).html( '<input type="text" placeholder="Search here" />' );
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

	

</script>