<?php include("./includes/header.php"); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo constant('page_product_1') ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-5"><a class="text-white" href="index.php"><?php echo constant('page_product_2') ?></a></li>
                <li class="breadcrumb-item fs-5 text-warning active" text-dark active" aria-current="page"><?php echo constant('page_product_3') ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h5 class=" text-secondary"><?php echo constant("page_product_31") ?></h5>
            <h1 class="display-6 mb-4"><?php echo constant("page_product_4") ?></h1>
        </div>
        <div class="row g-4 " >
        <div class="container">
    <div class="row">
        <?php
        $query_product = "SELECT * FROM tbl_posts 
                           INNER JOIN tbl_categories ON tbl_categories.cat_id = tbl_posts.post_category_id  
                           WHERE tbl_categories.cat_page=6 AND tbl_posts.post_status='Published'";
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
    <div class="col-lg-12 col-md-6 d-flex align-items-stretch portfolio-item wow fadeInUp mb-4 " 
        data-wow-delay="<?php echo $count <= 0.5 ? $count . 's' : '0.1s'; ?>">
        <div class="card border-0 rounded overflow-hidden flex-grow-1">
            <!-- เนื้อหา -->
            <div class="card-body border border-5 border-light  p-4 w-100 text-center">
                <h5 class="lh-base mb-0 w-100"><?php echo $the_post_content; ?></h5>
                <p class="text-primary fw-medium mb-2"><?php echo $the_post_product_title; ?></p>
                <h3 class="text-dark fw-medium mb-2 text-uppercase"><?php echo $the_post_subtitle; ?></h3>
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
</div></div></div>
            <!-- Projects End -->
<?php include("./includes/footer.php") ?>