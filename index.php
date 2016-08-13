<?php include("auth.php"); //include auth.php file on all secure pages ?>
<html>
<head>
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="form">
<h2 align="center"><br/>Welcome <?php echo $_SESSION['username']; ?>!</h2>
</div>
 <div class="nav">
      <ul>
        <li class="home"><a class="active" href="index.php">Home</a></li>
        <li class="tutorials"><a href="uploader.php">Upload</a></li>
        <li class="about"><a href="dashboard.php">Dashboard</a></li>
        <li class="news"><a href="logout.php">Logout</a></li>
      </ul>
    </div>
</body>
</html>