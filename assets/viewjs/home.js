var base_url = document.getElementById("base_url").value;
$(document).ready(function () {             // Datatable code 

    $('#access-level').DataTable({
        responsive: true,
        "oLanguage": {
            "sProcessing": "<img src='" + base_url + "../assets/img/ajax-loader.gif'>"},
        "ordering": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + "home/get_all_access", "bDeferRender": true,
        "aLengthMenu": [[10, 30, 50, 100, -1], [10, 30, 50, 100, $("#sAll").val()]],
// "sPaginationType": "full_numbers",
        "iDisplayLength": 10,
        "bDestroy": true, //!!!--- for remove data table warning.
        "aoColumnDefs": [
            {"aTargets": [0]},
            {"sClass": "aligncenter", "aTargets": [0]},
            {"sClass": "eamil_conform aligncenter", "aTargets": [1]},
            {"sClass": "hidden-phone", "aTargets": [2]},
            {"sClass": "hidden-phone", "aTargets": [3]}
        ]}
    );
});

//Angulat js code

app.controller('accessController', ['$scope', '$http', '$templateCache',
    function ($scope, $http, $templateCache, Data) {
        $scope.newObject = {};
        $scope.features = [{feature_id:1,feature: 'foo'}, {feature_id:2,feature: 'bar'}, {feature_id:3,feature: 'baz'}];
        
        $scope.createAccess = function () {
            alert();
            var request = $http({
                method: "post",
                url: base_url + "index.php/login/checkLogin",
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
                                position: "top right",
                                style: 'bootstrap',
                                autoHideDelay: 3000
                            });

                    window.location.href = base_url + "index.php/home/index";
                }
                else {
                    //                                alert("Not logged in");
                    $.notify("Username or Password is incorrect",
                            {
                                position: "top right",
                                style: 'bootstrap',
                                autoHideDelay: 3000
                            });
                    $scope.responseMessage = "Username or Password is incorrect";
                }
            });
        }
    }]);
