<?php

header('Content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, X-Requested-With');
header("Access-Control-Allow-Methods: GET");

require('../../configs/database-connection.php');
require('../../bkend-calls/admin-siteSettings-checks.php');

if($rowApiStatusShow == "Active"){

    // update activity history
    $GetIP = getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR');
    // won't work on local machine. but, on online server it works fine!
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,"http://ip-api.com/json/$GetIP");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    $result=curl_exec($ch);
    $result=json_decode($result);
    if($result->status=='success'){
        $reqLocationCity = $result->city;
        $reqLocationCountry = $result->country;
        $reqIP = $result->query;
    }
    date_default_timezone_set('Asia/Dhaka');
    $reqDate = date('d-m-Y');
    $reqTime = date('g:i:s A');
    $reqPage = "/getbuses";
    $sql_apiActivity = "INSERT INTO api_requests (ipAddress, locationCity, locationCountry, date, time, requestPage) VALUES ('{$reqIP}', '{$reqLocationCity}', '{$reqLocationCountry}', '{$reqDate}', '{$reqTime}', '{$reqPage}')";
    mysqli_query($db, $sql_apiActivity);


    $sql="SELECT * FROM all_buses";
    $result=mysqli_query($db,$sql);
    $count=mysqli_num_rows($result);

    if($count > 0){
        while($row=mysqli_fetch_assoc($result)){

            $getplacedata[] = [
                "busId" => "$row[bus_id]",
                "busNameEn" => "$row[busNameEn]",
                "busNameBn" => "$row[busNameBn]"
            ];

        }
        echo json_encode(['status'=>$rowApiStatusShow,'busData'=>$getplacedata]);

    }else{
        echo json_encode(['status'=>$rowApiStatusShow,'message'=>'no data found!']);
    }

}else{

    echo json_encode(['status'=>$rowApiStatusShow,'message'=>'api is not available!']);
}

?>