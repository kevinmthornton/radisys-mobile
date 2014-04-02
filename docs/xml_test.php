<html>
<head>
<title>start XML</title>
</head>
<body>
<p>starting XML parse</p>
<?php
# file data. xID wil be passed in
$xID = "x5800";
$file = $xID . ".xml";
$fp = fopen($file, "r");
$xmlstr = fread($fp, filesize($file));

# simple XML example on how to reference
$xml = new SimpleXMLElement($xmlstr);

foreach ($xml->xpath('//xPower') as $xPower) {
    #print $xPower->Description . '<br />';
}
$Description = $xml->xpath('/ProductDetailPage/xPower/Description');
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
?>

<p>end XML</p>
</html>