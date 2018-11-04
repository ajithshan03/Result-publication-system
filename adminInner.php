<?php
    $dbHost = "localhost";
    $dbDatabase = "users";
    $dbPasswrod = "";
    $dbUser = "root";
    $mysqli = new mysqli($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Excel Uploading PHP</title>

   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container" >
  <center><h1>NANDHA ENGINEERING COLLEGE,</h1></center>
  <center><h1>ERODE.</h1></center>

    <h2>Excel Upload</h2>

	<form method="POST" action="excelUpload.php" enctype="multipart/form-data">
        <div class="form-group" id="excel">
            <label>Upload Excel File:</label>
            <input type="file" name="file" class="form-control">
        </div>
        <center>
        <div class="form-group">
            <button type="submit" name="Submit" class="btn btn-success">Upload</button>
        </div>
        <center>
    </form>
</div>
<form method="post" action="mail.php" >
  <div id="mail">
  <br><center><input type="submit" name="mailer" value="Mail to everyone" id="btn"></center>
</div>
</form>
</body>
</html>
