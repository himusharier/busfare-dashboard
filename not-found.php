<?php
include ('configs/canonical-link.php');
include ('configs/database-connection.php');
include('bkend-calls/admin-siteSettings-checks.php');

$urlI = $canonical_link;
$urlC = rtrim($canonical_link,"/");

if ($urlI != $urlC) {
    echo "<script type='text/javascript'> document.location = '{$urlC}'; </script>";
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorry, Page Not Found! - <?php echo $rowChkSiteName["settingsValue"]; ?></title>
    <link rel="icon" href="<?php echo $website_link; ?>/assets/images/favicon.png">
    <link rel="stylesheet" href="<?php echo $website_link; ?>/assets/css/font-awesome.min.css">
    <style>

        @font-face {
            font-family: 'CustomFont';
            src: url('<?php echo $website_link; ?>/assets/fonts/Roboto.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'CustomFont', monospace, Arial;
            font-size: 16px;
            background: #FFFFFF !important;
        }

        .main-container {
            background-color: #ffffff;
            max-width: 320px;
            width: 100%;
            height: auto;
            border-radius: 4px;
            padding: 10px 15px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .button {
            background: #1690A7;
            padding: 10px 25px;
            margin-bottom: 20px;
            border: 0px;
            color: #ffffff;
            border-radius: 4px;
            outline: none;
            cursor: pointer;
            font-family: 'CustomFont';
            font-size: 16px;
            margin-top: 30px;
            text-decoration: none;
        }

        .button:hover {
            background: #208296;
            transition: 0.3s;
        }

        .notify {
            border: 1px solid rgba(255, 0, 0, 0.75);
            width: 100%;
            text-align: center;
            margin-top: 0px;
            background-color: rgba(255, 57, 57, 0.20);
            border-radius: 4px;
            color: rgba(255, 0, 0, 0.75);
        }

        .header-bg-container {
            background-color: #1e2039;
            position: relative;
            width: 100%;
            top: 0px;
            z-index: 100;
            box-shadow: 0 2px 4px -1px rgba(0, 0, 0, 0.25);
        }

        .header-main-container {
            max-width: 1200px;
            margin: 0 auto;
            overflow: auto;
            padding: 0 10px;
            color: #1e2039;
            font-size: 16px;
            font-family: 'CustomFont';

            display: flex;
            justify-content: center;
        }

        .header-site-logo {
            margin-top: 5px;
            display: flex;
        }

        .header-site-logo img {
            max-width: 100%;
            margin-top: 3px;
        }



    </style>
</head>

<body>
<div class="header-bg-container">
    <div class="header-main-container">
        <div class="header-site-logo">
            <a href="<?php echo $website_link; ?>/"><img src="<?php echo $website_link; ?>/assets/images/favicon.png" alt="" height="40" /></a>
            <a href="<?php echo $website_link; ?>/" style="text-decoration: none; color: #FFFFFF; font-size: 36px; font-family: 'CustomFont';">&nbsp;<?php echo $rowChkSiteName["settingsValue"]; ?></a>
        </div>
    </div>
</div>

<div class="main-container">

    <div class="notify">
        <i class="fa fa-warning" style="font-size: 32px;padding: 20px 0 0 0;"></i>
        <h3>Sorry, Page Not Found!</h3>
    </div>
    <br/><br/><br/><br/>
    <div style="text-align: center;">
        <a href="<?php echo $website_link; ?>/" class="button"><i class="fa fa-home"></i> Go To Homepage</a>
    </div>

</div>


</body>
</html>