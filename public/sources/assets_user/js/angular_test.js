

var app = angular.module('myApp', ['ngFileUpload']);




app.controller('myCtrl_update', ['$scope', 'Upload', '$timeout','$http' , function ($scope, Upload, $timeout,$http) {




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

    $scope.uploadPic = function(file) {
        file.upload = Upload.upload({
            url: '../rest/uploadimage',
            data: {file: file}
        });

        file.upload.then(function (response) {
            $timeout(function () {
                file.result = response.data;
            });
        }, function (response) {
            if (response.status > 0)
                $scope.errorMsg = response.status + ': ' + response.data;
        }, function (evt) {
            // Math.min is to fix IE which reports 200% sometimes
            file.progress = Math.min(50, parseInt(100.0 * evt.loaded / evt.total));
        });
    }



}]);
