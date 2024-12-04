<?php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
} elseif (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'th';
}
include('lang_' . $_SESSION['lang'] . '.php');
?>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow "  role="status">
        <img src="img/wisepaq.jpg"  alt="Loading" width="80" height="80"/>
    </div>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
<div class="container-fluid bg-light p-0">
    <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                <small class="fa fa-map-marker-alt text-primary me-2"></small>
                <small><?php echo constant("address"); ?></small>
            </div>
            <div class="h-100 d-inline-flex align-items-center py-3">
                <small class="far fa-clock text-primary me-2"></small>
                <small><?php echo constant("work_time"); ?></small>
            </div>
        </div>
        <div class="col-lg-5 px-5 text-center">
            <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                <small class="fa fa-phone-alt text-primary me-2"></small>
                <small>021 195 300, 081 935 9559, 089 615 5559</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center">
                <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.facebook.com/Wisepaqbusiness/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-sm-square bg-white text-primary me-1" href="https://twitter.com/Wisepaq" target="_blank"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-sm-square bg-white text-primary me-0" href="https://www.youtube.com/@Wisepaq-business/videos" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 ">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 "><img src="img/wisepaq.jpg" alt="" width="60" height="60" style="margin-right: 5px;">WISEPAQ</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <?php
            $query = "SELECT * FROM  menu";
            $fetch_data = mysqli_query($connection, $query);

            if (mysqli_num_rows($fetch_data) == 0) {
                //echo "<h1 class='text-center'>No content Found</h1>";
            } else {
                while ($Row = mysqli_fetch_assoc($fetch_data)) {

                    $menu_id = $Row['menu_id'];
                    if ($_SESSION['lang'] == 'en') {
                        $menu_title = $Row['menu_name'];
                    } else {
                        $menu_title = $Row['menu_name_thai'];
                    }
                    $link = $Row['link_name'];

                    $query_sub = "SELECT * FROM sub_menu where menu_id = $menu_id";
                    $fetch_data_sub = mysqli_query($connection, $query_sub);

                    if (mysqli_num_rows($fetch_data_sub) == 0) {
                        //echo "<h1 class='text-center'>No content Found</h1>";
                        ?>
                        <a href="<?php echo $link; ?>" class="nav-item nav-link "><?php echo $menu_title; ?></a>

                        <?php
                    } else {
                        ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><?php echo $menu_title; ?></a>
                            <div class="dropdown-menu fade-up m-0">
                                <?php
                                while ($Row_sub = mysqli_fetch_assoc($fetch_data_sub)) {
                                    if ($_SESSION['lang'] == 'en') {
                                        $menu_title_sub = $Row_sub['menu_subname'];
                                    } else {
                                        $menu_title_sub = $Row_sub['menu_subname_thai'];
                                    }
                                    $link_sub = $Row_sub['link_subname'];
                                    ?>
                                    <a href="<?php echo $link_sub; ?>" class="dropdown-item "><?php echo $menu_title_sub ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php }
            }
            ?>
        </div>
        <div class="btn-group btn-group-toggle me-4   w-lg-100" data-toggle="buttons">
            <label class="btn btn-primary ">
                <input type="radio" style="appearance: none;" id='select_lang' onchange="change_lang(this.value)" autocomplete="off" value="th"> TH
            </label>
            <label class="btn btn-primary active ">
                <input type="radio" style="appearance: none;" id='select_lang' onchange="change_lang(this.value)" autocomplete="off" value="en"> EN
            </label>
        </div>

</nav>
<!-- Scripts -->
<script>
    function change_lang(value) {
        window.location.replace("?lang=" + value);
    }
</script>
<!-- Navbar End -->