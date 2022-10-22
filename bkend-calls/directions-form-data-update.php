<?php
session_start();

$entryPersonId = $_SESSION["admin_user_id"];
if (!isset($entryPersonId)) {
    $_SESSION["admin_login_first_msg"] = "<div class='error_msg'>Please, Login First!</div>";
    include ('bkend-calls/admin-logout.php');
    echo "<script type='text/javascript'> document.location = '../login'; </script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['directionID']) && !isset($_POST['delete-btn'])) {

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

    $directionID = clean_inputs($_POST['directionID']);


    $n = clean_inputs($_POST['box_count']);
    for($i=1;$i<=$n;$i++) {
        if (isset($_POST['placeName'.$i]) && isset($_POST['placeDistance'.$i]) && isset($_POST['directionFieldId'.$i])) {

            $directionFieldID = clean_inputs($_POST['directionFieldId'.$i]);
            $placeName = clean_inputs($_POST['placeName'.$i]);
            $placeDistance = clean_inputs($_POST['placeDistance'.$i]);

            $pr1Sql = "UPDATE all_directions SET direction_place='$placeName', direction_distance='$placeDistance' WHERE (direction_route='$directionID' AND direction_id='$directionFieldID')";

            if (mysqli_query($db, $pr1Sql)) {
                $sql_status = 'done';
            } else {
                $sql_status = 'fail';
            }

        }

    }


    if ($sql_status == 'done') {

        echo "<div class='reg-form-message-green'><br/><i class='fa fa-check'></i> <b>Directions Updated Successfully!</b><br/><br/><a href='admin/see-direction-list' type='button' onclick='LoaderShow();' name='renew-btn' class='cancel-btn' style='display: inline-block;padding: 10px 20px; border-radius: 4px; margin: 30px 0;'><i class='fa fa-arrow-left'></i> See Direction List</a></div>
                    
                    ";

    } else {
        echo "<div class='reg-form-message-error'><br/><i class='fa fa-close'></i> <b>Directions Can't Be Updated!</b><br/><br/><button type='button' onclick='reTryForm();' name='renew-btn' class='cancel-btn'>Try Again</button></div>
                    ";
    }




} else {
    include "../not-found.php";
    exit();
}

?>