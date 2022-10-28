
<script>
    document.title = 'API Requests - <?php echo $rowChkSiteName["settingsValue"]; ?>';
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

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / API Requests /</p>

    <div class="dashboard-table-container">
        <p class="dashboard-table-container-heading"><i class="fa fa-server"></i> API Requests List</p>
        <table class="responstable">
            <tbody>

            <?php
            $results_per_page = 100; // number of results per page

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

            $sqlp = "SELECT * FROM api_requests ORDER BY id DESC LIMIT {$start_from}, ".$results_per_page;
            $resultp = mysqli_query($db, $sqlp);
            $countp = mysqli_num_rows($resultp);
            if ($countp > 0) {
                ?>
                <tr>
                    <th>Request ID</th>
                    <th>IP Address</th>
                    <th>Location</th>
                    <th>Datetime</th>
                    <th>Request Page</th>
                </tr>
                <?php
                while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $rowp['id']; ?></td>
                        <td><?php echo $rowp['ipAddress']; ?></td>
                        <td><?php echo $rowp['locationCity']; ?>, <?php echo $rowp['locationCountry']; ?></td>
                        <td><?php echo $rowp['date']; ?>; <?php echo $rowp['time']; ?></td>
                        <td><?php echo $rowp['requestPage']; ?></td>
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
        $sqlpn = "SELECT COUNT(id) AS total FROM api_requests";
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
            echo "' href='admin/api-requests?page={$i}'>{$i}</a>";

        };
        ?>
    </div>

</div>

