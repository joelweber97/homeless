<?php
require("db.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$connection=mysqli_connect ($hostname, $username, $passwd, $dbname);
if (!$connection) {
  die('Not connected : ' . mysqli_error());
}


// Select all the rows in the markers table
$query = "SELECT * FROM markers WHERE 1";
$result = mysqli_query($connection, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");
// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'age="' . parseToXML($row['age']) . '" ';
  echo 'gender="' . parseToXML($row['gender']) . '" ';
  echo 'activity="' . parseToXML($row['activity']) . '" ';
  echo 'date="' . $row['date'] . '" ';
  echo 'latitude="' . $row['latitude'] . '" ';
  echo 'longitude="' . $row['longitude'] . '" ';
  echo 'location="' . $row['location'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>