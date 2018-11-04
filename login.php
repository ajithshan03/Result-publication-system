<!DOCTYPE html>
<html>
<head>
  <title>Login page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <center><h1>Nandha Engineering College, Erode.</h1></center>
  <div id="frm">
    <form action="process.php" method="POST">
      <p>
        <label>Username:</label>
        <input type="text" id="regno" name="regno"/>
      </p>
      <p>
        <label>Password:</label>
        <input type="password" id="password" name="password" />
      </p>
        <input type="submit" id="btn" value="login"/>
      </p>
    </form>
  </div>
</body>
</html>
