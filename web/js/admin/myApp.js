var myAppModule = angular.module('myApp', ['lumx']);
 
// настройка модуля.
// в примере мы создаем приветственный фильтр
myAppModule.filter('greet', function() {
	return function(name) {
		return 'Hello, ' + name + '!';
	};
});