<?php $header?>
  <!--main开始--> 
<div class="main-wrap">
	<div class="crumb-wrap">
      
    </div>
     <!--操作按钮组-->
  <div class="panel-default">
    <div class="panel-body">
      <div class="row text-right"> 
       <div class="btn-group pull-right"> <a class="btn btn-default btn-sm" href="<?php echo $this->config->item('base_url');?>/admin/Navigate/add">添加导航</a> <a class="btn btn-default btn-sm" href="<?php echo $this->config->item('base_url');?>/admin/Navigate/pAdd">添加栏目</a></div>
      </div>
    </div>
  </div>
  <!--操作按钮组-->
 <!--squre开始-->
    <div class="result-wrap result-wrap-squre" style="border:0;"> 
      <!---->
      <?php if(!empty($navlist))
	  foreach($navlist as $k=>$v){
	  ?>
      <div class="col-sm-2 col-md-3">
        <div class="thumbnail students">
          <div class="caption clearfix">
            <div class="clearfix" style="float:right">
              <a class="btn btn-default btn-sm"><?php echo $v['pNavName'];?></a>
            </div>
            <?php foreach($v['sNavList'] as $val){?>
            <div class="pull_parent">
			<?php echo $val['sNavName'];?>
            <a href="<?php echo $this->config->item('base_url').'/admin/Navigate/edit/'.$val['sNavId'];?>" class="btn btn-default btn-xs" style=" background:#CCC; color:#06F; font-weight:bold; float:right">编辑</a>&nbsp;&nbsp;
            <?php if($val['deleteFlag']==0){?>
            <a href="<?php echo $this->config->item('base_url').'/admin/Navigate/delete/'.$val['sNavId'].'/1';?>" class="btn btn-default btn-xs" style=" background:#CCC; color:#C03; float:right;font-weight:bold">删除</a>
            <?php }else{?>
            <a href="<?php echo $this->config->item('base_url').'/admin/Navigate/delete/'.$val['sNavId'].'/0';?>" class="btn btn-default btn-xs" style=" background:#CCC; color:#C03; float:right;font-weight:bold">恢复</a>
            <?php }?>
            </div>
            <?php }?>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
  <!--main结束--> 
</div>
</body>
</html>