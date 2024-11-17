<?php
    include 'includes/session.php';

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $zip = $_POST['zip'];

        $conn = $pdo->open();
        $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        $row = $stmt->fetch();

        try{
            $stmt = $conn->prepare("UPDATE users SET email=:email, firstname=:firstname, lastname=:lastname, address=:address, contact_info=:contact, country=:country, city=:city, zip_code=:zip WHERE id=:id");
            $stmt->execute(['email'=>$email, 'firstname'=>$firstname, 'lastname'=>$lastname, 'address'=>$address, 'contact'=>$contact, 'country'=>$country, 'city'=>$city, 'zip'=>$zip, 'id'=>$user['id']]);
            $_SESSION['success'] = 'Address added successfully';

        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }


        $pdo->close();
    }
    else{
        $_SESSION['error'] = 'Fill up Address form first';
    }

    header('location: account.php');

?>