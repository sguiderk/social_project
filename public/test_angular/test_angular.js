var app = angular.module('myApp',[]);
app.controller('myCtrl',function($scope,$http){
    $scope.insertData=function(){
        $http.post("insert.php", {
            'name':$scope.name,
            'company': $scope.company
        })
            .success(function (data, status, headers, config) {
                console.log("Inserted Successfully!");
                $scope.displayData();
            })
            .error(function(data, status) {
                console.error('Repos error', status, data);
            })
        ;
    }

    $scope.displayData = function(){
        $http.get("result.php")
            .success(function(data){
                $scope.data1 = data;
            });
    }

    $scope.delete = function(deletingid){

        $http.get("delete.php?id=" + deletingid)
            .success(function(data){
                console.log("deleting Successfully!");
                $scope.displayData();
            })
    }



});

app.controller('myCtrl_update',function($scope,$http){

    $scope.updateData=function(){
        $http.post("update.php", {
            'id':$scope.x.id,
            'name':$scope.x.name,
            'company': $scope.x.company
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
});

app.controller('viewcontroller', function($scope, $http) {


});