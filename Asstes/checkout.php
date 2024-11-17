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

    <div class="main-container col1-layout">
        <div class="main">
            <div class="col-main">
                <div class="opc-wrapper-opc checkout_container design_package_rwd design_theme_shopistan ">
                    <div class="page-title login-title">
                        <h1 class="h1_opc">Checkout</h1>
                    </div>
                    <div class="checkout_main opc-main-container" style="">
                        <form action="order.php" method="POST" id="onepagecheckout_orderform" autocomplete="on">
                            <div class="col3-set onepagecheckout_datafields">
                                <div class="opc-col opc-col-left">
                                    <div class="opc-col-inner">
                                        <div class="opc-title">
                                            <div class="opc-block-title"><h2>Shipping</h2></div>
                                            <h3><span>Where your order will be delivered</span></h3>
                                        </div>
                                        <div class="onepagecheckout_block">
                                            <div class="op_block_title">
                                                Name &amp; Address </div>
                                            <div class="form_fields">
                                                <div id="bill_form">
                                                    <input type="hidden" name="billing[address_id]" id="billing:address_id" value="2447236">
                                                    <div class="two_fields">
                                                        <div class="customer-name">
                                                            <div class="name-firstname">
                                                                <label for="billing:firstname" class="required">First Name</label>
                                                                <sup>*</sup>
                                                                <div class="data_area">
                                                                    <input required type="hidden" placeholder="Full Name" maxlength="50" id="fullname" name="firstname" value="<?php echo $user['firstname'].' '.$user['lastname']; ?>" title="Full Name" class="t1 required-entry">
                                                                </div>
                                                            </div>
                                                            <div class="short name-firstname">
                                                                <label for="firstname" class="required">First Name</label>
                                                                <sup>*</sup>
                                                                <div class="data_area">
                                                                    <input type="text" maxlength="25" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>" placeholder="First Name" title="First Name" class="firstname t1 required-entry">
                                                                </div>
                                                            </div>
                                                            <div class="short name-lastname">
                                                                <label for="lastname" class="required">Last Name</label>
                                                                <sup>*</sup>
                                                                <div class="data_area">
                                                                    <input type="text" maxlength="25" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>" placeholder="Last Name" title="Last Name" class="lastname t1 required-entry">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="full">
                                                        <label for="email" class="required">E-mail</label>
                                                        <sup>*</sup>
                                                        <div class="data_area">
                                                            <input required type="email" maxlength="100" name="email" value="<?php echo $user['email']; ?>" title="Email Address" class="t1 validate-email required-entry" placeholder="Email Address" onblur="this.value=removeSpaces(this.value);">
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="full">
                                                        <label for="billing:confirm_email" class="required">Confirm Email</label>
                                                        <sup>*</sup>
                                                        <div class="data_area">
                                                            <input  required type="email" maxlength="100" name="conf_email" title="Confirm Email" id="email" class="input-text required-entry validate-cemail" placeholder="Confirm Email" onblur="this.value=removeSpaces(this.value);">
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="full">
                                                        <label for="address" class="required">Address</label>
                                                        <sup>*</sup>	<div class="data_area">
                                                            <input type="text" required maxlength="255" title="Street Address" name="address" id="address" value="<?php echo $user['address']; ?>" class="t1 required-entry" placeholder="Shipping Address">
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="full">
                                                        <label for="country" class="required">Country</label>
                                                        <sup>*</sup>	<div class="data_area">
                                                            <input type="text" required maxlength="255" title="Country" name="country" id="country" value="<?php echo $user['country']; ?>" class="t1 required-entry" placeholder="Country">
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="full">
                                                        <label for="city" class="required">City</label>
                                                        <sup>*</sup>	<div class="data_area">
                                                            <input type="text" required maxlength="255" title="City" name="city" id="city" value="<?php echo $user['city']; ?>" class="t1 required-entry" placeholder="City">
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="full">
                                                        <label for="zip_code" class="required">Zip Code</label>
                                                        <sup>*</sup>	<div class="data_area">
                                                            <input required maxlength="10" type="number" title="Zip Code" name="zip_code" id="zip_code" value="<?php echo $user['zip_code']; ?>" class="t1 bill-zip-code validate-zip-international required-entry" placeholder="Zip Code">
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="full">
                                                        <!-- RBS adding validation and confirmation -->
                                                        <label for="contact_info" class="required">Mobile</label>
                                                        <sup>*</sup> <div class="data_area">
                                                            <input required type="tel" maxlength="21" name="contact_info" value="<?php echo $user['contact_info']; ?>" title="Telephone" class=" t1 number_field validate-length minimum-length-11 paki-mobile t1 required-entry " id="billing:telephone" placeholder="Mobile">
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="full">
                                                        <!--RBS My confirmation-->
                                                        <label for="confirm_mobile" class="required">Confirm Mobile</label>
                                                        <sup>*</sup>
                                                        <div class="data_area">
                                                            <input required class="t1 paki-mobile validate-cphone required-entry" title="Confirm Mobile" value="" id="tel2" name="conf_number" type="tel" placeholder="Confirm Mobile">
                                                        </div><div class="clear"></div>
                                                        <!--My confirmation Ends here-->
                                                        <!-- ENDS here RBS -->
                                                    </div>
                                                    <div class="clear"></div>
                                                    <!--</div>
                                                                </div>-->
                                                    <div class="clear"></div>
                                                    <ul class="options-list">
                                                        <li class="no-display">
                                                            <input type="hidden" value="1" name="billing[save_in_address_book]">
                                                        </li>
                                                    </ul>
                                                </div> <!-- bill form -->
                                                <input type="hidden" name="billing[use_for_shipping]" id="billing:use_for_shipping" value="1">
                                            </div>
                                            <div class="col-padding">
                                                <div id="payment-method" class="onepagecheckout_block">
                                                    <div class="op_block_title">Payment Method</div>
                                                    <div id="checkout-payment-method-load" class="" style="width: auto; height: auto;">
                                                        <dl class="sp-methods">
                                                            <dt id="dt_cashondelivery" class="selected">
                                                                <input id="p_method_cashondelivery" value="cashondelivery" type="radio" name="payment[method]" title="Cash On Delivery" checked="checked" class="radio" autocomplete="off">
                                                                <label for="p_method_cashondelivery">Cash On Delivery </label>
                                                            </dt>
                                                        </dl>
                                                    </div>
                                                </div>
                                                <div id="shipping-method" class="onepagecheckout_block">
                                                    <div class="op_block_title">Shipping Method</div>
                                                    <div id="checkout-shipping-method-load" class="" style="width: auto; height: auto;">		<p>Please enter your full address to obtain a shipping quote.</p>
                                                    </div>
                                                    <div id="onepage-checkout-shipping-method-additional-load">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="2co-terms-wrapper checkout-terms-verify">
                                                <input style="margin-left: 14px;" required id="terms-checkbox" type="checkbox" name="terms" value="terms">
                                                <div class="inquiry-content">
                                                    <p>I agree to the <a class="conditions-popup-checkout">Terms and Conditions</a> and <a class="policy-popup-checkout" href="policy.php">Privacy Policy</a> of Ismail Fashion's. Ismail Fashion's will not be liable for anything that is not a part of these terms and conditions.</p>
                                                </div>
                                            </div>
                                            <button id="checkout-button" type="submit" name="order" title="Place Order Now" class="if-btn-checkout" value="">Place Order Now</button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="checkout-bottom-bar">
                        <div class="checkoutbar continue-shopping">
                            <p><a href="index.php">Continue Shopping</a></p>
                        </div>
                        <div class="checkoutbar question">
                            <p>Questions? <span class="call">+92 300 618 7055</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include ("includes/footer.php");?>

<script>
    $(document).ready(function (){
        $("#checkout-button").click(function (){
            $(this).addClass("loader");

            setTimeout(function (){
                $("#checkout-button").removeClass("loader");
            }, 5000);

        });
    });
</script>

<?php
include ("includes/js.php");
?>