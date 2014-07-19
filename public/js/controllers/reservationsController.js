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

			$scope.deleteReservation = function(id){
				reservationService.delete(id)
					.success(function(response){
						$message = response.data;
					});
				loadReservations();
			}

			$scope.showForm = false;

			$scope.toggleForm = function(){
				$scope.showForm = !$scope.showForm;
			}

			$scope.updateReservation = function(id, newUsername, newTable, newStart, newEnd){
				console.log(newStart);
				reservationService.update(id, newUsername, newTable, newStart, newEnd)
					.success(function(response){
						$scope.message = response.data;
					})
				$scope.showForm = false;
				loadReservations();
			}

			$scope.editReservation = function(id) {
				$scope.showForm = true;
				$scope.reservationId = id;
				reservationService.show(id)
					.success(function(response){
						$scope.newUsername = response.data.username;		
						$scope.newTable = response.data.table;		
						$scope.newStart = response.data.reservation_start.date;		
						$scope.newEnd = response.data.reservation_end.date;		
					});				 
			}			
		});
})();