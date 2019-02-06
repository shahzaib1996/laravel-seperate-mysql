@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Connection</div>

				<div class="card-body">

					<form action="connect-new" method="POST">

						@csrf
						<div class="form-group">
							<label class="name"> Host </label>
							<input type="text" name="host" class="form-control" placeholder="Enter Host" value="127.0.0.1" required>
						</div>

						<div class="form-group">
							<label class="name"> Database </label>
							<input type="text" name="database" class="form form-control" placeholder="Enter Database"  value="">
						</div>

						<div class="form-group">
							<label class="name"> User </label>
							<input type="text" name="db_user" class="form form-control" placeholder="Enter Database"  value="root">
						</div>

						<div class="form-group">
							<label class="name"> Pass </label>
							<input type="password" name="db_pass" class="form form-control" placeholder="Enter Database"  value="">
						</div>

						<input type="submit" name="new" value="Connect" class="btn btn-success" style="width:100%;">

					</form>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
