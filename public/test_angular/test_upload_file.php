<!DOCTYPE html>
<html>
<script  src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://angular-file-upload.appspot.com/js/ng-file-upload-shim.js"></script>
<script src="https://angular-file-upload.appspot.com/js/ng-file-upload.js"></script>
<body ng-app="fileUpload" ng-controller="MyCtrl">
<form name="myForm">
    <fieldset>
        <legend>Upload on form submit</legend>
        Username:
        <input type="text" name="userName" ng-model="username" size="31" required>
        <i ng-show="myForm.userName.$error.required">*required</i>
        <br>Photo:
        <input type="file" ngf-select ng-model="picFile" name="file"
               accept="image/*" ngf-max-size="2MB" required
               ngf-model-invalid="errorFile">
        <i ng-show="myForm.file.$error.required">*required</i><br>
        <i ng-show="myForm.file.$error.maxSize">File too large
            {{errorFile.size / 1000000|number:1}}MB: max 2M</i>
        <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb"> <button ng-click="picFile = null" ng-show="picFile">Remove</button>
        <br>
        <button ng-disabled="!myForm.$valid"
                ng-click="uploadPic(picFile)">Submit</button>
      <span class="progress" ng-show="picFile.progress >= 0">
        <div style="width:{{picFile.progress}}%"
             ng-bind="picFile.progress + '%'"></div>
      </span>
        <span ng-show="picFile.result">Upload Successful</span>
        <span class="err" ng-show="errorMsg">{{errorMsg}}</span>
    </fieldset>
    <br>
</form>
</body>
<script src="test_angular_upload.js" ></script>
</html>
