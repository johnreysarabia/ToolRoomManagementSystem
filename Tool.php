<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php	
include_once("connection.php");

$result = mysqli_query($db, "SELECT * FROM tool WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ToolRoomManagementSystem</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/jss/bootstrap.js">
	<script src="bootstrap-4.0.0-beta.3-dist/jquery/jquery.min.js"></script>
	<script src="bootstrap-4.0.0-beta.3-dist/js/bootstrap.bundle.min.js"></script>
	<style>
		body {
			background-image: url("img/img2.jpg");
			color: white;
			width: 100%;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-success bg-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
					<a class="active" href="#home"><h1>Home</h1></a>
					<a class="active" href="Tool.php">TOOLS</a>
					<a class="active" href="borrower.php">BORROWERS</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">		
					<ul class="navbar-nav mr-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="img/ico1.png" width="70" height="50">
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="logout.php">logout</a>
		
								   

							</div>
						</li>			
					</ul>
				</form>
			</div>
	</nav>
	<div class="container">
		<nav aria-label="breadcrumb" role="navigation">
			<div class="col-sm-3">	
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">List of tools</li>
				</ol>
			</div>
		</nav>
	</div>
</br></br>
	<div class="container">
		<table class="table">
			<tr bgcolor='silver'>
			<td>id</td>
			<td>toolname</td>
			<td>quantity</td>
			<td>price</td>
			<td>time_borrowed</td>
			<td>time_returned</td>
			<td>action</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['toolname']."</td>";
			echo "<td>".$res['quantity']."</td>";
			echo "<td>".$res['price']."</td>";
			echo "<td>".$res['time_borrowed']."</td>";
			echo "<td>".$res['time_returned']."</td>";
			echo "<td><a href=\"edittools.php?id=$res[id]\">Edit</a> | <a href=\"deletetools.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
  <tbody>
</table>
<br/>
<a class="btn btn-sm btn-outline-danger" href="addtools.php"><h6>Add Tools</h6></a>
</body>
</html>
