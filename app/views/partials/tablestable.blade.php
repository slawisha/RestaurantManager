<a class="add-link btn btn-success" ng-click="toggleForm()" ng-hide="showForm">Add Table</a>
<table class="table table-striped breathe" ng-hide="showForm">
	<thead>
		<tr><th>Number</th><th>Seats</th><th>Position</th><th>Description</th><th>Available</th><th>Image</th><th>Action</th></tr>						
	</thead>
	<tbody>
		<tr ng-repeat="table in tablesBackend">
		<td>@{{table.number}}||@{{$index}}</td>
		<td>@{{table.seats}}</td>
		<td>@{{table.position}}</td>
		<td>@{{table.description}}</td>
		<td>@{{table.available}}</td>
		<td><img width="120" heigth="72" ng-src="@{{table.image_url}}"/></td>
		<td>
		<button class="btn btn-sm btn-warning" ng-click="editTable(table.id)">Edit</button>
		<button class="btn btn-sm btn-danger" ng-click="deleteTable(table.id, $index)">Delete</button>	
		</td></tr>
	</tbody>
</table>
<ul class="pagination" ng-hide="showForm">
    <li ng-class="{'disabled':currentPage==1}"><a ng-click="loadFirstPage()">&laquo;</a></li>
    <li ng-repeat="page in pages" ng-class="{'active':page==currentPage}"><a  ng-click="loadNthPage(page)">@{{page}}</a></li>
    <li ng-class="{'disabled':currentPage==lastPage}"><a ng-click="loadLastPage()">&raquo;</a></li>
</ul>
<form name="tablesForm" ng-show="showForm" class="col-md-4" enctype="multipart/form-data">
	<div class="form-group">
		Number<input type="number" name="number" ng-model="newNumber" class="form-control" required> 
		<em class="muted" ng-show="tablesForm.available.$pristine && tablesForm.available.$invalid">Required</em>
	</div>
	<div class="form-group">
		Seats<input type="number" name="seats" ng-model="newSeats" class="form-control" required> 
		<em class="muted" ng-show="tablesForm.available.$pristine && tablesForm.available.$invalid">Required</em>
	</div>
	<div class="form-group">
		Position<input type="text" name="position" ng-model="newPosition" class="form-control"> 
	</div>
	<div class="form-group">
		Description<input type="textarea" name="description" ng-model="newDescription" class="form-control"> 
	</div>
	<div class="form-group">
		Available<select type="text" name="available" ng-model="newAvailable" class="form-control" required>
		<option>1</option>
		<option>0</option>
	    </select>
        <em class="muted" ng-show="tablesForm.available.$pristine && tablesForm.available.$invalid">Required</em>
	</div>
	<div class="form-group">
		<img width="120" height="82" ng-src="@{{newThumbnail}}" ng-show="showEdit" style="display: block;" />
		Image<input type="file" name="thumbnail" ng-file-select="onFileSelect($files)"> 
	</div>
	<div class="form-group">
    	<button class="btn btn-primary" ng-hide="showEdit" ng-click="tablesForm.$valid &&addNewTable(newNumber,newSeats,newPosition,newDescription,newAvailable, currentPage)">Add new table</button>
    	<button class="btn btn-primary" ng-show="showEdit" ng-click="tablesForm.$valid && updateTable(tableId, newNumber,newSeats,newPosition,newDescription,newAvailable)">Update table</button>
    	<button class="btn btn-danger" ng-show="showForm" ng-click="toggleForm()">Cancel</button>
	</div>
</form>