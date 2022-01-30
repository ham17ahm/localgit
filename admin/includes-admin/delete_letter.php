<h1 class="page-header">
    Add New Letter
</h1>
<div class="form-group col-xs-5" style="padding-right: 0px;">

    <?php

    if (isset($_POST["submit_letter"])) {
        $letter_date =          $_POST["letter_date"];
        $letter_prefix =        $_POST["letter_prefix"];
        $letter_full_name =     $_POST["letter_full_name"];
        $letter_pre_text =      $_POST["letter_pre_text"];
        $letter_content =       $_POST["letter_content"];
        $letter_footnote =      $_POST["letter_footnote"];
        $letter_letterhead =    $_POST["letter_letterhead"];
        $letter_tags =          $_POST["letter_tags"];

        if (empty($letter_full_name) || empty($letter_pre_text)) {
            echo "Fields cannot be empty.";
        } else {
            $query = "INSERT INTO letters(letter_date, letter_name_prefix, letter_full_name, letter_pre_text, letter_content, letter_footnote, letter_print_head, letter_tags) VALUE ('{$letter_date}', '{$letter_prefix}', '{$letter_full_name}', '{$letter_pre_text}', '{$letter_content}', '{$letter_footnote}', '{$letter_letterhead}', '{$letter_tags}')";

            $add_letter_qry = mysqli_query($conn, $query);

            if (!$add_letter_qry) {
                die("Query failed: " . mysqli_error($conn));
            }
            header("Location: letters.php?source=add_letter");
        }
    }

    ?>

    <?php

    if (isset($_GET["ltr_id"])) {
        $the_letter_id = $_GET["ltr_id"];

        $query = "DELETE FROM letters WHERE letter_id = {$the_letter_id}";

        $delete_letter_qry = mysqli_query($conn, $query);

        if (!$delete_letter_qry) {
            die("Query failed: " . mysqli_error($conn));
        }
        header("Location: letters.php?source=add_letter");
    }

    ?>

    <form class="form-horizontal" action="" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_date">Date</label>
            <div class="col-sm-9">
                <input class="form-control" type="date" name="letter_date">
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
                <input class="form-control" type="text" name="letter_full_name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_pre_text">Pre Text</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="letter_pre_text" cols="30" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_content">Content</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="letter_content" cols="30" rows="5"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_footnote">Footnote</label>
            <div class="col-sm-9">
                <input class="form-control" type="text" name="letter_footnote">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_tags">Tags</label>
            <div class="col-sm-9">
                <input class="form-control" type="text" name="letter_tags">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="letter_letterhead">Letterhead</label>
            <div class="col-sm-9">
                <input class="form-control" type="text" name="letter_letterhead">
            </div>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit_letter">
        </div>
</div>
</form>

<?php include "admin_table.php" ?>