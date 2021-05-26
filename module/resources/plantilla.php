<?php
	require '../../../fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../../../img/logo.png', 15, 5, 15 );
			$this->SetFont('Arial','B',14);
			$this->Cell(30);
			$this->Cell(130,10,utf8_decode('FICHA DE REPORTES DE SERVICIO MILITAR'),0,0,'C');
			$this->Cell(30,10,'',0,1,'L'); 
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
	
?>