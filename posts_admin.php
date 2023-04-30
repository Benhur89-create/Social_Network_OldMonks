<!DOCTYPE html>
<?php
session_start();
error_reporting(0);
include("functions/functions.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>
	
	
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
        <div class="col-sm-12">
            <center><h2><strong>Manage Posts</strong></h2><br></center>
            <?php echo get_posts_admin(); ?>
        </div>
    </div>

</body>
</html>