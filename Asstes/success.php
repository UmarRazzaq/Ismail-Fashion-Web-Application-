<?php include ("includes/session.php"); ?>
<?php
include ("includes/header.php");
include ("includes/navbar.php");
?>

    <main>
        <div class="main-container col1-layout">
            <div class="main">
                <div class="col-main">
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
	        						" .$user['firstname']. $user['lastname'].' '.$_SESSION['success']."
	        					</div>
	        				";
                        unset($_SESSION['success']);
                    }
                    ?>
                    <div class="account-login">
                        <div class="block block-login" style="width: 450px;">
                            <form method="post" action="sales.php">
                                <div class="block-content cart-wrapper">
                                    <div id="displayItems" class="item-wrapper">
                                    </div>
                                </div>
                                <div class="btn-success">
                                    <button class="success" id="success-button" type="submit" name="placeOrder">Confirm Your Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $pdo->close(); ?>
    <script>
        var total = 0;
        $(function (){
            $(document).on('click', '.item_delete', function (e){
                e.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: 'item_delete.php',
                    data: {id:id},
                    dataType: 'json',
                    success: function (response){
                        if (!response.error){
                            getDetails();
                            getCart();
                            getTotal();
                        }
                    }
                })
            });

            $(document).on('click', '.minus', function (e){
                e.preventDefault();
                var id =$(this).data('id');
                var qty = $('#qty_'+id).val();
                if (qty>1){
                    qty--;
                }
                $('#qty_'+id).val(qty);
                $.ajax({
                    type: 'POST',
                    url:  'item_update.php',
                    data: {
                        id: id,
                        qty: qty,
                    },
                    dataType: 'json',
                    success: function (response){
                        if (!response.error){
                            getDetails();
                            getCart();
                            getTotal;
                        }
                    }
                });
            });

            $(document).on('click', '.plus', function (e){
                e.preventDefault();
                var id = $(this).data('id');
                var qty = $('#qty_'+id).val();
                qty++;
                $('#qty_'+id).val(qty);
                $.ajax({
                    type: 'POST',
                    url: 'item_update.php',
                    data: {
                        id: id,
                        qty: qty,
                    },
                    dataType: 'json',
                    success: function(response){
                        if(!response.error){
                            getDetails();
                            getCart();
                            getTotal();
                        }
                    }
                });
            });

            getDetails();
            getTotal();

        });

        function getDetails(){
            $.ajax({
                type: 'POST',
                url: 'item_success.php',
                dataType: 'json',
                success: function(response){
                    $('#displayItems').html(response);
                    getCart();
                }
            });
        }

        function getTotal(){
            $.ajax({
                type: 'POST',
                url: 'item_total.php',
                dataType: 'json',
                success:function(response){
                    total = response;
                }
            });
        }

        $(document).ready(function (){
            $("#success-button").click(function (){
                $(this).addClass("load");
                $(this).removeClass("success");

                setTimeout(function (){
                    $("#success-button").removeClass("load");
                    $("#success-button").addClass("success");
                }, 5000);

            });
        });

    </script>
<?php
include ("includes/footer.php");
include ("includes/js.php");
?>