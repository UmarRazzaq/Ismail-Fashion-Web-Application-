<?php
    include 'includes/session.php';
    $conn = $pdo->open();

    $output = array('list'=>'','count'=>0);

    if(isset($_SESSION['user'])){
        try{
            $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname FROM cart LEFT JOIN products ON products.id=cart.product_id LEFT JOIN category ON category.id=products.category_id WHERE user_id=:user_id");
            $stmt->execute(['user_id'=>$user['id']]);
            foreach($stmt as $row){
                $output['count']++;
                $image = (!empty($row['photo'])) ? 'product_images/'.$row['photo'] : 'product_images/noimage.jpg';
                $productname = (strlen($row['prodname']) > 30) ? substr_replace($row['prodname'], '...', 27) : $row['prodname'];
                $output['list'] .= "";
            }
        }
        catch(PDOException $e){
            $output['message'] = $e->getMessage();
        }
    }
    else{
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }

        if(empty($_SESSION['cart'])){
            $output['count'] = 0;
        }
        else{
            foreach($_SESSION['cart'] as $row){
                $output['count']++;
                $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
                $stmt->execute(['id'=>$row['productid']]);
                $product = $stmt->fetch();
                $image = (!empty($product['photo'])) ? 'product_images/'.$product['photo'] : 'product_images/noimage.jpg';
                $output['list'] .= "";

            }
        }
    }

    $pdo->close();
    echo json_encode($output);

?>

