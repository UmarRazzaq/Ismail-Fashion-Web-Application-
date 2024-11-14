<?php
include 'includes/session.php';
include "includes/header.php";
include "includes/sidebar.php";
?>
<div class="main-content">
    <?php
    include "includes/navbar.php";
    ?>
    <main>
        <div class="title1">
            <h2>Sales</h2>
        </div>
        <div class="cat-wrapper">
            <div class="cat-grid">
                <div class="products">
                    <div class="card">
                        <div class="card-header">
                            <h2>Orders History</h2>
                            <div style="margin-top: 30px;">
                                <form action="" method="POST">
                                    <input type="date" name="StartDate">
                                    <input type="date" name="EndDate">
                                    <input type="submit" class="report" value="Apply" name="Report">
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                    <tr>
                                        <td>Date</td>
                                        <td>Customer Name</td>
                                        <td>Transaction ID</td>
                                        <td>Amount</td>
                                        <td>Sales Details</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $conn = $pdo->open();

                                    try{
                                        if(isset($_POST["Report"])){
                                            $start = $_POST['StartDate'];
                                            $End = $_POST['EndDate'];
                                            $stmt = $conn->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id WHERE sales_date BETWEEN '$start' AND '$End' ORDER BY sales_date DESC;");
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
                                                        <td>PKR ".number_format($total, 2)."</td>
                                                        <td class='ac-btn'><button type='button' class='c5 transact' data-id='".$row['salesid']."'><i class='las la-search'></i> View</button></td>
                                                    </tr>
                                                    ";
                                            }
                                        }
                                        else{
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
                                                        <td>PKR ".number_format($total, 2)."</td>
                                                        <td class='ac-btn'><button type='button' class='c5 transact' data-id='".$row['salesid']."'><i class='las la-search'></i> View</button></td>
                                                    </tr>
                                                    ";
                                            }
                                        }
                                    }
                                    catch(PDOException $e){
                                        echo $e->getMessage();
                                    }

                                    $pdo->close();
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php include "includes/product_modal.php"; ?>
<script>
$(function(){
  $(document).on('click', '.transact', function(e){
    e.preventDefault();
    $('#transaction').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'transact.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#date').html(response.date);
        $('#transid').html(response.transaction);
        $('#no').html(response.contact);
        $('#address').html(response.address);
        $('#detail').prepend(response.list);
        $('#total').html(response.total);
      }
    });
  });

  $("#transaction").on("hidden.bs.modal", function () {
      $('.prepend_items').remove();
  });
});
</script>
<?php
include "includes/footer.php";
include "includes/js.php";
?>
