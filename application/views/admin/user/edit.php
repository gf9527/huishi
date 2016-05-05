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
                <form action="<?php echo $this->config->item('base_url');?>/admin/User/doedit" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>用户名：</th>
                                <td>
             							<?php echo $info['username']?>
									<input class="common-text required" id="username" name="username" size="50" type="hidden" value="<?php echo $info['username']?>">
                                     <input class="common-text required" id="UId" name="UId" size="50" type="hidden" value="<?php echo $info['UId']?>">
                                </td>
                            </tr>
                            <tr>
                                <th>登录密码：</th>
                                <td><input class="common-text" name="password" id="password" size="50" type="password" ></td>
                            </tr>
                             <tr>
                                <th>输入新密码：</th>
                                <td><input class="common-text" name="passwordF" id="passwordF" size="50" type="password" ></td>
                            </tr>
                            <tr>
                                <th>请重复密码：</th>
                                <td><input class="common-text" name="passwordS" id="passwordS" size="50" type="password" placeholder="请重复密码。"></td>
                            </tr>
                            <tr>
                                <th>邮箱：</th>
                                <td><?php echo $info['email'];?></td>
                                <input class="common-text required" id="email" name="email" size="50" type="hidden" value="<?php echo $info['email'];?>">
                            </tr>
                            <tr>
                                <th>真实姓名：</th>
                                <td><input class="common-text" name="realName" id="realName" size="50" type="text" value="<?php echo $info['realName'];?>"></td>
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
	var passres = '';
	var password = $('#password').val();
	$.ajax
	({ //一个Ajax过程
	type: "post", //以post方式与后台沟通
	url : "<?php echo $this->config->item('base_url').'/admin/User/ajaxPass';?>", //与此php页面沟通
	dataType:'json',//从php返回的值以 JSON方式 解释
	async:false,
	data: 'password='+password,
	success: function(response)
	{//如果调用php成功
		passres = response;
	}
	});
	if(password == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">请输入旧密码</font></strong>');return false;
	}
	if(passres.err == 0)
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">密码错误，请重新输入</font></strong>');return false;
	}
 	var passwordF = $('#passwordF').val();
 	if (passwordF == '')
 	{
 		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">新密码不能为空</font></strong>');return false;	
 	}
	
	var passwordS = $('#passwordS').val();
 	if (passwordS == '')
 	{
 		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">请重复密码</font></strong>');return false;	
 	}
	if(passwordS != passwordF)
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">两次密码不一致</font></strong>');return false;
	}
	
	var realname = $('#realName').val();
	if(realname == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">真实姓名不能为空</font></strong>');return false;
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