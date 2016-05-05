	<?php $header;?>
    <div class="main-wrap">
        <div class="crumb-wrap" id="warningdiv" style="display:none">
            		<div class="crumb-list" id="warningtext">
						<strong>错误：</strong> <font color="#993300">角色名重复</font>
        			</div>
            	</div>
        <div class="result-wrap">
            <form action="<?php echo $this->config->item('base_url').'/admin/Edition/doadd';?>" method="post" id="myform" name="myform"  enctype="multipart/form-data">
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe00a;</i>服务流程</h1>
                    </div>
                    <div class="result-content">
                        <table width="100%" class="insert-tab">
                            <tbody>
                            <tr>
                                <th width="15%"><i class="require-red">*</i>版本名称：</th>
                                <td><input type="text" id="editionName" value="<?php echo empty($info['editionName']) ? '请输入版本名称' : $info['editionName']?>" size="85" name="editionName" class="common-text"></td>
                                <input type="hidden" name="eId" id="eId" value="<?php echo empty($info['eId']) ? '0' : $info['eId']?>"
                            </tr>
                            <tr>
                                <th width="15%"><i class="require-red">*</i>版本号：</th>
                                <td><input type="text" id="number" value="<?php echo empty($info['number']) ? '请输入版本号' : $info['number']?>" size="85" name="number" class="common-text"></td>
                                <input type="hidden" name="filepath" id="filepath" value="<?php echo empty($info['filepath']) ? '' : $info['filepath']?>">
                            </tr>
                            <?php if(!empty($info['filepath'])){?>
                            <tr>
                                <th width="15%"><i class="require-red">*</i>版本文件：</th>
                                <td><a href="<?php echo empty($info['filepath']) ? '' : $info['filepath']?>">版本下载</a></td>
                            </tr>
                            <?php }?>
                             <tr>
                                <th width="15%"><i class="require-red">*</i>版本号：</th>
                                <td><input type="file" id="filepath" size="85" name="filepath" class="common-text"></td>
                                
                            </tr>
                                <tr>
                                    <th><i class="require-red">*</i>版本描述：</th>
                                    <td>
                                    <script id="contents" name="contents" type="text/plain" width="500">
        <?php echo empty($info['contents']) ? '请输入内容' : $info['contents'];?>
    </script>
									</td>
                                </tr>
                               <tr>
                                    <th></th>
                                    <td>
                                        <input type="submit" value="提交" class="btn btn-primary btn6 mr10" onclick="javascript:return checkButton()">
                                    </td>
                                </tr>
                            </tbody></table>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
<script type="text/javascript">
	var ue = UE.getEditor('contents');
</script>
<script type="text/javascript">
function checkButton(){
	var editionName = $("#editionName").val();
    if(editionName == '')
    {
     	warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">版本名称不能为空</font></strong>');return false;
    }
    else if(editionName.length>20)
    {
     	warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">版本名称不能超过20个字</font></strong>');return false;
    }
	 
 	var number = $('#number').val();
 	if (number == '')
 	{
 		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">版本号不能为空</font></strong>');return false;	
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