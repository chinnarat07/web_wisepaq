<?php include("./includes/header.php"); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo constant('page_virtualazation_1') ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-5"><a class="text-white" href="index.php"><?php echo constant('page_virtualazation_2') ?></a></li>
                <li class="breadcrumb-item fs-5"><a class="text-white" href="solution.php"><?php echo constant('page_virtualazation_3') ?></a></li>
                <li class="breadcrumb-item fs-5 text-warning active" text-dark active" aria-current="page"><?php echo constant('page_virtualazation_4') ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="row gx-3 h-100">
                    <?php
                    $query_virtualazation = "SELECT * FROM tbl_posts INNER JOIN tbl_categories ON tbl_categories.cat_id = tbl_posts.post_category_id  WHERE tbl_categories.cat_page=11 AND tbl_posts.post_status='Published'";
                    $fetch_post_virtualazation = mysqli_query($connection, $query_virtualazation);
                    if (mysqli_num_rows($fetch_post_virtualazation) == 0) {
                        //echo "<h1 class='text-center'>No content Found</h1>";
                    } else {
                        while ($Row_virtualazation = mysqli_fetch_assoc($fetch_post_virtualazation)) {
                            $the_post_image =  $Row_virtualazation['post_image'];
                            if ($_SESSION['lang'] == 'en') {
                                $the_post_virtualazation_title = $Row_virtualazation['post_title'];
                                $the_post_subtitle = $Row_virtualazation['post_subtitle'];
                                $the_post_content = base64_decode($Row_virtualazation['post_content']);
                            } else {
                                $the_post_virtualazation_title = $Row_virtualazation['post_title_thai'];
                                $the_post_subtitle = $Row_virtualazation['post_subtitle_thai'];
                                $the_post_content = base64_decode($Row_virtualazation['post_content_thai']);
                            }
                    ?>
                            <div class="col-12 align-self-center wow fadeInUp" data-wow-delay="0.1s">
                                <img class="img-fluid" src="<?php echo "admin/images/" . $the_post_image ?>" alt="รูปเสีย">
                            </div>
                            <!-- <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                                <img class="img-fluid" src="<?php echo "admin/images/" . $the_post_image ?>">
                            </div> -->
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn pe-0" data-wow-delay="0.5s">
                <p class="fw-medium text-secontery mb-2 ms-4"><?php echo $the_post_virtualazation_title ?></p>
                <h1 class="display-5 mb-4"><?php echo $the_post_subtitle ?></h1>
                <div class="d-flex align-items-center mb-4">
                    <div class="ms-4">
                        <p><?php echo $the_post_content ?></p>
                        <!-- <p><i class="fa fa-check text-primary me-2"></i>Civil Engineering</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Chemical Engineering</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Mechanical Engineering</p>
                            <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Oil & Gas Engineering</p> -->
                    </div>
                </div>
        <?php }
                    } ?>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<div class="container-fluid page-commu py-5 mb-5 ">
    <div class="container pt-3 " style="padding-bottom: 14rem;">
    </div>
</div>

<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container">
    <?php
        $query_product = "SELECT * FROM tbl_posts 
                           INNER JOIN tbl_categories ON tbl_categories.cat_id = tbl_posts.post_category_id  
                           WHERE tbl_categories.cat_page=12 AND tbl_posts.post_status='Published'";
        $fetch_post_product = mysqli_query($connection, $query_product);
        if (mysqli_num_rows($fetch_post_product) == 0) {
            echo "<h1 class='text-center'>No content Found</h1>";
        } else {
            $index = 1;
            $count = 0.1; // ตัวแปรสำหรับ delay ของ animation
while ($Row_product = mysqli_fetch_assoc($fetch_post_product)) {
     $the_post_id = $Row_product['post_id'];
    $the_post_image = $Row_product['post_image'];
    $the_post_link_url = $Row_product['post_link'];
    if ($_SESSION['lang'] == 'en') {
        $the_post_product_title = $Row_product['post_title'];
        $the_post_subtitle = $Row_product['post_subtitle'];
        $the_post_content = base64_decode($Row_product['post_content']);
    } else {
        $the_post_product_title = $Row_product['post_title_thai'];
        $the_post_subtitle = $Row_product['post_subtitle_thai'];
        $the_post_content = base64_decode($Row_product['post_content_thai']);
    }
?>
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-6 mb-4"><?php echo $the_post_product_title; ?></h1>
        </div>
        <div class="row g-4 portfolio-container container-project">
            <div class="container">
                <div class="row">
                    <?php echo $the_post_content; ?>
                </div>
            </div>
        </div>
        <?php
    $count = $count <= 0.5 ? $count + 0.2 : 0.1;
    $index += 1;
}}
?>
    </div>
</div>
<!-- Projects End -->
<?php include("./includes/footer.php") ?>
