<?php

header('Content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, X-Requested-With');

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
    $reqPage = "/getroutes";
    $sql_apiActivity = "INSERT INTO api_requests (ipAddress, locationCity, locationCountry, date, time, requestPage) VALUES ('{$reqIP}', '{$reqLocationCity}', '{$reqLocationCountry}', '{$reqDate}', '{$reqTime}', '{$reqPage}')";
    mysqli_query($db, $sql_apiActivity);


    $sql="SELECT * FROM all_routes";
    $result=mysqli_query($db,$sql);
    $count=mysqli_num_rows($result);

    if($count > 0){

        function banglaNumber($englishToBangla) {
            $englishNum=array("0","1","2","3","4","5",'6',"7","8","9","-","A");
            $banglaNum=array("০","১","২","৩","৪","৫",'৬',"৭","৮","৯","-","এ");
            return str_replace($englishNum,$banglaNum,$englishToBangla);
        }

        while($row=mysqli_fetch_assoc($result)){

            $routeNameBn = banglaNumber($row['route_no']);

            $getroutedata[] = [
                "routeId" => "$row[route_id]",
                "routeNameEn" => "$row[route_no]",
                "routeNameBn" => "$routeNameBn",
                "routeStartPlace" => "$row[routeStartPlace]",
                "routeEndPlace" => "$row[routeEndPlace]",
                "routeTotalDistance" => "$row[routeDistance]"
            ];

        }
        echo json_encode(['status'=>$rowApiStatusShow,'routeData'=>$getroutedata]);

    }else{
        echo json_encode(['status'=>$rowApiStatusShow,'message'=>'no data found!']);
    }

}else{

    echo json_encode(['status'=>$rowApiStatusShow,'message'=>'api is not available!']);
}

?>