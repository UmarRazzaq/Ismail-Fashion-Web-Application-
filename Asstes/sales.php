<?php
    include 'includes/session.php';

    if (isset($_POST['placeOrder'])){

        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));

//        $to_email = $user['email'];
//        $subject = "Your Order no $payid";
//        $body = "Hi,".$user['firstname']. $user['lastname']. "Thank you for placing your order..";
//        $headers = "From: arlan.razzaq381@gmail.com";
//
//        if (mail($to_email, $subject, $body, $headers)) {
//            $_SESSION['success'] = "Email successfully sent to $to_email...";
//        } else {
//            $_SESSION['error'] = "Email sending failed...";
//        }

        $payid = $today . $rand;
        $date = date('Y-m-d');

        $conn = $pdo->open();

        try {
            $query = $conn->prepare("INSERT INTO sales (user_id, pay_id, sales_date) VALUES (:user_id, :pay_id, :sales_date)");
            $query->execute(['user_id'=>$user['id'], 'pay_id'=>$payid, 'sales_date'=>$date]);
            $salesid = $conn->lastInsertId();

            try {
                $query = $conn->prepare("SELECT * FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
                $query->execute(['user_id'=>$user['id']]);

                foreach ($query as $row){
                    $qty = (int) $row['quantity'];
                    $product_id = (int) $row['product_id'];
                    $update = $row['stock'] - $row['quantity'];
                    $query = $conn->prepare("INSERT INTO details (sales_id, product_id, quantity) VALUES (:sales_id, :product_id, :quantity)");
                    $query->execute(['sales_id'=>$salesid, 'product_id'=>$row['product_id'], 'quantity'=>$row['quantity']]);
                    $sql = $conn->prepare("Update products SET stock = $update WHERE id = $product_id");
                    $sql->execute();
                }

                $query = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
                $query->execute(['user_id'=>$user['id']]);

                $_SESSION['success'] = "Thank you for placing your order.";

            }catch(PDOException $e){
                $_SESSION['error'] = $e->getMessage();
            }

        }catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }

        $pdo->close();

    }

    header('location: success.php');

?>