<?php
include "includes/db.php";
/* Page Header and navigation */
include "includes/header.php";
include "includes/navigation.php";

$errMessage = false;

// Add new comment.
if (isset($_POST["create_comment"])) {
    $the_post_id = $_GET["p_id"];
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];


    if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
        $query .= "VALUES('{$the_post_id}', '{$comment_author}',  '{$comment_email}', '{$comment_content}', 'unapproved', now())";

        $create_comment_query = mysqli_query($connection, $query);
        if (!$create_comment_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }

        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id=$the_post_id";

        $update_comment_count = mysqli_query($connection, $query);
        $errMessage = false;
        if (!$update_comment_count) {
            die('QUERY FAILED' . mysqli_error($connection));
        }
    } else {
        $errMessage = true;
    }
}
?>
<!-- Page Content -->
<div class="container">
    <?php
    if (isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_all_posts_query = mysqli_query($connection, $query);

        while ($Row = mysqli_fetch_assoc($select_all_posts_query)) {
            $post_id = $Row['post_id'];
            $post_title = $Row['post_title'];
            $post_author = $Row['post_author'];
            $post_date = $Row['post_date'];
            $post_image = $Row['post_image'];
            $post_content = $Row['post_content'];
            ?>
            <div class="row">
                <!-- Blog Post Content Column -->
                <div class="col-lg-8">

                    <!-- Blog Post -->

                    <!-- Title -->
                    <h1><?php echo $post_title; ?></h1>

                    <!-- Author -->
                    <p class="lead">
                        by <a href="#"><?php echo $post_author; ?></a>
                    </p>

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
    include "includes/footer.php"
    ?>