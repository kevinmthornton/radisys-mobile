<?php

# no id passed so, print out the first page
$PageTitle = "Support";
include("header.php");
print "<h1 class=\"PageTitle\">$PageTitle</h1>";
# support sub nav menu
$file = "../../x14297.xml";
if(file_exists($file)) {
	$fp = fopen($file, "r");
	$xmlstr = fread($fp, filesize($file));
} else {
	print "<p>no file: $file</p>";
}

# get the base XML node
$SiteSubNav = new SimpleXMLElement($xmlstr);
print "<ul id=\"NavList\">";
foreach ($SiteSubNav->Page as $Page) {
	   # we use Link here because these are pages dropped into the nav
	   print "<li><a href=\"support_detail.php?ID=" . $Page[0]['ID'] . "\">" . $Page[0]['Link'] . "</a></li>";
}
print "</ul>";
    include("footer.php");
?>