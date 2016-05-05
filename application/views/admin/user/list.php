<?php $header?>
  <!--main开始--> 
<div class="main-wrap">    
     <!--操作按钮组-->
  <div class="panel-default">
    <div class="panel-body">
      <div class="row text-right"> 
       <div class="btn-group pull-right"> <a class="btn btn-default btn-sm" href="<?php echo $this->config->item('base_url');?>/admin/User/add">添加用户</a></div>
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
              <h5><strong><font color="#0099FF"><font size="+1"><?php echo $v['username']?></font></font></strong></strong></h5>
              </div>
            <div class="pull_parent">
              <p><strong>真实姓名：</strong><?php echo !empty($v['realName']) ? $v['realName'] : '';?></p>
              <p><em>邮箱：</em><?php echo !empty($v['email']) ? $v['email'] : '';?></p>
            </div>
            <div class="btn_students_box"><a class="btn btn-primary btn-xs" href="<?php echo $this->config->item('base_url');?>/admin/User/edit/<?php echo $v['UId']?>">编辑</a></div>
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