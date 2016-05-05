<?php $header?>
  <!--main开始--> 
<div class="main-wrap">
    <div class="search-wrap">
      <div class="search-content">
        <form action="#" method="post">
          <table class="search-tab">
            <tr>
              <th width="120">选择分类:</th>
              <td><select name="search-sort" id="">
                  <option value="">全部</option>
                  <option value="19">精品界面</option>
                  <option value="20">推荐界面</option>
                </select></td>
              <th width="70">关键字:</th>
              <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
              <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
     <!--操作按钮组-->
  <div class="panel-default">
    <div class="panel-body">
      <div class="row text-right"> 
       <div class="btn-group pull-right"> <a class="btn btn-default btn-sm" href="<?php echo $this->config->item('base_url');?>/admin/Product/add">发布产品</a></div>
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
              
              <p><em>所属分类：</em><?php echo !empty($v['typeinfo']['typeName']) ? $v['typeinfo']['typeName'] : '';?></p>
            </div>
            <div class="pull_parent">
              <p><em>发布时间：</em><?php echo !empty($v['createTime']) ? date('Y-m-d' ,$v['createTime']) : '';?></p>
              <p><em>描述：</em><?php echo cut_string(strip_tags($v['contents']),30,'...')?></p>
            </div>
            <div class="btn_students_box"><a class="btn btn-primary btn-xs" href="<?php echo $this->config->item('base_url');?>/admin/Product/edit/<?php echo $v['productId']?>">编辑</a> <a href="<?php echo $this->config->item('base_url');?>/admin/Product/delete/<?php echo $v['productId']?>/<?php echo !empty($v['imageName']) ? $v['imageName'] : '';?>" class="btn btn-default btn-xs">删除</a> </div>
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