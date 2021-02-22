<?php
// Connection 

$conn=mysql_connect('localhost','rooter','admin');
$db=mysql_select_db('alcamoreport',$conn);

$filename = "Webinfopen.xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
$user_query = mysql_query('SELECT  FROM city_report');
// Write data to file
$flag = false;
while ($row = mysql_fetch_assoc($user_query)) {
if (!$flag) {
// display field/column names as first row
echo implode("\t", array_keys($row)) . "\r\n";
$flag = true;
}
echo implode("\t", array_values($row)) . "\r\n";
}
?>
