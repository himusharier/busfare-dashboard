
<div class="side-bar sidebar-container-div" id="sidebar-container-div">
    <div class="menu">
        <div class="item"><a id="<?php if($_GET['pageId']=='dashboard') {echo 'page-active';}?>" onclick="LoaderShow()" href="admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></div>
        <div class="item">
            <a class="sub-btn"><i class="fa fa-map"></i> Places <i class="fa fa-angle-down"></i></a>
            <div class="sub-menu">
                <a id="<?php if($_GET['pageId']=='place-list-see') {echo 'page-active';}?><?php if($_GET['pageId']=='place-list-update') {echo 'page-active';}?>" onclick="LoaderShow()" class="sub-item" href="admin/see-place-list"><i class="fa fa-list"></i> See Place List</a>
                <a id="<?php if($_GET['pageId']=='place-list-add') {echo 'page-active';}?>" class="sub-item" onClick="LoaderShow()" href="admin/add-new-place"><i class="fa fa-plus"></i> Add New Place</a>
            </div>
        </div>
        <div class="item">
            <a class="sub-btn"><i class="fa fa-road"></i> Routes <i class="fa fa-angle-down"></i></a>
            <div class="sub-menu">
                <a id="<?php if($_GET['pageId']=='route-list-see') {echo 'page-active';}?><?php if($_GET['pageId']=='route-list-update') {echo 'page-active';}?>" onclick="LoaderShow()" class="sub-item" id="list-trade-licence" href="admin/see-route-list"><i class="fa fa-list"></i> See Route List</a>
                <a id="<?php if($_GET['pageId']=='route-list-add') {echo 'page-active';}?>" class="sub-item" onClick="LoaderShow()" href="admin/add-new-route"><i class="fa fa-plus"></i> Add New Route</a>
            </div>
        </div>
        <div class="item">
            <a class="sub-btn"><i class="fa fa-compass"></i> Directions <i class="fa fa-angle-down"></i></a>
            <div class="sub-menu">
                <a id="<?php if($_GET['pageId']=='direction-list-see') {echo 'page-active';}?><?php if($_GET['pageId']=='direction-list-update') {echo 'page-active';}?>" onclick="LoaderShow()" class="sub-item" href="admin/see-direction-list"><i class="fa fa-list"></i> See All Directions</a>
                <a id="<?php if($_GET['pageId']=='direction-list-add') {echo 'page-active';}?>" class="sub-item" onClick="LoaderShow()" href="admin/add-new-direction"><i class="fa fa-plus"></i> Set New Direction</a>
            </div>
        </div>
        <div class="item"><a id="<?php if($_GET['pageId']=='api-settings') {echo 'page-active';}?>" onclick="LoaderShow()" href="admin/settings"><i class="fa fa-cog"></i> Settings</a></div>
        <div class="item"><a id="<?php if($_GET['pageId']=='api-live') {echo 'page-active';}?>" onclick="LoaderShow()" href="admin/live-api"><i class="fa fa-cogs"></i> Live API</a></div>

    </div>
</div>