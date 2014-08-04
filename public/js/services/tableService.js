(function(){
	angular.module('restaurantApp')
		.factory('tableService', function($http){
			return {
				all: function(page, perPage){
					return $http.get('/api/v1/tables/?page=' + page + '&perPage=' + perPage);
				},
				show: function(id){
					return $http.get('/api/v1/tables/' + id);
				},
				create:function(number, seats, position, description, available, thumbnail){
					return $http({
						method: 'POST',
						url: 'api/v1/tables',
						params: {number:number, seats:seats, position:position, description:description, available:available,thumbnail:thumbnail}
					});
				},
				update:function(id, number, seats, position, description, available, thumbnail){
					return $http({
						method: 'PUT',
						url: 'api/v1/tables/' + id,
						params: {number:number, seats:seats, position:position, description:description, available:available,thumbnail:thumbnail}
					});
				},
				delete:function(id){
					return $http({
						method: 'DELETE',
						url: 'api/v1/tables/' + id 
					});
				}
			}
		});
})();