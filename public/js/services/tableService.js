(function(){
	angular.module('restaurantApp')
		.factory('tableService', function($http){
			return {
				all: function(page, perPage){
					return $http.get('/api/v1/tables/?page=' + page + '&perPage=' + perPage);
				}
			}
		});
})();