<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<style>
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}
		
		body {
			background-color: #f2f2f2;
		}
		
		header {
			background-color: #4967b8;
			color: #fff;
			padding: 20px;
			text-align: center;
		}
		
		nav {
			background-color: #f2f2f2;
			border-bottom: 1px solid #ccc;
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px;
		}
		
		nav ul {
			display: flex;
			list-style: none;
		}
		
		nav ul li a {
			color: #333;
			display: block;
			padding: 10px;
			text-decoration: none;
			transition: color 0.3s ease;
		}
		
		nav ul li a:hover {
			color: #666;
		}
		
		nav ul li.active a {
			color: #666;
			font-weight: bold;
		}
		
		main {
			text-align: center;
			padding: 20px;
		}
		
		footer {
			background-color: #4967b8;
			color: #fff;
			padding: 10px;
			text-align: center;
		}
		
		@media only screen and (max-width: 768px) {
			nav {
				flex-direction: column;
				align-items: flex-start;
			}
			
			nav ul {
				flex-direction: column;
				width: 100%;
			}
			
			nav ul li {
				width: 100%;
			}
		}
	</style>
</head>
<body>
	<header>
		<h1>Admin Page</h1>
	</header>
	<nav>
		<ul>
			<li><a href="/posts_admin.php" class="active"><i class="fas fa-tachometer-alt"></i> Manage Posts</a></li>
			<li><a href="/users_admin.php"><i class="fas fa-users"></i> Manage Users</a></li>
			<li><a href="/functions/settings_admin.php"><i class="fas fa-cog"></i> Settings</a></li>
			<li><a href="/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
		</ul>
		<form action="#" method="get">
			<input type="text" placeholder="Search...">
			<button type="submit"><i class="fas fa-search"></i></button>
		</form>
	</nav>
	<main>
		<h2>Welcome to the Admin Page</h2>
		<p>Here you can manage the website and its content.</p>
	</main>
	<footer>
		<p>&copy; 2023 Admin Page</p>
	</footer>
</body>
</html>
