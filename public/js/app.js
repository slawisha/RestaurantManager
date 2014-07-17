(function(){
	var restaurantApp = angular.module('restaurantApp', ['ngRoute','ui.bootstrap']);
		restaurantApp.config(function($routeProvider, $locationProvider){
			$routeProvider.
				when('/', {
					controller : 'indexController',
					templateUrl : 'templates/index.html'  
				}).
				when('/admin/users', {
					controller : 'usersController',
					templateUrl : 'templates/new-user.html'  
				}).
				otherwise({
					redirectTo: '/'
				});

				// $locationProvider.html5Mode(true);
		});
})();