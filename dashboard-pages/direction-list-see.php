
<script>
    document.title = 'Directions List - <?php echo $rowChkSiteName["settingsValue"]; ?>';
</script>

<style>
    .responstable table {
        border-collapse: collapse;
        width: 100%;
    }

    .responstable td, .responstable th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 10px;
        font-family: 'Bangla', arial, sans-serif !important;
        font-size: 16px !important;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
    }
    .responstable th {
        background-color: #f5f5f5;
        color: #5e5e5e;
    }
</style>

<div class="content-body-main-div">

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Directions List</p>

    <div class="dashboard-table-container">
        <p class="dashboard-table-container-heading"><i class="fa fa-compass"></i> Directions List</p>
        <table class="responstable">
            <tbody>
            <?php
            require ('configs/database-connection.php');
            $sqld = "SELECT DISTINCT direction_route as directionRoute FROM all_directions ORDER BY directionRoute ASC";
            $resultd = mysqli_query($db, $sqld);
            $countd = mysqli_num_rows($resultd);
            if ($countd > 0) {
            function place_name_en($data)
            {
                include "configs/database-connection.php";
                $data = "SELECT * FROM all_places WHERE place_id = {$data}";
                $data = mysqli_query($db, $data);
                $data = mysqli_fetch_array($data, MYSQLI_ASSOC);
                $data = $data["placeNameEn"];
                return $data;
            }
            function place_name_bn($data2)
            {
                include "configs/database-connection.php";
                $data2 = "SELECT * FROM all_places WHERE place_id = {$data2}";
                $data2 = mysqli_query($db, $data2);
                $data2 = mysqli_fetch_array($data2, MYSQLI_ASSOC);
                $data2 = $data2["placeNameBn"];
                return $data2;
            }
            ?>
                <tr>
                    <th>Route Details</th>
                    <th style="text-align: center;">Direction Details</th>
                    <th class="printDisplayNone">Option</th>
                </tr>
            <?php
            while ($rowd = mysqli_fetch_array($resultd, MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <td style="vertical-align: top;">
                        <a style="font-size: 26px;"><?php echo $rowd['directionRoute'] ?></a>
                        <br/><br/>
                        <?php
                        $sqlp = "SELECT * FROM all_routes WHERE route_no = '{$rowd['directionRoute']}'";
                        $resultp = mysqli_query($db, $sqlp);
                        $rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC);
                        ?>
                        <?php echo place_name_en($rowp['routeStartPlace']); ?>
                        <i class="fa fa-long-arrow-right"></i>
                        <?php echo place_name_en($rowp['routeEndPlace']); ?>
                        <br/>
                        <a class="banglaFont">(<?php echo place_name_bn($rowp['routeStartPlace']); ?> <i class="fa fa-long-arrow-right"></i> <?php echo place_name_bn($rowp['routeEndPlace']); ?>)</a>

                        <!--
                        Diyabari <i class="fa fa-long-arrow-right"></i> Postogola
                        <br/>
                        <a class="banglaFont">(দিয়াবাড়ী <i class="fa fa-long-arrow-right"></i> পোস্তগোলা)</a>
                        -->
                    </td>
                    <td style="padding: 0;border: 0;">
                        <table>
                            <tbody>

                            <?php
                            require ('configs/database-connection.php');
                            $sqldp = "SELECT * FROM all_directions WHERE direction_route = '{$rowd['directionRoute']}'";
                            $resultdp = mysqli_query($db, $sqldp);
                            while ($rowdp = mysqli_fetch_array($resultdp, MYSQLI_ASSOC)) {
                            ?>
                            <tr>
                                <td><?php echo place_name_en($rowdp["direction_place"]) ?> (<a class="banglaFont"><?php echo place_name_bn($rowdp["direction_place"]) ?></a>)</td>
                                <td style="text-align: center;"><?php echo $rowdp["direction_distance"] ?> KM</td>
                            </tr>
                            <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </td>
                    <td class="printDisplayNone" style="vertical-align: top;">
                        <form method="post" action="admin/update-direction-list" style="display: inline-block;">
                            <input type="hidden" name="directionID" value="<?php echo $rowd['directionRoute'] ?>">
                            <button onclick="LoaderShow()" type="submit" class="edit-window" data-formid="<?php echo $rowd['directionRoute'] ?>" style="cursor: pointer; color: #FFFFFF; background: #23b14d; height: auto; border: 1px solid #23b14d; margin: 0; width: auto;padding: 5px 10px;border-radius: 2px;font-size: 14px;"><i class="fa fa-edit"></i> Edit Direction</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
                ?>
                <?php
            } else {
                echo "<p style='font-size: 16px;font-family: CustomFont;text-align: center;padding: 50px 0;font-style: italic;color: #ff3333;'><i class='fa fa-warning'></i> No Data Found!</p>";
            }
            ?>

<!--
<tr>
    <td style="vertical-align: top;">
        <a style="font-size: 26px;">368</a>
        <br/><br/>
        Signboard <i class="fa fa-long-arrow-right"></i> Fantasy Kingdom
        <br/>
        <a class="banglaFont">(সাইনবোর্ড <i class="fa fa-long-arrow-right"></i> ফ্যান্টাসী কিংডম)</a>
    </td>
    <td style="padding: 0;border: 0;">
        <table>
            <tbody>
            <tr>
                <td>Diyabari (<a class="banglaFont">দিয়াবাড়ী</a>)</td>
                <td style="text-align: center;">0.0 KM</td>
            </tr>
            <tr>
                <td>Signboard (<a class="banglaFont">সাইনবোর্ড</a>)</td>
                <td style="text-align: center;">4.7 KM</td>
            </tr>
            <tr>
                <td>Diyabari (<a class="banglaFont">দিয়াবাড়ী</a>)</td>
                <td style="text-align: center;">5.2 KM</td>
            </tr>
            <tr>
                <td>Signboard (<a class="banglaFont">সাইনবোর্ড</a>)</td>
                <td style="text-align: center;">6.7 KM</td>
            </tr>
            <tr>
                <td>Diyabari (<a class="banglaFont">দিয়াবাড়ী</a>)</td>
                <td style="text-align: center;">8.2 KM</td>
            </tr>
            <tr>
                <td>Signboard (<a class="banglaFont">সাইনবোর্ড</a>)</td>
                <td style="text-align: center;">10.4 KM</td>
            </tr>
            </tbody>
        </table>
    </td>
    <td class="printDisplayNone" style="vertical-align: top;">
        <form method="post" action="admin/update-house-holding" style="display: inline-block;">
            <input type="hidden" name="formID" value="<?php echo $rowr['formID'] ?>">
            <button onclick="LoaderShow()" type="submit" class="edit-window" data-formid="<?php echo $rowr['formID'] ?>" style="cursor: pointer; color: #FFFFFF; background: #23b14d; height: auto; border: 1px solid #23b14d; margin: 0; width: auto;padding: 5px 10px;border-radius: 2px;font-size: 14px;"><i class="fa fa-edit"></i> Edit Direction</button>
        </form>
    </td>
</tr>
-->

            </tbody>
        </table>
    </div>


</div>

