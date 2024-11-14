<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="m-content" style="width: 70%;">
            <div class="m-header">
                <button type="button" style="background-color: transparent; border: none;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add New Product</b></h4>
            </div>
            <div class="m-body">
                <form method="POST" action="products_add.php" enctype="multipart/form-data">
                    <div class="cat-from">
                        <label for="name">Name</label>
                        <input type="text" class="cat-input" id="name" name="name" required>

                        <label for="category">Category</label>
                        <select class="cat-input sel" id="category" name="category" required>
                            <option value="" selected>- Select -</option>
                        </select>
                    </div><br>
                    <div class="cat-from">
                        <label for="price">Price</label>
                        <input type="text" style="margin-right: 10px" class="cat-input" id="price" name="price" required>

                        <label for="photo">Photo</label>
                        <input type="file" id="photo" name="photo">
                    </div><br>
                    <div class="cat-from">
                        <label for="stock">Stock</label>
                        <input type="text" style="margin-right: 330px" class="cat-input" id="stock" name="stock" required>
                    </div><br>
                    <p><b>Description</b></p>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea id="editor1" name="description" rows="10" cols="80" required></textarea>
                        </div>
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
    <div class="m-content" style="width: 70%;">
        <div class="m-header">
            <button type="button" style="background-color: transparent; border: none;" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><b>Edit Product</b></h4>
        </div>
        <form action="products_edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" class="prodid" name="id">
            <div class="m-body">
                <div class="pro-form">
                    <div class="cat-from">
                        <label for="edit_name">Name</label>
                        <input type="text" name="name" id="edit_name" required class="cat-input">
                        <label for="c-name">Category</label>
                        <select id="edit_category" name="category" class="cat-input sel" required>
                            <option  id="catselected" selected></option>
                        </select>
                    </div><br>
                    <div class="cat-from">
                        <label for="edit_stock">Stock</label>
                        <input type="text" name="stock" id="edit_stock" required class="cat-input">
                        <label for="edit_price">Price</label>
                        <input type="text" name="price" id="edit_price" required class="cat-input">
                    </div><br>
                    <p><b>Description</b></p>
                    <div>
                        <textarea id="editor2" name="description" rows="10" cols="80" required class="desc"></textarea>
                    </div>
                </div>
            </div>
            <div class="m-footer cat-btn1">
                <button type="button" class="c5" data-dismiss="modal"><i class="las la-times"></i> Close</button>
                <button type="submit" class="c3" name="edit"><i class="las la-check-square"></i> Update</button>
            </div>
        </form>
    </div>
</div>

<!--Description-->
<div class="modal fade" id="description">
    <div class="modal-dialog">
        <div class="m-content">
            <div class="m-header">
                <button type="button" style="background-color: transparent; border: none;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="m-body">
                <p id="desc"></p>
            </div>
            <div class="m-footer cat-btn1">
                <button type="button" class="c5" data-dismiss="modal"><i class="las la-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="m-content">
            <div class="m-header">
                <button type="button" style="background-color: transparent; border: none;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="m-body">
                <form class="form-horizontal" method="POST" action="products_photo.php" enctype="multipart/form-data">
                    <input type="hidden" class="prodid" name="id">
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Photo</label>

                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo" required>
                        </div>
                    </div>
            </div>
            <div class="m-footer cat-btn1">
                <button type="button" class="c5 pull-left" data-dismiss="modal"><i class="las la-times"></i> Close</button>
                <button type="submit" class="c3" name="upload"><i class="las la-check-square"></i>Update</button>
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
                <form class="form-horizontal" method="POST" action="products_delete.php">
                    <input type="hidden" class="prodid" name="id">
                    <div class="text-center">
                        <p>DELETE PRODUCT</p>
                        <h2 class="bold name"></h2>
                    </div>
            </div>
            <div class="m-footer cat-btn1">
                <button type="button" class="c5" data-dismiss="modal"><i class="las la-times"></i> Close</button>
                <button type="submit" class="c2" name="delete"><i class="las la-trash-alt"></i>Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--transaction-->
<div class="modal fade" id="transaction">
    <div class="modal-dialog">
        <div class="m-content">
            <div class="m-header">
                <button type="button" style="background-color: transparent; border: none;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="m-body">
                <p>
                    Date: <span id="date"></span>
                    <span style="float: right;">Transaction#: <span id="transid"></span></span>
                </p>
                <table style="box-shadow: none;">
                    <thead>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    </thead>
                    <tbody id="detail">
                    <tr>
                        <td colspan="3" align="right"><b>Total</b></td>
                        <td><span id="total"></span></td>
                    </tr>
                    </tbody>
                </table>
                <b>Contact_No: &nbsp;</b><span id="no"></span><br>
                <b>Address: &nbsp;</b><span id="address"></span>
            </div>
            <div class="m-footer cat-btn1">
                <button type="button" class="c5" data-dismiss="modal"><i class="las la-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>