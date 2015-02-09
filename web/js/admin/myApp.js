var myAppModule = angular.module('myApp', ['lumx']);

var ajaxUrl = 'http://football/web/index.php/ajax/';

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
		$http({method: 'GET', url: ajaxUrl+action+'-place', params: placeParams}).
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
		$http({method: 'GET', url: ajaxUrl+'place-info', params: {id: itemId}}).
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
	$scope.textFields.placeId = 1;
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
			placeParams.onlyDate = moment(dpScope.selected.date).format('DD.MM.YYYY');
			placeParams.onlyTime = $scope.textFields.onlyTime;
			placeParams.placeId = $scope.textFields.placeId;
		}else{
			action = 'save';
			placeParams.id = $scope.textFields.id;
			placeParams.onlyDate =  moment(dpScope.selected.date).format('DD.MM.YYYY');
			placeParams.onlyTime = $scope.textFields.onlyTime;
			placeParams.placeId = $scope.textFields.placeId;
			placeParams.score = $scope.textFields.score;
		}
		$http({method: 'GET', url: ajaxUrl+action+'-match', params: placeParams}).
			success(function(data, status) {
				if( data.success != undefined ){
					if( data.success ){
						LxNotificationService.success('Сохранено');
					}else{
						LxNotificationService.error('Ошибка при сохранении');
					}
				}else{
					if( data['matches-onlydate'] != undefined ){
						$scope.error.date = true;
						LxNotificationService.notify(data['matches-onlydate'][0], undefined, true);
					}else{
						$scope.error.date = false;
					}
					if( data['matches-onlytime'] != undefined ){
						$scope.error.time = true;
						LxNotificationService.notify(data['matches-onlytime'][0], undefined, true);
					}else{
						$scope.error.time = false;
					}
					if( data['matches-placeId'] != undefined ){
						$scope.error.placeId = true;
						LxNotificationService.notify(data['matches-placeId'][0], undefined, true);
					}else{
						$scope.error.placeId = false;
					}
					if( data['matches-score'] != undefined ){
						$scope.error.score = true;
						LxNotificationService.notify(data['matches-score'][0], undefined, true);
					}else{
						$scope.error.score = false;
					}
				}
			})
			.
			error(function(data, status) {			
			});
	}
	if( itemId != 'new' ){
		$http({method: 'GET', url: ajaxUrl+'match-info', params: {id: itemId}}).
			success(function(data, status) {
				$scope.textFields.id = data.id;
				$scope.datepicker.date = moment.unix(data.onlyDate)._i;
				$scope.textFields.onlyTime = data.onlyTime;
				$scope.textFields.placeId = data.placeId;
				$scope.textFields.score = data.score;
				dpScope.select(moment($scope.datepicker.date));
				dpScope.selectYear(moment($scope.datepicker.date).format('YYYY'));
				// dpScope.activeDate.month( moment($scope.datepicker.date).format('YYYY') );
				dpScope.$broadcast();
				// dpScope.$apply();
			})
			.
			error(function(data, status) {			
			});
	}
}

myAppModule.controller('stadiumController', stadiumController);
myAppModule.controller('matchController', matchController);

var elem,dpScope;
$(function(){
	elem = document.querySelector('input[ng-model="selected.model"]');
	dpScope = angular.element(elem).scope();
	$('.rightFixed').addClass('animated bounceInUp');
	$('#topDropDown').show();
});