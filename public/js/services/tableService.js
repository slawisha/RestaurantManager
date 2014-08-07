(function(){
	angular.module('restaurantApp')
		.factory('tableService', function($http, $upload){
			return {
				all: function(page, perPage){
					return $http.get('/api/v1/tables/?page=' + page + '&perPage=' + perPage);
				},
				show: function(id){
					return $http.get('/api/v1/tables/' + id);
				},
				create:function(number, seats, position, description, available, thumbnail){
					return $upload.upload({
						method: 'POST',
						url: 'api/v1/tables',
						headers: {'Content-Type':'multipart/form-data'},
						data: {number:number, seats:seats, position:position, description:description, available:available},
						file: thumbnail
					});
				},
				update:function(id, number, seats, position, description, available, thumbnail){
					return $upload.upload({
						url: 'api/v1/tables/' + id,
						method: 'POST',
						headers: {'Content-Type':'multipart/form-data'},
						// headers: {'Content-Type':'x-www-form-urlencoded'},
						data: {number:number, seats:seats, position:position, description:description, available:available},
						file: thumbnail
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