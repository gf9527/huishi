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
                <form action="<?php echo $this->config->item('base_url');?>/admin/Navigate/doedit" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>所属分类：</th>
                            <td>
                                <select name="pNavId" id="pNavId" class="common-text" >
                                <?php if(!empty($navlist)) foreach($navlist as $k=>$v){?>
                                    <option value="<?php echo $v['pNavId']?>"<?php if($info['pNavId']==$v['pNavId']){echo 'selected';}?>><?php echo $v['pNavName']?></option>
                                <?php }?>
                                </select>
                                <input value="<?php echo $info['sNavId'];?>" id="sNavId" name="sNavId" size="50" type="hidden">
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>导航名称：</th>
                                <td>
                                    <input class="common-text required" value="<?php echo $info['sNavName'];?>" id="sNavName" name="sNavName" size="50" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>导航链接：</th>
                                <td><input class="common-text" name="sNavUrl" id="sNavUrl" size="50" value="<?php echo $info['sNavUrl'];?>" type="text"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>导航排序：</th>
                                <td><input class="common-text" name="sort" id="sort" size="50" value="<?php echo $info['sort'];?>" type="text"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>关键字：</th>
                                <td>
                                    <input class="common-text required" placeholder="请输入关键字" id="keyword" name="keyword" size="50" type="text" value="<?php echo $info['keyword'];?>">
                                </td>
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
function checkButton(){
	var sNavName = $("#sNavName").val();
    if(sNavName == '')
    {
     	warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">导航名称不能为空</font></strong>');return false;
    }
    else if(sNavName.length>6)
    {
     	warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">导航名称不能超过6个字</font></strong>');return false;
    }
	 
 	var sNavUrl = $('#sNavUrl').val();
 	if (sNavUrl == '')
 	{
 		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">导航链接不能为空</font></strong>');return false;	
 	}
	
	var keyword = $('#keyword').val();
 	if (keyword == '')
 	{
 		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">导航关键字不能为空</font></strong>');return false;		
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