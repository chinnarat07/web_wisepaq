<?php include("./includes/header.php"); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo constant('page_software_dev_1') ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-5"><a class="text-white" href="index.php"><?php echo constant('page_software_dev_2') ?></a></li>
                <li class="breadcrumb-item fs-5"><a class="text-white" href="solution.php"><?php echo constant('page_software_dev_3') ?></a></li>
                <li class="breadcrumb-item fs-5 text-warning active" text-dark active" aria-current="page"><?php echo constant('page_software_dev_4') ?></li>
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
                    $query = "SELECT * FROM tbl_posts INNER JOIN tbl_categories ON tbl_categories.cat_id = tbl_posts.post_category_id  WHERE tbl_categories.cat_page=7 AND tbl_posts.post_status='Published'";
                    $fetch_post_about = mysqli_query($connection, $query);
                    if (mysqli_num_rows($fetch_post_about) == 0) {
                        //echo "<h1 class='text-center'>No content Found</h1>";
                    } else {
                        while ($Row_about = mysqli_fetch_assoc($fetch_post_about)) {
                            $the_post_image =  $Row_about['post_image'];
                            if ($_SESSION['lang'] == 'en') {
                                $the_post_about_title = $Row_about['post_title'];
                                $the_post_subtitle = $Row_about['post_subtitle'];
                                $the_post_content = base64_decode($Row_about['post_content']);
                            } else {
                                $the_post_about_title = $Row_about['post_title_thai'];
                                $the_post_subtitle = $Row_about['post_subtitle_thai'];
                                $the_post_content = base64_decode($Row_about['post_content_thai']);
                            }
                    ?>
                            <div class="col-6 align-self-start wow fadeInUp" data-wow-delay="0.1s">
                                <img class="img-fluid "src="<?php echo "admin/images/" . $the_post_image ?>" alt="รูปเสีย">
                            </div>
                            <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                                <img class="img-fluid" src="<?php echo "admin/images/" . $the_post_image ?>">
                            </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn pe-0" data-wow-delay="0.5s">
                <p class="fw-medium text-secontery mb-2 ms-4"><?php echo $the_post_about_title ?></p>
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

<div class="container-fluid page-img pb-5 mb-5 ">
    <div class="container pt-3 " style="padding-bottom: 12rem;">
        <h1 class="display-5 text-center text-white mb-3 mt-1 animated slideInDown ">WISEPAQ FWD</h1>
    </div>
</div>

<!-- Service Start -->
<div class="container-xxl py-5 pt-0">
    <div class="container">
        <div class="container-fluid py-5 ">
            <div class="container py-5 pt-0">
                <?php
                $query_dev_content = "SELECT * FROM tbl_posts INNER JOIN tbl_categories ON tbl_categories.cat_id = tbl_posts.post_category_id  WHERE tbl_categories.cat_page=8 AND tbl_posts.post_status='Published'";
                $fetch_post_dev_content = mysqli_query($connection, $query_dev_content);
                if (mysqli_num_rows( $fetch_post_dev_content) == 0) {
                    //echo "<h1 class='text-center'>No content Found</h1>";
                } else {
                    $index = 1;
                    while ($Row_dev_content = mysqli_fetch_assoc($fetch_post_dev_content)) {
                        $the_post_id = $Row_dev_content['post_id'];
                        $the_post_image =  $Row_dev_content['post_image'];
                        if ($_SESSION['lang'] == 'en') {
                            $the_post_dev_content_title = $Row_dev_content['post_title'];
                            $the_post_subtitle = $Row_dev_content['post_subtitle'];
                            $the_post_content = base64_decode($Row_dev_content['post_content']);
                        } else {
                            $the_post_dev_content_title = $Row_dev_content['post_title_thai'];
                            $the_post_subtitle = $Row_dev_content['post_subtitle_thai'];
                            $the_post_content = base64_decode($Row_dev_content['post_content_thai']);
                        }
                ?>
                        <?php if ($index % 2 != 0) { ?>
                            <div class="row gx-0 mb-3 mb-lg-0" data-name="<?php echo $the_post_subtitle; ?>">
                                <div class="col-lg-6 my-lg-5 py-lg-5">
                                    <div class="about-start p-5 ">
                                        <h5 class="section-title text-secondary ms-4 animated slideInDown"><?php echo $the_post_dev_content_title; ?></h5>
                                        <h2 class=" mb-4 text-dark animated slideInDown"><?php echo $the_post_subtitle; ?></h2>
                                        <p><?php echo $the_post_content; ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="min-height: 400px;">
                                    <div class="position-relative h-100 animated slideInUp">
                                        <img class="position-absolute w-100 h-100" src="<?php echo "admin/images/" . $the_post_image; ?>" style="object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row gx-0" data-name="<?php echo $the_post_subtitle; ?>">
                                <div class="col-lg-6" style="min-height: 400px;">
                                    <div class="position-relative h-100 animated slideInUp">
                                        <img class="position-absolute w-100 h-100" src="<?php echo "admin/images/" . $the_post_image; ?>" style="object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col-lg-6 my-lg-5 py-lg-5">
                                    <div class="about-end bg-primary p-5 ">
                                        <h5 class="section-title text-secondary ms-4 animated slideInDown"><?php echo $the_post_dev_content_title; ?></h5>
                                        <h2 class=" mb-4 animated slideInDown"><?php echo $the_post_subtitle; ?></h2>
                                        <p ><?php echo $the_post_content; ?></p>
                                    </div>
                                </div>
                            </div>
                <?php }
                        $index++;
                    }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include("./includes/footer.php") ?>