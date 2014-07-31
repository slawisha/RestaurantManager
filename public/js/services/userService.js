(function(){
	angular.module('restaurantApp')
		.factory('userService', function($http){
			return{
				all: function(page){
					return $http.get('api/v1/users/?page=' + page);
				},
				save: function(username, password, name, email, telephone, address, city, role, active) {
					return $http({
							method: 'POST',
							url: 'api/v1/users',
							params: {username:username, password:password, name:name, telephone:telephone, email:email, address:address,
								city:city, role:role, active:active}
						});
				},
				show: function(id){
					return $http.get('api/v1/users/' + id);
				},
				update: function(id, username, password, name, email, telephone, address, city, role, active){
					return $http({
						method: 'PUT',
						url: 'api/v1/users/' + id,
						params: {username:username, password:password, name:name, telephone:telephone, email:email, address:address,
							city:city, role:role, active:active}
					})
				},
				delete: function(id){
					return $http({
						method: 'DELETE',
						url: 'api/v1/users/' + id
					});
				},
				reservations: function(){
					return $http.get('api/v1/users/reservations');
				}
			}
		})
})();