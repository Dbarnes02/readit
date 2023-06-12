<?php
$page_title = "Admin Account | Readit";

session_start();
if(!isset($_SESSION['diana-readit-1-2-3'])) {
	header("location: login-form.php");
}

include("session-time-check.php");
include("includes/messages.php");
include("includes/connect.php");

include("includes/header.php");
?>

<div class="container my-5">
    <h2 class="pb-5">Admin Account</h2>
    <h4 class="pb-2">Users</h4>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Profile Pic</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>password</th>
                <th>Access Level</th>
            </tr>
        </thead>
        <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><img class="w-25 rounded-circle pb-3 pt-1" src="uploads/<?php echo $row['profile_pic']; ?>"></img></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['user_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['access_level']; ?></td>
            </tr>
        <?php endwhile ?>
    </table>
</div>
<?php include("includes/footer.php"); ?>