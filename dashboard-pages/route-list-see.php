
<script>
    document.title = 'Route List - <?php echo $rowChkSiteName["settingsValue"]; ?>';
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

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Route List</p>

    <div class="dashboard-table-container">
        <p class="dashboard-table-container-heading"><i class="fa fa-road"></i> Route List</p>
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

                $sqlp = "SELECT * FROM all_routes ORDER BY route_id ASC LIMIT {$start_from}, ".$results_per_page;
                $resultp = mysqli_query($db, $sqlp);
                $countp = mysqli_num_rows($resultp);
                if ($countp > 0) {
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
                    function banglaNumber($englishToBangla) {
                        $englishNum=array("0","1","2","3","4","5",'6',"7","8","9","-","A");
                        $banglaNum=array("০","১","২","৩","৪","৫",'৬',"৭","৮","৯","-","এ");
                        return str_replace($englishNum,$banglaNum,$englishToBangla);
                    }
                ?>
                <tr>
                    <th>Route No.</th>
                    <th>Route Full Directions</th>
                    <th class="printDisplayNone">Option</th>
                </tr>
                <?php
                while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td>
                        <a style="font-size: 22px;font-weight: bold;"><?php echo $rowp['route_no']; ?></a> <a style="font-family: BanglaFont;">(<?php echo banglaNumber($rowp['route_no']); ?>)</a>
                        <br/><br/>
                        <?php echo place_name_en($rowp['routeStartPlace']); ?>
                        <i class="fa fa-long-arrow-right"></i>
                        <?php echo place_name_en($rowp['routeEndPlace']); ?>
                        <br/>
                        <a class="banglaFont">(<?php echo place_name_bn($rowp['routeStartPlace']); ?> <i class="fa fa-long-arrow-right"></i> <?php echo place_name_bn($rowp['routeEndPlace']); ?>)</a>
                        <?php
                        if (!empty($rowp['routeDistance'])) {
                            echo "<br/><br/><a>Total Distance: <i><b>{$rowp['routeDistance']}</b> KM</i></a>";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $sqlpfd = "SELECT * FROM all_directions WHERE direction_route = '{$rowp['route_id']}' ORDER BY direction_distance ASC";
                        $resultpfd = mysqli_query($db, $sqlpfd);
                        $countpfd = mysqli_num_rows($resultpfd);
                        if ($countpfd > 0) {
                            while ($rowpfd = mysqli_fetch_array($resultpfd, MYSQLI_ASSOC)) {
                                ?>
                                <a style="font-family: BanglaFont;" class="direction-after-sign"> <?php echo place_name_bn($rowpfd['direction_place']); ?></a>
                        <?php
                            }
                        } else {
                            echo "Full Route Direction Not Set Yet!";
                        }
                        ?>
                    </td>
                    <td class="printDisplayNone">
                        <form method="post" action="admin/update-route-list" style="display: inline-block;">
                            <input type="hidden" name="routeID" value="<?php echo $rowp['route_id'] ?>">
                            <button onclick="LoaderShow()" type="submit" class="edit-window" data-formid="<?php echo $rowp['route_id'] ?>" style="cursor: pointer; color: #FFFFFF; background: #23b14d; height: auto; border: 1px solid #23b14d; margin: 0; width: auto;padding: 5px 10px;border-radius: 2px;font-size: 14px;"><i class="fa fa-edit"></i> Edit Route</button>
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
    if ($countp > 0) {
    ?>
    <div class="bottom-pagination">
        <?php
        $sqlpn = "SELECT COUNT(route_id) AS total FROM all_routes";
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
            echo "' href='admin/see-route-list?page={$i}'>{$i}</a>";

        };
        ?>
    </div>

</div>

