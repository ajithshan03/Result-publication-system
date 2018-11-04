<?php
require 'result.php';
$connect=mysqli_connect("localhost","root","","users");
$output='';
if(isset($_POST["excel"]))
{
  $sql="SELECT * from users where Register_number = '$username'";
  $result=mysqli_query($connect,$sql);
  if(mysqli_num_rows($result) > 0)
  {
    $output .= '
    <table class="table" bordered="1">
    <tr>
    <th width="15%">Code</th>
    <th width="20%">Subject</th>
    <th width="10%">Grade</th>
    <th width="10%">Result</th>
                   </tr>
    ';
    while($row=mysqli_fetch_array($result))
    {
      $output .= '<tr>
      <td>'.$row["Course_Code"].'</td>
      <td>'.$row["Degree_Branch"].'</td>
      <td>'.$row["lp"].'</td>
      <td>'.$row["Result"].'</td>
                     </tr>
      ';
    }
    $output .='</table>';
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=file.xls');
    echo $output;
  }
}
 ?>
