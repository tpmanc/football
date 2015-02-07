var myAppModule = angular.module('myApp', ['lumx']);

function stadiumController($scope, $http, LxNotificationService) {
	$scope.textFields = {};
	$scope.textFields.id = '';
	$scope.textFields.title = '';
	$scope.textFields.adress = '';
	$scope.error = {};
	$scope.error.title = false;
	$scope.error.adress = false;
	$scope.saveData = function(){
		var action = '';
		var placeParams = {};
		if( itemId == 'new' ){
			action = 'create';
			placeParams.title = $scope.textFields.title;
			placeParams.adress = $scope.textFields.adress;
		}else{
			action = 'save';
			placeParams.id = $scope.textFields.id;
			placeParams.title = $scope.textFields.title;
			placeParams.adress = $scope.textFields.adress;
		}
		$http({method: 'GET', url: 'http://football/web/index.php/ajax/'+action+'-place', params: placeParams}).
			success(function(data, status) {
				if( data.success != undefined ){
					if( data.success ){
						LxNotificationService.success('Сохранено');
					}else{
						LxNotificationService.error('Ошибка при сохранении');
					}
				}else{
					if( data['places-title'] != undefined ){
						$scope.error.title = true;
						LxNotificationService.notify(data['places-title'][0], undefined, true);
					}else{
						$scope.error.title = false;
					}
					if( data['places-adress'] != undefined ){
						$scope.error.adress = true;
						LxNotificationService.notify(data['places-adress'][0], undefined, true);
					}else{
						$scope.error.adress = false;
					}
				}
			})
			.
			error(function(data, status) {			
			});
	}
	if( itemId != 'new' ){
		$http({method: 'GET', url: 'http://football/web/index.php/ajax/place-info', params: {id: itemId}}).
			success(function(data, status) {
				$scope.textFields.id = data.id;
				$scope.textFields.title = data.title;
				$scope.textFields.adress = data.adress;
			})
			.
			error(function(data, status) {			
			});
	}
}

function matchController($scope, $http, LxNotificationService) {
	$scope.textFields = {};
	$scope.datepicker = {};
	$scope.textFields.id = '';
	$scope.datepicker.date = new Date();
	$scope.textFields.onlyTime = '';
	$scope.textFields.placeId = '';
	$scope.textFields.score = '';
	$scope.error = {};
	$scope.error.date = false;
	$scope.error.time = false;
	$scope.error.placeId = false;
	$scope.error.score = false;
	$scope.saveData = function(){
		var action = '';
		var placeParams = {};
		if( itemId == 'new' ){
			action = 'create';
			placeParams.onlyDate = moment.unix($scope.datepicker.date).format('DD.MM.YYYY');
			placeParams.onlyTime = $scope.textFields.onlyTime;
			placeParams.placeId = $scope.textFields.placeId;
		}else{
			action = 'save';
			placeParams.id = $scope.textFields.id;
			placeParams.onlyDate =  moment.unix($scope.datepicker.date).format('DD.MM.YYYY');
			placeParams.onlyTime = $scope.textFields.onlyTime;
			placeParams.placeId = $scope.textFields.placeId;
			placeParams.score = $scope.textFields.score;
		}
		console.log();
		$http({method: 'GET', url: 'http://football/web/index.php/ajax/'+action+'-match', params: placeParams}).
			success(function(data, status) {
				if( data.success != undefined ){
					if( data.success ){
						LxNotificationService.success('Сохранено');
					}else{
						LxNotificationService.error('Ошибка при сохранении');
					}
				}else{
					if( data['places-title'] != undefined ){
						$scope.error.title = true;
						LxNotificationService.notify(data['places-title'][0], undefined, true);
					}else{
						$scope.error.title = false;
					}
					if( data['places-adress'] != undefined ){
						$scope.error.adress = true;
						LxNotificationService.notify(data['places-adress'][0], undefined, true);
					}else{
						$scope.error.adress = false;
					}
				}
			})
			.
			error(function(data, status) {			
			});
	}
	if( itemId != 'new' ){
		$http({method: 'GET', url: 'http://football/web/index.php/ajax/match-info', params: {id: itemId}}).
			success(function(data, status) {
				$scope.textFields.id = data.id;
				$scope.datepicker.date = moment.unix(data.onlyDate);
				$scope.textFields.onlyTime = data.onlyTime;
				$scope.textFields.placeId = data.placeId;
				$scope.textFields.score = data.score;
				console.log($scope.datepicker.date);
			})
			.
			error(function(data, status) {			
			});
	}
}

myAppModule.controller('stadiumController', stadiumController);
myAppModule.controller('matchController', matchController);

$(function(){
	$('.rightFixed').addClass('animated bounceInUp');
	$('#topDropDown').show();
});