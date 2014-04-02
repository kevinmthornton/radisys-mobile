</div> <!-- end content -->
<div id="FooterNav">
	<ul>
    	<li><a href="index.php">Home</a></li>
        <li><a href="company.php">Company</a></li>
        <li><a href="products.php">Products</a></li>
    </ul>
</div>
<p id="Legal">&copy;2012 Radisys Corporation All Rights Reserved</p>
</body>
</html>
<?php 
# this will get all the products in a list 
# not as usefull but a different way to do it
/*
foreach ($ProductSection->xpath('/ProductSection/Navigation/Page/Page/@NavName') as $PageName) {
	print " &nbsp; Page: $PageName <br/>";
}
*/

exit();

/*
foreach ($xml->xpath('/SiteControl/xPower[@CompTypes="ProductSectionComponent"]') as $ProductSection) {
	print "product section id is " . $ProductSection->attributes['CompTypes'] . " <br/>";
}

foreach ($xml->xPower as $xPower) {
	print $xPower['CompTypes'] . " comp type <br/>";
}

$Description = $xml->xpath('/SiteControl/ProductSection/Page');
$PDFDescription =  $Description[0];

print $xml->Title;
print "<p><br/></p>";
print $PDFDescription;

print "<p><br/></p>";

# using a more indepth method
$depth = array();

function startElement($parser, $name, $attrs) {
    global $depth;
    for ($i = 0; $i < $depth[$parser]; $i++) {
        echo "  ";
    }
    echo "$name\n<br/>";
    $depth[$parser]++;
}

function endElement($parser, $name) {
    global $depth;
    $depth[$parser]--;
}

$xml_parser = xml_parser_create();
xml_set_element_handler($xml_parser, "startElement", "endElement");
if (!($fp = fopen($file, "r"))) {
    die("could not open XML input");
}

while ($data = fread($fp, 4096)) {
    if (!xml_parse($xml_parser, $data, feof($fp))) {
        die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
    }
}
xml_parser_free($xml_parser);
*/

?>