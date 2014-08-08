(function(){
	angular.module('restaurantApp')
		.controller('reservationsController', function($scope, reservationService, toaster){

			$scope.pages = [];
			$scope.editReservationIndex = null;

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
				$scope.loading = true;
				reservationService.all(page)
					.success(function(response){
						$scope.reservations = response.data;
						$scope.loading = false;
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

			$scope.deleteReservation = function(id, index){
				reservationService.delete(id)
					.success(function(response){
						$message = response.data;
						toaster.pop('success', "", $scope.message);
					});
				$scope.reservations.splice(index,1);
			}

			$scope.showForm = false;

			$scope.toggleForm = function(){
				$scope.showForm = !$scope.showForm;
			}

			$scope.updateReservation = function(id, newUser, newUsername, newTable, newStart, newEnd, active){
				$scope.loading = true;
				reservationService.update(id, newUsername, newTable, newStart, newEnd, active)
					.success(function(response){
						$scope.message = response.data;
						toaster.pop('success', "", $scope.message);
					})
				$scope.showForm = false;
				console.log(newStart);
				$scope.reservations.splice($scope.editReservationIndex,1); //remove updated reservation
				var newReservation = {user:newUser, username:newUsername, table:newTable, reservation_start:{date:newStart}, reservation_end:{date:newEnd}, active:active};
				$scope.reservations.splice($scope.editReservationIndex,0, newReservation); //push back the updated reservation
				console.log($scope.reservations);
				$scope.loading = false;
			}

			$scope.editReservation = function(id, index) {
				$scope.showForm = true;
				$scope.reservationId = id;
				$scope.loading = true;
				$scope.editReservationIndex = index;
				//$scope.getTableList();
				console.log($scope.tableList);
				reservationService.show(id)
					.success(function(response){
						console.log(response.data.table_number);
						$scope.newUser = response.data.user;
						$scope.newUsername = response.data.username;										
						$scope.newTable = response.data.table_number;		
						$scope.newStart = response.data.reservation_start.date;		
						$scope.newEnd = response.data.reservation_end.date;		
						$scope.newActive = response.data.active;		
						$scope.loading = false;
					});				 
			}	

					
		});
})();