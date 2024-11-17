<?php
    include 'includes/session.php';

    if(isset($_POST['order'])){
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $contact_info = $_POST['contact_info'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $zip_code = $_POST['zip_code'];
        $conf_email = $_POST['conf_email'];
        $conf_number = $_POST['conf_number'];

        if ($email != $conf_email){
            $_SESSION['error'] = "Email did not match";
            header("location: checkout.php");
        }

        if ($contact_info != $conf_number){
            $_SESSION['error'] = "Contact number  did not match";
            header("location: checkout.php");
        }

        $conn = $pdo->open();
        $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        $row = $stmt->fetch();


        try{
            $query = $conn->prepare("UPDATE users SET email=:email, firstname=:firstname, lastname=:lastname, contact_info=:contact_info, address=:address, zip_code=:zip_code, country=:country, city=:city WHERE id=:id");
            $query->execute(['email'=>$email, 'firstname'=>$firstname, 'lastname'=>$lastname, 'contact_info'=>$contact_info, 'address'=>$address, 'zip_code'=>$zip_code, 'country'=>$country, 'city'=>$city, 'id'=>$user['id']]);
            $_SESSION['success'] = 'checkout successfully';

        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }


        $pdo->close();
    }
    else{
        $_SESSION['error'] = 'Fill up edit user form first';
    }

    header('location: success.php');

?>

