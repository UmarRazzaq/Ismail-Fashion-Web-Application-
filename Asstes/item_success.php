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
                                                <img src="'.$image.'" alt="" style="width: 70px; height: 100px;">
                                            </div>
                                            <div class="item-detail">
                                                <div style="display: flex;">
                                                    <h5>'.$row['name'].'</h5>
                                                </div>
                                               
                                                <div class="quantity">
                                                    <label for="quantity">Quantity: <span style="font-family: dosis-light; margin-left: 10px;">'.$row['quantity'].'</span></label>
                                                    <h5 class="price">Price: <span style="font-family: dosis-light; margin-left: 10px">PKR  ' .number_format($row['price']).'</span></h5>
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
        $output .= '<p class="cart-msg">There is no item in your Cart.</p>';
    }

    $pdo->close();
    echo json_encode($output);

?>