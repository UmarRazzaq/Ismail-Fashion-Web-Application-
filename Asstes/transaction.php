<?php

    include 'includes/session.php';

    $id = $_POST['id'];

    $conn = $pdo->open();

    $output = array('list'=>'');

    $query = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=deatils.sales_id WHERE details.sales_id=:id");
    $query->execute(['id'=>$id]);

    $total = 0;
    foreach ($query as $row){
        $output['transaction'] = $row['pay_id'];
        $output['data'] = date('M d, Y', strtotime($row['sales_date']));
        $subtotal = $row['price']*$row['quatity'];
        $total = $subtotal;
        $output['list'] .= '<div class="product-wrapper">
                                <div class="cart-item">
                                    <div class="item">
                                        <div class="item-detail">
                                            <div style="display: flex;">
                                                <h5>'.$row['name'].'</h5>
                                            </div>
                                            <h5 class="price">Price: <span style="font-family: dosis-light; margin-left: 10px">PKR  ' .number_format($row['price']).'</span></h5>
                                            <div class="quantity">
                                                <label for="quantity">Quantity: '.$row['quantity'].'</label>
                                            </div>
                                            <label>Delivery: <span style="color: #0fc80f; margin-left: 10px;">FREE</span></label>
                                            <h5 class="price">SubTotal:<span style="font-family: dosis-light; margin-left: 10px;">PKR  '.number_format($subtotal).'</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>';
    }

    $output['total'] = '<b>PKR  '.number_format($total).'</b>';
    $pdo->close();
    echo json_encode($output);


?>