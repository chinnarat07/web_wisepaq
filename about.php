<!DOCTYPE html>
<html lang="en">
<?php include("./includes/header.php"); ?>
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white mb-3 animated slideInDown"><?php echo constant('page_about_1') ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-5"><a class="text-white" href="index.php"><?php echo constant('page_about_2') ?></a></li>
                <li class="breadcrumb-item fs-5 text-warning active" aria-current="page"><?php echo constant('page_about_3') ?></li>
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
                    $query = "SELECT * FROM tbl_posts INNER JOIN tbl_categories ON tbl_categories.cat_id = tbl_posts.post_category_id  WHERE tbl_categories.cat_page=2 AND tbl_posts.post_status='Published'";
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
                            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                                <div
                                    class="position-relative overflow-hidden  ps-5 pt-5 h-100"
                                    style="min-height: 400px ; border-radius: 3%;">
                                    <img
                                        class="position-absolute w-100 h-100"
                                        src="admin/images/<?php echo $the_post_image ?>"
                                        alt=""
                                        style="object-fit: cover" />
                                    <div
                                        class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
                                        style="width: 200px; height: 200px ; border-radius: 10%;">
                                        <div
                                            class="d-flex flex-column justify-content-center text-center bg-primary  h-100 p-3" style="border-radius: 10px;">
                                            <?php
                                            $currentYear = (new DateTime())->format("Y");
                                            $Years_of_Experience = ($currentYear + 543) - 2552;
                                            if ($_SESSION['lang'] == 'en') {
                                                echo "<h1 class='display-3 text-white text-center mb-0 ' data-toggle='counter-up'>" . $Years_of_Experience . "</h1>";
                                                echo "<h5 class='text-white text-center'>" . constant('page_about_5') . "</h5>";
                                            } else {
                                                echo "<h5 class='text-white text-center'>" . constant('page_about_5') . "</h5>";
                                                echo "<div class='text-center'>";
                                                echo "<span class='display-4 text-white text-center' data-toggle='counter-up'>" . $Years_of_Experience . "</span>";
                                                echo "<span class='display-6 text-white text-center'>" . "ปี" . "</span>";
                                                echo "</div>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn pe-0" data-wow-delay="0.5s">
                <p class="fw-medium text-secontery mb-2"><?php echo constant('page_about_4') ?></p>
                <h1 class="display-5 mb-4"><?php echo $the_post_about_title ?></h1>
                <p class="mb-4"><?php echo $the_post_subtitle ?></p>
                <div class="d-flex align-items-center mb-4 ">
                    <div class="ms-4">
                        <p><?php echo $the_post_content ?></p>
                    </div>
                </div>
        <?php }
                    } ?>
        <div class="row pt-2">
            <div class="col-sm-6">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ms-3">
                        <p class="mb-2"><?php echo constant('page_about_6') ?></p>
                        <h5 class="mb-0">hello@wisepaq.com</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <p class="mb-2"><?php echo constant('page_about_7') ?></p>
                        <h5 class="mb-0">+66 21 195 300</h5>
                    </div>
                </div>
            </div>
        </div>
            </div>

        </div>
    </div>
</div>
<!-- About End -->

<!-- Facts Start -->
<!-- <div class="container-fluid facts my-5 p-5 bg-primary">
    <div class="row g-5">
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
            <div class="text-center border p-5  bg-primary">
                <i class="fa fa-certificate fa-3x  mb-3"></i>
                <h1 class="display-2 text-dark mb-0" data-toggle="counter-up">15</h1>
                <span class="fs-5 fw-semi-bold text-dark">Years Experience</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
            <div class="text-center border p-5">
                <i class="fa fa-users-cog fa-3x  mb-3"></i>
                <h1 class="display-2 text-dark mb-0" data-toggle="counter-up">135</h1>
                <span class="fs-5 fw-semi-bold text-dark">Team Members</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
            <div class="text-center border bg-primary p-5">
                <i class="fa fa-users fa-3x  mb-3"></i>
                <h1 class="display-2 text-dark mb-0" data-toggle="counter-up">957</h1>
                <span class="fs-5 fw-semi-bold text-dark">Happy Clients</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
            <div class="text-center border p-5">
                <i class="fa fa-check-double fa-3x mb-3"></i>
                <h1 class="display-2 text-dark mb-0" data-toggle="counter-up">1839</h1>
                <span class="fs-5 fw-semi-bold text-dark">Projects Done</span>
            </div>
        </div>
    </div>
</div> -->
<!-- Facts End -->






<!-- About Start -->
<!-- <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                
             <?php
                $query = "SELECT * FROM tbl_posts inner join tbl_categories on tbl_categories.cat_id = tbl_posts.post_category_id   where tbl_categories.cat_page=1";
                $fetch_posts_data = mysqli_query($connection, $query);
                while ($Row = mysqli_fetch_assoc($fetch_posts_data)) {
                    $the_post_id = $Row['post_id'];
                    $the_post_image = $Row['post_image'];
                    if ($_SESSION['lang'] == 'en') {
                        $the_post_title = $Row['post_title'];
                        $the_post_content = base64_decode($Row['post_content']);
                    } else {
                        $the_post_title = $Row['post_title_thai'];
                        $the_post_content = base64_decode($Row['post_content_thai']);
                    }
                ?>               
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="<?php echo "admin/images/" . $the_post_image; ?>" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4"><?php echo $the_post_title ?></h1>
                        </div>
                        <p class="mb-4 pb-2"><?php echo $the_post_content ?></p>
                        
                        <a href="" class="btn btn-primary py-3 px-5">Explore More</a>
                    </div>
                </div>
                <?php }  ?>
            </div>
        </div>
    </div> -->
<!-- About End -->
<!-- Our Partners Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class=" text-center">
            <h6 class="text-secondary text-uppercase"><?php echo constant("page_content_7") ?></h6>
            <h1 ><?php echo constant("page_content_71") ?></h1>
        </div>
        <div class="row g-4">
            <?php
            $query_partner = "SELECT * FROM tbl_images";
            $fetch_data_partners = mysqli_query($connection, $query_partner);
            if (mysqli_num_rows($fetch_data_partners) == 0) {
                //echo "<h1 class='text-center'>No content Found</h1>";
            } else {
                while ($Row_partners = mysqli_fetch_assoc($fetch_data_partners)) {
                    $imageURL = 'uploads/' . $Row_partners['file_name'];
            ?>
                    <div class="col-lg-2 col-md-6 wow fadeInUp" id="image-container" style="display: flex; gap: 10px;" data-wow-delay="0.3s">
                        <div class="team-item">
                            <div class="overflow-hidden position-relative">
                                <img class="img-fluid p-3" src="<?php echo $imageURL; ?>" alt="">
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
<!-- Team End -->

<?php include("./includes/footer.php") ?>