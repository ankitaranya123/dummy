<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User List</h1>
            </div>

            <div class="col-lg-12">
                <div class="col-lg-4"><a class="btn btn-primary"  data-toggle="modal" data-target="#myModal">Create User</a></div>
                <div class="col-lg-6"></div>
                <div class="col-lg-2">
                    <label>Access Level Filter</label>
                    <select class="form-control" id="access_filter" onchange="filterUser()">
                        <option value="">Select Level</option>
                        <option value="1">Test</option>
                        <option value="2">Test1</option>
                    </select>
                </div>
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

