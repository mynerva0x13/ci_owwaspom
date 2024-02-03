

<?php
$url =  null;
$val = null;
$desc = null;
if(!empty($_GET['view']) && $_GET['view']=="update") {
    $desc = $con->desc;
}
?>
<form class="row g-3" id="postDataForm_ann">
    <div class="col-12">
        <h3 class="mb-3">Post New Announcement</h3>
    </div>

    <div class="col-md-9">
        <label for="announcement_desc" class="form-label">Body:</label>
        <div class="summernote" id="summernote"><?php echo $desc  ?></div>
   </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="Recipient" class="form-label">Recipient:</label>
            <select class="form-select" id="Recipient" name="Recipient">
                <option value="Scholar">All</option>
                <option value="Scholar">Scholar</option>
                <option value="Parent">Parent</option>
                <option value="Parent and Scholar">Parent and Scholar</option>
            </select>
        </div>
    </div>

    <div class="col-12">
        <button class="btn btn-info" name="save" type="submit">
            <span class="fa fa-save me-2"></span>Save
        </button>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="path/to/jquery.richtext.min.js"></script>
