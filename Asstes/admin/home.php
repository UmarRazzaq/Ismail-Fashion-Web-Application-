<?php
include 'includes/session.php';
include 'includes/format.php';
?>
<?php
include "includes/header.php";
include "includes/sidebar.php";
$con = mysqli_connect("localhost", "root", "", "ismail");
$query1 = mysqli_query($con, "SELECT * FROM sales INNER JOIN users ON sales.user_id = users.id");

?>

<div class="main-content">
    <?php
    include "includes/navbar.php";
    ?>
    <main>
        <div class="title1">
            <h2>Dashboard</h2>
        </div>
        <div class="cards">
            <div class="card_single card_3d_1">
                <div>
                    <?php
                    $query =$conn->prepare("SELECT *, COUNT(*) AS numrows FROM users");
                    $query->execute();
                    $row = $query->fetch();

                    echo "<h1>".$row['numrows']."</h1>";
                    ?>
                    <span>Users</span>
                </div>
                <div>
                    <span class="las la-users"></span>
                </div>
            </div>
            <div class="card_single card_3d_2">
                <div>
                    <?php
                    $query =$conn->prepare("SELECT *, COUNT(*) AS numrows FROM products");
                    $query->execute();
                    $row = $query->fetch();

                    echo "<h1>".$row['numrows']."</h1>";
                    ?>
                    <span>Products</span>
                </div>
                <div>
                    <span class="las la-shopping-bag"></span>
                </div>
            </div>
            <div class="card_single card_3d_3">
                <div>
                    <?php
                    $query =$conn->prepare("SELECT *, COUNT(*) AS numrows FROM category");
                    $query->execute();
                    $row = $query->fetch();

                    echo "<h1>".$row['numrows']."</h1>";
                    ?>
                    <span>Product Category</span>
                </div>
                <div>
                    <span class="las la-boxes"></span>
                </div>
            </div>
            <div class="card_single card_3d_4">
                <div>
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id");
                    $stmt->execute();

                    $total = 0;
                    foreach($stmt as $srow){
                        $subtotal = $srow['price']*$srow['quantity'];
                        $total += $subtotal;
                    }

                    echo "<h1>PKR ".number_format_short($total)."</h1>";
                    ?>
                    <span>Sales</span>
                </div>
                <div>
                    <span class="las la-money-bill-wave"></span>
                </div>
            </div>
        </div>
        <div class="recent-grid">
            <div class="products">
                <div class="card">
                    <div class="card-header">
                        <h2>Recent Sales</h2>
                       <button onclick="window.location.href = 'sale.php';">see all <span class="las la-arrow-right"></span></button>

                    </div>
                    <div class="card-body">
                    <div class="table-responsive">


                    <table width="100%">
                                    <thead>
                                    <tr>
                                        <td>Date</td>
                                        <td>Buyer Name</td>
                                        <td>Transaction ID</td>
                                        <td>Amount</td>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id ORDER BY sales_date DESC");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE details.sales_id=:id");
                        $stmt->execute(['id'=>$row['salesid']]);
                        $total = 0;
                        foreach($stmt as $details){
                          $subtotal = $details['price']*$details['quantity'];
                          $total += $subtotal;
                        }
                        echo "
                          <tr>
                            <td>".date('M d, Y', strtotime($row['sales_date']))."</td>
                            <td>".$row['firstname'].' '.$row['lastname']."</td>
                            <td>".$row['pay_id']."</td>
                            <td>PKR ".number_format($total)."</td>                       
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>

            
                                    </tbody>
                                </table>


                        <!-- <div id="piechart" style="height: 500px;"></div> -->
                    </div>
                </div>
                </div>
            </div>
            <div class="customers">
                <div class="card">
                    <div class="card-header">
                        <h2>New Users</h2>
                        <button onclick="window.location.href = 'users.php';">see all <span class="las la-arrow-right"></span></button>
                    </div>
                    <div class="card-body">
                        <?php
                        $conn = $pdo->open();

                        try {
                            $query = $conn->prepare("SELECT * FROM users WHERE type=:type ORDER BY id desc");
                            $query->execute(['type'=>0]);
                            foreach ($query as $row){
                                echo "
                        <div class='customer'>
                            <div class='info'>
                                <img src='img/avatar.png' width='40px' height='40px' alt=''>
                                <div>
                                    <h4>".$row['firstname'].' '.$row['lastname']."</h4>
                                    <small>".$row['country']."</small>
                                </div>
                            </div>
                            <div class='contact1'>
                                <span class='las la-user-circle'></span>
                                <span class='las la-comment tip'>
                                <span class='tip_text'>".$row['email']."</span>
                                </span>
                                <span class='las la-phone tip'><span class='tip_text'>".$row['contact_info']."</span></span>
                            </div>
                        </div>
                            ";
                            }
                        }catch (PDOException $e){
                            echo $e->getMessage();
                        }
                        $pdo->close();
                        ?>
                </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php
include "includes/footer.php";
include "includes/js.php";
?>
<!-- <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Category Name', 'Number Of products in each category.'],
            <?php
            //     $conn = $pdo->open();
            // try {
            //     $query = $conn->prepare("SELECT category_id, COUNT(*) AS numrows FROM products GROUP BY category_id");
            //     $query->execute();
            //     $row = $query->fetch();
            //     while ($row){
            //         echo "['".$row['category_id']."',".$row['numrows']."]";
            //     }
            // }catch (PDOException $e){
            //     echo "There is some problem in connection: " .$e->getMessage();
            // }
            ?>
        ]);

        var options = {
            title: '',
            pieHole: 0.7
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script> -->
