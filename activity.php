<?php include("./includes/header.php"); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-4 text-white mb-3 animated slideInDown"><?php echo constant('page_activity_1') ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-5"><a class="text-white" href="index.php"><?php echo constant('page_activity_2') ?></a></li>
                <li class="breadcrumb-item fs-5 text-warning active" text-warnin" aria-current="page"><?php echo constant('page_activity_3') ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Service Start -->
<div class="container-xxl py-5 pt-0">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <!-- <h5 class=" text-secondary"><?php echo constant("page_service_31") ?></h5> -->
            <h1 class="display-6 mb-4"><?php echo constant("page_activity_4") ?></h1>
        </div>
    </div>
    <!-- blog section -->
    <section class="section" id="blog">
        <!-- container -->
        <div class="container text-center">
            <!-- <p class="section-subtitle">Recent Posts?</p>
            <h6 class="section-title mb-6">Blog</h6> -->
            <?php
                $query_activity = "SELECT * FROM tbl_posts 
                                   INNER JOIN tbl_categories 
                                   ON tbl_categories.cat_id = tbl_posts.post_category_id 
                                   WHERE tbl_categories.cat_page = 13 
                                   AND tbl_posts.post_status = 'Published' 
                                   ORDER BY post_pin DESC, post_id ASC";
                $fetch_post_activity = mysqli_query($connection, $query_activity);
                if (mysqli_num_rows($fetch_post_activity) == 0) {
                    echo "<h1 class='text-center'>No content Found</h1>";
                } else {
                    while ($Row_activity = mysqli_fetch_assoc($fetch_post_activity)) {
                        $the_post_id = $Row_activity['post_id'];
                        $the_post_image = $Row_activity['post_image'];
                        $the_post_pin = $Row_activity['post_pin'];
                        if ($_SESSION['lang'] == 'en') {
                            $the_post_activity_title = $Row_activity['post_title'];
                            $the_post_content = base64_decode($Row_activity['post_content']);
                        } else {
                            $the_post_activity_title = $Row_activity['post_title_thai'];
                            $the_post_content = base64_decode($Row_activity['post_content_thai']);
                        }
                ?>
            <!-- blog-wrapper -->
            <div class="blog-card">
                        <div class="blog-card-header">
                            <img src="admin/images/<?php echo $the_post_image ?>" class="blog-card-img"
                                alt="">
                        </div>
                        <div class="blog-card-body">
                            <div class="d-flex ">
                                <h5 class="blog-card-title"><?php echo $the_post_activity_title; ?></h6>
                                <?php echo ($the_post_pin === "1") ? "<img class='pin' src='img/pin.png' alt=''>" : ''; ?>
                            </div>
                            <!-- <p class="blog-card-caption">
                            <a href="#">By: Admin</a>
                            <a href="#"><i class="ti-heart text-danger"></i> 234</a>
                            <a href="#"><i class="ti-comment"></i> 123</a>
                        </p> -->
                            <p><?php echo $the_post_content; ?></p>
                            <a href="#" class="blog-card-link">Read more <i class="fas fa-angle-double-right"></i></a>
                        </div>
            </div><!-- end of blog wrapper -->
            <?php }
                } ?>
        </div><!-- end of container -->
    </section><!-- end of blog section -->
</div>
<!-- Service End -->


<?php include("./includes/footer.php") ?>