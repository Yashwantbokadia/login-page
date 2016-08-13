<?php include("auth.php"); //include auth.php file on all secure pages ?>
<?php
$username=$_SESSION['username'];
if(isset($_FILES['file'])){
	$file=$_FILES['file'];
	$file_name = $file['name'];
	$file_tmp = $file['tmp_name'];
	$file_size = $file['size'];
	$file_error = $file['error'];
	$file_ext = explode('.',$file_name);
	$file_ext = strtolower(end($file_ext));
	$allowed = array('txt','jpg','css');
	if(in_array($file_ext,$allowed)){
		if($file_error===0){
			
		$file_destination = 'C:/xampp/htdocs/My Project/uploads/'.$username.'/'.$file_name;
		if(move_uploaded_file($file_tmp,$file_destination))
		{   
			include('alert.html');
			
		}	
	 }
	}
	}
?>
<html>
<head>
<title>Upload File</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
 <div class="nav">
      <ul>
        <li class="home"><a href="index.php">Home</a></li>
        <li class="tutorials"><a class="active" href="uploader.php">Upload</a></li>
        <li class="about"><a href="dashboard.php">Dashboard</a></li>
        <li class="news"><a href="logout.php">Logout</a></li>
      </ul>
    </div>
<div id="main">
<h2 align="center">Upload file here</h2>
<center>
<form align="center" action="uploader.php" method="post" enctype="multipart/form-data">
<input align="center" type="file" name="file" >
<input align="center" type="submit" value="upload">
</center>
</form>
</div>
</body>
</html>