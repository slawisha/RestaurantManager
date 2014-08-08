(function(){
	angular.module(['restaurantApp'])
		.controller('adminController', function($scope, tableService){

			$scope.showForm = false;
			$scope.showEdit = false;
			$scope.loading = false;

			$scope.toggleForm = function(){
				$scope.showForm = !$scope.showForm;
				$scope.showEdit = false;
				//emptyFormFields();				
			}

			$scope.tableList = [];

			$scope.getTableList = function(){
				//var tableNumber = null;
				tableService.all(1,20) 
					.success(function(response){
						var tableNumber = response.data.length;						
						for(var i=1; i<=tableNumber; i++){
							$scope.tableList.push(i);
						}
						// console.log($scope.tableList);
					});
				
			}

			$scope.getTableList();

		});
})();