var base_url = document.getElementById("base_url").value;
var table;
$(document).ready(function () {             // Datatable code 

    table = $('#access-level').DataTable({
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
            {"sClass": "text-center", "aTargets": [0]},
            {"sClass": "text-center", "aTargets": [1]},
            {"sClass": "text-center", "aTargets": [2]},
            {"sClass": "text-center", "aTargets": [3]}
        ]}
    );

});



//Angulat js code

app.controller('accessController', ['$scope', '$http', '$templateCache',
    function ($scope, $http, $templateCache, Data) {

        $scope.newObject = {};
        $scope.master = {};
        $scope.features = [];
        $scope.show_err = 'test';
        $http.get(base_url + "home/get_feature").
                success(function (data, status, headers, config) {
                    $scope.features = data;
//                    $scope.reload();
                });

//                $compile($('#access-level_wrapper').html())($scope);
//        $scope.someSelected = function (object) {
////            return Object.keys(object).some(function (key) {
//
//                var count = object.length;
////                alert(count);
//                if(count > 0){
////                    alert(count);
//                    return false;
//                }
//                else{
//                    return true;
//                }
//          
//        };

        $scope.edit = function (acc_id) {
            alert(acc_id);
        }


        $scope.createAccess = function () {
            console.log($scope.newObject);
            var request = $http({
                method: "post",
                url: base_url + "home/add_access",
                data: {
                    access_name: $scope.access_name,
                    feature_id: $scope.newObject
                },
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            });
            /* Successful HTTP post request or not */
            request.success(function (data) {

                if (data.status == "1") {
                    $.notify(data.msg,
                            {
                                position: "top right",
                                style: 'bootstrap',
                                autoHideDelay: 3000
                            }, 'success');
                    $scope.show_err = 'asd';

                    $('#res').click();
                    $('#close').click();
                    table.ajax.reload();
                }
                else {
                    $.notify(data.msg,
                            {
                                position: "top right",
                                style: 'bootstrap',
                                autoHideDelay: 3000
                            });
                    console.log($scope);
                    $scope.show_err = '';
                    $scope.msg = data.msg;

                }
            });
        }

    }]);
