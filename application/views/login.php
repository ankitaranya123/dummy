<style>
    
    body{
        
        background-image: url('assets/images/bg3.jpg');
    }
    .login-panel{
        
        margin-top: 35% !important;
    }
    
</style>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" ng-controller="loginController" ng-submit="login.doLogin(loginForm)" method="post" name="loginForm" novalidate>
                        <fieldset>
                            <div class="form-group" ng-class="{'has-error':submitted && loginForm.email.$invalid}">
                                <input class="form-control" required="" placeholder="E-mail" name="email" ng-model="email" type="email" autofocus>
                                <p ng-show="submitted && loginForm.email.$invalid" class="help-block">Please enter a valid Email.</p>
                            </div>
                            <div class="form-group" ng-class="{'has-error':submitted && loginForm.password.$invalid}">
                                <input class="form-control" ng-minlength = "5" placeholder="Password" name="password"  ng-model="password" type="password" value="" required="">
                                <p ng-show="submitted && loginForm.password.$error.required" class="help-block">Please enter password.</p>
                                <p ng-show="submitted && loginForm.password.$error.minlength" class="help-block">Password is too short.</p>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <!--<a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
                            <input id="sub" type="submit" ng-click="doLogin()" class="btn btn-lg btn-success btn-block" value="Login" >
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

