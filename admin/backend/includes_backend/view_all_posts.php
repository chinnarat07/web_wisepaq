<?php
// Delete Post.
if (isset($_GET["deletePost"])) {
    echo 'aaaaa';
    exit;
    $post_id = $_GET['deletePost'];
    $post_image = $_GET['image'];
    $query = "DELETE FROM tbl_posts WHERE post_id=$post_id";
    $delete_query = mysqli_query($connection, $query);
    header("Location: posts.php");
    if (!$delete_query) {
        die("Query Failed: " . mysqli_error($connection));
    }
}

if (isset($_POST["apply"])) {
    if (isset($_POST["checkBoxArray"])) {
        foreach ($_POST["checkBoxArray"] as $checkBoxValue) {
            $bulk_option = $_POST['bulk_option'];
            switch ($bulk_option) {
                case 'Published':
                    $query = "UPDATE tbl_posts SET post_status = '$bulk_option' WHERE post_id=$checkBoxValue";
                    $update_post = mysqli_query($connection, $query);
                    echo "<p class='alert alert-success'>Post published successfully.</p>";
                    if (!$update_post) {
                        die("Query Failed: " . mysqli_error($connection));
                    }
                    break;
                case 'Draft':
                    $query = "UPDATE tbl_posts SET post_status = '$bulk_option' WHERE post_id=$checkBoxValue";
                    $update_post = mysqli_query($connection, $query);
                    echo "<p class='alert alert-success'>Post draftted successfully.</p>";
                    if (!$update_post) {
                        die("Query Failed: " . mysqli_error($connection));
                    }
                    break;
                case 'Important':
                    $query = "UPDATE tbl_posts SET post_pin = '1' WHERE post_id=$checkBoxValue";
                    $update_post = mysqli_query($connection, $query);
                    echo "<p class='alert alert-success'>Post important successfully.</p>";
                    if (!$update_post) {
                        die("Query Failed: " . mysqli_error($connection));
                    }
                    break;
                case 'Unimportant':
                    $query = "UPDATE tbl_posts SET post_pin = '0' WHERE post_id=$checkBoxValue";
                    $update_post = mysqli_query($connection, $query);
                    echo "<p class='alert alert-success'>Post unimportant successfully.</p>";
                    if (!$update_post) {
                        die("Query Failed: " . mysqli_error($connection));
                    }
                    break;
                case 'Delete':
                    $query = "DELETE FROM tbl_posts WHERE post_id = $checkBoxValue";
                    $update_post = mysqli_query($connection, $query);
                    echo "<p class='alert alert-success'>Post deleted successfully.</p>";
                    if (!$update_post) {
                        die("Query Failed: " . mysqli_error($connection));
                    }
                    break;
                default:
                    echo "<p class='alert alert-danger'>Please an option.</p>";
                    break;
            }
        }
    } else {
        echo "<p class='alert alert-danger'>Please select post.</p>";
    }
}
?>

<form action="" method="POST">
    <table class="table table-bordered table-hover" id="viewposts">
        <div class="row">
            <div class="col-sm-4">
                <select class="form-control" name="bulk_option">
                    <option value="">Select Options</option>
                    <option value="Published">Publish</option>
                    <option value="Draft">Draft</option>
                    <option value="Important">Important</option>
                    <option value="Unimportant">Unimportant</option>
                    <option value="Delete">Delete</option>
                </select>
            </div>
            <div class="form-group col-xs-4">
                <input type="submit" class="btn btn-success" name="apply" value="Apply">
                <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
            </div>
        </div>
        <thead >
            <tr>
                <th><input type='checkbox' id='selectAllBoxes' onclick="selectAll(this)"></th>
                <th>ID</th>
                <th style="width: 300px;">Title[EN] / Title[TH]</th>
                <!-- <th style="width: 150px;">[ภาษาไทย] Title</th> -->
                <th style="width: 300px;">Category[EN] / Category[TH]</th>
                <!-- <th style="width: 150px;">[ภาษาไทย] Category</th> -->
                <th>Status</th>
                <th>Pin</th>
                <th style="width:100px">Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM tbl_posts";
            $fetch_posts_data = mysqli_query($connection, $query);
            while ($Row = mysqli_fetch_assoc($fetch_posts_data)) {
                $the_post_id = $Row['post_id'];
                $the_post_image = $Row['post_image'];
                $the_posts_pin = $Row['post_pin'];
                echo "<tr>"; ?>
                <td><input type='checkbox' name='checkBoxArray[]' value='<?php echo $the_post_id ?>'></td>
            <?php
                echo "<td>{$Row['post_id']}</td>
                    <td><a href='../post.php?lang=en&p_id=$the_post_id'>{$Row['post_title']}</a>
                     / <a href='../post.php?lang=th&p_id=$the_post_id'>{$Row['post_title_thai']}</a></td>";

                $cat_id = $Row['post_category_id'];
                $query = "SELECT * FROM tbl_categories WHERE cat_id=$cat_id";
                $fetch_cat_data = mysqli_query($connection, $query);
                while ($Cat = mysqli_fetch_assoc($fetch_cat_data)) {
                    $cat_title = $Cat["cat_title"];
                    $cat_title_thai = $Cat["cat_title_thai"];
                    if (isset($cat_title)) {
                        echo "<td>$cat_title / $cat_title_thai</td>";
                        // echo "<td>$cat_title_thai</td>";
                    }
                }
                echo "<td>{$Row['post_status']}</td>";
                
                if($the_posts_pin === "1"){
                    echo "<td><img src='../images/pin.png' alt='image'  width='20px' height='20px'></td>";
                } else{
                    echo "<td></td>";
                }

                echo "<td><img src='../images/{$Row['post_image']}' alt='image' width='150px' height='65px' style='object-fit: cover; text-align:center;'></td>
                    <td>{$Row['post_date']}</td>
                    <td class='text-center'>
                        <a href='posts.php?source=edit_post&p_id=$the_post_id'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a> | 
                        <a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='posts.php?deletePost=$the_post_id&image=$the_post_image'><i class='fa fa-trash-o fa-lg' aria-hidden='true'></i></a> 
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</form>