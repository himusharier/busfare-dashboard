<?php

if (empty($_POST["busID"])) {
    echo "<script type='text/javascript'> document.location = 'admin/see-bus-list'; </script>";
    die();
}

$busID = $_POST["busID"];

if (isset($_POST['delete-btn']) && $user_role == "admin"){

    $busID = $_POST["busID"];

    $delSql = "DELETE FROM all_buses WHERE bus_id = '$busID'";
    if (mysqli_query($db, $delSql)) {
        echo "<script type='text/javascript'> document.location = 'admin/see-bus-list'; </script>";
        die();
    }
}

$sql = "SELECT * FROM all_buses WHERE bus_id = {$busID}";
$result = mysqli_query($db, $sql) or die("Not Found!");

if (mysqli_num_rows($result) == 1) {

    while ($row = mysqli_fetch_assoc($result)) {

        ?>

        <script>
            document.title = 'Update A Bus - <?php echo $rowChkSiteName["settingsValue"]; ?>';
        </script>

        <div class="content-body-main-div">

            <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Bus List / Update Bus</p>

            <div id="response"></div>

            <form id="buses-form-data" method="post" enctype="multipart/form-data">

                <div class="dashboard-table-container" style="margin-bottom: 0px;">
                    <p class="dashboard-table-container-heading"><i class="fa fa-bus"></i> Update Bus</p>
                    <div class="dashboard-table-container-div">

                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <label>Bus Name (EN)<i style="color: red;">*</i></label>
                                    <input type="text" list="busNameEnList1" name="busNameEn1" id="busNameEn1" value="<?php echo $row['busNameEn']; ?>">
                                    <datalist id="busNameEnList1">
                                        <?php
                                        $sqlp = "SELECT * FROM all_buses";
                                        $resultp = mysqli_query($db, $sqlp);
                                        $countp = mysqli_num_rows($resultp);
                                        while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                                            ?>
                                            <option value="<?php echo $rowp['busNameEn']; ?>"><?php echo $rowp['busNameEn']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </datalist>
                                </td>
                                <td>
                                    <label>Bus Name (BN)</label>
                                    <input type="text" list="busNameBnList1" name="busNameBn1" id="busNameBn1" value="<?php echo $row['busNameBn']; ?>">
                                    <datalist id="busNameBnList1">
                                        <?php
                                        $sqlp = "SELECT * FROM all_buses";
                                        $resultp = mysqli_query($db, $sqlp);
                                        $countp = mysqli_num_rows($resultp);
                                        while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                                            ?>
                                            <option value="<?php echo $rowp['busNameBn']; ?>"><?php echo $rowp['busNameBn']; ?></option>
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

                <input type="hidden" name="busID" value="<?php echo $row['bus_id']; ?>">
                <button onclick="showForm()" type="button" name="submit-btn" id="submit-btn"><i class="fa fa-save"></i> Update Bus</button>
            </form>

            <form id="form-delete-btn" method="post" enctype="multipart/form-data" onsubmit="return confirm('Are You Sure To Delete This Bus?');">
                <input type="hidden" name="busID" value="<?php echo $row['bus_id']; ?>">
                <button type="submit" name="delete-btn" id="delete-btn" class="delete-btn"><i class="fa fa-trash"></i> Delete Bus</button>
            </form>


        </div>

        <?php

    }

} else {
    echo "<script type='text/javascript'> document.location = 'admin/see-bus-list'; </script>";
    exit();
}



?>


<script src="assets/js/jquery.js"></script>

<script>
    $(document).ready(function () {
        $("#submit-btn").click(function () {

            var busNameEn1 = $("#busNameEn1").val().trim();

            if(busNameEn1 == "") {

                alert("Fill The Form Correctly!");

            } else {

                $.ajax({
                    url: 'script/form-data-update-buses',
                    type: 'POST',
                    data: $('#buses-form-data').serialize(),
                    beforeSend: function () {
                        $("#submit-btn").html(
                            '<img src="assets/images/loader.gif" width="30" />');
                        $('#loader').show();
                        $('#delete-btn').hide();
                    },
                    success: function (data) {
                        $("#submit-btn").html('<i class="fa fa-save"></i> Update Bus');
                        $('#response').fadeIn();
                        $('#response').html(data);
                        $('#buses-form-data').trigger("reset");
                        $("#buses-form-data").hide();
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
        $('#buses-form-data').show();
        $('#form-delete-btn').show();
        $('#response').hide();
    }
    function reTryForm () {
        $('#buses-form-data').show();
        $('#response').hide();
    }

</script>

