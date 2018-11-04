<?php
session_start();
$username = $_POST["regno"];
$password = $_POST["password"];
$conn = mysqli_connect("localhost", "root","","users");
$result = $conn->query("SELECT * from users where Register_number = '$username' and DOB = '$password'");
$row = mysqli_fetch_array($result);
if($username == 'admin' && $password == 'admin'){
  header('Location:adminInner.php');
}else if($row['Register_number'] == $username && $row['DOB'] == $password){
 $_SESSION['username'] = $username;
 header('Location:result.php');
exit();
}else{
  echo'<script language="javascript">';
  echo'alert("Inavalid Username or Password")';
  echo'</script>';
  header('Location:login.php');
  }
 ?>
