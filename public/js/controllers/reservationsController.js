(function(){
	angular.module('restaurantApp')
		.controller('reservationsController', function($scope, reservationService){
			var loadReservations = function(){
				reservationService.all()
					.success(function(response){
						$scope.reservations = response.data;
					});
			}

			loadReservations();
		});
})();