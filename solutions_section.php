<?php
$PageTitle = "Solutions";
include("header.php");

# $SolutionSection gives you the root element
# product section file
$SolutionSectionID = $_REQUEST['ID'];
$file = "../../" . $SolutionSectionID . ".xml";
if(file_exists($file)) {
	$fp = fopen($file, "r");
	$SolutionSectionstr = fread($fp, filesize($file));
} else {
	print "<p>no file: $file</p>";
}

print "<h1 class=\"PageTitle\">$PageTitle</h1>";

# get the base XML node
$SolutionSection = new SimpleXMLElement($SolutionSectionstr);

print "<ul id=\"NavList\">";
foreach ($SolutionSection->Navigation->Page as $Section) {
	print "<li>" . $Section[0]['Title'];
	print "<ul id=\"SubNavList\">";
	foreach($Section->Page as $Page) {
		print "<li><a href=\"product_detail.php?ID=" . $Page[0]['ID'] . "\">" . $Page[0]['Title'] . "</a></li>";
	}
	print "</ul></li>";
}
print "</ul>";
include("footer.php");
?>
