<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" ng-controller="regController" method="post" name="regForm" novalidate>
                        <fieldset>
                            <div class="form-group" ng-class="{'has-error':regForm.fname.$invalid}">
                                <input class="form-control" required="" placeholder="FirstName" name="fname" ng-model="fname" type="text" autofocus>
                                <p ng-show="regForm.email.$invalid" class="help-block">Please enter First Name.</p>
                            </div>
                            <div class="form-group" ng-class="{'has-error':regForm.lname.$invalid}">
                                <input class="form-control" placeholder="Last Name" name="lname"  ng-model="lname" type="text" value="" required="">
                                <p ng-show="regForm.lname.$error.required" class="help-block">Please enter Last Name.</p>
                            </div>
                            <div class="form-group" ng-class="{'has-error':regForm.city.$invalid}">
                                <input class="form-control" placeholder="City" name="city"  ng-model="city" type="text" value="" required="">
                                <p ng-show="regForm.city.$error.required" class="help-block">Please enter Your City Name.</p>
                            </div>
                            <div class="form-group" ng-class="{'has-error':regForm.state.$invalid}">
                                <input class="form-control" placeholder="State" name="state"  ng-model="state" type="text" value="" required="">
                                <p ng-show="regForm.state.$error.required" class="help-block">Please enter Your State.</p>
                            </div>
                            <div class="form-group" ng-class="{'has-error':regForm.country.$invalid}">
                                <input class="form-control" placeholder="Country" name="country"  ng-model="country" type="text" value="" required="">
                                <p ng-show="regForm.country.$error.required" class="help-block">Please enter Your Country Name.</p>
                            </div>
                            <div class="form-group" ng-class="{'has-error':regForm.pincode.$invalid}">
                                <input class="form-control" placeholder="Pin" name="pincode"  ng-model="pincode" type="text" value="" required="">
                                <p ng-show="regForm.pincode.$error.required" class="help-block">Please enter Pin Number.</p>
                            </div>
                            <div class="form-group" ng-class="{'has-error':regForm.contact.$invalid}">
                                <input class="form-control" placeholder="Contact Number" name="contact"  ng-model="contact" type="text" value="" required="">
                                <p ng-show="regForm.contact.$error.required" class="help-block">Please enter Your Contact Number.</p>
                            </div>
                            <div class="form-group" ng-class="{'has-error':regForm.dob.$invalid}">
                                <input class="form-control" placeholder="Date Of Birth" name="dob"  ng-model="dob" type="text" value="" required="">
                                <p ng-show="regForm.dob.$error.required" class="help-block">Please enter Your Birth Date.</p>
                            </div>
                            <div class="form-group" ng-class="{'has-error':regForm.email.$invalid}">
                                <input class="form-control" placeholder="Email" name="email"  ng-model="email" type="text" value="" required="">
                                <p ng-show="regForm.email.$error.required" class="help-block">Please enter Email Address.</p>
                            </div>
                            <div class="form-group" ng-class="{'has-error':regForm.password.$invalid}">
                                <input class="form-control" placeholder="Password" name="password"  ng-model="password" type="text" value="" required="">
                                <p ng-show="regForm.password.$error.required" class="help-block">Please enter password.</p>
                                <p ng-show="regForm.password.$error.minlength" class="help-block">Password is too short.</p>
                            </div>
                            <div class="form-group" ng-class="{'has-error':regForm.access_level.$invalid}">
                                <select class="form-control" name="access_level" ng-model="access_level">
                                    <option value=" "></option>
                                    <option value="1">Admin</option>
                                    <option value="2">Manager</option>
                                    <option value="3">Employee</option>
                                </select>
                                <p ng-show="regForm.access_level.$error.required" class="help-block">Please Select Access Level.</p>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <!--<a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
                            <input id="reg" ng-disabled="regForm.contact.$invalid || regForm.fname.$invalid || regForm.lname.$invalid || regForm.city.$invalid || regForm.state.$invalid || regForm.country.$invalid || regForm.pincode.$invalid || regForm.dob.$invalid || regForm.email.$invalid || regForm.password.$invalid || regForm.access_level.$invalid" type="submit" ng-click="doRegister()" class="btn btn-lg btn-success btn-block" value="Register" >
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

