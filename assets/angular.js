var app = angular.module('myApp', []);
app.controller('list', function($scope, $http)
{
    $http.get("http://localhost:8888/Api_create/api.php?albums").then(function(response)
    {
        $scope.album= response.data;
    });
    $http.get("http://localhost:8888/Api_create/api.php?genre").then(function(response)
    {
        $scope.genre= response.data;
    });
    $http.get("http://localhost:8888/Api_create/api.php?artists").then(function(response)
    {
        $scope.artist= response.data;
    });
    $scope.show_album_details = function(id)
    {
        $http.get("http://localhost:8888/Api_create/api.php?albums="+id).then(function(response)
        {
            $scope.tracks= response.data;
        });
    };
    $scope.get_artist = function(name)
    {
        $http.get("http://localhost:8888/Api_create/api.php?description="+name).then(function(response)
        {
            $scope.details= response.data;
        });
    };
    $scope.get_genre = function(id)
    {
        $http.get("http://localhost:8888/Api_create/api.php?genre="+id).then(function(response)
        {
            $scope.genre_details= response.data;
        });
    };
});
