<?php
include "includes_backend/header.php";
include "includes_backend/navigation.php";
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to   <small><?php echo $_SESSION['username'] ?></small>
                </h1>
            </div>
            <div class="col-xs-12">
                <?php
                if (isset($_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = "";
                }
                switch ($source) {
                    case 'add_user':
                        include "./includes_backend/add_user.php";
                        break;
                    case 'edit_user':
                        include "./includes_backend/edit_user.php";
                        break;
                    default:
                        include "./includes_backend/view_all_users.php";
                        break;
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include "includes_backend/footer.php" ?>