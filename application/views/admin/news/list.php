<?php $header?>
  <!--main开始--> 
<div class="main-wrap">
     <!--操作按钮组-->
  <div class="panel-default">
    <div class="panel-body">
      <div class="row text-right"> 
       <div class="btn-group pull-right"> <a class="btn btn-default btn-sm" href="<?php echo $this->config->item('base_url');?>/admin/News/add">发布新闻</a></div>
      </div>
    </div>
  </div>
  <!--操作按钮组-->
 <!--squre开始-->
    <div class="result-wrap result-wrap-squre" style="border:0;"> 
      <!---->
      <?php if(!empty($list)) foreach($list as $k=>$v){?>
      <div class="col-sm-2 col-md-3">
        <div class="thumbnail students">
          <div class="caption clearfix">
            <div class="clearfix">
            <div class="pull-left"><img src="<?php echo !empty($v['imageName']) ? $this->config->item('img_url').$v['imageName'] : '';?>" alt=""></div>
              <h5><strong><font color="#0099FF"><?php echo cut_string(strip_tags($v['title']),20,'...')?></font></strong></strong></h5>
              <p><em>作者：</em><?php echo !empty($v['editor']) ? $v['editor'] : '';?></p>
            </div>
            <div class="pull_parent">
              <p><em>发布时间：</em><?php echo !empty($v['createTime']) ? date('Y-m-d' ,$v['createTime']) : '';?></p>
              <p><em>描述：</em><?php echo cut_string(strip_tags($v['contents']),30,'...')?></p>
            </div>
            <div class="btn_students_box"><a class="btn btn-primary btn-xs" href="<?php echo $this->config->item('base_url');?>/admin/News/edit/<?php echo $v['newsId']?>">编辑</a> <a href="<?php echo $this->config->item('base_url');?>/admin/News/delete/<?php echo $v['newsId']?>/<?php echo !empty($v['imageName']) ? $v['imageName'] : '';?>" class="btn btn-default btn-xs">删除</a> </div>
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
							echo '<li><a>共('.$count.')条信息</a></li>';
						}
						else
						{
							echo '搜索为空';	
						}
						?>
                        <?php echo $this->pagination->create_links($parampage); ?>
                        </ul>
					</nav>
</div>
</body>
</html>