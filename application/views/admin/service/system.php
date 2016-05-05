	<?php $header;?>
    <div class="main-wrap">
        
        <div class="result-wrap">
            <form action="<?php echo $this->config->item('base_url').'/admin/Service/doedit';?>" method="post" id="myform" name="myform">
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe00a;</i>服务流程</h1>
                    </div>
                    <div class="result-content">
                        <table width="100%" class="insert-tab">
                            <tbody><tr>
                                <th width="15%"><i class="require-red">*</i>标题：</th>
                                <td><input type="text" id="title" value="<?php echo empty($info['title']) ? '请输入标题' : $info['title']?>" size="85" name="title" class="common-text"></td>
                                <input type="hidden" name="sId" id="sId" value="<?php echo empty($info['sId']) ? '0' : $info['sId']?>"
                            </tr>
                                <tr>
                                    <th><i class="require-red">*</i>服务内容：</th>
                                    <td>
                                    <script id="contents" name="contents" type="text/plain" width="500">
        <?php echo empty($info['contents']) ? '请输入内容' : $info['contents'];?>
    </script>
									</td>
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