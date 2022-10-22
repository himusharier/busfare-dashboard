
<script>
    document.title = 'Add New Route - <?php echo $rowChkSiteName["settingsValue"]; ?>';
</script>

<div class="content-body-main-div">

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Add New Route /</p>


    <div id="response"></div>

    <form id="route-form-data" method="post" enctype="multipart/form-data">

        <div class="dashboard-table-container" style="margin-bottom: 0px;">
            <p class="dashboard-table-container-heading"><i class="fa fa-road"></i> Add New Route</p>
            <div class="dashboard-table-container-div">

                <table>
                    <tbody>
                    <tr>
                        <td>
                            <label>Route No:</label>
                            <input type="text" list="routeNoList" name="routeNo" id="routeNo" value="">
                            <datalist id="routeNoList">
                                <?php
                                require ('configs/database-connection.php');
                                $sqlpr = "SELECT * FROM all_routes";
                                $resultpr = mysqli_query($db, $sqlpr);
                                $countpr = mysqli_num_rows($resultpr);
                                while ($rowpr = mysqli_fetch_array($resultpr, MYSQLI_ASSOC)) {
                                    ?>
                                    <option value="<?php echo $rowpr['route_no']; ?>"><?php echo $rowpr['route_no']; ?></option>
                                    <?php
                                }
                                ?>
                            </datalist>
                        </td>
                        <td>
                            <label>Route Start Place:</label>
                            <select name="routeStartPlace" id="routeStartPlace">
                                <option value="" selected hidden>-- Select Place --</option>
                                <?php
                                require ('configs/database-connection.php');
                                $sqlp = "SELECT * FROM all_places";
                                $resultp = mysqli_query($db, $sqlp);
                                $countp = mysqli_num_rows($resultp);
                                if ($countp > 0) {
                                while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                                ?>
                                <option value="<?php echo $rowp['place_id']; ?>"><?php echo $rowp['placeNameEn']; ?> (<?php echo $rowp['placeNameBn']; ?>)</option>
                                <?php
                                }
                                ?>
                                <?php
                                } else {
                                    echo "<option value=''><i>No Place Found!</i></option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <label>Route End Place:</label>
                            <select name="routeEndPlace" id="routeEndPlace">
                                <option value="" selected hidden>-- Select Place --</option>
                                <?php
                                require ('configs/database-connection.php');
                                $sqlp = "SELECT * FROM all_places";
                                $resultp = mysqli_query($db, $sqlp);
                                $countp = mysqli_num_rows($resultp);
                                if ($countp > 0) {
                                    while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                                        ?>
                                        <option value="<?php echo $rowp['place_id']; ?>"><?php echo $rowp['placeNameEn']; ?> (<?php echo $rowp['placeNameBn']; ?>)</option>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                } else {
                                    echo "<option value=''><i>No Place Found!</i></option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <button type="button" name="submit-btn" id="submit-btn"><i class="fa fa-save"></i> Save Route</button>
        <img style="display: none" src="assets/images/loader.gif" width="30" />
    </form>

</div>


<script src="assets/js/jquery.js"></script>

<script>
    $(document).ready(function () {
        $("#submit-btn").click(function () {

            var routeNo = $("#routeNo").val().trim();
            var routeStartPlace = $("#routeStartPlace").val().trim();
            var routeEndPlace = $("#routeEndPlace").val().trim();

            if(routeNo == "" || routeStartPlace == "" || routeEndPlace == "") {

                alert("Fill The Form Correctly!");

            } else {

                $.ajax({
                    url: 'script/form-data-insert-routes',
                    type: 'POST',
                    data: $('#route-form-data').serialize(),
                    beforeSend: function () {
                        $("#submit-btn").html(
                            '<img src="assets/images/loader.gif" width="30" />');
                        $('#loader').show();
                    },
                    success: function (data) {
                        $("#submit-btn").html('<i class="fa fa-save"></i> Save Route');
                        $('#response').fadeIn();
                        $('#response').html(data);
                        $("#route-form-data").hide();
                        $('#loader').hide();
                    }
                });

            }

        });
    });
</script>

<script>
    function showForm () {
        $('#route-form-data').trigger("reset");
        $('#route-form-data').show();
        $('#response').hide();
    }
    function reTryForm () {
        $('#route-form-data').show();
        $('#response').hide();
    }
</script>

