<?php
include 'includes/session.php';
?>
<?php
$where = '';
if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE category_id ='.$catid;
}

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
            <h2>Product List</h2>
        </div>
        <?php
        if(isset($_SESSION['error'])){
            echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close_' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              <p>".$_SESSION['error']."</p>
            </div>
          ";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
            echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close_' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              <p>".$_SESSION['success']."</p>
            </div>
          ";
            unset($_SESSION['success']);
        }
        ?>
        <div class="cat-btn">
            <button>
                <a href="#addnew" data-toggle="modal" style="text-decoration: none; color: white;" id="addproduct">
                    <span class="las la-plus"></span>
                    Add product
                </a>
            </button>
        </div>
        <div class="cat-wrapper">
            <div class="cat-grid">
                <div class="products">
                    <div class="card">
                        <div class="card-header">
                            <h2>Products</h2>
                            <div>
                                <label>Search by Product category:</label>
                                <select class="form-control input-sm" id="select_category">
                                    <option value="0">ALL</option>
                                    <?php
                                    $conn = $pdo->open();
                                    $stmt = $conn->prepare("SELECT * FROM category");
                                    $stmt->execute();
                                    foreach($stmt as $crow){
                                        $selected = ($crow['id'] == $catid) ? 'selected' : '';
                                        echo "
                                                   <option value='".$crow['id']."' ".$selected.">".$crow['name']."</option>
                                                 ";
                                    }
                                    $pdo->close();
                                    ?>
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
                                        <td>Stock</td>
                                        <td>Price</td>
                                        <td>Today Views</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $conn = $pdo->open();

                                    try{
                                        $now = date('Y-m-d');
                                        $stmt = $conn->prepare("SELECT * FROM products $where");
                                        $stmt->execute();
                                        foreach($stmt as $row){
                                            $image = (!empty($row['photo'])) ? '../product_images/'.$row['photo'] : '../product_images/noimage.jpg';
                                            $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                                            echo "
                                              <tr>
                                                <td>".$row['name']."</td>
                                                <td>
                                                  <img src='".$image."' height='30px' width='30px'>
                                                  <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='".$row['id']."'><i style='font-size: 20px; color: var(--theme);' class='las la-edit'></i></a></span>
                                                </td>
                                                <td class='ac-btn'>
                                                    <button class='c5'>
                                                        <a href='#description' data-toggle='modal' class='desc' data-id='".$row['id']."'>
                                                            <i class='las la-search'></i> View
                                                        </a>
                                                    </button>
                                                </td>
                                                <td>".$row['stock']."</td>
                                                <td>PKR".number_format($row['price'])."</td>
                                                <td>".$counter." View</td>
                                                <td class='ac-btn'>
                                                  <button class='c3 edit' data-id='".$row['id']."'>Edit</button>
                                                </td>
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
        $(document).on('click', '.edit', function(e){
            e.preventDefault();
            $('#edit').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            $('#delete').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.photo', function(e){
            e.preventDefault();
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
                window.location = 'product.php';
            }
            else{
                window.location = 'product.php?category='+val;
            }
        });

        $('#addproduct').click(function(e){
            e.preventDefault();
            getCategory();
        });

        $("#addnew").on("hidden.bs.modal", function () {
            $('.append_items').remove();
        });

        $("#edit").on("hidden.bs.modal", function () {
            $('.append_items').remove();
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

