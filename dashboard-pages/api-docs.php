
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
        "placedata": [
            {
                "place-id": "1",
                "placename-en": "Kalshi",
                "placename-bn": "কালশী"
            },
            {
                "place-id": "2",
                "placename-en": "Mirpur-12",
                "placename-bn": "মিরপুর-১২"
            },
            {
                "place-id": "3",
                "placename-en": "Mirpur-10",
                "placename-bn": "মিরপুর-১০"
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
        "routedata": [
            {
                "route-id": "1",
                "routename-en": "A-101",
                "routename-bn": "এ-১০১",
                "route-start-place": "1",
                "route-end-place": "14",
                "route-total-distance": "28.8"
            },
            {
                "route-id": "2",
                "routename-en": "A-102",
                "routename-bn": "এ-১০২",
                "route-start-place": "15",
                "route-end-place": "22",
                "route-total-distance": "16.9"
            },
            {
                "route-id": "3",
                "routename-en": "A-105",
                "routename-bn": "এ-১০৫",
                "route-start-place": "23",
                "route-end-place": "27",
                "route-total-distance": "15.10"
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
        "fare-rate": "2.45",
        "minimum-fare": "10",
        "api-version": "1.0.1",
        "last-update": "27-10-2022",
        "directiondata": [
            {
                "route-id": "1",
                "route-places": ["1","2","3","4","5","6","7","8","9","10","11","12","13","14"],
                "route-distances": ["0.0","2.2","4.7","6.1","6.8","11.4","13.7","15.6","16.6","17.8","18.9","19.9","24.8","28.8"]
            },
            {
                "route-id": "2",
                "route-places": ["15","16","17","18","3","4","6","19","20","21","22"],
                "route-distances": ["0.0","0.4","0.7","1.4","2.3","3.7","9.0","13.2","14.7","15.7","16.9"]
            },
            {
                "route-id": "3",
                "route-places": ["23","2","16","17","18","3","4","5","24","25","26","27"],
                "route-distances": ["0.0","0.9","1.3","1.8","2.3","3.2","4.6","5.3","7.0","10.6","11.1","15.1"]
            }
        ]
    }
        </p>
        <br/>
    </div>



</div>

