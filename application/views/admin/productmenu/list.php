<?php $header?>
  <!--main开始--> 
<div class="main-wrap">
     <!--操作按钮组-->
  <div class="panel-default">
    <div class="panel-body">
      <div class="row text-right"> 
       <div class="btn-group pull-right"> <a class="btn btn-default btn-sm" href="<?php echo $this->config->item('base_url');?>/admin/Productmenu/add">添加分类</a></div>
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
            <div class="clearfix" style="text-align:center; font-size:28px; font-weight:bold">
              <h5><strong><font color="#0099FF"><font size="+2"><?php echo $v['typeName']?></font></font></strong></strong></h5>
            </div>
            <div class="btn_students_box">
            <a class="btn btn-primary btn-xs" href="<?php echo $this->config->item('base_url');?>/admin/Productmenu/edit/<?php echo $v['typeId']?>">编辑</a>
            <?php if($v['deleteFlag']==1){?>
            <a href="<?php echo $this->config->item('base_url');?>/admin/Productmenu/delete/<?php echo $v['typeId']?>/<?php echo $v['deleteFlag']?>" class="btn btn-default btn-xs">恢复</a> 
            <?php }else{?>
            <a href="<?php echo $this->config->item('base_url');?>/admin/Productmenu/delete/<?php echo $v['typeId']?>/<?php echo $v['deleteFlag']?>" class="btn btn-default btn-xs">删除</a> 
            <?php }?>
            </div>
            
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
							echo '<li><a>共('.$count.')条分类</a></li>';
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