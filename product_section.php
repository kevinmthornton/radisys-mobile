<?php
$PageTitle = "Products";
include("header.php");

# $ProductSection gives you the root element
# product section file
$ProductSectionID = $_REQUEST['ID'];
$file = "../../" . $ProductSectionID . ".xml";
if(file_exists($file)) {
	$fp = fopen($file, "r");
	$ProductSectionstr = fread($fp, filesize($file));
} else {
	print "<p>no file: $file</p>";
}

print "<h1 class=\"PageTitle\">$PageTitle</h1>";

# get the base XML node
$ProductSection = new SimpleXMLElement($ProductSectionstr);

print "<ul id=\"NavList\">";
foreach ($ProductSection->Navigation->Page as $Section) {
	# for the trillium pages, Brian wants top level sections only
	if($ProductSectionID == 'x12075') {
		print "<li><a href=\"product_detail.php?ID=" . $Section[0]['ID'] . "\">" . $Section[0]['Title'] . "</a></li>";
	} else {
		print "<li>" . $Section[0]['Title'];
		print "<ul id=\"SubNavList\">";
		foreach($Section->Page as $Page) {
			print "<li><a href=\"product_detail.php?ID=" . $Page[0]['ID'] . "\">" . $Page[0]['Title'] . "</a></li>";
		}
		print "</ul></li>";
	}
}
print "</ul>";
include("footer.php");
?>
