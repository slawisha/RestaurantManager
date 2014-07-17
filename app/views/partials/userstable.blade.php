<a class="add-link btn btn-success" ng-click="toggleForm()" ng-hide="showForm">Add User</a>
<table class="table table-striped breathe" ng-hide="showForm">
	<thead>
		<tr><th>Username</th><th>Email</th><th>Name</th><th>Telephone</th><th>Address</th><th>City</th><th>Role</th><th>Active</th><th>Action</th></tr>					
	</thead>
	<tbody>
		<tr ng-repeat="user in users">
			<td>@{{user.username}}</td>
			<td>@{{user.email}}</td>
			<td>@{{user.name}}</td>
			<td>@{{user.telephone}}</td>
			<td>@{{user.address}}</td>
			<td>@{{user.city}}</td>
			<td>@{{user.role}}</td>
			<td>@{{user.active}}</td>
			<td><button class="btn btn-sm btn-warning" ng-click="editUser(user.id)">Edit</button>
			<button class="btn btn-sm btn-danger" ng-click="deleteUser(user.id)">Delete</button></td>
		</tr>
	</tbody>	
</table>

<form ng-submit="addUser(poll.id)" ng-show="showForm" class="col-md-4">
	<div class="form-group">
    	Username<input type="text" ng-model="newUsername" class="form-control">
    </div>
    <div class="form-group">
    	Password<input type="password" ng-model="newPassword" class="form-control">
    </div>
    <div class="form-group">
    	Name<input type="text" ng-model="newName" class="form-control">
    </div>
    <div class="form-group">
    	Email<input type="email" ng-model="newEmail" class="form-control">
    </div>
    <div class="form-group">
    	Telephone<input type="text" ng-model="newTelephone" class="form-control">
    </div>
    <div class="form-group">
    	Address<input type="text" ng-model="newAddress" class="form-control">
    </div>
    <div class="form-group">
    	City<input type="text" ng-model="newCity" class="form-control">
    </div>
    <div class="form-group">
	    Role<select type="text" ng-model="newRole" class="form-control">
		<option>Admin</option>
		<option>Manager</option>
		<option>Member</option>
	    </select>
    </div>
    <div class="form-group">
	    Active<select type="text" ng-model="newActive" class="form-control">
		<option>1</option>
		<option>0</option>
	    </select>
    </div>
    <div class="form-group">
    	<button class="btn btn-primary" ng-hide="showEdit" ng-click="addNewUser(newUsername,newPassword,newName,newEmail,newTelephone,newAddress,newCity,newRole,newActive)">Add new user</button>
    	<button class="btn btn-primary" ng-show="showEdit" ng-click="updateUser(userId,newUsername,newPassword,newName,newEmail,newTelephone,newAddress,newCity,newRole,newActive)">Update user</button>
    	<button class="btn btn-danger" ng-show="showForm" ng-click="toggleForm()">Cancel</button>
    </div>
</form>
