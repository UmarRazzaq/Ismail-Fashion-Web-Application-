
<?php 
include 'includes/session.php'; 
include "includes/header.php";
include "includes/sidebar.php";

$conn = mysqli_connect("localhost", "root", "", "ismail");

?>

<div class="main-content">
    <?php
    include "includes/navbar.php";
    ?>
    <main>
        <div class="title1">
            <h2>Sales Details</h2>
        </div>
        <!-- <div class="cat-btn">
            <button id="myBtn">
                <span class="las la-plus"></span>
                Add User
            </button>
        </div> -->
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
                                        <td>Detail ID</td>
                                        <td>Sales ID</td>
                                        <td>Product ID</td>
                                        <td>Phone NO</td>
                                        <td>Address</td>
                                        <td>Quantity</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $conn = $pdo->open();
                                        $query = $conn->prepare("SELECT * FROM details JOIN users");
                                        $query->execute(['type'=>0]);
                                       
                                        
                                        foreach ($query as $row){ ?>
                                          
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['sales_id'];?></td>
                                                    <td><?php echo $row['product_id']; ?></td>
                                                    <td><?php echo $row['contact_info']; ?></td>
                                                    <td><?php echo $row['address']; ?></td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    
                                                </tr>
                                            
                                       <?php } ?>
                          
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
<!--Modals-->
<div id="modal" class="modal">
    <div class="m-content">
        <div class="m-header">
            <span class="close">&times;</span>
            <h2>Add New User</h2>
        </div>
        <form action="users.php" method="post">
            <div class="m-body">
                <div class="pro-form">
                    <label for="p-name">Name</label>
                    <input type="text" name="p-name" required class="cat-input">
                    <label for="p-name">Email</label>
                    <input type="email" name="p-email" required class="cat-input">
                    <label for="image">Photo</label>
                    <input type="file" name="image" required class="cat-input">
                    <label for="desc">Joined Date</label>
                    <input type="date" name="p-date" required class="cat-input">
                </div>
            </div>
            <div class="m-footer">
                <div class="cat-btn1">
                    <button class="c5 close1">
                        <span class="las la-times"></span>
                        Close
                    </button>
                    <button type="submit" name="add" class="c4">
                        <span class="las la-save"></span>
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="modal1" class="modal">
    <div class="m-content">
        <div class="m-body">
            <div class="de-text">
                <h2>Delete User</h2>
                <p>Are you sure you want to delete User?</p>
                <div class="de-modal">
                    <div class="cat-btn1">
                        <button class="c5 close2">
                            <span class="las la-times"></span>
                            Cancel
                        </button>
                        <button class="c2">
                            <span class="las la-trash"></span>
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal2" class="modal">
    <div class="m-content">
        <div class="m-header">
            <h2>Edit Category</h2>
        </div>
        <div class="m-body">
            <form action="#" method="post" class="cat-from">
                <label for="cat-name">Category Name</label>
                <input type="text" name="cat-name" class="cat-input">
            </form>
        </div>
        <div class="m-footer">
            <div class="cat-btn1">
                <button class="c5 close3">
                    <span class="las la-times"></span>
                    Close
                </button>
                <button class="c3">
                    <span class="las la-save"></span>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
<div id="modal3" class="modal">
    <div class="m-content">
        <div class="m-body">
            <div class="des-text">
                <p id="des">
                <p></p>
                </p>
            </div>
            <div class="m-footer">
                <div class="cat-btn1">
                    <button class="c5 close4">
                        <span class="las la-times"></span>
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "includes/footer.php";
include "includes/js.php";
?>