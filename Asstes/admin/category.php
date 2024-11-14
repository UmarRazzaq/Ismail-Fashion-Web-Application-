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
            <h2>Categories</h2>
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
                <a href="#addnew" data-toggle="modal" style="text-decoration: none; color: white;">
                    <span class="las la-plus"></span>
                    Add Category
                </a>
            </button>
        </div>
        <div class="cat-wrapper">
            <div class="cat-grid">
                <div class="products">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                    <tr>
                                        <td>Category Name</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $conn = $pdo->open();

                                    try{
                                        $stmt = $conn->prepare("SELECT * FROM category");
                                        $stmt->execute();
                                        foreach($stmt as $row){
                                            echo "
                                              <tr>
                                                <td>".$row['name']."</td>
                                                <td class='ac-btn'>
                                                  <button class='c3 edit ' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                                                </td>
                                                <td class='ac-btn'>
                                                  <button class='c2 delete' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
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

    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'category_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('.catid').val(response.id);
                $('#edit_name').val(response.name);
                $('.catname').html(response.name);
            }
        });
    }
</script>
<?php
include "includes/footer.php";
include "includes/category_modal.php";
include "includes/js.php";
?>


