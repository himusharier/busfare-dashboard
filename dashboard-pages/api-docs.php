
<script>
    document.title = 'API Documentation - <?php echo $rowChkSiteName["settingsValue"]; ?>';
</script>

<style>
    .link {
        color: #e83e8c;
        font-family: monospace;
        font-size: 16px;
        word-wrap: break-word;
        text-decoration: none;
    }
    .api-doc-container-div {
        font-family: CustomFont;
        margin-top: 50px;
    }
</style>

<div class="content-body-main-div">

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / API Documentation /</p>


    <div class="api-doc-container-div">
        <h3><u>Get all place data:</u></h3>
        <br/>
        <p>URL: <a class="link" href="<?php echo $website_link; ?>/api/v1/getplaces" target="_blank"><?php echo $website_link; ?>/api/v1/getplaces <i class="fa fa-external-link"></i></a></p>
        <p style="white-space: pre;font-family: monospace;font-size: 12px;background-color: #F5F5F5;color: #000;padding: 5px;border-radius: 7px;overflow: auto;margin-top: 10px;">
    {
        "status": "Active",
        "placeData": [
            {
                "placeId": "1",
                "placeNameEn": "Kalshi",
                "placeNameBn": "কালশী"
            },
            {
                "placeId": "2",
                "placeNameEn": "Mirpur-12",
                "placeNameBn": "মিরপুর-১২"
            },
            {
                "placeId": "3",
                "placeNameEn": "Mirpur-10",
                "placeNameBn": "মিরপুর-১০"
            }
        ]
    }
        </p>
        <br/>
    </div>

    <div class="api-doc-container-div">
        <h3><u>Get all Bus data:</u></h3>
        <br/>
        <p>URL: <a class="link" href="<?php echo $website_link; ?>/api/v1/getbuses" target="_blank"><?php echo $website_link; ?>/api/v1/getbuses <i class="fa fa-external-link"></i></a></p>
        <p style="white-space: pre;font-family: monospace;font-size: 12px;background-color: #F5F5F5;color: #000;padding: 5px;border-radius: 7px;overflow: auto;margin-top: 10px;">
    {
        "status": "Active",
        "busData": [
            {
                "busId": "1",
                "busNameEn": "Achim Paribahan",
                "busNameBn": "অসীম পরিবহণ"
            },
            {
                "busId": "2",
                "busNameEn": "Agradut",
                "busNameBn": "অগ্রদূত"
            },
            {
                "busId": "3",
                "busNameEn": "Airport Bangabandhu Avenue Transport",
                "busNameBn": "এয়ারপোর্ট বঙ্গবন্ধু এভিনিউ ট্রান্সপোর্ট"
            }
        ]
    }
        </p>
        <br/>
    </div>

    <div class="api-doc-container-div">
        <h3><u>Get all route data:</u></h3>
        <br/>
        <p>URL: <a class="link" href="<?php echo $website_link; ?>/api/v1/getroutes" target="_blank"><?php echo $website_link; ?>/api/v1/getroutes <i class="fa fa-external-link"></i></a></p>
        <p style="white-space: pre;font-family: monospace;font-size: 12px;background-color: #F5F5F5;color: #000;padding: 5px;border-radius: 7px;overflow: auto;margin-top: 10px;">
    {
        "status": "Active",
        "routeData": [
            {
                "routeId": "1",
                "routeNameEn": "A-101",
                "routeNameBn": "এ-১০১",
                "routeStartPlace": "1",
                "routeEndPlace": "14",
                "routeTotalDistance": "28.8"
                "busId": ["1","2","3"]
            },
            {
                "routeId": "2",
                "routeNameEn": "A-102",
                "routeNameBn": "এ-১০২",
                "routeStartPlace": "15",
                "routeEndPlace": "22",
                "routeTotalDistance": "16.9"
                "busId": ["3","4","5"]
            },
            {
                "routeId": "3",
                "routeNameEn": "A-105",
                "routeNameBn": "এ-১০৫",
                "routeStartPlace": "23",
                "routeEndPlace": "27",
                "routeTotalDistance": "15.10"
                "busId": ["5","6","7"]
            }
        ]
    }
        </p>
        <br/>
    </div>

    <div class="api-doc-container-div">
        <h3><u>Get all direction data:</u></h3>
        <br/>
        <p>URL: <a class="link" href="<?php echo $website_link; ?>/api/v1/getdirections" target="_blank"><?php echo $website_link; ?>/api/v1/getdirections <i class="fa fa-external-link"></i></a></p>
        <p style="white-space: pre;font-family: monospace;font-size: 12px;background-color: #F5F5F5;color: #000;padding: 5px;border-radius: 7px;overflow: auto;margin-top: 10px;">
    {
        "status": "Active",
        "fareRate": "2.45",
        "minimumFare": "10",
        "apiVersion": "1.0.1",
        "lastUpdate": "27-10-2022",
        "directionData": [
            {
                "routeId": "1",
                "routePlaces": ["1","2","3","4","5","6","7","8","9","10","11","12","13","14"],
                "routeDistances": ["0.0","2.2","4.7","6.1","6.8","11.4","13.7","15.6","16.6","17.8","18.9","19.9","24.8","28.8"]
            },
            {
                "routeId": "2",
                "routePlaces": ["15","16","17","18","3","4","6","19","20","21","22"],
                "routeDistances": ["0.0","0.4","0.7","1.4","2.3","3.7","9.0","13.2","14.7","15.7","16.9"]
            },
            {
                "routeId": "3",
                "routePlaces": ["23","2","16","17","18","3","4","5","24","25","26","27"],
                "routeDistances": ["0.0","0.9","1.3","1.8","2.3","3.2","4.6","5.3","7.0","10.6","11.1","15.1"]
            }
        ]
    }
        </p>
        <br/>
    </div>



</div>

