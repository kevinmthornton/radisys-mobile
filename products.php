<?php
$PageTitle = "Product Categories";
include("header.php");
# site control - this page will get all the product categories
$file = "../../x11951.xml";
if(file_exists($file)) {
	$fp = fopen($file, "r");
	$xmlstr = fread($fp, filesize($file));
} else {
	print "<p>no file: $file</p>";
}

print "<h1 class=\"PageTitle\">$PageTitle</h1>";

# simple XML example on how to reference
$xml = new SimpleXMLElement($xmlstr);
print "<ul id=\"NavList\">";
# this will get the product section component xID's
foreach ($xml->xpath('/Products/xPower[@CompTypes="ProductSection"]/@Component') as $ProductSectionID) {
	#print "product section id is $ProductSectionID <br/>";
	# open up this file and read it's title
	$ProductComponentFile = "../../" . $ProductSectionID . ".xml";
	if(file_exists($ProductComponentFile)) {
		$fp = fopen($ProductComponentFile, "r");
		$ProductFile = fread($fp, filesize($ProductComponentFile));
	} else {
		print "<p>no file: $file</p>";
	}	
	$ProductXML = new SimpleXMLElement($ProductFile);
	# the first page is the section
	$Section = $ProductXML->Page;
	
	print "<li><a href=\"product_section.php?ID=$ProductSectionID\">" . $Section[0]['Title'] . "</a> </li>"; 
	# $Page[0]['ID'] - these page ID's don't contain the sub pages like the product section components so, I pass that xID along instead
}
print "</ul>";
include("footer.php");
?>