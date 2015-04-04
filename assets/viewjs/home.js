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
            {"sClass": "text-center id", "aTargets": [0]},
            {"sClass": "text-center level", "aTargets": [1]},
            {"sClass": "text-center status", "aTargets": [2]},
            {"sClass": "text-center", "aTargets": [3]}
        ]}
    );


});



//Angulat js code

app.controller('accessController', ['$scope', '$http', '$templateCache',
    function ($scope, $http, $templateCache, Data) {

        $scope.newObject = {};
        $scope.master = {};
        $scope.access_id = -1;
        $scope.features = [];
        $scope.show_err = 'test';
        $http.get(base_url + "home/get_feature").
                success(function (data, status, headers, config) {
                    $scope.features = data;
//                    $scope.reload();
                });

        $(document).on('click', '#create_level', function () {
            $scope.access_level.newObject = {};
            $scope.access_id = 0;
            console.log( $scope.access_level);
            alert( $scope.access_id);
            console.log($("#access_level").reset());
            $('#res').click();
        });

        $(document).on('click', '.del', function () {
            bootbox.confirm("Are you sure?", function (result) {
                if (result == true) {
                    $http.get(base_url + "home/access_delete/" + $(this).attr('data-id')).
                            success(function (data, status, headers, config) {
                                table.ajax.reload();
                                $.notify('Access Level deleted',
                                        {
                                            position: "top right",
                                            style: 'bootstrap',
                                            autoHideDelay: 3000
                                        });
                            });
                }
            });

        });

        $(document).on('click', '.edt', function () {
            $scope.access_name = $(this).parent().siblings('.level').html();
            console.log($(this).parent().siblings('.level').html());
            $scope.access_id = $(this).attr('data-id');
            $http.get(base_url + "home/get_access_relation/" + $(this).attr('data-id')).
                    success(function (data, status, headers, config) {

                        var value = angular.fromJson(data);
                        $scope.access_level.newObject = value;
                        
                        $('#myModal').modal('show');
                       // $scope.reload();
                    });
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


        $scope.createAccess = function () {
            console.log($scope.access_level.newObject);
            var request = $http({
                method: "post",
                url: base_url + "home/add_access",
                data: {
                    access_id: $scope.access_id,
                    access_name: $scope.access_name,
                    feature_id: $scope.access_level.newObject
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
