<?php $header;?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>public/index/Content/nxt.css">
<LINK href="<?php echo $this->config->item('base_url');?>public/index/sContent/test.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>public/index/sContent/xuanxiangka.css" />
	<script type=text/javascript>
		<!--
		function setTab(name,cursel,n){
		for(i=1;i<=n;i++){
		var menu=document.getElementById(name+i);
		var con=document.getElementById("con_"+name+"_"+i);
		menu.className=i==cursel?"hover":"";
		con.style.display=i==cursel?"block":"none";
		}
	}
	//-->
	</script>
<style type="text/css">
td#fontzoom IMG {
 max-width:710px; 
 width:expression(this.width > 710 && this.height < this.width ? 710: true); 
}</style>
<div style="clear:both"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" height="198px" style="background:#cccccc url(<?php echo $this->config->item('base_url');?>/public/index/Images/topbannerbg.jpg) no-repeat center top; "><img src="<?php echo $this->config->item('base_url');?>/public/index/Picture/banner_pro.jpg" width="1001" height="198"></td>
  </tr>
</table>
<div id="container">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:0 auto">
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="margin:0 auto;">
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="250" valign="top">
<DIV id="right_menu" style="BACKGROUND: url(<?php echo $this->config->item('base_url');?>/public/index/Images/partat2.gif) no-repeat top left;">
    <H3><a href="list.asp?bc=2"><B>展示中心</B></a></H3>
    <UL style="padding:0 0">
    <?php if(!empty($list)) foreach($list as $key=>$val){?>
    <li><a href='<?php echo $this->config->item('base_url').'/Index/newscontents/'.$val['newsId'];?>'><?php if($val['newsId'] == $info['newsId']){echo '<font class="leftsc">';}?>&nbsp;&nbsp;<?php echo !empty($val['title']) ? $val['title'] : ''?></font></a></li>
    <?php }?>
    </UL>
    <br style="clear:both;" />

</DIV>
</td>
        <td width="730" valign="top">
           <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="border" style="word-break:break-all;">
            <tr class="title">
              <td align="center" style="text-align: center;">
<table width='100%' border='0' cellspacing='0' cellpadding='0' height='1px' style='border-bottom:1px solid #ccc; margin-top:2px'><tr><td><img src='<?php echo $this->config->item('base_url');?>/public/index/Picture/spacer.gif'></td></tr></table>
              <table align="center" style="margin:0 auto; margin-top:10px">
                <tr>
                  <td class="t14b" style="padding-bottom:5px"><?php echo !empty($info['title']) ? $info['title'] : '';?></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="300" valign="top" style="padding-left:15px">
              <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="t12black" id="fontzoom" style="line-height:24px; padding-top:20px">
				  
                    <div id="lib_Tab1">
                      <div class="lib_Menubox lib_tabborder">
                        <ul>
                          <li id="one1" onClick="setTab('one',1,4)" class="hover"><span>展示内容</span></li>
                        </ul>
                      </div>
                      <div class="lib_Contentbox lib_tabborder">
                        <div id="con_one_1" class="text_div" >
                        <p class="MsoNormal" style="text-align:left;mso-margin-top-alt:auto; mso-margin-bottom-alt: auto; mso-pagination: widow-orphan" align="left"><span>&nbsp;</span></P>
<?php echo !empty($info['contents']) ? $info['contents'] : '';?></P>
<P class=MsoNormal style="TEXT-ALIGN: left; MARGIN: 0cm 0cm 0pt; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; mso-pagination: widow-orphan" align=left><SPAN lang=EN-US style="FONT-SIZE: 9pt; FONT-FAMILY: 宋体; COLOR: #030303; mso-bidi-font-family: 宋体; mso-font-kerning: 0pt"></div>
                      </div>
                    </div>
                  
                  </td>
                </tr>
              </table>
             <br><br>
             </td>
            </tr>
          </table></td>
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
<!--版权信息部分 -->

</div>
</body>
</html>
