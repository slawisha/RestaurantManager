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

<form ng-show="showForm" name="usersForm" class="col-md-4" novalidate>
	<div class="form-group">
    	Username<input type="text" name="username" ng-model="newUsername" class="form-control" required ng-minlength=5>
        <em class="muted" ng-show="usersForm.username.$pristine && usersForm.username.$invalid">Required. Minimum 5 characters</em>
    </div>
    <div class="form-group">
    	Password<input type="password" name="password" ng-model="newPassword" class="form-control" required ng-minlength=5>
        <em class="muted" ng-show="usersForm.password.$pristine && usersForm.password.$invalid">Required. Minimum 5 characters</em>
    </div>
    <div class="form-group">
    	Name<input type="text" name="name" ng-model="newName" class="form-control" required>
        <em class="muted" ng-show="usersForm.name.$pristine && usersForm.name.$invalid">Requred</em>
    </div>
    <div class="form-group">
    	Email<input type="email" ng-model="newEmail" class="form-control" required>
        <em class="muted" ng-show="usersForm.email.$pristine && usersForm.email.$invalid">Required</em>
    </div>
    <div class="form-group">
    	Telephone<input type="text" name="telephone" ng-model="newTelephone" class="form-control" required>
        <em class="muted" ng-show="usersForm.telephone.$pristine && usersForm.telephone.$invalid">Required</em>
    </div>
    <div class="form-group">
    	Address<input type="text" name="address" ng-model="newAddress" class="form-control" required>
        <em class="muted" ng-show="usersForm.address.$pristine && usersForm.address.$invalid">Required</em>
    </div>
    <div class="form-group">
    	City<input type="text" name="city" ng-model="newCity" class="form-control" required>
        <em class="muted" ng-show="usersForm.city.$pristine && usersForm.city.$invalid">Required</em>
    </div>
    <div class="form-group">
	    Role<select type="text" name="role" ng-model="newRole" class="form-control" required>
		<option>Admin</option>
		<option>Manager</option>
		<option>Member</option>
	    </select>
        <em class="muted" ng-show="usersForm.role.$pristine && usersForm.role.$invalid">Required</em>
    </div>
    <div class="form-group">
	    Active<select type="text" name="active" ng-model="newActive" class="form-control" required>
		<option>1</option>
		<option>0</option>
	    </select>
        <em class="muted" ng-show="usersForm.active.$pristine && usersForm.active.$invalid">Required</em>
    </div>
    <div class="form-group">
    	<button class="btn btn-primary" ng-hide="showEdit" ng-click="usersForm.$valid && addNewUser(newUsername,newPassword,newName,newEmail,newTelephone,newAddress,newCity,newRole,newActive)">Add new user</button>
    	<button class="btn btn-primary" ng-show="showEdit" ng-click="usersForm.$valid && updateUser(userId,newUsername,newPassword,newName,newEmail,newTelephone,newAddress,newCity,newRole,newActive)">Update user</button>
    	<button class="btn btn-danger" ng-show="showForm" ng-click="toggleForm()">Cancel</button>
    </div>
</form>
