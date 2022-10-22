
<?php


if (empty($_POST["placeID"])) {
    echo "<script type='text/javascript'> document.location = 'admin/see-place-list'; </script>";
    die();
}

include "../configs/database-connection.php";

$placeID = $_POST["placeID"];

if (isset($_POST['delete-btn']) && $user_role == "admin"){

    $placeID = $_POST["placeID"];

    $delSql = "DELETE FROM all_places WHERE place_id = '$placeID'";
    if (mysqli_query($db, $delSql)) {
        echo "<script type='text/javascript'> document.location = 'admin/see-place-list'; </script>";
        die();
    }
}

$sql = "SELECT * FROM all_places WHERE place_id = {$placeID}";
$result = mysqli_query($db, $sql) or die("Not Found!");

if (mysqli_num_rows($result) == 1) {

    while ($row = mysqli_fetch_assoc($result)) {

        ?>

        <script>
            document.title = 'Update A Place - <?php echo $rowChkSiteName["settingsValue"]; ?>';
        </script>

        <div class="content-body-main-div">

            <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Place List / Update Place</p>

            <div id="response"></div>

            <form id="places-form-data" method="post" enctype="multipart/form-data">

                <div class="dashboard-table-container" style="margin-bottom: 0px;">
                    <p class="dashboard-table-container-heading"><i class="fa fa-map"></i> Update Place</p>
                    <div class="dashboard-table-container-div">

                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <label>Place Name (EN)</label>
                                    <input type="text" list="placeNameEnList1" name="placeNameEn1" id="placeNameEn1" value="<?php echo $row['placeNameEn']; ?>">
                                    <datalist id="placeNameEnList1">
                                        <?php
                                        require ('configs/database-connection.php');
                                        $sqlp = "SELECT * FROM all_places";
                                        $resultp = mysqli_query($db, $sqlp);
                                        $countp = mysqli_num_rows($resultp);
                                        while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                                            ?>
                                            <option value="<?php echo $rowp['placeNameEn']; ?>"><?php echo $rowp['placeNameEn']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </datalist>
                                </td>
                                <td>
                                    <label>Place Name (BN)</label>
                                    <input type="text" list="placeNameBnList1" name="placeNameBn1" id="placeNameBn1" value="<?php echo $row['placeNameBn']; ?>">
                                    <datalist id="placeNameBnList1">
                                        <?php
                                        require ('configs/database-connection.php');
                                        $sqlp = "SELECT * FROM all_places";
                                        $resultp = mysqli_query($db, $sqlp);
                                        $countp = mysqli_num_rows($resultp);
                                        while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                                            ?>
                                            <option value="<?php echo $rowp['placeNameBn']; ?>"><?php echo $rowp['placeNameBn']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </datalist>
                                </td>
                                <td></td>
                            </tr>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <input type="hidden" name="placeID" value="<?php echo $row['place_id']; ?>">
                <button onclick="showForm()" type="button" name="submit-btn" id="submit-btn"><i class="fa fa-save"></i> Update Place</button>
            </form>

            <form id="form-delete-btn" method="post" enctype="multipart/form-data" onsubmit="return confirm('Are You Sure To Delete This Place?');">
                <input type="hidden" name="placeID" value="<?php echo $row['place_id']; ?>">
                <button type="submit" name="delete-btn" id="delete-btn" class="delete-btn"><i class="fa fa-trash"></i> Delete Place</button>
            </form>


        </div>

        <?php

    }

} else {
    echo "<script type='text/javascript'> document.location = 'admin/see-place-list'; </script>";
    exit();
}



?>


<script src="assets/js/jquery.js"></script>

<script>
    $(document).ready(function () {
        $("#submit-btn").click(function () {

            var placeNameEn1 = $("#placeNameEn1").val().trim();
            var placeNameBn1 = $("#placeNameBn1").val().trim();

            if(placeNameEn1 == "" || placeNameBn1 == "") {

                alert("Fill The Form Correctly!");

            } else {

                $.ajax({
                    url: 'script/form-data-update-places',
                    type: 'POST',
                    data: $('#places-form-data').serialize(),
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
                        $('#places-form-data').trigger("reset");
                        $("#places-form-data").hide();
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
        $('#places-form-data').show();
        $('#form-delete-btn').show();
        $('#response').hide();
    }
    function reTryForm () {
        $('#places-form-data').show();
        $('#response').hide();
    }

</script>

