<?php

include "configs/database-connection.php";

$sql_queryChkSiteName = "SELECT * FROM site_settings WHERE (settingsTitle = 'siteName')";
$resultChkSiteName = mysqli_query($db, $sql_queryChkSiteName);
$countChkSiteName = mysqli_num_rows($resultChkSiteName);
$rowChkSiteName = mysqli_fetch_assoc($resultChkSiteName);
$rowChkSiteNameShow = $rowChkSiteName["settingsValue"];

?>