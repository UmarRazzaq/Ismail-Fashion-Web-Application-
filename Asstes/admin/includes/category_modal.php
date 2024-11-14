<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="m-content">
            <div class="m-header">
                <button type="button" style="background-color: transparent; border: none;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add New Category</b></h4>
            </div>
            <div class="m-body">
                <form class="form-horizontal" method="POST" action="category_add.php">
                    <div class="cat-from">
                        <label for="name">Name</label>
                        <input type="text" class="cat-input" id="name" name="name" required>
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
                <h4 class="modal-title"><b>Edit Category</b></h4>
            </div>
            <div class="m-body">
                <form class="form-horizontal" method="POST" action="category_edit.php">
                    <input type="hidden" class="catid" name="id">
                    <div class="cat-from">
                        <label for="edit_name">Name</label>
                        <input type="text" class="cat-input" id="edit_name" name="name">
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
                <form class="form-horizontal" method="POST" action="category_delete.php">
                    <input type="hidden" class="catid" name="id">
                    <div class="text-center">
                        <p>DELETE CATEGORY</p>
                        <h2 class="bold catname"></h2>
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