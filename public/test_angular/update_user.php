<!DOCTYPE html>
<html>
<script  src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js">  </script>
<body>
<div ng-app="myApp" ng-controller="myCtrl_update">
    <form>

        Id:-<input type="text" ng-model="id" />
        Name:-<input type="text" ng-model="name" />
        Phone:-<input type="text" ng-model="company" />
        <input type="button" value="Submit" ng-click="updateData()" />

        {{name}}
    </form>
</div>
</body>

<script src="test_angular.js" ></script>
</html>
