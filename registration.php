<html>
<head>
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/styles.css">
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
</head>
<body>
<?php
 require('db.php');
 // If form submitted, insert values into the database.
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $section = $_POST['section'];
 $username = stripslashes($username);
 $username = mysql_real_escape_string($username);
 $email = stripslashes($email);
 $email = mysql_real_escape_string($email);
 $password = stripslashes($password);
 $password = mysql_real_escape_string($password);
 $trn_date = date("Y-m-d H:i:s");
 $query = "INSERT into `users` (username, password, email,section, trn_date) VALUES ('$username', '".md5($password)."', '$email','$section', '$trn_date')";
 $result = mysql_query($query);
 if($result){
	 mkdir('C:/xampp/htdocs/My Project/uploads/'.$username, 0777);
 echo "<div class='form'><br/><br/><br/><br/><h3>You are registered successfully.</h3>Click here to <a href='login.php'>Login</a></div>";
 }
 }else{
?>
<div class="form" id="main">

<h2 align="center">Registration Form</h2>
<span>* Set your username in format of firstname_lastname</span>
<form name="registration" action="" method="post" align="center">
<input type="text" name="username" placeholder="Username" id="user" onfocus="setStyle(this.id)" onblur="setDef(this.id)" required />
<input type="email" name="email" placeholder="Email" id="mail" onfocus="setStyle(this.id)" onblur="setDef(this.id)" required />
<input type="password" name="password" placeholder="Password" id="pass" onfocus="setStyle(this.id)" onblur="setDef(this.id)" required />
<input type="text" name="section" placeholder="Section" id="section" style='text-transform:uppercase' onfocus="setStyle(this.id)" onblur="setDef(this.id)" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>