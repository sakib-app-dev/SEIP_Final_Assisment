<x-master>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h2 class="title1">Tables</h2>
					<div class="panel-body widget-shadow">
						<h4>Basic Table:</h4>
						<table class="table table-border">
							<thead>
								<tr>
								  <th>#</th>
								  <th>Category Name</th>
								  <th>Description</th>
								  <th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								  <th scope="row">1</th>
								  <td>Mark</td>
								  <td>Otto</td>
								  <td>
									<a href="{{ route('admin.category.show') }}" class="btn btn-primary">Show</a>
									<a href="{{ route('admin.category.edit') }}" class="btn btn-success">Edit</a>
									<a href="{{ route('admin.category.delete') }}" class="btn btn-danger">Delete</a>
								  </td>
								</tr>
								
							</tbody>
						</table>
					</div>


				</div>
			</div>
		</div>
	</x-master>