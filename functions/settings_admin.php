<!DOCTYPE html>
<html>
<head>
	<title>My Website - Settings</title>
	<style>
		.header {

           color: #fff;
			padding: 20px;
			text-align: center;
            background-color: <?php echo $_COOKIE['header_color'] ?? '#f1f2f1'; ?>;
            

			
        }
       
        .header-info center a h1{
            color: #fff;
            font-size: 45px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .header-info center a {
            text-decoration: none;
        }

        .header-info center a:hover {
            color: white;
        }

        .header-info center a:active {
            color: white;
        }
		}
	</style>
</head>
<body>
	<div class="header">
     <div class="header-col">
            <div class="header-info">
                 <center><a href="main.php"><h1>Social Network</h1></a></center>
            </div>
    </div>
    </div>
     <br>
		<form method="post" action="update_color.php">
			<label for="color">Header Color Testing:</label>
			<input type="color" id="color" name="color" value="<?php echo $_COOKIE['header_color'] ?? '#f1f1f1'; ?>">
			<button type="submit">Update Color</button><br>
            <br>
            <a href="/admin/admin.php" > Back</a>
		</form>
	
    
</body>
</html>



