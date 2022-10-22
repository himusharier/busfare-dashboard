<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    include "../configs/database-connection.php";

    if (isset($_POST["userName"]) && isset($_POST["loginPass"])) {

        $userName = strip_tags($_POST['userName']);
        $userName = htmlspecialchars($userName);
        $userName = mysqli_real_escape_string($db, $userName);

        $loginPass = strip_tags($_POST['loginPass']);
        $loginPass = htmlspecialchars($loginPass);
        $loginPass = mysqli_real_escape_string($db, $loginPass);

        if ($userName != "" && $loginPass != "") {

            $sql_query = "SELECT * FROM user_admin WHERE username='$userName'";
            $result = mysqli_query($db, $sql_query);
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);

            if ($userName == $row['username']) {

                //$verify = password_verify($loginPass, $row['password']);
                if ($loginPass == $row['password']) {

                    if ($row["activation_status"] == "active") {

                        $_SESSION["admin_user_id"] = $row['user_id'];
                        $_SESSION["admin_username"] = $userName;
                        $_SESSION["admin_user_pass"] = $loginPass;
                        $_SESSION["admin_role"] = $row['role'];

                        $GetIP = getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR');
                        // won't work on local machine. but, on online server it works fine!
                        $ch=curl_init();
                        curl_setopt($ch,CURLOPT_URL,"http://ip-api.com/json/$GetIP");
                        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                        $result=curl_exec($ch);
                        $result=json_decode($result);
                        if($result->status=='success'){
                            $lastLocation = $result->city;
                            $lastIP = $result->query;
                        }

                        date_default_timezone_set('Asia/Dhaka');
                        $lastLogin = date('d-m-Y; g:i:s A');
                        $pr1Sql = "UPDATE user_admin SET last_ip='$lastIP', last_login='$lastLogin', last_location='$lastLocation' WHERE (user_id='{$row['user_id']}')";
                        mysqli_query($db, $pr1Sql);

                        echo 1;
                        exit();

                    } else {
                        echo "<div class='error_msg'>Access Revoked!</div>";
                        exit();
                    }

                } else {
                    echo "<div class='error_msg'>Incorrect Password!</div>";
                    exit();
                }

            } else {
                echo "<div class='error_msg'>Incorrect Username!</div>";
            }

        } else {
            echo "<div class='error_msg'>Fill the Form Correctly!</div>";
            exit();
        }

    }


    if (!isset($_POST["userName"]) && !isset($_POST["loginPass"])) {
        exit();
    }


} else {
    include "../not-found.php";
    exit();
}


?>