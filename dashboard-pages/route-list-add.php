
<script>
    document.title = 'Add New Route - <?php echo $rowChkSiteName["settingsValue"]; ?>';
</script>

<div class="content-body-main-div">

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Add New Route /</p>


    <div id="response"></div>

    <form id="route-form-data" method="post" enctype="multipart/form-data">

        <div class="dashboard-table-container" style="margin-bottom: 0px;">
            <p class="dashboard-table-container-heading"><i class="fa fa-road"></i> Add New Route</p>
            <div class="dashboard-table-container-div" id="form-wrap">

                <table>
                    <tbody>
                    <tr>
                        <td>
                            <label>Route No</label>
                            <input type="text" list="routeNoList" name="routeNo" id="routeNo" value="">
                            <datalist id="routeNoList">
                                <?php
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
                            <label>Route Start Place<i style="color: red;">*</i></label>
                            <select name="routeStartPlace" id="routeStartPlace">
                                <option value="" selected hidden>-- Select Place --</option>
                                <?php
                                $sqlp = "SELECT * FROM all_places ORDER BY placeNameEn ASC";
                                $resultp = mysqli_query($db, $sqlp);
                                $countp = mysqli_num_rows($resultp);
                                if ($countp > 0) {
                                while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                                ?>
                                <option value="<?php echo $rowp['place_id']; ?>"><?php echo $rowp['placeNameEn']; ?> <?php if(!empty($rowp['placeNameBn'])){ echo "({$rowp['placeNameBn']})";} ?></option>
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
                            <label>Route End Place<i style="color: red;">*</i></label>
                            <select name="routeEndPlace" id="routeEndPlace">
                                <option value="" selected hidden>-- Select Place --</option>
                                <?php
                                $sqlp = "SELECT * FROM all_places ORDER BY placeNameEn ASC";
                                $resultp = mysqli_query($db, $sqlp);
                                $countp = mysqli_num_rows($resultp);
                                if ($countp > 0) {
                                    while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                                        ?>
                                        <option value="<?php echo $rowp['place_id']; ?>"><?php echo $rowp['placeNameEn']; ?> <?php if(!empty($rowp['placeNameBn'])){ echo "({$rowp['placeNameBn']})";} ?></option>
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
                            <label>Route Total Distance (KM)</label>
                            <input type="text" name="routeTotalDistance" id="routeTotalDistance" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Bus Name</label>
                            <select name="busName1" id="busName1">
                                <option value="" selected hidden>-- Select Bus --</option>
                                <?php
                                $sqlb = "SELECT * FROM all_buses ORDER BY busNameEn ASC";
                                $resultb = mysqli_query($db, $sqlb);
                                $countb = mysqli_num_rows($resultb);
                                if ($countb > 0) {
                                    while ($rowb = mysqli_fetch_array($resultb, MYSQLI_ASSOC)) {
                                        ?>
                                        <option value="<?php echo $rowb['bus_id']; ?>"><?php echo $rowb['busNameEn']; ?> <?php if(!empty($rowb['busNameBn'])){ echo "({$rowb['busNameBn']})";} ?></option>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                } else {
                                    echo "<option value=''><i>No Bus Found!</i></option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td><a onclick="add_more()" class="add-btn2" style="display:inline-block;margin: 0;margin-top: 20px; border-radius: 4px;"><i class="fa fa-plus"></i> Add Another Bus</a></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <input type="hidden" id="box_count" name="box_count" value="1">
        <button type="button" name="submit-btn" id="submit-btn"><i class="fa fa-save"></i> Save Route</button>
        <img style="display: none" src="assets/images/loader.gif" width="30" />
    </form>

</div>


<script src="assets/js/jquery.js"></script>

<script>
    $(document).ready(function () {
        $("#submit-btn").click(function () {

            var routeStartPlace = $("#routeStartPlace").val().trim();
            var routeEndPlace = $("#routeEndPlace").val().trim();

            if(routeStartPlace == "" || routeEndPlace == "") {

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


<script>
    function add_more(){
        var box_count=jQuery("#box_count").val();
        box_count++;
        jQuery("#box_count").val(box_count);
        jQuery("#form-wrap").append('<table id="box_loop_'+box_count+'">' +
            '                    <tbody>' +
            '                    <tr>' +
            '                        <td>' +
            '                            <label>Bus Name</label>' +
            '                            <select name="busName'+box_count+'" id="busName'+box_count+'">' +
            '                            <option value="" selected hidden>-- Select Bus --</option>' +
            '<?php
                require ('configs/database-connection.php');
                $sqlb = "SELECT * FROM all_buses ORDER BY busNameEn ASC";
                $resultb = mysqli_query($db, $sqlb);
                $countb = mysqli_num_rows($resultb);
                if ($countb > 0) {
                while ($rowb = mysqli_fetch_array($resultb, MYSQLI_ASSOC)) {
                ?>' +
            '<option value="<?php echo $rowb['bus_id']; ?>"><?php echo $rowb['busNameEn']; ?> <?php if(!empty($rowb['busNameBn'])){ echo "({$rowb['busNameBn']})";} ?></option>' +
            '<?php
                }
                ?>' +
            '<?php
                } else {
                echo '<option value=""><i>No Bus Found!</i></option>';
            }
                ?>' +
            '                        </td>' +
            '                        <td>' +
            '                            <a onclick="remove_more('+box_count+')" class="delete-btn2" style="display:inline-block;margin: 0;margin-top: 20px;border-radius: 4px;"><i class="fa fa-times"></i> Remove</a>' +
            '                        </td>' +
            '                        <td>' +
            '                        </td>' +
            '                        <td>' +
            '                        </td>' +
            '                    </tr>' +
            '                    </tbody>' +
            '                </table>');
    }
    function remove_more(box_count){
        jQuery("#box_loop_"+box_count).remove();
        var box_count=jQuery("#box_count").val();
        box_count--;
        jQuery("#box_count").val(box_count);
    }
</script>

