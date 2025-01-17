<script src="./ckeditor/ckeditor.js"></script>
<?php
if (isset($_POST['create_post'])) {
    $post_title = $_POST['title'];
    $post_title_thai = $_POST['title_thai'];
    $post_subtitle = $_POST['subtitle'];
    $post_subtitle_thai = $_POST['subtitle_thai'];
    $post_link_url = $_POST['link_url'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_pin = $_POST['post_pin'];

    $path = $_FILES['post_image']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $post_image = strtotime(date("Y-m-d H:i:s")) . '.' . $ext;
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_content = base64_encode($_POST['post_content']);
    $post_content_thai = base64_encode($_POST['post_content_thai']);
    $post_date = date("Y-m-d H:i:s");  // date('d-m-y');
    $post_comemnt_id = 0;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    // Add new Post.
    $query = "INSERT INTO tbl_posts(post_category_id, post_title, post_title_thai, post_date, post_image, post_content, post_content_thai, post_status,post_subtitle,post_subtitle_thai,post_link,post_pin) ";
    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_title_thai}', '{$post_date}', '{$post_image}', '{$post_content}', '{$post_content_thai}',  '{$post_status}','{$post_subtitle}','{$post_subtitle_thai}','{$post_link_url}','{$post_pin}')";
    $create_post_query = mysqli_query($connection, $query);
    $the_post_id = mysqli_insert_id($connection);
    if (!$create_post_query) {
        die("Query Failed: " . mysqli_error($connection));
    }

    header("Location: posts.php");
    // echo "<p class='alert alert-success'>Post added successfully. <a href='../post.php?p_id=$the_post_id'>View Post</a></p>";
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="title">[ภาษาไทย] Post Title</label>
        <input type="text" class="form-control" name="title_thai">
    </div>
    <div class="form-group">
        <label for="subtitle">Post subtitle</label>
        <input type="text" class="form-control" name="subtitle">
    </div>
    <div class="form-group">
        <label for="subtitle">[ภาษาไทย] Post subtitle</label>
        <input type="text" class="form-control" name="subtitle_thai">
    </div>
    <div class="form-group">
        <label for="link">Link Url</label>
        <input type="text" class="form-control" name="link_url">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category</label>
        <select class="form-control" name="post_category" id="post_category">
            <?php
            $query = "SELECT * FROM tbl_categories";
            $fetch_data = mysqli_query($connection, $query);
            while ($Row = mysqli_fetch_assoc($fetch_data)) {
                $cat_id = $Row["cat_id"];
                $cat_title = $Row["cat_title"];
                if (isset($cat_title)) {
            ?>
                    <option value='<?php echo $cat_id; ?>'><?php echo $cat_title; ?></option>
            <?php
                }
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select class="form-control" name="post_status" id="post_category">
            <option value='Draft'>Select Option</option>
            <option value='Published'>Published</option>
            <option value='Draft'>Draft</option>
        </select>
    </div>

    <div class="form-group">
        <label for="post_pin">Post Pin</label>
        <select class="form-control" name="post_pin" id="post_category">
            <option value='0'>Select Option</option>
            <option value='1'>Important</option>
            <option value='0'>Unimportant</option>
        </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label id="my-ckeditor" for="post_content">Post Content</label>
        <textarea id="editor" name="post_content" class="form-control">
        This is some sample content.
        </textarea>
        <script>
            CKEDITOR.dtd.$removeEmpty['i'] = false;
            CKEDITOR.dtd.$removeEmpty['span'] = false;

            CKEDITOR.replace('editor');

            CKEDITOR.config.width = "100%";
            CKEDITOR.config.height = "700px";
        </script>
    </div>

    <div class="form-group">
        <label id="my-ckeditor" for="post_content_thai">[ภาษาไทย] Post Content</label>
        <textarea id="editor2" name="post_content_thai" class="form-control">
         นี่คือเนื้อหาตัวอย่างบางส่วน.
        </textarea>
        <script>
            CKEDITOR.dtd.$removeEmpty['i'] = false;
            CKEDITOR.dtd.$removeEmpty['span'] = false;

            CKEDITOR.replace('editor2');

            CKEDITOR.config.width = "100%";
            CKEDITOR.config.height = "700px";
        </script>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish">
    </div>
</form>