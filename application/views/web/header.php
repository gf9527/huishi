<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>北达正视（北京）科技有限公司</title>
<meta name="keywords" content="北达正视 北达正视（北京）科技有限公司 智能交通 平安城市 电子警察 治安卡口"/>
<meta name="description" content="北达正视（北京）科技有限公司，在视觉识别、智能视频分析等领域拥有多项自主知识产权，其核心技术曾多次获得国际视频识别算法评测第一名。基于雄厚的技术实力，心怀科技改变未来的动力，公司不断的开拓创新，已拥有一体化智能相机、视频前端软件系统、视频大数据处理后台系统等一系列自主研发的产品，并针对智能交通、智慧城市、智能社区、智能电力、部队、媒体等行业提供专业解决方案。"/>
<LINK href="/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>/public/index/Css/nxt.css">
<LINK href="<?php echo $this->config->item('base_url');?>/public/index/Css/test.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>/public/index/Css/xuanxiangka.css" />
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/public/index/Scripts/jquery1.3.2.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/public/index/Scripts/bannerq.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/public/index/Scripts/myfocus-2.0.1.min.js"></script>
<body>
<div class="autobody">
    <div class="head">
        <div class="head_l">
        <div class="head_lp"></div>
        <a href="<?php echo $this->config->item('base_url');?>/public/index/default.asp"><img src="<?php echo $this->config->item('img_url').$logo;?>" width="150" height="60" border="0" style="padding-left:3px"></a>
		</div>
        <div class="head_r">
            <div class="menu_right">
            <?php if(!empty($navlist)) foreach($navlist as $k=>$v){?>
                <div class="menu1_right"><a href="<?php echo $this->config->item('base_url').$v['navUrl'];?>"  <?php if($v['keyword'] == $navParam){echo 'class=on';}?>><?php echo $v['navName'];?></a></div>
            <?php }?>
            </div>
      </div>
    </div>
</div>