<?php $header;?>
    <div class="main-wrap">
       <div class="result-wrap">
             <div class="crumb-wrap" id="warningdiv" style="display:none">
            		<div class="crumb-list" id="warningtext">
						<strong>错误：</strong> <font color="#993300">角色名重复</font>
        			</div>
            	</div>
        </div>
        <div class="result-wrap">
            <form action="<?php echo $this->config->item('base_url').'/admin/Webinfo/doedit';?>" method="post" id="myform" name="myform"  enctype="multipart/form-data">
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe00a;</i>网站设置</h1>
                    </div>
                    <div class="result-content">
                        <table width="100%" class="insert-tab">
                            <tbody>
                            	<tr>
                                	<th width="15%"><i class="require-red">*</i>域名：</th>
                                	<td><input type="text" id="webUrl" value="<?php echo empty($webinfo['webUrl']) ? $this->config->item('base_url') : $webinfo['webUrl']?>" size="85" name="webUrl" class="common-text"></td>
                            	</tr>
                            	<?php if(!empty($webinfo['logoName'])){?>
                             	<tr>
                                    <th><i class="require-red">*</i>站点logo显示图：</th>
                                    <td><img src="<?php echo $this->config->item('img_url').$webinfo['logoName']?>" width="70" height="50"/></td>
                                </tr>
                                <?php }?>
                                 <tr>
                                    <th><i class="require-red">*</i>站点logo：</th>
                                    <td>
                                    	<input class="common-text" name="imageName" id="imageName" size="50" type="file">
                                    	<input type="hidden" name="imgName" id="imgName" value="<?php echo $webinfo['logoName']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>站点标题：</th>
                                    <td><input type="text" id="" value="<?php echo empty($webinfo['title']) ? '请输入网站标题' : $webinfo['title'];?>" size="85" name="title" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>关键字：</th>
                                    <td><input type="text" id="keyword" value="<?php echo empty($webinfo['keyword']) ? '请输入网站关键字' : $webinfo['keyword']?>" size="85" name="keyword" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>描述：</th>
                                    <td><input type="text" id="contents" value="<?php echo empty($webinfo['contents']) ? '请输入网站描述' : $webinfo['contents'];?>" size="85" name="contents" class="common-text"></td>
                                </tr>
                                <tr>
                                <th width="15%"><i class="require-red">*</i>网站联系邮箱：</th>
                                <td><input type="text" id="email" value="<?php echo empty($webinfo['email']) ? '请输入您的网站邮箱' : $webinfo['email'];?>" size="85" name="email" class="common-text"></td>
                            </tr>
                                <tr>
                                    <th><i class="require-red">*</i>联系人：</th>
                                    <td><input type="text" id="realname" value="<?php echo empty($webinfo['realname']) ? '请输入您的真实姓名' : $webinfo['realname'];?>" size="85" name="realname" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>联系电话：</th>
                                    <td><input type="text" id="phoneNumber" value="<?php echo empty($webinfo['phoneNumber']) ? '请输入联系电话' : $webinfo['phoneNumber']?>" size="85" name="phoneNumber" class="common-text"></td>
                                </tr>
                                <input type="hidden" value="<?php echo $webinfo['wId']?>" name="wId" id="wId">
                                <tr>
                                    <th><i class="require-red">*</i>备案ICP：</th>
                                    <td><input type="text" id="recordNumber" value="<?php echo empty($webinfo['recordNumber']) ? '请输入备案号' : $webinfo['recordNumber'];?>" size="85" name="recordNumber" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>地址：</th>
                                    <td><input type="text" id="address" value="<?php echo empty($webinfo['address']) ? '请输入您的联系地址': $webinfo['address']?>" size="85" name="address" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <input type="submit" value="提交" class="btn btn-primary btn6 mr10">
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
</body>
</html>