<?php $header;?>
		<!--/sidebar-->
         <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                
                    
                </div>
               <div class="crumb-wrap" id="warningdiv" style="display:none">
            		<div class="crumb-list" id="warningtext">
						<strong>错误：</strong> <font color="#993300">角色名重复</font>
        			</div>
            	</div>
        </div>
    <div class="main-wrap">
        <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo $this->config->item('base_url');?>/admin/Product/doedit" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>产品名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" type="text" value="<?php echo $info['title']?>">
                                    <input type="hidden" name="productId" id="productId" value="<?php echo $info['productId']?>">
                                    <input type="hidden" name="imgName" id="imgName" value="<?php echo $info['imageName']?>">
                                </td>
                            </tr>
                            <tr>
                            	<th><i class="require-red">*</i>所属分类：</th>
                            	<td>
                                <select class="common-text required" name="typeId" id="typeId" >
                                <?php if(!empty($typelist)) foreach($typelist as $k=>$v){?>
                                    <option value="<?php echo $v['typeId']?>"<?php if($info['typeId'] == $v['typeId']){echo 'selected';}?>><?php echo $v['typeName']?></option>
                                <?php }?>
                                </select>
                                </td>
                            </tr>
                             <tr>
                                <th>原图：</th>
                                <td><img src="<?php echo $this->config->item('img_url').$info['imageName'];?>" width="100" height="60"></td>
                            </tr>
                            <tr>
                                <th>封面图片：</th>
                                <td><input class="common-text" name="imageName" id="imageName" size="50" type="file"></td>
                            </tr>
                            <tr>
                                <th>产品描述：</th>
                                <td><script id="contents" name="contents" type="text/plain" width="500">
        <?php echo $info['contents']?>
    </script></td>
                            </tr>
                            <tr>
                                <th>产品参数：</th>
                                <td><script id="param" name="param" type="text/plain" width="500">
        <?php echo $info['param']?>
    </script></td>
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
	var ue = UE.getEditor('contents');
	var ue = UE.getEditor('param');
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