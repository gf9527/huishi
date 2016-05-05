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
                <form action="<?php echo $this->config->item('base_url');?>/admin/User/doadd" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>用户名：</th>
                                <td>
                                    <input class="common-text required" id="username" name="username" size="50" type="text" placeholder="请输入您的用户名。">
                                </td>
                            </tr>
                            <tr>
                                <th>登录密码：</th>
                                <td><input class="common-text" name="passwordF" id="passwordF" size="50" type="password" placeholder="请输入密码。"></td>
                            </tr>
                            <tr>
                                <th>重复密码：</th>
                                <td><input class="common-text" name="passwordS" id="passwordS" size="50" type="password" placeholder="请重复密码。"></td>
                            </tr>
                            <tr>
                                <th>邮箱：</th>
                                <td><input class="common-text" name="email" id="email" size="50" type="text" placeholder="请输入邮箱。"></td>
                            </tr>
                            <tr>
                                <th>真实姓名：</th>
                                <td><input class="common-text" name="realName" id="realName" size="50" type="text" placeholder="请输入真实姓名"></td>
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
	//用户名验证
	var res = '';
	var username = $('#username').val();
	$.ajax
	({ //一个Ajax过程
	type: "post", //以post方式与后台沟通
	url : "<?php echo $this->config->item('base_url').'/admin/User/ajaxUser';?>", //与此php页面沟通
	dataType:'json',//从php返回的值以 JSON方式 解释
	async:false,
	data: 'username='+username,
	success: function(response)
	{//如果调用php成功
		res = response;
	}
	});
	 
	if (username == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">用户名不能为空</font></strong>');return false;

	}
	if (res.err == 1)
	{  
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">用户名已存在</font></strong>');return false;
	}
	 
 	var passwordF = $('#passwordF').val();
 	if (passwordF == '')
 	{
 		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">密码不能为空</font></strong>');return false;	
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
	////验证邮箱格式
	var emailres = '';
	var email = $('#email').val();
	$.ajax
	({ //一个Ajax过程
	type: "post", //以post方式与后台沟通
	url : "<?php echo $this->config->item('base_url').'/admin/User/ajaxEmail';?>", //与此php页面沟通
	dataType:'json',//从php返回的值以 JSON方式 解释
	async:false,
	data: 'email='+email,
	success: function(response)
	{//如果调用php成功
		emailres = response;
	}
	});
	var reyx= /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
	if(email == '')
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">邮箱不能为空</font></strong>');return false;
	}
	if(reyx.test(email) == false)
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">邮箱格式不对</font></strong>');return false;
	}
	if(emailres.err == 1)
	{
		warning('<strong>错误：&nbsp;&nbsp;<font color="#993300">邮箱已经被注册</font></strong>');return false;
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