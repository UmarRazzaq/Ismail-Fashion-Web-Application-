<?php include 'includes/session.php'; ?>
<?php
include ("includes/header.php");
include ("includes/navbar.php");
?>
<main>
        <section class="header">
            <div class="slider">
                <div class="slide-img fade" style="display: block;">
                    <div class="img-info" id="info">
                        <h1>Lawn Collection</h1>
                        <p>In  2022 Ismail Fashion's<br> introduce a new collection of lawn.</p>
                    </div>
                    <a href="#">
                        <img class="large" src="images/VT21-collection-image_3024x.jpg" width="100%">
                    </a>
                </div>
                <div class="slide-img fade">
                    <div class="img-info" id="info">
                        <h1>Swiss Lawn</h1>
                        <p>In  2022 Ismail Fashion's<br> introduce a new collection of Swiss lawn.</p>
                    </div>
                    <a href="#">
                        <img class="large" src="images/unstitched_3024x.jpg" width="100%">
                    </a>
                </div>
                <div class="slide-img fade">
                    <div class="img-info" id="info">
                        <h1>Party Wear</h1>
                        <p>In  2022 Ismail Fashion's<br> introduce a new Designs in party wear.</p>
                    </div>
                    <a href="#">
                        <img class="large" src="images/collection-image_720x.jpg" width="100%">
                    </a>
                </div>
                <a class="prev" onclick="plusSlide(-1)">&#10094;</a>
                <a class="next" onclick="plusSlide(1)">&#10095;</a>
            </div>
        </section>
        <div class="main-container col1-layout">
            <div class="main">
                <div class="col-main">
                    <div class="std">
                        <div class="category-landing-wrapper weddingwear-landing">
                            <div class="category-landing">
                                <div class="categories-wrapper">
                                    <div class="category-container category-right formal">
                                        <div class="category-img right-img1">
                                            <a href="bridal.php">
                                                <img class="web-image" alt="" src="images/xformal.jpg">
                                            </a>
                                        </div>
                                        <div class="category-img right-img2">
                                            <a href="ladies.php">
                                                <img class="web-image" alt="" src="images/xtile-4.jpg">
                                            </a>
                                        </div>
                                        <div class="category-detais-wrapper right-detail1">
                                            <div class="category-detais">
                                                <h3>Lawn Collection</h3>
                                                <p>Ismail Fashion's Sale New Lawn Collection's in reasonable price.</p>
                                                <a href="lawn.php"><span>view collection</span></a>
                                            </div>
                                        </div>
                                        <div class="category-detais-wrapper right-detail2">
                                            <div class="category-detais">
                                                <h3>Gents Collection</h3>
                                                <p>Ismail Fashion's Sale New Gents Collection's in reasonable price.</p>
                                                <a href="gents.php"><span>view collection</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category-container category-left mehndi">
                                        <div class="category-img left-img1">
                                            <a href="lawn.php">
                                                <img class="web-image" alt="" src="images/xreadytowear-hometilenew.jpg">
                                            </a>
                                        </div>
                                        <div class="category-img left-img2">
                                            <a href="gents.php">
                                                <img class="web-image" alt="" src="images/10.jpg">
                                            </a>
                                        </div>
                                        <div class="category-detais-wrapper left-detail1">
                                            <div class="category-detais">
                                                <h3>Wedding Wear</h3>
                                                <p>Ismail Fashion's Sale New Bridle, Mehndi, & Formal Collection's in reasonable price.</p>
                                                <a href="bridal.php"><span>view collection</span></a>
                                            </div>
                                        </div>
                                        <div class="category-detais-wrapper left-detail2">
                                            <div class="category-detais">
                                                <h3>Ladies Unstitched</h3>
                                                <p>Ismail Fashion's Sale New Ladies Unstitched Collection's in reasonable price.</p>
                                                <a href="ladies.php"><span>view collection</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container page-width">
            <div class="gallery-section">
                <div class="title-gallery gallery-item center">
                    <h1>#ISMAIL FASHION'S</h1>
                </div>
                <div class="gallery gallery-item center">
                    <ul class="gallery-img gallery-img-grid">
                        <li class="img-tile">
                            <a href="swiss.php" class="img-link">
                                <div class="grid-img">
                                    <div class="gallery-img-wrapper">
                                        <img src="images/gallery-img-3.jpg" class="image" sizes="(max-width:700px) 50vw, 50vw">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="img-tile">
                            <a href="lawn.php" class="img-link">
                                <div class="grid-img">
                                    <div class="gallery-img-wrapper">
                                        <img src="images/gallery-img-7.jpg" class="image" sizes="(max-width:700px) 50vw, 50vw">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="img-tile">
                            <a href="print.php" class="img-link">
                                <div class="grid-img">
                                    <div class="gallery-img-wrapper">
                                        <img src="images/gallery-img-2.jpg" class="image" sizes="(max-width:700px) 50vw, 50vw">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="img-tile">
                            <a href="party_wear.php" class="img-link">
                                <div class="grid-img">
                                    <div class="gallery-img-wrapper">
                                        <img src="images/gallery-img-5.jpg" class="image" sizes="(max-width:700px) 50vw, 50vw">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="img-tile">
                            <a href="formal.php" class="img-link">
                                <div class="grid-img">
                                    <div class="gallery-img-wrapper">
                                        <img src="images/gallery-img-8.jpg" class="image" sizes="(max-width:700px) 50vw, 50vw">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="img-tile">
                            <a href="party_wear.php" class="img-link">
                                <div class="grid-img">
                                    <div class="gallery-img-wrapper">
                                        <img src="images/gallery-img-4.jpg" class="image" sizes="(max-width:700px) 50vw, 50vw">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="img-tile">
                            <a href="bridal.php" class="img-link">
                                <div class="grid-img">
                                    <div class="gallery-img-wrapper">
                                        <img src="images/gallery-img-1.jpg" class="image" sizes="(max-width:700px) 50vw, 50vw">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="img-tile">
                            <a href="bridal.php" class="img-link">
                                <div class="grid-img">
                                    <div class="gallery-img-wrapper">
                                        <img src="images/gallery-img-9.jpg" class="image" sizes="(max-width:700px) 50vw, 50vw">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="img-tile">
                            <a href="bridal.php" class="img-link">
                                <div class="grid-img">
                                    <div class="gallery-img-wrapper">
                                        <img src="images/gallery-img-6.jpg" class="image" sizes="(max-width:700px) 50vw, 50vw">
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <div class="main-container col2-left-layout">
        <div class="main">
            <div class="col-main">
                <div class="page-title">
                    <h1>#Trending</h1>
                </div>
                <div class="cat-product" style="">
                    <?php
                    $conn = $pdo->open();

                    try {
                        $query = $conn->prepare("SELECT *, product_id, SUM(quantity) AS TotalQuantity FROM products p INNER JOIN details d ON p.id=d.product_id GROUP BY product_id ORDER BY SUM(quantity) DESC LIMIT 4");
                        $query->execute();
                        foreach ($query as $row){
                            $photo = (!empty($row['photo'])) ? 'product_images/'.$row['photo'] : 'product_images/noimage.jpg';
                            echo '
                    <div class="product-grid grid_item">
                        <div class="hover2">
                            <div class="p-image pro-hover">
                                <a href="products.php?product='.$row['slug'].'" title='.$row['name'].' class="p-image">
                                    <img src="'.$photo.'" alt='.$row['name'].'>
                                </a>
                            </div>
                            <div class="p-info" style="min-height: 106px;">
                                <h3 class="p-name">
                                    <a href="products.php?product='.$row['slug'].'">'.$row['name'].'</a>
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
<script src="js/main.js"></script>
<?php
include ("includes/footer.php");
include ("includes/js.php");
?>
