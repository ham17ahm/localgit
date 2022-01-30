<!-- Header -->
<?php include "includes/db_connection.php" ?>
<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php include "includes/nav.php" ?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            $query = "SELECT * FROM letters";

            $select_all_letters_qry = mysqli_query($conn, $query);

            ?>

            <h1 class="page-header">
                Overview
            </h1>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Letter Tags</th>
                        <th>Footnote</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($row = mysqli_fetch_assoc($select_all_letters_qry)) {
                        $letter_id = $row["letter_id"];
                        $letter_ref = $row["letter_ref"];
                        $letter_date = $row["letter_date"];
                        $letter_name_prefix = $row["letter_name_prefix"];
                        $letter_full_name = $row["letter_full_name"];
                        $letter_pre_text = $row["letter_pre_text"];
                        $letter_content = $row["letter_content"];
                        $letter_footnote = $row["letter_footnote"];
                        $letter_print_head = $row["letter_print_head"];
                        $letter_tags = $row["letter_tags"];

                        echo "<tr>";
                        echo "<td>{$letter_id}</td>";
                        echo "<td>{$letter_date}</td>";
                        echo "<td>{$letter_full_name}</td>";
                        echo "<td>{$letter_tags}</td>";
                        echo "<td>{$letter_footnote}</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>

        </div>

        <!-- Sidebar -->
        <?php include "includes/sidebar.php" ?>


    </div>

</div>
<!-- /.row -->

<hr>

<!-- Footer -->
<?php include "includes/footer.php" ?>