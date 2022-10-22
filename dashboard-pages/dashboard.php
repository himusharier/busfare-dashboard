
<script>
    document.title = 'Admin Dashboard - <?php echo $rowChkSiteName["settingsValue"]; ?>';
</script>

<div class="content-body-main-div">

    <p class="page-direction"><i class="fa fa-link"></i> Admin Dashboard /</p>

    <div class="admin-dashboard-content-div">

        <p style="color: #5e5e5e;border-bottom:1px solid #5e5e5e;font-size: 28px;margin-top: 25px;font-family: CustomFont;">Welcome, <?php echo $rowChk['full_name']; ?></p>


        <div style="margin-top: 25px;">
            <div class="dashboard-element-body">
                <div class="dashboard-card-1">
                    <h3>
                        Total Places:
                        <a href="admin/see-place-list" style="text-decoration: none; color: #024457;font-size: 18px;margin-bottom: 20px;display: inline-block;"><i class="fa fa-external-link"></i></a>
                    </h3>
                    <?php
                    $sqlp = "SELECT * FROM all_places";
                    $resultp = mysqli_query($db, $sqlp);
                    $countp = mysqli_num_rows($resultp);
                    if ($countp <= 0) {
                        $countp = 0;
                    }
                    ?>
                    <p style="font-size: 32px; font-family: CustomFont;"><?php echo $countp; ?></p>
                </div>
            </div>
            <div class="dashboard-element-body">
                <div class="dashboard-card-1">
                    <h3>
                        Total Routes:
                        <a href="admin/see-route-list" style="text-decoration: none; color: #024457;font-size: 18px;margin-bottom: 20px;display: inline-block;"><i class="fa fa-external-link"></i></a>
                    </h3>
                    <?php
                    $sqlpr = "SELECT * FROM all_routes";
                    $resultpr = mysqli_query($db, $sqlpr);
                    $countpr = mysqli_num_rows($resultpr);
                    if ($countpr <= 0) {
                        $countpr = 0;
                    }
                    ?>
                    <p style="font-size: 32px; font-family: CustomFont;"><?php echo $countpr; ?></p>
                </div>
            </div>

            <div class="dashboard-element-body">
                <div class="dashboard-card-2">
                    <h3>Total Directions:
                        <a href="admin/see-direction-list" style="text-decoration: none; color: #024457;font-size: 18px;margin-bottom: 20px;display: inline-block;"><i class="fa fa-external-link"></i></a>
                    </h3>
                    <?php
                    $sqld = "SELECT DISTINCT direction_route as directionRoute FROM all_directions ORDER BY directionRoute ASC";
                    $resultd = mysqli_query($db, $sqld);
                    $countd = mysqli_num_rows($resultd);
                    if ($countd <= 0) {
                        $countd = 0;
                    }
            ?>
                    <p style="font-size: 32px; font-family: CustomFont;"><?php echo $countd; ?></p>
                </div>
            </div>
            <div class="dashboard-element-body">
                <div class="dashboard-card-2">
                    <h3>Total Requests:
                        <a href="admin/list-house-holding" style="text-decoration: none; color: #024457;font-size: 18px;margin-bottom: 20px;display: inline-block;"><i class="fa fa-external-link"></i></a>
                    </h3>
                    <?php
                    $sqldre = "SELECT * FROM api_requests";
                    $resultdre = mysqli_query($db, $sqldre);
                    $countdre = mysqli_num_rows($resultdre);
                    if ($countdre <= 0) {
                        $countdre = 0;
                    }
                    ?>
                    <p style="font-size: 32px; font-family: CustomFont;"><?php echo $countdre; ?></p>
                </div>
            </div>
        </div>


        <div class="dashboard-table-container" style="margin-bottom: 25px;margin-top: 50px;">
            <p class="dashboard-table-container-heading" style="background: rgba(91, 134, 229, 0.9);"><i class="fa fa-cogs"></i> API Details</p>
            <div class="dashboard-table-container-div">

                <table class="responstable2 responstable2x" style="display: inline-block; margin-bottom: 0px;">
                    <tbody>
                    <tr>
                        <td>API Status</td>
                        <td><?php echo $rowApiStatusShow; ?></td>
                    </tr>
                    <tr>
                        <td>Fair Rate</td>
                        <td><?php echo $rowFairRateShow; ?> Taka</td>
                    </tr>
                    <tr>
                        <td>Total Requests</td>
                        <td><?php echo $countdre; ?></td>
                    </tr>
                    <tr>
                        <td>Last Request</td>
                        <td>22-10-2022; 04:52:37 PM</td>
                    </tr>
                    <tr>
                        <td>Last Request IP</td>
                        <td>59.153.16.132</td>
                    </tr>
                    <tr>
                        <td>API Activity</td>
                        <td>
                            <a href="admin/api-requests" style="text-decoration: none; color: #024457;">Details <i class="fa fa-external-link"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>


        <div style="display: inline">
            <h2 style="font-family: CustomFont;margin-top: 100px;text-decoration: underline;">Admin Profile:</h2>

            <?php
            if ($user_role == "admin") {
            ?>
            <div class='reg_data_container'>
                <?php
                /*$operatorDataFetch = "SELECT * FROM user_admin WHERE role='operator'";*/
                $operatorDataFetch = "SELECT * FROM user_admin";
                $fetchDataResult = mysqli_query($db, $operatorDataFetch);
                if (mysqli_num_rows($fetchDataResult) > 0) {

                    while ($row = mysqli_fetch_assoc($fetchDataResult)) {
                        $userId = $row['user_id'];
                        ?>
                        <form method="post" action="admin/operator-data-entry" style="display: inline-block;">
                            <input type="hidden" name="operatorID" value="<?php echo $row['user_id'] ?>">
                            <div class='tdata'>
                                <p class='ttitle' style="text-transform: capitalize;"><?php echo $row['role'];?></p>
                                <p class='tvalue'>
                                    <a style="font-size: 22px;">
                                        <?php echo $row['full_name'];?>
                                    </a>
                                </p>
                                <div style="display: block; border-top: 1px solid #5e5e5e; padding: 0 0 0 0; margin-top: 10px;font-size: 14px;">
                                    <p style="font-family: CustomFont;margin-top: 5px;"><b>Last Visit:</b> <i><?php echo $row['last_login'];?></i></p>
                                    <p style="font-family: CustomFont;"><b>Last IP:</b> <i><?php echo $row['last_ip'];?></i></p>
                                    <p style="font-family: CustomFont;"><b>Location:</b> <i><?php echo $row['last_location'];?></i></p>
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                }
                }
                ?>
            </div>
        </div>



    </div>

</div>