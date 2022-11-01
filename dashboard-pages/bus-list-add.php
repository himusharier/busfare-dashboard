
<script>
    document.title = 'Add New Bus - <?php echo $rowChkSiteName["settingsValue"]; ?>';
</script>

<div class="content-body-main-div">

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Add New Bus /</p>


    <div id="response"></div>

    <form id="buses-form-data" method="post" enctype="multipart/form-data">

        <div class="dashboard-table-container" style="margin-bottom: 0px;">
            <p class="dashboard-table-container-heading"><i class="fa fa-bus"></i> Add New Bus</p>
            <div class="dashboard-table-container-div" id="form-wrap">

                <table>
                    <tbody>
                    <tr>
                        <td>
                            <label>Bus Name (EN)<i style="color: red;">*</i></label>
                            <input type="text" list="busNameEnList1" name="busNameEn1" id="busNameEn1" value="">
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
                            <input type="text" list="busNameBnList1" name="busNameBn1" id="busNameBn1" value="">
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
                        <td><a onclick="add_more()" class="add-btn2" style="display:inline-block;margin: 0;margin-top: 20px; border-radius: 4px;"><i class="fa fa-plus"></i> Add Another Bus</a></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>


        <input type="hidden" id="box_count" name="box_count" value="1">
        <button type="button" name="submit-btn" id="submit-btn"><i class="fa fa-save"></i> Save Bus</button>
        <img style="display: none" src="assets/images/loader.gif" width="30" />
    </form>

</div>


<script src="assets/js/jquery.js"></script>

<script>
    $(document).ready(function () {
        $("#submit-btn").click(function () {

            var busNameEn1 = $("#busNameEn1").val().trim();

            if(busNameEn1 == "") {

                alert("Fill The Form Correctly!");

            } else {

                $.ajax({
                    url: 'script/form-data-insert-buses',
                    type: 'POST',
                    data: $('#buses-form-data').serialize(),
                    beforeSend: function () {
                        $("#submit-btn").html(
                            '<img src="assets/images/loader.gif" width="30" />');
                        $('#loader').show();
                    },
                    success: function (data) {
                        $("#submit-btn").html('<i class="fa fa-save"></i> Save Bus');
                        $('#response').fadeIn();
                        $('#response').html(data);
                        $("#buses-form-data").hide();
                        $('#loader').hide();
                    }
                });

            }

        });
    });
</script>

<script>
    function showForm () {
        $('#buses-form-data').trigger("reset");
        $('#buses-form-data').show();
        $('#response').hide();
    }
    function reTryForm () {
        $('#buses-form-data').show();
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
            '                            <label>Bus Name (EN)</label>' +
            '                            <input type="text" list="busNameEnList'+box_count+'" name="busNameEn'+box_count+'" value="">' +
            '<datalist id="busNameEnList'+box_count+'">' +
            '<?php
            require ('configs/database-connection.php');
            $sqlp = "SELECT * FROM all_buses";
            $resultp = mysqli_query($db, $sqlp);
            $countp = mysqli_num_rows($resultp);
            while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
            ?>' +
            '<option value="<?php echo $rowp['busNameEn']; ?>"><?php echo $rowp['busNameEn']; ?></option>' +
            '<?php
            }
            ?>' +
            '</datalist>' +
            '                        </td>' +
            '                        <td>' +
            '                            <label>Bus Name (BN)</label>' +
            '                            <input type="text" list="busNameBnList'+box_count+'" name="busNameBn'+box_count+'" value="">' +
            '<datalist id="busNameBnList'+box_count+'">' +
            '<?php
                require ('configs/database-connection.php');
                $sqlp = "SELECT * FROM all_buses";
                $resultp = mysqli_query($db, $sqlp);
                $countp = mysqli_num_rows($resultp);
                while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
                ?>' +
            '<option value="<?php echo $rowp['busNameBn']; ?>"><?php echo $rowp['busNameBn']; ?></option>' +
            '<?php
                }
                ?>' +
            '</datalist>' +
            '                        </td>' +
            '                        <td>' +
            '                            <a onclick="remove_more('+box_count+')" class="delete-btn2" style="display:inline-block;margin: 0;margin-top: 20px;border-radius: 4px;"><i class="fa fa-times"></i> Remove</a>' +
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

