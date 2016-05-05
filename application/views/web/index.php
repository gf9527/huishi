<?php $header?>
<style>
img{border:none;}
.indexbanner{ width:100%; height:403px; position:relative; overflow:hidden;margin:-15PX 0 0 0 }
.num2{ position: relative;top:380px; z-index:10; margin:0 auto; width:1000px; text-align:right}
.num2 a{ width:10px; height:10px; display:inline-block; text-align:center; margin:3px 3px; cursor:pointer; font-size:9pt; background:#eeeeee}
.num2 a.cur{ background: #0CF;color:#fff;}
.indexbanner ul{ position:relative; z-index:5;padding:0;margin:0;}
.indexbanner ul li{ position: relative; display:none;list-style:none;}
</style> 
<style type="text/css">
#myFocus{ width:300px; height:200px; margin:0 auto}
</style>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/public/index/Scripts/mF_expo2010.js">
</script>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/public/index/Css/mF_expo2010.css">
</script>
<script type="text/javascript">
//设置
myFocus.set({
	id:'myFocus',//ID
	pattern:'mF_expo2010'//风格
});
</script>
<div style="clear:both"></div>
<div class="banner">
<!---banner切换-----> 
            <div class="indexbanner">
                <div class="num2"><a class="cur">&nbsp;</a><a>&nbsp;</a><a>&nbsp;</a></div>
             	<ul>
                    <li style="display:block; background:#2349A1"><img src="<?php echo $this->config->item('base_url');?>/public/index/Picture/ad1.jpg" width="1000" height="400" /></li>
                    <li style="background:#62AF33"><img src="<?php echo $this->config->item('base_url');?>/public/index/Picture/ad2.jpg" width="1000" height="400"/></li>
                    <li style="background:#A9B9B0"><img src="<?php echo $this->config->item('base_url');?>/public/index/Picture/ad3.jpg" width="1000" height="400"/></li>
                </ul>
            </div>
<!---banner切换end-----> 
</div>
<div class="clear"></div>
<div id="indexcon">
<div style="width:323px; height:280px; float:left; margin:15px auto 25px; margin-left:12px; border-left:1px solid #eeeeee;border-right:1px solid #eeeeee;border-bottom:1px solid #eeeeee;">
        <H2 style="background:url(<?php echo $this->config->item('base_url');?>/public/index/Images/partat2.gif) no-repeat top left;">展示中心</H2>
		<ul style="HEIGHT: 260px; padding-left:15px" class="news">
		  <?php if(!empty($newslist))foreach($newslist as $key=>$val){?>
          <li><a href="<?php echo $this->config->item('base_url').'/Index/newscontents/'.$val['newsId'];?>" class="a3"><?php echo $val['title'];?></a></li>
          <?php }?>
		</ul>
    </div>
    
	<div style="width:323px; height:280px; float:left; margin:15px auto 25px; margin-left:12px; border-left:1px solid #eeeeee;border-right:1px solid #eeeeee;border-bottom:1px solid #eeeeee;">
        <H2 style="background:url(<?php echo $this->config->item('base_url');?>/public/index/Images/partat2.gif) no-repeat top left;">解决方案</H2>
		<ul style="HEIGHT: 260px; padding-left:15px" class="news">
		  <?php if(!empty($list))foreach($list as $key=>$val){?>
          <li><a href="<?php echo $this->config->item('base_url').'/Index/schemecontents/'.$val['sId'];?>" class="a3"><?php echo $val['title'];?></a></li>
          <?php }?>
		</ul>
    </div>
    
  <div style="width:323px; height:280px; float:right; margin:15px auto 25px; border-left:1px solid #eeeeee;border-right:1px solid #eeeeee;border-bottom:1px solid #eeeeee;">
        <H2 style="background:url(<?php echo $this->config->item('base_url');?>/public/index/Images/partat2.gif) no-repeat top left;">产品中心</H2>
		<ul style="HEIGHT: 260px; padding-left:15px" class="news">
		  <?php if(!empty($productlist))foreach($productlist as $key=>$val){?>
          <li><a href="<?php echo $this->config->item('base_url').'/Index/productcontents/'.$val['productId'];?>" class="a3"><?php echo $val['title'];?></a></li>
          <?php }?>
		</ul>
    	
		</div>
    </div>
</div>
<div class="clear"></div>
<div class="clear"></div>
<div id="bottom_all">
    <div style="width:1000px; margin:0px auto; height:75px;">
        <div style="float:left; text-align:left width:600px; font-size:13px; color: #666; line-height:22px; padding-top:30px; ">        
        
        </div>
        <div style="width:300px; font-size:13px; margin:0 auto; padding:34px 5px 0 0; color: #333; float:right"><a href="#" class="foota">招贤纳才</a> | <a href="#">网站地图</a> | <a href="#">联系我们</a> | <a href="#">免责声明</a></div>
    </div>
</div>
</div>
</body>
</HTML>
