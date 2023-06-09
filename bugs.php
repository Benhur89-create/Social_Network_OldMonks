<!DOCTYPE html>
<?php
session_start();
error_reporting(0);
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>
	<?php
		$user = $_SESSION['user_email'];
		$get_user = "select * from users2 where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
	?>
	<title><?php echo "$user_name"; ?></title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style_home.css">
</head>

<style>

    #content{
        width: 85%;
    }

</style>

<body>
    
    <div class="row">
        <div id="insert_post">
            <center>
                <form action="bugs.php?id=<?php echo $user_id; ?>" method="post" id="f" enctype="multipart/form-data">
                    <textarea class="form-control" id="content" name="content" cols="30" rows="10" placeholder="Bugs?"></textarea><br>
                    <label class="btn-warning" id="upload_image_button">Select Image
                        <input type="file" name="upload_image" size="30">
                    </label>
                    <button id="btn-post" class="btn- btn-success" name="bug">Post</button>
                </form>
                <?php insertBugs(); ?>
            </center>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <center><h2><strong>Bug Reports</strong></h2><br></center>
            <?php echo get_bugs(); ?>
        </div>
    </div>

</body>
</html>