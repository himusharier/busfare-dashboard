
<script>
    document.title = 'Place List - <?php echo $rowChkSiteName["settingsValue"]; ?>';
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

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Place List</p>

    <div class="dashboard-table-container">
        <p class="dashboard-table-container-heading"><i class="fa fa-map"></i> Place List</p>
        <table class="responstable">
            <tbody>

                <?php
                $sqlp = "SELECT * FROM all_places";
                $resultp = mysqli_query($db, $sqlp);
                $countp = mysqli_num_rows($resultp);
                if ($countp > 0) {
                ?>
                <tr>
                    <th>Serial No.</th>
                    <th>Place Name (EN)</th>
                    <th>Place Name (BN)</th>
                    <th class="printDisplayNone">Option</th>
                </tr>
                <?php
                while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo @$snp += 1; ?></td>
                    <td><?php echo $rowp['placeNameEn']; ?></td>
                    <td><a class="banglaFont"><?php echo $rowp['placeNameBn']; ?></a></td>
                    <td class="printDisplayNone">
                        <form method="post" action="admin/update-place-list" style="display: inline-block;">
                            <input type="hidden" name="placeID" value="<?php echo $rowp['place_id'] ?>">
                            <button onclick="LoaderShow()" type="submit" class="edit-window" data-placeid="<?php echo $rowp['place_id'] ?>" style="cursor: pointer; color: #FFFFFF; background: #23b14d; height: auto; border: 1px solid #23b14d; margin: 0; width: auto;padding: 5px 10px;border-radius: 2px;font-size: 14px;"><i class="fa fa-edit"></i> Edit Place</button>
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

