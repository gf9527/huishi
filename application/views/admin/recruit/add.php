<?php $header;?>
		<!--/sidebar-->
         <div class="result-wrap">
			 <div class="crumb-wrap" id="warningdiv" style="display:none">
            		<div class="crumb-list" id="warningtext">
						<strong>错误：</strong> <font color="#993300">角色名重复</font>
        			</div>
            	</div>
        </div>
    <div class="main-wrap">
        <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo $this->config->item('base_url');?>/admin/Recruit/doadd" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>招聘标题：</th>
                                <td>
                                    <input class="common-text required"  id="title" name="title" size="50" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>工资：</th>
                                <td><input class="common-text" name="wages" id="wages" size="50"  type="text"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>学历要求：</th>
                                <td><input class="common-text" name="education" id="education" size="50" type="text"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>经验要求：</th>
                                <td><input class="common-text" name="experience" id="experience" size="50" type="text"></td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>招聘简介：</th>
                                <td><script id="contents" name="contents" type="text/plain" width="500">
        
    </script></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit"  onclick="javascript:return checkButton()">
                                    
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
	var ue = UE.getEditor('contents');
</script>
<script type="text/javascript">
function checkButton(){
	var title = $("#title").val();
    if(title == '')
    {
     	warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">标题不能为空</font></strong>');return false;
    }
    else if(title.length>40)
    {
     	warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">标题不能超过40个字</font></strong>');return false;
    }
	
	var wages = $("#wages").val();
    if(wages == '')
    {
     	warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">工资不能为空</font></strong>');return false;
    }
	
	var education = $("#education").val();
    if(education == '')
    {
     	warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">学历不能为空</font></strong>');return false;
    }
	
	var experience = $("#experience").val();
    if(experience == '')
    {
     	warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">经验不能为空</font></strong>');return false;
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