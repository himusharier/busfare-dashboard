
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
        font-family: 'CustomFont', arial, sans-serif !important;
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
            $results_per_page = 20; // number of results per page

            if (isset($_GET['page'])) {
                function clean_inputs($pageNo)
                {
                    include "configs/database-connection.php";
                    $pageNo = htmlspecialchars($pageNo);
                    $pageNo = stripslashes($pageNo);
                    $pageNo = trim($pageNo);
                    $pageNo = mysqli_real_escape_string($db, $pageNo);
                    return $pageNo;
                }

                $get_page = clean_inputs($_GET['page']);
            } else {
                $get_page = null;
            }

            if (isset($get_page)) { $page = $get_page; } else { $page=1; };
            $start_from = ($page-1) * $results_per_page;

            $sqld = "SELECT DISTINCT direction_route as directionRoute FROM all_directions ORDER BY direction_id ASC LIMIT {$start_from}, ".$results_per_page;
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
            function get_route_name($data3)
            {
                include "configs/database-connection.php";
                $data3 = "SELECT * FROM all_routes WHERE route_id = {$data3}";
                $data3 = mysqli_query($db, $data3);
                $data3 = mysqli_fetch_array($data3, MYSQLI_ASSOC);
                $data3 = $data3["route_no"];
                return $data3;
            }
            function bus_name_en($data3)
            {
                include "configs/database-connection.php";
                $data3 = "SELECT * FROM all_buses WHERE bus_id = {$data3}";
                $data3 = mysqli_query($db, $data3);
                $data3 = mysqli_fetch_array($data3, MYSQLI_ASSOC);
                $data3 = $data3["busNameEn"];
                return $data3;
            }
            function bus_name_bn($data4)
            {
                include "configs/database-connection.php";
                $data4 = "SELECT * FROM all_buses WHERE bus_id = {$data4}";
                $data4 = mysqli_query($db, $data4);
                $data4 = mysqli_fetch_array($data4, MYSQLI_ASSOC);
                $data4 = $data4["busNameBn"];
                return $data4;
            }
            function banglaNumber($englishToBangla) {
                $englishNum=array("0","1","2","3","4","5",'6',"7","8","9","-","A");
                $banglaNum=array("০","১","২","৩","৪","৫",'৬',"৭","৮","৯","-","এ");
                return str_replace($englishNum,$banglaNum,$englishToBangla);
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
                        <?php if(!empty($rowd['directionRoute']))
                        {
                            ?>
                            <a style="font-size: 26px;font-weight: bold;"><?php echo get_route_name($rowd['directionRoute']) ?></a>
                            <!--
                            <a style="font-family: BanglaFont;font-size: 18px;"><?php echo banglaNumber(get_route_name($rowd['directionRoute'])); ?></a>
                            -->
                            <?php
                        }
                        ?>
                        <br/>
                        <br/>
                        <?php
                        $sqlp = "SELECT * FROM all_routes WHERE route_id = '{$rowd['directionRoute']}'";
                        $resultp = mysqli_query($db, $sqlp);
                        $rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC);
                        ?>
                        <?php echo place_name_en($rowp['routeStartPlace']); ?>
                        <i class="fa fa-long-arrow-right"></i>
                        <?php echo place_name_en($rowp['routeEndPlace']); ?>
                        <br/>
                        <!--
                        <a class="banglaFont">(<?php echo place_name_bn($rowp['routeStartPlace']); ?> <i class="fa fa-long-arrow-right"></i> <?php echo place_name_bn($rowp['routeEndPlace']); ?>)</a>
                        -->
                        <br/>
                        <br/>
                        <h4 style="text-decoration: underline;margin-bottom: 5px;">Available Bus List:</h4>
                        <?php
                        $sqlpfdb = "SELECT * FROM all_routes_bus_list WHERE route_id = '{$rowp['route_id']}' ORDER BY id ASC";
                        $resultpfdb = mysqli_query($db, $sqlpfdb);
                        $countpfdb = mysqli_num_rows($resultpfdb);
                        if ($countpfdb > 0) {
                            while ($rowpfdb = mysqli_fetch_array($resultpfdb, MYSQLI_ASSOC)) {
                                ?>
                                <a style="font-family: CustomFont;" class="busList-after-sign"> <?php echo bus_name_en($rowpfdb['bus_no']); ?></a><br/>
                                <?php
                            }
                        } else {
                            echo "<a style='font-size: 14px; font-style: italic;'>No Bus Found!</a>";
                        }
                        ?>
                    </td>
                    <td style="padding: 0;border: 0;">
                        <table>
                            <tbody>

                            <?php
                            $sqldp = "SELECT * FROM all_directions WHERE direction_route = '{$rowd['directionRoute']}' ORDER BY direction_distance ASC";
                            $resultdp = mysqli_query($db, $sqldp);
                            while ($rowdp = mysqli_fetch_array($resultdp, MYSQLI_ASSOC)) {
                            ?>
                            <tr>
                                <td><?php echo place_name_en($rowdp["direction_place"]) ?>
                                    <!--
                                    (<a class="banglaFont"><?php echo place_name_bn($rowdp["direction_place"]) ?></a>)
                                    -->
                                </td>
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

            </tbody>
        </table>
    </div>

    <?php
    if ($countd > 0) {
    ?>
    <div class="bottom-pagination">
        <?php
        $sqlpn = "SELECT COUNT(DISTINCT direction_route) AS total FROM all_directions";
        $resultpn = mysqli_query($db, $sqlpn);
        $rowpn = mysqli_fetch_array($resultpn,MYSQLI_ASSOC);
        $total_pages = ceil($rowpn["total"] / $results_per_page); // calculate total pages with results

        //for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
        $i=$page;
        ?>
        <div style="display: flex;justify-content: center;margin-right: 5px;margin-left: -10px;">
            <select name="perPageLimit" style="padding: 0 5px;font-size: 14px;">
                <option hidden>Per Page <?php echo $results_per_page ?> Entries</option>
            </select>
        </div>
        <?php
        }
        ?>

        <?php
        for ($i=1; $i<=$total_pages; $i++) {

            //echo "<option value='{$i}'>{$i}</option>";
            echo "<a onClick='LoaderShow()' style='";
            if ($page == $i) {
                echo "background-color: #5b86e5; color: #ffffff;";
            }
            echo "' href='admin/see-direction-list?page={$i}'>{$i}</a>";

        };
        ?>
    </div>

</div>

