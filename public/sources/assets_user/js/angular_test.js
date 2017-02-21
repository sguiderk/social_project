var app = angular.module('myApp',[]);

app.controller('myCtrl_update',function($scope,$http){

    $scope.updateData=function(){
        $http.post("../rest/updateuser", {
            'id':$scope.user.id,
            'name':$scope.user.name,
            'email': $scope.user.email,
            'password': $scope.user.password
        })
            .success(function (data, status, headers, config) {
                console.log("Updated Successfully!");
                $scope.displayUser();
            })
            .error(function(data, status) {
                console.error('Repos error', status, data);
            })
        ;
    }

    $scope.displayUser = function(){
        $http.get("../rest/user")
            .success(function(data){

                $scope.user = data.loginHeader;

                $scope.data1 = data.entries;
                



            });
    }


    $scope.findUser = function($id){
        $http.get("../rest/user")
            .success(function(data){
                $scope.data1 = data.entries;
            });
    }


});