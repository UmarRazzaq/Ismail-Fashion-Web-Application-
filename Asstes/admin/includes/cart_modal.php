<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="m-content">
            <div class="m-header">
                <button type="button" style="background-color: transparent; border: none;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add New Product</b></h4>
            </div>
            <div class="m-body">
                <form class="form-horizontal" method="POST" action="cart_add.php">
                    <input type="hidden" class="userid" name="id">
                    <div class="cat-from">
                        <label for="product">Product</label>
                        <select class="cat-input select2 sel" style="width: 70%;" name="product" id="product" required>
                            <option value="" selected>- Select -</option>
                        </select>
                    </div><br>
                    <div class="cat-from">
                        <label for="quantity">Quantity</label>
                        <input type="number" style="width: 70%" class="cat-input" id="quantity" name="quantity" value="1" required>
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
                <h4 class="modal-title"><b><span class="productname"></span></b></h4>
            </div>
            <div class="m-body">
                <form method="POST" action="cart_edit.php">
                    <input type="hidden" class="cartid" name="cartid">
                    <input type="hidden" class="userid" name="userid">
                    <div class="cat-from">
                        <label for="edit_quantity">Quantity</label>
                        <input type="text" class="cat-input" id="edit_quantity" name="quantity">
                    </div>
            </div>
            <div class="m-footer cat-btn1">
                <button type="button" class="c5" data-dismiss="modal"><i class="las la-time"></i> Close</button>
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
                <form class="form-horizontal" method="POST" action="cart_delete.php">
                    <input type="hidden" class="cartid" name="cartid">
                    <input type="hidden" class="userid" name="userid">
                    <div class="text-center">
                        <p>DELETE PRODUCT</p>
                        <h2 class="bold productname"></h2>
                    </div>
            </div>
            <div class="m-footer cat-btn1">
                <button type="button" class="c5" data-dismiss="modal"><i class="las la-time"></i> Close</button>
                <button type="submit" class="c2" name="delete"><i class="las la-trash-alt"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
