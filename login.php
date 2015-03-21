<?php
    $errorMessage = "";
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
                        <h2 class="entry-title">Login</h2>
                    </div>
                    <ul class="breadcrumbs pull-right">
                        <li><a href="#">HOME</a></li>
                        <li class="active">LOGIN</li>
                    </ul>
                </div>
            </div>
            <section id="content" class="gray-area">
                <div class="container">
                    <div id="main">
                        <div class="tab-container full-width-style arrow-left dashboard">
                            <ul class="tabs">
                                <li class="active"><a data-toggle="tab" href="#login"><i class="soap-icon-check circle"></i>Login</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="login" class="tab-pane fade in active">
                                    <h3><font color="red"><?php echo $errorMessage; ?></font></h3>
                                    <h2>Login</h2>
                                    <h5 class="skin-color">Enter your Username and Password</h5>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                                <label>Username</label>
                                                <input type="text" name="login_user" class="input-text full-width" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                                <label>Password</label>
                                                <input type="password" name="login_password" class="input-text full-width" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn-medium" name="loginForm">LOGIN</button>
                                        </div>
                                    </form>
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