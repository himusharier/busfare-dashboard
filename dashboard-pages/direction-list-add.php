
<script>
    document.title = 'Add New Directions - <?php echo $rowChkSiteName["settingsValue"]; ?>';
</script>

<div class="content-body-main-div">

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Add New Directions /</p>


    <div id="response"></div>

    <form id="directions-form-data" method="post" enctype="multipart/form-data">

        <div class="dashboard-table-container" style="margin-bottom: 0px;">
            <p class="dashboard-table-container-heading"><i class="fa fa-compass"></i> Add New Directions</p>
            <div class="dashboard-table-container-div" id="form-wrap">

                <table>
                    <tbody>
                    <tr>
                        <td>
                            <label>Route No:</label>
                            <select name="routeNo" id="routeNo">
                                <option value="" selected hidden>-- Select Route --</option>
                                <?php
                                require ('configs/database-connection.php');
                                $sqlr = "SELECT * FROM all_routes";
                                $resultr = mysqli_query($db, $sqlr);
                                $countr = mysqli_num_rows($resultr);
                                if ($countr > 0) {
                                    function place_name_en($data)
                                    {
                                        include "configs/database-connection.php";
                                        $data = "SELECT * FROM all_places WHERE place_id = {$data}";
                                        $data = mysqli_query($db, $data);
                                        $data = mysqli_fetch_array($data, MYSQLI_ASSOC);
                                        $data = $data["placeNameEn"];
                                        return $data;
                                    }
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
                        <td>
                            <label>Place Name:</label>
                            <select name="placeName1" id="placeName1">
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
                            <label>Place Distance (KM):</label>
                            <input type="text" name="placeDistance1" id="placeDistance1" value="">
                        </td>
                        <td><a onclick="add_more()" class="add-btn2" style="display:inline-block;margin: 0;margin-top: 20px; border-radius: 4px;"><i class="fa fa-plus"></i> Add Another Place</a></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>


        <input type="hidden" id="box_count" name="box_count" value="1">
        <button type="button" name="submit-btn" id="submit-btn"><i class="fa fa-save"></i> Save Direction</button>
        <img style="display: none" src="assets/images/loader.gif" width="30" />
    </form>

</div>


<script src="assets/js/jquery.js"></script>

<script>
    $(document).ready(function () {
        $("#submit-btn").click(function () {

            var routeNo = $("#routeNo").val().trim();
            var placeName1 = $("#placeName1").val().trim();
            var placeDistance1 = $("#placeDistance1").val().trim();

            if(routeNo == "" || placeName1 == "" || placeDistance1 == "") {

                alert("Fill The Form Correctly!");

            } else {

                $.ajax({
                    url: 'script/form-data-insert-directions',
                    type: 'POST',
                    data: $('#directions-form-data').serialize(),
                    beforeSend: function () {
                        $("#submit-btn").html(
                            '<img src="assets/images/loader.gif" width="30" />');
                        $('#loader').show();
                    },
                    success: function (data) {
                        $("#submit-btn").html('<i class="fa fa-save"></i> Save Direction');
                        $('#response').fadeIn();
                        $('#response').html(data);
                        $("#directions-form-data").hide();
                        $('#loader').hide();
                    }
                });

            }

        });
    });
</script>

<script>
    function showForm () {
        $('#directions-form-data').trigger("reset");
        $('#directions-form-data').show();
        $('#response').hide();
    }
    function reTryForm () {
        $('#directions-form-data').show();
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
            '                        </td>' +
            '                        <td>' +
            '                            <label>Place Name:</label>' +
            '                            <select name="placeName'+box_count+'" id="placeName'+box_count+'">' +
            '                            <option value="" selected hidden>-- Select Place --</option>' +
'<?php
    require ('configs/database-connection.php');
    $sqlp = "SELECT * FROM all_places";
    $resultp = mysqli_query($db, $sqlp);
    $countp = mysqli_num_rows($resultp);
    if ($countp > 0) {
        while ($rowp = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {
    ?>'+
            '<option value="<?php echo $rowp['place_id']; ?>"><?php echo $rowp['placeNameEn']; ?> (<?php echo $rowp['placeNameBn']; ?>)</option>'+
'<?php
   }
?>
<?php
} else {
    echo "<option value=''><i>No Place Found!</i></option>";
}
?>' +
            '                        </td>' +
            '                        <td>' +
            '                            <label>Place Distance (KM):</label>' +
            '                            <input type="text" name="placeDistance'+box_count+'" id="placeDistance'+box_count+'" value="">' +
            '                        </td>' +
            '                        <td>' +
            '                            <a onclick="remove_more('+box_count+')" class="delete-btn2" style="display:inline-block;margin: 0;margin-top: 20px;border-radius: 4px;"><i class="fa fa-trash"></i> Remove</a>' +
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

