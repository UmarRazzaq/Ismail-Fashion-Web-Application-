<?php include 'includes/session.php'; ?>
<?php
include ("includes/header.php");
include ("includes/navbar.php");
?>

<main>
    <div class="main-container col2-left-layout">
        <div class="main">
            <div class="col-main">
                <div class="cat-product" style="">
                    <?php

                    $conn = $pdo->open();

                    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword");
                    $stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
                    $row = $stmt->fetch();
                    if($row['numrows'] < 1){
                        echo '<h1 class="page-header">No results found for <span style="font-family: dosis-light">"'.$_POST['keyword'].'"</span></h1>';
                    }
                    else{
                        echo '<h1 class="page-header">Search results for <span style="font-family: dosis-light">"'.$_POST['keyword'].'"</span></h1>';
                        try{
                            $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
                            $stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);

                            foreach ($stmt as $row) {
                                $highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['name']);
                                $image = (!empty($row['photo'])) ? 'product_images/'.$row['photo'] : 'product_images/noimage.jpg';
                                echo '
                                    <div class="product-grid grid_item">
                                        <div class="hover2">
                                            <div class="p-image pro-hover">
                                                <a href="products.php?product='.$row['slug'].'" title='.$highlighted.' class="p-image">
                                                    <img src="'.$image.'" alt='.$highlighted.'>
                                                </a>
                                            </div>
                                            <div class="p-info" style="min-height: 106px;">
                                                <h3 class="p-name">
                                                    <a href="products.php?product='.$row['slug'].'">'.$highlighted.'</a>
                                                </h3>
                                                <div class="p-d-wrapper">
                                                    <div class="in-detail">
                                                        <div class="p-detail">
                                                            <div class="sticker">
                                                                <div class="status1">
                                                                    <span>New</span>
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

                        }
                        catch(PDOException $e){
                            echo "There is some problem in connection: " . $e->getMessage();
                        }
                    }

                    $pdo->close();

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
