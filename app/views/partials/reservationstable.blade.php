<table class="table table-striped breathe" ng-hide="showForm">
	<thead>
		<tr><th>Id</th><th>User</th><th>Username</th><th>Table No.</th><th>Starts</th><th>Ends</th><th>Action</th></tr>					
	</thead>
	<tbody>
		<tr ng-repeat="reservation in reservations">
		<td>@{{reservation.id}}</td>
		<td>@{{reservation.user}}</td>
		<td>@{{reservation.username}}</td>
		<td>@{{reservation.table}}</td>
		<td>@{{reservation.reservation_start}}</td>
		<td>@{{reservation.reservation_end}}</td>
		<td>
		<button class="btn btn-sm btn-warning" ng-click="editReservation(reservation.id)">Edit</button>
		<button class="btn btn-sm btn-danger" ng-click="deleteReservation(reservation.id)">Delete</button>
		</td></tr>
	</tbody>
</table>
<form ng-show="showForm" class="breathe col-md-4">
	<div class="form-group">
		Username<input type="text" ng-model="newUsername" class="form-control">
	</div>
	<div class="form-group">
		Table<input type="text" ng-model="newTable" class="form-control">
	</div>
	<div class="form-group">
		Reservation starts<input type="text" ng-model="newStart" class="form-control">
	</div>
	<div class="form-group">
		Reservation ends<input type="text" ng-model="newEnd" class="form-control">
	</div>
	<div class="form-group">
		<button class="btn btn-success" ng-click="updateReservation(reservationId, newUsername, newTable, newStart, newEnd)">Update</button>
		<button class="btn btn-danger" ng-click="toggleForm()">Cancel</button>
	</div>
</form>