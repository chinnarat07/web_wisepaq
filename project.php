<?php include("./includes/header.php"); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo constant('page_project_1') ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-5"><a class="text-white" href="index.php"><?php echo constant('page_project_2') ?></a></li>
                <li class="breadcrumb-item fs-5 text-warning active" text-dark active" aria-current="page"><?php echo constant('page_project_3') ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h5 class=" text-secondary"><?php echo constant("page_project_31") ?></h5>
            <h1 class="display-6 mb-4"><?php echo constant("page_project_4") ?></h1>
        </div>
        <div class="row g-4 portfolio-container container-project" >
        <div class="container">
    <div class="row">
        <?php
        $query_project = "SELECT * FROM tbl_posts 
                           INNER JOIN tbl_categories ON tbl_categories.cat_id = tbl_posts.post_category_id  
                           WHERE tbl_categories.cat_page=4 AND tbl_posts.post_status='Published'";
        $fetch_post_project = mysqli_query($connection, $query_project);
        if (mysqli_num_rows($fetch_post_project) == 0) {
            echo "<h1 class='text-center'>No content Found</h1>";
        } else {
            $index = 1;
            $count = 0.1; // ตัวแปรสำหรับ delay ของ animation
while ($Row_project = mysqli_fetch_assoc($fetch_post_project)) {
     $the_post_id = $Row_project['post_id'];
    $the_post_image = $Row_project['post_image'];
    $the_post_link_url = $Row_project['post_link'];
    if ($_SESSION['lang'] == 'en') {
        $the_post_project_title = $Row_project['post_title'];
        $the_post_content = base64_decode($Row_project['post_content']);
    } else {
        $the_post_project_title = $Row_project['post_title_thai'];
        $the_post_content = base64_decode($Row_project['post_content_thai']);
    }
?>
    <div class="col-lg-6 col-md-6 d-flex align-items-stretch portfolio-item wow fadeInUp mb-4 project " id="project-<?php echo $index; ?>"
        data-wow-delay="<?php echo $count <= 0.5 ? $count . 's' : '0.1s'; ?>">
        <div class="card border-0 rounded overflow-hidden flex-grow-1">
            <!-- ภาพ -->
            <div class="position-relative overflow-hidden ">
                <img class="card-img-top img-fluid img-fluid-project w-100" style="height: 330px; object-fit: cover;" 
                     src="<?php echo "admin/images/" . $the_post_image; ?>" alt="Image">
                <div class="portfolio-overlay d-flex justify-content-center align-items-center">
                    <a class="btn btn-square btn-outline-light ms-0 preview-link glightbox" 
                       title="<?php echo $the_post_project_title; ?>" 
                       href="<?php echo "admin/images/" . $the_post_image; ?>" data-lightbox="portfolio">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-square btn-outline-light" style="margin:22.5px 0px 0px 90px;" href="<?php echo $the_post_link_url; ?>" target="_blank">
                        <i class="fa fa-link"></i>
                    </a>
                </div>
            </div>
            <!-- เนื้อหา -->
            <div class="card-body border border-5 border-light border-top-0 p-4 content_project" id="content_project-<?php echo $the_post_id ?>" style="display:none; " >
                <p class="text-primary fw-medium mb-2"><?php echo $the_post_project_title; ?></p>
                <h5 class="lh-base mb-0"><?php echo $the_post_content; ?></h5>
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