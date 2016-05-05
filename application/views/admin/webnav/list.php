<?php $header?>
  <!--main开始--> 
<div class="main-wrap">
	<div class="crumb-wrap">
      <div class="crumb-list"><i class="icon-font"></i><a href="../product - 拷贝/index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
    </div>
    
     <!--操作按钮组-->
  <div class="panel-default">
    <div class="panel-body">
      <div class="row text-right"> 
       <div class="btn-group pull-right"> <a class="btn btn-default btn-sm" href="<?php echo $this->config->item('base_url');?>/admin/Webnav/add">添加导航</a></div>
      </div>
    </div>
  </div>
  <!--操作按钮组-->
 <!--squre开始-->
    <div class="result-wrap result-wrap-squre" style="border:0;"> 
      <!---->
      <?php if(!empty($navlist)) foreach($navlist as $k=>$v){?>
      <div class="col-sm-2 col-md-3">
        <div class="thumbnail students">
          <div class="caption clearfix">
            <div class="clearfix">
              <h5><strong><font color="#0099FF"><font size="+1"><?php echo $v['navName']?></font></font></strong></strong></h5>
              </div>
            <div class="pull_parent">
              <p><strong>关键字：</strong><?php echo !empty($v['keyword']) ? $v['keyword'] : '';?></p>
              <p><em>链接地址：</em><?php echo !empty($v['navUrl']) ? $this->config->item('base_url').$v['navUrl'] : '';?></p>
            </div>
            <div class="btn_students_box"><a class="btn btn-primary btn-xs" href="<?php echo $this->config->item('base_url');?>/admin/Webnav/edit/<?php echo $v['wId']?>">编辑</a> <a href="<?php echo $this->config->item('base_url');?>/admin/Webnav/delete/<?php echo $v['wId']?>" class="btn btn-default btn-xs">删除</a> </div>
          </div>
        </div>
      </div>
      <!---->
      <?php }?>
    </div>
  </div>
  <!--main结束--> 
  					<nav>
						<ul class="pagination">
                        <?php if(!empty($count))
						{
							echo '<li><a>共('.$count.')条产品</a></li>';
						}
						else
						{
							echo '<li><a>搜索为空</a></li>';	
						}
						?>
                        <?php echo $this->pagination->create_links($parampage); ?>
                        </ul>
					</nav>
</div>
</body>
</html>