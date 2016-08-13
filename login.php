<html>
<head>
<title>Login</title>
<script type="text/javascript">
function setStyle(x)
{
	document.getElementById(x).style.background="#808080";
}
function setDef(x)
{
	document.getElementById(x).style.background="white";
}
</script>
<link rel="stylesheet" href="css/style.css" />

</head>
<body>
<?php
 require('db.php');
 session_start();
 // If form submitted, insert values into the database.
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $username = stripslashes($username);
 $username = mysql_real_escape_string($username);
 $password = stripslashes($password);
 $password = mysql_real_escape_string($password);
 //Checking is user existing in the database or not
 $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
 $result = mysql_query($query) or die(mysql_error());
 $rows = mysql_num_rows($result);
 if($rows==1){
 $_SESSION['username'] = $username;
 header("Location: index.php"); // Redirect user to index.php
 }else{
 echo "<div class='form' align='center'><br/><br/><br/><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
 }
 }else{
?>
<div id="main" class="form" align="center">
<h1 align="center" >Log In</h1>
<form action="" method="post" name="login" align="center">
<input type="text" name="username" placeholder="Username" id="user" onfocus="setStyle(this.id)" onblur="setDef(this.id)" required />
<input type="password" name="password" placeholder="Password" id="pass" onfocus="setStyle(this.id)" onblur="setDef(this.id)" required /><br/>
<input name="submit" type="submit" value="Login" />
</form>
<h4 align="center">Not registered yet? <a href='registration.php'>Register Here</a></h4>
</div>
<?php } ?>
</body>
</html>