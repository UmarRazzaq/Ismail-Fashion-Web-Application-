<?php
    include ("includes/session.php");
    $conn = $pdo->open();

    $output = '';

    if(isset($_SESSION['user'])){

        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $row) {
                    $query = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND product_id=:product_id");
                    $query->execute(['user_id' => $user['id'], 'product_id' => $row['productid']]);
                    $crow = $query->fetch();
                    if ($crow['numrows'] < 1) {
                        $query = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
                        $query->execute(['user_id' => $user['id'], 'product_id' => $row['productid'], 'quantity' => $row['quantity']]);
                    } else {
                        $query = $conn->prepare("UPDATE cart SET quantity=:quantity WHERE user_id=:user_id AND product_id=:product_id");
                        $query->execute(['quantity' => $row['quantity'], 'user_id' => $user['id'], 'product_id' => $row['productid']]);
                    }
                }
                unset($_SESSION['cart']);
            }
        }

        try{
            $total = 0;
            $query = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user");
            $query->execute(['user'=>$user['id']]);
            foreach($query as $row){
                $image = (!empty($row['photo'])) ? 'product_images/'.$row['photo'] : 'product_images/noimage.jpg';
                $subtotal = $row['price']*$row['quantity'];
                $total += $subtotal;
                $output .= '
                <div class="product-wrapper">
                                <div class="cart-item">
                                    <div class="item">
                                        <div class="product-img">
                                            <img src="'.$image.'" alt="">
                                        </div>
                                        <div class="item-detail">
                                            <div style="display: flex;">
                                                <h5>'.$row['name'].'</h5>
                                                <button class="removed item_delete" data-id="'.$row['cartid'].'" type="button"><span class="las la-times"></span></button>
                                            </div>
                                            <h5 class="price">Price: <span style="font-family: dosis-light; margin-left: 10px">PKR  ' .number_format($row['price']).'</span></h5>
                                            <div class="quantity">
                                                <label for="quantity">Quantity:</label><br>
                                                <div class="qty-field">
                                                    <span class="qty-control">
                                                        <button disabled class="btn-minus minus" id="minus" data-id="'.$row['cartid'].'" type="button"><i class="las la-minus"></i></button>
                                                    </span>
                                                    <input disabled type="number" min="1" value="'.$row['quantity'].'" max="'.$row['stock'].'" name="quantity" id="qty_'.$row['cartid'].'" class="qty">
                                                    <span class="qty-control">
                                                        <button disabled class="btn-plus plus" id="plus" data-id="'.$row['cartid'].'" type="button"><i class="las la-plus"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                            <label>Delivery: <span style="color: #0fc80f; margin-left: 10px;">FREE</span></label>
                                            <h5 class="price">SubTotal:<span style="font-family: dosis-light; margin-left: 10px;">PKR  '.number_format($subtotal).'</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }
            $output .= '<div class="price-wrapper">
                                <div class="priced">
                                    <label>Total: </label>
                                    <span>PKR '.number_format($total).'</span>
                                </div>
                            </div>';
        }
        catch(PDOException $e){
            $output .= $e->getMessage();
        }

    }
    else{
        if(count($_SESSION['cart']) != 0){
            $total = 0;
            foreach($_SESSION['cart'] as $row){
                $query = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
                $query->execute(['id'=>$row['productid']]);
                $product = $query->fetch();
                $image = (!empty($product['photo'])) ? 'product_images/'.$product['photo'] : 'product_images/noimage.jpg';
                $subtotal = $product['price']*$row['quantity'];
                $total += $subtotal;
                $output .= '
                <div class="product-wrapper">
                                <div class="cart-item">
                                    <div class="item">
                                        <div class="product-img">
                                            <img src="'.$image.'" alt="">
                                        </div>
                                        <div class="item-detail">
                                            <div style="display: flex;">
                                                <h5>'.$product['prodname'].'</h5>
                                                <button class="removed item_delete" data-id="'.$row['productid'].'" type="button"><span class="las la-times"></span></button>
                                            </div>
                                            <span>'.$product['catname'].'</span>
                                            <h5 class="price">Price: <span style="font-family: dosis-light; margin-left: 10px">PKR  ' .number_format($product['price']).'</span></h5>
                                            <div class="quantity">
                                                <label for="quantity">Quantity:</label><br>
                                                <div class="qty-field">
                                                    <span class="qty-control">
                                                        <button disabled class="btn-minus minus" id="minus" data-id="'.$row['productid'].'" type="button"><i class="las la-minus"></i></button>
                                                    </span>
                                                    <input disabled type="number" min="1" value="'.$row['quantity'].'" max="'.$product['stock'].'" name="quantity" id="qty_'.$row['productid'].'" class="qty">
                                                    <span class="qty-control">
                                                        <button disabled class="btn-plus plus" id="plus" data-id="'.$row['productid']. '" type="button"><i class="las la-plus"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                            <label>Delivery: <span style="color: #0fc80f; margin-left: 10px;">FREE</span></label>
                                            <h5 class="price">SubTotal:<span style="font-family: dosis-light; margin-left: 10px;">PKR  '.number_format($subtotal).'</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>';

            }

            $output .= '<div class="price-wrapper">
                                <div class="priced">
                                    <label>Total: </label>
                                    <span>PKR '.number_format($total).'</span>
                                </div>
                            </div>';
        }

        else{
            $output .= '<p class="cart-msg">There is no item in your Cart.</p>';
        }

    }

    $pdo->close();
    echo json_encode($output);

?>