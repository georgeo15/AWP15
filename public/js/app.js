
function TodoCtrl($scope,$http){
	var app=angular.module('store',[]);

	$http.get('/todos').success(function(){

		$scope.todos=todos;

	});
	$scope.remaining=function(){
		var count=0;
		angular.forEach($scope.todos,function(todo){
			count += todo.done ? 0 ; 1;
		});
	}

	
}