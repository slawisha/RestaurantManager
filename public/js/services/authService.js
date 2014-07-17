(function(){
	angular.module('restaurantApp')
		.factory('authService', function($http){
			return {
				check : function(){
					return $http.get('api/v1/auth');
				}
			}
		});
})();