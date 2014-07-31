(function(){
	angular.module('restaurantApp')
		.controller('reservationsController', function($scope, reservationService){

			$scope.pages = [];

			var loadReservations = function(){
				reservationService.all(1)
					.success(function(response){
						$scope.reservations = response.data;
						$scope.currentPage = response.paginator.current_page;
						$scope.lastPage = response.paginator.last_page;
						for (i=1; i<=$scope.lastPage; i++){
							$scope.pages.push(i);
						} 
					});
			}

			var loadReservationsByPage = function(page) {
				reservationService.all(page)
					.success(function(response){
						$scope.reservations = response.data;
					});
					$scope.currentPage = page;
			}

			loadReservations();

			$scope.loadFirstPage = function(){
				loadReservationsByPage(1);
			}

			$scope.loadLastPage = function(){
				loadReservationsByPage($scope.lastPage);
			}

			$scope.loadNthPage = function(page){
				loadReservationsByPage(page);
			}

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

			$scope.updateReservation = function(id, newUsername, newTable, newStart, newEnd, active){
				reservationService.update(id, newUsername, newTable, newStart, newEnd, active)
					.success(function(response){
						$scope.message = response.data;
					})
				$scope.showForm = false;
				loadReservations();
			}

			$scope.editReservation = function(id) {
				$scope.showForm = true;
				$scope.reservationId = id;
				//$scope.getTableList();
				console.log($scope.tableList);
				reservationService.show(id)
					.success(function(response){
						$scope.newUsername = response.data.username;		
						$scope.newTable = response.data.table;		
						$scope.newStart = response.data.reservation_start.date;		
						$scope.newEnd = response.data.reservation_end.date;		
						$scope.newActive = response.data.active;		
					});				 
			}	

					
		});
})();