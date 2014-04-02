<?php
# $SolutionDetail gives you the root element
# product section file
$SolutionID = $_REQUEST['ID'];
$file = "../../" . $SolutionID . ".xml";
if(file_exists($file)) {
	$fp = fopen($file, "r");
	$SolutionSectionstr = fread($fp, filesize($file));
} else {
	print "<p>no file: $file</p>";
}

# get the base XML node; get all the XML first so we can get the title correct
$SolutionDetail = new SimpleXMLElement($SolutionSectionstr);

$PageTitle = $SolutionDetail->Title;
include("header.php"); 

print "<h1 class=\"PageTitle\">$PageTitle</h1>";
print "<div id=\"content\">"; # this will end in the footer.php file

# make sure all images go from root /
$BodyCopy = str_replace("Images","/Images", $SolutionDetail->BodyCopy);
$BodyCopy = str_replace("Â"," ", $BodyCopy);
# strip out <a href=> tags but, allow p, ul, li, h2 --> any others?
echo strip_tags($BodyCopy, '<p><ul><li><h2><h3><strong><img>'); 

include("footer.php");
?>
