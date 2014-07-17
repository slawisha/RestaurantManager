(function(){
	angular.module('restaurantApp')
		.factory('tableService', function($http){
			return {
				all: function(){
					return $http.get('/api/v1/tables');
				}
			}
		});
})();