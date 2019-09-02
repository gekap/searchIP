<?php

include('searchFunc.php');

$mysqli = new mysqli('localhost', 'gkapell', 'kapellak1s!', 'ipLocation');
$getResults = $_GET['id'];

//$getResults='4.0.0.37';

if (filter_var($getResults, FILTER_VALIDATE_IP)) {
	$getIP = $getResults;
}
else {
	$getIP = gethostbyname($getResults);
}

//Validate IP 

$val_IP = validateIP($getIP);

if ($val_IP === True) {
	
	$resultProxy = $mysqli->query('SELECT * FROM ip2proxy_px8 WHERE inet_aton("' . $getIP . '") between ip_from AND ip_to LIMIT 1');

	if ($resultProxy->num_rows > 0 && $rowProxy['proxy_type'] == "") {
		$rowProxy = $resultProxy->fetch_assoc();
		echo "<table STYLE='color: #41FF00;table-layout: auto;' align=center width=100%>";
		echo "<tr><td align=left>IP Address is: </td><td align=right>". $rowProxy['proxy_type'] . " proxy</td>";
        echo "<tr><td align=left>Country Name: </td><td align=right>" . $rowProxy['country_name'] . "(" . $rowProxy['country_code'].")</td>";
        echo "<tr><td align=left>Region Name: </td><td align=right>" . $rowProxy['region_name'] . "</td>";
        echo "<tr><td align=left>City Name: </td><td align=right>" . $rowProxy['city_name'] . "</td>";
        echo "<tr><td align=left>ISP: </td><td align=right>" . $rowProxy['isp'] . "</td>";
        echo "<tr><td align=left>Domain: </td><td align=right>" . $rowProxy['domain'] . "</td>";
        echo "<tr><td align=left>Usage Type: </td><td align=right>" . $rowProxy['usage_type'] . "</td>";
        echo "<tr><td align=left>AS: </td><td align=right>" . $rowProxy['as'] . "</td>";
        echo "<tr><td align=left>Last Seen: </td><td align=right>" . $rowProxy['last_seen'] . "</td>";
        echo "</table>";
	}else {
		
		$resultIP = $mysqli->query('SELECT * from ip2location_db11_ipv6 WHERE inet_aton("' . $getIP . '") between ip_from AND ip_to LIMIT 1');
		$rowIP = $resultIP->fetch_assoc();
		echo "<table STYLE='color: #41FF00; table-layout: auto;' align=center width=100%>";
		echo "<tr><td align=left>IP Address: </td><td align=right>" . $getIP . "</td>";
		echo "<tr><td align=left>Country: </td><td align=right>" . $rowIP['country_name']. "(" . $rowIP['country_code'].")</td>";
		echo "<tr><td align=left>City name: </td><td align=right>" . $rowIP['city_name'] ."</td>";
		echo "<tr><td align=left>Coordinates: </td><td align=right> <a href=\"https://maps.google.com/maps?q=" . $rowIP['latitude'] . "," . $rowIP['longitude'] . "\" title='Check on google maps'>" 
		. $rowIP['latitude'] . " - ". $rowIP['longitude'] . "</a></td>";
		echo "</table>";
		}
	}
?>
