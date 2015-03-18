<?php
    $errorMessage = "";
    include 'controller.php';
    
    if(isset($_SESSION['login'])){
        header("Location: main.php");
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Mile High Club | Admin Login</title>
    <link rel="stylesheet" href="./css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8">	
    <link rel="stylesheet" href="./css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8">	
    <link rel="stylesheet" href="./css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="./css/login.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<div id="login">
    <h1 id="title"><a href="">Slate Admin</a></h1>
    <div id="login-body" class="clearfix">    
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="login_form" method="post">
	    <div class="content_front">
	        <div class="pad">
                    <div class="field">
			<label>Username:</label>
                        <div class=""><span class="input"><input name="user" class="text" type="text" required></span></div>
                    </div> <!-- .field -->
                    <div class="field">
                        <label>Password:</label>
                        <div class="">
                            <span class="input"><input name="password" class="text" type="password" required/><br></span>
                        </div>
                    </div> <!-- .field -->
                    <?php if($errorMessage != ""){ ?>
                    <div class="field">
			<span class="label">&nbsp;</span>
                        <h3>Invalid Login! Try again later</h3>
                    </div>
                    <?php } ?>
                    <div class="field">
			<span class="label">&nbsp;</span>		
			<div class=""><button type="submit" class="btn">Login</button></div>
                    </div> <!-- .field -->
	        </div>
	    </div>
	</form>
    </div>
</div> <!-- #login -->
</body>
</html>
