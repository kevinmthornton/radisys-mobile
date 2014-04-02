<?php
$PageTitle = "What We Do";
include("header.php");

# $WhatWeDoSection gives you the root element
# product section file
$WhatWeDoSectionID = $_REQUEST['ID'];
$file = "../../" . $WhatWeDoSectionID . ".xml";
if(file_exists($file)) {
	$fp = fopen($file, "r");
	$WhatWeDoSectionstr = fread($fp, filesize($file));
} else {
	print "<p>no file: $file</p>";
}

print "<h1 class=\"PageTitle\">$PageTitle</h1>";

# get the base XML node
$WhatWeDoSection = new SimpleXMLElement($WhatWeDoSectionstr);

print "<ul id=\"NavList\">";
foreach ($WhatWeDoSection->Navigation->Page as $Section) {
	print "<li>" . $Section[0]['Title'];
	print "<ul id=\"SubNavList\">";
	foreach($Section->Page as $Page) {
		print "<li><a href=\"what_we_do_detail.php?ID=" . $Page[0]['ID'] . "\">" . $Page[0]['Title'] . "</a></li>";
	}
	print "</ul></li>";
}
print "</ul>";
include("footer.php");
?>
