<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User List</h1>
            </div>

            <div class="col-lg-12">&nbsp;</div>
            <div class="col-lg-12">
                <div class="table-responsive dataTable_wrapper">
                    <table class="table table-hover" id="userlist">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Pin</th>
                                <th>Email</th>
                                <th>Date Of Birth</th>
                                <th>
                                    <select id="access_level">
                                        <option value="">Access Level</option>
                                         <?php if(!is_null($access_level)){
                                             foreach($access_level as $accessLevel){
                                             ?>
                                        <option value="<?php echo $accessLevel['access_id'];?>"><?php echo $accessLevel['access_name']; ?></option>
                                        <?php } } ?>
                                 </select>
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

