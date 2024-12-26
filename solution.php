

<!DOCTYPE html>
<html lang="en">
<?php include("./includes/header.php");?>
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-2 text-white mb-3 animated slideInDown"><?php echo constant('page_solution_1') ?></h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item fs-5"><a class="text-white" href="index.php"><?php echo constant('page_solution_2') ?></a></li>
                    <li class="breadcrumb-item fs-5 text-warning active" aria-current="page"><?php echo constant('page_solution_3') ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

<!-- Solution Start -->
<div class="container-xxl py-5 pt-0">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h5 class=" text-secondary"><?php echo constant("page_solution_31") ?></h5>
            <h1 class="display-6 mb-4"><?php echo constant("page_solution_4") ?></h1>
        </div>
        <div class="container-fluid py-5 ">
            <div class="container py-5 pt-0">
                <?php
                $query_solution = "SELECT * FROM tbl_posts INNER JOIN tbl_categories ON tbl_categories.cat_id = tbl_posts.post_category_id  WHERE tbl_categories.cat_page=5 AND tbl_posts.post_status='Published'";
                $fetch_post_solution = mysqli_query($connection, $query_solution);
                if (mysqli_num_rows($fetch_post_solution) == 0) {
                    //echo "<h1 class='text-center'>No content Found</h1>";
                } else {
                    $index = 1;
                    while ($Row_solution = mysqli_fetch_assoc($fetch_post_solution)) {
                        $the_post_id = $Row_solution['post_id'];
                        $the_post_image =  $Row_solution['post_image'];
                        $the_post_link_url = $Row_solution['post_link'];
                        if ($_SESSION['lang'] == 'en') {
                            $the_post_solution_title = $Row_solution['post_title'];
                            $the_post_subtitle = $Row_solution['post_subtitle'];
                            $the_post_content = base64_decode($Row_solution['post_content']);
                        } else {
                            $the_post_solution_title = $Row_solution['post_title_thai'];
                            $the_post_subtitle = $Row_solution['post_subtitle_thai'];
                            $the_post_content = base64_decode($Row_solution['post_content_thai']);
                        }
                ?>
                        <?php if ($index % 2 != 0) { ?>
                            <div class="row gx-0 mb-3 mb-lg-0" data-name="<?php echo $the_post_subtitle; ?>">
                                <div class="col-lg-6 my-lg-5 py-lg-5">
                                    <div class="about-start p-5">
                                        <h5 class="section-title text-secondary ms-4 "><?php echo $the_post_subtitle; ?></h5>
                                        <h1 class="display-5 mb-4 text-dark"><?php echo $the_post_solution_title; ?></h1>
                                        <p><?php echo $the_post_content; ?></p>
                                        <a href="<?php echo $the_post_link_url; ?>" class="btn btn-success rounded-pill py-md-3 px-md-5 mt-1"><?php echo constant('page_solution_5');?></a>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="min-height: 400px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute w-100 h-100" src="<?php echo "admin/images/" . $the_post_image; ?>" style="object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row gx-0" data-name="<?php echo $the_post_subtitle; ?>">
                                <div class="col-lg-6" style="min-height: 400px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute w-100 h-100" src="<?php echo "admin/images/" . $the_post_image; ?>" style="object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col-lg-6 my-lg-5 py-lg-5">
                                    <div class="about-end bg-primary p-5">
                                        <h5 class="section-title text-secondary ms-4 "><?php echo $the_post_subtitle; ?></h5>
                                        <h1 class="display-5 mb-4 "><?php echo $the_post_solution_title; ?></h1>
                                        <p><?php echo $the_post_content; ?></p>
                                        <a href="<?php echo $the_post_link_url; ?>" class="btn btn-success rounded-pill py-md-3 px-md-5 mt-1"><?php echo constant('page_solution_5');?></a>
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
<script>
    // JavaScript: เลื่อนหน้าไปยังตำแหน่งตามฟิลด์ใน URL
    document.addEventListener("DOMContentLoaded", function() {
        // ดึงค่า hash และถอดรหัสภาษาไทย
        const hash = decodeURIComponent(window.location.hash.substring(1)); // ตัด # ออกและ decode

        if (hash) {
            // ค้นหา element ที่มี data-name ตรงกับ hash
            const target = document.querySelector(`[data-name="${hash}"]`);
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth"
                }); // เลื่อนไปที่เนื้อหา
            }
        }
    });
</script>
<!-- Service End -->

    <?php include("./includes/footer.php") ?>
