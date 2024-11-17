<?php include 'includes/session.php'; ?>
<?php
if(isset($_SESSION['user'])){
    header('location: account.php');
}
?>
<?php
include ("includes/header.php");
include ("includes/navbar.php");
?>
<main>
    <div class="main-container col1-layout">
        <div class="main">
            <div class="col-main">
                <div class="account-login">
                    <div class="block block-login">
                        <div class="page-title">
                            <h1> Please sign in </h1>
                        </div>
                        <?php
                        if(isset($_SESSION['error'])){
                            echo "
                              <div class='callout callout-danger text-center'>
                                <p>".$_SESSION['error']."</p> 
                              </div>
                            ";
                            unset($_SESSION['error']);
                        }
                        if(isset($_SESSION['success'])){
                            echo "
                              <div class='callout callout-success text-center'>
                                <p>".$_SESSION['success']."</p> 
                              </div>
                            ";
                            unset($_SESSION['success']);
                        }
                        ?>
                        <div class="block-content">
                            <form action="login_process.php" method="post" id="login-form" class="scaffold-form">
                                <input name="form_key" type="hidden" value="">
                                <div class="col2-set">
                                    <div class="col-2 registered-users">
                                        <div class="content fieldset">
                                            <div class="form-title">
                                                <div class="form-block-title">
                                                    <h2>Welcome Back</h2>
                                                </div>
                                                <h3>ENTER YOUR SIGN IN DETAILS</h3>
                                            </div>
                                            <ul class="form-list">
                                                <li>
                                                    <label for="Email" class="required">
                                                        <em>*</em>
                                                        Email Address
                                                    </label>
                                                    <div class="input-box">
                                                        <input required type="email" maxlength="100" autocapitalize="off" autocorrect="off" spellcheck="false" name="email" value="" id="email" class="input-text required-entry validate-email" title="Email Address" placeholder="Email Address">
                                                    </div>
                                                </li>
                                                <li>
                                                    <label for="pass" class="required">
                                                        <em>*</em>Password
                                                    </label>
                                                    <div class="input-box">
                                                        <input required type="password" maxlength="50" name="password" class="input-text required-entry validate-password" id="password" title="Password" placeholder="Password">
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="forgot-pass">
                                                <a href="password_forgot.php" class="f-left">Forgot Your Password?</a>
                                            </div>
                                        </div>
                                        <div class="buttons-set">
                                            <button type="submit" class="button login-btn" title="Login" name="login" id="send2">
                                                <span>
                                                    <span>
                                                        Sign In
                                                    </span>
                                                </span>
                                            </button>
                                            <a title="Create an Account" class="button hover" href="signup.php">
                                                <span>
                                                    <span>
                                                        New User? Register here
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include ("includes/footer.php");
include ("includes/js.php");
?>