<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Access Level</h1>
            </div>

            <div class="col-lg-12">
                <a class="btn btn-primary"  data-toggle="modal" data-target="#myModal">Create Level</a>
            </div>
            <div class="col-lg-12">&nbsp;</div>
            <div class="col-lg-12">
                <div class="table-responsive dataTable_wrapper">
                    <table class="table table-hover" id="access-level">
                        <thead>
                            <tr>
                                <th>Level ID</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Created At</th>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Access Level</h4>
                </div>
                <form role="form" ng-controller="accessController" method="post" name="access_level" novalidate>
                <div class="modal-body">
                        <fieldset>
                            <div class="form-group" ng-class="{'has-error':access_level.access_name.$invalid || access_level.show_err.$invalid}">
                                <div class="col-lg-3"><label class="label label-info">Access Level</label></div>
                                <div class="col-lg-9">
                                    <input class="form-control" required="" placeholder="access Name" name="access_name" ng-model="access_name" type="text" autofocus>
                                    <input class="form-control" value="{{show_err}}" required="" name="show_err" ng-model="show_err" type="hidden" autofocus>
                                    <p ng-show="access_level.access_name.$invalid" class="help-block">Access name is required</p>
                                    <p ng-show="access_level.show_err.$invalid" ng-model="msg" class="help-block">{{msg}}</p>
                                </div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">&nbsp;</div>
                            <div class="form-group" ng-class="{'has-error':access_level.newObject.$invalid || access_level.$error}">
                                <div class="col-lg-3"><label class="label label-info">Feature List</label></div>
                                <div class="col-lg-9">
                                    <div class="col-lg-6" ng-repeat="feature in features">
                                        <label><input required="required"  type="checkbox" ng-model="access_level.newObject[feature.feature_id]"> {{feature.feature}}</label>
                                    </div>
                                   
                                </div>
                            </div>
                        </fieldset>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="reset"  style="display: none" id="res"></button>
                    <button type="button" class="btn btn-primary" id="sub" ng-disabled="access_level.access_name.$invalid && access_level.$error" type="submit" ng-click="createAccess()" >Save changes</button>
                </div>
                 </form>
            </div>
        </div>
    </div>