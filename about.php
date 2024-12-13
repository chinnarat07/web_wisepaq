<!DOCTYPE html>
<html lang="en">

<body>
<?php
include "includes/db.php";
/* Page Header and navigation */
//=include "includes/header.php";
//=include "includes/navigation.php";
?>
<?php include("./includes/header.php");?>

    

      <!-- About Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                
             <?php
                $query = "SELECT * FROM tbl_posts inner join tbl_categories on tbl_categories.cat_id = tbl_posts.post_category_id   where tbl_categories.cat_page=1";
                $fetch_posts_data = mysqli_query($connection, $query);
                while ($Row = mysqli_fetch_assoc($fetch_posts_data)) {
                    $the_post_id = $Row['post_id'];
                    $the_post_image = $Row['post_image']; 
                    if($_SESSION['lang'] == 'en'){
                        $the_post_title = $Row['post_title'];             
                        $the_post_content = base64_decode($Row['post_content']); 
                    }else{
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
    </div>
    <!-- About End -->





    <?php include("./includes/footer.php") ?>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>