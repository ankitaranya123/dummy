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
        $scope.master = {access_id: -1, access_name: '', newObject: {}, status: '1', count: 0};
        $scope.access = {};
        $scope.submitted = false;
        $scope.access.access_id = -1;
        $scope.access.count = 0;
        $scope.features = [];
        $scope.show_err = 'test';
        $http.get(base_url + "home/get_feature").
                success(function (data, status, headers, config) {
                    $scope.features = data;
                });

        $(document).on('click', '#create_level', function () {
            $scope.access = angular.copy($scope.master);
            $('#myModal').modal('show');
            $('#res').click();
        });

        $(document).on('click', '.del', function () {
            var id = $(this).attr('data-id');
            bootbox.confirm("Are you sure?", function (result) {
                if (result == true) {
                    $http.get(base_url + "home/access_delete/" + id).
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
            $scope.access.access_name = $(this).parent().siblings('.level').html();
            $scope.access.access_id = $(this).attr('data-id');
            $scope.access.status = $(this).parent().siblings('.status').children('.label').attr("data-attr");
            $http.get(base_url + "home/get_access_relation/" + $(this).attr('data-id')).
                    success(function (data, status, headers, config) {
                        var value = angular.fromJson(data);
                        $scope.access.newObject = value;
                        $('#myModal').modal('show');
                    });
        });

        $scope.chk = function (modalname) {
            console.log(modalname);
            if ($scope.access.newObject[modalname] == true) {
                $scope.access.count++;
            } else {
                if ($scope.access.count)
                    $scope.access.count = $scope.access.count - 1;
            }

            if ($scope.access.count == 0)
            {
                $scope.access.req = 1;
            }

        };

        $scope.createAccess = function (form) {
            
            $scope.submitted = true;
            if (form.$valid) {

                var request = $http({
                    method: "post",
                    url: base_url + "home/add_access",
                    data: {
                        access_id: $scope.access.access_id,
                        access_name: $scope.access.access_name,
                        feature_id: $scope.access.newObject,
                        status: $scope.access.status
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
                        $scope.access = {};
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
        }

    }]);
