<?php

# $SupportDetail gives you the root element
# product section file
$SupportID = $_REQUEST['ID'];
$file = "../../" . $SupportID . ".xml";
if(file_exists($file)) {
	$fp = fopen($file, "r");
	$SupportSectionstr = fread($fp, filesize($file));
} else {
	print "<p>no file: $file</p>";
}

# if this is the first link to x14272, the Services Support page, we want to display this text instead
if($SupportID == 'x14272') {
	$PageTitle = 'Support';
	include("header.php"); 
	?>
	<p>
Radisys back its products with long lifecycle support and service offerings, for you to effeciently plan and deploy RadiSys products.
We have the tools to help you lower your total costs to market and bring solutions to your customers &mdash; faster.
</p>
<p>
<strong>Support:</strong> <a href="tel:1-503-615-1640">(503) 615&ndash;1640</a><br/>
<strong>Support Toll Free:</strong> <a href="tel:1-866-385-6167">(866) 385&ndash;6167</a>
</p>
<?php 
} else {

	# get the base XML node; get all the XML first so we can get the title correct
	$SupportDetail = new SimpleXMLElement($SupportSectionstr);
	
	$PageTitle = $SupportDetail->Title;
	include("header.php"); 
	print "<h1 class=\"PageTitle\">$PageTitle</h1>";
	print "<div id=\"content\">"; # this will end in the footer.php file
	
	# make sure all images go from root /
	$BodyCopy = str_replace("Images","/Images", $SupportDetail->BodyCopy);
	$BodyCopy = str_replace("Â"," ", $BodyCopy);
	# strip out <a href=> tags but, allow p, ul, li, h2 --> any others?
	echo strip_tags($BodyCopy, '<p><ul><li><h2><h3><strong><img><br>'); 
}

include("footer.php");
?>
