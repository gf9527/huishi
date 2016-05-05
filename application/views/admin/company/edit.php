<?php $header;?>
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">公司介绍</span></div>
        </div>
        <div class="result-wrap">
            <form action="<?php echo $this->config->item('base_url').'/admin/Company/doedit';?>" method="post" id="myform" name="myform">
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe00a;</i>公司信息</h1>
                    </div>
                    <div class="result-content">
                        <table width="100%" class="insert-tab">
                            <tbody><tr>
                                <th width="15%"><i class="require-red">*</i>公司名称：</th>
                                <td><input type="text" id="companyName" value="<?php echo empty($info['companyName']) ? '请输入公司名称' : $info['companyName']?>" size="85" name="companyName" class="common-text"></td>
                            </tr>
                                <tr>
                                    <th><i class="require-red">*</i>公司简介：</th>
                                    <td>
                                    <script id="contents" name="contents" type="text/plain" width="500">
        <?php echo empty($info['contents']) ? '请输入网公司简介' : $info['contents'];?>
    </script>
									</td>
                                </tr>
                                <tr>
                                <th width="15%"><i class="require-red">*</i>公司邮箱：</th>
                                <td><input type="text" id="email" value="<?php echo empty($info['email']) ? '请输入您的公司邮箱' : $info['email'];?>" size="85" name="email" class="common-text"></td>
                            </tr>
                                <tr>
                                    <th><i class="require-red">*</i>公司QQ：</th>
                                    <td><input type="text" id="companyQQ" value="<?php echo empty($info['companyQQ']) ? '请输入公司QQ' : $info['companyQQ'];?>" size="85" name="companyQQ" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>公司电话：</th>
                                    <td><input type="text" id="phoneNumber" value="<?php echo empty($info['phoneNumber']) ? '请输入联系电话' : $info['phoneNumber']?>" size="85" name="phoneNumber" class="common-text"></td>
                                </tr>
                                <input type="hidden" value="<?php echo $info['cId']?>" name="cId" id="cId">
                                <tr>
                                    <th><i class="require-red">*</i>微信号码：</th>
                                    <td><input type="text" id="wechat" value="<?php echo empty($info['wechat']) ? '请输入公司微信号' : $info['wechat'];?>" size="85" name="wechat" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>微博号码：</th>
                                    <td><input type="text" id="weibo" value="<?php echo empty($info['weibo']) ? '请输入公司微博': $info['weibo']?>" size="85" name="weibo" class="common-text"></td>
                                </tr>
                                 <tr>
                                    <th><i class="require-red">*</i>公司地址：</th>
                                    <td><input type="text" id="address" value="<?php echo empty($info['address']) ? '请输入公司地址': $info['address']?>" size="85" name="address" class="common-text"></td>
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
<script type="text/javascript">
	var ue = UE.getEditor('contents');
</script>
</body>
</html>