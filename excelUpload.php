
<?php
require('package/library/php-excel-reader/excel_reader2.php');
require('package/library/SpreadsheetReader.php');

$dbHost = "localhost";
$dbDatabase = "users";
$dbPasswrod = "";
$dbUser = "root";
$mysqli = new mysqli($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
print_r($_FILES);
if(isset($_POST['Submit']))
{
    $mimes = array('application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    if(in_array($_FILES["file"]["type"],$mimes))
    {
        $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);

		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
        $Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());
        echo "You have total ".$totalSheet." sheets".

		$html="<table border='1'>";
        $html.="<tr><th>Title</th><th>Description</th></tr>";

		/* For Loop for all sheets */
        for($i=0;$i<$totalSheet;$i++)
        {
            $Reader->ChangeSheet($i);
            foreach ($Reader as $Row)
            {

                $Register_number = isset($Row[0]) ? $Row[0] : '';
				$student_name = isset($Row[1]) ? $Row[1] : '';
				$DOB = isset($Row[2]) ? $Row[2] : '';
				$Degree_Branch = isset($Row[3]) ? $Row[3] : '';
				$Course_Code= isset($Row[4]) ? $Row[4] : '';
				$Result= isset($Row[5]) ? $Row[5] : '';
				$lp = isset($Row[6]) ? $Row[6] : '';
				$gp = isset($Row[7]) ? $Row[7] : '';



				$query = "insert into users(Register_number,student_name,DOB,Degree_Branch,Course_Code,Result,lp,gp)
				values('" . $Register_number . "','" . $student_name  . "','" . $DOB . "','" . $Degree_Branch  . "','" . $Course_Code . "','" .$Result . "','" .$lp  . "','" . $gp  . "')";
                $mysqli->query($query);
            }
        }
        $html.="</table>";

            echo "<br />Data Inserted in dababase";
        }
        else
        {
            die("<br/>Sorry, File type is not allowed. Only Excel file.");
        }
        header('Location:show.php');
}
?>
