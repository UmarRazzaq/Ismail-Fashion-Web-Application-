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
            <h2>Users</h2>
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
                <a href="#addnew" data-toggle="modal" style="text-decoration: none; color: white;">
                    <span class="las la-plus"></span>
                    Add User
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
                                        <td>Photo</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Account Type</td>
                                        <td>Join Date</td>
                                        <td>Cart Items</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $conn = $pdo->open();

                                    try{
                                        $stmt = $conn->prepare("SELECT * FROM users WHERE type=:type");
                                        $stmt->execute(['type'=>0]);
                                        foreach($stmt as $row){
                                            $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                                            $status = ($row['status']) ? '<span class="label label-success">active</span>' : '<span class="label label-danger">not verified</span>';
                                            $active = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$row['id'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
                                            echo "
                                              <tr>
                                                <td>
                                                  <img src='img/avatar.png' height='30px' width='30px'>
                                                </td>
                                                <td>".$row['email']."</td>
                                                <td>".$row['firstname'].' '.$row['lastname']."</td>
                                                <td>".$row['type']."</td>
                                                <td>".date('M d, Y', strtotime($row['created_on']))."</td>                                              
                                                <td class='ac-btn'>
                                                    <button class='c5'>
                                                        <a href='cart.php?user=".$row['id']."'>
                                                            <i class='las la-search'></i> View
                                                        </a>
                                                    </button>
                                                </td>
                                                <td class='ac-btn'>
                                                    <button class='c3 edit' data-id='".$row['id']."'><i class='las la-check-square'></i> Edit</button>
                                                </td>
                                                <td class='ac-btn'>
                                                  <button class='c2 delete' data-id='".$row['id']."'><i class='las la-trash-alt'></i> Delete</button>
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

        $(document).on('click', '.status', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            getRow(id);
        });

    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'users_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('.userid').val(response.id);
                $('#edit_email').val(response.email);
                $('#edit_password').val(response.password);
                $('#edit_firstname').val(response.firstname);
                $('#edit_lastname').val(response.lastname);
                $('#edit_address').val(response.address);
                $('#edit_contact').val(response.contact_info);
                $('.fullname').html(response.firstname+' '+response.lastname);
            }
        });
    }
</script>
<?php
include "includes/footer.php";
include "includes/user_modal.php";
include "includes/js.php";
?>
