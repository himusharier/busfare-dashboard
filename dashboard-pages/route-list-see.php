
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

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Route List</p>

    <div class="dashboard-table-container">
        <p class="dashboard-table-container-heading"><i class="fa fa-road"></i> Route List</p>
        <table class="responstable">
            <tbody>

                <?php
                $sqlp = "SELECT * FROM all_routes";
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
                ?>
                <tr>
                    <th>Route No.</th>
                    <th>Route Direction</th>
                    <th class="printDisplayNone">Option</th>
                </tr>
                <?php
                while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $rowp['route_no']; ?></td>
                    <td>
                        <?php echo place_name_en($rowp['routeStartPlace']); ?>
                        <i class="fa fa-long-arrow-right"></i>
                        <?php echo place_name_en($rowp['routeEndPlace']); ?>
                        <br/>
                        <a class="banglaFont">(<?php echo place_name_bn($rowp['routeStartPlace']); ?> <i class="fa fa-long-arrow-right"></i> <?php echo place_name_bn($rowp['routeEndPlace']); ?>)</a>
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


</div>

