<table class="table table-striped breathe">
	<thead>
		<tr><th>Id</th><th>UserId</th><th>Table No.</th><th>Starts</th><th>Ends</th><th>Action</th></tr>					
	</thead>
	<tbody>
		<tr ng-repeat="reservation in reservations"><td>@{{reservation.id}}</td><td>@{{reservation.user_id}}</td><td>@{{reservation.table_id}}</td><td>@{{reservation.reservation_start}}</td><td>@{{reservation.reservation_end}}</td><td><button class="btn btn-sm btn-danger">Delete</button></td></tr>
	</tbody>
</table>