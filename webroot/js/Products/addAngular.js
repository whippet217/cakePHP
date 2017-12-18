var app = angular.module('linkedlists', []);

app.controller('categoriesController', function ($scope, $http) {

    $http.get(urlCategoriesListFilter).then(function (response) {
        $scope.categories = response.data;
    });
});

