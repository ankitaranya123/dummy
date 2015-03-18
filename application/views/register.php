<style>
    
    body{
        
        background-image: url('assets/images/bg3.jpg');
    }
       .login-panel{
        
        margin-top: 15% !important;
    }
    
</style>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" ng-controller="regController"  ng-submit="register.doRegister(regForm)" method="post" name="regForm" id="regForm" novalidate>
                        <fieldset>
                            <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group" ng-class="{'has-error':submitted && regForm.fname.$invalid}">
                                <input class="form-control" required="" placeholder="FirstName" name="fname" id="fname" ng-model="fname" type="text" autofocus>
                                <p ng-show="submitted && regForm.fname.$invalid" class="help-block">Please enter First Name.</p>
                            </div>
                            </div>
                                <div class="col-md-6">
                            <div class="form-group" ng-class="{'has-error':submitted && regForm.lname.$invalid}">
                                <input class="form-control" placeholder="Last Name" name="lname"  ng-model="lname" type="text" value="" required="">
                                <p ng-show="submitted && regForm.lname.$error.required" class="help-block">Please enter Last Name.</p>
                            </div>
                            </div>
                                </div>
                            <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group" ng-class="{'has-error':submitted && regForm.city.$invalid}">
                                <input class="form-control" placeholder="City" name="city"  ng-model="city" type="text" value="" required="">
                                <p ng-show="submitted && regForm.city.$error.required" class="help-block">Please enter Your City Name.</p>
                            </div>
                            </div>
                                <div class="col-md-6">
                            <div class="form-group" ng-class="{'has-error':submitted && regForm.state.$invalid}">
                                <input class="form-control" placeholder="State" name="state"  ng-model="state" type="text" value="" required="">
                                <p ng-show="submitted && regForm.state.$error.required" class="help-block">Please enter Your State.</p>
                            </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group" ng-class="{'has-error':submitted && regForm.country.$invalid}">
                                <input class="form-control" placeholder="Country" name="country"  ng-model="country" type="text" value="" required="">
                                <p ng-show="submitted && regForm.country.$error.required" class="help-block">Please enter Your Country Name.</p>
                            </div>
                            </div>
                                <div class="col-md-6">
                            <div class="form-group" ng-class="{'has-error':submitted && regForm.pincode.$invalid}">
                                <input class="form-control" placeholder="Pin" name="pincode"  ng-model="pincode" type="text" value="" required="">
                                <p ng-show="submitted && regForm.pincode.$error.required" class="help-block">Please enter Pin Number.</p>
                            </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group" ng-class="{'has-error':submitted && regForm.contact.$invalid}">
                                <input class="form-control" placeholder="Contact Number" name="contact"  ng-model="contact" type="text" value="" required="">
                                <p ng-show="submitted && regForm.contact.$error.required" class="help-block">Please enter Your Contact Number.</p>
                            </div>
                            </div>
                                <div class="col-md-6">
                            <div class="form-group" ng-class="{'has-error':submitted && regForm.dob.$invalid}">
                                <input class="form-control" id="dob" placeholder="Date Of Birth" name="dob"  ng-model="dob" type="text" value="" required="">
                                <p ng-show="submitted && regForm.dob.$error.required" class="help-block">Please enter Your Birth Date.</p>
                            </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group" ng-class="{'has-error':submitted && regForm.email.$invalid}">
                                <input class="form-control" placeholder="Email" name="email"  ng-model="email" type="text" value="" required="">
                                <p ng-show="submitted && regForm.email.$error.required" class="help-block">Please enter Email Address.</p>
                            </div>
                            </div>
                                <div class="col-md-6">
                            <div class="form-group" ng-class="{'has-error':submitted && regForm.password.$invalid}">
                                <input class="form-control" placeholder="Password" name="password"  ng-model="password" type="password" value="" required="" ng-pattern="/^[a-zA-Z0-9]*[@#$%&]+$/">
                                <p ng-show="submitted && regForm.password.$error.required" class="help-block">Please enter password.</p>
                                <p ng-show="submitted && regForm.password.$error.minlength" class="help-block">Password is too short.</p>
                                <p ng-show="submitted && regForm.password.$error.pattern" class="help-block">password must be contain 1 special character and alphabetical character and numeric value</p>
                            </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group" ng-class="{'has-error':submitted && regForm.access_level.$invalid}">
                                <select class="form-control" name="access_level" ng-model="access_level">
                                    <option value=" "></option>
                                    <option value="1">Admin</option>
                                    <option value="2">Manager</option>
                                    <option value="3">Employee</option>
                                </select>
                                <p ng-show="submitted && regForm.access_level.$error.required" class="help-block">Please Select Access Level.</p>
                            </div>
                            </div>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <!--<a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
                            <button id="reg" type="submit" class="btn btn-lg btn-success btn-block">Register</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$("document").ready(function(){
    $("#dob").datepicker();    
});


</script>
