<h1 class="page-header">
    Edit Letter
</h1>
<div class="form-group col-xs-5" style="padding-right: 0px;">

    <?php
    if (isset($_GET["ltr_id"])) {
        $ltr_id = $_GET["ltr_id"];

        $query_eidt = "SELECT * FROM letters WHERE letter_id = {$ltr_id}";

        $select_letter_by_id = mysqli_query($conn, $query_eidt);

        while ($row = mysqli_fetch_assoc($select_letter_by_id)) {
            $letter_id = $row["letter_id"];
            $letter_date = $row["letter_date"];
            $letter_full_name = $row["letter_full_name"];
            $letter_pre_text = $row["letter_pre_text"];
            $letter_content = $row["letter_content"];
            $letter_footnote = $row["letter_footnote"];
            $letter_tags = $row["letter_tags"];
            $letter_letterhead = $row["letter_print_head"];
        }
    }
    ?>

    <form class="form-horizontal" action="" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_date">Date</label>
            <div class="col-sm-9">
                <input value="<?php echo $letter_date; ?>" class="form-control" type="date" name="letter_date">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_prefix">Prefix</label>
            <div class="col-sm-9">
                <select class="form-control" name="letter_prefix">
                    <option selected="Dear">Dear</option>
                    <option value="Respected">Respected</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_full_name">Name</label>
            <div class="col-sm-9">
                <input value="<?php echo $letter_full_name; ?>" class="form-control" type="text" name="letter_full_name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_pre_text">Pre Text</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="letter_pre_text" cols="30" rows="3"><?php echo $letter_pre_text; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_content">Content</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="letter_content" cols="30" rows="5"><?php echo $letter_content; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_footnote">Footnote</label>
            <div class="col-sm-9">
                <input value="<?php echo $letter_footnote; ?>" class="form-control" type="text" name="letter_footnote">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_tags">Tags</label>
            <div class="col-sm-9">
                <input value="<?php echo $letter_tags; ?>" class="form-control" type="text" name="letter_tags">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_letterhead">Letterhead</label>
            <div class="col-sm-9">
                <input value="<?php echo $letter_letterhead; ?>" class="form-control" type="text" name="letter_letterhead">
            </div>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="edit_letter" value="Edit">
        </div>
</div>
</form>

<?php

if (isset($_POST["edit_letter"])) {
    $edit_letter_date =          $_POST["letter_date"];
    $edit_letter_prefix =        $_POST["letter_prefix"];
    $edit_letter_full_name =     $_POST["letter_full_name"];
    $edit_letter_pre_text =      $_POST["letter_pre_text"];
    $edit_letter_content =       $_POST["letter_content"];
    $edit_letter_footnote =      $_POST["letter_footnote"];
    $edit_letter_letterhead =    $_POST["letter_letterhead"];
    $edit_letter_tags =          $_POST["letter_tags"];

    $query = "UPDATE letters SET letter_date = '{$edit_letter_date}', letter_name_prefix = '{$edit_letter_prefix}', letter_full_name = '{$edit_letter_full_name}', letter_pre_text = '{$edit_letter_pre_text}', letter_content = '{$edit_letter_content}', letter_footnote = '{$edit_letter_footnote}', letter_print_head = '{$edit_letter_letterhead}', letter_tags = '{$edit_letter_tags}' WHERE letter_id = {$ltr_id}";

    $update_letter = mysqli_query($conn, $query);

    if (!$update_letter) {
        die("Query failed: " . mysqli_error($conn));
    }
    header("Location: letters.php?source=add_letter");
}

?>

<?php include "admin_table.php" ?>