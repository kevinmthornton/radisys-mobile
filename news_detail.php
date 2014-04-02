<?php
# $NewsDetail gives you the root element
# product section file
$NewsID = $_REQUEST['ID'];
$file = "../../" . $NewsID . ".xml";
if(file_exists($file)) {
	$fp = fopen($file, "r");
	$NewsSectionstr = fread($fp, filesize($file));
} else {
	print "<p>no file: $file</p>";
}

# get the base XML node; get all the XML first so we can get the title correct
$NewsDetail = new SimpleXMLElement($NewsSectionstr);

$PageTitle = $NewsDetail->Title;
include("header.php"); 

print "<h1 class=\"PageTitle\">$PageTitle</h1>";
print "<div id=\"content\">"; # this will end in the footer.php file

# strip out <a href=> tags but, allow p, ul, li, h2 --> any others?
$BodyCopy =  strip_tags($NewsDetail->BodyCopy, '<p><ul><li><h2><h3><strong><img>'); 
$BodyCopy = str_replace("Â"," ", $BodyCopy);
print str_replace("Images","/Images", $BodyCopy);

include("footer.php");
?>
