<!DOCTYPE html>
<html>
<script  src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<body ng-app="myApp" >

<div  ng-controller="myCtrl"  ng-init="displayData()" >

    <form>
        Name:-<input type="text" ng-model="name" />
        Phone:-<input type="text" ng-model="company" />
        <input type="button" value="Submit" ng-click="insertData()" />
    </form>




    {{data1.length}}
    <table  >

        <tr ng-repeat="x in data1" >


            <td ng-hide="isEditForm"  ><span style="display: inline-block">{{ x.id }} | {{ x.name }} | {{ x.company }} | </span> <div  style="display: inline-block" ng-click="delete(x.id,$index)">Delete</div>

                <button style="display: inline-block" ng-click="isEditForm=true;">Edit product</button>  </td>

            <td>

                <div  ng-controller="myCtrl_update" ng-show="isEditForm"   >
                    <label>Enter id</label><input ng-model="x.id" />
                    <label>Enter Name</label><input ng-model="x.name" />
                    <label>Enter Company</label><input ng-model="x.company" />
                    <button type="button"  ng-click="updateData();isEditForm=false;" >update</button>
                </div>

            </td>


        </tr>



    </table>

</div>


</body>

<script src="test_angular.js" ></script>
</html>
