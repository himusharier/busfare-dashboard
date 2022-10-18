<?php
session_start();
if (isset($_SESSION["admin_user_id"]) && isset($_SESSION["admin_username"]) && isset($_SESSION["admin_user_pass"])) {
    include("bkend-calls/admin-dashboardRedirect-check.php");
} else {
    include("configs/database-connection.php");
    include('configs/canonical-link.php');
    include('bkend-calls/admin-siteSettings-checks.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- SEO tags starts -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Admin Login - <?php echo $rowChkSiteName["settingsValue"]; ?></title>
    <link rel="canonical" href="<?php echo $canonical_link; ?>" />
    <!-- // SEO tags ends -->
    <?php
    require ('configs/og-tags.php');
    ?>
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <?php
    echo '<link rel="stylesheet" type="text/css" href="assets/css/admin-login-page-style.css?version=' . filemtime('assets/css/admin-login-page-style.css') . '" />';
    ?>

    <style>
        body {
            /* setup background image */
            background: url("assets/images/login-background.jpg") no-repeat fixed;
            background-size: cover;
            background-position: 50%;
        }
    </style>
</head>

<body>
<!--
<header style="display: none;">
    <div class="header-bg-container">
        <div class="header-main-container">
            <div class="header-site-logo">
                <a href="home"><img src="assets/images/favicon.png" alt="" height="40" /></a>
                <a href="<?php echo $canonical_link; ?>" style="text-decoration: none; color: #1e2039; font-size: 32px; font-family: 'CustomFont';">&nbsp;<?php echo $rowChkSiteName["settingsValue"]; ?></a>
            </div>

        </div>
    </div>
</header>
-->
<main>
    <div class="centering-container">
        <div class="centering-content">
            <div class="form-container">
                <div class="form-top-margin">
                    <img src="assets/images/logo-site.jpg" width="200">
                </div>
            </div>


            <div class="form-container-two">
                <div id="login-form">
                    <div style="opacity: 1 !important; border-bottom: 3px solid #23b14d; margin: 10px auto; margin-bottom: 30px; width: 180px; margin-top: 50px;">
                        <h2 style="margin: 0; font-family: 'CustomFont';"><?php echo $rowChkSiteName["settingsValue"]; ?> Admin</h2>
                    </div>
                    <div class="form">
                        <div id="loginError-message">
                            <div><?php if(isset($_SESSION["admin_login_first_msg"])){echo $_SESSION["admin_login_first_msg"];} ?></div>
                        </div>
                        <div class="form-field-gap">
                            <label>Username</label>
                            <input type="text" name="userName" id="userName" autofocus required>
                        </div>
                        <div class="form-field-gap">
                            <label>Password</label>
                            <input type="password" name="loginPass" id="loginPass" required>
                        </div>
                        <button type="submit" name="login-btn" id="login-btn"><i class="fa fa-sign-in"></i> LOGIN</button>
                        <img style="display: none" src="assets/images/loader.gif" width="28" />
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>


<script type="text/javascript" src="assets/js/jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $("#login-btn").click(function () {
            var userName = $("#userName").val().trim();
            var loginPass = $("#loginPass").val().trim();

            if (userName != "" && loginPass != "") {
                $.ajax({
                    url: 'script/admin_login_script',
                    type: 'POST',
                    data: {
                        userName: userName,
                        loginPass: loginPass
                    },
                    beforeSend: function () {
                        $("#login-btn").html(
                            '<img src="assets/images/loader.gif" width="30" />');
                    },
                    success: function (response) {
                        if (response == 1) {
                            $(".loader-wrapper").fadeIn("fast");
                            $("#login-btn").html(
                                '<img src="assets/images/loader.gif" width="30" />');
                            setTimeout(' window.location.href = "admin/dashboard"; ', 1000);
                        } else {
                            $("#loginError-message").html(response);
                            $("#login-btn").html('<i class="fa fa-sign-in"></i> LOGIN');
                        }
                    }
                });
            } else {
                $("#loginError-message").html(
                    '<div class="error_msg">Username and Password Required!</div>');
            }
        });

    });
</script>


</body>
</html>


<?php
unset($_SESSION["admin_login_first_msg"]);
?>