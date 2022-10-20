
<script>
    document.title = 'Route List - <?php echo $rowChkSiteName["settingsValue"]; ?>';
</script>

<style>
    .responstable table {
        border-collapse: collapse;
        width: 100%;
    }

    .responstable td, .responstable th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 10px;
        font-family: 'Bangla', arial, sans-serif !important;
        font-size: 16px !important;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
    }
    .responstable th {
        background-color: #f5f5f5;
        color: #5e5e5e;
    }
</style>

<div class="content-body-main-div">

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Route List</p>

    <div class="dashboard-table-container">
        <p class="dashboard-table-container-heading"><i class="fa fa-road"></i> Route List</p>
        <table class="responstable">
            <tbody>

                <tr>
                    <th>Route No.</th>
                    <th>Route Name</th>
                    <th class="printDisplayNone">Option</th>
                </tr>
                <tr>
                    <td>317</td>
                    <td>
                        Diyabari <i class="fa fa-long-arrow-right"></i> Postogola
                        <br/>
                        <a class="banglaFont">(দিয়াবাড়ী <i class="fa fa-long-arrow-right"></i> পোস্তগোলা)</a>
                    </td>
                    <td class="printDisplayNone">
                        <form method="post" action="admin/update-house-holding" style="display: inline-block;">
                            <input type="hidden" name="formID" value="<?php echo $rowr['formID'] ?>">
                            <button onclick="LoaderShow()" type="submit" class="edit-window" data-formid="<?php echo $rowr['formID'] ?>" style="cursor: pointer; color: #FFFFFF; background: #23b14d; height: auto; border: 1px solid #23b14d; margin: 0; width: auto;padding: 5px 10px;border-radius: 2px;font-size: 14px;"><i class="fa fa-edit"></i> Edit Route</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>368</td>
                    <td>
                        Signboard <i class="fa fa-long-arrow-right"></i> Fantasy Kingdom
                        <br/>
                        <a class="banglaFont">(সাইনবোর্ড <i class="fa fa-long-arrow-right"></i> ফ্যান্টাসী কিংডম)</a>
                    </td>
                    <td class="printDisplayNone">
                        <form method="post" action="admin/update-house-holding" style="display: inline-block;">
                            <input type="hidden" name="formID" value="<?php echo $rowr['formID'] ?>">
                            <button onclick="LoaderShow()" type="submit" class="edit-window" data-formid="<?php echo $rowr['formID'] ?>" style="cursor: pointer; color: #FFFFFF; background: #23b14d; height: auto; border: 1px solid #23b14d; margin: 0; width: auto;padding: 5px 10px;border-radius: 2px;font-size: 14px;"><i class="fa fa-edit"></i> Edit Route</button>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>


</div>

