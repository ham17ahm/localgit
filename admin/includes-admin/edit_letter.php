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
            $letter_footnote = $row["letter_footnote"];
            $letter_tags = $row["letter_tags"];
        }
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
                <input value="<?php echo $letter_full_name; ?>" class="form-control" type="text" name="letter_full_name">
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
            <input class="btn btn-primary" type="submit" name="edit_letter" value="Edit">
        </div>
</div>
</form>

<div class="form-group col-xs-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Name</th>
                <th>Letter Tags</th>
                <th>Footnote</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php
            while ($row = mysqli_fetch_assoc($select_all_letters_qry)) {
                $letter_id = $row["letter_id"];
                $letter_date = $row["letter_date"];
                $letter_full_name = $row["letter_full_name"];
                $letter_footnote = $row["letter_footnote"];
                $letter_tags = $row["letter_tags"];

                echo "<tr>";
                echo "<td>{$letter_id}</td>";
                echo "<td>{$letter_date}</td>";
                echo "<td>{$letter_full_name}</td>";
                echo "<td>{$letter_tags}</td>";
                echo "<td style='white-space:pre;'>{$letter_footnote}</td>";
                echo "<td><a href='letters.php?source=edit_letter&ltr_id={$letter_id}'>Edit</a></td>";
                echo "<td><a href='letters.php?source=delete_letter&ltr_id={$letter_id}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>

        </tbody>
    </table>

</div>