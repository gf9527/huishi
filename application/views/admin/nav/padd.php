<?php $header;?>
		<!--/sidebar-->
         <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
        </div>
    <div class="main-wrap">
        <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo $this->config->item('base_url');?>/admin/Navigate/doPadd" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>栏目名称：</th>
                                <td>
                                    <input class="common-text required" id="pNavName" name="pNavName" size="50" type="text">
                                </td>
                            </tr>
                            
                            <tr>
                                <th>导航排序：</th>
                                <td><input class="common-text" name="pNavSort" id="pNavSort" size="50"  type="text"></td>
                            </tr>
                             <tr>
                                <th>关键字：</th>
                                <td><input class="common-text" name="keyword" id="keyword" size="50"  type="text"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>