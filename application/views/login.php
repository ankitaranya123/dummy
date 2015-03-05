<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" ng-controller="loginController" method="post" name="loginForm">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" ng-model="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" ng-model="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <!--<a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
                            <input type="submit" ng-click="doLogin()" class="btn btn-lg btn-success btn-block" value="Login" >
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    

angular.module('myFirstApp', [])
.controller('loginController', ['$scope', '$http', '$templateCache',
  function($scope, $http, $templateCache,Data) {
  
      $scope.doLogin = function () {
            var request = $http({
                method: "post",
                url: "index.php/login/checkLogin",
                data: {
                    email: $scope.email,
                    password: $scope.password
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
            /* Successful HTTP post request or not */
            request.success(function (data) {
                if(data == "1"){
                    alert("Successfully Logged In");
//                 $scope.responseMessage = "Successfully Logged In";
                }
                else {
                    alert("Not logged in");
                 $scope.responseMessage = "Username or Password is incorrect";
                }
            });
    }
  }]);


</script>
