<header id="header" class="navbar-static-top">
            <div class="topnav hidden-xs">
                <div class="container">
                    <ul class="quick-menu pull-right">
                        <li><a href="#travelo-login" class="soap-popupbox">LOGIN</a></li>
                        <li><a href="#travelo-signup" class="soap-popupbox">SIGNUP</a></li>
                        <li><a href="account.php">MY ACCOUNT</a></li>
                    </ul>
                </div>
            </div>
            <div class="main-header">
                <div class="container">
                    <h1 class="logo navbar-brand">
                        <a href="index.php" title="MileHighClub - Home">
                            <img src="images/logo.png"/>
                        </a>
                    </h1>
                    <nav id="main-menu" role="navigation">
                        <ul class="menu">
                            <li class="menu-item-has-children active">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="flights.php">Special Offers</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="">Flying with us</a>
                                <ul>
                                    <li><a href="beforeyoufly.php">Before You Fly</a></li>
                                    <li><a href="inflightexp.php">Inflight Experience</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="">About</a>
                                <ul>
                                    <li><a href="aboutus.php">About Us</a></li>
                                    <li><a href="policy.php">Our Policy</a></li>
                                    <li><a href="contactus.php">Contact Us</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div id="travelo-signup" class="travelo-signup-box travelo-box">
                <div class="simple-signup">
                    <form>
                        <div class="form-group">
                            <input type="text" class="input-text full-width" placeholder="first name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="input-text full-width" placeholder="last name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="input-text full-width" placeholder="email address">
                        </div>
                        <div class="form-group">
                            <input type="password" class="input-text full-width" placeholder="password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="input-text full-width" placeholder="confirm password">
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Tell me about Travelo news
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="description">By signing up, I agree to Travelo's Terms of Service, Privacy Policy, Guest Refund Policy, and Host Guarantee Terms.</p>
                        </div>
                        <button type="submit" class="full-width btn-medium">SIGNUP</button>
                    </form>
                </div>
                <div class="seperator"></div>
                <p>Already a Travelo member? <a href="#travelo-login" class="goto-login soap-popupbox">Login</a></p>
            </div>
            <div id="travelo-login" class="travelo-login-box travelo-box">
                <form>
                    <div class="form-group">
                        <input type="text" class="input-text full-width" placeholder="email address">
                    </div>
                    <div class="form-group">
                        <input type="password" class="input-text full-width" placeholder="password">
                    </div>
                    <div class="form-group">
                        <a href="#" class="forgot-password pull-right">Forgot password?</a>
                        <div class="checkbox checkbox-inline">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="full-width btn-medium">LOGIN</button>
                </form>
                <div class="seperator"></div>
                <p>Don't have an account? <a href="#travelo-signup" class="goto-signup soap-popupbox">Sign up</a></p>
            </div>
        </header>
