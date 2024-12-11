<?php
// Delete User.
if (isset($_GET["delete"])) {
            $user_id = mysqli_real_escape_string($connection, $_GET['delete']);
            $query = "DELETE FROM users WHERE user_id=$user_id";
            $delete_query = mysqli_query($connection, $query);
            header("Location: users.php");
            if (!$delete_query) {
                die("Query Failed: " . mysqli_error($connection));
            }
}

?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
             <th>Action</th>           
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM users";
        $fetch_posts_data = mysqli_query($connection, $query);
        while ($Row = mysqli_fetch_assoc($fetch_posts_data)) {

            $user_id = $Row['user_id'];
            $user_name = $Row['user_name'];
            $user_firstname = $Row['user_firstname'];
            $user_lastname = $Row['user_lastname'];
            $user_email = $Row['user_email'];

            echo "<tr>
                    <td>$user_id</td>
                    <td>$user_name</td>
                    <td>$user_firstname</td>
                    <td>$user_lastname</td>
                    <td>$user_email</td>
                    <td>
                            <a href='users.php?source=edit_user&user_id=$user_id'>Edit</a> |
                            <a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='users.php?delete=$user_id'>Delete</a>
                     </td>
                </tr>";
        }
        ?>
    </tbody>
</table>