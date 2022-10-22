<?php

include "configs/database-connection.php";

$sql_queryChkSiteName = "SELECT * FROM site_settings WHERE (settingsTitle = 'siteName')";
$resultChkSiteName = mysqli_query($db, $sql_queryChkSiteName);
$countChkSiteName = mysqli_num_rows($resultChkSiteName);
$rowChkSiteName = mysqli_fetch_assoc($resultChkSiteName);
$rowChkSiteNameShow = $rowChkSiteName["settingsValue"];

$sql_ApiStatus = "SELECT * FROM site_settings WHERE (settingsTitle = 'apiStatus')";
$resultApiStatus = mysqli_query($db, $sql_ApiStatus);
$countApiStatus = mysqli_num_rows($resultApiStatus);
$rowApiStatus = mysqli_fetch_assoc($resultApiStatus);
$rowApiStatusShow = $rowApiStatus["settingsValue"];

$sql_FairRate = "SELECT * FROM site_settings WHERE (settingsTitle = 'fairRate')";
$resultFairRate = mysqli_query($db, $sql_FairRate);
$countFairRate = mysqli_num_rows($resultFairRate);
$rowFairRate = mysqli_fetch_assoc($resultFairRate);
$rowFairRateShow = $rowFairRate["settingsValue"];

?>