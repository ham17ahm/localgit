<?php include "includes-admin/admin_header.php"; ?>

<!-- Navigation -->
<?php include "includes-admin/admin_nav.php"; ?>


<div id="page-wrapper">
    <div class="container-fluid">

        <?php

        $query = "SELECT * FROM letters";

        $select_all_letters_qry = mysqli_query($conn, $query);

        ?>

        <?php

        if (isset($_GET["source"])) {
            $source = $_GET["source"];
        } else {
            $source = "";
        }

        switch ($source) {
            case  "add_letter";
                include "includes-admin/add_letter.php";
                break;

            case  "edit_letter";
                include "includes-admin/edit_letter.php";
                break;

            case  "delete_letter";
                include "includes-admin/delete_letter.php";
                break;

            default:
                include "includes-admin/all_letters.php";
                break;
        }

        ?>

        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include "includes-admin/admin_footer.php"; ?>