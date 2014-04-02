<?php
$PageTitle = "Company";
include("header.php");

# x12422 is the what we do site sub navigation page; this doesn't show up in site control like products
$file = "../../x12422.xml";
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
		$SectionName = $Section[0]['Name'];
	   print "<li><a href=\"company_detail.php?ID=" . $Section[0]['ID'] . "\">" . $Section[0]['Name'] . "</a></li>";
       print "<ul id=\"SubNavList\">";
       foreach($Section->Page as $Page) {
		   $PageName = $Page[0]['Name'];
		   print "<!-- :$PageName: -->";
		   if((strcmp($SectionName, "Management Team")) and (strcmp($SectionName, "Board of Directors"))) {
           		print "<li><a href=\"company_detail.php?ID=" . $Page[0]['ID'] . "\">" . $Page[0]['Name'] . "</a></li>";
		   }
       }
       print "</ul></li>";
}
print "</ul>";
include("footer.php");
?>
