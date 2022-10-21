
<?php


if (empty($_POST["directionID"])) {
    echo "<script type='text/javascript'> document.location = 'admin/see-direction-list'; </script>";
    die();
}

include "../configs/database-connection.php";

$directionID = $_POST["directionID"];

if (isset($_POST['delete-btn']) && $user_role == "admin"){

    $directionID = $_POST["directionID"];

    $delSql = "DELETE FROM all_directions WHERE direction_id = '$directionID'";
    if (mysqli_query($db, $delSql)) {
        echo "<script type='text/javascript'> document.location = 'admin/see-direction-list'; </script>";
        die();
    }
}

if (isset($_POST['family-delete-btn']) && $_POST['directionFieldId']){

    $directionID = $_POST["directionID"];
    $directionFieldId = $_POST['directionFieldId'];

    $delSql = "DELETE FROM all_directions WHERE (direction_route = '$directionID' AND direction_id = '$directionFieldId')";
    mysqli_query($db, $delSql);
}

$sql = "SELECT DISTINCT direction_route as directionRoute FROM all_directions WHERE direction_route = {$directionID}";
$result = mysqli_query($db, $sql) or die("Not Found!");

if (mysqli_num_rows($result) > 0) {

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

    while ($row = mysqli_fetch_assoc($result)) {

        ?>

        <script>
            document.title = 'Update Directions - <?php echo $rowChkSiteName["settingsValue"]; ?>';
        </script>

        <div class="content-body-main-div">

            <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Directions List / Update Directions</p>

            <div id="response"></div>

            <form id="directions-form-data" method="post" enctype="multipart/form-data">

                <div class="dashboard-table-container" style="margin-bottom: 0px;">
                    <p class="dashboard-table-container-heading">Update Directions</p>
                    <div class="dashboard-table-container-div" id="form-wrap">

                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <label>Route No:</label>
                                    <?php
                                    $sqlrd = "SELECT * FROM all_routes WHERE route_no = '{$row['directionRoute']}'";
                                    $resultrd = mysqli_query($db, $sqlrd);
                                    $rowrd = mysqli_fetch_array($resultrd, MYSQLI_ASSOC)
                                    ?>
                                    <select name="directionRoute" id="directionRoute">
                                        <option value="<?php echo $row["directionRoute"]; ?>" selected hidden><?php echo $row["directionRoute"]; ?> (<?php echo place_name_en($rowrd["routeStartPlace"]); ?> - <?php echo place_name_en($rowrd["routeEndPlace"]); ?>)</option>
                                        <?php
                                        $sqlr = "SELECT * FROM all_routes";
                                        $resultr = mysqli_query($db, $sqlr);
                                        $countr = mysqli_num_rows($resultr);
                                        if ($countr > 0) {
                                        while ($rowr = mysqli_fetch_array($resultr, MYSQLI_ASSOC)) {
                                        ?>
                                                <option value="<?php echo $rowr['route_no']; ?>"><?php echo $rowr['route_no']; ?> (<?php echo place_name_en($rowr['routeStartPlace']); ?> - <?php echo place_name_en($rowr['routeEndPlace']); ?>)</option>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        } else {
                                            echo "<option value=''><i>No Route Found!</i></option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>

                            <?php
                            $sqlrdl = "SELECT * FROM all_directions WHERE direction_route = '{$row["directionRoute"]}'";
                            $resultrdl = mysqli_query($db, $sqlrdl);
                            $countrdl = mysqli_num_rows($resultrdl);
                            if ($countrdl > 0) {
                            $i = 1;
                            while ($rowrdl = mysqli_fetch_array($resultrdl, MYSQLI_ASSOC)) {
                            ?>
                            <tr>
                                <td>
                                    <label>Place Name:</label>
                                    <select name="placeName<?php echo $i; ?>" id="placeName<?php echo $i; ?>">
                                        <option value="<?php echo $rowrdl["direction_place"] ?>" selected hidden><?php echo place_name_en($rowrdl["direction_place"]) ?> (<?php echo place_name_bn($rowrdl["direction_place"]) ?>)</option>
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
                                    <label>Place Distance (KM):</label>
                                    <input type="text" name="placeDistance<?php echo $i; ?>" id="placeDistance<?php echo $i; ?>" value="<?php echo $rowrdl["direction_distance"] ?>">
                                    <input type="hidden" name="directionFieldId<?php echo $i; ?>" value="<?php echo $rowrdl["direction_id"]; ?>">
                                </td>
                                <td>
                                    <form method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="directionID" value="<?php echo $row['directionRoute']; ?>">
                                    <input type="hidden" name="directionFieldId" value="<?php echo $rowrdl["direction_id"]; ?>">
                                    <button onclick="return confirm('Are You Sure To Delete This Place?');" type="submit" name="family-delete-btn" id="family-delete-btn" class="delete-btn2" style="margin: 0;margin-top: 20px;"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                                <?php
                                $i++;
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

                <input type="hidden" id="box_count" name="box_count" value="<?php echo $countrdl; ?>">
                <input type="hidden" name="directionID" value="<?php echo $row['directionRoute']; ?>">
                <button onclick="showForm()" type="button" name="submit-btn" id="submit-btn"><i class="fa fa-save"></i> Update Direction</button>
            </form>

            <form id="form-delete-btn" method="post" enctype="multipart/form-data" onsubmit="return confirm('Are You Sure To Delete This Direction?');">
                <input type="hidden" name="routeID" value="<?php echo $row['route_id']; ?>">
                <button type="submit" name="delete-btn" id="delete-btn" class="delete-btn"><i class="fa fa-trash"></i> Delete Direction</button>
            </form>


        </div>

        <?php

    }

} else {
    echo "<script type='text/javascript'> document.location = 'admin/see-direction-list'; </script>";
    exit();
}



?>


<script src="assets/js/jquery.js"></script>

<script>
    $(document).ready(function () {
        $("#submit-btn").click(function () {

            var directionRoute = $("#directionRoute").val().trim();

            if(directionRoute == "") {

                alert("Fill The Form Correctly!");

            } else {

                $.ajax({
                    url: 'script/form-data-update-directions',
                    type: 'POST',
                    data: $('#directions-form-data').serialize(),
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
                        $('#directions-form-data').trigger("reset");
                        $("#directions-form-data").hide();
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
        $('#directions-form-data').show();
        $('#form-delete-btn').show();
        $('#response').hide();
    }
    function reTryForm () {
        $('#directions-form-data').show();
        $('#response').hide();
    }

</script>

