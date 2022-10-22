
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

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / API Requests /</p>

    <div class="dashboard-table-container">
        <p class="dashboard-table-container-heading"><i class="fa fa-server"></i> API Requests List</p>
        <table class="responstable">
            <tbody>

            <?php
            require ('configs/database-connection.php');
            $sqlp = "SELECT * FROM api_requests";
            $resultp = mysqli_query($db, $sqlp);
            $countp = mysqli_num_rows($resultp);
            if ($countp > 0) {
                ?>
                <tr>
                    <th>Serial No.</th>
                    <th>IP Address</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                <?php
                while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $rowp['id']; ?></td>
                        <td><?php echo $rowp['ipAddress']; ?></td>
                        <td><?php echo $rowp['location']; ?></td>
                        <td><?php echo $rowp['date']; ?></td>
                        <td><?php echo $rowp['time']; ?></td>
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

