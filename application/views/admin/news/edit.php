<?php $header;?>
		<!--/sidebar-->
         <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
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
                <form action="<?php echo $this->config->item('base_url');?>/admin/News/doedit" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>新闻标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" value="<?php echo $info['title'];?>" size="50" type="text">
                                    <input type="hidden" name="newsId" id="newsId" value="<?php echo $info['newsId']?>">
                                    <input type="hidden" name="imgName" id="imgName" value="<?php echo $info['imageName']?>">                                </td>
                            </tr>
                            <tr>
                                <th>新闻作者：</th>
                                <td><input class="common-text" value="<?php echo $info['editor'];?>" name="editor" id="editor" size="50" type="text"></td>
                            </tr>
                            <tr>
                                <th>原图：</th>
                                <td><img src="<?php echo $this->config->item('img_url').$info['imageName'];?>" width="100" height="60"></td>
                            </tr>
                            <tr>
                                <th>上传图片：</th>
                                <td><input class="common-text" name="imageName" id="imageName" size="50" type="file"></td>
                            </tr>
                            <tr>
                                <th>新闻内容：</th>
                                <td><script id="contents" name="contents" type="text/plain" width="500">
        <?php echo $info['contents'];?>
    </script></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit"   onclick="javascript:return checkButton()">
                                    
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
	 
 	var editor = $('#editor').val();
 	if (editor == '')
 	{
 		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">作者不能为空</font></strong>');return false;
 		
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