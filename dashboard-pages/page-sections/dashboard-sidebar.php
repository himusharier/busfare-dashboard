
<div class="side-bar sidebar-container-div" id="sidebar-container-div">
    <div class="menu">
        <div class="item"><a id="<?php if($_GET['pageId']=='dashboard') {echo 'page-active';}?>" onclick="LoaderShow()" href="admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></div>
        <div class="item">
            <a class="sub-btn"><i class="fa fa-map"></i> Places <i class="fa fa-angle-down"></i></a>
            <div class="sub-menu">
                <a id="<?php if($_GET['pageId']=='house-holding-add') {echo 'page-active';}?>" class="sub-item" onClick="LoaderShow()" href="admin/add-house-holding"><i class="fa fa-plus"></i> Add New Place</a>
                <a id="<?php if($_GET['pageId']=='house-holding-list') {echo 'page-active';}?><?php if($_GET['pageId']=='house-holding-data-update') {echo 'page-active';}?>" onclick="LoaderShow()" class="sub-item" href="admin/list-house-holding"><i class="fa fa-list"></i> See Place List</a>
            </div>
        </div>
        <div class="item">
            <a class="sub-btn"><i class="fa fa-road"></i> Routes <i class="fa fa-angle-down"></i></a>
            <div class="sub-menu">
                <a id="<?php if($_GET['pageId']=='trade-lic-add') {echo 'page-active';}?>" class="sub-item" onClick="LoaderShow()" href="admin/add-trade-license"><i class="fa fa-plus"></i> Add New Routes</a>
                <a id="<?php if($_GET['pageId']=='trade-lic-list') {echo 'page-active';}?><?php if($_GET['pageId']=='trade-lic-data-update') {echo 'page-active';}?>" onclick="LoaderShow()" class="sub-item" id="list-trade-licence" href="admin/list-trade-license"><i class="fa fa-list"></i> See Route List</a>
            </div>
        </div>
        <div class="item"><a id="<?php if($_GET['pageId']=='settings') {echo 'page-active';}?>" onclick="LoaderShow()" href="admin/dashboard"><i class="fa fa-cog"></i> Settings</a></div>
        <div class="item"><a id="<?php if($_GET['pageId']=='settings') {echo 'page-active';}?>" onclick="LoaderShow()" href="admin/dashboard"><i class="fa fa-cog"></i> Live API</a></div>

    </div>
</div>