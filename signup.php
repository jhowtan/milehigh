<?php
    if(isset($_COOKIE["user"])){
        header("Location: index.php");
    }
    
    $message = "";
    include 'controller.php';
?>
<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
    <body>
        <div id="page-wrapper">
            <?php include 'header.php'; ?>
            <div class="page-title-container">
                <div class="container">
                    <div class="page-title pull-left">
                        <h2 class="entry-title">Sign Up</h2>
                    </div>
                    <ul class="breadcrumbs pull-right">
                        <li><a href="#">HOME</a></li>
                        <li class="active">SIGNUP</li>
                    </ul>
                </div>
            </div>
            <section id="content" class="gray-area">
                <div class="container">
                    <div id="main">
                        <div class="tab-container full-width-style arrow-left dashboard">
                            <ul class="tabs">
                                <li class="active"><a data-toggle="tab" href="#signup"><i class="soap-icon-plus circle"></i>Sign Up</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="signup" class="tab-pane fade in active">
                                    <h3><font color="red"><?php echo $message; ?></font></h3>
                                    <h2>Sign Up</h2>
                                    <h5 class="skin-color">Please enter your particular</h5>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                                <label>Name</label>
                                                <input type="text" name="name" class="input-text full-width" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                                <label>Username <font color="red">(For login purpose)</font></label>
                                                <input type="text" name="signup_user" class="input-text full-width" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                                <label>Password</label>
                                                <input type="password" name="signup_password" class="input-text full-width" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                                <label>Confirm Password</label>
                                                <input type="password" name="cfmPassword" class="input-text full-width" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                                <label>Email</label>
                                                <input type="email" name="email" class="input-text full-width" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                                <label>Contact Number</label>
                                                <input type="text" name="contact" class="input-text full-width" onkeypress="return isNumber(event);" required>
                                            </div>
                                        </div>
                                        <p>By signing up, I agree to MileHighClub's Terms of Service, Privacy Policy, 
                                            Guest Refund Policy, and Host Guarantee Terms.</p>
                                        <div class="form-group">
                                            <button class="btn-medium" name="signUpForm">SIGNUP</button>
                                        </div>
                                        <h5>Already a registered user? <a href="login.php" class="skin-color">Login</a></h5>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>