
var base_url = document.getElementById("base_url").value;

    myApp.controller('loginController', ['$scope', '$http', '$templateCache',
        function ($scope, $http, $templateCache, Data) {

            $scope.doLogin = function () {
                var request = $http({
                    method: "post",
                    url: base_url+"index.php/login/checkLogin",
                    data: {
                        email: $scope.email,
                        password: $scope.password
                    },
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                });
                /* Successful HTTP post request or not */
                request.success(function (data) {
                    if (data == "1") {
                        $.notify("Successfully Logged In", "success",
                        {
                            position:"top right",
                            style: 'bootstrap',
                            autoHideDelay: 3000
                        });
                                
                        window.location.href=base_url+"index.php/home/index"; 
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
    
  // register user js....



    myApp.controller('regController', ['$scope', '$http', '$templateCache',
        function ($scope, $http, $templateCache, Data) {

            $scope.doRegister = function () {
                var request = $http({
                    method: "post",
                    url: base_url+"login/doRegister",
                    data: {
                        email: $scope.email,
                        password: $scope.password,
                        fname: $scope.fname,
                        lname: $scope.lname,
                        city: $scope.city,
                        state: $scope.state,
                        country: $scope.country,
                        pincode: $scope.pincode,
                        contact: $scope.contact,
                        access_level: $scope.access_level,
                        dob: $scope.dob
                    },
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                });
                /* Successful HTTP post request or not */
                request.success(function (data) {
                    if (data == "1") {
                        $.notify("You are successfully Registered", "success",
                        {
                            position:"top right",
                            style: 'bootstrap',
                            autoHideDelay: 3000
                        });
                                
                    }
                    else {
                        //                                alert("Not logged in");
                        $.notify("Something Wene wrong.. Please try again", 
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