 angular.module('myFirstApp', [])
            .controller('loginController', ['$scope', '$http', '$templateCache',
                function ($scope, $http, $templateCache, Data) {

                    $scope.doLogin = function () {
                        var request = $http({
                            method: "post",
                            url: "index.php/login/checkLogin",
                            data: {
                                email: $scope.email,
                                password: $scope.password
                            },
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                        });
                        /* Successful HTTP post request or not */
                        request.success(function (data) {
                            if (data == "1") {
                                $.notify("Successfully Logged In", "success",
                                { position:"top right",
                                    style: 'bootstrap',
                                     autoHideDelay: 3000
                                });
                            }
                            else {
//                                alert("Not logged in");
                                $.notify("Username or Password is incorrect", 
                                {
                                    position:"top right",
                                    style: 'bootstrap',
                                    autoHideDelay: 3000
                                });
                                $scope.responseMessage = "Username or Password is incorrect";
                            }
                        });
                    }
                }]);