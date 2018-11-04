<?php

  require("package/PHPMailer/src/PHPMailer.php");
  require("package/PHPMailer/src/SMTP.php");
  require('result.php');
$conn = mysqli_connect("localhost", "root","","users");
$result = $conn->query("SELECT * from mail");
while($row = mysqli_fetch_array($result)){
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->Username = "necoffical@gmail.com";
    $mail->Password = "neccse2019";
    $mail->SetFrom("no-reply@howcode.org");
    $mail->Subject = fetch_details($row['Register_number']);
    $mail->Body = fetch_data($row['Register_number']);
    $mail->AddAddress($row['mail']);
    $mail->Send();
  }
       echo'<script language="javascript">';
       echo'alert("All Mail has been sent")';
       echo'</script>';
?>
