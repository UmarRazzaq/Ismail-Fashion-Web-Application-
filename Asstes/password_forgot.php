<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
    <div class="main-container col1-layout">
        <div class="main">
            <div class="col-main">
                <div class="account-login">
                    <div class="block block-login">
                        <div class="page-title">
                            <h1> Enter email associated with account </h1>
                        </div>
                        <div class="block-content">
                            <form action="reset.php" method="post" id="login-form" class="scaffold-form">
                                <div class="col2-set">
                                    <div class="col-2 registered-users">
                                        <div class="content fieldset">
                                            <ul class="form-list">
                                                <li>
                                                    <label for="email" class="required">
                                                        <em>*</em>
                                                        Email Address
                                                    </label>
                                                    <div class="input-box">
                                                        <input type="email" maxlength="100" autocapitalize="off" autocorrect="off" spellcheck="false" name="email" value="" id="email" class="input-text required-entry validate-email" title="Email Address" placeholder="Email Address">
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="forgot-pass">
                                                <a href="login.php" class="f-left">I remember my Password!</a>
                                            </div>
                                        </div>
                                        <div class="buttons-set">
                                            <button type="submit" class="button login-btn" title="reset" name="reset" id="send2">
                                                <span>
                                                    <span>
                                                        Send
                                                    </span>
                                                </span>
                                            </button>
                                            <a class="button" href="index.php">
                                                <span>
                                                    <span>
                                                        Back to Home Page
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
<?php include 'includes/footer.php' ?>
<?php include 'includes/js.php' ?>