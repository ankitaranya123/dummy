var base_url = document.getElementById("base_url").value;

app.controller('loginController', ['$scope', '$http', '$templateCache',
    function ($scope, $http, $templateCache, Data) {

        $scope.login ={
            doLogin:function (form) {
                $scope.submitted=true;
                if(form.$valid){
                    var request = $http({
                        method: "post",
                        url: base_url+"login/checkLogin",
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
                                
                            window.location.href=base_url+"home"; 
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
            }
        };
    }]);
    
// register user js....
app.controller('regController', ['$scope', '$http', '$templateCache','$window',
    function ($scope, $http, $templateCache,$window, Data) {
        //        $scope.submitted = false;
        
        
        // get accec_level...
        
        var getAccessLevel = $http({
            method: "get",
            url: base_url+"login/get_acceslevel"
        });
       
       getAccessLevel.success(function (data) {
      //  console.log(data);   
        $scope.accessLevel = data;
       });
        
        $scope.register = {
            doRegister : function (form) {
                
                $scope.submitted = true;
                if(form.$valid){
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
                            $("#regForm")[0].reset();
                            $.notify("You are successfully Registered", "success",
                            {
                                position:"top center",
                                style: 'bootstrap',
                                autoHideDelay: 3000
                            });
                          
                          
                                
                        }
                        else {
                            $("#regForm")[0].reset();                  
                            //  alert("Not logged in");
                            $.notify("Email allready been taken..", 
                            {
                                position:"top center",
                                style: 'bootstrap',
                                autoHideDelay: 3000
                            });
                          
                        }
                    });
                }
            }
        };
    }]);