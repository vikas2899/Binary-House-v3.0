<?php
session_start();
$con = mysqli_connect('localhost','root','','building_data');
$id = $_SESSION['order_id'];
$email = $_SESSION['semail'];
$query = "SELECT * from transaction where order_id='$id'";
$run = mysqli_query($con,$query);
$query1 = "SELECT NAME from student_table where EMAIL = '$email'";
$run1 = mysqli_query($con,$query1);
while($row = mysqli_fetch_assoc($run1)){
	$name = $row['NAME'];
}
require('FPDF/fpdf.php');
class PDF extends FPDF
{   
	function Header()
	{
		$this->SetFont('Times','B',15);
    	$this->Cell(80);
    	$this->SetFillColor(118,22,111);
        $this->Rect(5, 3, 200, 29, 'F');
    	$this->SetTextColor(225,225,225);
    	$this->Cell(30,10,'Binary House PVT',0,1,'C');
    	$this->SetFont('Times','I',15);
    	$this->Cell(80);
    	$this->Cell(30,10,'Invoice',0,1,'C');
    	// Line break
    	$this->Ln(20);
	}	
	function Footer()
	{
 		$this->SetY(-15);
    	// Arial italic 8
    	$this->SetFont('Arial','I',8);
    	// Page number
    	$this->Cell(0,10,"This is a computer generated report. Kindly contact Binary House PVT's admin in case of any query.",0,0,'C');
	}
}
	$pdf = new PDF();
	$pdf->AddPage();
	while($row = mysqli_fetch_assoc($run)){
		$payment_id = $row['payment_id'];
		$order_no = $row['orderReceipt'];
		$amount = $row['Amount'];
		$date = $row['created_at'];
	}	
	$pdf->Cell(10);
	$pdf->SetFont('Times','B',12,0,'C');
	$pdf->Cell(20,10,"Customer's Name : ",0,0,'C');
	$pdf->Cell(10);
	$pdf->SetFont('Times','',12,0,'C');
	$pdf->Cell(20,10,$name,0,1,'C');

	$pdf->Cell(5);
	$pdf->SetFont('Times','B',12,0,'C');
	$pdf->Cell(20,10,"Payment ID : ",0,0,'C');
	$pdf->Cell(30);
	$pdf->SetFont('Times','',12,0,'C');
	$pdf->Cell(20,10,$payment_id,0,1,'C');

	$pdf->Cell(8);
	$pdf->SetFont('Times','B',12,0,'C');
	$pdf->Cell(20,10,"Order Number : ",0,0,'C');
	$pdf->Cell(13);
	$pdf->SetFont('Times','',12,0,'C');
	$pdf->Cell(20,10,$order_no,0,1,'C');

	$pdf->Cell(6);
	$pdf->SetFont('Times','B',12,0,'C');
	$pdf->Cell(20,10,"Amount Paid : ",0,0,'C');
	$pdf->Cell(15);
	$pdf->SetFont('Times','',12,0,'C');
	$pdf->Cell(20,10,"Rs. ".$amount."/-",0,1,'C');

	$pdf->Cell(9);
	$pdf->SetFont('Times','B',12,0,'C');
	$pdf->Cell(20,10,"Date of Payment : ",0,0,'C');
	$pdf->Cell(21);
	$pdf->SetFont('Times','',12,0,'C');
	$pdf->Cell(20,10,$date,0,1,'C');
    $pdf->Ln(15);

    $pdf->Image('tick.png',10,110,20,20);
    $pdf->Cell(60);
    $pdf->SetFont('Times','B',12,0,'C');
	$pdf->Cell(30,10,"Payment is successfully transferred to Binary House PVT.",0,0,'C');


	$pdf->Output();

?>