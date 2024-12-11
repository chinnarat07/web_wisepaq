<?php
include "includes/header.php";
include "includes/navigation.php";

// Add new Category.
$error_message = "";
if (isset($_POST["submit"])) {
    $cat_title = $_POST['cat_title'];
    $cat_title_thai = $_POST['cat_title_thai'];  
    if (!empty($cat_title) || $cat_title != "") {
        $query = "INSERT INTO categories (cat_title,cat_title_thai) VALUES('$cat_title','$cat_title_thai'); ";
        $create_query = mysqli_query($connection, $query);
        if (!$create_query) {
            die("Query Failed: " . mysqli_error($connection));
        }
    } else {
        $error_message = "Category field is required.";
    }
}

// Delete Category.
if (isset($_GET["delete"])) {
        $cat_id = $_GET['delete'];
     // Check exist user.
        $exist = -1;
         $queryExist = "SELECT EXISTS(SELECT * FROM posts WHERE post_category_id = $cat_id) as exist";
         $fetch_data = mysqli_query($connection, $queryExist);
              while ($Row = mysqli_fetch_assoc($fetch_data)) {
                                  $exist = $Row['exist'];
         }    
    
        if($exist==0){
            $query = "DELETE FROM categories WHERE cat_id=$cat_id";
            $delete_query = mysqli_query($connection, $query);
            header("Location: categories.php");
            if (!$delete_query) {
                die("Query Failed: " . mysqli_error($connection));
            }
      }else if($exist==1){
              echo "<script>alert('Found data in the system!Can not delete');</script>";           
      } 
    
}

// Update Category.
if (isset($_GET["edit"], $_POST["update_category"])) {
    $cat_id = $_GET['edit'];
    $cat_title = $_POST["cat_title"];
    $cat_title_thai = $_POST["cat_title_thai"];  
    $query = "UPDATE categories SET cat_title='$cat_title' , cat_title_thai='$cat_title_thai'    WHERE cat_id=$cat_id";
    echo $query;
    $update_query = mysqli_query($connection, $query);
    header("Location: categories.php");
    if (!$update_query) {
        die("Query Failed: " . mysqli_error($connection));
    }
}

?>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to  <small><?php echo $_SESSION['username'] ?></small>
                </h1>
               
            </div>
            <div class="col-xs-6">
                <div style="border: 2px solid gray;" >
                     <h3>&nbsp;Add Category</h3>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="cat_title">&nbsp;&nbsp;Category</label>
                            <input type="text" class="form-control" name="cat_title" id="">
                        </div>
                        <div class="form-group">
                            <label for="cat_title">&nbsp;&nbsp;[ภาษาไทย] Category</label>
                            <input type="text" class="form-control" name="cat_title_thai" id="">
                        </div>                 
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="  Add Category">
                        </div>
                    </form>
                </div>
                <div style="height:10px"></div>      
               <div style="border: 2px solid gray;" >
                     <h3>&nbsp;Edit Category</h3>             
                        <form action="" method="POST">
                            <?php
                            if (isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];
                                $query = "SELECT * FROM categories WHERE cat_id=$cat_id";
                                $fetch_data = mysqli_query($connection, $query);
                                while ($Row = mysqli_fetch_assoc($fetch_data)) {
                                    $cat_title = $Row["cat_title"];
                                    $cat_title_thai = $Row["cat_title_thai"];
                                    if (isset($cat_title)) {
                                        ?>
                                        <div class="form-group">
                                            <label for="cat_title">&nbsp;&nbsp;Category</label>
                                            <input type="text" value="<?php echo $cat_title; ?>" class="form-control" name="cat_title" id="">
                                        </div>

                                           <div class="form-group">
                                            <label for="cat_title_thai">&nbsp;&nbsp;[ภาษาไทย] Category</label>
                                            <input type="text" value="<?php echo $cat_title_thai; ?>" class="form-control" name="cat_title_thai" id="">
                                        </div>                 

                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" name="update_category" value="Edit Category">
                                        </div>
                            <?php };
                                }
                            }
                            ?>
                        </form>
                </div>    
                <span><?php echo $error_message; ?></span>
            </div>
            <div class="col-xs-6">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>[ภาษาไทย] Category</th>
                           <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM categories";
                        $fetch_data = mysqli_query($connection, $query);
                        while ($Row = mysqli_fetch_assoc($fetch_data)) {
                            echo "<tr>
                                    <td>{$Row['cat_id']}</td>
                                    <td>{$Row['cat_title']}</td>
                                    <td>{$Row['cat_title_thai']}</td>
                                    <td>
                                         <a onClick=\"javascript: return confirm('Please confirm deletion');\"href='categories.php?delete={$Row['cat_id']}'>Delete</a>
                                         | <a href='categories.php?edit={$Row['cat_id']}'>Edit</a>
                                    </td>
                                </tr>";
                        }
                        //=    <a href='categories.php?delete={$Row['cat_id']}'>Delete</a>              
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php" ?>