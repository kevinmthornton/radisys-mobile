<?php
$PageTitle = "Solutions";
include("header.php");

# x9885 is the solutions site sub navigation page; this doesn't show up in site control like products
$file = "../../x9885.xml";
if(file_exists($file)) {
	$fp = fopen($file, "r");
	$xmlstr = fread($fp, filesize($file));
} else {
	print "<p>no file: $file</p>";
}

print "<h1 class=\"PageTitle\">$PageTitle</h1>";

# get the base XML node
$SiteSubNav = new SimpleXMLElement($xmlstr);
print "<ul id=\"NavList\">";
foreach ($SiteSubNav->Navigation->Page as $Section) {
	   # embedded has no sub pages so we have to fake it	       
	   print "<li><a href=\"solution_detail.php?ID=" . $Section[0]['ID'] . "\">" . $Section[0]['Name'] . "</a></li>";
}
print "</ul>";
include("footer.php");
?>
