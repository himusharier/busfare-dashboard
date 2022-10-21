
<?php


if (empty($_POST["routeID"])) {
    echo "<script type='text/javascript'> document.location = 'admin/see-route-list'; </script>";
    die();
}

include "../configs/database-connection.php";

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
                    <p class="dashboard-table-container-heading">Update Route</p>
                    <div class="dashboard-table-container-div">

                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <label>Route No:</label>
                                    <input type="text" name="routeNo" id="routeNo" value="<?php echo $row["route_no"]; ?>">
                                </td>
                                <td>
                                    <label>Route Start Place:</label>
                                    <select name="routeStartPlace" id="routeStartPlace">
                                        <option value="<?php echo $row["routeStartPlace"]; ?>" selected hidden>
                                            <?php echo place_name_en($row["routeStartPlace"]); ?>
                                            (<?php echo place_name_bn($row["routeStartPlace"]); ?>)
                                        </option>
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
                                        <option value="<?php echo $row["routeEndPlace"]; ?>" selected hidden>
                                            <?php echo place_name_en($row["routeEndPlace"]); ?>
                                            (<?php echo place_name_bn($row["routeEndPlace"]); ?>)
                                        </option>
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

                <input type="hidden" name="routeID" value="<?php echo $row['route_id']; ?>">
                <button onclick="showForm()" type="button" name="submit-btn" id="submit-btn"><i class="fa fa-save"></i> Update Route</button>
            </form>

            <form id="form-delete-btn" method="post" enctype="multipart/form-data" onsubmit="return confirm('Are You Sure To Delete This Route?');">
                <input type="hidden" name="routeID" value="<?php echo $row['route_id']; ?>">
                <button type="submit" name="delete-btn" id="delete-btn" class="delete-btn"><i class="fa fa-trash"></i> Delete</button>
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

            var routeNo = $("#routeNo").val().trim();
            var routeStartPlace = $("#routeStartPlace").val().trim();
            var routeEndPlace = $("#routeEndPlace").val().trim();

            if(routeNo == "" || routeStartPlace == "" || routeEndPlace == "") {

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

