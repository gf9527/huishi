<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * 产品栏目
 * @author  gf
 * @time 2016/1/20
 * class News
 */
class Productmenu extends CI_Controller
{
	private static $view_data = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Public_model', 'publicmodel');
		$this->publicmodel->checkUser();
		self::$view_data['header'] = $this->publicmodel->adminheader();
		$this->load->model('admin/Productmenu_model', 'Productmenu');
		$this->load->model('admin/Product_model', 'Product');
	}
	
	/**
	 * 主页
	 */
	public function index()
	{
		$condition =array();
		$param = array();
		$limit = 20;
		$start = $this->uri->segment(4);
		$start = isset($start) ? intval($start) : 0;
		$count = $this->Productmenu->getCount($condition);
		$parampage = $this->publicmodel->dealparam($param);
		$this->publicmodel->create_page('admin/Productmenu/index', $count, $limit ,4);
		$Productmenulist = $this->Productmenu->getList($condition , $limit , $start);
		if(!empty($Productmenulist)) foreach($Productmenulist as $k=>$v)
		{
			$Productmenulist[$k]['product'] = $this->Product->getInfo($v['typeId']);
		}
		self::$view_data['list'] = $Productmenulist;
		self::$view_data['count'] = $count;
		self::$view_data['parampage'] = $parampage;
		$this->load->view('admin/productmenu/list',self::$view_data);
	}

	/*
	 * 添加
	 */
	public function add()
	{
		$this->load->view('admin/productmenu/add',self::$view_data);
	}

	/**
	 * 执行入库
	 */
	public function doadd()
	{
		$addArr = array();
		$addArr['typeName'] = trim($this->input->post('typeName'));
		$typeId = $this->Productmenu->addData($addArr);
		if(!empty($typeId))
		{
			redirect('admin/Productmenu/index');
		}
		else
		{
			exit;
		}
	}

	/**
	 * 编辑
	 * @param $typeId
	 */
	public function edit($typeId)
	{
		$typeId = intval($typeId);
		$info = $this->Productmenu->getInfo($typeId);
		self::$view_data['info'] = $info;
		$this->load->view('admin/productmenu/edit',self::$view_data);
	}

	/**
	 * 执行编辑
	 */
	public function doedit()
	{
		$typeId = intval($this->input->post('typeId'));
		$updateArr['typeName'] = trim($this->input->post('typeName'));
		if($typeId !=0)
		{
			$bool = $this->Productmenu->updateData($updateArr , $typeId);
		}
		else
		{
			exit;
		}
	}

	/**
	 * 删除 恢复
	 * @param $typeId
	 * @param $deleteFlag\
	 */
	public function delete($typeId , $deleteFlag)
	{
		$typeId = intval($typeId);
		$deleteFlag = intval($deleteFlag);
		if($deleteFlag == 0)
		{
			$updateArr['deleteFlag'] = 1;
			$bool = $this->Productmenu->updateData($updateArr , $typeId);
		}
		if($deleteFlag == 1)
		{
			$updateArr['deleteFlag'] = 0;
			$bool = $this->Productmenu->updateData($updateArr , $typeId);
		}

		redirect('admin/Productmenu/index');
	}
}