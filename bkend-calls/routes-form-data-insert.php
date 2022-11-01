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
    $routeTotalDistance = clean_inputs($_POST['routeTotalDistance']);

    $sql_routes = "INSERT INTO all_routes (route_no, routeStartPlace, routeEndPlace, routeDistance) VALUES ('{$routeNo}', '{$routeStartPlace}', '{$routeEndPlace}', '{$routeTotalDistance}')";

    if (mysqli_query($db, $sql_routes)) {

        $lastRouteId = mysqli_insert_id($db);

        $n = clean_inputs($_POST['box_count']);
        for ($i = 1; $i <= $n; $i++) {
            if (!empty($_POST['busName'.$i])) {

                $busName = clean_inputs($_POST['busName'.$i]);

                $sql_buses = "INSERT INTO all_routes_bus_list (route_id, bus_no) VALUES ('{$lastRouteId}', '{$busName}')";

                if (mysqli_query($db, $sql_buses)) {
                    $sql_status = 'done';
                } else {
                    $sql_status = 'fail';
                }

            }
        }


    } else {
        $sql_status = 'fail';
    }


    if ($sql_status == 'done') {

        echo "<div class='reg-form-message-green'><br/><i class='fa fa-check'></i> <b>Route Added Successfully!</b><br/><br/><a href='admin/add-new-route' type='button' onclick='LoaderShow();' name='renew-btn' class='cancel-btn' style='display: inline-block;padding: 10px 20px; border-radius: 4px; margin: 30px 0;'><i class='fa fa-plus'></i> Add Another Route</a></div>";

    } else {
        echo "<div class='reg-form-message-error'><br/><i class='fa fa-close'></i> <b>Sorry, Route Can't Be Added!</b><br/><br/><button type='button' onclick='reTryForm();' name='renew-btn' class='cancel-btn'><i class='fa fa-refresh'></i> Try Again</button></div>";
    }





} else {
    include "../not-found.php";
    exit();
}

?>