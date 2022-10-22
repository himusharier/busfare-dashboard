<?php
session_start();

$entryPersonId = $_SESSION["admin_user_id"];
if (!isset($entryPersonId)) {
    $_SESSION["admin_login_first_msg"] = "<div class='error_msg'>Please, Login First!</div>";
    include ('bkend-calls/admin-logout.php');
    echo "<script type='text/javascript'> document.location = '../login'; </script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    include "../configs/database-connection.php";

    function clean_inputs($data)
    {
        include "../configs/database-connection.php";
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        $data = mysqli_real_escape_string($db, $data);
        return $data;
    }


    $routeNo = clean_inputs($_POST['routeNo']);
    $routeStartPlace = clean_inputs($_POST['routeStartPlace']);
    $routeEndPlace = clean_inputs($_POST['routeEndPlace']);

    $sql_places = "INSERT INTO all_routes (route_no, routeStartPlace, routeEndPlace) VALUES ('{$routeNo}', '{$routeStartPlace}', '{$routeEndPlace}')";

    if (mysqli_query($db, $sql_places)) {

        echo "<div class='reg-form-message-green'><br/><i class='fa fa-check'></i> <b>Place Added Successfully!</b><br/><br/><a href='admin/add-new-route' type='button' onclick='LoaderShow();' name='renew-btn' class='cancel-btn' style='display: inline-block;padding: 10px 20px; border-radius: 4px; margin: 30px 0;'><i class='fa fa-plus'></i> Add Another Place</a></div>";

    } else {
        echo "<div class='reg-form-message-error'><br/><i class='fa fa-close'></i> <b>Sorry, Place Can't Be Added!</b><br/><br/><button type='button' onclick='reTryForm();' name='renew-btn' class='cancel-btn'><i class='fa fa-refresh'></i> Try Again</button></div>";
    }





} else {
    include "../not-found.php";
    exit();
}

?>