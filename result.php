<?php
  session_start();
  $username = $_SESSION['username'];
function fetch_details($username){
$output1 = '';
  $conn = mysqli_connect("localhost", "root", "", "users");
  $login=$conn->query("SELECT * from users where Register_number = '$username'");
  if($row=$login->fetch_assoc()){
    $output1 .= '<h4>REGISTER NO:'.$row["Register_number"].'   NAME:'.$row["student_name"].'</h4>';
  }
  return $output1;
}
 function fetch_data($username)
 {
      $output = '';
      $conn = mysqli_connect("localhost", "root", "", "users");
      $sql = "SELECT * FROM users where Register_number = '$username'";
      $login=$conn->query("SELECT * from users where Register_number = '$username'");
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result))
      {
      $output .= '<tr>
                          <td>'.$row["Course_Code"].'</td>
						              <td>'.$row["Course"].'</td>
						              <td>'.$row["lg"].'</td>
						              <td>'.$row["Result"].'</td>
                     </tr>
                          ';
      }
      return $output;
 }
 if(isset($_POST["generate_pdf"]))
 {
      require_once('package/tcpdf.php');

      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);
      $obj_pdf->SetTitle("RESULT");
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
      $obj_pdf->SetDefaultMonospacedFont('helvetica');
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '50', PDF_MARGIN_RIGHT,'50');
      $obj_pdf->setPrintHeader(false);
      $obj_pdf->setPrintFooter(false);
      $obj_pdf->SetAutoPageBreak(TRUE, 30);
      $obj_pdf->SetFont('helvetica', '', 11);
      $obj_pdf->AddPage();
      $content = '';
      $content .= '<h1 align="center">Nandha Engineering College,<br />Erode.</h1><br />';
      $content .= fetch_details($username);
      $content .= '
      <table  border="1"  cellspacing="0" cellpadding="3" >

           <tr >
                <th width="15%">Code</th>
                <th width="20%">Subject</th>
								<th width="10%">Grade</th>
								<th width="10%">Result</th>
           </tr>


      ';
      $content .= fetch_data($username);
      $content .= '</table>';
      $obj_pdf->writeHTML($content);
      $obj_pdf->Output('file.pdf', 'I');
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
    <th width="10%">Code</th>
    <th width="20%">Subject</th>
		<th width="5%">Grade</th>
	  <th width="5%">Result</th>
  </tr>
  <?php
  echo fetch_details($username);
  echo fetch_data($username);
  ?>
</table>
<p><form method="post">
  <center><input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" /></center>
</form></p>
<form method="post" action="excel.php" >
  <br><center><input type="submit" name="excel" class="btn btn-sucess" value="Generate Excel"></center>
</form>
<p><form method="post" action="cgpa-Calculator/index.html">
  <center><input type="submit" name="Calculate your CGPA" class="btn btn-success" value="Calculate your CGPA" /></center>
</form></p>
</body>
</html>
