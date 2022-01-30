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