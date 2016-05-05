<?php $header?>
  <!--main开始--> 
<div class="main-wrap">
     <!--操作按钮组-->
  <div class="panel-default">
    <div class="panel-body">
      <div class="row text-right"> 
       <div class="btn-group pull-right"> <a class="btn btn-default btn-sm" href="<?php echo $this->config->item('base_url');?>/admin/Recruit/add">发布招聘信息</a></div>
      </div>
    </div>
  </div>
  <!--操作按钮组-->
 <!--squre开始-->
    <div class="result-wrap result-wrap-squre" style="border:0;"> 
      <!---->
      <?php if($list) foreach($list as $k=>$v){?>
      <div class="col-sm-2 col-md-3">
        <div class="thumbnail students">
          <div class="caption clearfix">
            <div class="clearfix">
              <h5><strong><?php echo $v['title']?></strong></h5>
              <p>工资：<?php echo $v['wages']?></p>
            </div>
            <div class="pull_parent">
              <p>发布时间：<?php echo date('Y-m-d' ,$v['createTime'])?></p>
              <p>经验：<?php echo $v['experience'];?></p>
              <p>学历要求：<?php echo $v['education'];?></p>
              <p>描述：<?php echo cut_string(strip_tags($v['contents']),90,'...')?></p>
            </div>
            <div class="btn_students_box"><a class="btn btn-primary btn-xs" href="<?php echo $this->config->item('base_url');?>/admin/Recruit/edit/<?php echo $v['rId']?>">编辑</a> <a href="<?php echo $this->config->item('base_url');?>/admin/Recruit/delete/<?php echo $v['rId']?>" class="btn btn-default btn-xs">删除</a> </div>
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