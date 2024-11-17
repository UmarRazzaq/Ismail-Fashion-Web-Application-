<?php include 'includes/session.php'; ?>
<?php
    if(!isset($_SESSION['user'])){
        header('location: index.php');
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
                <div class="block block-account">
                    <div class="block-content">
                        <ul id="linkwrap">
                            <li id="link1" data-box="div1" class="current click">
                                <a href="#" class="active">Account Dashboard</a>
                            </li>
<!--                            <li id="link6" data-box="div4" class="click"><a href="#">My Order</a></li>-->
                            <li data-box="div3" class="last click"><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div id="divwrap">
                    <div id="div1" class="">
                        <div class="my-account">
                            <div class="dashboard">
                                <div class="page-title">
                                    <h1>MY DASHBOARD</h1>
                                </div>
                                <div class="msg">
                                    <p class="hello">
                                        <strong>Welcome, <?php echo $user['firstname'].' '.$user['lastname']; ?>!
                                        </strong>
                                    </p>
                                    <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account
                                        activity and update your account information. Select a link below to view or edit information.</p>
                                </div>
                                <div class="acc-box info-box">
                                    <div class="box-title">
                                        <h2>Account Information</h2>
                                    </div>
                                    <div class="col2-set">
                                        <div class="col-1">
                                            <div class="box2">
                                                <div class="title">
                                                    <h3>Contact Information</h3>
                                                    <a id="link3" href="#edit">Edit</a>
                                                </div>
                                                <div class="box-content">
                                                    <p>
                                                        <?php echo $user['firstname'].' '.$user['lastname']; ?>
                                                        <br>
                                                        <?php echo $user['email']; ?>
                                                        <br>
                                                        <?php echo $user['contact_info']; ?>
                                                        <br>
                                                        <a id="link4" href="#">Change Password</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="acc-box info-box">
                                    <div class="box-title">
                                        <h2>Address Book</h2>
                                        <a id="link2" href="#">Manage Addresses</a>
                                    </div>
                                    <div class="col2-set">
                                        <div class="col-1">
                                            <div class="box2">
                                                <div class="title">
                                                    <h3>Default Address</h3>
                                                    <a id="link5" href="#">Edit Address</a>
                                                </div>
                                                <div class="box-content">
                                                    <span><?php echo $user['address']; ?></span><br>
                                                    <span><?php echo $user['city'] .'  ('.$user['country'].')' ; ?></span><br>
                                                    <span><?php echo $user['zip_code']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="div2">
                        <div class="my-account">
                            <?php
                            if(isset($_SESSION['error'])){
                                echo "
	        					<div class='callout callout-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
                                unset($_SESSION['error']);
                            }

                            if(isset($_SESSION['success'])){
                                echo "
	        					<div class='callout callout-success'>
	        						".$_SESSION['success']."
	        					</div>
	        				";
                                unset($_SESSION['success']);
                            }
                            ?>
                            <div class="page-title">
                                <h1> ADD New Address </h1>
                            </div>
                            <form action="profile_edit.php" method="post" id="form-validate" class="scaffold-form">
                                <div class="fieldset">
                                    <div class="form-title">
                                        <div class="form-block-title"><h2>Contact Information</h2></div>
                                        <h3>ENTER YOUR CONTACT INFORMATION</h3>
                                    </div>
                                    <ul class="form-list">
                                        <li class="fields">
                                            <div class="customer-name">
                                                <div class="field name-firstname">
                                                    <label for="firstname" class="required"><em>*</em>First Name</label>
                                                    <div class="input-box">
                                                        <input type="text" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>" placeholder="First Name" title="Full Name" maxlength="50" class="input-text required-entry">
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="field name-lastname">
                                                    <label for="lastname" class="required"><em>*</em>Last Name</label>
                                                    <div class="input-box">
                                                        <input type="text" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>" placeholder="Last Name" title="Full Name" maxlength="50" class="input-text required-entry">
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <label for="phone" class="required"><em>*</em>Phone Number</label>
                                            <div class="input-box">
                                                <input required type="tel" maxlength="100" name="contact" id="phone" value="<?php echo $user['contact_info']; ?>" title="Phone" class="input-text validate-email required-entry" placeholder="Phone Number">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="fieldset">
                                    <div class="form-title">
                                        <div class="form-block-title"><h2>Address</h2></div>
                                        <h3>ENTER YOUR ADDRESS</h3>
                                    </div>
                                    <ul class="form-list">
                                        <li class="fields">
                                            <div class="customer-name">
                                                <div class="field name-firstname">
                                                    <label for="address1" class="required"><em>*</em>Address</label>
                                                    <div class="input-box">
                                                        <input type="text" id="address1" name="address" value="<?php echo $user['address']; ?>" placeholder="Address" title="address" maxlength="50" class="input-text required-entry">
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <label for="country" class="required"><em>*</em>Country</label>
                                            <div class="input-box">
                                                <select name="country_id" id="country" class="validate-select" title="Country">
                                                    <option value="<?php echo $user['country']; ?>"> </option>
                                                    <option value="PK" selected="selected">Pakistan</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li>
                                            <label for="city" class="required"><em>*</em>City</label>
                                            <div class="input-box">
                                                <input required type="text" maxlength="100" name="city" id="city" value="<?php echo $user['city']; ?>" title="City" class="input-text validate-email required-entry" placeholder="City">
                                            </div>
                                        </li>
                                        <li>
                                            <label for="zip" class="required"><em>*</em>Postal/Zip Code</label>
                                            <div class="input-box">
                                                <input required type="text" maxlength="100" name="zip" id="zip" value="<?php echo $user['zip_code']; ?>" title="Postal/Zip Code" class="input-text validate-email required-entry" placeholder="Postal/Zip Code">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="buttons-set buttons-set-form">
                                    <p class="back-link">
                                        <a href="account.php">
                                            <small>&#8810;</small>
                                            Back
                                        </a>
                                    </p>
                                    <button type="submit" class="button hover" name="edit" title="Save">
                                        <span>
                                            <span>
                                                Save Address
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="div3">
                        <div class="my-account">
                            <div class="page-title">
                                <h1> Edit Account Information </h1>
                            </div>
                            <form action="profile_edit.php" enctype="multipart/form-data" method="post" id="form-validate" class="scaffold-form">
                               <div class="fieldset">
                                   <div class="form-title">
                                       <div class="form-block-title"><h2>Account Information</h2></div>
                                       <h3>EDIT YOUR ACCOUNT INFORMATION</h3>
                                   </div>
                                   <ul class="form-list">
                                       <li class="fields">
                                           <div class="customer-name">
                                               <div class="field name-firstname">
                                                   <label for="firstname" class="required"><em>*</em>First Name</label>
                                                   <div class="input-box">
                                                       <input type="text" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>" placeholder="First Name" title="Full Name" maxlength="50" class="input-text required-entry">
                                                   </div>
                                                   <div class="clear"></div>
                                               </div>
                                               <div class="field name-lastname">
                                                   <label for="lastname" class="required"><em>*</em>Last Name</label>
                                                   <div class="input-box">
                                                       <input type="text" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>" placeholder="Last Name" title="Full Name" maxlength="50" class="input-text required-entry">
                                                   </div>
                                                   <div class="clear"></div>
                                               </div>
                                           </div>
                                       </li>
                                       <li>
                                           <label for="email" class="required"><em>*</em>Email Address</label>
                                           <div class="input-box">
                                               <input required type="email" maxlength="100" name="email" id="email" value="<?php echo $user['email']; ?>" title="Email Address" class="input-text validate-email required-entry" placeholder="Email Address">
                                           </div>
                                       </li>
                                       <li class="control" id="click">
                                           <label for="change-pass">Change Password!</label>
                                       </li>
                                   </ul>
                               </div>
                               <div class="fieldset hide-pass" id="show-pass">
                                   <ul class="form-list">
                                       <li>
                                           <label for="current-pass" class="required">
                                               <em>*</em>Current Password
                                           </label>
                                           <div class="input-box">
                                               <input required type="password" maxlength="50" name="current_pass" class="input-text required-entry validate-password" id="current-pass" title="Current Password" placeholder="Current Password">
                                           </div>
                                       </li>
                                       <li class="fields">
                                           <div class="field">
                                               <label for="password" class="required"><em>*</em>Password</label>
                                               <div class="input-box">
                                                   <input required type="password" maxlength="50" value="<?php echo $user['password']; ?>" name="password" id="password" title="New Password" class="input-text required-entry validate-password" placeholder="New Password">
                                               </div>
                                           </div>
                                           <div class="field">
                                               <label for="confirmation" class="required"><em>*</em>Confirm Password</label>
                                               <div class="input-box">
                                                   <input required type="password" maxlength="50" name="confirmation" title="Confirm New Password" id="confirmation" class="input-text required-entry validate-cpassword" placeholder="Confirm New Password">
                                                   <small id="password_error" class="error"></small>
                                               </div>
                                           </div>
                                       </li>
                                   </ul>
                               </div>
                                <div class="buttons-set buttons-set-form">
                                    <p class="back-link">
                                        <a href="account.php">
                                            <small>&#8810;</small>
                                            Back
                                        </a>
                                    </p>
                                    <button type="submit" class="button hover" name="edit" title="Save">
                                        <span>
                                            <span>
                                                Save
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="div4">
                        <div class="my-account">
                            <div class="page-title">
                                <h1>My Orders</h1>
                            </div>
                            <div>
                                <p>you have placed no orders.</p>
                            </div>
                            <div class="buttons-set buttons-set-form" style="border-top: 1px solid rgba(0,0,0,0.1);">
                                <p class="back-link">
                                    <a href="account.php">
                                        <small>&#8810;</small>
                                        Back
                                    </a>
                                </p>
                            </div>
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