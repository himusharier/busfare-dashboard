<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit-btn'])) {

    $n = 5;
    for($i=1;$i<=$n;$i++) {
        $updateSql = "UPDATE site_settings SET settingsValue='{$_POST['settingsValue'.$i]}' WHERE (settingsType ='api' AND id='{$_POST['settingsID'.$i]}')";
        if (mysqli_query($db, $updateSql)) {

            echo "<script type='text/javascript'> document.location = 'admin/settings'; </script>";
        } else {
            echo "<script type='text/javascript'> document.location = 'admin/settings'; </script>";
        }
    }


}
?>

<script>
    document.title = 'API Settings - <?php echo $rowChkSiteName["settingsValue"]; ?>';
</script>

<div class="content-body-main-div">

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / API Settings /</p>

    <form id="settings-form-data" method="post" enctype="multipart/form-data" onsubmit="LoaderShow()">
    <div class="dashboard-table-container" style="margin-bottom: 25px;margin-top: 0px;">
        <p class="dashboard-table-container-heading" style="background: rgba(91, 134, 229, 0.9);"><i class="fa fa-cog"></i> API Settings</p>
        <div class="dashboard-table-container-div">

            <table class="responstable2 responstable2x" style="display: inline-block; margin-bottom: 0px;">
                <tbody>
                <tr>
                    <td>API Status</td>
                    <td>
                        <select id="settingsValue1" name="settingsValue1">
                            <option value="<?php echo $rowApiStatusShow; ?>" selected hidden><?php echo $rowApiStatusShow; ?></option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                        <input type="hidden" name="settingsID1" id="settingsID1" value="2">
                    </td>
                </tr>
                <tr>
                    <td>API Version</td>
                    <td>
                        <input type="text" name="settingsValue2" id="settingsValue2" value="<?php echo $rowApiVersionShow; ?>">
                        <input type="hidden" name="settingsID2" id="settingsID2" value="3">
                    </td>
                </tr>
                <tr>
                    <td>Fare Rate (Per KM)</td>
                    <td>
                        <input type="text" name="settingsValue3" id="settingsValue3" value="<?php echo $rowFairRateShow; ?>">
                        <input type="hidden" name="settingsID3" id="settingsID3" value="4">
                    </td>
                </tr>
                <tr>
                    <td>Minimum Fare</td>
                    <td>
                        <input type="text" name="settingsValue4" id="settingsValue4" value="<?php echo $rowMinimumFareShow; ?>">
                        <input type="hidden" name="settingsID4" id="settingsID4" value="5">
                    </td>
                </tr>
                <tr>
                    <td>Last Update Date</td>
                    <td>
                        <input type="text" name="settingsValue5" id="settingsValue5" value="<?php echo $rowLastInfoUpdateShow; ?>">
                        <input type="hidden" name="settingsID5" id="settingsID5" value="6">
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
        <button style="margin-left: 10px;margin-top: 0;margin-bottom: 20px;" type="submit" name="submit-btn" id="submit-btn"><i class="fa fa-save"></i> Save Settings</button>
    </div>
    </form>


</div>


<?php


?>

