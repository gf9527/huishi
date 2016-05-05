<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>飞宇科技网站管理系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>/public/admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>/public/admin/css/main.css"/>
    <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/public/admin/js/libs/modernizr.min.js">
    </script>
    <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/public/admin/js/jquery-1.7.2.min.js">
	</script>
    <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/public/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/public/ueditor/ueditor.all.js"></script>

</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="<?php echo $this->config->item('base_url');?>/admin/Index">首页</a></li>
                <li><a href="<?php echo $this->config->item('base_url');?>" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="<?php echo $this->config->item('base_url').'/admin/User/changeWord';?>">修改密码</a></li>
                <li><a href="<?php echo $this->config->item('base_url');?>/Login/loginOut">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
        	<ul class="sidebar-list">
        	<?php if(!empty($navlist)) foreach($navlist as $k=>$v){?>
                <li>
                    <a><i class="icon-font">&#xe003;</i><?php echo $v['pNavName'];?></a>
                    <ul class="sub-menu">
                    <?php foreach($v['snavlist'] as $key=>$val){?>
                        <li><a  href="<?php echo $this->config->item('base_url').$val['sNavUrl']?>" <?php if($webParam == $val['keyword']){echo 'style="background:#0CF"';}?>><i class="icon-font">&#xe008;</i><?php echo $val['sNavName']?></a></li>
                    <?php }?>
                    </ul>
                </li>
        	<?php }?>
            </ul>
        </div>
    </div>
</body>
</html>