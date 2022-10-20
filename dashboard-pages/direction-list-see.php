
<script>
    document.title = 'Direction List - <?php echo $rowChkSiteName["settingsValue"]; ?>';
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

    <p class="page-direction"><i class="fa fa-link"></i> Admin Panel / Direction List</p>

    <div class="dashboard-table-container">
        <p class="dashboard-table-container-heading"><i class="fa fa-compass"></i> Direction List</p>
        <table class="responstable">
            <tbody>

                <tr>
                    <th>Route Details</th>
                    <th style="text-align: center;">Direction Details</th>
                    <th class="printDisplayNone">Option</th>
                </tr>
                <tr>
                    <td style="vertical-align: top;">
                        <a style="font-size: 26px;">317</a>
                        <br/><br/>
                        Diyabari <i class="fa fa-long-arrow-right"></i> Postogola
                        <br/>
                        <a class="banglaFont">(দিয়াবাড়ী <i class="fa fa-long-arrow-right"></i> পোস্তগোলা)</a>
                    </td>
                    <td style="padding: 0;border: 0;">
                        <table>
                            <tbody>
                            <tr>
                                <td>Diyabari (<a class="banglaFont">দিয়াবাড়ী</a>)</td>
                                <td style="text-align: center;">0.0 KM</td>
                            </tr>
                            <tr>
                                <td>Signboard (<a class="banglaFont">সাইনবোর্ড</a>)</td>
                                <td style="text-align: center;">4.7 KM</td>
                            </tr>
                            <tr>
                                <td>Diyabari (<a class="banglaFont">দিয়াবাড়ী</a>)</td>
                                <td style="text-align: center;">5.2 KM</td>
                            </tr>
                            <tr>
                                <td>Signboard (<a class="banglaFont">সাইনবোর্ড</a>)</td>
                                <td style="text-align: center;">6.7 KM</td>
                            </tr>
                            <tr>
                                <td>Diyabari (<a class="banglaFont">দিয়াবাড়ী</a>)</td>
                                <td style="text-align: center;">8.2 KM</td>
                            </tr>
                            <tr>
                                <td>Signboard (<a class="banglaFont">সাইনবোর্ড</a>)</td>
                                <td style="text-align: center;">10.4 KM</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td class="printDisplayNone" style="vertical-align: top;">
                        <form method="post" action="admin/update-house-holding" style="display: inline-block;">
                            <input type="hidden" name="formID" value="<?php echo $rowr['formID'] ?>">
                            <button onclick="LoaderShow()" type="submit" class="edit-window" data-formid="<?php echo $rowr['formID'] ?>" style="cursor: pointer; color: #FFFFFF; background: #23b14d; height: auto; border: 1px solid #23b14d; margin: 0; width: auto;padding: 5px 10px;border-radius: 2px;font-size: 14px;"><i class="fa fa-edit"></i> Edit Direction</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;">
                        <a style="font-size: 26px;">368</a>
                        <br/><br/>
                        Signboard <i class="fa fa-long-arrow-right"></i> Fantasy Kingdom
                        <br/>
                        <a class="banglaFont">(সাইনবোর্ড <i class="fa fa-long-arrow-right"></i> ফ্যান্টাসী কিংডম)</a>
                    </td>
                    <td style="padding: 0;border: 0;">
                        <table>
                            <tbody>
                            <tr>
                                <td>Diyabari (<a class="banglaFont">দিয়াবাড়ী</a>)</td>
                                <td style="text-align: center;">0.0 KM</td>
                            </tr>
                            <tr>
                                <td>Signboard (<a class="banglaFont">সাইনবোর্ড</a>)</td>
                                <td style="text-align: center;">4.7 KM</td>
                            </tr>
                            <tr>
                                <td>Diyabari (<a class="banglaFont">দিয়াবাড়ী</a>)</td>
                                <td style="text-align: center;">5.2 KM</td>
                            </tr>
                            <tr>
                                <td>Signboard (<a class="banglaFont">সাইনবোর্ড</a>)</td>
                                <td style="text-align: center;">6.7 KM</td>
                            </tr>
                            <tr>
                                <td>Diyabari (<a class="banglaFont">দিয়াবাড়ী</a>)</td>
                                <td style="text-align: center;">8.2 KM</td>
                            </tr>
                            <tr>
                                <td>Signboard (<a class="banglaFont">সাইনবোর্ড</a>)</td>
                                <td style="text-align: center;">10.4 KM</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td class="printDisplayNone" style="vertical-align: top;">
                        <form method="post" action="admin/update-house-holding" style="display: inline-block;">
                            <input type="hidden" name="formID" value="<?php echo $rowr['formID'] ?>">
                            <button onclick="LoaderShow()" type="submit" class="edit-window" data-formid="<?php echo $rowr['formID'] ?>" style="cursor: pointer; color: #FFFFFF; background: #23b14d; height: auto; border: 1px solid #23b14d; margin: 0; width: auto;padding: 5px 10px;border-radius: 2px;font-size: 14px;"><i class="fa fa-edit"></i> Edit Direction</button>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>


</div>

