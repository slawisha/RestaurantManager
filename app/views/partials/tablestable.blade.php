<table class="table table-striped breathe">
	<thead>
		<tr><th>Number</th><th>Seats</th><th>Position</th><th>Description</th><th>Available</th><th>Image</th><th>Action</th></tr>						
	</thead>
	<tbody>
		<tr ng-repeat="table in tables"><td>@{{table.number}}</td><td>@{{table.seats}}</td><td>@{{table.position}}</td><td>@{{table.description}}</td><td>@{{table.available}}</td>
		<td><img width="120" heigth="72" ng-src="@{{table.image_url}}"/></td><td><button class="btn btn-sm btn-danger">Delete</button></td></tr>
	</tbody>
</table>