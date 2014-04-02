<?php
# $CompanyDetail gives you the root element
# product section file
$CompanyID = $_REQUEST['ID'];
$file = "../../" . $CompanyID . ".xml";
if(file_exists($file)) {
	$fp = fopen($file, "r");
	$CompanySectionstr = fread($fp, filesize($file));
} else {
	print "<p>no file: $file</p>";
}

# get the base XML node; get all the XML first so we can get the title correct
$CompanyDetail = new SimpleXMLElement($CompanySectionstr);

$PageTitle = $CompanyDetail->Title;
include("header.php"); 

print "<h1 class=\"PageTitle\">$PageTitle</h1>";
print "<div id=\"content\">"; # this will end in the footer.php file

# does this havea Body Copy section? if not, use Top Box Copy
if($CompanyDetail->BodyCopy != "" ) {
	# strip out <a href=> tags but, allow p, ul, li, h2 --> any others?
	$BodyCopy =  strip_tags($CompanyDetail->BodyCopy, '<p><ul><li><h2><h3><strong><img>'); 
} else {
	$BodyCopy =  strip_tags($CompanyDetail->TopBoxCopy, '<p><ul><li><h2><h3><strong><img>'); 
}

print str_replace("Images","/Images", $BodyCopy);

include("footer.php");
?>
