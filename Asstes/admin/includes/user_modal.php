<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="m-content">
            <div class="m-header">
                <button type="button" style="background-color: transparent; border: none;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add New User</b></h4>
            </div>
            <div class="m-body">
                <form class="form-horizontal" method="POST" action="users_add.php" enctype="multipart/form-data">
                    <div class="cat-from">
                        <label for="email">Email</label>
                        <input type="email" class="cat-input" id="email" name="email" required>
                    </div><br>
                    <div class="cat-from">
                        <label for="password">Password</label>
                        <input type="password" class="cat-input" id="password" name="password" required>
                    </div><br>
                    <div class="cat-from">
                        <label for="firstname">Firstname</label>
                        <input type="text" class="cat-input" id="firstname" name="firstname" required>
                    </div><br>
                    <div class="cat-from">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="cat-input" id="lastname" name="lastname" required>
                    </div><br>
                    <div class="cat-from">
                        <label for="address">Address</label>
                        <textarea class="cat-input" id="address" name="address"></textarea>
                    </div><br>
                    <div class="cat-from">
                        <label for="contact">Contact Info</label>
                        <input type="text" class="cat-input" id="contact" name="contact">
                    </div><br>
                    <div class="cat-from">
                        <label for="photo">Photo</label>
                        <input type="file" id="photo" name="photo">
                    </div>
            </div>
            <div class="m-footer cat-btn1">
                <button type="button" class="c5" data-dismiss="modal"><i class="las la-times"></i> Close</button>
                <button type="submit" class="c4" name="add"><i class="las la-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="m-content">
            <div class="m-header">
                <button type="button" style="background-color: transparent; border: none;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit User</b></h4>
            </div>
            <div class="m-body">
                <form class="" method="POST" action="users_edit.php">
                    <input type="hidden" class="userid" name="id">
                    <div class="cat-from">
                        <label for="edit_email">Email</label>
                        <input type="email" class="cat-input" id="edit_email" name="email">
                    </div><br>
                    <div class="cat-from">
                        <label for="edit_password">Password</label>
                        <input type="password" class="cat-input" id="edit_password" name="password">
                    </div><br>
                    <div class="cat-from">
                        <label for="edit_firstname">Firstname</label>
                        <input type="text" class="cat-input" id="edit_firstname" name="firstname">
                    </div><br>
                    <div class="cat-from">
                        <label for="edit_lastname">Lastname</label>
                        <input type="text" class="cat-input" id="edit_lastname" name="lastname">
                    </div><br>
                    <div class="cat-from">
                        <label for="edit_address">Address</label>
                        <textarea class="cat-input" id="edit_address" name="address"></textarea>
                    </div><br>
                    <div class="cat-from">
                        <label for="edit_type">Type</label>
                        <input type="text" class="cat-input" id="edit_type" name="type">
                    </div><br>
                    <div class="cat-from">
                        <label for="edit_contact">Contact Info</label>
                        <input type="text" class="cat-input" id="edit_contact" name="contact">
                    </div>
            </div>
            <div class="m-footer cat-btn1">
                <button type="button" class="c5" data-dismiss="modal"><i class="las la-times"></i> Close</button>
                <button type="submit" class="c3" name="edit"><i class="las la-check-square"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="m-content">
            <div class="m-header">
                <button type="button" style="background-color: transparent; border: none;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="m-body">
                <form method="POST" action="users_delete.php">
                    <input type="hidden" class="userid" name="id">
                    <div class="text-center">
                        <p>DELETE USER</p>
                        <h2 class="bold fullname"></h2>
                    </div>
            </div>
            <div class="m-footer cat-btn1">
                <button type="button" class="c5" data-dismiss="modal"><i class="las la-times"></i> Close</button>
                <button type="submit" class="c2" name="delete"><i class="las la-trash-alt"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>