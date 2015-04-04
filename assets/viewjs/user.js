var base_url = document.getElementById("base_url").value;
var oTable;
$(document).ready(function () {   
// datatable for all users
 oTable = $('#userlist').DataTable({
        responsive: true,
        "oLanguage": {
            "sProcessing": "<img src='" + base_url + "../assets/img/ajax-loader.gif'>"},
        "ordering": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + "user/get_all_users", "bDeferRender": true,
        "aLengthMenu": [[10, 30, 50, 100, -1], [10, 30, 50, 100, $("#sAll").val()]],
// "sPaginationType": "full_numbers",
        "iDisplayLength": 10,
        "bDestroy": true, //!!!--- for remove data table warning.
        "aoColumnDefs": [
            {"aTargets": [0]},
            {"sClass": "aligncenter", "aTargets": [0]},
            {"sClass": "eamil_conform aligncenter", "aTargets": [1]},
            {"sClass": "hidden-phone", "aTargets": [2]},
            {"sClass": "hidden-phone", "aTargets": [3]},
            {"sClass": "hidden-phone", "aTargets": [4]},
            {"sClass": "hidden-phone", "aTargets": [5]},
            {"sClass": "hidden-phone", "aTargets": [6]}
        ]}
    );
        
      // Apply the search
//    $("#access_level").on("change",function () {
////        alert($(this).val());
//                oTable.fnFilter( this.value, $("#access_level").index(this) );
//                //document.write("Value =" + this.value, "Select box =" + $("tfoot select").index(this));
//                } );
                $("#access_level").change(function(){
                    oTable.columns(5).search(this.value).draw();
                });
        
});
//     function filterUser(){
//   
//    var filter_val = $("#access_filter").val();
//         
//        $.ajax({
//            url: base_url + "user/get_all_users/"+filter_val+""
//        });
//
//  }



