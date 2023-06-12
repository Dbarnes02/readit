<?php
    $page_title = "Account Info | Readit";

    session_start();
    if(!isset($_SESSION['diana-readit-1-2-3'])) {
        header("location: index.php");
    }

    include('session-time-check.php');


    include('includes/connect.php');
    include('includes/header.php');
    $user_id = $_SESSION['user_id'];
    
?>
<div class="container my-5">
    <div class="d-flex justify-content-evenly">
        <div class="w-25">
            <h2>Account Info</h2>
            <?php

            $list_sql= "SELECT * FROM users WHERE user_id = $user_id AND deleted_yn = 'N'";
        
            $list_result = $conn->query($list_sql);?>
			<?php if ($list_result->num_rows > 0): ?>
			<?php while ($list_row = $list_result->fetch_assoc()): ?>
				<?php 
                $profile_pic = $list_row['profile_pic'];
				$first_name = $list_row['first_name'];
				$last_name = $list_row['last_name'];
				$user_name = $list_row['user_name'];
                $email = $list_row['email'];
                $access = $list_row['access_level'];

				?>
				<img class="w-25 rounded-circle pb-3 pt-1" src="uploads/<?php echo $profile_pic; ?>" alt="">
				<p>First Name: <?php echo $first_name; ?></p>
                <p>Last Name: <?php echo $last_name; ?></p>
                <p>User Name: <?php echo $user_name; ?></p>
                <p>Email: <?php echo $email; ?></p>
                <p>Access Level: <?php echo $access; ?></p>
			<?php endwhile ?>	
			<?php endif ?>
        </div>

        <div>
            <h2>Update Proflie Pic</h2>
            <div id="ddArea" class="my-4 p-5" style="border: 1px dashed darkgrey">
                Drag and Drop Files Here or
                <a class="link-primary" style="cursor: pointer;">
                    Select File(s)
                </a> 
                <div id="showThumb" class="w-25"></div>
                <input type="file" class="d-none" id="selectfile" accept="" multiple>
            </div>
            <div class="visually-hidden">
                <form action="">
                    <input type="file" accept="image/*" capture="camera">
                </form>
            </div>
            <div id="forHide">
                <form method="POST" action="">
                    <div id="my_camera"></div>

                    <input type=button value="Take Snapshot" onClick="take_snapshot()">
                    <input type="hidden" name="image" class="image-tag">
                    <div id="results">Your captured image will appear here...</div>
                    <input type="submit" name="submit" class="btn btn-success">
                </form>
            </div>
        </div>

        <div class="border-start border-dark ps-5">
            <h2>Update Account Info</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form mt-3" id="account-form">
                <div class="message bg-danger text-light">
                    <?php if (isset($message)): ?>
                        <?php echo $message; ?>
                    <?php endif ?>
                </div>
                <div class="form-group mb-3">
                    <label for="first_name">First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="">
                </div>

                <div class="form-group mb-3">
                    <label for="last_name">Last Name</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="">
                </div>

                <div class="form-group mb-3">
                    <label for="user_name">User Name</label>
                    <input class="form-control" type="text" name="user_name" id="user_name" value="">
                </div>


                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="">
                </div>

                <div class="form-group">
                    <button class="w-100 btn btn-lg btn-success" type="submit" name="submit">Save Info</button>
                </div>
            </form>

            <h2 class="pt-5">Change Password</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form mt-3" id="password-form">
            <div class="p_message bg-danger text-light">
                    <?php if (isset($p_message)): ?>
                        <?php echo $p_message; ?>
                    <?php endif ?>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Current Password</label>
                    <input class="form-control" type="text" name="password" id="password">
                </div>

                <div class="form-group mb-3">
                    <label for="new_password">New Password</label>
                    <input class="form-control" type="text" name="new_password" id="new_password">
                </div>

                <div class="form-group">
                    <button class="w-100 btn btn-lg btn-success" type="submit" name="submit">Save Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

<script language="JavaScript">
    Webcam.on('error', function(err) {
        var x = document.getElementById("forHide");
        x.style.display = "none";
    });

    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function (data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }
</script>
<?php include('includes/footer.php'); ?>

