var app = angular.module('myApp',[]);

app.controller('myCtrl_update',function($scope,$http){

    $scope.updateData=function(){
        $http.get("../rest/updateuser", {
            'id':$scope.user.id,
            'name':$scope.user.name,
            'email': $scope.user.email,
            'password': $scope.user.password
        })
            .success(function (data, status, headers, config) {
                console.log("Updated Successfully!");
                $scope.displayData();
            })
            .error(function(data, status) {
                console.error('Repos error', status, data);
            })
        ;
    }

    $scope.displayData = function(){
        $http.get("../rest/user")
            .success(function(data){
                $scope.data1 = data.entries;
            });
    }


});