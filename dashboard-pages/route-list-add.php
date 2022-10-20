
<script>
    document.title = 'Add New Route - <?php echo $rowChkSiteName["settingsValue"]; ?>';
</script>

<div class="content-body-main-div">

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Add New Route /</p>


    <div id="response"></div>

    <form id="holding-form-data" method="post" enctype="multipart/form-data">

        <div class="dashboard-table-container" style="margin-bottom: 0px;">
            <p class="dashboard-table-container-heading"><i class="fa fa-road"></i> Add New Route</p>
            <div class="dashboard-table-container-div">

                <table>
                    <tbody>
                    <tr>
                        <td>
                            <label>Route No:</label>
                            <input type="text" name="idNumber" id="idNumber" value="">
                        </td>
                        <td>
                            <label>Route Start Place:</label>
                            <select name="cardStatus" id="cardStatus">
                                <option value="" selected>-- Select Place --</option>
                                <option value="1">Diyabari (দিয়াবাড়ী)</option>
                                <option value="2">Signboard (সাইনবোর্ড)</option>
                                <option value="2">Postogola (পোস্তগোলা)</option>
                            </select>
                        </td>
                        <td>
                            <label>Route End Place:</label>
                            <select name="cardStatus" id="cardStatus">
                                <option value="" selected>-- Select Place --</option>
                                <option value="1">Diyabari (দিয়াবাড়ী)</option>
                                <option value="2">Signboard (সাইনবোর্ড)</option>
                                <option value="2">Postogola (পোস্তগোলা)</option>
                            </select>
                        </td>
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

            var idNumber = $("#idNumber").val().trim();
            var pinNumber = $("#pinNumber").val().trim();
            var cardStatus = $("#cardStatus").val().trim();
            var holdingType = $("#holdingType").val().trim();
            var personName = $("#personName").val().trim();
            var wardNo = $("#wardNo").val().trim();

            if(idNumber == "" || pinNumber == "" || cardStatus == "" || holdingType == "" || personName == "" || wardNo == "") {

                alert("ফর্মটি সঠিকভাবে পূরণ করুন!");

            } else {

                $.ajax({
                    url: 'script/holding-form-data-insert',
                    type: 'POST',
                    data: $('#holding-form-data').serialize(),
                    beforeSend: function () {
                        $("#submit-btn").html(
                            '<img src="assets/images/loader.gif" width="30" />');
                        $('#loader').show();
                    },
                    success: function (data) {
                        $("#submit-btn").html('<i class="fa fa-save"></i> তথ্য সংরক্ষণ করুন');
                        $('#response').fadeIn();
                        $('#response').html(data);
                        $("#holding-form-data").hide();
                        $('#loader').hide();
                    }
                });

            }

        });
    });
</script>

<script>
    function showForm () {
        $('#holding-form-data').trigger("reset");
        $('#holding-form-data').show();
        $('#response').hide();
    }
    function reTryForm () {
        $('#holding-form-data').show();
        $('#response').hide();
    }
</script>

