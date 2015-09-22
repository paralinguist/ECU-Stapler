<?php
require('fpdf.php');

$unit_code = "ECU1234";
$unit_title = wordwrap("18th Century Agrarian Business", 25);
$unit_title1 = explode("\n", $unit_title)[0];
$unit_title2 = explode("\n", $unit_title)[1];
$first_name = "Buster";
$family_name = "Bluth";
$student_id = "12345678";
$lecturer = "Lucille Austero";
$topic = "Concerns about an uprising";
//TODO: Dates need to be in DD/MM/YYYY format
$due_date = date('Y-m-j');
$tutorial = "Tuesdays, 0930, with G.O.B.";
$course = "Diploma of Inapplicable Studies";
$campus = "ML";
//Let's be realistic - this is going to be the same as the due date
$date_submitted = $due_date;

//TODO: Proper validation, I guess
if (isset($_POST['unit-code']))
{
  $unit_code = $_POST['unit-code'];
  $unit_title1 = $_POST['unit-title'];
  $unit_title2 = '';
  if (strlen($unit_title1) > 25)
  {
    $unit_title = explode("\n", wordwrap($unit_title1, 25));
    $unit_title1 = $unit_title[0];
    $unit_title2 = $unit_title[1];
  }
  $first_name = $_POST['first-name'];
  $family_name = $_POST['family-name'];
  $student_id = $_POST['student-id'];
  $lecturer = $_POST['lecturer'];
  $topic = $_POST['assignment-topic'];
  $due_date = $_POST['due-date'];
  $tutorial = $_POST['tutorial'];
  $course = $_POST['course'];
  $campus = $_POST['campus'];
  //Let's be realistic - this is going to be the same as the due date
  $date_submitted = $_POST['date-submitted']; 
}

$files_uploaded = '';

if (isset($_POST['files-uploaded']))
{
  $files_uploaded = $_POST['files-uploaded'];
}

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
$pdf->Image('ecu_cover1.png',7,12,200);
//Unit code
$pdf->Text(13.5,64, $unit_code);
//Unit name line 1
$pdf->Text(40,64, $unit_title1);
//Unit name line 2
$pdf->Text(40,68.5, $unit_title2);
//Family name
$pdf->Text(90.5,64, $family_name);
//First name
$pdf->Text(131,64, $first_name);
//Student ID
$pdf->Text(179,68.5, $student_id);
//Lecturer
$pdf->Text(13.5,85, $lecturer);
//Due Date
$pdf->Text(179,85, $due_date);
//Topic
$pdf->Text(13.5,101, $topic);
//Tutorial
$pdf->Text(13.5,116, $tutorial);
//Course
$pdf->Text(91,116, $course);
//Campus
$pdf->Text(179,116, $campus);
//Date signed
$pdf->Text(135,214.5, $date_submitted);
$pdf->AddPage();
$pdf->Image('ecu_cover2.png',10,15,190);
$cover_pdf = uniqid('cover-');
$temp_dir = '../private';
$pdf->Output("$temp_dir/$cover_pdf");

//Some code here is taken from http://www.johnboy.com/blog/merge-multiple-pdf-files-with-php - props!

//Because the extra "ue" would be 2 chars too many? Really, php?
$stapled_file = "$temp_dir/" . uniqid('assignment-') . '.pdf';

$documents = "$cover_pdf $files_uploaded";
$document_array = explode(' ', $documents);
//TODO: Messy file structure. Fix this.
passthru("cd $temp_dir;pdftk $documents output ../web/$stapled_file");

header('Content-type: application/pdf');
readfile($stapled_file);

//Delete the final document - I don't want it, you don't want me to have it
unlink($stapled_file);
foreach($document_array as $document)
{
  //Delete each uploaded document and the generated cover
  if($document)
  {
    unlink("$temp_dir/$document");
  }
}

?>
