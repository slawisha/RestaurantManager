<table class="table table-striped breathe" ng-hide="showForm">
	<thead>
		<tr><th>Id</th><th>User</th><th>Username</th><th>Table No.</th><th>Starts</th><th>Ends</th><th>Active</th><th>Action</th></tr>					
	</thead>
	<tbody>
		<tr ng-repeat="reservation in reservations">
		<td>@{{reservation.id}}</td>
		<td>@{{reservation.user}}</td>
		<td>@{{reservation.username}}</td>
		<td>@{{reservation.table_number}}</td>
		<td>@{{reservation.reservation_start.date}}</td>
		<td>@{{reservation.reservation_end.date}}</td>
		<td>@{{reservation.active}}</td>
		<td>
		<button class="btn btn-sm btn-warning" ng-click="editReservation(reservation.id, $index)">Edit</button>
		<button class="btn btn-sm btn-danger" ng-click="deleteReservation(reservation.id, $index)">Delete</button>
		</td></tr>
	</tbody>
</table>
<ul class="pagination" ng-hide="showForm">
	<li ng-class="{'disabled':currentPage==1}"><a ng-click="loadFirstPage()">&laquo;</a></li>
  	<li ng-repeat="page in pages" ng-class="{'active':page==currentPage}"><a  ng-click="loadNthPage(page)">@{{page}}</a></li>
  	<li ng-class="{'disabled':currentPage==lastPage}"><a ng-click="loadLastPage()">&raquo;</a></li>
</ul>
<form ng-show="showForm" name="reservationsForm" class="breathe col-md-4" novalidate>
	<div class="form-group">
		User<input type="text" name="user" ng-model="newUser" class="form-control" ng-disabled="true" required ng-minlength=5>
		 <em class="muted" ng-show="reservationsForm.user.$pristine && reservationsForm.user.$invalid">Required. Minimum 5 characters</em>
	</div>
	<div class="form-group">
		Username<input type="text" name="username" ng-model="newUsername" class="form-control" ng-disabled="true" required ng-minlength=5>
		 <em class="muted" ng-show="reservationsForm.username.$pristine && reservationsForm.username.$invalid">Required. Minimum 5 characters</em>
	</div>
	<div class="form-group">
		Table Number<select type="text" name="number" ng-model="newTable" class="form-control" required> 
		<option ng-repeat="table in tableList">@{{table}}</option>
		</select>
		<em class="muted" ng-show="reservationsForm.table.$pristine && reservationsForm.table.$invalid">Required.</em>
	</div>
	<div class="form-group">
		Reservation starts<input type="text" name="start" ng-model="newStart" class="form-control" required>
		<em class="muted" ng-show="reservationsForm.start.$pristine && reservationsForm.start.$invalid">Required. Minimum 5 characters</em>
	</div>
	<div class="form-group">
		Reservation ends<input type="text" name="end" ng-model="newEnd" class="form-control" required>
		<em class="muted" ng-show="reservationsForm.end.$pristine && reservationsForm.end.$invalid">Required. Minimum 5 characters</em>
	</div>
	<div class="form-group">
		Active<select type="text" name="active" ng-model="newActive" class="form-control" required>
		<option>1</option>
		<option>0</option>
	    </select>
        <em class="muted" ng-show="usersForm.active.$pristine && usersForm.active.$invalid">Required</em>
	</div>
	<div class="form-group">
		<button class="btn btn-success" ng-click="updateReservation(reservationsForm.$valid && reservationId, newUser, newUsername, newTable, newStart, newEnd, newActive)">Update</button>
		<button class="btn btn-danger" ng-click="toggleForm()">Cancel</button>
	</div>
</form>