<?php
//include "includes_admin/db.php";
include '../includes/db.php';
/* Page Header and navigation */
include "includes_admin/header.php";
include "includes_admin/navigation.php";

$errMessage = false;

?>
<!-- Page Content -->
<div class="container">
    <?php
    if (isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];
        $lang = $_GET['lang']; 
        $query = "SELECT * FROM tbl_posts WHERE post_id = $the_post_id ";
        $select_all_posts_query = mysqli_query($connection, $query);

        while ($Row = mysqli_fetch_assoc($select_all_posts_query)) {
            $post_id = $Row['post_id'];
            if ($lang=='en'){
                    $post_title = $Row['post_title'];
                    $post_subtitle = $Row['post_subtitle'];
            }else{
                   $post_title = $Row['post_title_thai'];
                   $post_subtitle = $Row['post_subtitle_thai'];
            }
            
            $post_link_url = $Row['post_link'];
            $post_date = $Row['post_date'];
            $post_image = $Row['post_image'];
            
            if ($lang=='en'){
                     $post_content = base64_decode($Row['post_content']);
            }else{
                    $post_content = base64_decode($Row['post_content_thai']);
            }            
 
            ?>
            <div class="row">
                <!-- Blog Post Content Column -->
                <div class="col-lg-8">

                    <!-- Blog Post -->

                    <!-- Title -->
                    <h1><?php echo $post_title; ?></h1>

                    <!-- Subtitle -->
                    <h3><?php echo $post_subtitle; ?></h3>

                    <!-- Author -->
                    <p class="lead">
                        by </a>
                    </p>
                    <!--Link Url-->
                    <a class="btn btn-link text-light" href="<?php echo $post_link_url ?>" target="_blank">click link</i></a>
                    
                    <hr>

                    <!-- Date/Time -->
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>

                    <hr>

                    <!-- Preview Image -->
                    <img class="img-responsive" src="<?php echo "images/" . $post_image; ?>" alt="<?php echo $post_title; ?>">

                    <hr>

                    <!-- Post Content -->
                    <p><?php echo $post_content; ?></p>
                    <hr>

                    <!-- Blog Comments -->

    

                    <hr>

       
                    <br>

                </div>

                <!-- Blog Sidebar Widgets Column -->
                <?php
                  //      include "includes/sidebar.php"
                        ?>
            </div>
    <?php
        }
    }
    ?>
    <hr>
    <?php
    /* Page Footer */
    include "includes_admin/footer.php"
    ?>