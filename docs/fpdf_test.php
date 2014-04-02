<?php
# grab the XML data and plug this into variables for writing out to the PDF file
# file data. xID wil be passed in
# compare to: http://www.radisys.com/Products/COM-Express/COM-Express-Modules/Procelerant-Z500.html?print=true
# to test: http://66.116.110.236/radisysdevstaging/prebuilt/pdfgen/fpdf_test.php
$xID = "x5800";
$file = $xID . ".xml";
$fp = fopen($file, "r");
$xmlstr = fread($fp, filesize($file));

# simple XML example on how to reference
$xml = new SimpleXMLElement($xmlstr);


$PDFTitle =  $xml->Title;
#$PDFSubTitle =  preg_replace("/Â/i"," ",$xml->SubTitle);
$PDFSubTitle =  preg_replace("/[^A-Za-z0-9_®™]/i"," ",$xml->SubTitle);

$Description = $xml->xpath('/ProductDetailPage/xPower/Description');
$PDFDescription =  strip_tags($Description[0]);
#  now create the pdf with the information
require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
# put in the top image
$pdf->Image('datasheet-artwork.gif',10,10,190);
# block to cover the image and put line down
$pdf->Cell(190,80,'',0,2);

#$pdf->Cell(0,0,"$PDFTitle",1,2);
#$pdf->Cell(0,0,"$PDFSubTitle",1,2);
$pdf->SetFont('Arial','B',16);
$pdf->SetTextColor(205,50,0);
$pdf->Write(7,$PDFTitle);
$pdf->Ln(5); # line break
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(105,95,85);
$pdf->Write(7,$PDFSubTitle);
$pdf->Ln(5); # line break
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Write(7,$PDFDescription);

$pdf->Output();
?> 