<?php include ("includes/session.php"); ?>
<?php
include ("includes/header.php");
include ("includes/navbar.php");
?>

    <main>
        <div class="main-container col1-layout">
            <div class="main">
                <div class="col-main">
                    <div class="cart-wrapper">
                        <h6>My Shopping Cart</h6>
                        <hr>
                        <div id="displayItems" class="item-wrapper">
                        </div>
                    </div>
                    <?php
                    if(isset($_SESSION['user'])){
                        echo "
	        				    <button class='checkout'><a href='checkout.php'>Checkout</a></button>
                              ";
                    }
                    else{
                        echo "
	        					<button class='checkout'><a href='login.php'>Login To Checkout</a></button>
	        				";
                    }
                    ?>
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
                url: 'item_details.php',
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

    </script>
<?php
include ("includes/footer.php");
include ("includes/js.php");
?>