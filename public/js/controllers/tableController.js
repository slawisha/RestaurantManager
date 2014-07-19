(function(){
	angular.module('restaurantApp')
		.controller('tableController', function($scope, tableService, authService, reservationService){

			$scope.logged = null;
			$scope.showForm = false;
			$scope.start =7;
			$scope.end = 23;
			$scope.hours = [];
			$scope.seats =[];
			$scope.reservedTables = [];
			var currentDate = new Date();
			$scope.currentTime = currentDate.getHours() + ':00';
			//$scope.time = $scope.currentTime;

			for (var i = $scope.start; i <= $scope.end; i++) {
				$scope.hours.push(i + ':00');
				$scope.hours.push(i + ':30');
			};

			for(var i=1; i<=8; i++){
				$scope.seats.push(i);
			}

			$scope.time = $scope.hours[0];

			var loadTables = function(){
				tableService.all()
					.success(function(response){
						$scope.tables = response.data;
					})
					.error(function(){
						console.log('error');
					});
			}

			var checkIfLogged = function(){
				authService.check()
					.success(function(response){
						$scope.logged = response.status;
					});

			}
			//search reservations
			$scope.searchReservations = function (day, month , year, time){
				reservationService.check(day, month , year, time)
					.success(function(response){
						$scope.reservedTables = response.data;
					});
			} 

			loadTables();
			checkIfLogged();
			$scope.searchReservations(currentDate.getDate(), currentDate.getMonth()+1, 
				currentDate.getFullYear(), $scope.currentTime);

			$scope.makeReservation = function(tableId, day, month , year, time){
				if($scope.logged == 'OK'){
					reservationService.create(tableId, day, month , year, time);
					$scope.reservedTables.push(tableId);
					//loadTables();
					alert('Table' + tableId + ' booked for ' + day + '/' + month + '/' + year + ' ' + time);
				} else {
					alert('You must be logged in to make reservations');
				}
			}


			//datePicker
			$scope.today = function() {
    			$scope.dt = new Date();
  			};
  			$scope.today();

		  $scope.clear = function () {
		    $scope.dt = null;
		  };

		  // Disable weekend selection
		  // $scope.disabled = function(date, mode) {
		  //   return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
		  // };

		  $scope.toggleMin = function() {
		    $scope.minDate = $scope.minDate ? null : new Date();
		  };
		  $scope.toggleMin();

		  $scope.open = function($event) {
		    $event.preventDefault();
		    $event.stopPropagation();

		    $scope.opened = true;
		  };

		  $scope.dateOptions = {
		    formatYear: 'yy',
		    startingDay: 1
		  };

		  $scope.initDate = new Date('2016-15-20');
		  $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
		  $scope.format = $scope.formats[0];

			
		});


})();