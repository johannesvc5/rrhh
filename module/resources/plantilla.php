<?php
	require '../../../fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../../../img/logo.png', 20, 6, 15 );
			$this->SetFont('Arial','B',14);
			$this->Cell(30);
			$this->Cell(130,10,utf8_decode('FICHA DE REPORTE DE SERVICIO MILITAR - RRHH'),0,0,'C');
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

	class PDF2 extends FPDF
	{
		function Header()
		{
			$this->Image('../../../img/logo.png', 20, 6, 15 );
			$this->SetFont('Arial','B',14);
			$this->Cell(30);
			$this->Cell(130,10,utf8_decode('FICHA DE REPORTE DE DISCAPACIDAD - RRHH'),0,0,'C');
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
	class PDF3 extends FPDF
	{
		function Header()
		{
			$this->Image('../../../img/logo.png', 20, 6, 15 );
			$this->SetFont('Arial','B',14);
			$this->Cell(30);
			$this->Cell(130,10,utf8_decode('FICHA DE REPORTE FAMILIAR - RRHH'),0,0,'C');
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
	class PDF4 extends FPDF
	{
		function Header()
		{
			$this->Image('../../../img/logo.png', 20, 6, 15 );
			$this->SetFont('Arial','B',14);
			$this->Cell(30);
			$this->Cell(130,10,utf8_decode('FICHA DE REPORTE ETAPA DE VIDA - RRHH'),0,0,'C');
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
	class PDF5 extends FPDF
	{
		function Header()
		{
			$this->Image('../../../img/logo.png', 20, 6, 15 );
			$this->SetFont('Arial','B',14);
			$this->Cell(30);
			$this->Cell(130,10,utf8_decode('FICHA DE REPORTE DE CONDICIÓN LABORAL - RRHH'),0,0,'C');
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

	class PDF6 extends FPDF
	{
		function Header()
		{
			$this->Image('../../../img/logo.png', 20, 6, 15 );
			$this->SetFont('Arial','B',14);
			$this->Cell(30);
			$this->Cell(130,10,utf8_decode('FICHA DE REPORTE SEGÚN DEPENDENCIA - RRHH'),0,0,'C');
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
	class PDF7 extends FPDF
	{
		function Header()
		{
			$this->Image('../../../img/logo.png', 20, 6, 15 );
			$this->SetFont('Arial','B',14);
			$this->Cell(30);
			$this->Cell(130,10,utf8_decode('FICHA DE REPORTE ESPECIFICA DE LABORES - RRHH'),0,0,'C');
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
	class PDF8 extends FPDF
	{
		function Header()
		{
			$this->Image('../../../img/logo.png', 20, 6, 15 );
			$this->SetFont('Arial','B',14);
			$this->Cell(30);
			$this->Cell(130,10,utf8_decode('FICHA DE REPORTE POR GRADO - RRHH'),0,0,'C');
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
	class PDF9 extends FPDF
	{
		function Header()
		{
			$this->Image('../../../img/logo.png', 20, 6, 15 );
			$this->SetFont('Arial','B',14);
			$this->Cell(30);
			$this->Cell(130,10,utf8_decode('FICHA DE REPORTE POR PROFESIÓN - RRHH'),0,0,'C');
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
	class PDF10 extends FPDF
	{
		function Header()
		{
			$this->Image('../../../img/logo.png', 20, 6, 15 );
			$this->SetFont('Arial','B',14);
			$this->Cell(30);
			$this->Cell(130,10,utf8_decode('FICHA DE REPORTE POR PROFESIÓN Y GRADO ACADÉMICO - RRHH'),0,0,'C');
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