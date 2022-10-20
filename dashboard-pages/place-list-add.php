
<script>
    document.title = 'Add New Place - <?php echo $rowChkSiteName["settingsValue"]; ?>';
</script>

<div class="content-body-main-div">

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Add New Place /</p>


    <div id="response"></div>

    <form id="places-form-data" method="post" enctype="multipart/form-data">

        <div class="dashboard-table-container" style="margin-bottom: 0px;">
            <p class="dashboard-table-container-heading"><i class="fa fa-road"></i> Add New Place</p>
            <div class="dashboard-table-container-div" id="form-wrap">

                <table>
                    <tbody>
                    <tr>
                        <td>
                            <label>Place Name (EN)</label>
                            <input type="text" name="placeNameEn1" id="placeNameEn1" value="">
                        </td>
                        <td>
                            <label>Place Name (BN)</label>
                            <input type="text" name="placeNameBn1" id="placeNameBn1" value="">
                        </td>
                        <td><a onclick="add_more()" class="add-btn2" style="display:inline-block;margin: 0;margin-top: 20px; border-radius: 2px;"><i class="fa fa-plus"></i> Add Another Place</a></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>


        <input type="hidden" id="box_count" name="box_count" value="1">
        <button type="button" name="submit-btn" id="submit-btn"><i class="fa fa-save"></i> Save Place</button>
        <img style="display: none" src="assets/images/loader.gif" width="30" />
    </form>

</div>


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
                    url: 'script/form-data-insert-places',
                    type: 'POST',
                    data: $('#places-form-data').serialize(),
                    beforeSend: function () {
                        $("#submit-btn").html(
                            '<img src="assets/images/loader.gif" width="30" />');
                        $('#loader').show();
                    },
                    success: function (data) {
                        $("#submit-btn").html('<i class="fa fa-save"></i> Save Place');
                        $('#response').fadeIn();
                        $('#response').html(data);
                        $("#places-form-data").hide();
                        $('#loader').hide();
                    }
                });

            }

        });
    });
</script>

<script>
    function showForm () {
        $('#places-form-data').trigger("reset");
        $('#places-form-data').show();
        $('#response').hide();
    }
    function reTryForm () {
        $('#places-form-data').show();
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
            '                            <label>Place Name (EN)</label>' +
            '                            <input type="text" name="placeNameEn'+box_count+'" value="">' +
            '                        </td>' +
            '                        <td>' +
            '                            <label>Place Name (BN)</label>' +
            '                            <input type="text" name="placeNameBn'+box_count+'" value="">' +
            '                        </td>' +
            '                        <td>' +
            '                            <a onclick="remove_more('+box_count+')" class="delete-btn2" style="display:inline-block;margin: 0;margin-top: 20px;"><i class="fa fa-trash"></i> Remove</a>' +
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

