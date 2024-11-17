<?php
$to_email = "bcsf17s13.uos@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: arlan.razzaq381@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
?>
<?php
session_start();
include('dbcon.php');
include('function.php');

if (isset($_POST['placeOrder'])) {

    $Name = mysqli_real_escape_string($con, $_POST['Name']);
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    $Address = mysqli_real_escape_string($con, $_POST['Address']);
    $Phone = mysqli_real_escape_string($con, $_POST['Phone']);
    $City = mysqli_real_escape_string($con, $_POST['City']);
    $State = mysqli_real_escape_string($con, $_POST['State']);
    $Zip = mysqli_real_escape_string($con, $_POST['Zip']);

    $insertquery = "INSERT INTO `order_manager`(`Name`, `Email`, `Address`,`Phone`, `City`, `State`, `Zip`) 
        VALUES ('$Name','$Email','$Address','$Phone','$City','$State','$Zip')";
    if($iquery =  mysqli_query($con, $insertquery)){

        $Order_id = mysqli_insert_id($con);

        $stmt = $con->prepare("INSERT INTO user_order values(?, ?, ?, ?, ?)");

        if($stmt){
            $stmt->bind_param("issss", $Order_id, $code, $prdName, $prdPrice, $prdQuantity);
            foreach($_SESSION["Shop"] as $product){
                $code =  $product["code"];
                $prdName = $product["prdName"];
                $prdPrice = $product["prdPrice"];
                $prdQuantity = $product["prdQuantity"];
                mysqli_stmt_execute($stmt);
            }
            unset($_SESSION["Shop"]);

            if ($iquery) {
                $subject = "Order Placed Check Your Email";
                $body = "Order has been plaved";
                $headers = "From: bazam3592@gmail.com";

                if (mail($Email, $subject, $body, $headers)) {
                    echo "<script>
                                alert('Order Placed Check Your Email');
                                window.location.href= 'http://localhost/FYP/index.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Email sending failed..');
                            window.location.href= 'http://localhost/FYP/index.php';
                        </script>";
                }
            }
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="CSSFiles/Contact.css">

    <title>Kids Corner Contact</title>
</head>
<body>
<?php
include('header.php');
include('dbcon.php');

if(isset($_POST['Submit'])){
    $Name  = mysqli_real_escape_string($con, $_POST['Name']);
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    $Subject = mysqli_real_escape_string($con, $_POST['Subject']);
    $Message = mysqli_real_escape_string($con, $_POST['Message']);


    $insertquery = "INSERT INTO `contact`(`Name`, `Email`, `Subject`, `Msg`) VALUES ('$Name','$Email','$Subject','$Message')";
    $iiquery = mysqli_query($con, $insertquery);

    if ($iiquery) {
        //For Owner
        $to = "bazam3592@gmail.com";
        $subject = "$Subject";
        $body = 'Client Name:'.$Name."\r\nMessage:".$Message;
        $headers = "From:".$Email;

        //for Client
        $to2 = "$Email";
        $subject2 = "Your message Submitted Successfully | Kids Corner";
        $body2 = 'Dear:'.$Email."\r\nThanks You for contacting us! we will get back to you shortly";
        $headers2 = "From: bazam3592@gmail.com";

        if (mail($to, $subject, $body, $headers))
        {
            if(mail($to2, $subject2, $body2, $headers2)){
                echo "<script>
                            alert('Check Your Email');
                            window.location.href= 'http://localhost/FYP/index.php';
                        </script>";
            }
        } else {
            echo "<script>
                            alert('Email sending failed..');
                            window.location.href= 'http://localhost/FYP/Contact.php';
                        </script>";
        }
    }
}
?>
<div class="Home-path">
    <p><a href="index.html">Home</a> / Contact Us</p>
</div>
<figure class="figure">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3377.6327001869886!2d74.20753551512179!3d32.16020928116256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391f2a045b8c9d93%3A0xe65f1749f58a41b3!2sMiran%20Jee%20Plaza!5e0!3m2!1sen!2s!4v1613209810300!5m2!1sen!2s" width="100%" height="530" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</figure>
<div class="Page1">
    <h1>Get In Touch</h1>
    <form action="" method="POST">
        <input type="text" name="Name" placeholder="Name*" required>
        <input type="text" name="Email" placeholder="Email*" required>
        <input type="Subject" name="Subject" placeholder="Subject (Optional)" required>
        <input type="Message" name="Message" placeholder="Message" required>
        <button name="Submit" type="submit">Send Message</button>
    </form>
</div>
<?php
include('Footer.php');
include('js.php');
?>
</body>
</html>
