<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src='<?= base_url() ?>assets/angular.min.js'></script>
    <title>Username Availability Check Dengan AngularJS Dan CodeIgniter3</title>
</head>
<body ng-app='myapp'>
    <div ng-controller='userCtrl'>
	<form name='form_reg'>
            <table>
                <tr>
                    <td>Username : </td>
                    <td><input type='text' name='username' ng-model='username' ng-keyup='checUsername()'>
                        <span style='color: red;' ng-show="isvalid">Username is not available!</span>
                    </td>
                </tr>
                <tr>
                    <td>Name : </td>
                    <td><input type='text' name='name' ng-model='name'></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type='text' name='email' ng-model='email'></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type='password' name='password' ng-model='password'></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type='button' value='Submit' ng-click='saveUserDetails();'></td>
                </tr>
            </table>
	</form>
    </div>

    <!-- Script -->
    <script>
        var fetch = angular.module('myapp', []);
        fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {
            $scope.isvalid = false;
            // Check username availability
            $scope.checUsername = function(){
                $http({
                    method: 'post',
                    url: '<?= base_url() ?>index.php/User/checkUsername',
                    data: {username: $scope.username},
                }).then(function successCallback(response) {
                    if(response.data > 0){
                        $scope.isvalid = true;
                    }else{
                        $scope.isvalid = false;
                    }
                });
            }

            // Save user
            $scope.saveUserDetails = function(){
                var name = $scope.name;
                var username = $scope.username;
                var email = $scope.email;
                var password = $scope.password;
                if(name !='' && username != '' && email != '' && password != ''){
                    if(!$scope.isvalid){
                        $http({
                            method: 'post',
                            url: '<?= base_url() ?>index.php/User/saveUserDetails',
                            data: {name: name,username: username, email: email, password: password},
                        }).then(function successCallback(response) {
                            if(response.data == 1){
                                $scope.name = "";
                                $scope.username = "";
                                $scope.email = "";
                                $scope.password = "";
                                alert('Save successfully');
                            }
                        });
                    }
                }else{
                    alert('Fill all details');
                }
            }

        }]);
    </script>

</body>
</html>