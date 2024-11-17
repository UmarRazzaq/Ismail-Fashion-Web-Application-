<?php include 'includes/session.php'; ?>
<?php
include ("includes/header.php");
include ("includes/navbar.php");
?>

<main>
    <div class="main-container col2-left-layout">
        <div class="main">
            <div class="col-main">
                <div class="page-title">
                    <h1>Lawn Collection'21</h1>
                </div>
                <div class="cat-product" style="">
                        <?php
                            $conn = $pdo->open();

                        try {
                            $query = $conn->prepare("SELECT *, p.name AS proname FROM products p JOIN category c ON c.id = p.category_id WHERE c.cat_slug = 'lawn'");
                            $query->execute();
                            foreach ($query as $row){
                                $photo = (!empty($row['photo'])) ? 'product_images/'.$row['photo'] : 'product_images/noimage.jpg';
                                echo '
                    <div class="product-grid grid_item">
                        <div class="hover2">
                            <div class="p-image pro-hover">
                                <a href="products.php?product='.$row['slug'].'" title='.$row['proname'].' class="p-image">
                                    <img src="'.$photo.'" alt='.$row['proname'].'>
                                </a>
                            </div>
                            <div class="p-info" style="min-height: 106px;">
                                <h3 class="p-name">
                                    <a href="products.php?product='.$row['slug'].'">'.$row['proname'].'</a>
                                </h3>
                                <div class="p-d-wrapper">
                                    <div class="in-detail">
                                        <div class="p-detail">
                                            <div class="sticker">';?><?php
                                if ($row['stock'] == 0){
                                    echo '
                                                <div style="width: 80px;" class="status1">
                                            <span>Sold out</span>';
                                }else{
                                    echo '<div class="status1">
                                                        <span>New</span>';
                                }
                                echo '
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="reg-price">
                                                <span class="price">PKR '.number_format($row['price']).' </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                            }
                        }catch (PDOException $e){
                            echo "There is some problem in connection: " .$e->getMessage();
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include ("includes/footer.php");
include ("includes/js.php");
?>