(function(){
	angular.module('restaurantApp')
		.controller('usersController', function($scope, userService){
			var getUsers = function(){
				userService.all()
					.success(function(response){
						$scope.users = response.data; 
					});
			}

			var emptyFormFields = function(){
				$scope.newUsername = null;
				$scope.newPassword = null;
				$scope.newName = null;
				$scope.newEmail = null;
				$scope.newTelephone = null;
				$scope.newAddress = null;
				$scope.newCity = null;
				$scope.newRole = null;
				$scope.newActive = null;
			}

			getUsers();

			$scope.showForm = false;
			$scope.showEdit = false;

			$scope.toggleForm = function(){
				$scope.showForm = !$scope.showForm;
				$scope.showEdit = false;
				emptyFormFields();				
			}

			$scope.addNewUser = function(newUsername, newPassword, newName, newEmail, newTelephone, 
				newAddress,newCity,newRole,newActive){
				$scope.users.push({username:newUsername, password:newPassword, name:newName, email:newEmail, 
					telephone:newTelephone,address:newAddress, city:newCity,role:newRole,active:newActive});
				$scope.showForm = false;
				emptyFormFields();
				userService.save(newUsername, newPassword, newName, newEmail, newTelephone,newAddress,newCity,newRole,newActive).
					success(function(response){
						$scope.message = response.data;
					})
			}

			$scope.editUser = function(id){
				$scope.showForm = true;
				$scope.userId = id;
				userService.show(id)
					.success(function(response){
						$scope.newUsername = response.data.username;
						$scope.newPassword = response.data.password;
						$scope.newName = response.data.name;
						$scope.newEmail = response.data.email;
						$scope.newTelephone = response.data.telephone;
						$scope.newAddress = response.data.address;
						$scope.newCity = response.data.city;
						$scope.newRole = response.data.role;
						$scope.newActive = response.data.active;
					});
				$scope.showEdit = true;
			}

			$scope.updateUser = function(id,newUsername,newPassword,newName,newEmail,newTelephone,newAddress,newCity,newRole,newActive){
				console.log(newUsername);
				$scope.showForm = false;
				emptyFormFields();
				userService.update(id,newUsername,newPassword,newName,newEmail,newTelephone,newAddress,newCity,newRole,newActive).
					success(function(response){
						$scope.message = response.data;
					})
				getUsers();
			}

			$scope.deleteUser = function(id){
				userService.delete(id);
				getUsers();
			}
		});
})();