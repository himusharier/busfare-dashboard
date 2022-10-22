<?php
session_start();

$entryPersonId = $_SESSION["admin_user_id"];
if (!isset($entryPersonId)) {
    $_SESSION["admin_login_first_msg"] = "<div class='error_msg'>Please, Login First!</div>";
    include ('bkend-calls/admin-logout.php');
    echo "<script type='text/javascript'> document.location = '../login'; </script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['placeID']) && !isset($_POST['delete-btn'])) {

    include "../configs/database-connection.php";

    $placeID = $_POST['placeID'];

    function clean_inputs($data)
    {
        include "../configs/database-connection.php";
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        $data = mysqli_real_escape_string($db, $data);
        return $data;
    }

    $placeNameEn1 = clean_inputs($_POST['placeNameEn1']);
    $placeNameBn1 = clean_inputs($_POST['placeNameBn1']);

    $sql = "UPDATE all_places SET placeNameEn='$placeNameEn1', placeNameBn='$placeNameBn1' WHERE (place_id='$placeID')";

        if (mysqli_query($db, $sql)) {

            echo "<div class='reg-form-message-green'><br/><i class='fa fa-check'></i> <b>Place Updated Successfully!</b><br/><br/><a href='admin/see-place-list' type='button' onclick='LoaderShow();' name='renew-btn' class='cancel-btn' style='display: inline-block;padding: 10px 20px; border-radius: 4px; margin: 30px 0;'><i class='fa fa-arrow-left'></i> See Place List</a></div>
                    
                    ";

        } else {
            echo "<div class='reg-form-message-error'><br/><i class='fa fa-close'></i> <b>Place Can't Be Updated!</b><br/><br/><button type='button' onclick='reTryForm();' name='renew-btn' class='cancel-btn'>Try Again</button></div>
                    ";
        }


} else {
    include "../not-found.php";
    exit();
}

?>