<?php include ("includes/session.php"); ?>

<?php
    $conn = $pdo->open();

    $slug = $_GET['product'];

    try {
        $query =$conn->prepare("SELECT *, products.name AS proname, category.name AS catname, products.id AS proid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug=:slug");
        $query->execute(['slug'=>$slug]);
        $product = $query->fetch();
    }catch (PDOException $e){
        echo "There is some problem is connection" .$e->getMessage();
    }

    $now = date('Y-m-d');
    if ($product['date_view']==$now){
        $query = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
        $query->execute(['id'=>$product['proid']]);
    }else{
        $query = $conn->prepare('UPDATE products SET counter=1, date_view=:now WHERE id=:id');
        $query->execute(['id'=>$product['proid'], 'now'=>$now]);
    }

?>

<?php
include ("includes/header.php");
include ("includes/navbar.php");
?>

<div class="landing">
    <div class="callout" id="callout" style="display:none">
        <button type="button" class="closed"><span aria-hidden="true">&times;</span></button>
        <span class="message"></span>
    </div>
    <div class="content">
        <div class="left box">
            <div class="pro-img">
                <img src="<?php echo (!empty($product['photo'])) ? 'product_images/'.$product['photo'] : 'product_images/noimage.jpg'; ?>">
            </div>
        </div>
        <div class="right box">
            <div class="pro-title">
                <h1><?php echo $product['proname']; ?></h1>
                <h4><?php echo $product['catname']; ?></h4>
                <span class="price1">PKR <?php echo number_format($product['price']); ?></span>
            </div>
            <?php

            $disabled = '';
            if($product['stock']==0){
                $total = 0;
                $disabled = "disabled";
            }else{
                $total = 1;
            }
            ?>
            <div class="pro-quantity">
                <form action="#" method="post" enctype="multipart/form-data" id="productForm">
                    <b class="propertyname">Availabilty:</b> <?php if($product['stock']==0){ echo "Out Of Stock";}else{ echo $product['stock'], " Clothes"; }?>

                    <div class="quantity">
                        <label for="quantity">Quantity:</label><br>
                        <div class="qty-field">
                            <span class="qty-control">
                                <button <?php echo $disabled;?> class="btn-minus" id="minus" type="button"><i class="las la-minus"></i></button>
                            </span>
                            <input <?php echo $disabled;?> type="number" min="1" value="1" max="<?php echo $product['stock']; ?>" name="quantity" id="quantity" class="qty">
                            <span class="qty-control">
                                <button <?php echo $disabled;?> class="btn-plus" id="plus" type="button"><i class="las la-plus"></i></button>
                            </span>
                            <input type="hidden" value="<?php echo $product['proid']; ?>" name="id">
                        </div>
                    </div>
                    <div class="cart-btn">
                        <?php
                            if ($product['stock'] == 0){
                                echo '<input type="submit" name="submit" style="background-color: #777777;" class="btn-bag" disabled value="Out Of Stock">';
                            }else{
                                echo '<button type="submit" class="btn-bag">Add To Cart</button>';
                            }
                        ?>
                    </div>
                </form>
            </div>
            <div class="pro-desc">
                <label for="desc">Description:</label><br>
                <p class="desc">
                    <?php echo $product['description']; ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php $pdo->close(); ?>
<?php include ("includes/footer.php");?>
<script>
    $(function (){
        $('#plus').click(function (e){
            e.preventDefault();
            var quantity = $('#quantity').val();
            quantity++;
            $('#quantity').val(quantity);
        });
        $('#minus').click(function (e){
            e.preventDefault();
            var quantity = $('#quantity').val();
            if (quantity > 1){
                quantity--;
            }
            $('#quantity').val(quantity);
        });
    });
</script>
<?php include ("includes/js.php"); ?>
