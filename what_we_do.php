<?php
$PageTitle = "What We Do";
include("header.php");

# x9885 is the solutions site sub navigation page; this doesn't show up in site control like products
$file = "../../x12402.xml";
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
	   print "<li>" . $Section[0]['Name'];
       print "<ul id=\"SubNavList\">";
       foreach($Section->Page as $Page) {
           print "<li><a href=\"what_we_do_detail.php?ID=" . $Page[0]['ID'] . "\">" . $Page[0]['Name'] . "</a></li>";
       }
       print "</ul></li>";
}
print "</ul>";
include("footer.php");
?>
