<?php 
include_once('db-connection.php');
$page_title = "Login";
$login_error = false;
//If Postback
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
{
    $user_email = trim($_POST['email']);
    $user_password = trim($_POST['password']);
    
    if($user_email != "" && $user_password != "" && (isset($_POST['email'])) && (isset($_POST['password'])))
    {
        $dbObj = new DB();
        
        //If successful login setup session and redirect to internal page. Else: display error.
        if ($dbObj->validate_user_exists($user_email, $user_password))
        {
            //setup session
            header('Location: updates.php');
            exit();
        }
        else
        {
            $login_error = true;
        }
        $dbObj->close_db();
    }
    
    if ($login_error)
    {
        $dbObj->increment_user_login_attempt($user_email); //increment login attempts
        $failed_attempts = $dbObj->get_user_login_attempt($user_email);
        
        if ($failed_attempts >= $max_login_attempts)
        {
            //lock account
        }
        
        $error_message = "<span class='glyphicon glyphicon-warning-sign'></span> The username and password do not match.";
    }
}
?>
<html lang="en">
 <?php
    include_once 'head.php';
 ?>
<body>
    <div id="wrapper">
        <div id="login-content">
            <div class="container">            
                <div id="header-login"></div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"></div>                
                    <div class="col-sm-6 col-md-6">
                        <div id="loginBox" class="panel panel-default">
                            <div class="panel-body">
                                <form name="loginForm" ng-app="loginApp" ng-init="" ng-controller="loginCtrl" action="login.php" method="post">
                                <?php
                                if ($login_error)
                                {
                                 echo '<div class="alert alert-danger">' . $error_message . '</div>'; 
                                } 
                                ?>                                    
                                    <div class="alert alert-danger" ng-show="loginForm.email.$invalid && loginform.email.$invalid">Please enter valid email address: xxxx@xxx.com </div>
                                    <div class="form-group">                                            
                                        <label for="usr">Email:</label>
                                        <input  ng-model="email" maxlength="50" type="email" ng-model="email" placeholder="name@example.com" class="form-control input-lg" name='email' value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="pwd">Password:</label>
                                        <input ng-model="password" maxlength="50" type="password" class="form-control input-lg"  name='password' required>
                                    </div>

                                    <div class="form-group">
                                        <input class="btn btn-default input-lg pull-right hidden-sm hidden-xs" type="submit" value="Sign In" ng-disabled="loginForm.password.$dirty && loginForm.password.$invalid || loginForm.email.$dirty && loginForm.email.$invalid" disabled="disabled"/>
                                        <a href="password-forgot.php"><span class="fa fa-question-circle-o"></span> Forgot Password?</a><br />
                                        <a href="http://www.totalsystech.com/"><span class="fa fa-globe"></span> Main Web Site</a>
                                    </div>

                                    <div class="form-group hidden-md hidden-lg">
                                        <input class="btn btn-default input-lg" type="submit" value="Sign In" ng-disabled="loginForm.password.$dirty && loginForm.password.$invalid || loginForm.email.$dirty && loginForm.email.$invalid" disabled="disabled"/>
                                    </div>

                                </form>
                                <script>
                                    var app = angular.module("loginApp" , []);
                                    //Bind data (initializing)
                                    app.controller("loginCtrl",function($scope) {                                      

                                    });
                                 </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3"></div>  
                </div>
            </div>
            <div id="login-footer"></div>
        </div>
    </div>
</body>
</html>  


