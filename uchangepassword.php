<?php
 session_start();
 include"database.php";
 
 if(!isset($_SESSION["id"]))
	 {
		header("location:ulogin.php");
	 }
	
	 ?>


<!DOCTYPE HTML>
<html>
<head>
<title>E-Library</title>
<link rel="stylesheet" type="text/css" href="css/style">
</head>
<body>
<div id="container">
<div id="header">
<h1 id="heading">E-Library Management System</h1>
</div>
<div id="wrapper">
<h3>Change Password</h3>
<div id="center">
<?php
if(isset($_POST["submit"]))
{
	$sql="select*from student where pass='{$_POST["opass"]}' and id='{$_SESSION["id"]}'";
	$res=$db->query($sql);
	if($res->num_rows>0)
	{
		$s="update student set pass='{$_POST["npass"]}' where id=".$_SESSION["id"];
		$db->query($s);
		echo "<p class='success'>Password Changed Success</p>";
	}
	else
	{
		echo "<p class='error'>Invalid Password</P>";
    } 
}
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<label><b>Old Password  : </b></label>
<input type="password" name="opass" required>
<label><b>New Password  : </b></label>
<input type="password" name="npass" required>
<button type="submit" name="submit">Update Password</button>
</form>
</div>
</div>
<div id="navigator">
<?php
include"user.php";
?>
</div>
<div id="footer">
<p>Copyright &copy;PRATHIBA G</p>
</div>
</div>
</body>
</html>
