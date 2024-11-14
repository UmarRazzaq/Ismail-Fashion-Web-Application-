<?php include 'includes/session.php'; ?>
<?php
  if(!isset($_GET['user'])){
    header('location: users.php');
    exit();
  }
  else{
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id'=>$_GET['user']]);
    $user = $stmt->fetch();

    $pdo->close();
  }

?>
<?php include 'includes/header.php';
include "includes/sidebar.php";?>

<div class="main-content">
    <?php
    include "includes/navbar.php";
    ?>
    <main>
        <div class="title1">
            <h2><?php echo $user['firstname'].' '.$user['lastname'].'`s Cart' ?></h2>
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
            <button id="myBtn">
                <a href="#addnew" data-toggle="modal" id="add" data-id="<?php echo $user['id']; ?>" style="text-decoration: none; color: white;">
                    <span class="las la-plus"></span>
                    New
                </a>
            </button>
            <button id="myBtn">
                <a href="users.php" style="text-decoration: none; color: white;">
                    <i class="las la-arrow-left"></i>
                    Users
                </a>
            </button>
        </div>
        <div class="cat-wrapper">
            <div class="cat-grid">
                <div class="products">
                    <div class="card">
                        <!--                        <div class="card-header">-->
                        <!--                            <h2>Recent Orders</h2>-->
                        <!--                            <button onclick="window.location.href = 'sale.php';">see all <span class="las la-arrow-right"></span></button>-->
                        <!--                        </div>-->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                    <tr>
                                        <td>Product Name</td>
                                        <td>Quantity</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $conn = $pdo->open();

                                    try{
                                        $stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
                                        $stmt->execute(['user_id'=>$user['id']]);
                                        foreach($stmt as $row){
                                            echo "
                                              <tr>
                                                <td>".$row['name']."</td>
                                                <td>".$row['quantity']."</td>
                                                <td class='ac-btn'>                                                  
                                                    <button class='c3 edit' style='width: 110px' data-id='".$row['cartid']."'><i class='las la-check-square'></i> Edit Quantity</button>
                                                </td>
                                                <td class='ac-btn'>
                                                  <button class='c2 delete' data-id='".$row['cartid']."'><i class='las la-trash-alt'></i> Delete</button>
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
<!-- ./wrapper -->

<?php include 'includes/cart_modal.php'; ?>
<?php include 'includes/js.php'; ?>
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

  $('#add').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getProducts(id);
  });

  $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

});

function getProducts(id){
  $.ajax({
    type: 'POST',
    url: 'products_all.php',
    dataType: 'json',
    success: function(response){
      $('#product').append(response);
      $('.userid').val(id);
    }
  });
}

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'cart_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.cartid').val(response.cartid);
      $('.userid').val(response.user_id);
      $('.productname').html(response.name);
      $('#edit_quantity').val(response.quantity);
    }
  });
}
</script>
<?php include 'includes/footer.php';?>
