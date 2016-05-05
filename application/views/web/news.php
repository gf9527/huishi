<?php $header?>
<div style="clear:both"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" height="198px" style="background:#cccccc url(<?php echo $this->config->item('base_url');?>/public/index/Images/topbannerbg.jpg) no-repeat center top;"><img src="<?php echo $this->config->item('base_url');?>/public/index/Picture/banner_pro.jpg" width="1001" height="198"></td>
  </tr>
</table>
<div id="container">

<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:0 auto">
      <tr>
        <td height="25"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          
        </table></td>
      </tr>
    </table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	  <td width="250" valign="top">
	  
<DIV id="right_menu" style="BACKGROUND: url(<?php echo $this->config->item('base_url');?>/public/index/Images/partat4.gif) no-repeat top left;">
    <H3><a href="list.asp?bc=4"><B><?php echo $navName?></B></a></H3>
    <UL style="padding:0 0">
    	<?php if(!empty($list)) foreach($list as $key=>$val){?>
      	<li><a href='<?php echo $this->config->item('base_url').'/Index/newscontents/'.$val['newsId'];?>'>&nbsp;&nbsp;<?php echo !empty($val['title']) ? $val['title'] : '';?></a></li>
      	<?php }?>
    </UL>
    <br style="clear:both;" />

</DIV>

      </td>
    <td width="730" valign="top">
    <table width="99%" border="0" align="center" cellpadding="2" cellspacing="0" class="border" style="word-break:break-all">
      <!--tr class="title">
        <td></td>
      </tr-->
		<tr>
			<td height="200" valign="top">
				<table width='100%' cellpadding='0' cellspacing='0' align=center>
            	<tr valign='top'><td align='center'><table width='100%' border='0' cellspacing='0' cellpadding='0' height='1px' style='border-bottom:1px solid #ccc;'>
                        <tr>
                            <td>
                                <img src='<?php echo $this->config->item('base_url');?>/public/index/Picture/spacer.gif'>
                            </td>
                        </tr>
				</table>
			</td>
		</tr>
	</table>
	<table width='100%' cellpadding='0' cellspacing='0' align=center>
    <tr valign='top'>
    	<td align='center' valign='middle'>
        <?php if(!empty($list)) foreach($list as $key=>$val){?>
        <table width='700' border='0' cellspacing='2' cellpadding='2' height='150px' style='border-bottom:1px solid #eeeeee;'>
        <tr>
        	<td width='280' height='200' rowspan='2'>
        	<a href='<?php echo $this->config->item('base_url').'/Index/newscontents/'.$val['newsId'];?>'><img src='<?php echo $this->config->item('img_url').$val['imageName'];?>' width='260' height='180' border='0'>
            </a>
            </td>
            <td width='400' height='30'>
            <a href='<?php echo $this->config->item('base_url').'/Index/newscontents/'.$val['newsId'];?>' class='nav2'><?php echo $val['title']?></a>
            </td>
            <td width='20' rowspan='2'>
            <a href='<?php echo $this->config->item('base_url').'/Index/newscontents/'.$val['newsId'];?>'>
            <img src='<?php echo $this->config->item('base_url');?>/public/index/Picture/cparrow.png' width='32' height='32' border='0'></a>
            </td>
		</tr>
        <tr>
        	<td valign='top' style='padding:0 2px'><?php echo cut_string(strip_tags($val['contents']),200,'...')?>
            </td>
       </tr>
	</table>
    <?php }?>
    </td>
    </table><br><br></td>
      </tr>
    </table></td>
  </tr>
</table>
</div>
<div class="clear"></div>
<div id="bottom_all">
    <div style="width:1000px; margin:0px auto; height:75px;">
        <div style="float:left; text-align:left width:600px; font-size:13px; color: #666; line-height:22px; padding-top:30px; ">        
        </div>
         <div style="width:300px; font-size:13px; margin:0 auto; padding:34px 5px 0 0; color: #333; float:right"><a href="#" class="foota">招贤纳才</a> | <a href="#">网站地图</a> | <a href="#">联系我们</a> | <a href="#">免责声明</a></div>
    </div>
</div>
</div>

</BODY>
</HTML>