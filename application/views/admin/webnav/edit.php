<?php $header;?>
		<!--/sidebar-->
         <div class="result-wrap">
			<div class="crumb-wrap" id="warningdiv" style="display:none">
				<div class="crumb-list" id="warningtext">
					<strong>错误：</strong> <font color="#993300">角色名重复</font>
        		</div>
          	</div>
		</div>
  <div class="panel-default">
    <div class="panel-body">
      <div class="row text-right"> 
       <div class="btn-group pull-right"> <a class="btn btn-default btn-sm" href="<?php echo $this->config->item('base_url');?>/admin/Webnav/index">返回</a></div>
      </div>
    </div>
  </div>
    <div class="main-wrap">
        <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo $this->config->item('base_url');?>/admin/Webnav/doedit" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>导航名称：</th>
                                <td>
                                    <input class="common-text required" id="navName" name="navName" size="50" type="text" value="<?php echo $info['navName']?>">
                                    <input type="hidden" name="wId" id="wId" value="<?php echo $info['wId']?>">
                                </td>
                            </tr>
                             <tr>
                                <th>导航关键字：</th>
                                <td><input class="common-text" name="keyword" id="keyword" size="50" type="text" value="<?php echo $info['keyword'];?>"></td>
                            </tr>
                            <tr>
                                <th>导航链接：</th>
                                <td><input class="common-text" name="navUrl" id="navUrl" size="50" type="text" value="<?php echo $info['navUrl'];?>"></td>
                            </tr>
                            <tr>
                                <th>导航排序：</th>
                                <td><input class="common-text" name="sort" id="sort" size="50" type="text" value="<?php echo $info['sort'];?>"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit" onclick="javascript:return checkButton()">
                                    
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
<script type="text/javascript">
function checkButton(){
	var navName = $("#navName").val();
    if(navName == '')
    {
     	warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">导航名称不能为空</font></strong>');return false;
    }
    else if(navName.length>6)
    {
     	warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">导航名称不能超过6个字</font></strong>');return false;
    }
	 
 	var keyword = $('#keyword').val();
 	if (keyword == '')
 	{
 		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">导航关键字不能为空</font></strong>');return false;	
 	}
	
	var navUrl = $('#navUrl').val();
 	if (navUrl == '')
 	{
 		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">导航链接不能为空</font></strong>');return false;		
 	}
 	$('#myform').submit(function (){
 		$(this).serialize();
 	});
 }
	     
function warning(a)
{
	$('#warningtext').html(a);
	$('#warningdiv').show();
}
</script>
</body>
</html>