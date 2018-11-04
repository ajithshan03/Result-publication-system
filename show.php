<?php
function fetch_details(){
  $output = '';
  $conn = mysqli_connect("localhost", "root", "", "users");
  $login="SELECT * from users";
  $result = mysqli_query($conn, $login);
  while($row = mysqli_fetch_array($result)){
    $output .='<tr>
                        <td>'.$row["Register_number"].'</td>
                        <td>'.$row["student_name"].'</td>
                        <td>'.$row["DOB"].'</td>
                        <td>'.$row["Degree_Branch"].'</td>
                        <td>'.$row["Course"].'</td>
                        <td>'.$row["Course_Code"].'</td>
                        <td>'.$row["Result"].'</td>
                        <td>'.$row["lg"].'</td>
                        <td>'.$row["gp"].'</td>
                   </tr>
                         ';
  }
  return $output;
}

 ?>
 <!DOCTYPE html>
  <html>
  <head>
    <title>Student Result</title>
 </head>
 <body>
 <br />
 <div >
   <h1 align="center">Nandha Engineering College,<br />Erode.</h1><br />
 </div>
 <br/><br/>
 <table border=2px>
   <tr>
     <th width="10%">Register_number</th>
     <th width="20%">student_name</th>
 		<th width="5%">DOB</th>
 	  <th width="5%">Degree_Branch</th>
    <th width="5%">Course</th>
    <th width="5%">Course_Code</th>
    <th width="5%">Result</th>
    <th width="5%">lp</th>
    <th width="5%">gp</th>
   </tr>
   <?php
   echo fetch_details();
   ?>
 </table>
 </body>
 </html>
