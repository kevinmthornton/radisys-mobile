<?php
# $ProductDetail gives you the root element
# product section file
$ProductID = $_REQUEST['ID'];
$file = "../../" . $ProductID . ".xml";
if(file_exists($file)) {
	$fp = fopen($file, "r");
	$ProductSectionstr = fread($fp, filesize($file));
} else {
	print "<p>no file: $file</p>";
}

# get the base XML node; get all the XML first so we can get the title correct
$ProductDetail = new SimpleXMLElement($ProductSectionstr);

$PageTitle = $ProductDetail->Title;
include("header.php"); 

print "<h1 class=\"PageTitle\">$PageTitle</h1>";
print "<div id=\"content\">"; # this will end in the footer.php file

print "<h2 class=\"SubTitle\">" . $ProductDetail->SubTitle . "</h2>";
if ($ProductDetail->MediumThumbnail != '' && $ProductDetail->MediumThumbnail != 'icons/solutions/icon_blank.gif') {
	print "<img class=\"ProductThumbnail\" src=\"/Images/" . $ProductDetail->MediumThumbnail . "\" Width=\"140\" Height=\"70\">";
}

# take out all links
$Description = strip_tags($ProductDetail->Description, '<p><ul><li><h2><h3><strong><img>'); 

print str_replace("Images","/Images", $Description);

include("footer.php");
?>
