<?php

if (empty($_POST["routeID"])) {
    echo "<script type='text/javascript'> document.location = 'admin/see-route-list'; </script>";
    die();
}

$routeID = $_POST["routeID"];

if (isset($_POST['delete-btn']) && $user_role == "admin"){

    $routeID = $_POST["routeID"];

    $delSql = "DELETE FROM all_routes WHERE route_id = '$routeID'";
    if (mysqli_query($db, $delSql)) {
        echo "<script type='text/javascript'> document.location = 'admin/see-route-list'; </script>";
        die();
    }
}

$sql = "SELECT * FROM all_routes WHERE route_id = {$routeID}";
$result = mysqli_query($db, $sql) or die("Not Found!");

if (mysqli_num_rows($result) == 1) {

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

    while ($row = mysqli_fetch_assoc($result)) {

        ?>

        <script>
            document.title = 'Update A Place - <?php echo $rowChkSiteName["settingsValue"]; ?>';
        </script>

        <div class="content-body-main-div">

            <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Route List / Update Route</p>

            <div id="response"></div>

            <form id="routes-form-data" method="post" enctype="multipart/form-data">

                <div class="dashboard-table-container" style="margin-bottom: 0px;">
                    <p class="dashboard-table-container-heading"><i class="fa fa-road"></i> Update Route</p>
                    <div class="dashboard-table-container-div">

                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <label>Route No</label>
                                    <input type="text" list="routeNoList" name="routeNo" id="routeNo" value="<?php echo $row["route_no"]; ?>">
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
                                        <option value="<?php echo $row["routeStartPlace"]; ?>" selected hidden>
                                            <?php echo place_name_en($row["routeStartPlace"]); ?>
                                            (<?php echo place_name_bn($row["routeStartPlace"]); ?>)
                                        </option>
                                        <?php
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
                                    <label>Route End Place<i style="color: red;">*</i></label>
                                    <select name="routeEndPlace" id="routeEndPlace">
                                        <option value="<?php echo $row["routeEndPlace"]; ?>" selected hidden>
                                            <?php echo place_name_en($row["routeEndPlace"]); ?>
                                            (<?php echo place_name_bn($row["routeEndPlace"]); ?>)
                                        </option>
                                        <?php
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
                                    <label>Route Total Distance (KM)</label>
                                    <input type="text" name="routeTotalDistance" id="routeTotalDistance" value="<?php echo $row["routeDistance"]; ?>">
                                </td>
                            </tr>


                            <?php
                            $sqlrdlb = "SELECT * FROM all_routes_bus_list WHERE route_id = '{$routeID}' ORDER BY id ASC";
                            $resultrdlb = mysqli_query($db, $sqlrdlb);
                            $countrdlb = mysqli_num_rows($resultrdlb);
                            if ($countrdlb > 0) {
                                $i = 1;
                                while ($rowrdlb = mysqli_fetch_array($resultrdlb, MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <label>Bus Name</label>
                                            <input type="hidden" name="xbusNameBusId<?php echo $i; ?>" value="<?php echo $rowrdlb['id']; ?>">
                                            <select name="xbusName<?php echo $i; ?>" id="xbusName<?php echo $i; ?>">
                                                <option value="<?php echo $rowrdlb["bus_no"] ?>" selected hidden><?php echo bus_name_en($rowrdlb["bus_no"]) ?> (<?php echo bus_name_bn($rowrdlb["bus_no"]) ?>)</option>
                                                <?php
                                                require ('configs/database-connection.php');
                                                $sqlpb = "SELECT * FROM all_buses";
                                                $resultpb = mysqli_query($db, $sqlpb);
                                                $countpb = mysqli_num_rows($resultpb);
                                                if ($countpb > 0) {
                                                    while ($rowpb = mysqli_fetch_array($resultpb, MYSQLI_ASSOC)) {
                                                        ?>
                                                        <option value="<?php echo $rowpb['bus_id']; ?>"><?php echo $rowpb['busNameEn']; ?> (<?php echo $rowpb['busNameBn']; ?>)</option>
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
                                        <td>
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="routeID" value="<?php echo $row['directionRoute']; ?>">
                                                <input type="hidden" name="busListFieldId" value="<?php echo $rowrdlb["id"]; ?>">
                                                <button onclick="return confirm('Are You Sure To Delete This Bus?');" type="submit" name="direction-delete-btn" id="direction-delete-btn" class="delete-btn2" style="margin: 0;margin-top: 20px;"><i class="fa fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                                <?php
                            }
                            ?>

                            <table id="form-wrap"></table>
                            <tr>
                                <td><a onclick="add_more()" class="add-btn2" style="display:inline-block;margin: 0;margin-top: 20px; border-radius: 4px;"><i class="fa fa-plus"></i> Add a Bus</a></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>

                <input type="hidden" name="box_count" id="box_count" value="<?php echo $countrdlb; ?>">
                <input type="hidden" name="routeID" value="<?php echo $row['route_id']; ?>">
                <button onclick="showForm()" type="button" name="submit-btn" id="submit-btn"><i class="fa fa-save"></i> Update Route</button>
            </form>

            <form id="form-delete-btn" method="post" enctype="multipart/form-data" onsubmit="return confirm('Are You Sure To Delete This Route?');">
                <input type="hidden" name="routeID" value="<?php echo $row['route_id']; ?>">
                <button type="submit" name="delete-btn" id="delete-btn" class="delete-btn"><i class="fa fa-trash"></i> Delete Route</button>
            </form>


        </div>

        <?php

    }

} else {
    echo "<script type='text/javascript'> document.location = 'admin/see-route-list'; </script>";
    exit();
}



?>


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
                    url: 'script/form-data-update-routes',
                    type: 'POST',
                    data: $('#routes-form-data').serialize(),
                    beforeSend: function () {
                        $("#submit-btn").html(
                            '<img src="assets/images/loader.gif" width="30" />');
                        $('#loader').show();
                        $('#delete-btn').hide();
                    },
                    success: function (data) {
                        $("#submit-btn").html('<i class="fa fa-save"></i> তথ্য সংশোধন করুন');
                        $('#response').fadeIn();
                        $('#response').html(data);
                        $('#routes-form-data').trigger("reset");
                        $("#routes-form-data").hide();
                        $("#form-delete-btn").hide();
                        $('#loader').hide();
                        $('#delete-btn').show();
                    }
                });
            }

        });
    });
</script>


<script>
    function showForm () {
        $('#routes-form-data').show();
        $('#form-delete-btn').show();
        $('#response').hide();
    }
    function reTryForm () {
        $('#routes-form-data').show();
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
                $sqlb = "SELECT * FROM all_buses";
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

