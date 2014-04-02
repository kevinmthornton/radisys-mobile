<?php
$PageTitle = "News";
include("header.php");

# x14240 is the site sub nav for press releases
$file = "../../x14240.xml";
if(file_exists($file)) {
	$fp = fopen($file, "r");
	$xmlstr = fread($fp, filesize($file));
} else {
	print "<p>no file: $file</p>";
}

print "<h1 class=\"PageTitle\">$PageTitle</h1>";

# get the base XML node
$SiteSubNav = new SimpleXMLElement($xmlstr);
print "<ul style='list-style-type:disc; ' id=\"NavList\">";
foreach ($SiteSubNav->Navigation->Page as $Page) {
		$PageName = $Page[0]['Name'];
	   print "<li style='margin-bottom:5px;'><a href=\"news_detail.php?ID=" . $Page[0]['ID'] . "\">" . $Page[0]['Name'] . "</a><hr></li>";
}
print "</ul>";
include("footer.php");
?>
