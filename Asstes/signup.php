<?php include 'includes/session.php'; ?>
<?php
if(isset($_SESSION['user'])){
    header('location: login.php');
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
                <div class="account-login account-create">
                    <div class="block block-login block-register">
                        <div class="page-title">
                            <h1>Create an Account</h1>
                        </div>

                        <?php
                        if(isset($_SESSION['error'])){
                            echo "
                              <div class='callout callout-danger'>
                                <p>".$_SESSION['error']."</p> 
                              </div>
                            ";
                            unset($_SESSION['error']);
                        }

                        if(isset($_SESSION['success'])){
                            echo "
                          <div class='callout callout-success'>
                            <p>".$_SESSION['success']."</p> 
                          </div>
                        ";
                            unset($_SESSION['success']);
                        }
                        ?>

                        <div class="block-content">
                            <form name="register" action="register.php" method="post" enctype="multipart/form-data" id="form-validate">
                                <div class="fieldset">
                                    <div class="form-title">
                                        <div class="form-block-title"><h2>New Customer</h2></div>
                                        <h3>ENTER YOUR SIGN UP DETAILS</h3>
                                    </div>
                                    <ul class="form-list">
                                        <li class="fields">
                                            <div class="customer-name">
                                                <div class="field name-firstname">
                                                    <label for="firstname" class="required"><em>*</em>First Name</label>
                                                    <div class="input-box">
                                                        <input type="text" id="firstname" name="firstname" value="" placeholder="First Name" title="Full Name" maxlength="50" class="input-text required-entry">
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="field name-lastname">
                                                    <label for="lastname" class="required"><em>*</em>Last Name</label>
                                                    <div class="input-box">
                                                        <input type="text" id="lastname" name="lastname" value="" placeholder="Last Name" title="Full Name" maxlength="50" class="input-text required-entry">
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <label for="email" class="required"><em>*</em>Email Address</label>
                                            <div class="input-box">
                                                <input required type="email" maxlength="100" name="email" id="email" value="" title="Email Address" class="input-text validate-email required-entry" placeholder="EMAIL ADDRESS">
                                            </div>
                                        </li>
                                        <li class="fields">
                                            <div class="field">
                                                <label for="password" class="required"><em>*</em>Password</label>
                                                <div class="input-box">
                                                    <input required type="password" maxlength="50" name="password" id="password" title="Password" class="input-text required-entry validate-password" placeholder="PASSWORD">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <label for="confirmation" class="required"><em>*</em>Confirm Password</label>
                                                <div class="input-box">
                                                    <input required type="password" maxlength="50" name="confirmation" title="Confirm Password" id="confirmation" class="input-text required-entry validate-cpassword" placeholder="CONFIRM PASSWORD">
                                                    <small id="password_error" class="error"></small>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="buttons-set">
                                    <button type="submit" name="signup" id="register_customer" title="Submit" onclick="return Validate()" class="button login-btn">
                                        <span><span>Sign up</span></span>
                                    </button>
                                    <p class="back-link">
                                        <a href="login.php" class="back-link"><small>« </small>Back to Sign in.</a>
                                    </p>
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