<?php

include('Connection.php');
session_start();
  if(!isset($_SESSION['userid'])){
      # redirect to the login page
      header('Location: index.php?msg=' . urlencode('Login first.'));
      exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>home</title>
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
<div class="header">
</div>
<div class="topnav">
  <form action="check.php" method="POST" class="formright">
    <input type="submit" name="logout" value="LOGOUT" >
  </form>
</div>
<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>welcome <?php echo $_SESSION["userid"]; ?></h2>
        <div class="fakeimg fakeimg2">
          <form action="view.php" method="POST" class="viewbtn">
           <input type="submit" value="ViewData" name="view">
          </form>
          <!--View data -->

      </div>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h3>Follow</h3>
</div>
</div>
</div>
<div class="foot"> <h2>Footer</h2>
</div>
</body>
</html>
