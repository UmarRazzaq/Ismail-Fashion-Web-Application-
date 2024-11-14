<?php
include 'includes/session.php';
?>
<?php
include "includes/header.php";
include "includes/sidebar.php";
?>
<div class="main-content">
    <?php
    include "includes/navbar.php";
    ?>
    <main>
        <div class="title1">
            <h2>Sale Report</h2>
        </div>
        <?php
        if(isset($_SESSION['error'])){
            echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
            echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
            unset($_SESSION['success']);
        }
        ?>
        <div class="cat-btn">
            <button onclick="window.location.href = 'report.php'">
                <span class="las la-arrow-left"></span>
                Bcak
            </button>
        </div>
        <div class="cat-wrapper">
            <div class="cat-grid">
                <div class="products">
                    <div class="card">
                        <div class="card-header">
                            <h2>Most Sale Products</h2>
                            <div>
                                <label>Search sale report:</label>
                                <select class="form-control input-sm" id="select_category">
                                    <option value="0">ALL</option>
                                    <option value="1">Most Sale</option>
                                    <option value="2">Less Sale</option>
                                    <option value="3">Not Sale</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="" class="table table-bordered" width="100%">
                                    <thead>
                                    <tr>
                                        <td>Product Name</td>
                                        <td>Photo</td>
                                        <td>Description</td>
                                        <td>Quantity</td>
                                        <td>Total Amount</td>
                                        <td>Delete</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $conn = $pdo->open();

                                    try{
                                        $now = date('Y-m-d');
                                        $stmt = $conn->prepare("SELECT *, product_id, SUM(quantity) AS TotalQuantity FROM products p INNER JOIN details d ON p.id=d.product_id GROUP BY product_id ORDER BY SUM(quantity) DESC LIMIT 10");
                                        $stmt->execute();
                                        $total = 0;
                                        foreach($stmt as $row){
                                            $total = $row['price']*$row['TotalQuantity'];
                                            $image = (!empty($row['photo'])) ? '../product_images/'.$row['photo'] : '../product_images/noimage.jpg';
                                            $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                                            echo "
                                              <tr>
                                                <td>".$row['name']."</td>
                                                <td>
                                                  <img src='".$image."' height='30px' width='30px'>
                                                </td>
                                                <td class='ac-btn'>
                                                    <button class='c5'>
                                                        <a href='#description' data-toggle='modal' class='desc' data-id='".$row['id']."'>
                                                            <i class='las la-search'></i> View
                                                        </a>
                                                    </button>
                                                </td>
                                                <td>".$row['TotalQuantity']."</td>
                                                <td>PKR".number_format($total)."</td>
                                                <td class='ac-btn'>
                                                  <button class='c2 delete' data-id='".$row['id']."'> Delete</button>
                                                </td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
    $(function(){

        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            $('#delete').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.desc', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            getRow(id);
        });

        $('#select_category').change(function(){
            var val = $(this).val();
            if(val == 0){
                window.location = 'report.php';
            }
            else if (val==1){
                window.location = 'most_sale.php';
            }
            else if (val==2){
                window.location = 'less_sale.php';
            }
            else {
                window.location = 'not_sale.php'
            }
        });

    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'products_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('#desc').html(response.description);
                $('.name').html(response.prodname);
                $('.prodid').val(response.prodid);
                $('#edit_name').val(response.prodname);
                $('#catselected').val(response.category_id).html(response.catname);
                $('#edit_stock').val(response.stock);
                $('#edit_price').val(response.price);
                CKEDITOR.instances["editor2"].setData(response.description);
                getCategory();
            }
        });
    }
    function getCategory(){
        $.ajax({
            type: 'POST',
            url: 'category_fetch.php',
            dataType: 'json',
            success:function(response){
                $('#category').append(response);
                $('#edit_category').append(response);
            }
        });
    }
</script>
<?php
include "includes/footer.php";
include "includes/product_modal.php";
include "includes/js.php";
?>

