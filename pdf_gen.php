<?php
session_start();
$con = mysqli_connect('localhost','root','','building_data');
$email = $_SESSION['semail'];
$query = "SELECT * from transaction where email='$email'";
$run = mysqli_query($con,$query);
require('FPDF/fpdf.php');
class PDF extends FPDF
{   
	function Header()
	{
		$this->SetFont('Arial','B',15);
    	// Move to the right
    	$this->Cell(80);
    	// Title
    	$this->Cell(30,10,'Binary House PVT',0,0,'C');
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
	$pdf->Cell(10);
	$pdf->SetFont('Arial','B',11,0,'C');
	$pdf->Cell(20,10,'Id',1,0,'C');
	$pdf->Cell(50,10,'Payment Id',1,0,'C');
	$pdf->Cell(30,10,'Receipt',1,0,'C');
	$pdf->Cell(50,10,'Payment Date',1,0,'C');
	$pdf->Cell(20,10,'Amount',1,1,'C');

	while($row = mysqli_fetch_assoc($run)){
		$pdf->Cell(10);
		$pdf->SetFont('Arial','',11,0,'C');
		$pdf->Cell(20,10,$row['pay_id'],1,0,'C');
		$pdf->Cell(50,10,$row['payment_id'],1,0,'C');
		$pdf->Cell(30,10,$row['orderReceipt'],1,0,'C');
		$pdf->Cell(50,10,$row['created_at'],1,0,'C');
		$pdf->Cell(20,10,$row['Amount'],1,1,'C');
	}

	$pdf->Output();

?>